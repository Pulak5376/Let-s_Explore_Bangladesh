@extends('layouts.app')

@section('title', 'Places')

@section('content')
<section class="places-section">
  <h1>Top Tourist Places in Bangladesh</h1>
  <p>Explore the must-visit destinations with exclusive travel packages designed to make your trip memorable.</p>

  <div class="places-list">
    @foreach ($places as $place)
    <div class="place-card">
      <img src="{{ $place['image'] }}" alt="{{ $place['name'] }}" />
      <div class="place-info">
        <h2>{{ $place['name'] }}</h2>
        <p>{{ $place['description'] }}</p>
        <ul>
          <li><strong>Duration:</strong> {{ $place['duration'] }}</li>
          <li><strong>Price Package:</strong> ${{ $place['price'] }} per person</li>
        </ul>

        <form action="{{ route('cart.add') }}" method="POST">
          @csrf
          <input type="hidden" name="place_id" value="{{ $place['id'] }}" />
          <button type="submit" class="book-btn">Add to Cart</button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endsection
