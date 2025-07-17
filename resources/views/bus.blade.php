@extends('layouts.app')

@section('title', 'Bus Ticket Booking')

@section('content')
<style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  .bus-booking-wrapper {
    height: 100vh;
    width: 100vw;
    background: linear-gradient(135deg, #0f3443, #1c5873);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 1.5rem;
    box-sizing: border-box;
  }

  .bus-booking-container {
    background: white;
    max-width: 420px;
    width: 100%;
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  }

  .bus-booking-container h1 {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1c5873;
    text-align: center;
    margin-bottom: 1.5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
  }

  .bus-booking-container h1 i {
    font-size: 1.25rem;
    color: #1c5873;
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
  }

  label {
    font-weight: 600;
    font-size: 0.875rem;
    margin-bottom: 0.25rem;
    display: block;
    color: #1c5873;
  }

  input[type="text"],
  input[type="date"],
  select {
    width: 100%;
    padding: 0.5rem 1rem;
    border: 1.5px solid #b7cbe7;
    border-radius: 0.375rem;
    font-size: 1rem;
    font-family: inherit;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }

  input[type="text"]:focus,
  input[type="date"]:focus,
  select:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 8px rgba(59, 130, 246, 0.5);
  }

  button[type="submit"] {
    width: 100%;
    padding: 0.9rem 0;
    background-color: #296e8aff;
    color: #fff;
    font-size: 1.1rem;
    font-weight: 700;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    box-shadow: 0 6px 15px rgba(28, 88, 115, 0.5);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
  }

  button[type="submit"]:hover,
  button[type="submit"]:focus {
    background-color: #3460be;
    outline: none;
  }

  @media (min-width: 640px) {
    .bus-booking-container h1 {
      font-size: 2rem;
    }
  }
</style>

<div class="bus-booking-wrapper">
  <div class="bus-booking-container">
    <h1><i class="ph-bus"></i> Bus Ticket Booking</h1>

    <form>
      <div>
        <label for="from">From</label>
        <input type="text" id="from" name="from" placeholder="Departure city" required>
      </div>

      <div>
        <label for="to">To</label>
        <input type="text" id="to" name="to" placeholder="Destination city" required>
      </div>

      <div>
        <label for="date">Date</label>
        <input type="date" id="date" name="date" required>
      </div>

      <div>
        <label for="bus_type">Bus Type</label>
        <select id="bus_type" name="bus_type" required>
          <option value="" disabled selected>Select Bus Type</option>
          <option value="AC">AC</option>
          <option value="Non-AC">Non-AC</option>
          <option value="Sleeper">Sleeper</option>
        </select>
      </div>

      <button type="submit">Search Buses</button>
    </form>
  </div>
</div>
@endsection
