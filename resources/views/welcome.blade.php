@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="hero-section">
  <h1 id="typed-text"></h1>
  <p class="hero-subtitle">
    Discover the beauty and culture of Bangladesh — breathtaking landscapes, vibrant traditions, and unforgettable experiences await you.
  </p>
</section>

{{-- Image Carousel --}}
<section class="carousel-section">
  <div class="carousel-container" id="carousel">
    <div class="carousel-slide active">
      <img src="https://th.bing.com/th/id/OIP.PxGv6Xc7rI5ZU1NgDTG0fwHaEo?w=276&h=180" alt="Cox's Bazar" />
    </div>
    <div class="carousel-slide">
      <img src="https://th.bing.com/th/id/OIP.tOxT05hSKDmO2bwI2WfpRwHaFj?w=236&h=180" alt="Bandarban" />
    </div>
    <div class="carousel-slide">
      <img src="https://th.bing.com/th/id/OIP.vaBk0HxSSfZmkpVS2_s72wHaFE?w=268&h=183" alt="Srimangal" />
    </div>
    <button class="carousel-btn prev" id="prevBtn">&#10094;</button>
    <button class="carousel-btn next" id="nextBtn">&#10095;</button>
  </div>
</section>

<section class="intro-packages">
  <h2>Popular Travel Packages</h2>
  <div class="package-cards">
    <div class="package-card">
      <img src="https://th.bing.com/th/id/OIP.PxGv6Xc7rI5ZU1NgDTG0fwHaEo?w=276&h=180" alt="Cox's Bazar" />
      <h3>Cox's Bazar Beach Getaway</h3>
      <p>5 days / 4 nights</p>
      <p><strong>Price:</strong> $200 per person</p>
    </div>
    <div class="package-card">
      <img src="https://th.bing.com/th/id/OIP.tOxT05hSKDmO2bwI2WfpRwHaFj?w=236&h=180" alt="Bandarban" />
      <h3>Bandarban Adventure Tour</h3>
      <p>4 days / 3 nights</p>
      <p><strong>Price:</strong> $180 per person</p>
    </div>
    <div class="package-card">
      <img src="https://th.bing.com/th/id/OIP.vaBk0HxSSfZmkpVS2_s72wHaFE?w=268&h=183" alt="Srimangal" />
      <h3>Srimangal Tea Garden Escape</h3>
      <p>3 days / 2 nights</p>
      <p><strong>Price:</strong> $150 per person</p>
    </div>
  </div>
</section>

<section class="why-visit">
  <h2>Why Visit Bangladesh?</h2>
  <p>
    From the serene Sundarbans to the lively streets of Dhaka, Bangladesh offers a diverse range of experiences — rich history, mouth-watering cuisine, warm hospitality, and breathtaking natural wonders.
  </p>
</section>
@endsection
