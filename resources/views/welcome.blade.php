@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="hero-section" role="banner" aria-label="Introduction">
  <h1 id="typed-text" aria-live="polite" aria-atomic="true"></h1>
  <p class="hero-subtitle">
    Discover the beauty and culture of Bangladesh — breathtaking landscapes, vibrant traditions, and unforgettable experiences await you.
  </p>
</section>

<section class="carousel-section" aria-label="Image carousel of popular destinations">
  <div class="carousel-container" id="carousel">
    <div class="carousel-slide active">
      <img src="https://th.bing.com/th/id/OIP.PxGv6Xc7rI5ZU1NgDTG0fwHaEo?w=276&h=180" alt="Cox's Bazar beach view" />
    </div>
    <div class="carousel-slide">
      <img src="https://th.bing.com/th/id/OIP.tOxT05hSKDmO2bwI2WfpRwHaFj?w=236&h=180" alt="Bandarban landscape" />
    </div>
    <div class="carousel-slide">
      <img src="https://th.bing.com/th/id/OIP.vaBk0HxSSfZmkpVS2_s72wHaFE?w=268&h=183" alt="Srimangal tea gardens" />
    </div>
    <button class="carousel-btn prev" id="prevBtn" aria-label="Previous slide">&#10094;</button>
    <button class="carousel-btn next" id="nextBtn" aria-label="Next slide">&#10095;</button>
  </div>
</section>

<section class="intro-packages" aria-labelledby="packages-title">
  <h2 id="packages-title">Popular Travel Packages</h2>
  <div class="package-cards">
    <article class="package-card" tabindex="0" aria-label="Cox's Bazar Beach Getaway travel package">
      <img src="https://th.bing.com/th/id/OIP.PxGv6Xc7rI5ZU1NgDTG0fwHaEo?w=276&h=180" alt="Cox's Bazar Beach" />
      <h3>Cox's Bazar Beach Getaway</h3>
      <p>5 days / 4 nights</p>
      <p><strong>Price:</strong> $200 per person</p>
    </article>
    <article class="package-card" tabindex="0" aria-label="Bandarban Adventure Tour travel package">
      <img src="https://th.bing.com/th/id/OIP.tOxT05hSKDmO2bwI2WfpRwHaFj?w=236&h=180" alt="Bandarban hills" />
      <h3>Bandarban Adventure Tour</h3>
      <p>4 days / 3 nights</p>
      <p><strong>Price:</strong> $180 per person</p>
    </article>
    <article class="package-card" tabindex="0" aria-label="Srimangal Tea Garden Escape travel package">
      <img src="https://th.bing.com/th/id/OIP.vaBk0HxSSfZmkpVS2_s72wHaFE?w=268&h=183" alt="Srimangal Tea Gardens" />
      <h3>Srimangal Tea Garden Escape</h3>
      <p>3 days / 2 nights</p>
      <p><strong>Price:</strong> $150 per person</p>
    </article>
  </div>
</section>

<section class="why-visit" aria-label="Reasons to visit Bangladesh">
  <h2>Why Visit Bangladesh?</h2>
  <p>
    From the serene Sundarbans to the lively streets of Dhaka, Bangladesh offers a diverse range of experiences — rich history, mouth-watering cuisine, warm hospitality, and breathtaking natural wonders.
  </p>
</section>

<script>
  // Typed text animation
  const textEl = document.getElementById('typed-text');
  const phrases = [
    "Welcome to Let's Explore Bangladesh!",
    "Discover breathtaking landscapes.",
    "Experience vibrant culture.",
    "Plan your unforgettable trip today."
  ];

  let phraseIndex = 0;
  let letterIndex = 0;
  let currentText = '';
  let isDeleting = false;
  let typingSpeed = 100;
  let pauseTime = 2000;

  function type() {
    const fullText = phrases[phraseIndex];
    if (isDeleting) {
      currentText = fullText.substring(0, letterIndex - 1);
      letterIndex--;
    } else {
      currentText = fullText.substring(0, letterIndex + 1);
      letterIndex++;
    }

    textEl.textContent = currentText;

    if (!isDeleting && letterIndex === fullText.length) {
      setTimeout(() => isDeleting = true, pauseTime);
    } else if (isDeleting && letterIndex === 0) {
      isDeleting = false;
      phraseIndex = (phraseIndex + 1) % phrases.length;
    }

    setTimeout(type, isDeleting ? typingSpeed / 2 : typingSpeed);
  }

  document.addEventListener('DOMContentLoaded', () => {
    if(textEl) {
      type();
    }

    // Carousel functionality
    const carousel = document.getElementById('carousel');
    const slides = carousel.querySelectorAll('.carousel-slide');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentSlide = 0;

    function updateCarousel() {
      carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    prevBtn.addEventListener('click', () => {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length;
      updateCarousel();
    });

    nextBtn.addEventListener('click', () => {
      currentSlide = (currentSlide + 1) % slides.length;
      updateCarousel();
    });

  });
</script>
@endsection
