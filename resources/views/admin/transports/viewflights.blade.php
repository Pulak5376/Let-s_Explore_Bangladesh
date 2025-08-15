
@extends('layouts.admin')

@section('title', 'All Flights')

@section('content')
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg border-0">
				<div class="card-header bg-gradient-primary text-white text-center" style="background: linear-gradient(90deg,#1c5873 0%,#2d6b84 100%) !important;">
					<h3 class="mb-0 fw-bold"><i class="fas fa-plane"></i> All Flights</h3>
				</div>
				<div class="card-body">
					@if($flights->isEmpty())
						<div class="alert alert-info text-center">No flights found.</div>
					@else
					<div class="table-responsive">
						<table class="table table-bordered table-hover align-middle">
							<thead class="table-dark">
								<tr>
									<th>ID</th>
									<th>Flight Number</th>
									<th>Airline</th>
									<th>From</th>
									<th>To</th>
									<th>Departure</th>
									<th>Arrival</th>
									<th>Class</th>
									<th>Seats</th>
									<th>Price (৳)</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach($flights as $flight)
								<tr>
									<td>{{ $flight->id }}</td>
									<td>{{ $flight->flight_number }}</td>
									<td>{{ $flight->airline }}</td>
									<td>{{ $flight->from }}</td>
									<td>{{ $flight->to }}</td>
									<td>{{ $flight->departure_date }}</td>
									<td>{{ $flight->arrival_date ?? '-' }}</td>
									<td>{{ $flight->class }}</td>
									<td>{{ $flight->seats_available }}</td>
									<td>{{ number_format($flight->price, 2) }}</td>
									
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('styles')
<style>
.bg-gradient-primary {
	background: linear-gradient(90deg,#1c5873 0%,#2d6b84 100%) !important;
}
.card {
	border-radius: 18px;
}
.card-header {
	border-radius: 18px 18px 0 0;
}
.table thead th {
	vertical-align: middle;
	text-align: center;
}
.table td, .table th {
	text-align: center;
}
</style>
@endpush
