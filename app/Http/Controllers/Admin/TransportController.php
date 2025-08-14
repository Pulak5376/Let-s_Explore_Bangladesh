<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transport;
use Illuminate\Support\Facades\DB;

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


    public function viewTransports()
    {
        $transports = Transport::all();
        return view('admin.transports.viewtransports', compact('transports'));
    }

    public function destroy($id)
    {
        $transport = Transport::findOrFail($id);
        $transport->delete();
        return redirect()->route('admin.transports.viewtransports')->with('success', 'Transport deleted successfully');
    }

    public function edit($id)
    {
        $transport = Transport::findOrFail($id);
        return view('admin.transports.edittransports', compact('transport'));
    }

    public function update(Request $request, $id)
    {
        $transport = Transport::findOrFail($id);

        $updateData = $request->only([
            'name',
            'route_from',
            'route_to',
            'departure_time',
            'price',
            'total_seats'
        ]);

        $updateData = array_filter($updateData, fn($value) => $value !== null && $value !== '');
        $transport->update($updateData);

        return redirect()->route('admin.transports.viewtransports')
            ->with('success', 'Transport updated successfully');
    }
}
