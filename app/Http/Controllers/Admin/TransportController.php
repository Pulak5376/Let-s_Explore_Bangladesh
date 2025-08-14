<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transport;

class TransportController extends Controller
{
    public function addBus()
    {
        return view('admin.transports.addbus');
    }

    public function storeBus(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'route_from' => 'required|string|max:255',
            'route_to' => 'required|string|max:255',
            'departure_time' => 'required',
            'price' => 'required|numeric',
            'total_seats' => 'required|integer',
        ]);

        Transport::create([
            'name' => $request->name,
            'type' => 'bus',
            'route_from' => $request->route_from,
            'route_to' => $request->route_to,
            'departure_time' => $request->departure_time,
            'price' => $request->price,
            'total_seats' => $request->total_seats,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Bus added successfully'
        ], 200);
    }

    public function viewBus()
    {
        $buses = Transport::where('type', 'bus')->get();
        return view('admin.transports.viewbus', compact('buses'));
    }

    public function addTrain()
    {
        return view('admin.transports.addtrain');
    }

    public function storeTrain(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'route_from' => 'required|string|max:255',
            'route_to' => 'required|string|max:255',
            'departure_time' => 'required',
            'price' => 'required|numeric',
            'total_seats' => 'required|integer',
        ]);

        Transport::create([
            'name' => $request->name,
            'type' => 'train',
            'route_from' => $request->route_from,
            'route_to' => $request->route_to,
            'departure_time' => $request->departure_time,
            'price' => $request->price,
            'total_seats' => $request->total_seats,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Train added successfully'
        ], 200);
    }

    public function viewTrain()
    {
        $trains = Transport::where('type', 'train')->get();
        return view('admin.transports.viewtrain', compact('trains'));
    }

    public function destroy($id)
    {
        Transport::destroy($id);
    }
}
