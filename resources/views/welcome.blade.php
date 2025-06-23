<!-- resources/views/welcome.blade.php -->
@extends('layout.master')

@section('title', 'Welcome')

@section('content')
<section class="welcome-section">
    <div class="welcome-banner">
        <h1 class="headline">Explore the Beauty of Bangladesh</h1>
        <p class="subtext">Discover the land of rivers, vibrant culture, and warm hospitality.</p>
        <a href="{{ url('/home') }}" class="btn btn-primary">Start Exploring</a>
    </div>
</section>
@endsection
