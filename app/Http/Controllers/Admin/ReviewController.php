<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('admin.review', compact('reviews'));
    }
    public function destroy($id){
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('admin.review')->with('success', 'Review deleted successfully!');
    }
}

