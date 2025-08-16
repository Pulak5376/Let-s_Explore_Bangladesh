
@extends('layouts.admin')

@section('title', 'All Flights')

@section('content')
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg border-0 pro-card">
				<div class="card-header text-white text-center pro-header">
					<h3 class="mb-0 fw-bold"><i class="fas fa-plane"></i> All Flights</h3>
				</div>
				<div class="card-body">
					@if($flights->isEmpty())
						<div class="alert alert-info text-center">No flights found.</div>
					@else
					<div class="table-responsive">
						<table class="table table-hover pro-table">
							<thead>
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
									<td><span class="badge bg-primary pro-badge">{{ $flight->flight_number }}</span></td>
									<td>{{ $flight->airline }}</td>
									<td><span class="badge bg-info pro-badge">{{ $flight->from }}</span></td>
									<td><span class="badge bg-info pro-badge">{{ $flight->to }}</span></td>
									<td><span class="badge bg-success pro-badge">{{ $flight->departure_date }}</span></td>
									<td><span class="badge bg-warning text-dark pro-badge">{{ $flight->arrival_date ?? '-' }}</span></td>
									<td><span class="badge bg-secondary pro-badge">{{ $flight->class }}</span></td>
									<td><span class="badge bg-dark pro-badge">{{ $flight->seats_available }}</span></td>
									<td><span class="badge bg-gradient-pro pro-badge">৳{{ number_format($flight->price, 2) }}</span></td>
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

<style>
.pro-header {
	background: linear-gradient(90deg,#1c5873 0%,#2d6b84 100%) !important;
	border-radius: 18px 18px 0 0 !important;
	box-shadow: 0 4px 16px 0 rgba(44, 62, 80, 0.10);
}
.pro-card {
	border-radius: 18px !important;
	border: none;
	box-shadow: 0 8px 32px 0 rgba(44, 62, 80, 0.12);
}
.pro-table thead {
	background: linear-gradient(90deg,#1c5873 0%,#2d6b84 100%) !important;
	color: #fff !important;
	font-size: 1.08rem;
	letter-spacing: 0.5px;
}
.pro-table th, .pro-table td {
	text-align: center !important;
	vertical-align: middle !important;
	font-size: 1.04rem;
	padding: 0.7rem 0.5rem;
}
.pro-table tbody tr {
	transition: background 0.2s;
}
.pro-table tbody tr:hover {
	background: #e0f2fe !important;
}
.pro-badge {
	font-size: 1rem;
	padding: 0.45em 0.9em;
	border-radius: 0.7em;
	font-weight: 600;
	box-shadow: 0 2px 8px 0 rgba(44, 62, 80, 0.08);
}
.bg-gradient-pro {
	background: linear-gradient(90deg,#10b981 0%,#059669 100%) !important;
	color: #fff !important;
}
</style>
@endsection
