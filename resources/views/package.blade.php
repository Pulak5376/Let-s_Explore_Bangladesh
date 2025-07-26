@extends('layouts.app')

@section('title', 'Tour Packages')

@section('content')
<style>
  /* Import AOS for animations */
  @import url('https://unpkg.com/aos@2.3.1/dist/aos.css');

  .packages-hero {
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 106, 78, 0.2) 50%, rgba(0, 0, 0, 0.4) 100%), 
                url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
    padding: 8rem 2rem;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-size: 120%;
    animation: zoomOut 20s ease-in-out infinite;
  }

  @keyframes zoomOut {
    0% {
      background-size: 120%;
      background-position: center center;
    }
    50% {
      background-size: 100%;
      background-position: center center;
    }
    100% {
      background-size: 120%;
      background-position: center center;
    }
  }

  .packages-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 106, 78, 0.1) 100%);
    z-index: 1;
    animation: gradientShift 8s ease-in-out infinite;
  }

  @keyframes gradientShift {
    0%, 100% {
      background: linear-gradient(45deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 106, 78, 0.1) 100%);
    }
    50% {
      background: linear-gradient(45deg, rgba(0, 106, 78, 0.1) 0%, rgba(0, 0, 0, 0.3) 100%);
    }
  }

  .packages-hero > * {
    position: relative;
    z-index: 2;
  }

  .hero-content {
    max-width: 800px;
    animation: heroSlideUp 1.5s ease-out;
  }

  @keyframes heroSlideUp {
    0% {
      opacity: 0;
      transform: translateY(100px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .hero-title {
    font-size: 4rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    background: linear-gradient(135deg, #ffffff, #f0f9ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: titleGlow 3s ease-in-out infinite;
  }

  @keyframes titleGlow {
    0%, 100% { filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.3)); }
    50% { filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.6)); }
  }

  .hero-subtitle {
    font-size: 1.4rem;
    opacity: 0.95;
    margin-bottom: 2rem;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    animation: subtitleFade 2s ease-out 0.5s both;
  }

  @keyframes subtitleFade {
    0% {
      opacity: 0;
      transform: translateY(30px);
    }
    100% {
      opacity: 0.95;
      transform: translateY(0);
    }
  }

  .packages-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 6rem 2rem;
    background: linear-gradient(135deg, #f8f9fa 0%, #e8f5e8 100%);
    min-height: 100vh;
  }

  .packages-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
    gap: 3rem;
    margin-bottom: 4rem;
  }

  .package-card {
    background: white;
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 0 15px 50px rgba(0, 106, 78, 0.1);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    border: 2px solid rgba(0, 106, 78, 0.1);
  }

  .package-card:hover {
    transform: translateY(-20px) scale(1.02);
    box-shadow: 0 30px 60px rgba(0, 106, 78, 0.2);
    border-color: rgba(0, 106, 78, 0.3);
  }

  .card-header {
    position: relative;
    height: 280px;
    overflow: hidden;
  }

  .card-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
    transform: scale(1.1);
    animation: cardImageZoom 15s ease-in-out infinite;
  }

  @keyframes cardImageZoom {
    0%, 100% {
      transform: scale(1.1);
    }
    50% {
      transform: scale(1);
    }
  }

  .package-card:hover .card-image {
    transform: scale(1.15);
    animation-play-state: paused;
  }

  .card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0, 106, 78, 0.6), rgba(76, 175, 80, 0.4));
    opacity: 0;
    transition: opacity 0.4s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .package-card:hover .card-overlay {
    opacity: 1;
  }

  .overlay-text {
    color: white;
    font-size: 1.2rem;
    font-weight: 600;
    text-align: center;
    transform: translateY(20px);
    transition: transform 0.4s ease;
  }

  .package-card:hover .overlay-text {
    transform: translateY(0);
  }

  .card-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: linear-gradient(135deg, #f42a41, #ff6b35);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    z-index: 10;
  }

  .card-body {
    padding: 2.5rem;
  }

  .package-title {
    font-size: 1.6rem;
    font-weight: 700;
    color: #006a4e;
    margin-bottom: 1rem;
    line-height: 1.3;
  }

  .package-duration {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, rgba(0, 106, 78, 0.1), rgba(76, 175, 80, 0.1));
    color: #006a4e;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
  }

  .package-includes {
    margin-bottom: 2rem;
  }

  .includes-title {
    color: #006a4e;
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 1rem;
  }

  .includes-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .includes-list li {
    padding: 0.5rem 0;
    color: #666;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.95rem;
    border-bottom: 1px solid rgba(0, 106, 78, 0.1);
  }

  .includes-list li:last-child {
    border-bottom: none;
  }

  .includes-list li::before {
    content: '✓';
    color: #006a4e;
    font-weight: bold;
    font-size: 1.1rem;
  }

  .card-footer {
    padding: 2rem 2.5rem;
    border-top: 2px solid rgba(0, 106, 78, 0.1);
    background: linear-gradient(135deg, rgba(0, 106, 78, 0.05), rgba(76, 175, 80, 0.05));
  }

  .price-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
  }

  .price-label {
    color: #666;
    font-size: 0.9rem;
  }

  .price-amount {
    color: #006a4e;
    font-size: 1.8rem;
    font-weight: 800;
  }

  .book-btn {
    width: 100%;
    background: linear-gradient(135deg, #006a4e, #4caf50);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 15px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .book-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
  }

  .book-btn:hover::before {
    left: 100%;
  }

  .book-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0, 106, 78, 0.3);
  }

  .special-offers {
    background: white;
    border-radius: 25px;
    padding: 3rem;
    margin-top: 4rem;
    box-shadow: 0 15px 50px rgba(0, 106, 78, 0.1);
    border: 2px solid rgba(0, 106, 78, 0.1);
  }

  .offers-title {
    color: #006a4e;
    font-size: 2.5rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 2rem;
  }

  .offers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
  }

  .offer-item {
    background: linear-gradient(135deg, rgba(0, 106, 78, 0.05), rgba(76, 175, 80, 0.05));
    padding: 2rem;
    border-radius: 20px;
    border: 1px solid rgba(0, 106, 78, 0.1);
    text-align: center;
    transition: all 0.3s ease;
  }

  .offer-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 106, 78, 0.15);
  }

  .offer-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
  }

  .offer-title {
    color: #006a4e;
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 1rem;
  }

  .offer-description {
    color: #666;
    line-height: 1.6;
  }

  /* Dark Mode Styles */
  body.dark-mode .packages-container {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
  }

  body.dark-mode .package-card,
  body.dark-mode .special-offers {
    background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%);
    border-color: rgba(76, 175, 80, 0.2);
  }

  body.dark-mode .package-title,
  body.dark-mode .offers-title,
  body.dark-mode .includes-title {
    color: #4caf50;
  }

  body.dark-mode .package-duration {
    background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(0, 106, 78, 0.1));
    color: #4caf50;
  }

  body.dark-mode .includes-list li {
    color: #b0bec5;
    border-bottom-color: rgba(76, 175, 80, 0.2);
  }

  body.dark-mode .includes-list li::before {
    color: #4caf50;
  }

  body.dark-mode .card-footer {
    background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(0, 106, 78, 0.1));
    border-top-color: rgba(76, 175, 80, 0.2);
  }

  body.dark-mode .price-label {
    color: #b0bec5;
  }

  body.dark-mode .price-amount {
    color: #4caf50;
  }

  body.dark-mode .offer-item {
    background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(0, 106, 78, 0.1));
    border-color: rgba(76, 175, 80, 0.2);
  }

  body.dark-mode .offer-title {
    color: #4caf50;
  }

  body.dark-mode .offer-description {
    color: #b0bec5;
  }

  @media (max-width: 768px) {
    .packages-hero {
      padding: 4rem 1rem;
      min-height: 70vh;
    }

    .hero-title {
      font-size: 2.5rem;
    }

    .hero-subtitle {
      font-size: 1.1rem;
    }

    .packages-container {
      padding: 3rem 1rem;
    }

    .packages-grid {
      grid-template-columns: 1fr;
      gap: 2rem;
    }

    .card-body {
      padding: 2rem;
    }

    .card-footer {
      padding: 1.5rem 2rem;
    }

    .special-offers {
      padding: 2rem;
    }

    .offers-title {
      font-size: 2rem;
    }

    .offers-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }
  }

  @media (max-width: 480px) {
    .hero-title {
      font-size: 2rem;
    }

    .hero-subtitle {
      font-size: 1rem;
    }

    .packages-grid {
      grid-template-columns: 1fr;
    }

    .card-body {
      padding: 1.5rem;
    }

    .card-footer {
      padding: 1.5rem;
    }

    .offers-grid {
      grid-template-columns: 1fr;
    }

    .offer-item {
      padding: 1.5rem;
    }
  }
</style>

<!-- Hero Section -->
<section class="packages-hero">
  <div class="hero-content">
    <h1 class="hero-title">Tour Packages</h1>
    <p class="hero-subtitle">
      Discover Bangladesh's hidden gems with our carefully crafted tour packages designed to give you the ultimate travel experience
    </p>
  </div>
</section>

<div class="packages-container">
  <div class="packages-grid">
    @php
      $packages = [
        [
          'title' => 'Sylhet Adventure Package',
          'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/77/Keane_Bridge_and_Ali_Amjad%27s_Clock%2C_Sylhet.jpg',
          'duration' => '3 Days, 2 Nights',
          'badge' => 'Popular',
          'includes' => [
            'Jaflong Crystal Clear River',
            'Ratargul Swamp Forest',
            'Lalakhal Blue Water',
            'Keane Bridge Historic Site',
            'Ali Amjad\'s Clock Tower',
            '3-star hotel accommodation',
            'AC transport for sightseeing',
            'Professional tour guide'
          ],
          'price' => 'BDT 5,500',
          'overlay' => 'Experience the Tea Capital'
        ],
        [
          'title' => 'Kaptai Adventure Package',
          'image' => 'https://www.bangladeshtravelandtours.com/wp-content/uploads/2023/04/85-768x432.jpg',
          'duration' => '3 Days, 2 Nights',
          'badge' => 'Popular',
          'includes' => [
            'Jaflong Crystal Clear River',
            'Ratargul Swamp Forest',
            'Lalakhal Blue Water',
            'Keane Bridge Historic Site',
            'Ali Amjad\'s Clock Tower',
            '3-star hotel accommodation',
            'AC transport for sightseeing',
            'Professional tour guide'
          ],
          'price' => 'BDT 5,500',
          'overlay' => 'Experience the Tea Capital'
        ],
        [
          'title' => 'Srimangal Tea Garden Escape',
          'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/1e/Sreemangal_tea_garden_2017-08-20.jpg',
          'duration' => '2 Days, 1 Night',
          'badge' => 'Nature',
          'includes' => [
            'Lawachara Rain Forest Trek',
            'Tea Garden Tours',
            'Madhabpur Lake Visit',
            'Nilkantha Tea Cabin Experience',
            'Eco-resort accommodation',
            'Traditional meals included',
            'Private car transfers',
            'Tea tasting sessions'
          ],
          'price' => 'BDT 3,800',
          'overlay' => 'Green Paradise Awaits'
        ],
        [
          'title' => 'Cox\'s Bazar Beach Holiday',
          'image' => 'https://images.hive.blog/768x0/https://cdn.pixabay.com/photo/2018/03/20/14/00/sea-3243357_960_720.jpg',
          'duration' => '4 Days, 3 Nights',
          'badge' => 'Bestseller',
          'includes' => [
            'World\'s longest beach visit',
            'Himchari National Park',
            'Inani Beach exploration',
            'Saint Martin Island trip',
            'Beachfront hotel stay',
            'Fresh seafood dining',
            'Sunset boat cruise',
            'Beach activities & sports'
          ],
          'price' => 'BDT 8,200',
          'overlay' => 'Beach Paradise Calling'
        ],
        [
          'title' => 'Bandarban Hill Tracts Adventure',
          'image' => 'https://ttg.com.bd/uploads/tours/plans/204_36376273530_3c9a0335f5_b-copyjpg.webp',
          'duration' => '3 Days, 2 Nights',
          'badge' => 'Adventure',
          'includes' => [
            'Nilgiri highest peak visit',
            'Boga Lake trekking',
            'Tribal village experience',
            'Golden Temple visit',
            'Mountain lodge accommodation',
            'Local cuisine tasting',
            '4WD vehicle transfers',
            'Cultural performances'
          ],
          'price' => 'BDT 6,750',
          'overlay' => 'Mountain Adventure'
        ],
        [
          'title' => 'Sundarbans Mangrove Safari',
          'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Sundarban_Tiger.jpg/330px-Sundarban_Tiger.jpg',
          'duration' => '3 Days, 2 Nights',
          'badge' => 'Wildlife',
          'includes' => [
            'Royal Bengal Tiger spotting',
            'Mangrove forest cruise',
            'Spotted deer observation',
            'Crocodile watching',
            'Houseboat accommodation',
            'Traditional fishing experience',
            'Bird watching tours',
            'Nature photography guide'
          ],
          'price' => 'BDT 7,400',
          'overlay' => 'Wildlife Expedition'
        ],
        [
          'title' => 'Dhaka Heritage & Culture Tour',
          'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Sixty_Dome_Mosque%2C_Bagerhat.jpg/300px-Sixty_Dome_Mosque%2C_Bagerhat.jpg',
          'duration' => '2 Days, 1 Night',
          'badge' => 'Heritage',
          'includes' => [
            'Old Dhaka exploration',
            'Lalbagh Fort visit',
            'Ahsan Manzil Pink Palace',
            'Star Mosque tour',
            'Sadarghat riverfront',
            'Boutique hotel stay',
            'Traditional rickshaw ride',
            'Local street food tour'
          ],
          'price' => 'BDT 4,200',
          'overlay' => 'Cultural Heritage'
        ]
      ];
    @endphp

    @foreach ($packages as $index => $package)
      <div class="package-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
        <div class="card-header">
          <img src="{{ $package['image'] }}" alt="{{ $package['title'] }}" class="card-image">
          <div class="card-overlay">
            <div class="overlay-text">{{ $package['overlay'] }}</div>
          </div>
          <div class="card-badge">{{ $package['badge'] }}</div>
        </div>
        
        <div class="card-body">
          <h3 class="package-title">{{ $package['title'] }}</h3>
          <div class="package-duration">
            <span>🕒</span>
            <span>{{ $package['duration'] }}</span>
          </div>
          
          <div class="package-includes">
            <h4 class="includes-title">What's Included:</h4>
            <ul class="includes-list">
              @foreach ($package['includes'] as $include)
                <li>{{ $include }}</li>
              @endforeach
            </ul>
          </div>
        </div>
        
        <div class="card-footer">
          <div class="price-section">
            <span class="price-label">Starting from</span>
            <span class="price-amount">{{ $package['price'] }}</span>
          </div>
          <button class="book-btn">Book This Package</button>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Special Offers Section -->
  <div class="special-offers" data-aos="fade-up">
    <h2 class="offers-title">Why Choose Our Packages?</h2>
    <div class="offers-grid">
      <div class="offer-item" data-aos="fade-up" data-aos-delay="100">
        <div class="offer-icon">🏆</div>
        <h3 class="offer-title">Best Price Guarantee</h3>
        <p class="offer-description">We offer the most competitive prices with no hidden costs. If you find a better deal, we'll match it!</p>
      </div>
      
      <div class="offer-item" data-aos="fade-up" data-aos-delay="200">
        <div class="offer-icon">🌟</div>
        <h3 class="offer-title">Expert Local Guides</h3>
        <p class="offer-description">Our experienced guides know every hidden gem and will ensure you get the most authentic experience.</p>
      </div>
      
      <div class="offer-item" data-aos="fade-up" data-aos-delay="300">
        <div class="offer-icon">🔒</div>
        <h3 class="offer-title">Safe & Secure Travel</h3>
        <p class="offer-description">Your safety is our priority. All our packages include comprehensive insurance and safety measures.</p>
      </div>
      
      <div class="offer-item" data-aos="fade-up" data-aos-delay="400">
        <div class="offer-icon">🎯</div>
        <h3 class="offer-title">Customizable Packages</h3>
        <p class="offer-description">Tailor your trip according to your preferences. We can modify any package to suit your needs.</p>
      </div>
    </div>
  </div>
</div>

<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  // Initialize AOS animations
  document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true,
      offset: 100
    });

    // Add click event listeners to book buttons
    document.querySelectorAll('.book-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        // Add booking functionality here
        alert('Booking functionality will be implemented soon!');
      });
    });
  });
</script>
@endsection
