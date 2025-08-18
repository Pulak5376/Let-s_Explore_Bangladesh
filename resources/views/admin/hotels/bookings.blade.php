@extends('layouts.admin')

@section('title', 'Hotel Bookings')
@section('header', 'Hotel Bookings')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hotel</th>
                            <th>Guest Name</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Guests</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Booked On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->hotel->name }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->check_in }}</td>
                                <td>{{ $booking->check_out }}</td>
                                <td>{{ $booking->guests }}</td>
                                <td>৳{{ number_format($booking->total_price, 2) }}</td>
                                <td>
                                    <span class="badge bg-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'pending' ? 'warning' : 'danger') }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>{{ $booking->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 2rem;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }

    .table th {
        padding: 1rem;
        vertical-align: top;
        border-bottom: 2px solid #dee2e6;
        background-color: #f8f9fa;
        font-weight: 500;
    }

    .table td {
        padding: 1rem;
        vertical-align: top;
        border-bottom: 1px solid #dee2e6;
    }

    .badge {
        padding: 0.5em 0.75em;
        border-radius: 0.25rem;
        font-weight: 500;
        font-size: 0.75em;
    }

    .bg-success {
        background-color: #28a745 !important;
    }

    .bg-warning {
        background-color: #ffc107 !important;
        color: #000;
    }

    .bg-danger {
        background-color: #dc3545 !important;
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
</style>
@endsection
