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
		// Ensure every cart item has a quantity
		foreach ($cart as $k => $item) {
			if (!isset($cart[$k]['quantity'])) {
				$cart[$k]['quantity'] = 1;
			}
		}
		session(['cart' => $cart]);

		// Calculate total
		$total = 0;
		foreach ($cart as $item) {
			$qty = isset($item['quantity']) ? $item['quantity'] : 1;
			$total += ((float) $item['price']) * $qty;
		}

		return view('cart', compact('cart', 'total'));
	}

	// Add to cart
	public function add(Request $request)
	{
		$id = $request->input('id');
		$place = Places::find($id);
		if ($place) {
			$cart = session('cart', []);
			if (isset($cart[$id])) {
				if (isset($cart[$id]['quantity'])) {
					$cart[$id]['quantity'] += 1;
				} else {
					$cart[$id]['quantity'] = 2; // Already in cart, so set to 2
				}
			} else {
				$cart[$id] = $place->toArray();
				$cart[$id]['quantity'] = 1;
			}
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
