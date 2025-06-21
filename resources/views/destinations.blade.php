<!-- destinations.blade.php -->
@extends('layout.master')
@section('title', 'Destinations')
@section('content')
<section class="section">
    <h2>Top Tourist Destinations</h2>
    <div class="card-container">
        <!-- Repeat similar destination cards -->
        <div class="card">
            <img src="{{ asset('images/sajek.jpg') }}" alt="Sajek Valley">
            <h3>Sajek Valley</h3>
            <p>Rangamati</p>
        </div>
    </div>
</section>
@endsection