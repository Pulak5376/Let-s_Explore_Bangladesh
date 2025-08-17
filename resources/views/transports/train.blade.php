@extends('layouts.app')

@section('title', 'Train Ticket Booking')

@section('content')
<div class="booking-wrapper">
    <div class="booking-container">
        <div class="header">
            <h1><i class="fas fa-train"></i> Train Ticket Booking</h1>
            <p>Find and book your train tickets easily</p>
        </div>

        <form action="{{ route('train.search') }}" method="POST" class="search-form">
            @csrf
            <input type="hidden" name="type" value="train">
            
            <div class="search-grid">
                <div class="input-group">
                    <label for="from">From</label>
                    <input type="text" id="from" name="from" value="{{ old('from') }}" placeholder="Departure station" required>
                </div>
                <div class="input-group">
                    <label for="to">To</label>
                    <input type="text" id="to" name="to" value="{{ old('to') }}" placeholder="Destination station" required>
                </div>
                <div class="input-group">
                    <label for="booking_date">Date</label>
                    <input type="date" id="booking_date" name="booking_date" value="{{ old('booking_date') }}" required>
                </div>
            </div>
            <button type="submit" class="search-btn">
                <i class="fas fa-search"></i> Search Trains
            </button>
        </form>

        @isset($transports)
            <div class="results">
                <h2><i class="fas fa-list"></i> Available Trains ({{ $transports->count() }})</h2>
                
                @forelse ($transports as $train)
                    <div class="transport-card">
                        <div class="card-header">
                            <div class="transport-name">
                                <i class="fas fa-train"></i>
                                <span>{{ $train->name }}</span>
                            </div>
                            <span class="transport-type">{{ ucfirst($train->type) }}</span>
                        </div>
                        
                        <div class="card-body">
                            <div class="route-info">
                                <div class="route">
                                    <span class="station">{{ $train->route_from }}</span>
                                    <i class="fas fa-arrow-right"></i>
                                    <span class="station">{{ $train->route_to }}</span>
                                </div>
                                <div class="time">
                                    <i class="fas fa-clock"></i>
                                    Departure: {{ $train->departure_time }}
                                </div>
                            </div>
                            
                            <div class="pricing">
                                <div class="price">৳{{ $train->price }}</div>
                                <div class="seats">
                                    {{ $train->available_seats ?? $train->total_seats }} available / {{ $train->total_seats }} total seats
                                    @if(($train->available_seats ?? $train->total_seats) == 0)
                                        <span style="color: #ef4444; font-weight: bold;"> (FULL)</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <form action="{{ url($train->type.'/book') }}" method="POST" class="booking-form">
                            @csrf
                            <input type="hidden" name="transport_id" value="{{ $train->id }}">
                            @isset($searchDate)
                                <input type="hidden" name="booking_date" value="{{ $searchDate }}">
                            @endisset
                            
                            <div class="booking-controls">
                                <div class="seat-selector">
                                    <label>Seats:</label>
                                    <input type="number" name="seats_booked" value="1" min="1" max="{{ $train->available_seats ?? $train->total_seats }}" 
                                           {{ ($train->available_seats ?? $train->total_seats) == 0 ? 'disabled' : '' }}>
                                </div>
                                <button type="button" class="book-btn" onclick="togglePassenger(this)" 
                                        {{ ($train->available_seats ?? $train->total_seats) == 0 ? 'disabled style=background:#ccc;cursor:not-allowed;' : '' }}>
                                    <i class="fas fa-train"></i> 
                                    {{ ($train->available_seats ?? $train->total_seats) == 0 ? 'Fully Booked' : 'Book Now' }}
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
                        <h3>No trains found</h3>
                        <p>Try different stations or dates</p>
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
.input-group input { width: 100%; padding: 0.75rem; border: 2px solid #e5e7eb; border-radius: 10px; font-size: 1rem; transition: all 0.3s; }
.input-group input:focus { outline: none; border-color: #1c5873; box-shadow: 0 0 0 3px rgba(28,88,115,0.1); }

.search-btn { width: 100%; background: linear-gradient(135deg, #1c5873 0%, #2d6b84 100%); color: white; border: none; padding: 1rem; border-radius: 10px; font-size: 1.1rem; font-weight: 600; cursor: pointer; transition: transform 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.5rem; }
.search-btn:hover { transform: translateY(-2px); }

.results { padding: 2rem; }
.results h2 { color: #1c5873; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem; }

.transport-card { background: white; border: 2px solid #e5e7eb; border-radius: 15px; margin-bottom: 1rem; overflow: hidden; transition: all 0.3s; }
.transport-card:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-color: #1c5873; }

.card-header { background: linear-gradient(135deg, #1c5873 0%, #2d6b84 100%); color: white; padding: 1rem; display: flex; justify-content: space-between; align-items: center; }
.transport-name { display: flex; align-items: center; gap: 0.5rem; font-weight: 600; font-size: 1.1rem; }
.transport-type { background: rgba(255,255,255,0.2); padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; }

.card-body { padding: 1.5rem; display: flex; justify-content: space-between; align-items: center; }
.route { display: flex; align-items: center; gap: 1rem; font-size: 1.2rem; font-weight: 600; }
.station { color: #1c5873; }
.route i { color: #6b7280; }
.time { color: #6b7280; font-size: 0.9rem; margin-top: 0.5rem; display: flex; align-items: center; gap: 0.5rem; }

.pricing { text-align: right; }
.price { font-size: 1.5rem; font-weight: 700; color: #1c5873; }
.seats { color: #6b7280; font-size: 0.9rem; }

.booking-form { padding: 0 1.5rem 1.5rem; }
.booking-controls { display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem; }
.seat-selector { display: flex; align-items: center; gap: 0.5rem; }
.seat-selector input { width: 60px; padding: 0.5rem; border: 2px solid #e5e7eb; border-radius: 8px; text-align: center; }

.book-btn { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 10px; font-weight: 600; cursor: pointer; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem; }
.book-btn:hover { transform: translateY(-2px); }

.passenger-form { display: flex; gap: 1rem; padding: 1rem; background: #f9fafb; border-radius: 10px; }
.passenger-form input { flex: 1; padding: 0.75rem; border: 2px solid #e5e7eb; border-radius: 8px; }
.confirm-btn { background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 8px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 0.5rem; white-space: nowrap; }

.no-results { text-align: center; padding: 3rem; color: #6b7280; }
.no-results i { font-size: 3rem; margin-bottom: 1rem; }
.no-results h3 { margin-bottom: 0.5rem; }

.alert { position: fixed; top: 2rem; right: 2rem; padding: 1rem 1.5rem; border-radius: 10px; font-weight: 600; z-index: 1000; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem; }
.alert.success { background: #d1fae5; border: 2px solid #10b981; color: #065f46; }
.alert.error { background: #fee2e2; border: 2px solid #ef4444; color: #991b1b; }
.alert.fade-out { opacity: 0; transform: translateX(100%); }

@media (max-width: 768px) {
    .booking-container { margin: 0; border-radius: 0; }
    .search-grid { grid-template-columns: 1fr; }
    .card-body { flex-direction: column; align-items: flex-start; gap: 1rem; }
    .pricing { text-align: left; }
    .passenger-form { flex-direction: column; }
    .booking-controls { flex-direction: column; align-items: stretch; }
}
</style>