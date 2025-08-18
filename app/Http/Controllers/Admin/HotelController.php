<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelBooking;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function create()
    {
        return view('admin.hotels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_night' => 'required|numeric|min:0',
            'rating' => 'required|numeric|min:0|max:5',
            'image_url' => 'required|url',
            'available_rooms' => 'required|integer|min:0'
        ]);

        Hotel::create($request->all());

        return redirect()->route('admin.hotels.create')
            ->with('success', 'Hotel added successfully!');
    }

    public function bookings()
    {
        $bookings = HotelBooking::with(['hotel', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.hotels.bookings', compact('bookings'));
    }
}
