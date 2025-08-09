@extends('layouts.app')

@section('title', 'Bus Ticket Booking')

@section('content')
<div class="bus-booking-wrapper">
  <div class="bus-booking-container">
    <h1><i class="ph-bus"></i> Bus Ticket Booking</h1>

    {{-- Bus Search Form --}}
    <div class="search-form-container">
      <form action="{{ route('bus.search') }}" method="POST">
        @csrf
        <input type="hidden" name="type" value="bus">
        <div class="form-row">
          <div class="form-group">
            <label for="from">From</label>
            <input type="text" id="from" name="from" value="{{ old('from') }}" placeholder="e.g. Dhaka" required>
          </div>
          <div class="form-group">
            <label for="to">To</label>
            <input type="text" id="to" name="to" value="{{ old('to') }}" placeholder="e.g. Chittagong" required>
          </div>
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" value="{{ old('date') }}" placeholder="e.g. 2023-12-31" required>
          </div>
        </div>
        <button type="submit" class="search-btn">Search Buses</button>
      </form>
    </div>

    {{-- Show Search Results --}}
    @isset($transports)
    <div class="results-container">
      <h2>Available Buses</h2>

      @if ($transports->isEmpty())
      <div class="no-results">
        <p>No buses found for your search criteria.</p>
      </div>
      @else
      <div class="bus-results">
        @foreach ($transports as $bus)
        <div class="bus-card">
          <div class="bus-header">
            <span class="operator">{{ $bus->name ?? 'Bus Service' }}</span>
            <span class="bus-type">{{ ucfirst($bus->type) }}</span>
          </div>
          <div class="journey-details">
            <div class="route">
              <span class="from">{{ $bus->route_from }}</span>
              <span class="route-arrow">→</span>
              <span class="to">{{ $bus->route_to }}</span>
            </div>
            <div class="schedule">
              <span class="time">Departure: {{ $bus->departure_time }}</span>
            </div>
          </div>
          <div class="bus-footer">
            <div class="bus-info">
              <span class="fare">৳{{ $bus->price }}</span>
              <span class="seats">{{ $bus->total_seats }} seats available</span>
            </div>
            <form action="{{ url($bus->type.'/book') }}" method="POST" style="width:100%;" class="bus-book-form">
              @csrf
              <input type="hidden" name="transport_id" value="{{ $bus->id }}">
              <div class="booking-controls">
                <div class="seat-selection">
                  <label for="seats_{{ $bus->id }}">Seats:</label>
                  <input type="number" id="seats_{{ $bus->id }}" name="seats_booked" value="1" min="1" max="{{ $bus->total_seats }}">
                </div>
                <button type="button" class="book-btn show-passenger-btn">Book Now</button>
              </div>
              <div class="passenger-info" style="display:none; margin-top:0.7rem;">
                <input type="text" name="passenger_name" placeholder="Name" required>
                <input type="email" name="passenger_email" placeholder="Email" required>
                <input type="text" name="passenger_phone" placeholder="Phone" required>
                <button type="submit" class="book-btn" style="margin-left:0.5rem;">Confirm Booking</button>
              </div>
            </form>
          </div>
        </div>
        @endforeach
      </div>
      @endif
    </div>
    @endisset

    @if(session('success'))
    <div id="msg-box" class="{{ session('success') ? 'success show' : '' }} {{ session('error') ? 'error show' : '' }}">
      {{ session('success') ?? session('error') }}
    </div>
    @endif
  </div>
</div>
@endsection

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const msgBox = document.getElementById('msg-box');
    if (msgBox && msgBox.classList.contains('show')) {
      setTimeout(() => {
        msgBox.classList.remove('show');
      }, 4000);
    }

    // Book Now button logic
    document.querySelectorAll('.bus-book-form').forEach(function(form) {
      var showBtn = form.querySelector('.show-passenger-btn');
      var passengerInfo = form.querySelector('.passenger-info');
      if (showBtn && passengerInfo) {
        showBtn.addEventListener('click', function(e) {
          // Hide all other passenger-info forms
          document.querySelectorAll('.bus-book-form .passenger-info').forEach(function(pi) {
            if (pi !== passengerInfo) pi.style.display = 'none';
          });
          // Show this one
          if (passengerInfo.style.display === 'none' || passengerInfo.style.display === '') {
            passengerInfo.style.display = 'flex';
          } else {
            passengerInfo.style.display = 'none';
          }
        });
      }
    });
  });
</script>

<style>
  html,
  body {
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: 'Inter', sans-serif;
    background: #f5f7fa;
  }

  .bus-booking-wrapper {
    min-height: 100vh;
    width: 100%;
    background-size: cover;
    display: flex;
    justify-content: center;
    padding: 2rem 1rem;
    box-sizing: border-box;
  }

  .bus-booking-container {
    background: white;
    width: 100%;
    max-width: 1000px;
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  }

  h1 {
    text-align: center;
    color: #1c5873;
    margin-bottom: 1.5rem;
    font-size: 1.8rem;
  }

  h2 {
    color: #1c5873;
    margin: 1rem 0;
    font-size: 1.5rem;
    border-bottom: 2px solid #eaeaea;
    padding-bottom: 0.5rem;
  }

  .search-form-container {
    background: #f8fafc;
    padding: 1.5rem;
    border-radius: 0.5rem;
    border: 1px solid #e0e7ee;
    margin-bottom: 2rem;
  }

  .form-row {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
  }

  .form-group {
    flex: 1;
  }

  label {
    display: block;
    margin-bottom: 0.5rem;
    color: #333;
    font-weight: 500;
  }

  input[type="text"],
  input[type="date"],
  select,
  input[type="number"] {
    width: 100%;
    padding: 0.75rem;
    border-radius: 0.375rem;
    border: 1px solid #d1d5db;
    font-size: 1rem;
    box-sizing: border-box;
    background-color: white;
  }

  input:focus,
  select:focus {
    outline: none;
    border-color: #1c5873;
    box-shadow: 0 0 0 3px rgba(28, 88, 115, 0.1);
  }

  .search-btn {
    background-color: #1c5873;
    color: white;
    padding: 0.75rem 1rem;
    border-radius: 0.375rem;
    border: none;
    cursor: pointer;
    width: 100%;
    font-size: 1rem;
    font-weight: 500;
    margin-top: 0.5rem;
    transition: background-color 0.2s;
  }

  .search-btn:hover {
    background-color: #164963;
  }

  .results-container {
    margin-top: 2rem;
  }

  .no-results {
    text-align: center;
    padding: 2rem;
    background: #f8fafc;
    border-radius: 0.5rem;
    color: #4b5563;
  }

  .bus-results {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .bus-card {
    background: #f8fafc;
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    border: 1px solid #e0e7ee;
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .bus-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }

  .bus-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 1rem;
    background: #1c5873;
    color: white;
  }

  .operator {
    font-weight: 600;
    font-size: 1.1rem;
  }

  .bus-type {
    font-size: 0.85rem;
    padding: 0.25rem 0.5rem;
    border-radius: 50px;
    background: rgba(255, 255, 255, 0.2);
  }


  .journey-details {
    padding: 1rem;
    border-bottom: 1px solid #e0e7ee;
  }

  .route {
    display: flex;
    align-items: center;
    font-size: 1.2rem;
    margin-bottom: 0.75rem;
  }

  .route-arrow {
    margin: 0 0.5rem;
    color: #64748b;
  }

  .from,
  .to {
    font-weight: 500;
  }

  .schedule {
    display: flex;
    justify-content: space-between;
    font-size: 0.9rem;
    color: #64748b;
  }

  .bus-footer {
    padding: 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .bus-info {
    display: flex;
    flex-direction: column;
  }

  .fare {
    font-size: 1.2rem;
    font-weight: 600;
    color: #1c5873;
  }

  .seats {
    font-size: 0.85rem;
    color: #64748b;
  }

  .booking-controls {
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .seat-selection {
    display: flex;
    align-items: center;
  }

  .seat-selection label {
    margin: 0 0.5rem 0 0;
  }

  .seat-selection input {
    width: 60px;
    text-align: center;
  }

  .book-btn {
    background-color: #16a34a;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    border: none;
    cursor: pointer;
    font-weight: 500;
    transition: background-color 0.2s;
  }

  .book-btn:hover {
    background-color: #15803d;
  }

  .passenger-info {
    display: flex;
    flex-direction: row;
    gap: 0.75rem;
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
    width: 100%;
  }

  .passenger-info input[type="text"],
  .passenger-info input[type="email"] {
    flex: 1 1 0;
    min-width: 0;
    padding: 0.5rem 0.75rem;
    border-radius: 0.375rem;
    border: 1px solid #d1d5db;
    font-size: 1rem;
    background-color: #f9fafb;
    margin: 0;
  }

  .passenger-info input:focus {
    outline: none;
    border-color: #1c5873;
    box-shadow: 0 0 0 2px rgba(28, 88, 115, 0.08);
    background-color: #fff;
  }

  #msg-box {
    position: fixed;
    top: 32px;
    left: 50%;
    transform: translateX(-50%) translateY(-40px);
    min-width: 320px;
    max-width: 90vw;
    z-index: 9999;
    padding: 1rem 2rem;
    border-radius: 10px;
    font-size: 1.08rem;
    font-weight: 600;
    text-align: center;
    display: none;
    opacity: 0;
    transition: opacity 0.4s, transform 0.4s;
    box-shadow: 0 4px 18px rgba(44, 62, 80, 0.10);
    letter-spacing: 0.01em;
  }

  #msg-box.show {
    display: block;
    opacity: 1;
    transform: translateX(-50%) translateY(0);
  }

  #msg-box.success {
    background: linear-gradient(90deg, #e6f9ed 80%, #b2f7cc 100%);
    color: #20734c;
    border: 2px solid #4caf50;
    box-shadow: 0 2px 12px rgba(76, 175, 80, 0.10);
  }

  #msg-box.success::before {
    content: "✔ ";
    font-size: 1.2em;
    color: #43a047;
    margin-right: 0.5em;
  }

  #msg-box.error {
    background: linear-gradient(90deg, #ffeaea 80%, #ffd6d6 100%);
    color: #b71c1c;
    border: 2px solid #e53935;
    box-shadow: 0 2px 12px rgba(229, 57, 53, 0.10);
  }

  #msg-box.error::before {
    content: "✖ ";
    font-size: 1.2em;
    color: #e53935;
    margin-right: 0.5em;
  }


  @media (max-width: 768px) {
    .form-row {
      flex-direction: column;
      gap: 0.5rem;
    }

    .bus-booking-container {
      padding: 1rem;
    }

    .bus-footer {
      flex-direction: column;
      align-items: stretch;
      gap: 1rem;
    }

    .booking-controls {
      flex-direction: column;
      align-items: stretch;
    }

    .seat-selection {
      margin-bottom: 0.5rem;
    }
  }

  @media (max-width: 480px) {

    .journey-details,
    .bus-header,
    .bus-footer {
      padding: 0.75rem;
    }

    .route {
      font-size: 1rem;
    }

    .fare {
      font-size: 1.1rem;
    }

    h1 {
      font-size: 1.5rem;
    }

    .passenger-info {
      flex-direction: column;
      gap: 0.5rem;
    }

    h2 {
      font-size: 1.2rem;
    }
  }
</style>