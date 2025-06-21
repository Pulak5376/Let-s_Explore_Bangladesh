<!-- crafts.blade.php -->
@extends('layout.master')
@section('title', 'Cultural Crafts')
@section('content')
<section class="section">
    <h2>Famous Handicrafts</h2>
    <div class="card-container">
        <div class="card">
            <img src="{{ asset('images/jamdani.jpg') }}" alt="Jamdani Saree">
            <h3>Jamdani Saree</h3>
            <p>Narayanganj</p>
        </div>
        <div class="card">
            <img src="{{ asset('images/shataranji.jpg') }}" alt="Shataranji">
            <h3>Shataranji</h3>
            <p>Rangpur</p>
        </div>
    </div>
</section>
@endsection