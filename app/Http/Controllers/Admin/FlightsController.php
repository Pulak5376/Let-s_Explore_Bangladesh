<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flight;
use Illuminate\Support\Facades\DB;
use App\Models\FlightBooking;

class FlightsController extends Controller
{
    public function addFlight()
    {
        return view('admin.transports.addflight');
    }

    public function storeflight(Request $request)
    {
        $request->validate([
            'flight_number' => 'required|string|max:255',
            'airline' => 'required|string|max:255',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'arrival_date' => 'nullable|date',
            'class' => 'required|string',
            'seats_available' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        Flight::create($request->all());

        return redirect()->back()->with('success', 'Flight added successfully!');
    }
}