<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{

    public function index()
    {
      
        $reviews = Review::latest()->get();

      
        return view('reviews.create', compact('reviews'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create($request->only('name', 'review', 'rating'));

        return redirect()->route('reviews.index')->with('success', 'Review submitted successfully!');
    }
}
