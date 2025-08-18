<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Places;

class CartController extends Controller
{
	public function places()
	{
		$places = Places::all()->map(function($item) { return $item->toArray(); })->toArray();
		return view('places', compact('places'));
	}

	public function about()
	{
		return view('about');
	}

	public function gallery()
	{
		return view('gallery');
	}

	public function contact()
	{
		return view('contact');
	}

	public function cart()
	{
		$cart = session('cart', []);
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
		$id = $request->input('place_id');
		$cart = session('cart', []);
		unset($cart[$id]);
		session(['cart' => $cart]);
		return redirect()->route('cart')->with('success', 'Item removed from cart successfully!');
	}

	// Process payment
	public function checkout(Request $request)
	{
		$cart = session('cart', []);
		
		if (empty($cart)) {
			return redirect()->route('cart')->with('error', 'Your cart is empty!');
		}

		// Calculate total
		$total = 0;
		foreach ($cart as $item) {
			$qty = isset($item['quantity']) ? $item['quantity'] : 1;
			$total += ((float) $item['price']) * $qty;
		}

		// Here you can integrate with payment gateway
		// For now, we'll simulate a successful payment
		
		// Clear cart after successful payment
		session()->forget('cart');
		
		return redirect()->route('places')->with('success', 'Payment successful! Your booking has been confirmed.');
	}
}
