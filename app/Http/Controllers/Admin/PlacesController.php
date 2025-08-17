<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Places;

class PlacesController extends Controller
{
    // Show add place form
    public function create()
    {
        return view('admin.places.addplaces');
    }

    // Store new place
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'image_path' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'day' => 'required|string',
            'person' => 'required|string',
        ]);
        Places::create($validated);
        return redirect()->route('admin.places.view')->with('success', 'Place added successfully!');
    }

    // View all places
    public function index()
    {
        $places = Places::all();
        return view('admin.places.viewplaces', compact('places'));
    }
}
