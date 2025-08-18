<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function gateway(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id'
        ]);

        $booking = Booking::with('transport')->findOrFail($request->booking_id);

        if ($booking->payment_status === 'paid') {
            return redirect()->back()->with('error', 'This booking is already paid.');
        }

        $totalAmount = $booking->transport->price * $booking->seats_booked;
        $transactionId = 'TXN' . time() . rand(1000, 9999);

        return view('payment.gateway', compact('booking', 'totalAmount', 'transactionId'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_method' => 'required|string',
            'card_number' => 'required_if:payment_method,card',
            'mobile_number' => 'required_if:payment_method,mobile',
            'bank_account' => 'required_if:payment_method,bank',
        ]);

        $booking = Booking::findOrFail($request->booking_id);
        $totalAmount = $booking->transport->price * $booking->seats_booked;
        $transactionId = 'TXN' . time() . rand(1000, 9999);

        // Simulate payment processing delay
        sleep(2);

        // Simulate random success/failure (90% success rate)
        $success = rand(1, 10) <= 9;

        if ($success) {
            $booking->update([
                'payment_status' => 'paid'
            ]);

            return view('payment.success', compact('booking', 'totalAmount', 'transactionId'));
        } else {
            return view('payment.failed', compact('booking', 'totalAmount', 'transactionId'));
        }
    }
}
