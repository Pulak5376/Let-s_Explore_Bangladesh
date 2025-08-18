@extends('layouts.admin')

@section('title', 'Add New Hotel')
@section('header', 'Add New Hotel')

@section('content')
<div class="container-fluid py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-primary text-white">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-hotel me-2"></i>Add New Hotel
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.hotels.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">
                                    <i class="fas fa-building me-1"></i>Hotel Name
                                </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required
                                       placeholder="Enter hotel name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label">
                                    <i class="fas fa-map-marker-alt me-1"></i>Location
                                </label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                       id="location" name="location" value="{{ old('location') }}" required
                                       placeholder="Enter location">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">
                                <i class="fas fa-align-left me-1"></i>Description
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" required
                                      placeholder="Enter hotel description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="price_per_night" class="form-label">
                                    <i class="fas fa-money-bill-wave me-1"></i>Price Per Night (BDT)
                                </label>
                                <input type="number" class="form-control @error('price_per_night') is-invalid @enderror" 
                                       id="price_per_night" name="price_per_night" value="{{ old('price_per_night') }}" required
                                       placeholder="0">
                                @error('price_per_night')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="rating" class="form-label">
                                    <i class="fas fa-star me-1"></i>Rating (0-5)
                                </label>
                                <input type="number" step="0.1" class="form-control @error('rating') is-invalid @enderror" 
                                       id="rating" name="rating" value="{{ old('rating') }}" min="0" max="5" required
                                       placeholder="4.5">
                                @error('rating')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="available_rooms" class="form-label">
                                    <i class="fas fa-bed me-1"></i>Available Rooms
                                </label>
                                <input type="number" class="form-control @error('available_rooms') is-invalid @enderror" 
                                       id="available_rooms" name="available_rooms" value="{{ old('available_rooms') }}" required
                                       placeholder="50">
                                @error('available_rooms')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="image_url" class="form-label">
                                <i class="fas fa-image me-1"></i>Image URL
                            </label>
                            <input type="url" class="form-control @error('image_url') is-invalid @enderror" 
                                   id="image_url" name="image_url" value="{{ old('image_url') }}" required
                                   placeholder="https://example.com/image.jpg">
                            @error('image_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-plus me-2"></i>Add Hotel
                            </button>
                            <a href="{{ route('admin.hotels.create') }}" class="btn btn-secondary btn-lg px-5 ms-3">
                                <i class="fas fa-arrow-left me-2"></i>Back to List
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #1c5873 0%, #14445a 100%);
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        border-bottom: none;
        padding: 1.5rem 2rem;
    }

    .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #1c5873;
        box-shadow: 0 0 0 0.2rem rgba(28, 88, 115, 0.25);
        transform: translateY(-2px);
    }

    .form-control::placeholder {
        color: #adb5bd;
        font-style: italic;
    }

    .btn-primary {
        background: linear-gradient(135deg, #1c5873 0%, #14445a 100%);
        border: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(28, 88, 115, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #14445a 0%, #0f3344 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(28, 88, 115, 0.4);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
        border: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
    }

    .btn-secondary:hover {
        background: linear-gradient(135deg, #5a6268 0%, #494f54 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(108, 117, 125, 0.4);
    }

    .alert {
        border-radius: 10px;
        border: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .alert-success {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        color: #155724;
    }

    .invalid-feedback {
        font-weight: 500;
        font-size: 0.875rem;
    }

    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
    }

    .fas {
        color: #1c5873;
    }

    .form-label .fas {
        color: #6c757d;
    }
</style>
@endsection
