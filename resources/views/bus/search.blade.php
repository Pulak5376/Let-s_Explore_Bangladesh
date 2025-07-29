@extends('layouts.app')

@section('title', 'Bus Ticket Booking')

@section('content')
<div class="bus-booking-wrapper">
  <div class="bus-booking-container">
    <h1><i class="ph-bus"></i> Bus Ticket Booking</h1>

    {{-- Bus Search Form --}}
    <div class="search-form-container">
      <form action="{{ route('bus.search') }}" method="GET">
        @csrf
        <div class="form-row">
          <div class="form-group">
            <label for="from">From</label>
            <input type="text" id="from" name="from" value="{{ old('from') }}" placeholder="e.g. Dhaka" required>
          </div>
          <div class="form-group">
            <label for="to">To</label>
            <input type="text" id="to" name="to" value="{{ old('to') }}" placeholder="e.g. Chittagong" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="date">Journey Date</label>
            <input type="date" id="date" name="date" value="{{ old('date') }}" required>
          </div>
          <div class="form-group">
            <label for="bus_class">Bus Type</label>
            <select id="bus_class" name="bus_class" required>
              <option disabled selected>Select Bus Type</option>
              <option value="Non-AC" @selected(old('bus_class') == 'Non-AC')>Non-AC</option>
              <option value="AC" @selected(old('bus_class') == 'AC')>AC</option>
              <option value="Sleeper" @selected(old('bus_class') == 'Sleeper')>Sleeper</option>
            </select>
          </div>
        </div>
        <button type="submit" class="search-btn">Search Buses</button>
      </form>
    </div>

    {{-- Show Search Results --}}
    @isset($buses)
      <div class="results-container">
        <h2>Available Buses</h2>

        @if ($buses->isEmpty())
          <div class="no-results">
            <p>No buses found for your search criteria.</p>
            <p>Try changing your search parameters or date.</p>
          </div>
        @else
          <div class="bus-results">
            @foreach ($buses as $bus)
              <div class="bus-card">
                <div class="bus-header">
                  <span class="operator">{{ $bus->operator_name ?? 'Bus Service' }}</span>
                  <span class="bus-type {{ strtolower($bus->bus_class) }}">{{ $bus->bus_class }}</span>
                </div>
                <div class="journey-details">
                  <div class="route">
                    <span class="from">{{ $bus->from }}</span>
                    <span class="route-arrow">→</span>
                    <span class="to">{{ $bus->to }}</span>
                  </div>
                  <div class="schedule">
                    <span class="date">{{ $bus->date ? date('d M Y', strtotime($bus->date)) : 'Daily' }}</span>
                    <span class="time">Departure: {{ date('h:i A', strtotime($bus->departure_time)) }}</span>
                  </div>
                </div>
                <div class="bus-footer">
                  <div class="bus-info">
                    <span class="fare">৳{{ $bus->fare }}</span>
                    <span class="seats">{{ $bus->total_seats }} seats available</span>
                  </div>
                  <form action="{{ route('bus.booking') }}" method="POST">
                    @csrf
                    <input type="hidden" name="bus_id" value="{{ $bus->id }}">
                    <div class="booking-controls">
                      <div class="seat-selection">
                        <label for="seats_{{ $bus->id }}">Seats:</label>
                        <input type="number" id="seats_{{ $bus->id }}" name="seats_booked" value="1" min="1" max="{{ $bus->total_seats }}">
                      </div>
                      <button type="submit" class="book-btn">Book Now</button>
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
      <div class="alert success">
        <i class="ph-check-circle"></i> {{ session('success') }}
      </div>
    @endif
  </div>
</div>
@endsection

<style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: 'Inter', sans-serif;
    background: #f5f7fa;
  }

  .bus-booking-wrapper {
    min-height: 100vh;
    width: 100%;
    background: linear-gradient(135deg, #0f3443, #1c5873);
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

  input:focus, select:focus {
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

  /* Results styling */
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

  .bus-type.ac {
    background: #38bdf8;
  }

  .bus-type.non-ac {
    background: #a3a3a3;
  }

  .bus-type.sleeper {
    background: #818cf8;
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

  .from, .to {
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

  .alert {
    padding: 1rem;
    border-radius: 0.5rem;
    margin-top: 1.5rem;
    display: flex;
    align-items: center;
  }

  .alert.success {
    background-color: #dcfce7;
    color: #166534;
    border: 1px solid #86efac;
  }

  .alert i {
    margin-right: 0.5rem;
    font-size: 1.2rem;
  }

  /* Responsive adjustments */
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
    .journey-details, .bus-header, .bus-footer {
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

    h2 {
      font-size: 1.2rem;
    }
  }
</style>