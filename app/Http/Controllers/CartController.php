<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Places;

class CartController extends Controller
{
	// Show all places to user
	public function places()
	{
		// Fetch all places as array for compatibility with current Blade
		$places = Places::all()->map(function($item) { return $item->toArray(); })->toArray();
		return view('places', compact('places'));
	}

	// About page
	public function about()
	{
		return view('about');
	}

	// Gallery page
	public function gallery()
	{
		return view('gallery');
	}

	// Contact page
	public function contact()
	{
		return view('contact');
	}

	// Show cart
	public function cart()
	{
		$cart = session('cart', []);
		return view('cart', compact('cart'));
	}

	// Add to cart
	public function add(Request $request)
	{
		$id = $request->input('id');
		$place = Places::find($id);
		if ($place) {
			$cart = session('cart', []);
			$cart[$id] = $place->toArray();
			session(['cart' => $cart]);
		}
		return redirect()->route('cart');
	}

	// Remove from cart
	public function remove(Request $request)
	{
		$id = $request->input('id');
		$cart = session('cart', []);
		unset($cart[$id]);
		session(['cart' => $cart]);
		return redirect()->route('cart');
	}
}
