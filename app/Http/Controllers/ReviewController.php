<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    // GET /reviews
    public function index()
    {
        // সব রিভিউ নতুন থেকে পুরোনো করে নেওয়া হচ্ছে
        $reviews = Review::latest()->get();

        // view-এ $reviews পাঠানো হচ্ছে
        return view('reviews.create', compact('reviews'));
    }

    // POST /reviews
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
