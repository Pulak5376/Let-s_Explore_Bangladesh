<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    // Show all stories (web and API)
    public function index(Request $request)
    {
        $stories = Story::with('user')->latest()->get();
        if ($request->wantsJson()) {
            return response()->json($stories);
        }
        return view('stories', compact('stories'));
    }

    // Store a new story (web and API)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $story = Story::create([
            'user_id' => Auth::id() ?? 1, // fallback to user 1 if not logged in
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if ($request->wantsJson()) {
            return response()->json($story, 201);
        }
        return redirect()->route('stories.index');
    }

    // Delete a story (web and API)
    public function destroy(Request $request, $id)
    {
        $story = Story::findOrFail($id);
        $story->delete();
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Story deleted']);
        }
        return redirect()->route('stories.index');
    }
}
