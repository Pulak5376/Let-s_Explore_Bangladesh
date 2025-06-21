<!-- home.blade.php -->
@extends('layout.master')
@section('title', 'Home')
@section('content')

<section class="banner">
    <div class="overlay">
        <h1>Welcome to Let's Explore Bangladesh</h1>
        <p>Discover the Beauty, Culture & Flavors of Bangladesh</p>
    </div>
</section>

<section class="section">
    <h2>Explore Popular Districts</h2>
    <div class="card-container">
        <div class="card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/3/36/Sundarbans_National_Park.jpg" alt="Sundarbans">
            <h3>Sundarbans</h3>
            <p>Khulna</p>
        </div>
        <div class="card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b6/Cox%27s_Bazar_Beach%2C_Bangladesh.jpg" alt="Cox's Bazar">
            <h3>Cox's Bazar</h3>
            <p>Chattogram</p>
        </div>
        <div class="card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/f9/Sylhet_tea_garden.jpg" alt="Tea Gardens">
            <h3>Tea Gardens</h3>
            <p>Sylhet</p>
        </div>
        <div class="card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/3/32/Somapura_Mahavihara%2C_Paharpur%2C_Bangladesh.jpg" alt="Paharpur">
            <h3>Paharpur</h3>
            <p>Naogaon</p>
        </div>
    </div>
</section>

@endsection
