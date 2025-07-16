@extends('layouts.app')

@section('title', 'Places')

@section('content')

<style>
/* Keep all your CSS here (same as before) */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background: #f9fcfd;
  color: #333;
}

.flight-booking {
  padding: 50px 20px;
  background: #e6fafa;
  text-align: center;
}

.flight-booking h2 {
  font-size: 28px;
  margin-bottom: 10px;
}

.subtitle {
  font-size: 16px;
  color: #555;
  margin-bottom: 25px;
}

.flight-form {
  max-width: 800px;
  margin: auto;
}

.flight-form .row {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  justify-content: center;
  margin-bottom: 15px;
}

.flight-form input,
.flight-form select {
  padding: 12px;
  border-radius: 6px;
  border: 1px solid #bbb;
  font-size: 16px;
  width: 45%;
  min-width: 180px;
}

.flight-form label {
  display: flex;
  flex-direction: column;
  text-align: left;
  font-size: 14px;
  color: #333;
  width: 45%;
}

.flight-form button {
  background: #006666;
  color: white;
  border: none;
  padding: 12px 30px;
  border-radius: 6px;
  font-size: 16px;
  cursor: pointer;
  margin-top: 10px;
}

.flight-form button:hover {
  background: #004d4d;
}

.flight-results {
  padding: 40px 20px;
  max-width: 900px;
  margin: auto;
}

.flight-results h3 {
  text-align: center;
  font-size: 24px;
  margin-bottom: 30px;
}

.flight-card {
  background: white;
  border-radius: 10px;
  display: flex;
  justify-content: space-between;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.07);
  transition: 0.3s ease;
}

.flight-card:hover {
  transform: translateY(-3px);
}

.flight-info h4 {
  margin-bottom: 5px;
  color: #006666;
}

.flight-meta {
  text-align: right;
}

.flight-meta .price {
  font-size: 20px;
  font-weight: bold;
  color: #008080;
  margin-bottom: 5px;
}

.flight-meta button {
  background: #008080;
  border: none;
  color: white;
  padding: 8px 16px;
  border-radius: 6px;
  cursor: pointer;
}

.flight-meta button:hover {
  background: #005959;
}
</style>

<!-- Flight Booking Section -->
<section class="flight-booking">
  <h2>Book Your Next Flight</h2>
  <p class="subtitle">Smart, easy and fast flight booking at your fingertips.</p>

  <form class="flight-form">
    <div class="row">
      <input type="text" placeholder="From (e.g., DAC - Dhaka)" required />
      <input type="text" placeholder="To (e.g., SIN - Singapore)" required />
    </div>
    <div class="row">
      <label>
        Departure:
        <input type="date" required />
      </label>
      <label>
        Return:
        <input type="date" required />
      </label>
    </div>
    <div class="row">
      <select required>
        <option value="">Select Travel Class</option>
        <option>Economy</option>
        <option>Premium Economy</option>
        <option>Business</option>
        <option>First Class</option>
      </select>
      <input type="number" placeholder="Passengers" min="1" required />
    </div>
    <button type="submit">Search Flights</button>
  </form>
</section>

<!-- Flight Result Section -->
<section class="flight-results">
  <h3>🔥 Featured Flights</h3>

  <div class="flight-card">
    <div class="flight-info">
      <h4>🛫 Biman Bangladesh</h4>
      <p>DAC → DXB</p>
      <p>Depart: 10:00 AM | Arrive: 2:30 PM</p>
    </div>
    <div class="flight-meta">
      <p class="price">৳ 18,900</p>
      <p>Economy</p>
      <button>Book Now</button>
    </div>
  </div>

  <div class="flight-card">
    <div class="flight-info">
      <h4>🛫 Qatar Airways</h4>
      <p>DAC → DOH</p>
      <p>Depart: 3:45 PM | Arrive: 6:50 PM</p>
    </div>
    <div class="flight-meta">
      <p class="price">৳ 24,500</p>
      <p>Business</p>
      <button>Book Now</button>
    </div>
  </div>
</section>

@endsection
