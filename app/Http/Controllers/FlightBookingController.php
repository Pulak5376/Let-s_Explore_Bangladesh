<?php

namespace App\Http\Controllers;

use App\Models\FlightBooking;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightBookingController extends Controller
{
    /**
     * Show the flight booking form.
     */
    public function create(Request $request)
    {
        $flights = null;
        if ($request->filled(['from', 'to', 'departure_date', 'class'])) {
            $flights = Flight::where('from', $request->from)
                ->where('to', $request->to)
                ->where('departure_date', $request->departure_date)
                ->where('class', $request->class)
                ->where('seats_available', '>', 0)
                ->get();
        }
        return view('flightbook', compact('flights'));
    }

    /**
     * Store a new flight booking.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'return_date' => 'nullable|date',
            'class' => 'required|string',
            'passengers' => 'required|integer|min:1',
            'flight_id' => 'required|exists:flights,id',
            'passenger_name' => 'required|string|max:255',
            'passenger_email' => 'required|email',
            'passenger_phone' => 'required|string|max:20',
        ]);

        $flight = Flight::findOrFail($validated['flight_id']);
        if ($flight->seats_available < $validated['passengers']) {
            return redirect()->back()->with('error', 'Not enough seats available.');
        }

        // Create booking
        $booking = FlightBooking::create([
            'from' => $validated['from'],
            'to' => $validated['to'],
            'departure_date' => $validated['departure_date'],
            'return_date' => $validated['return_date'],
            'class' => $validated['class'],
            'passengers' => $validated['passengers'],
            // Optionally store passenger info in a JSON or separate columns if you want
        ]);

        // Reduce available seats
        $flight->decrement('seats_available', $validated['passengers']);

        return redirect()->route('flightbook')->with('success', 'Flight booking successful!');
    }
}
