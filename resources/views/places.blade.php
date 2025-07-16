@extends('layouts.app')

@section('title', 'Places')

@section('content')
<?php
$places = [
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
?>
<section class="places-section" style="padding: 40px; max-width: 1200px; margin: auto;">
  <h1 style="text-align: center; margin-bottom: 30px; font-weight: 700; font-size: 2.5rem; color:rgba(14, 219, 58, 1);">
    Top Tourist Places in Bangladesh
  </h1>
  <p style="text-align: center; margin-bottom: 50px; color:rgb(126, 140, 141); font-size: 1.1rem;">
    Explore the must-visit destinations with exclusive travel packages designed to make your trip memorable.
  </p>

  <div class="places-list" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 25px;">
    @foreach ($places as $place)
    <div class="place-card" style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgb(0 0 0 / 0.1); transition: transform 0.3s ease;">
      <img src="{{ $place['image'] }}" alt="{{ $place['name'] }}" style="width: 100%; height: 160px; object-fit: cover;" />
      <div class="place-info" style="padding: 15px;">
        <h2 style="font-size: 1.3rem; margin-bottom: 8px; color:rgb(52, 73, 94);">{{ $place['name'] }}</h2>
        <ul>
          <li><strong>Duration:</strong> {{ $place['duration'] }}</li>
          <li><strong>Package:</strong> BDT {{ $place['price'] }}/- per person</li>
        </ul>

        <form action="{{ route('cart.add') }}" method="POST" style="text-align: center;">
          @csrf
          <input type="hidden" name="place_id" value="{{ $place['id'] }}" />
          <button type="submit" 
                  style="background-color:rgb(51, 139, 197); color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; font-weight: 600; width: 100%; transition: background-color 0.3s;">
            Add to Cart
          </button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
</section>

<style>
  .place-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 20px rgb(0 0 0 / 0.15);
  }
  button.book-btn:hover {
    background-color:rgb(36, 114, 163);
  }

  @media (max-width: 1024px) {
    .places-list {
      grid-template-columns: repeat(2, 1fr);
    }
  }
  @media (max-width: 600px) {
    .places-list {
      grid-template-columns: 1fr;
    }
  }
</style>
@endsection
