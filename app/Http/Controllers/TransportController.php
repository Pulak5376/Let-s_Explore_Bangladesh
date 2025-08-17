<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transport;
use App\Models\Booking;

class TransportController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'type' => 'required|in:bus,train',
            'from' => 'required|string',
            'to' => 'required|string',
            'booking_date' => 'required|date',
        ]);

        $transports = Transport::where('type', $request->type)
            ->where('route_from', 'LIKE', '%' . $request->from . '%')
            ->where('route_to', 'LIKE', '%' . $request->to . '%')
            ->get();

        $searchDate = $request->booking_date;

        return view('transports.' . $request->type, compact('transports', 'searchDate'));
    }


    public function book(Request $request)
    {
        $request->validate([
            'transport_id' => 'required|exists:transports,id',
            'seats_booked' => 'required|integer|min:1',
            'booking_date' => 'required|date',
            'passenger_name' => 'required|string|max:255',
            'passenger_email' => 'required|email|max:255',
            'passenger_phone' => 'required|string|max:20',
        ]);

        $transport = Transport::findOrFail($request->transport_id);

        // Check if enough seats are available
        if ($request->seats_booked > $transport->available_seats) {
            return back()->withErrors([
                'seats_booked' => 'Not enough seats available. Only ' . $transport->available_seats . ' seats left.'
            ])->withInput();
        }

        // Create booking
        Booking::create([
            'transport_id' => $transport->id,
            'transport_type' => $transport->type,
            'booking_date' => $request->booking_date,
            'passenger_name' => $request->passenger_name,
            'passenger_email' => $request->passenger_email,
            'passenger_phone' => $request->passenger_phone,
            'seats_booked' => $request->seats_booked,
        ]);

        // Update available seats
        $transport->available_seats -= $request->seats_booked;
        $transport->save();


        if ($transport->type == 'bus') {
            return redirect()->route('bus.page')->with('success', 'Booking successful! ' . $request->seats_booked . ' seats booked.');
        } else {
            return redirect()->route('train.page')->with('success', 'Booking successful! ' . $request->seats_booked . ' seats booked.');
        }
    }
}