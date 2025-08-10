<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transport;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Exception;

class TransportController extends Controller
{
    // Search form handler for bus/train
    public function search(Request $request)
    {
        try {
            // Rate limiting
            $key = 'transport-search:' . $request->ip();
            if (RateLimiter::tooManyAttempts($key, 10)) {
                return back()->withErrors(['error' => 'Too many search attempts. Please try again later.']);
            }
            RateLimiter::hit($key, 60);

            $validated = $request->validate([
                'type' => 'required|in:bus,train',
                'from' => 'required|string|min:2|max:100|regex:/^[a-zA-Z\s]+$/',
                'to' => 'required|string|min:2|max:100|regex:/^[a-zA-Z\s]+$/',
                'date' => 'nullable|date|after_or_equal:today',
            ]);

            // Sanitize inputs
            $type = strtolower(trim($validated['type']));
            $from = trim($validated['from']);
            $to = trim($validated['to']);

            // Prevent searching same from/to locations
            if (strcasecmp($from, $to) === 0) {
                return back()->withErrors(['to' => 'Destination must be different from departure location.'])->withInput();
            }

            $query = Transport::where('type', $type)
                ->where('is_active', true)
                ->where(function($q) use ($from, $to) {
                    $q->where('route_from', 'LIKE', '%' . $from . '%')
                      ->where('route_to', 'LIKE', '%' . $to . '%');
                });

            // Add date filter if provided
            if (isset($validated['date'])) {
                $query->whereDate('departure_time', '>=', $validated['date']);
            }

            $transports = $query->orderBy('departure_time', 'asc')->get();

            // Log search for analytics
            Log::info('Transport search performed', [
                'type' => $type,
                'from' => $from,
                'to' => $to,
                'results_count' => $transports->count(),
                'ip' => $request->ip()
            ]);

            return view('transports.' . $type, compact('transports'));

        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            Log::error('Transport search error', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
                'ip' => $request->ip()
            ]);
            return back()->withErrors(['error' => 'Search failed. Please try again.'])->withInput();
        }
    }

    // Booking handler
    public function book(Request $request)
    {
        try {
            // Rate limiting for booking attempts
            $key = 'transport-booking:' . $request->ip();
            if (RateLimiter::tooManyAttempts($key, 5)) {
                return back()->withErrors(['error' => 'Too many booking attempts. Please try again later.']);
            }
            RateLimiter::hit($key, 300); // 5 minutes cooldown

            $validated = $request->validate([
                'transport_id' => 'required|integer|exists:transports,id',
                'seats_booked' => 'required|integer|min:1|max:10',
                'passenger_name' => 'required|string|min:2|max:255|regex:/^[a-zA-Z\s\.]+$/',
                'passenger_email' => 'required|email:rfc,dns|max:255',
                'passenger_phone' => 'required|string|min:10|max:20|regex:/^[\+]?[0-9\-\(\)\s]+$/',
                'emergency_contact' => 'nullable|string|max:20|regex:/^[\+]?[0-9\-\(\)\s]+$/',
            ]);

            DB::beginTransaction();

            // Lock the transport record to prevent race conditions
            $transport = Transport::where('id', $validated['transport_id'])
                ->where('is_active', true)
                ->lockForUpdate()
                ->first();

            if (!$transport) {
                DB::rollBack();
                return back()->withErrors(['transport_id' => 'Selected transport is not available.'])->withInput();
            }

            // Check if transport is still available for booking
            if ($transport->departure_time <= now()) {
                DB::rollBack();
                return back()->withErrors(['error' => 'Cannot book past or current departure time.'])->withInput();
            }

            // Calculate available seats
            $totalBookedSeats = Booking::where('transport_id', $transport->id)
                ->where('status', '!=', 'cancelled')
                ->sum('seats_booked');
            
            $availableSeats = $transport->total_seats - $totalBookedSeats;

            if ($validated['seats_booked'] > $availableSeats) {
                DB::rollBack();
                return back()->withErrors([
                    'seats_booked' => "Not enough seats available. Only {$availableSeats} seats left."
                ])->withInput();
            }

            // Check for duplicate booking (same email within 5 minutes)
            $recentBooking = Booking::where('transport_id', $transport->id)
                ->where('passenger_email', $validated['passenger_email'])
                ->where('created_at', '>', now()->subMinutes(5))
                ->first();

            if ($recentBooking) {
                DB::rollBack();
                return back()->withErrors([
                    'passenger_email' => 'A booking with this email was made recently. Please wait before booking again.'
                ])->withInput();
            }

            // Create booking
            $booking = Booking::create([
                'transport_id' => $transport->id,
                'transport_type' => $transport->type,
                'passenger_name' => trim($validated['passenger_name']),
                'passenger_email' => strtolower(trim($validated['passenger_email'])),
                'passenger_phone' => trim($validated['passenger_phone']),
                'emergency_contact' => isset($validated['emergency_contact']) ? trim($validated['emergency_contact']) : null,
                'seats_booked' => $validated['seats_booked'],
                'total_amount' => $transport->price * $validated['seats_booked'],
                'booking_reference' => $this->generateBookingReference(),
                'status' => 'confirmed',
            ]);

            DB::commit();

            // Log successful booking
            Log::info('Transport booking created', [
                'booking_id' => $booking->id,
                'transport_id' => $transport->id,
                'passenger_email' => $validated['passenger_email'],
                'seats_booked' => $validated['seats_booked'],
                'ip' => $request->ip()
            ]);

            // Clear rate limit on successful booking
            RateLimiter::clear($key);

            // Redirect with success message
            $routeName = $transport->type === 'bus' ? 'bus.page' : 'train.page';
            return redirect()->route($routeName)->with([
                'success' => 'Booking successful! Your booking reference is: ' . $booking->booking_reference,
                'booking_reference' => $booking->booking_reference
            ]);

        } catch (ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            DB::rollBack();
            
            Log::error('Transport booking error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->except(['_token']),
                'ip' => $request->ip()
            ]);

            return back()->withErrors([
                'error' => 'Booking failed due to a system error. Please try again or contact support.'
            ])->withInput();
        }
    }

    /**
     * Generate unique booking reference
     */
    private function generateBookingReference(): string
    {
        do {
            $reference = 'TRP' . strtoupper(substr(uniqid(), -8));
        } while (Booking::where('booking_reference', $reference)->exists());

        return $reference;
    }

    /**
     * Get booking details by reference
     */
    public function getBookingDetails(Request $request)
    {
        try {
            $request->validate([
                'booking_reference' => 'required|string|size:11|regex:/^TRP[A-Z0-9]{8}$/'
            ]);

            $booking = Booking::with('transport')
                ->where('booking_reference', $request->booking_reference)
                ->first();

            if (!$booking) {
                return response()->json(['error' => 'Booking not found'], 404);
            }

            return response()->json([
                'booking' => $booking,
                'transport' => $booking->transport
            ]);

        } catch (Exception $e) {
            Log::error('Booking details retrieval error', [
                'error' => $e->getMessage(),
                'reference' => $request->booking_reference ?? 'none'
            ]);

            return response()->json(['error' => 'Unable to retrieve booking details'], 500);
        }
    }
}
