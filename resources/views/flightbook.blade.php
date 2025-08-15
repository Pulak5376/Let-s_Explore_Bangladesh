@extends('layouts.app')

@section('title', 'Flight Booking')

@section('content')
<div class="flight-bg">
    <div class="booking-wrapper enhanced">
        <div class="booking-container enhanced">
            <div class="header enhanced">
                <h1><i class="fas fa-plane-departure"></i> Book Your Flight</h1>
                <p>Find the best flights and book instantly with comfort and style</p>
            </div>
            <form action="{{ route('flightbook') }}" method="GET" class="search-form enhanced">
                <div class="search-grid enhanced">
                    <div class="input-group enhanced">
                        <label for="from">From</label>
                        <input type="text" id="from" name="from" value="{{ request('from') }}" placeholder="Departure airport/city" required>
                    </div>
                    <div class="input-group enhanced">
                        <label for="to">To</label>
                        <input type="text" id="to" name="to" value="{{ request('to') }}" placeholder="Destination airport/city" required>
                    </div>
                    <div class="input-group enhanced">
                        <label for="departure_date">Departure Date</label>
                        <input type="date" id="departure_date" name="departure_date" value="{{ request('departure_date') }}" required>
                    </div>
                    <div class="input-group enhanced">
                        <label for="class">Class</label>
                        <select id="class" name="class" required>
                            <option value="">Select</option>
                            <option value="Economy" {{ request('class') == 'Economy' ? 'selected' : '' }}>Economy</option>
                            <option value="Business" {{ request('class') == 'Business' ? 'selected' : '' }}>Business</option>
                            <option value="First Class" {{ request('class') == 'First Class' ? 'selected' : '' }}>First Class</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="search-btn enhanced">
                    <i class="fas fa-search"></i> Search Flights
                </button>
            </form>

            @isset($flights)
                <div class="results enhanced">
                    <h2><i class="fas fa-list"></i> Available Flights ({{ $flights->count() }})</h2>
                    @forelse ($flights as $flight)
                        <div class="transport-card enhanced">
                            <div class="card-header enhanced">
                                <div class="transport-name enhanced">
                                    <i class="fas fa-plane"></i>
                                    <span>{{ $flight->airline }} ({{ $flight->flight_number }})</span>
                                </div>
                                <span class="transport-type enhanced">{{ $flight->class }}</span>
                            </div>
                            <div class="card-body enhanced">
                                <div class="route-info enhanced">
                                    <div class="route enhanced">
                                        <span class="station enhanced">{{ $flight->from }}</span>
                                        <i class="fas fa-arrow-right"></i>
                                        <span class="station enhanced">{{ $flight->to }}</span>
                                    </div>
                                    <div class="time enhanced">
                                        <i class="fas fa-clock"></i>
                                        Departure: {{ $flight->departure_date }}
                                    </div>
                                </div>
                                <div class="pricing enhanced">
                                    <div class="price enhanced">৳{{ $flight->price }}</div>
                                    <div class="seats enhanced">{{ $flight->seats_available }} seats</div>
                                </div>
                            </div>
                            <form action="{{ route('flightbook.store') }}" method="POST" class="booking-form enhanced">
                                @csrf
                                <input type="hidden" name="from" value="{{ $flight->from }}">
                                <input type="hidden" name="to" value="{{ $flight->to }}">
                                <input type="hidden" name="departure_date" value="{{ $flight->departure_date }}">
                                <input type="hidden" name="return_date" value="{{ request('return_date') }}">
                                <input type="hidden" name="class" value="{{ $flight->class }}">
                                <input type="hidden" name="flight_id" value="{{ $flight->id }}">
                                <div class="booking-controls enhanced">
                                    <div class="seat-selector enhanced">
                                        <label>Passengers:</label>
                                        <input type="number" name="passengers" value="1" min="1" max="{{ $flight->seats_available }}">
                                    </div>
                                    <button type="button" class="book-btn enhanced" onclick="togglePassenger(this)">
                                        <i class="fas fa-ticket-alt"></i> Book Now
                                    </button>
                                </div>
                                <div class="passenger-form enhanced" style="display:none;">
                                    <input type="text" name="passenger_name" placeholder="Full Name" required>
                                    <input type="email" name="passenger_email" placeholder="Email Address" required>
                                    <input type="tel" name="passenger_phone" placeholder="Phone Number" required>
                                    <button type="submit" class="confirm-btn enhanced">
                                        <i class="fas fa-check"></i> Confirm Booking
                                    </button>
                                </div>
                            </form>
                        </div>
                    @empty
                        <div class="no-results enhanced">
                            <i class="fas fa-search"></i>
                            <h3>No flights found</h3>
                            <p>Try different airports or dates</p>
                        </div>
                    @endforelse
                </div>
            @endisset

            @if(session('success') || session('error'))
                <div class="alert enhanced {{ session('success') ? 'success' : 'error' }}">
                    <i class="fas fa-{{ session('success') ? 'check-circle' : 'exclamation-circle' }}"></i>
                    {{ session('success') ?? session('error') }}
                </div>
            @endif
        </div>
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
body.flight-bg {
    background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%) !important;
    min-height: 100vh;
}
.flight-bg {
    background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%);
    min-height: 100vh;
    padding: 0;
}
.booking-wrapper.enhanced {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem 0;
}
.booking-container.enhanced {
    background: #fff;
    width: 100%;
    max-width: 950px;
    border-radius: 28px;
    box-shadow: 0 12px 48px rgba(80, 80, 160, 0.15);
    overflow: hidden;
    margin: 0 1rem;
}
.header.enhanced {
    background: linear-gradient(135deg, #1c5873 0%, #2d6b84 100%);
    color: #fff;
    padding: 2.5rem 2rem 2rem 2rem;
    text-align: center;
}
.header.enhanced h1 {
    font-size: 2.3rem;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    font-weight: 700;
}
.header.enhanced p {
    opacity: 0.95;
    font-size: 1.15rem;
    font-weight: 500;
}
.search-form.enhanced {
    padding: 2.2rem 2rem 1.5rem 2rem;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}
.search-grid.enhanced {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 1.2rem;
    margin-bottom: 1.5rem;
}
.input-group.enhanced label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #374151;
}
.input-group.enhanced input, .input-group.enhanced select {
    width: 100%;
    padding: 0.85rem;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-size: 1.05rem;
    transition: all 0.3s;
    background: #fff;
}
.input-group.enhanced input:focus, .input-group.enhanced select:focus {
    outline: none;
    border-color: #1c5873;
    box-shadow: 0 0 0 3px rgba(28,88,115,0.08);
}
.search-btn.enhanced {
    width: 100%;
    background: linear-gradient(135deg, #1c5873 0%, #2d6b84 100%);
    color: #fff;
    border: none;
    padding: 1.1rem;
    border-radius: 12px;
    font-size: 1.15rem;
    font-weight: 700;
    cursor: pointer;
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.7rem;
    box-shadow: 0 2px 8px rgba(44, 62, 80, 0.08);
}
.search-btn.enhanced:hover {
    transform: translateY(-2px) scale(1.03);
    box-shadow: 0 6px 18px rgba(44, 62, 80, 0.13);
}
.results.enhanced {
    padding: 2.2rem 2rem 2rem 2rem;
}
.results.enhanced h2 {
    color: #1c5873;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1.3rem;
    font-weight: 700;
}
.transport-card.enhanced {
    background: #f9fafb;
    border: 2px solid #e5e7eb;
    border-radius: 18px;
    margin-bottom: 1.2rem;
    overflow: hidden;
    transition: all 0.3s;
    box-shadow: 0 2px 8px rgba(44, 62, 80, 0.06);
}
.transport-card.enhanced:hover {
    transform: translateY(-3px) scale(1.01);
    box-shadow: 0 10px 30px rgba(44,62,80,0.13);
    border-color: #1c5873;
}
.card-header.enhanced {
    background: linear-gradient(135deg, #1c5873 0%, #2d6b84 100%);
    color: #fff;
    padding: 1.2rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.transport-name.enhanced {
    display: flex;
    align-items: center;
    gap: 0.7rem;
    font-weight: 700;
    font-size: 1.1rem;
}
.transport-type.enhanced {
    background: rgba(255,255,255,0.18);
    padding: 0.3rem 1rem;
    border-radius: 20px;
    font-size: 0.95rem;
    font-weight: 600;
}
.card-body.enhanced {
    padding: 1.7rem 1.5rem 1.2rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}
.route-info.enhanced {
    display: flex;
    flex-direction: column;
    gap: 0.7rem;
}
.route.enhanced {
    display: flex;
    align-items: center;
    gap: 1.1rem;
    font-size: 1.18rem;
    font-weight: 700;
}
.station.enhanced {
    color: #1c5873;
}
.route.enhanced i {
    color: #6b7280;
}
.time.enhanced {
    color: #6b7280;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}
.pricing.enhanced {
    text-align: right;
}
.price.enhanced {
    font-size: 1.45rem;
    font-weight: 800;
    color: #1c5873;
}
.seats.enhanced {
    color: #6b7280;
    font-size: 1rem;
    font-weight: 600;
}
.booking-form.enhanced {
    padding: 0 1.5rem 1.5rem 1.5rem;
}
.booking-controls.enhanced {
    display: flex;
    align-items: center;
    gap: 1.2rem;
    margin-bottom: 1rem;
}
.seat-selector.enhanced {
    display: flex;
    align-items: center;
    gap: 0.7rem;
}
.seat-selector.enhanced input {
    width: 70px;
    padding: 0.6rem;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    text-align: center;
    font-size: 1.05rem;
}
.book-btn.enhanced {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: #fff;
    border: none;
    padding: 0.85rem 1.7rem;
    border-radius: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    gap: 0.7rem;
    font-size: 1.1rem;
}
.book-btn.enhanced:hover {
    transform: translateY(-2px) scale(1.03);
    box-shadow: 0 4px 12px rgba(16,185,129,0.13);
}
.passenger-form.enhanced {
    display: flex;
    gap: 1rem;
    padding: 1rem 0 0 0;
    background: #f3f4f6;
    border-radius: 12px;
    margin-top: 0.5rem;
    flex-wrap: wrap;
}
.passenger-form.enhanced input {
    flex: 1 1 200px;
    padding: 0.8rem;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    font-size: 1.05rem;
}
.confirm-btn.enhanced {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    color: #fff;
    border: none;
    padding: 0.85rem 1.7rem;
    border-radius: 10px;
    font-weight: 700;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.7rem;
    white-space: nowrap;
    font-size: 1.1rem;
    margin-left: 1rem;
}
.no-results.enhanced {
    text-align: center;
    padding: 3rem;
    color: #6b7280;
}
.no-results.enhanced i {
    font-size: 3rem;
    margin-bottom: 1rem;
}
.no-results.enhanced h3 {
    margin-bottom: 0.5rem;
}
.alert.enhanced {
    position: fixed;
    top: 2rem;
    right: 2rem;
    padding: 1.1rem 1.7rem;
    border-radius: 12px;
    font-weight: 700;
    z-index: 1000;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    gap: 0.7rem;
    font-size: 1.1rem;
}
.alert.enhanced.success { background: #d1fae5; border: 2px solid #10b981; color: #065f46; }
.alert.enhanced.error { background: #fee2e2; border: 2px solid #ef4444; color: #991b1b; }
.alert.enhanced.fade-out { opacity: 0; transform: translateX(100%); }
@media (max-width: 1100px) {
    .search-grid.enhanced { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 768px) {
    .booking-container.enhanced { margin: 0; border-radius: 0; }
    .search-grid.enhanced { grid-template-columns: 1fr; }
    .card-body.enhanced { flex-direction: column; align-items: flex-start; gap: 1rem; }
    .pricing.enhanced { text-align: left; }
    .passenger-form.enhanced { flex-direction: column; }
    .booking-controls.enhanced { flex-direction: column; align-items: stretch; }
}
</style>
