

@extends('layouts.admin')

@section('title', 'All Flight Bookings')

@section('content')
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg border-0 pro-card">
				<div class="card-header text-white text-center pro-header-booking">
					<h3 class="mb-0 fw-bold"><i class="fas fa-ticket"></i> All Flight Bookings</h3>
				</div>
				<div class="card-body">
					@if($bookings->isEmpty())
						<div class="alert alert-info text-center">No flight bookings found.</div>
					@else
					<div class="table-responsive">
						<table class="table table-hover pro-table-booking">
							<thead>
								<tr>
									<th>ID</th>
									<th>From</th>
									<th>To</th>
									<th>Departure</th>
									<th>Return</th>
									<th>Class</th>
									<th>Passengers</th>
									<th>Booked At</th>
								</tr>
							</thead>
							<tbody>
								@foreach($bookings as $booking)
								<tr>
									<td>{{ $booking->id }}</td>
									<td><span class="badge bg-info pro-badge">{{ $booking->from }}</span></td>
									<td><span class="badge bg-info pro-badge">{{ $booking->to }}</span></td>
									<td><span class="badge bg-success pro-badge">{{ $booking->departure_date }}</span></td>
									<td><span class="badge bg-warning text-dark pro-badge">{{ $booking->return_date ?? '-' }}</span></td>
									<td><span class="badge bg-secondary pro-badge">{{ $booking->class }}</span></td>
									<td><span class="badge bg-dark pro-badge">{{ $booking->passengers }}</span></td>
									<td><span class="badge bg-gradient-pro pro-badge">{{ $booking->created_at->format('Y-m-d H:i') }}</span></td>
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
.pro-header-booking {
	background: linear-gradient(90deg,#7b1fa2 0%,#512da8 100%) !important;
	border-radius: 18px 18px 0 0 !important;
	box-shadow: 0 4px 16px 0 rgba(123, 31, 162, 0.10);
}
.pro-card {
	border-radius: 18px !important;
	border: none;
	box-shadow: 0 8px 32px 0 rgba(123, 31, 162, 0.12);
}
.pro-table-booking thead {
	background: linear-gradient(90deg,#7b1fa2 0%,#512da8 100%) !important;
	color: #fff !important;
	font-size: 1.08rem;
	letter-spacing: 0.5px;
}
.pro-table-booking th, .pro-table-booking td {
	text-align: center !important;
	vertical-align: middle !important;
	font-size: 1.04rem;
	padding: 0.7rem 0.5rem;
}
.pro-table-booking tbody tr {
	transition: background 0.2s;
}
.pro-table-booking tbody tr:hover {
	background: #ede7f6 !important;
}
.pro-badge {
	font-size: 1rem;
	padding: 0.45em 0.9em;
	border-radius: 0.7em;
	font-weight: 600;
	box-shadow: 0 2px 8px 0 rgba(123, 31, 162, 0.08);
}
.bg-gradient-pro {
	background: linear-gradient(90deg,#10b981 0%,#059669 100%) !important;
	color: #fff !important;
}
</style>
@endsection
