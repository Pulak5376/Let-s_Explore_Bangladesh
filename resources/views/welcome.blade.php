@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="hero">
  <div class="glass">
    <h1>Discover Bangladesh's Hidden Gems</h1>
    <p>From the Sundarbans to the rolling tea gardens—start your adventure today.</p>
    <div class="cta-buttons">
      <a href="/places" class="btn">Explore Places</a>
      <a href="/register" class="btn btn-ghost">Join Us</a>
    </div>
  </div>
</section>

<section class="hero-section" role="banner" aria-label="Introduction">
  <h1 id="typed-text" aria-live="polite" aria-atomic="true"></h1>
  <p class="hero-subtitle">
    Discover the beauty and culture of Bangladesh — breathtaking landscapes, vibrant traditions, and unforgettable experiences await you.
  </p>
</section>

<section class="carousel-section" aria-label="Image carousel of popular destinations">
  <div class="carousel-container" id="carousel">
    <div class="carousel-slide active">
      <img src="https://ttg.com.bd/uploads/tours/plans/204_36376273530_3c9a0335f5_b-copyjpg.webp" alt="Cox's Bazar beach view" />
    </div>
    <div class="carousel-slide">
      <img src="https://cosmosgroup.sgp1.digitaloceanspaces.com/news/details/5967770_Kaptai%20Lake%20Rangamati%20Travel%20guide.jpg" alt="Bandarban landscape" />
    </div>
    <div class="carousel-slide">
      <img src="https://images.hive.blog/768x0/https://cdn.pixabay.com/photo/2018/03/20/14/00/sea-3243357_960_720.jpg" alt="Srimangal tea gardens" />
    </div>
    <div class="carousel-slide">
      <img src="https://www.travelandexplorebd.com/storage/app/public/posts/April2020/41.jpg" alt="Srimangal tea gardens" />
    </div>
    <div class="carousel-slide">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Sundarban_Tiger.jpg/330px-Sundarban_Tiger.jpg" alt="Srimangal tea gardens" />
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

<style>
  .hero {
    position: relative;
    width: 100vw;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
    height: calc(100vh - var(--header-height));
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #fff;
    isolation: isolate;
    overflow: hidden;
  }

  .hero::before {
    content: "";
    position: absolute;
    inset: 0;
    background: url('https://images.unsplash.com/photo-1739477021524-0266d3dabec9?auto=format&fit=crop&w=2000&q=80') center/cover no-repeat;
    transform: scale(1);
    transition: transform 12s ease-in-out;
    z-index: -2;
  }

  .hero:hover::before {
    transform: scale(1.08);
  }

  .hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(rgba(0, 0, 0, .55), rgba(0, 0, 0, .25));
    z-index: -1;
  }

  .glass {
    backdrop-filter: blur(8px) saturate(180%);
    background: rgba(255, 255, 255, .08);
    border: 1px solid rgba(255, 255, 255, .25);
    border-radius: var(--radius);
    padding: 4rem 2rem;
  }

  .hero h1 {
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    text-transform: uppercase;
    margin-bottom: 1rem;
    color: #00ff0dc9;
  }

  .hero p {
    font-size: clamp(1rem, 2.2vw, 1.35rem);
    font-weight: 300;
    color: #e6e6e6;
    margin-bottom: 2rem;
  }
   *,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
    html{scroll-behavior:smooth}
    body {
      font-family: 'Poppins', sans-serif;
      color: var(--text-light);
      background: var(--bg-light);
      overflow-x: hidden;
      transition: background var(--transition), color var(--transition);
    }
  .carousel-slide {
    display: none;
  }
  .carousel-slide.active {
    display: block;
  }
  .intro-packages {
    margin-bottom: 70px;
  }
</style>

<script>
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

    const carousel = document.getElementById('carousel');
    const slides = carousel.querySelectorAll('.carousel-slide');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentSlide = 0;

    function updateCarousel() {
      slides.forEach((slide, idx) => {
        slide.classList.toggle('active', idx === currentSlide);
      });
    }

    prevBtn.addEventListener('click', () => {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length;
      updateCarousel();
    });

    nextBtn.addEventListener('click', () => {
      currentSlide = (currentSlide + 1) % slides.length;
      updateCarousel();
    });

    updateCarousel();
  });
</script>
@endsection
