@extends('layouts.admin')

@section('title', 'Add Flight')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center pro-bg">
	<div class="row w-100 justify-content-center">
		<div class="col-lg-6 col-md-8 col-12">
			<div class="card shadow-lg border-0 pro-card">
				<div class="card-header text-white text-center pro-header">
					<h3 class="mb-0 fw-bold"><i class="fas fa-plane"></i> Add New Flight</h3>
				</div>
				<div class="card-body p-4">
					
					{{-- Success Alert --}}
					@if(session('success'))
						<div class="alert alert-success d-flex align-items-center pro-alert mb-4">
							<i class="fas fa-check-circle me-2"></i>
							<div>{{ session('success') }}</div>
						</div>
					@endif

					{{-- Error Alert --}}
					@if ($errors->any())
						<div class="alert alert-danger pro-alert mb-4">
							<ul class="mb-0 ps-3">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form method="POST" action="{{ route('admin.transports.storeflight') }}" class="needs-validation" novalidate>
						@csrf
						<div class="form-row row mb-3">
							<div class="col-md-6 mb-3">
								<label for="flight_number" class="fw-semibold">✈️ Flight Number</label>
								<input type="text" class="form-control pro-input" id="flight_number" name="flight_number" value="{{ old('flight_number') }}" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="airline" class="fw-semibold">🏢 Airline</label>
								<input type="text" class="form-control pro-input" id="airline" name="airline" value="{{ old('airline') }}" required>
							</div>
						</div>
						<div class="form-row row mb-3">
							<div class="col-md-6 mb-3">
								<label for="from" class="fw-semibold">📍 From</label>
								<input type="text" class="form-control pro-input" id="from" name="from" value="{{ old('from') }}" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="to" class="fw-semibold">📍 To</label>
								<input type="text" class="form-control pro-input" id="to" name="to" value="{{ old('to') }}" required>
							</div>
						</div>
						<div class="form-row row mb-3">
							<div class="col-md-6 mb-3">
								<label for="departure_date" class="fw-semibold">🕒 Departure Date</label>
								<input type="date" class="form-control pro-input" id="departure_date" name="departure_date" value="{{ old('departure_date') }}" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="arrival_date" class="fw-semibold">🕒 Arrival Date</label>
								<input type="date" class="form-control pro-input" id="arrival_date" name="arrival_date" value="{{ old('arrival_date') }}">
							</div>
						</div>
						<div class="form-row row mb-3">
							<div class="col-md-4 mb-3">
								<label for="class" class="fw-semibold">🎟️ Class</label>
								<select class="form-control pro-input" id="class" name="class" required>
									<option value="">Select</option>
									<option value="Economy" {{ old('class') == 'Economy' ? 'selected' : '' }}>Economy</option>
									<option value="Business" {{ old('class') == 'Business' ? 'selected' : '' }}>Business</option>
									<option value="First Class" {{ old('class') == 'First Class' ? 'selected' : '' }}>First Class</option>
								</select>
							</div>
							<div class="col-md-4 mb-3">
								<label for="seats_available" class="fw-semibold">💺 Seats</label>
								<input type="number" class="form-control pro-input" id="seats_available" name="seats_available" min="1" value="{{ old('seats_available') }}" required>
							</div>
							<div class="col-md-4 mb-3">
								<label for="price" class="fw-semibold">💰 Price (৳)</label>
								<input type="number" class="form-control pro-input" id="price" name="price" min="0" step="0.01" value="{{ old('price') }}" required>
							</div>
						</div>
						<div class="text-center mt-4">
							<button type="submit" class="btn btn-gradient-primary btn-lg px-5 pro-btn">
								<i class="fas fa-plus"></i> Add Flight
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- Page CSS --}}
<style>
/* Background */
.pro-bg {
	background: linear-gradient(135deg,#f4f6f9 50%,#e0f2fe 100%);
	min-height: 100vh;
	padding: 20px;
}

/* Card */
.pro-card {
	border-radius: 18px !important;
	border: none;
	box-shadow: 0 8px 32px rgba(44, 62, 80, 0.12);
	background: #fff;
	transition: transform 0.2s;
}
.pro-card:hover { transform: translateY(-4px); }

/* Header */
.pro-header {
	background: linear-gradient(90deg,#1c5873 0%,#2d6b84 100%) !important;
	border-radius: 18px 18px 0 0 !important;
	box-shadow: 0 4px 16px rgba(44, 62, 80, 0.10);
}

/* Inputs */
.pro-input {
	border-radius: 8px;
	border: 1px solid #d1d5db;
	padding: 10px;
}
.pro-input:focus {
	box-shadow: 0 0 0 2px #1c5873;
	border-color: #1c5873;
}

/* Button */
.pro-btn {
	background: linear-gradient(90deg,#10b981 0%,#059669 100%) !important;
	color: #fff !important;
	border: none !important;
	border-radius: 8px;
	font-weight: 600;
	letter-spacing: 0.5px;
	box-shadow: 0 2px 8px rgba(16,185,129,0.10);
	transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
}
.pro-btn:hover {
	background: linear-gradient(90deg,#059669 0%,#10b981 100%) !important;
	box-shadow: 0 4px 16px rgba(16,185,129,0.18);
	transform: translateY(-2px);
}

/* Alerts */
.pro-alert {
	border-radius: 8px;
	font-weight: 600;
	font-size: 1rem;
}
.alert-success {
	background: linear-gradient(90deg,#d1fae5 0%,#a7f3d0 100%);
	color: #065f46;
	border: 1px solid #10b981;
}
.alert-danger {
	background: linear-gradient(90deg,#fee2e2 0%,#fecaca 100%);
	color: #991b1b;
	border: 1px solid #ef4444;
}

/* Responsive */
@media (max-width: 991px) {
	.pro-card { margin-top: 2rem; }
}
</style>
@endsection
