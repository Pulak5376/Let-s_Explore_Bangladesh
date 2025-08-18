@extends('layouts.admin')

@section('title', 'Add New Hotel')
@section('header', 'Add New Hotel')

@section('content')
<div class="container py-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.hotels.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Hotel Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" 
                           id="location" name="location" value="{{ old('location') }}" required>
                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price_per_night" class="form-label">Price Per Night (BDT)</label>
                    <input type="number" class="form-control @error('price_per_night') is-invalid @enderror" 
                           id="price_per_night" name="price_per_night" value="{{ old('price_per_night') }}" required>
                    @error('price_per_night')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating (0-5)</label>
                    <input type="number" step="0.1" class="form-control @error('rating') is-invalid @enderror" 
                           id="rating" name="rating" value="{{ old('rating') }}" min="0" max="5" required>
                    @error('rating')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image_url" class="form-label">Image URL</label>
                    <input type="url" class="form-control @error('image_url') is-invalid @enderror" 
                           id="image_url" name="image_url" value="{{ old('image_url') }}" required>
                    @error('image_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="available_rooms" class="form-label">Available Rooms</label>
                    <input type="number" class="form-control @error('available_rooms') is-invalid @enderror" 
                           id="available_rooms" name="available_rooms" value="{{ old('available_rooms') }}" required>
                    @error('available_rooms')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add Hotel</button>
            </form>
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

    .form-label {
        font-weight: 500;
        color: #2c3e50;
    }

    .form-control {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 0.5rem 1rem;
    }

    .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    .btn-primary {
        background-color: #1c5873;
        border: none;
        padding: 0.75rem 2rem;
        font-weight: 500;
    }

    .btn-primary:hover {
        background-color: #14445a;
    }

    .alert {
        border-radius: 4px;
        margin-bottom: 1rem;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }
</style>
@endsection
