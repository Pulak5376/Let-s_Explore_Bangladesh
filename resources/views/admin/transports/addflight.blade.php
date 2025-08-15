
@extends('layouts.admin')

@section('title', 'Add Flight')

@section('content')
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card shadow-lg border-0">
				<div class="card-header bg-gradient-primary text-white text-center" style="background: linear-gradient(90deg,#1c5873 0%,#2d6b84 100%) !important;">
					<h3 class="mb-0 fw-bold"><i class="fas fa-plane"></i> Add New Flight</h3>
				</div>
				<div class="card-body">
					@if(session('success'))
						<div class="alert alert-success d-flex align-items-center" style="font-size:1.1rem;">
							<i class="fas fa-check-circle me-2"></i>
							<div>{{ session('success') }}</div>
						</div>
					@endif
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul class="mb-0">
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
								<label for="flight_number" class="fw-semibold">Flight Number</label>
								<input type="text" class="form-control" id="flight_number" name="flight_number" value="{{ old('flight_number') }}" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="airline" class="fw-semibold">Airline</label>
								<input type="text" class="form-control" id="airline" name="airline" value="{{ old('airline') }}" required>
							</div>
						</div>
						<div class="form-row row mb-3">
							<div class="col-md-6 mb-3">
								<label for="from" class="fw-semibold">From</label>
								<input type="text" class="form-control" id="from" name="from" value="{{ old('from') }}" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="to" class="fw-semibold">To</label>
								<input type="text" class="form-control" id="to" name="to" value="{{ old('to') }}" required>
							</div>
						</div>
						<div class="form-row row mb-3">
							<div class="col-md-6 mb-3">
								<label for="departure_date" class="fw-semibold">Departure Date</label>
								<input type="date" class="form-control" id="departure_date" name="departure_date" value="{{ old('departure_date') }}" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="arrival_date" class="fw-semibold">Arrival Date</label>
								<input type="date" class="form-control" id="arrival_date" name="arrival_date" value="{{ old('arrival_date') }}">
							</div>
						</div>
						<div class="form-row row mb-3">
							<div class="col-md-4 mb-3">
								<label for="class" class="fw-semibold">Class</label>
								<select class="form-control" id="class" name="class" required>
									<option value="">Select</option>
									<option value="Economy" {{ old('class') == 'Economy' ? 'selected' : '' }}>Economy</option>
									<option value="Business" {{ old('class') == 'Business' ? 'selected' : '' }}>Business</option>
									<option value="First Class" {{ old('class') == 'First Class' ? 'selected' : '' }}>First Class</option>
								</select>
							</div>
							<div class="col-md-4 mb-3">
								<label for="seats_available" class="fw-semibold">Seats Available</label>
								<input type="number" class="form-control" id="seats_available" name="seats_available" min="1" value="{{ old('seats_available') }}" required>
							</div>
							<div class="col-md-4 mb-3">
								<label for="price" class="fw-semibold">Price (৳)</label>
								<input type="number" class="form-control" id="price" name="price" min="0" step="0.01" value="{{ old('price') }}" required>
							</div>
						</div>
						<div class="text-center mt-4">
							<button type="submit" class="btn btn-gradient-primary btn-lg px-5" style="background: linear-gradient(90deg,#10b981 0%,#059669 100%) !important; color: #fff; border: none;">
								<i class="fas fa-plus"></i> Add Flight
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('styles')
<style>
.btn-gradient-primary {
	background: linear-gradient(90deg,#10b981 0%,#059669 100%) !important;
	color: #fff !important;
	border: none !important;
}
.bg-gradient-primary {
	background: linear-gradient(90deg,#1c5873 0%,#2d6b84 100%) !important;
}
.card {
	border-radius: 18px;
}
.card-header {
	border-radius: 18px 18px 0 0;
}
.form-control:focus {
	box-shadow: 0 0 0 2px #1c5873;
	border-color: #1c5873;
}
.alert-success {
	background: linear-gradient(90deg,#d1fae5 0%,#a7f3d0 100%);
	color: #065f46;
	border: 1px solid #10b981;
	font-weight: 600;
}
.alert-danger {
	background: linear-gradient(90deg,#fee2e2 0%,#fecaca 100%);
	color: #991b1b;
	border: 1px solid #ef4444;
	font-weight: 600;
}
</style>
@endpush
