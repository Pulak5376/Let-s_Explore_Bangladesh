<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $transports = Transport::latest()->paginate(10);
        return view('admin.transports.index', compact('transports'));
    }

    public function create()
    {
        return view('admin.transports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:bus,train',
            'route_from' => 'required',
            'route_to' => 'required',
            'departure_time' => 'required',
            'price' => 'required|numeric',
            'total_seats' => 'required|integer',
        ]);

        Transport::create($request->all());

        return redirect()->route('admin.transports.index')->with('success', 'Transport added successfully!');
    }

    public function edit(Transport $transport)
    {
        return view('admin.transports.edit', compact('transport'));
    }

    public function update(Request $request, Transport $transport)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:bus,train',
            'route_from' => 'required',
            'route_to' => 'required',
            'departure_time' => 'required',
            'price' => 'required|numeric',
            'total_seats' => 'required|integer',
        ]);

        $transport->update($request->all());

        return redirect()->route('admin.transports.index')->with('success', 'Transport updated successfully!');
    }

    public function destroy(Transport $transport)
    {
        $transport->delete();
        return redirect()->route('admin.transports.index')->with('success', 'Transport deleted successfully!');
    }
}
