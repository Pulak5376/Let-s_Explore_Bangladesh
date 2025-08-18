<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $hotels = Hotel::query();

        if ($request->filled(['destination', 'checkin', 'checkout', 'guests'])) {
            $hotels = $hotels->search(
                $request->destination,
                $request->checkin,
                $request->checkout,
                $request->guests
            );
        }

        $hotels = $hotels->get();
        return view('hotelbook', compact('hotels'));
    }

    public function book(Request $request, Hotel $hotel)
    {
        $request->validate([
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1'
        ]);

        $nights = \Carbon\Carbon::parse($request->check_in)->diffInDays($request->check_out);
        $total_price = $hotel->price_per_night * $nights;

        HotelBooking::create([
            'user_id' => Auth::id(),
            'hotel_id' => $hotel->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'guests' => $request->guests,
            'total_price' => $total_price,
            'status' => 'confirmed'
        ]);

        return redirect()->back()->with('success', 'Hotel booked successfully!');
    }
}
