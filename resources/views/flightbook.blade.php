@extends('layouts.app')

@section('title', 'Flight Booking')

@section('content')
<div class="booking-wrapper">
    <div class="booking-container">
        <div class="header">
            <h1><i class="fas fa-plane"></i> Flight Booking</h1>
            <p>Find and book your flights easily</p>
        </div>


        <form action="{{ route('flightbook') }}" method="GET" class="search-form">
            <div class="search-grid">
                <div class="input-group">
                    <label for="from">From</label>
                    <input type="text" id="from" name="from" value="{{ request('from') }}" placeholder="Departure airport/city" required>
                </div>
                <div class="input-group">
                    <label for="to">To</label>
                    <input type="text" id="to" name="to" value="{{ request('to') }}" placeholder="Destination airport/city" required>
                </div>
                <div class="input-group">
                    <label for="departure_date">Departure Date</label>
                    <input type="date" id="departure_date" name="departure_date" value="{{ request('departure_date') }}" required>
                </div>
                <div class="input-group">
                    <label for="class">Class</label>
                    <select id="class" name="class" required>
                        <option value="">Select</option>
                        <option value="Economy" {{ request('class') == 'Economy' ? 'selected' : '' }}>Economy</option>
                        <option value="Business" {{ request('class') == 'Business' ? 'selected' : '' }}>Business</option>
                        <option value="First Class" {{ request('class') == 'First Class' ? 'selected' : '' }}>First Class</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="search-btn">
                <i class="fas fa-search"></i> Search Flights
            </button>
        </form>

        @isset($flights)
            <div class="results">
                <h2><i class="fas fa-list"></i> Available Flights ({{ $flights->count() }})</h2>
                @forelse ($flights as $flight)
                    <div class="transport-card">
                        <div class="card-header">
                            <div class="transport-name">
                                <i class="fas fa-plane"></i>
                                <span>{{ $flight->airline }} ({{ $flight->flight_number }})</span>
                            </div>
                            <span class="transport-type">{{ $flight->class }}</span>
                        </div>
                        <div class="card-body">
                            <div class="route-info">
                                <div class="route">
                                    <span class="station">{{ $flight->from }}</span>
                                    <i class="fas fa-arrow-right"></i>
                                    <span class="station">{{ $flight->to }}</span>
                                </div>
                                <div class="time">
                                    <i class="fas fa-clock"></i>
                                    Departure: {{ $flight->departure_date }}
                                </div>
                            </div>
                            <div class="pricing">
                                <div class="price">৳{{ $flight->price }}</div>
                                <div class="seats">{{ $flight->seats_available }} seats</div>
                            </div>
                        </div>
                        <form action="{{ route('flightbook.store') }}" method="POST" class="booking-form">
                            @csrf
                            <input type="hidden" name="from" value="{{ $flight->from }}">
                            <input type="hidden" name="to" value="{{ $flight->to }}">
                            <input type="hidden" name="departure_date" value="{{ $flight->departure_date }}">
                            <input type="hidden" name="return_date" value="{{ request('return_date') }}">
                            <input type="hidden" name="class" value="{{ $flight->class }}">
                            <input type="hidden" name="flight_id" value="{{ $flight->id }}">
                            <div class="booking-controls">
                                <div class="seat-selector">
                                    <label>Passengers:</label>
                                    <input type="number" name="passengers" value="1" min="1" max="{{ $flight->seats_available }}">
                                </div>
                                <button type="button" class="book-btn" onclick="togglePassenger(this)">
                                    <i class="fas fa-ticket-alt"></i> Book Now
                                </button>
                            </div>
                            <div class="passenger-form" style="display:none;">
                                <input type="text" name="passenger_name" placeholder="Full Name" required>
                                <input type="email" name="passenger_email" placeholder="Email Address" required>
                                <input type="tel" name="passenger_phone" placeholder="Phone Number" required>
                                <button type="submit" class="confirm-btn">
                                    <i class="fas fa-check"></i> Confirm Booking
                                </button>
                            </div>
                        </form>
                    </div>
                @empty
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <h3>No flights found</h3>
                        <p>Try different airports or dates</p>
                    </div>
                @endforelse
            </div>
        @endisset

        @if(session('success') || session('error'))
            <div class="alert {{ session('success') ? 'success' : 'error' }}">
                <i class="fas fa-{{ session('success') ? 'check-circle' : 'exclamation-circle' }}"></i>
                {{ session('success') ?? session('error') }}
            </div>
        @endif
    </div>
</div>

<script>
function togglePassenger(btn) {
    const form = btn.closest('.booking-form');
    const passengerForm = form.querySelector('.passenger-form');
    document.querySelectorAll('.passenger-form').forEach(pf => {
        if (pf !== passengerForm) pf.style.display = 'none';
    });
    passengerForm.style.display = passengerForm.style.display === 'none' ? 'flex' : 'none';
}
document.addEventListener('DOMContentLoaded', () => {
    const alert = document.querySelector('.alert');
    if (alert) {
        setTimeout(() => alert.classList.add('fade-out'), 3000);
        setTimeout(() => alert.remove(), 3500);
    }
});
</script>
@endsection
<style>
* { margin: 0; padding: 0; box-sizing: border-box; }

body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }

.booking-wrapper { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 1rem; }

.booking-container { background: white; width: 100%; max-width: 900px; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); overflow: hidden; }

.header { background: linear-gradient(135deg, #1c5873 0%, #2d6b84 100%); color: white; padding: 2rem; text-align: center; }
.header h1 { font-size: 2rem; margin-bottom: 0.5rem; display: flex; align-items: center; justify-content: center; gap: 1rem; }
.header p { opacity: 0.9; font-size: 1.1rem; }

.search-form { padding: 2rem; background: #f8fafc; }
.search-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem; }
.input-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151; }
.input-group input, .input-group select { width: 100%; padding: 0.75rem; border: 2px solid #e5e7eb; border-radius: 10px; font-size: 1rem; transition: all 0.3s; }
.input-group input:focus, .input-group select:focus { outline: none; border-color: #1c5873; box-shadow: 0 0 0 3px rgba(28,88,115,0.1); }

.search-btn { width: 100%; background: linear-gradient(135deg, #1c5873 0%, #2d6b84 100%); color: white; border: none; padding: 1rem; border-radius: 10px; font-size: 1.1rem; font-weight: 600; cursor: pointer; transition: transform 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.5rem; }
.search-btn:hover { transform: translateY(-2px); }

.alert { position: fixed; top: 2rem; right: 2rem; padding: 1rem 1.5rem; border-radius: 10px; font-weight: 600; z-index: 1000; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem; }
.alert.success { background: #d1fae5; border: 2px solid #10b981; color: #065f46; }
.alert.error { background: #fee2e2; border: 2px solid #ef4444; color: #991b1b; }
.alert.fade-out { opacity: 0; transform: translateX(100%); }

@media (max-width: 768px) {
    .booking-container { margin: 0; border-radius: 0; }
    .search-grid { grid-template-columns: 1fr; }
}
</style>
