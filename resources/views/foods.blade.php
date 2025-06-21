
<!-- foods.blade.php -->
@extends('layout.master')
@section('title', 'Traditional Foods')
@section('content')
<section class="section">
    <h2>Famous Traditional Foods</h2>
    <div class="card-container">
        <div class="card">
            <img src="{{ asset('images/doi.jpg') }}" alt="Bogura Doi">
            <h3>Bogura Doi</h3>
        </div>
        <div class="card">
            <img src="{{ asset('images/bakarkhani.jpg') }}" alt="Bakarkhani">
            <h3>Bakarkhani</h3>
        </div>
    </div>
</section>
@endsection