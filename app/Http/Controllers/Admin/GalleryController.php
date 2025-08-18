<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/galleries'), $imageName);
        }

        Gallery::create([
            'title' => $request->title,
            'location' => $request->location,
            'description' => $request->description,
            'image_url' => $imageName ? 'images/galleries/' . $imageName : null,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item added successfully!');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $updateData = [
            'title' => $request->title,
            'location' => $request->location,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($gallery->image_url && file_exists(public_path($gallery->image_url))) {
                unlink(public_path($gallery->image_url));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/galleries'), $imageName);
            $updateData['image_url'] = 'images/galleries/' . $imageName;
        }

        $gallery->update($updateData);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item updated successfully!');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        
        // Delete image file if exists
        if ($gallery->image_url && file_exists(public_path($gallery->image_url))) {
            unlink(public_path($gallery->image_url));
        }
        
        $gallery->delete();
        
        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item deleted successfully!');
    }
}
