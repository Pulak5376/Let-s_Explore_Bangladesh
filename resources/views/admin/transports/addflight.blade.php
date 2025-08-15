@extends('layouts.admin')

@section('title', 'Add Flight')

@section('content')
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card shadow-lg border-0">
				<div class="card-header bg-primary text-white text-center">
					<h3 class="mb-0"><i class="fas fa-plane"></i> Add New Flight</h3>
				</div>
				<div class="card-body">
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul class="mb-0">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form method="POST" action="{{ route('admin.transports.storeflight') }}">
						@csrf
						<div class="form-row row mb-3">
							<div class="col-md-6 mb-3">
								<label for="flight_number">Flight Number</label>
								<input type="text" class="form-control" id="flight_number" name="flight_number" value="{{ old('flight_number') }}" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="airline">Airline</label>
								<input type="text" class="form-control" id="airline" name="airline" value="{{ old('airline') }}" required>
							</div>
						</div>
						<div class="form-row row mb-3">
							<div class="col-md-6 mb-3">
								<label for="from">From</label>
								<input type="text" class="form-control" id="from" name="from" value="{{ old('from') }}" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="to">To</label>
								<input type="text" class="form-control" id="to" name="to" value="{{ old('to') }}" required>
							</div>
						</div>
						<div class="form-row row mb-3">
							<div class="col-md-6 mb-3">
								<label for="departure_date">Departure Date</label>
								<input type="date" class="form-control" id="departure_date" name="departure_date" value="{{ old('departure_date') }}" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="arrival_date">Arrival Date</label>
								<input type="date" class="form-control" id="arrival_date" name="arrival_date" value="{{ old('arrival_date') }}">
							</div>
						</div>
						<div class="form-row row mb-3">
							<div class="col-md-4 mb-3">
								<label for="class">Class</label>
								<select class="form-control" id="class" name="class" required>
									<option value="">Select</option>
									<option value="Economy" {{ old('class') == 'Economy' ? 'selected' : '' }}>Economy</option>
									<option value="Business" {{ old('class') == 'Business' ? 'selected' : '' }}>Business</option>
									<option value="First Class" {{ old('class') == 'First Class' ? 'selected' : '' }}>First Class</option>
								</select>
							</div>
							<div class="col-md-4 mb-3">
								<label for="seats_available">Seats Available</label>
								<input type="number" class="form-control" id="seats_available" name="seats_available" min="1" value="{{ old('seats_available') }}" required>
							</div>
							<div class="col-md-4 mb-3">
								<label for="price">Price (৳)</label>
								<input type="number" class="form-control" id="price" name="price" min="0" step="0.01" value="{{ old('price') }}" required>
							</div>
						</div>
						<div class="text-center mt-4">
							<button type="submit" class="btn btn-success btn-lg px-5">
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
