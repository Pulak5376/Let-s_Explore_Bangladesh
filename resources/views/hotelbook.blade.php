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
    <img src="https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg" alt="Hotel Seaside image" />
    <div class="hotel-info">
      <h3>Hotel Seaside</h3>
      <p>📍 Cox's Bazar</p>
      <p>⭐ 4.5 | BDT 2500 per night</p>
      <button>Book Now</button>
    </div>
  </div>

  <div class="hotel-card">
    <img src="https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrfKrjXKId8O-EqVuAurYfalgeAHOBT4iwE3HysRUhaPPb_o35nrpRfoPTVOjwZwzwvtr6JzxtWShTdeP1uXaQwvyHbRbtooQ67bwWtlOgCP13sSh_XuGYRtJVRuY1syKC62EAA=s680-w680-h510-rw" alt="Mountain View Inn image" />
    <div class="hotel-info">
      <h3>Mountain View Inn</h3>
      <p>📍 Bandarban</p>
      <p>⭐ 4.7 | BDT 2000 per night</p>
      <button>Book Now</button>
    </div>
  </div>

  <div class="hotel-card">
    <img src="https://upload.wikimedia.org/wikipedia/commons/1/1e/Sreemangal_tea_garden_2017-08-20.jpg" alt="Hotel Seaside image" />
    <div class="hotel-info">
      <h3>Grand Sultan</h3>
      <p>📍 Sreemangal</p>
      <p>⭐ 4.5 | BDT 2500 per night</p>
      <button>Book Now</button>
    </div>
  </div>

  <div class="hotel-card">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Sajek_Valley_Bangladesh.jpg/800px-Sajek_Valley_Bangladesh.jpg" alt="Hotel Seaside image" />
    <div class="hotel-info">
      <h3>Hotel Paraside</h3>
      <p>📍 Sajek Valley</p>
      <p>⭐ 4.5 | BDT 2500 per night</p>
      <button>Book Now</button>
    </div>
  </div>
</section>

@endsection
