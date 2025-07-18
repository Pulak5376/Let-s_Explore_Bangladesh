@extends('layouts.app')

@section('title', 'Places')

@section('content')

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Poppins', sans-serif;
    background-color: #f9f9f9;
    color: #333;
    line-height: 1.6;
  }

  .search-section {
    background: linear-gradient(135deg, #d9f5f2, #ffffff);
    padding: 60px 20px;
    text-align: center;
  }

  .search-section h2 {
    font-size: 32px;
    margin-bottom: 30px;
    color: #004c4c;
  }

  .search-form {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px;
    max-width: 1000px;
    margin: 0 auto;
  }

  .search-form input,
  .search-form button {
    padding: 14px 16px;
    font-size: 16px;
    border-radius: 8px;
    border: 1px solid #ccc;
    min-width: 200px;
  }

  .search-form button {
    background-color: #006d77;
    color: white;
    border: none;
    transition: background 0.3s;
  }

  .search-form button:hover {
    background-color: #005f68;
  }

  .hotel-listings {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
    padding: 50px 30px;
  }

  .hotel-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    transition: transform 0.3s ease;
  }

  .hotel-card:hover {
    transform: translateY(-5px);
  }

  .hotel-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
  }

  .hotel-info {
    padding: 20px;
  }

  .hotel-info h3 {
    font-size: 20px;
    color: #006d77;
    margin-bottom: 8px;
  }

  .hotel-info p {
    margin: 5px 0;
    color: #555;
    font-size: 15px;
  }

  .hotel-info button {
    margin-top: 12px;
    padding: 10px 18px;
    background-color: #006d77;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 15px;
    cursor: pointer;
    transition: background 0.3s;
  }

  .hotel-info button:hover {
    background-color: #004f54;
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
  <form class="search-form" action="#" method="GET">
    <input type="text" name="destination" placeholder="Enter Destination" required />
    <input type="date" name="checkin" required />
    <input type="date" name="checkout" required />
    <input type="number" name="guests" placeholder="Guests" min="1" required />
    <button type="submit">Search</button>
  </form>
</section>

<section class="hotel-listings">
  <div class="hotel-card">
    <img src="https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg" alt="Hotel Seaside" />
    <div class="hotel-info">
      <h3>Hotel Seaside</h3>
      <p>📍 Cox's Bazar</p>
      <p>⭐ 4.5 | BDT 2500 per night</p>
      <button>Book Now</button>
    </div>
  </div>

  <div class="hotel-card">
    <img src="https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrfKrjXKId8O-EqVuAurYfalgeAHOBT4iwE3HysRUhaPPb_o35nrpRfoPTVOjwZwzwvtr6JzxtWShTdeP1uXaQwvyHbRbtooQ67bwWtlOgCP13sSh_XuGYRtJVRuY1syKC62EAA=s680-w680-h510-rw" alt="Mountain View Inn" />
    <div class="hotel-info">
      <h3>Mountain View Inn</h3>
      <p>📍 Bandarban</p>
      <p>⭐ 4.7 | BDT 2000 per night</p>
      <button>Book Now</button>
    </div>
  </div>

  <div class="hotel-card">
    <img src="https://upload.wikimedia.org/wikipedia/commons/1/1e/Sreemangal_tea_garden_2017-08-20.jpg" alt="Grand Sultan" />
    <div class="hotel-info">
      <h3>Grand Sultan</h3>
      <p>📍 Sreemangal</p>
      <p>⭐ 4.5 | BDT 2500 per night</p>
      <button>Book Now</button>
    </div>
  </div>

  <div class="hotel-card">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Sajek_Valley_Bangladesh.jpg/800px-Sajek_Valley_Bangladesh.jpg" alt="Hotel Paraside" />
    <div class="hotel-info">
      <h3>Hotel Paraside</h3>
      <p>📍 Sajek Valley</p>
      <p>⭐ 4.5 | BDT 2500 per night</p>
      <button>Book Now</button>
    </div>
  </div>

  <!-- New Hotel Entries -->
  <div class="hotel-card">
    <img src="{{ asset('images/kuakataresort.jpg') }}" alt="Hotel Ocean Breeze Kuakata" />
    <div class="hotel-info">
      <h3>Ocean Breeze Resort</h3>
      <p>📍 Kuakata</p>
      <p>⭐ 4.3 | BDT 2200 per night</p>
      <button>Book Now</button>
    </div>
  </div>

  <div class="hotel-card">
    <img src="{{ asset('images/sylhetresort.jpg') }}" alt="Sylhet Hill View Resort" />
    <div class="hotel-info">
      <h3>Hill View Resort</h3>
      <p>📍 Sylhet</p>
      <p>⭐ 4.6 | BDT 2700 per night</p>
      <button>Book Now</button>
    </div>
  </div>

  <div class="hotel-card">
    <img src="{{ asset('images/mirinjaresort.jpg') }}" alt="Mirinja View Resort" />
    <div class="hotel-info">
      <h3>Mirinja View Resort</h3>
      <p>📍 Mirinja, Bandarban</p>
      <p>⭐ 4.4 | BDT 2400 per night</p>
      <button>Book Now</button>
    </div>
  </div>

  <div class="hotel-card">
    <img src="{{ asset('images/alikadamresort.jpg') }}" alt="Alikadam Valley Inn" />
    <div class="hotel-info">
      <h3>Alikadam Valley Inn</h3>
      <p>📍 Alikadam</p>
      <p>⭐ 4.2 | BDT 2100 per night</p>
      <button>Book Now</button>
    </div>
  </div>
</section>

@endsection
