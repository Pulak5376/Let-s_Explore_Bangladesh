<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\BusBooking;
use Illuminate\Support\Facades\Auth;

class BusBookingController extends Controller
{
    public function search(Request $request)
    {
        $buses = collect(); // Default empty collection

        if ($request->filled('from') && $request->filled('to')) {
            $request->validate([
                'from' => 'required|string',
                'to' => 'required|string',
                'date' => 'nullable|date',
            ]);

            $query = Bus::where('from', $request->from)
                ->where('to', $request->to);

            if ($request->filled('date')) {
                $query->where(function ($q) use ($request) {
                    $q->whereDate('date', $request->date)
                        ->orWhere('recurring', true);
                });
            }

            $buses = $query->get();
        }

        return view('bus.search', compact('buses'));
    }

    public function book(Request $request)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'seats_booked' => 'required|integer|min:1',
        ]);

        BusBooking::create([
            'bus_id' => $request->bus_id,
            'seats_booked' => $request->seats_booked,
            'user_id' => auth()->id() ?? null,
            'status' => 'booked',
        ]);

        return redirect()->back()->with('success', 'Bus ticket booked successfully!');
    }
}
