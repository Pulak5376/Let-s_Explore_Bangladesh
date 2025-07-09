<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private $places = [
         [
    'id' => 1,
    'name' => "Cox's Bazar",
    'duration' => '3 Days',
    'price' => 4500,
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg'
  ],
  [
    'id' => 2,
    'name' => 'Sundarban',
    'duration' => '2 Days',
    'price' => 3500,
    'image' => 'https://sundarbantravel.com/wp-content/uploads/2023/02/River_in_Sundarban.jpg'
  ],
  [
    'id' => 3,
    'name' => 'Sreemangal',
    'duration' => '2 Days',
    'price' => 2500,
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/1e/Sreemangal_tea_garden_2017-08-20.jpg'
  ],
  [
    'id' => 4,
    'name' => 'Rangamati',
    'duration' => '3 Days',
    'price' => 2000,
    'image' => 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqMMZ83iuq1LLPmgkmXDrnyMZZyJC4zbRHkxK3BmfwfSL2jL3dTVTkTN9WDLgDCIJ4KAhOyPbs2Uk0V5UP7ScaD02PzxlAdeHKS7hse5ACNYMenq0JeBBQPfCZt6uf81L3P88CT=s680-w680-h510-rw'
  ],
  [
    'id' => 5,
    'name' => 'Bandarban',
    'duration' => '3 Days',
    'price' => 6000,
    'image' => 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrfKrjXKId8O-EqVuAurYfalgeAHOBT4iwE3HysRUhaPPb_o35nrpRfoPTVOjwZwzwvtr6JzxtWShTdeP1uXaQwvyHbRbtooQ67bwWtlOgCP13sSh_XuGYRtJVRuY1syKC62EAA=s680-w680-h510-rw'
  ],
  [
    'id' => 6,
    'name' => 'Sylhet',
    'duration' => '2 Days',
    'price' => 1000,
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/77/Keane_Bridge_and_Ali_Amjad%27s_Clock%2C_Sylhet.jpg'
  ],
  [
    'id' => 7,
    'name' => 'Sajek Valley',
    'duration' => '2 Days',
    'price' => 2500,
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Sajek_Valley_Bangladesh.jpg/800px-Sajek_Valley_Bangladesh.jpg'
  ],
  [
    'id' => 8,
    'name' => 'Kaptai Lake',
    'duration' => '3 Day',
    'price' => 250,
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/Kaptai_Lake_05.jpg/1024px-Kaptai_Lake_05.jpg'
  ],
  [
    'id' => 9,
    'name' => 'Paharpur',
    'duration' => '1 Day',
    'price' => 1000,
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/42/Paharpur_Buddhist_Bihar.jpg'
  ],
  [
    'id' => 10,
    'name' => 'Khagrachari',
    'duration' => '2 Day',
    'price' => 4000,
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Midway_to_Konglak_Hill%2C_Khagrachari%2C_Bangladesh.jpg/800px-Midway_to_Konglak_Hill%2C_Khagrachari%2C_Bangladesh.jpg'
  ]
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

        return redirect()->route('cart')->with('success', $place['name'] . ' package added to your cart!');
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


    public function stories()
    {
        return view('stories');
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
