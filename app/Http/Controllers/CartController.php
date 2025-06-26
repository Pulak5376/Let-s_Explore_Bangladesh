<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private $places = [
        [
            'id' => 1,
            'name' => "Cox's Bazar",
            'description' => 'Longest natural sea beach in the world.',
            'price' => 200,
            'duration' => '5 days / 4 nights',
            'image' => 'https://th.bing.com/th/id/OIP.PxGv6Xc7rI5ZU1NgDTG0fwHaEo?w=276&h=180&c=7&r=0&o=7&pid=1.7&rm=3',
        ],
        [
            'id' => 2,
            'name' => "Bandarban",
            'description' => 'Scenic hills, waterfalls, and tribal culture.',
            'price' => 180,
            'duration' => '4 days / 3 nights',
            'image' => 'https://th.bing.com/th/id/OIP.tOxT05hSKDmO2bwI2WfpRwHaFj?w=236&h=180&c=7&r=0&o=7&pid=1.7&rm=3',
        ],
        // add more places if you want
    ];

    public function places()
    {
        return view('places', ['places' => $this->places]);
    }

    public function add(Request $request)
    {
        $placeId = $request->input('place_id');

        $place = collect($this->places)->firstWhere('id', $placeId);
        if (!$place) {
            return redirect()->route('places')->with('error', 'Place not found');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$placeId])) {
            $cart[$placeId]['quantity']++;
        } else {
            $cart[$placeId] = [
                "id" => $place['id'],
                "name" => $place['name'],
                "price" => $place['price'],
                "quantity" => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', $place['name'] . ' added to your cart!');
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('cart', compact('cart', 'total'));
    }

    public function remove(Request $request)
    {
        $placeId = $request->input('place_id');
        $cart = session()->get('cart', []);
        if (isset($cart[$placeId])) {
            unset($cart[$placeId]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart')->with('success', 'Item removed from cart');
    }

    // Add these new methods for missing pages:

    public function culture()
    {
        return view('culture');
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
}
