@extends('layouts.admin')

@section('title', 'Edit Transport')
@section('header', 'Edit Transport')

@section('content')
    <div class="edit-transport-wrapper">
        <div class="form-container">
            <div class="form-header">
                <h2><i class="fas fa-edit"></i> Edit Transport</h2>
                <p>Update transport information below</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.transports.update', $transport->id) }}" method="POST" class="transport-form">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label for="name"><i class="fas fa-bus"></i> Transport Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $transport->name) }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="type"><i class="fas fa-tags"></i> Transport Type</label>
                        <select id="type" name="type" required>
                            <option value="bus" {{ $transport->type == 'bus' ? 'selected' : '' }}>Bus</option>
                            <option value="train" {{ $transport->type == 'train' ? 'selected' : '' }}>Train</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="route_from"><i class="fas fa-map-marker-alt"></i> Route From</label>
                        <input type="text" id="route_from" name="route_from"
                            value="{{ old('route_from', $transport->route_from) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="route_to"><i class="fas fa-map-marker-alt"></i> Route To</label>
                        <input type="text" id="route_to" name="route_to"
                            value="{{ old('route_to', $transport->route_to) }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="departure_time"><i class="fas fa-clock"></i> Departure Time</label>
                        <input type="time" id="departure_time" name="departure_time"
                            value="{{ old('departure_time', $transport->departure_time) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="price"><i class="fas fa-dollar-sign"></i> Price</label>
                        <input type="number" id="price" name="price" value="{{ old('price', $transport->price) }}"
                            step="0.01" min="0" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="total_seats"><i class="fas fa-chair"></i> Total Seats</label>
                        <input type="number" id="total_seats" name="total_seats"
                            value="{{ old('total_seats', $transport->total_seats) }}" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="available_seats"><i class="fas fa-check-circle"></i> Available Seats</label>
                        <input type="number" id="available_seats" name="available_seats"
                            value="{{ old('available_seats', $transport->available_seats ?? $transport->total_seats) }}" 
                            min="0" max="{{ $transport->total_seats }}" required>
                        <small class="field-hint">Available seats cannot exceed total seats ({{ $transport->total_seats }})</small>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-update">
                        <i class="fas fa-save"></i> Update Transport
                    </button>
                    <a href="{{ route('admin.transports.viewtransports') }}" class="btn-cancel">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
      
        document.getElementById('total_seats').addEventListener('input', function() {
            const totalSeats = parseInt(this.value) || 0;
            const availableSeatsInput = document.getElementById('available_seats');
            const currentAvailable = parseInt(availableSeatsInput.value) || 0;
            
           
            availableSeatsInput.setAttribute('max', totalSeats);
            
          
            if (currentAvailable > totalSeats) {
                availableSeatsInput.value = totalSeats;
            }
            
     
            const hint = availableSeatsInput.nextElementSibling;
            hint.textContent = `Available seats cannot exceed total seats (${totalSeats})`;
        });

 
        document.getElementById('available_seats').addEventListener('input', function() {
            const totalSeats = parseInt(document.getElementById('total_seats').value) || 0;
            const availableSeats = parseInt(this.value) || 0;
            
            if (availableSeats > totalSeats) {
                this.value = totalSeats;
                alert(`Available seats cannot exceed total seats (${totalSeats})`);
            }
            
            if (availableSeats < 0) {
                this.value = 0;
                alert('Available seats cannot be negative');
            }
        });
    </script>
@endsection
<style>
    .edit-transport-wrapper {
        width: 100%;
        max-width: 100%;
        margin: 0;
        padding: 0;
    }

    .form-container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(28, 88, 115, 0.1);
        position: relative;
    }

    .form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #1c5873, #36a2eb, #1c5873);
    }

    .form-header {
        background: linear-gradient(135deg, #1c5873 0%, #2d6b84 50%, #36a2eb 100%);
        color: white;
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .form-header::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: shimmer 3s ease-in-out infinite;
    }

    @keyframes shimmer {

        0%,
        100% {
            transform: rotate(0deg);
        }

        50% {
            transform: rotate(180deg);
        }
    }

    .form-header h2 {
        margin: 0 0 0.5rem 0;
        font-size: 2rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }

    .form-header p {
        margin: 0;
        opacity: 0.9;
        font-size: 1.1rem;
    }

    .transport-form {
        padding: 2.5rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .form-row:last-of-type {
        grid-template-columns: 1fr;
        max-width: 50%;
    }

    .form-group {
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.75rem;
        font-weight: 600;
        color: #1c5873;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-group label i {
        color: #36a2eb;
        width: 20px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 1rem 1.25rem;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #1c5873;
        box-shadow: 0 0 0 4px rgba(28, 88, 115, 0.1);
        transform: translateY(-2px);
    }

    .form-group input:hover,
    .form-group select:hover {
        border-color: #36a2eb;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .field-hint {
        display: block;
        margin-top: 0.5rem;
        font-size: 0.875rem;
        color: #6c757d;
        font-style: italic;
    }

    .form-actions {
        margin-top: 3rem;
        display: flex;
        gap: 1rem;
        justify-content: center;
        align-items: center;
    }

    .btn-update {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 25px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-update:hover {
        background: linear-gradient(135deg, #218838 0%, #1e7e34 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
    }

    .btn-cancel {
        background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
        color: white;
        text-decoration: none;
        padding: 1rem 2rem;
        border-radius: 25px;
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-cancel:hover {
        background: linear-gradient(135deg, #5a6268 0%, #495057 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
        text-decoration: none;
        color: white;
    }

    .alert {
        margin: 1.5rem 2.5rem;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        border-left: 5px solid;
    }

    .alert-danger {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c2c7 100%);
        border-left-color: #dc3545;
        color: #721c24;
    }

    .alert-success {
        background: linear-gradient(135deg, #d1edff 0%, #b3d9ff 100%);
        border-left-color: #28a745;
        color: #0f5132;
    }

    .alert ul {
        margin: 0;
        padding-left: 1.5rem;
    }

    .alert li {
        margin-bottom: 0.5rem;
    }

    @media (max-width: 768px) {
        .edit-transport-wrapper {
            padding: 1rem;
        }

        .form-container {
            margin: 0;
            border-radius: 15px;
        }

        .form-header {
            padding: 1.5rem;
        }

        .form-header h2 {
            font-size: 1.5rem;
            flex-direction: column;
            gap: 0.5rem;
        }

        .transport-form {
            padding: 1.5rem;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-row:last-of-type {
            max-width: 100%;
        }

        .form-actions {
            flex-direction: column;
            gap: 1rem;
        }

        .btn-update,
        .btn-cancel {
            width: 100%;
            justify-content: center;
            padding: 1.25rem 2rem;
        }

        .alert {
            margin: 1rem;
        }
    }
</style>
