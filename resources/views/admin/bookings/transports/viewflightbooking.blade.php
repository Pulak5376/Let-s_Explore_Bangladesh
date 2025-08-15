
@extends('layouts.admin')

@section('title', 'All Flight Bookings')

@section('content')
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg border-0">
				<div class="card-header bg-gradient-primary text-white text-center" style="background: linear-gradient(90deg,#1c5873 0%,#2d6b84 100%) !important;">
					<h3 class="mb-0 fw-bold"><i class="fas fa-ticket-alt"></i> All Flight Bookings</h3>
				</div>
				<div class="card-body">
					@if($bookings->isEmpty())
						<div class="alert alert-info text-center">No flight bookings found.</div>
					@else
					<div class="table-responsive">
						<table class="table table-bordered table-hover align-middle">
							<thead class="table-dark">
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
									<td>{{ $booking->from }}</td>
									<td>{{ $booking->to }}</td>
									<td>{{ $booking->departure_date }}</td>
									<td>{{ $booking->return_date ?? '-' }}</td>
									<td>{{ $booking->class }}</td>
									<td>{{ $booking->passengers }}</td>
									<td>{{ $booking->created_at->format('Y-m-d H:i') }}</td>
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
