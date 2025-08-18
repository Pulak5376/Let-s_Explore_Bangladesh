@extends('layouts.admin')

@section('title', 'Hotel Bookings')
@section('header', 'Hotel Bookings Management')

@section('content')
<div class="container-fluid py-4">
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card bg-primary">
                <div class="stats-content">
                    <div class="stats-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stats-info">
                        <h3>{{ $bookings->where('status', 'confirmed')->count() }}</h3>
                        <p>Confirmed Bookings</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card bg-warning">
                <div class="stats-content">
                    <div class="stats-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stats-info">
                        <h3>{{ $bookings->where('status', 'pending')->count() }}</h3>
                        <p>Pending Bookings</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card bg-danger">
                <div class="stats-content">
                    <div class="stats-icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stats-info">
                        <h3>{{ $bookings->where('status', 'cancelled')->count() }}</h3>
                        <p>Cancelled Bookings</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card bg-success">
                <div class="stats-content">
                    <div class="stats-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="stats-info">
                        <h3>৳{{ number_format($bookings->where('status', 'confirmed')->sum('total_price')) }}</h3>
                        <p>Total Revenue</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bookings Table -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-white">
            <h4 class="card-title mb-0">
                <i class="fas fa-list me-2"></i>All Hotel Bookings
            </h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">
                                <i class="fas fa-hashtag me-1"></i>ID
                            </th>
                            <th>
                                <i class="fas fa-hotel me-1"></i>Hotel
                            </th>
                            <th>
                                <i class="fas fa-user me-1"></i>Guest Name
                            </th>
                            <th>
                                <i class="fas fa-calendar-alt me-1"></i>Check In
                            </th>
                            <th>
                                <i class="fas fa-calendar-alt me-1"></i>Check Out
                            </th>
                            <th>
                                <i class="fas fa-users me-1"></i>Guests
                            </th>
                            <th>
                                <i class="fas fa-money-bill me-1"></i>Total Price
                            </th>
                            <th>
                                <i class="fas fa-info-circle me-1"></i>Status
                            </th>
                            <th>
                                <i class="fas fa-clock me-1"></i>Booked On
                            </th>
                            <th class="pe-4">
                                <i class="fas fa-cogs me-1"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr class="booking-row">
                                <td class="ps-4 fw-bold">#{{ $booking->id }}</td>
                                <td>
                                    <div class="hotel-info">
                                        <strong>{{ $booking->hotel->name }}</strong>
                                        <small class="text-muted d-block">{{ $booking->hotel->location }}</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="guest-info">
                                        <strong>{{ $booking->user->name }}</strong>
                                        <small class="text-muted d-block">{{ $booking->user->email }}</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="date-badge">
                                        {{ \Carbon\Carbon::parse($booking->check_in)->format('M d, Y') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="date-badge">
                                        {{ \Carbon\Carbon::parse($booking->check_out)->format('M d, Y') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="guests-badge">
                                        <i class="fas fa-user me-1"></i>{{ $booking->guests }}
                                    </span>
                                </td>
                                <td>
                                    <span class="price-badge">
                                        ৳{{ number_format($booking->total_price, 2) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $booking->status }}">
                                        @if($booking->status == 'confirmed')
                                            <i class="fas fa-check-circle me-1"></i>
                                        @elseif($booking->status == 'pending')
                                            <i class="fas fa-clock me-1"></i>
                                        @else
                                            <i class="fas fa-times-circle me-1"></i>
                                        @endif
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="booking-date">
                                        {{ $booking->created_at->format('M d, Y') }}
                                        <small class="d-block text-muted">{{ $booking->created_at->format('h:i A') }}</small>
                                    </span>
                                </td>
                                <td class="pe-4">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-primary" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-success" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center py-5">
                                    <div class="empty-state">
                                        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                                        <h5 class="text-muted">No bookings found</h5>
                                        <p class="text-muted">Hotel bookings will appear here when customers make reservations.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($bookings->hasPages())
                <div class="px-4 py-3 border-top">
                    {{ $bookings->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #1c5873 0%, #14445a 100%);
    }

    .stats-card {
        border-radius: 15px;
        padding: 1.5rem;
        color: white;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transform: translate(30px, -30px);
    }

    .stats-content {
        display: flex;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    .stats-icon {
        font-size: 2.5rem;
        margin-right: 1rem;
        opacity: 0.8;
    }

    .stats-info h3 {
        margin: 0;
        font-size: 2rem;
        font-weight: bold;
    }

    .stats-info p {
        margin: 0;
        opacity: 0.9;
        font-size: 0.9rem;
    }

    .bg-primary { background: linear-gradient(135deg, #007bff 0%, #0056b3 100%) !important; }
    .bg-warning { background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%) !important; }
    .bg-danger { background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important; }
    .bg-success { background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%) !important; }

    .card {
        border-radius: 15px;
        overflow: hidden;
        border: none;
    }

    .card-header {
        border-bottom: none;
        padding: 1.5rem 2rem;
    }

    .table {
        font-size: 0.95rem;
    }

    .table th {
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #dee2e6;
        padding: 1rem 0.75rem;
    }

    .table td {
        padding: 1rem 0.75rem;
        vertical-align: middle;
    }

    .booking-row {
        transition: all 0.3s ease;
    }

    .booking-row:hover {
        background-color: #f8f9fa;
        transform: scale(1.01);
    }

    .hotel-info strong {
        color: #1c5873;
        font-weight: 600;
    }

    .guest-info strong {
        color: #2c3e50;
        font-weight: 600;
    }

    .date-badge {
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        color: #1976d2;
        padding: 0.25rem 0.75rem;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.85rem;
    }

    .guests-badge {
        background: linear-gradient(135deg, #f3e5f5 0%, #e1bee7 100%);
        color: #7b1fa2;
        padding: 0.25rem 0.75rem;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.85rem;
    }

    .price-badge {
        background: linear-gradient(135deg, #e8f5e8 0%, #c8e6c9 100%);
        color: #2e7d32;
        padding: 0.25rem 0.75rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .status-badge {
        padding: 0.375rem 0.75rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-confirmed {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        color: #155724;
    }

    .status-pending {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
        color: #856404;
    }

    .status-cancelled {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        color: #721c24;
    }

    .booking-date {
        font-weight: 500;
        color: #495057;
    }

    .btn-group .btn {
        border-radius: 6px !important;
        margin: 0 1px;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
    }

    .btn-outline-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
    }

    .btn-outline-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
    }

    .empty-state {
        padding: 3rem 2rem;
    }

    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
    }

    @media (max-width: 768px) {
        .stats-card {
            margin-bottom: 1rem;
        }
        
        .table-responsive {
            font-size: 0.85rem;
        }
        
        .btn-group .btn {
            padding: 0.25rem 0.5rem;
        }
    }
</style>
@endsection
