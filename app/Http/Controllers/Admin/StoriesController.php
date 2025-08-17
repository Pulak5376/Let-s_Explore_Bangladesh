<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
	public function index()
	{
		$stories = Story::with('user')->latest()->get();
		return view('admin.stories', compact('stories'));
	}

	public function destroy($id)
	{
		$story = Story::findOrFail($id);
		$story->delete();
		return redirect()->route('admin.stories.index')->with('success', 'Story deleted successfully!');
	}
}
