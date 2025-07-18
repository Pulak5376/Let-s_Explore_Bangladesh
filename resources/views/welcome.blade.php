@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section class="hero-section" role="banner" aria-label="Introduction">
  <h1 id="typed-text" aria-live="polite" aria-atomic="true"></h1>
  <p class="hero-subtitle">
    Discover the beauty and culture of Bangladesh — breathtaking landscapes, vibrant traditions, and unforgettable experiences await you.
  </p>
</section>

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
      <p><strong>Price:</strong> BDT 2000 per person</p>
    </article>
    <article class="package-card" tabindex="0" aria-label="Bandarban Adventure Tour travel package">
      <img src="https://th.bing.com/th/id/OIP.tOxT05hSKDmO2bwI2WfpRwHaFj?w=236&h=180" alt="Bandarban hills" />
      <h3>Bandarban Adventure Tour</h3>
      <p>4 days / 3 nights</p>
      <p><strong>Price:</strong> BDT 2500 per person</p>
    </article>
    <article class="package-card" tabindex="0" aria-label="Srimangal Tea Garden Escape travel package">
      <img src="https://th.bing.com/th/id/OIP.vaBk0HxSSfZmkpVS2_s72wHaFE?w=268&h=183" alt="Srimangal Tea Gardens" />
      <h3>Srimangal Tea Garden Escape</h3>
      <p>3 days / 2 nights</p>
      <p><strong>Price:</strong> BDT 3000 per person</p>
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
    animation: zoomInOut 20s ease-in-out infinite;
    z-index: -2;
  }

  @keyframes zoomInOut {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.1);
    }
    100% {
      transform: scale(1);
    }
  }

  .hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(rgba(0, 0, 0, .55), rgba(0, 0, 0, .25));
    z-index: -1;
  }

  .glass {
    backdrop-filter: blur(14px) saturate(180%);
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: var(--radius);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
    padding: 4rem 2rem;
    max-width: 800px;
    width: 90%;
  }

  .cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
  }

  .btn {
    display: inline-block;
    padding: 1rem 2rem;
    background: linear-gradient(135deg, #4caf50, #388e3c);
    color: white;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid #66bb6a;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 0.9rem;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
  }

  .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.4);
    background: linear-gradient(135deg, #66bb6a, #4caf50);
    border-color: #81c784;
  }

  .btn-ghost {
    background: transparent;
    border: 2px solid #66bb6a;
    color: white;
  }

  .btn-ghost:hover {
    background: rgba(102, 187, 106, 0.2);
    border-color: #81c784;
  }

  .hero h1 {
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    font-weight: 700;
    letter-spacing: -0.02em;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    color: #ffffff;
    text-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
  }

  .hero p {
    font-size: clamp(1.1rem, 2.2vw, 1.4rem);
    font-weight: 400;
    color: #f8f9fa;
    margin-bottom: 2.5rem;
    line-height: 1.6;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
  }
   *,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
    html{scroll-behavior:smooth}
    body {
      font-family: 'Poppins', sans-serif;
      color: #2e7d32;
      background: linear-gradient(135deg, #e8f5e8 0%, #f1f8e9 50%, #e8f5e8 100%);
      overflow-x: hidden;
      transition: background var(--transition), color var(--transition);
      min-height: 100vh;
    }

  /* Hero Section Styling */
  .hero-section {
    padding: 5rem 2rem;
    text-align: center;
    background: linear-gradient(135deg, #e8f5e8 0%, #f1f8e9 100%);
    border-bottom: 1px solid #c8e6c9;
  }

  .hero-section h1 {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 700;
    color: #2e7d32;
    margin-bottom: 1.5rem;
    line-height: 1.2;
  }

  .hero-subtitle {
    font-size: clamp(1.1rem, 2vw, 1.3rem);
    color: #388e3c;
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
    font-weight: 400;
  }

  /* Carousel Section */
  .carousel-section {
    padding: 4rem 2rem;
    background: linear-gradient(135deg, #f1f8e9 0%, #e8f5e8 100%);
  }

  .carousel-container {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(46, 125, 50, 0.15);
    border: 2px solid #66bb6a;
  }

  .carousel-slide {
    display: none;
    position: relative;
  }

  .carousel-slide.active {
    display: block;
  }

  .carousel-slide img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    display: block;
  }

  .carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: linear-gradient(135deg, #4caf50, #388e3c);
    border: 2px solid #66bb6a;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    font-size: 1.2rem;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(46, 125, 50, 0.3);
    z-index: 10;
  }

  .carousel-btn:hover {
    background: linear-gradient(135deg, #66bb6a, #4caf50);
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 4px 15px rgba(46, 125, 50, 0.4);
    border-color: #81c784;
  }

  .carousel-btn.prev {
    left: 20px;
  }

  .carousel-btn.next {
    right: 20px;
  }

  /* Package Cards Section */
  .intro-packages {
    padding: 5rem 2rem;
    background: linear-gradient(135deg, #e8f5e8 0%, #f1f8e9 100%);
    margin-bottom: 0;
  }

  .intro-packages h2 {
    text-align: center;
    font-size: clamp(2rem, 4vw, 2.5rem);
    font-weight: 700;
    color: #2e7d32;
    margin-bottom: 3rem;
  }

  .package-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
  }

  .package-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 251, 248, 0.9));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(102, 187, 106, 0.2);
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(46, 125, 50, 0.15);
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .package-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(46, 125, 50, 0.25);
    border-color: rgba(102, 187, 106, 0.3);
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(246, 250, 246, 0.95));
  }

  .package-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }

  .package-card h3 {
    font-size: 1.3rem;
    font-weight: 600;
    color: #2e7d32;
    margin: 1.5rem 1.5rem 0.5rem;
  }

  .package-card p {
    color: #558b2f;
    margin: 0.5rem 1.5rem;
    line-height: 1.5;
  }

  .package-card p:last-child {
    margin-bottom: 1.5rem;
    font-weight: 600;
    color: #ff6f00;
    font-size: 1.1rem;
  }

  /* Why Visit Section */
  .why-visit {
    padding: 5rem 2rem;
    background: linear-gradient(135deg, #ffffff 0%, #f9fbe7 100%);
    text-align: center;
  }

  .why-visit h2 {
    font-size: clamp(2rem, 4vw, 2.5rem);
    font-weight: 700;
    color: #2e7d32;
    margin-bottom: 2rem;
  }

  .why-visit p {
    font-size: 1.1rem;
    color: #388e3c;
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.7;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .carousel-btn {
      width: 40px;
      height: 40px;
      font-size: 1rem;
    }
    
    .carousel-btn.prev {
      left: 10px;
    }
    
    .carousel-btn.next {
      right: 10px;
    }
    
    .package-cards {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }
    
    .glass {
      padding: 3rem 1.5rem;
    }
  }

  /* Dark Mode Styles */
  body.dark-mode {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%) !important;
    color: #e0e0e0 !important;
  }

  body.dark-mode .glass {
    background: rgba(40, 40, 40, 0.1) !important;
    backdrop-filter: blur(15px) !important;
    border: 1px solid rgba(102, 187, 106, 0.3) !important;
    color: #e0e0e0 !important;
  }

  body.dark-mode h1,
  body.dark-mode h2,
  body.dark-mode h3 {
    color: #81c784 !important;
  }

  body.dark-mode .typed-text {
    color: #66bb6a !important;
  }

  body.dark-mode p {
    color: #b0bec5 !important;
  }

  body.dark-mode .btn {
    background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
    border-color: #4caf50 !important;
    color: #e8f5e8 !important;
  }

  body.dark-mode .btn:hover {
    background: linear-gradient(135deg, #4caf50, #2e7d32) !important;
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.4) !important;
  }

  body.dark-mode .package-card {
    background: linear-gradient(135deg, rgba(44, 44, 44, 0.95), rgba(58, 58, 58, 0.9)) !important;
    border-color: rgba(102, 187, 106, 0.3) !important;
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.2) !important;
  }

  body.dark-mode .package-card:hover {
    background: linear-gradient(135deg, rgba(58, 58, 58, 0.98), rgba(70, 70, 70, 0.95)) !important;
    box-shadow: 0 15px 40px rgba(76, 175, 80, 0.3) !important;
  }

  body.dark-mode .package-card h3 {
    color: #66bb6a !important;
  }

  body.dark-mode .package-card p {
    color: #a5d6a7 !important;
  }

  body.dark-mode .carousel-section {
    background: rgba(26, 26, 26, 0.8) !important;
  }

  body.dark-mode .carousel-btn {
    background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
    border-color: #4caf50 !important;
    box-shadow: 0 2px 10px rgba(76, 175, 80, 0.3) !important;
  }

  body.dark-mode .carousel-btn:hover {
    background: linear-gradient(135deg, #4caf50, #2e7d32) !important;
    box-shadow: 0 4px 15px rgba(76, 175, 80, 0.4) !important;
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
