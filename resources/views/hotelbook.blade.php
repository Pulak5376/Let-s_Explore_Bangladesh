@extends('layouts.app')

@section('title', 'Hotel Booking')

@section('content')

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, rgba(0, 106, 78, 0.9), rgba(244, 67, 54, 0.8)), 
                url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1600&q=80');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: #ffffff;
    line-height: 1.6;
    min-height: 100vh;
  }


  .search-section {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    padding: 60px 20px;
    text-align: center;
    margin: 40px 20px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.2);
  }

  .search-section h2 {
    font-size: 36px;
    margin-bottom: 30px;
    color: #ffffff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    font-weight: 600;
  }

  .search-form {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    backdrop-filter: blur(10px);
  }

  .search-form input,
  .search-form button {
    padding: 16px 20px;
    font-size: 16px;
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.1);
    color: #ffffff;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
  }

  .search-form input::placeholder {
    color: rgba(255, 255, 255, 0.7);
  }

  .search-form input:focus {
    outline: none;
    border-color: rgba(255, 255, 255, 0.6);
    background: rgba(255, 255, 255, 0.15);
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
  }

  .search-form button {
    background: linear-gradient(135deg, #00695c, #d32f2f);
    color: white;
    border: none;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0, 105, 92, 0.4);
  }

  .search-form button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(0, 105, 92, 0.6);
    background: linear-gradient(135deg, #d32f2f, #00695c);
  }

  .hotel-listings {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    padding: 50px 30px;
    max-width: 1400px;
    margin: 0 auto;
  }

  .hotel-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
    position: relative;
  }

  .hotel-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    border-color: rgba(255, 255, 255, 0.4);
  }

  .hotel-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .hotel-card:hover img {
    transform: scale(1.05);
  }

  .hotel-info {
    padding: 25px;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
  }

  .hotel-info h3 {
    font-size: 22px;
    color: #ffffff;
    margin-bottom: 12px;
    font-weight: 600;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
  }

  .hotel-info p {
    margin: 8px 0;
    color: rgba(255, 255, 255, 0.9);
    font-size: 16px;
    font-weight: 400;
  }

  .hotel-info button {
    margin-top: 15px;
    padding: 12px 24px;
    background: linear-gradient(135deg, #00695c, #d32f2f);
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 105, 92, 0.4);
    width: 100%;
  }

  .hotel-info button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(0, 105, 92, 0.6);
    background: linear-gradient(135deg, #d32f2f, #00695c);
  }

  @media (max-width: 600px) {
    header {
      flex-direction: column;
      align-items: flex-start;
    }

    nav {
      margin-top: 10px;
    }

    .search-form {
      flex-direction: column;
    }
  }

  /* Dark Mode Styles */
  body.dark-mode {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%) !important;
    color: #e0e0e0 !important;
  }

  body.dark-mode .search-section {
    background: linear-gradient(135deg, #2c2c2c, #3a3a3a) !important;
  }

  body.dark-mode .search-section h2 {
    color: #81c784 !important;
  }

  body.dark-mode .search-form input {
    background: rgba(50, 50, 50, 0.9) !important;
    border-color: #4caf50 !important;
    color: #e0e0e0 !important;
  }

  body.dark-mode .search-form input::placeholder {
    color: #a0a0a0 !important;
  }

  body.dark-mode .search-form button {
    background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
    border-color: #4caf50 !important;
  }

  body.dark-mode .hotel-card {
    background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%) !important;
    border: 1px solid rgba(102, 187, 106, 0.3) !important;
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.2) !important;
  }

  body.dark-mode .hotel-card:hover {
    box-shadow: 0 15px 35px rgba(76, 175, 80, 0.3) !important;
  }

  body.dark-mode .hotel-info h3 {
    color: #66bb6a !important;
  }

  body.dark-mode .hotel-info p {
    color: #a5d6a7 !important;
  }

  body.dark-mode .hotel-info button {
    background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
    border-color: #4caf50 !important;
  }

  body.dark-mode .hotel-info button:hover {
    background: linear-gradient(135deg, #4caf50, #2e7d32) !important;
  }
</style>

<section class="search-section">
  <h2>Find Your Perfect Hotel</h2>
  <form class="search-form" action="{{ route('hotel.search') }}" method="GET">
    <input type="text" name="destination" placeholder="Enter Destination" value="{{ request('destination') }}" required />
    <input type="date" name="checkin" value="{{ request('checkin') }}" required />
    <input type="date" name="checkout" value="{{ request('checkout') }}" required />
    <input type="number" name="guests" placeholder="Guests" min="1" value="{{ request('guests') }}" required />
    <button type="submit">Search</button>
  </form>
</section>

  <section class="hotel-listings">
    @foreach($hotels as $hotel)
    <div class="hotel-card">
      <img src="{{ $hotel->image_url }}" alt="{{ $hotel->name }}" />
      <div class="hotel-info">
        <h3>{{ $hotel->name }}</h3>
        <p>📍 {{ $hotel->location }}</p>
        <p>⭐ {{ $hotel->rating }} | BDT {{ number_format($hotel->price_per_night) }} per night</p>
        <p class="text-sm">{{ $hotel->description }}</p>
        <form action="{{ route('hotel.book', $hotel) }}" method="POST">
          @csrf
          <input type="hidden" name="check_in" value="{{ request('checkin') }}">
          <input type="hidden" name="check_out" value="{{ request('checkout') }}">
          <input type="hidden" name="guests" value="{{ request('guests') }}">
          <button type="submit" @if(!auth()->check()) onclick="alert('Please login first!'); return false;" @endif>
            Book Now ({{ $hotel->available_rooms }} rooms left)
          </button>
        </form>
      </div>
    </div>
    @endforeach

    @if($hotels->isEmpty())
    <div class="no-results">
      <p>No hotels found for your search criteria. Please try different dates or location.</p>
    </div>
    @endif
  </section>

  @if(session('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif
@endsection