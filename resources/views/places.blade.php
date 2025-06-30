@extends('layouts.app')

@section('title', 'Places')

@section('content')
<section class="places-section" style="padding: 40px; max-width: 1200px; margin: auto;">
  <h1 style="text-align: center; margin-bottom: 30px; font-weight: 700; font-size: 2.5rem; color: #2c3e50;">
    Top Tourist Places in Bangladesh
  </h1>
  <p style="text-align: center; margin-bottom: 50px; color: #7f8c8d; font-size: 1.1rem;">
    Explore the must-visit destinations with exclusive travel packages designed to make your trip memorable.
  </p>

  <div class="places-list" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 25px;">
    @foreach ($places as $place)
    <div class="place-card" style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgb(0 0 0 / 0.1); transition: transform 0.3s ease;">
      <img src="{{ $place['image'] }}" alt="{{ $place['name'] }}" style="width: 100%; height: 160px; object-fit: cover;" />
      <div class="place-info" style="padding: 15px;">
        <h2 style="font-size: 1.3rem; margin-bottom: 8px; color: #34495e;">{{ $place['name'] }}</h2>
        <p style="font-size: 0.95rem; color: #666; margin-bottom: 12px;">{{ $place['description'] }}</p>
        <ul style="list-style: none; padding-left: 0; margin-bottom: 15px; font-size: 0.9rem; color: #555;">
          <li><strong>Duration:</strong> {{ $place['duration'] }}</li>
          <li><strong>Price Package:</strong> ${{ $place['price'] }} per person</li>
        </ul>

        <form action="{{ route('cart.add') }}" method="POST" style="text-align: center;">
          @csrf
          <input type="hidden" name="place_id" value="{{ $place['id'] }}" />
          <button type="submit" 
                  style="background-color: #2980b9; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; font-weight: 600; width: 100%; transition: background-color 0.3s;">
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
    background-color: #1c5980;
  }

  /* Responsive for smaller screens */
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
