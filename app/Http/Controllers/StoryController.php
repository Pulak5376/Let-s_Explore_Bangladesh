<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    // Show all stories
    public function index()
    {
        $stories = Story::with('user')->latest()->get();
        return response()->json($stories);
    }

    // Store a new story
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $story = Story::create([
            'user_id' => Auth::id() ?? $request->user_id, // fallback for unauthenticated
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($story, 201);
    }

    // Delete a story
    public function destroy($id)
    {
        $story = Story::findOrFail($id);
        // Allow delete if owner or admin, or for demo allow anyone
        $story->delete();
        return response()->json(['message' => 'Story deleted']);
    }
}
