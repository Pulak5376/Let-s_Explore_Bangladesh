@extends('layouts.app')

@section('title', 'Flight Booking')

@section('content')
<style>
  body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://images.unsplash.com/photo-1517602302552-471fe67acf66?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover;
    min-height: 100vh;
    color: #fff;
  }

  .flight-booking {
    padding: 60px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .flight-booking h2 {
    font-size: 36px;
    margin-bottom: 30px;
    color: #f9f9f9;
  }

  .search-form {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);
    border-radius: 16px;
    padding: 30px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    width: 100%;
    max-width: 900px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
  }

  .search-form label {
    display: flex;
    flex-direction: column;
    color: #fff;
    font-size: 14px;
  }

  .search-form input,
  .search-form select {
    margin-top: 6px;
    padding: 12px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    background: #ffffffee;
    color: #000;
  }

  .search-form button {
    grid-column: 1 / -1;
    padding: 14px;
    border: none;
    background-color: #00b894;
    color: white;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .search-form button:hover {
    background-color: #009d80;
  }
</style>

<section class="flight-booking">
  <h2>✈️ Book Your Flight</h2>
  <form class="search-form">
    <label>
      From:
      <input type="text" placeholder="e.g., Dhaka" required>
    </label>
    <label>
      To:
      <input type="text" placeholder="e.g., Cox's Bazar" required>
    </label>
    <label>
      Departure Date:
      <input type="date" required>
    </label>
    <label>
      Return Date:
      <input type="date">
    </label>
    <label>
      Class:
      <select required>
        <option value="">Select</option>
        <option>Economy</option>
        <option>Business</option>
        <option>First Class</option>
      </select>
    </label>
    <label>
      Passengers:
      <input type="number" min="1" placeholder="No. of people" required>
    </label>
    <button type="submit">Search Flights</button>
  </form>
</section>
@endsection
