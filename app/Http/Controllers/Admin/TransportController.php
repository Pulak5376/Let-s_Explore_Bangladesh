<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transport;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;

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
            'available_seats' => $request->total_seats,
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
            'available_seats' => $request->total_seats,
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


    public function viewTransports(Request $request)
    {
        $query = Transport::query();
        
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        
        $transports = $query->get();
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

        $request->validate([
            'name' => 'required|string|max:255',
            'route_from' => 'required|string|max:255',
            'route_to' => 'required|string|max:255',
            'departure_time' => 'required',
            'price' => 'required|numeric',
            'total_seats' => 'required|integer|min:1',
            'available_seats' => 'required|integer|min:0|max:' . $request->total_seats,
        ]);

        $updateData = $request->only([
            'name',
            'route_from',
            'route_to',
            'departure_time',
            'price',
            'total_seats',
            'available_seats'
        ]);

        $updateData = array_filter($updateData, fn($value) => $value !== null && $value !== '');
        $transport->update($updateData);

        return redirect()->route('admin.transports.viewtransports')
            ->with('success', 'Transport updated successfully');
    }

    public function searchTransport(Request $request)
    {
        $query = Transport::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('name', 'like', "%$search%")
                    ->orWhere('type', 'like', "%$search%")
                    ->orWhere('route_from', 'like', "%$search%")
                    ->orWhere('route_to', 'like', "%$search%");
            });
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $transports = $query->get();
        $searchTerm = $request->search;

        return view('admin.transports.viewtransports', compact('transports', 'searchTerm'));
    }

    public function viewList(Request $request)
    {
        $transportType = $request->get('transport_type');
        
        if ($transportType) {
            $bookings = Booking::with(['transport'])
                ->where('transport_type', $transportType)
                ->get();
        } else {
            $bookings = Booking::with(['transport'])->get();
        }
        
        return view('admin.bookings.transports.viewlist', compact('bookings'));
    }

    public function destroyBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $transport = Transport::findOrFail($booking->transport_id);
        
        $transport->available_seats += $booking->seats_booked;
        $transport->save();
        
        $booking->delete();
        
        return redirect()->route('admin.bookings.transports.viewlist')
            ->with('success', 'Booking deleted successfully. ' . $booking->seats_booked . ' seats restored.');
    }

    public function searchBookings(Request $request)
    {
        $query = $request->input('search');

        $bookings = Booking::where('id', 'like', "%{$query}%")
            ->orWhere('transport_type', 'like', "%{$query}%")
            ->orWhere('passenger_name', 'like', "%{$query}%")
            ->orWhere('seats_booked', 'like', "%{$query}%")
            ->get();

        return view('admin.bookings.transports.viewlist', compact('bookings'));
    }
}
