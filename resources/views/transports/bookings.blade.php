@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-list-alt me-2"></i>
                        @if($type === 'all')
                            My Transport Bookings
                        @else
                            My {{ ucfirst($type) }} Bookings
                        @endif
                    </h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('info'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="fas fa-info-circle me-2"></i>{{ session('info') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($bookings->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Transport Info</th>
                                        <th>Route</th>
                                        <th>Passenger Details</th>
                                        <th>Journey Date</th>
                                        <th>Seats</th>
                                        <th>Total Amount</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td class="fw-bold text-primary">#{{ $booking->id }}</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bold">{{ $booking->transport->name }}</span>
                                                    <small class="text-muted">{{ $booking->transport->type }}</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="text-success">{{ $booking->transport->route_from }}</span>
                                                    <i class="fas fa-arrow-down text-muted"></i>
                                                    <span class="text-danger">{{ $booking->transport->route_to }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bold">{{ $booking->passenger_name }}</span>
                                                    <small class="text-muted">{{ $booking->passenger_email }}</small>
                                                    <small class="text-muted">{{ $booking->passenger_phone }}</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bold">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</span>
                                                    <small class="text-muted">{{ \Carbon\Carbon::parse($booking->booking_date)->format('l') }}</small>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-info fs-6">{{ $booking->seats_booked }}</span>
                                            </td>
                                            <td class="fw-bold text-success">৳{{ number_format($booking->transport->price * $booking->seats_booked, 2) }}</td>
                                            <td>
                                                @if($booking->payment_status === 'paid')
                                                    <span class="badge bg-success fs-6">
                                                        <i class="fas fa-check-circle me-1"></i>Paid
                                                    </span>
                                                    @if($booking->updated_at && $booking->payment_status === 'paid')
                                                        <br><small class="text-muted">{{ $booking->updated_at->format('d M Y, h:i A') }}</small>
                                                    @endif
                                                @else
                                                    <span class="badge bg-warning fs-6">
                                                        <i class="fas fa-clock me-1"></i>Pending
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($booking->payment_status !== 'paid')
                                                    <form action="{{ route('payment.initiate') }}" method="POST" class="payment-form">
                                                        @csrf
                                                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                                        <button type="button" class="btn btn-success btn-sm pay-now-btn" data-amount="{{ $booking->transport->price * $booking->seats_booked }}" data-booking="{{ $booking->id }}">
                                                            <i class="fas fa-credit-card me-1"></i>Pay Now
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="text-success">
                                                        <i class="fas fa-check-circle me-1"></i>Completed
                                                    </span>
                                                    <br><small class="text-muted">Booking ID: {{ $booking->id }}</small>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card border-primary">
                                    <div class="card-body text-center">
                                        <h6 class="text-primary">Total Bookings</h6>
                                        <h4 class="text-dark">{{ $bookings->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-success">
                                    <div class="card-body text-center">
                                        <h6 class="text-success">Total Paid Amount</h6>
                                        <h4 class="text-dark">৳{{ number_format($bookings->where('payment_status', 'paid')->sum(function($booking) { return $booking->transport->price * $booking->seats_booked; }), 2) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                            <h5 class="text-muted">No bookings found</h5>
                            <p class="text-muted">
                                @if($type === 'all')
                                    You haven't made any transport bookings yet.
                                @else
                                    You haven't made any {{ $type }} bookings yet.
                                @endif
                            </p>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('bus.page') }}" class="btn btn-primary">
                                    <i class="fas fa-bus me-1"></i>Book Bus
                                </a>
                                <a href="{{ route('train.page') }}" class="btn btn-success">
                                    <i class="fas fa-train me-1"></i>Book Train
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payment Confirmation Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-credit-card me-2"></i>Confirm Payment
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="fas fa-shield-alt fa-3x text-success mb-2"></i>
                    <h6>Secure Payment with SSLCommerz</h6>
                </div>
                <p>You are about to pay <strong class="text-success">৳<span id="paymentAmount"></span></strong> for booking #<span id="paymentBookingId"></span>.</p>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    You will be redirected to SSLCommerz secure payment gateway.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="confirmPayment">
                    <i class="fas fa-credit-card me-1"></i>Proceed to Payment
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.table th, .table td {
    vertical-align: middle;
}

.payment-form {
    margin: 0;
}

.pay-now-btn {
    transition: all 0.3s ease;
}

.pay-now-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.card {
    border: none;
    border-radius: 15px;
}

.table-responsive {
    border-radius: 10px;
    overflow: hidden;
}

.badge {
    border-radius: 10px;
}

.alert {
    border-radius: 10px;
}

.modal-content {
    border-radius: 15px;
}

@media (max-width: 768px) {
    .table-responsive {
        font-size: 14px;
    }
    
    .d-flex.flex-column span {
        font-size: 13px;
    }
    
    .btn-sm {
        font-size: 12px;
        padding: 0.25rem 0.5rem;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentForm = null;
    
    // Handle pay now button clicks
    document.querySelectorAll('.pay-now-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const amount = this.getAttribute('data-amount');
            const bookingId = this.getAttribute('data-booking');
            currentForm = this.closest('form');
            
            document.getElementById('paymentAmount').textContent = parseFloat(amount).toFixed(2);
            document.getElementById('paymentBookingId').textContent = bookingId;
            
            const modal = new bootstrap.Modal(document.getElementById('paymentModal'));
            modal.show();
        });
    });
    
    // Handle payment confirmation
    document.getElementById('confirmPayment').addEventListener('click', function() {
        if (currentForm) {
            // Show loading state
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Processing...';
            this.disabled = true;
            
            // Submit the form
            currentForm.submit();
        }
    });
    
    // Auto dismiss alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
});
</script>
@endsection
