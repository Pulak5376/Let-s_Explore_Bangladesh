@extends('layouts.admin')

@section('title', 'Booking List')
@section('header', 'Booking List')

@section('content')
<div class="booking-content-wrapper">
    <div class="filter-section">
        <button id="showAll" class="filter-btn {{ !request('transport_type') ? 'active' : '' }}">All Bookings</button>
        <button id="showBus" class="filter-btn {{ request('transport_type') == 'bus' ? 'active' : '' }}">Bus Bookings</button>
        <button id="showTrain" class="filter-btn {{ request('transport_type') == 'train' ? 'active' : '' }}">Train Bookings</button>
    </div>
    
    <div class="search-section">
        <form action="{{ route('admin.transports.searchbookings') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="🔍 Search Bookings by Name, Type, or ID..." value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="table-wrapper">
        <table class="booking-table">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Name</th>
                    <th>Transport Name</th>
                    <th>Transport ID</th>
                    <th>Type</th>
                    <th>Total Seats</th>
                    <th>Booking Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td data-label="Booking ID">{{ $booking->id }}</td>
                        <td data-label="Name">{{ $booking->passenger_name }}</td>
                        <td data-label="Transport Name">{{ $booking->transport->name }}</td>
                        <td data-label="Transport ID">{{ $booking->transport->id }}</td>
                        <td data-label="Type">{{ ucfirst($booking->transport->type) }}</td>
                        <td data-label="Total Seats">{{ $booking->seats_booked }}</td>
                        <td data-label="Booking Date">{{ $booking->booking_date }}</td>
                        <td data-label="Actions">
                            <form id="delete-form-{{ $booking->id }}" action="{{ route('admin.bookings.transports.destroy', $booking->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="delete-btn" onclick="showDeleteModal({{ $booking->id }}, '{{ $booking->passenger_name }}', '{{ $booking->transport->name }}')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="deleteModal" class="modal-overlay">
    <div class="modal-container">
        <div class="modal-header">
            <div class="modal-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3>Confirm Deletion</h3>
        </div>
        <div class="modal-body">
            <p>Do you want to delete this booking?</p>
            <div class="booking-details">
                <div class="detail-item">
                    <span class="label">Passenger:</span>
                    <span id="passengerName" class="value"></span>
                </div>
                <div class="detail-item">
                    <span class="label">Transport:</span>
                    <span id="transportName" class="value"></span>
                </div>
            </div>
            <div class="warning-text">
                <i class="fas fa-exclamation-triangle"></i>
                 This action cannot be undone!
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="cancel-btn" onclick="hideDeleteModal()">
                <i class="fas fa-times"></i>
                No
            </button>
            <button type="button" class="confirm-btn" onclick="confirmDelete()">
                <i class="fas fa-check"></i>
                Yes
            </button>
        </div>
    </div>
</div>

<script>
    let currentBookingId = null;

    document.getElementById('showAll').addEventListener('click', function () {
        window.location.href = "{{ route('admin.bookings.transports.viewlist') }}";
    });
    document.getElementById('showBus').addEventListener('click', function () {
        window.location.href = "{{ route('admin.bookings.transports.viewlist') }}?transport_type=bus";
    });
    document.getElementById('showTrain').addEventListener('click', function () {
        window.location.href = "{{ route('admin.bookings.transports.viewlist') }}?transport_type=train";
    });

    function showDeleteModal(bookingId, passengerName, transportName) {
        currentBookingId = bookingId;
        document.getElementById('passengerName').textContent = passengerName;
        document.getElementById('transportName').textContent = transportName;
        document.getElementById('deleteModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        setTimeout(() => {
            document.querySelector('.modal-container').classList.add('modal-show');
        }, 10);
    }

    function hideDeleteModal() {
        document.querySelector('.modal-container').classList.remove('modal-show');
        document.body.style.overflow = 'auto';
        
        setTimeout(() => {
            document.getElementById('deleteModal').style.display = 'none';
            currentBookingId = null;
        }, 300);
    }

    function confirmDelete() {
        if (currentBookingId) {
            document.getElementById('delete-form-' + currentBookingId).submit();
        }
    }

    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            hideDeleteModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            hideDeleteModal();
        }
    });
</script>
@endsection
    <style>
        .booking-content-wrapper {
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 0;
        }

        .filter-section {
            margin-bottom: 1.5rem;
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .search-section {
            margin-bottom: 2rem;
        }

        .search-form {
            display: flex;
            gap: 0.75rem;
            align-items: center;
            max-width: 600px;
        }

        .search-form input {
            flex: 1;
            padding: 0.75rem 1rem;
            border: 2px solid #e9ecef;
            border-radius: 25px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .search-form input:focus {
            outline: none;
            border-color: #1c5873;
            box-shadow: 0 0 0 3px rgba(28, 88, 115, 0.1);
        }

        .search-form button {
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #1c5873 0%, #2d6b84 100%);
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(28, 88, 115, 0.3);
        }

        .search-form button:hover {
            background: linear-gradient(135deg, #164963 0%, #1c5873 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(28, 88, 115, 0.4);
        }

        .filter-btn {
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border: 2px solid #e9ecef;
            color: #495057;
            cursor: pointer;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.875rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .filter-btn:hover {
            background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
            border-color: #adb5bd;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #1c5873 0%, #2d6b84 100%);
            color: white;
            border-color: #1c5873;
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(28, 88, 115, 0.3);
        }

        .table-wrapper {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .booking-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .booking-table th,
        .booking-table td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid rgba(233, 236, 239, 0.5);
        }

        .booking-table th {
            background: linear-gradient(135deg, #1c5873 0%, #2d6b84 50%, #36a2eb 100%);
            color: white;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.875rem;
            position: relative;
        }

        .booking-table tbody tr {
            transition: all 0.3s ease;
        }

        .booking-table tbody tr:nth-child(even) {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .booking-table tbody tr:nth-child(odd) {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }

        .booking-table tbody tr:hover {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 50%, #90caf9 100%);
            transform: translateY(-2px) scale(1.01);
            box-shadow: 0 8px 25px rgba(28, 88, 115, 0.15);
            z-index: 10;
        }

        .booking-table tbody tr:hover td {
            color: #1c5873;
            font-weight: 600;
        }

        .booking-table tbody td {
            color: #495057;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .delete-btn {
            color: #dc3545;
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border: 2px solid #dc3545;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .delete-btn:hover {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        }

        @media (max-width: 768px) {
            .booking-content-wrapper {
                padding: 1rem;
            }

            .filter-section {
                flex-direction: column;
            }

            .filter-btn {
                width: 100%;
                margin-bottom: 0.5rem;
                padding: 1rem;
                font-size: 1rem;
            }

            .search-form {
                flex-direction: column;
                max-width: 100%;
            }

            .search-form input,
            .search-form button {
                width: 100%;
                padding: 1rem;
                font-size: 1rem;
            }

            .table-wrapper {
                margin: 0 -1rem;
                border-radius: 0;
            }

            .booking-table,
            .booking-table thead,
            .booking-table tbody,
            .booking-table th,
            .booking-table td,
            .booking-table tr {
                display: block;
            }

            .booking-table thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            .booking-table tr {
                margin-bottom: 1.5rem;
                border: 2px solid #dee2e6;
                border-radius: 15px;
                padding: 1rem;
                background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                position: relative;
                overflow: hidden;
            }

            .booking-table tr::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 3px;
                background: linear-gradient(90deg, #1c5873, #36a2eb, #1c5873);
            }

            .booking-table td {
                text-align: right;
                position: relative;
                padding: 0.75rem 0.75rem 0.75rem 50%;
                border: none;
                border-bottom: 1px solid #f1f1f1;
            }

            .booking-table td:last-child {
                border-bottom: none;
                text-align: center;
                padding-left: 0.75rem;
            }

            .booking-table td::before {
                content: attr(data-label) ": ";
                position: absolute;
                left: 0;
                width: 45%;
                padding-left: 1rem;
                text-align: left;
                font-weight: 700;
                color: #1c5873;
                text-transform: uppercase;
                font-size: 0.875rem;
                letter-spacing: 0.5px;
            }
        }

        @media (max-width: 480px) {
            .filter-btn {
                font-size: 0.875rem;
                padding: 0.875rem;
            }

            .booking-table th,
            .booking-table td {
                padding: 0.75rem;
                font-size: 0.875rem;
            }
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            opacity: 0;
            animation: fadeIn 0.3s ease forwards;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        .modal-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 90%;
            max-height: 90vh;
            overflow: hidden;
            transform: scale(0.7) translateY(50px);
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .modal-container.modal-show {
            transform: scale(1) translateY(0);
        }

        .modal-header {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            padding: 1.5rem;
            text-align: center;
            position: relative;
        }

        .modal-icon {
            font-size: 2.5rem;
            margin-bottom: 0.75rem;
            opacity: 0.9;
        }

        .modal-header h3 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .modal-body {
            padding: 1.5rem;
            text-align: center;
        }

        .modal-body p {
            font-size: 1.1rem;
            color: #495057;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .booking-details {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 1rem;
            margin: 1rem 0;
            border-left: 4px solid #dc3545;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
            padding: 0.5rem 0;
        }

        .detail-item:last-child {
            margin-bottom: 0;
        }

        .detail-item .label {
            font-weight: 700;
            color: #1c5873;
            text-transform: uppercase;
            font-size: 0.875rem;
            letter-spacing: 0.5px;
        }

        .detail-item .value {
            font-weight: 600;
            color: #495057;
            background: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            border: 2px solid #dee2e6;
        }

        .warning-text {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            color: #dc3545;
            font-weight: 700;
            font-size: 1rem;
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.15) 0%, rgba(220, 53, 69, 0.08) 100%);
            padding: 1rem;
            border-radius: 15px;
            border: 2px solid rgba(220, 53, 69, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            animation: pulseWarning 2s ease-in-out infinite;
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
        }

        @keyframes pulseWarning {
            0%, 100% { 
                transform: scale(1);
                box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
            }
            50% { 
                transform: scale(1.02);
                box-shadow: 0 6px 20px rgba(220, 53, 69, 0.3);
            }
        }

        .warning-text i {
            font-size: 1.2rem;
            animation: shake 1.5s ease-in-out infinite;
        }

        @keyframes shake {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-3deg); }
            75% { transform: rotate(3deg); }
        }

        .modal-footer {
            display: flex;
            gap: 1rem;
            padding: 1.5rem;
            background: #f8f9fa;
        }

        .cancel-btn {
            flex: 1;
            padding: 1rem 1.5rem;
            background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .cancel-btn:hover {
            background: linear-gradient(135deg, #5a6268 0%, #495057 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
        }

        .confirm-btn {
            flex: 1;
            padding: 1rem 1.5rem;
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .confirm-btn:hover {
            background: linear-gradient(135deg, #c82333 0%, #a71e2a 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
        }

        @media (max-width: 480px) {
            .modal-container {
                width: 95%;
                margin: 1rem;
            }

            .modal-header,
            .modal-body,
            .modal-footer {
                padding: 1.5rem;
            }

            .modal-footer {
                flex-direction: column;
            }

            .detail-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .detail-item .value {
                width: 100%;
                text-align: center;
            }
        }
    </style>
