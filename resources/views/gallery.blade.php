@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<style>
  /* Import AOS for animations */
  @import url('https://unpkg.com/aos@2.3.1/dist/aos.css');

  .gallery-hero {
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 106, 78, 0.2) 50%, rgba(0, 0, 0, 0.4) 100%), 
                url('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') center/cover;
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
    animation: zoomOut 18s ease-in-out infinite;
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

  .gallery-hero::before {
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

  .gallery-hero > * {
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

  .gallery-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 6rem 2rem;
    background: linear-gradient(135deg, #f8f9fa 0%, #e8f5e8 100%);
    min-height: 100vh;
  }

  .filter-tabs {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 4rem;
    flex-wrap: wrap;
  }

  .filter-btn {
    background: white;
    border: 2px solid rgba(0, 106, 78, 0.2);
    padding: 1rem 2rem;
    border-radius: 50px;
    color: #006a4e;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .filter-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #006a4e, #4caf50);
    transition: left 0.3s ease;
    z-index: 1;
  }

  .filter-btn:hover::before,
  .filter-btn.active::before {
    left: 0;
  }

  .filter-btn:hover,
  .filter-btn.active {
    color: white;
    border-color: #006a4e;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 106, 78, 0.3);
  }

  .filter-btn span {
    position: relative;
    z-index: 2;
  }

  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2.5rem;
    margin-bottom: 3rem;
  }

  .gallery-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 106, 78, 0.1);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    border: 1px solid rgba(0, 106, 78, 0.1);
  }

  .gallery-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 25px 50px rgba(0, 106, 78, 0.2);
  }

  .image-container {
    position: relative;
    overflow: hidden;
    height: 280px;
  }

  .gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
    transform: scale(1.1);
    animation: galleryImageZoom 12s ease-in-out infinite;
  }

  @keyframes galleryImageZoom {
    0%, 100% {
      transform: scale(1.1);
    }
    50% {
      transform: scale(1);
    }
  }

  .gallery-card:hover .gallery-image {
    transform: scale(1.2);
    animation-play-state: paused;
  }

  .image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0, 106, 78, 0.8), rgba(76, 175, 80, 0.8));
    opacity: 0;
    transition: opacity 0.4s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .gallery-card:hover .image-overlay {
    opacity: 1;
  }

  .overlay-content {
    text-align: center;
    color: white;
    transform: translateY(20px);
    transition: transform 0.4s ease;
  }

  .gallery-card:hover .overlay-content {
    transform: translateY(0);
  }

  .view-btn {
    background: rgba(255,255,255,0.2);
    border: 2px solid white;
    color: white;
    padding: 0.75rem 2rem;
    border-radius: 25px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    position: relative;
    overflow: hidden;
  }

  .view-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: white;
    transition: left 0.3s ease;
    z-index: 1;
  }

  .view-btn:hover::before {
    left: 0;
  }

  .view-btn:hover {
    color: #006a4e;
  }

  .view-btn span {
    position: relative;
    z-index: 2;
  }

  .card-content {
    padding: 2rem;
  }

  .location-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #006a4e, #4caf50);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 1rem;
  }

  .card-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #006a4e;
    margin-bottom: 0.75rem;
    line-height: 1.3;
  }

  .card-description {
    color: #666;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-size: 1rem;
  }

  .card-stats {
    display: flex;
    gap: 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid rgba(0, 106, 78, 0.1);
  }

  .stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #666;
    font-size: 0.95rem;
    font-weight: 500;
    transition: color 0.3s ease;
  }

  .stat-item:hover {
    color: #006a4e;
    cursor: pointer;
  }

  .lightbox {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.95);
    z-index: 1000;
    justify-content: center;
    align-items: center;
    animation: fadeIn 0.3s ease;
  }

  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  .lightbox.active {
    display: flex;
  }

  .lightbox-content {
    max-width: 90%;
    max-height: 90%;
    position: relative;
    animation: scaleIn 0.3s ease;
  }

  @keyframes scaleIn {
    from { transform: scale(0.8); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
  }

  .lightbox-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 10px;
  }

  .close-lightbox {
    position: absolute;
    top: -50px;
    right: 0;
    color: white;
    font-size: 2.5rem;
    cursor: pointer;
    background: none;
    border: none;
    transition: transform 0.3s ease;
  }

  .close-lightbox:hover {
    transform: scale(1.2);
  }

  .lightbox-info {
    position: absolute;
    bottom: -60px;
    left: 0;
    right: 0;
    text-align: center;
    color: white;
    font-size: 1.1rem;
    font-weight: 500;
  }

  /* Dark Mode Styles */
  body.dark-mode .gallery-container {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
  }

  body.dark-mode .gallery-card {
    background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%);
    border-color: rgba(76, 175, 80, 0.2);
  }

  body.dark-mode .card-title {
    color: #4caf50;
  }

  body.dark-mode .card-description {
    color: #b0bec5;
  }

  body.dark-mode .filter-btn {
    background: #2c2c2c;
    color: #4caf50;
    border-color: rgba(76, 175, 80, 0.3);
  }

  body.dark-mode .stat-item {
    color: #b0bec5;
  }

  body.dark-mode .stat-item:hover {
    color: #4caf50;
  }

  @media (max-width: 768px) {
    .gallery-hero {
      padding: 4rem 1rem;
      min-height: 70vh;
    }

    .hero-title {
      font-size: 2.5rem;
    }

    .hero-subtitle {
      font-size: 1.1rem;
    }

    .gallery-grid {
      grid-template-columns: 1fr;
      gap: 2rem;
    }
    
    .gallery-container {
      padding: 3rem 1rem;
    }
    
    .filter-tabs {
      gap: 0.5rem;
    }
    
    .filter-btn {
      padding: 0.75rem 1.5rem;
      font-size: 0.9rem;
    }

    .card-content {
      padding: 1.5rem;
    }

    .card-stats {
      gap: 1rem;
    }
  }

  @media (max-width: 480px) {
    .hero-title {
      font-size: 2rem;
    }

    .hero-subtitle {
      font-size: 1rem;
    }

    .filter-btn {
      padding: 0.5rem 1rem;
      font-size: 0.85rem;
    }

    .gallery-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }

    .image-container {
      height: 200px;
    }
  }
</style>

<!-- Hero Section -->
<section class="gallery-hero">
  <div class="hero-content">
    <h1 class="hero-title">Bangladesh Gallery</h1>
    <p class="hero-subtitle">
      Discover the breathtaking beauty of Bangladesh through our curated collection of stunning photography showcasing nature, culture, and heritage
    </p>
  </div>
</section>

<div class="gallery-container">
  <div class="filter-tabs" data-aos="fade-up">
    <button class="filter-btn active" data-filter="all"><span>All</span></button>
    <button class="filter-btn" data-filter="nature"><span>Nature</span></button>
    <button class="filter-btn" data-filter="culture"><span>Culture</span></button>
    <button class="filter-btn" data-filter="beaches"><span>Beaches</span></button>
    <button class="filter-btn" data-filter="hills"><span>Hills</span></button>
  </div>

  <div class="gallery-grid">
    @php
      $galleryItems = [
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg',
          'title' => 'Saint Martin\'s Island Paradise',
          'description' => 'Experience the pristine beauty of Saint Martin\'s Island with its crystal-clear waters and coral reefs in the Bay of Bengal.',
          'category' => 'beaches',
          'location' => 'Cox\'s Bazar',
          'likes' => 234,
          'views' => 1520
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Sundarban_Tiger.jpg/800px-Sundarban_Tiger.jpg',
          'title' => 'Royal Bengal Tiger',
          'description' => 'The majestic Royal Bengal Tiger in its natural habitat within the largest mangrove forest in the world.',
          'category' => 'nature',
          'location' => 'Sundarbans',
          'likes' => 456,
          'views' => 2340
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Kuakata_beach_sunset.jpg/800px-Kuakata_beach_sunset.jpg',
          'title' => 'Kuakata Beach Sunset',
          'description' => 'The panoramic sea beach where you can see both sunrise and sunset, known as the daughter of the sea.',
          'category' => 'beaches',
          'location' => 'Patuakhali',
          'likes' => 678,
          'views' => 3450
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Sajek_Valley_Bangladesh.jpg/800px-Sajek_Valley_Bangladesh.jpg',
          'title' => 'Sajek Valley Clouds',
          'description' => 'Wake up above the clouds in the Queen of Hills, surrounded by lush green valleys and tribal culture.',
          'category' => 'hills',
          'location' => 'Rangamati',
          'likes' => 345,
          'views' => 1890
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/Kaptai_Lake_05.jpg/800px-Kaptai_Lake_05.jpg',
          'title' => 'Kaptai Lake Serenity',
          'description' => 'A tranquil artificial lake surrounded by green hills, perfect for boat rides and peaceful relaxation.',
          'category' => 'nature',
          'location' => 'Rangamati',
          'likes' => 289,
          'views' => 1670
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Midway_to_Konglak_Hill%2C_Khagrachari%2C_Bangladesh.jpg/800px-Midway_to_Konglak_Hill%2C_Khagrachari%2C_Bangladesh.jpg',
          'title' => 'Khagrachari Hills',
          'description' => 'Breathtaking mountain landscapes and tribal culture in Bangladesh\'s hill district paradise.',
          'category' => 'hills',
          'location' => 'Khagrachari',
          'likes' => 412,
          'views' => 2100
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/1/1e/Sreemangal_tea_garden_2017-08-20.jpg',
          'title' => 'Srimangal Tea Gardens',
          'description' => 'Rolling green tea gardens stretch as far as the eye can see in Bangladesh\'s tea capital.',
          'category' => 'nature',
          'location' => 'Srimangal',
          'likes' => 523,
          'views' => 2890
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/37/Lalbagh_Fort%2C_Dhaka.jpg/800px-Lalbagh_Fort%2C_Dhaka.jpg',
          'title' => 'Lalbagh Fort Heritage',
          'description' => 'Historic Mughal fort complex representing the rich architectural heritage of Bangladesh.',
          'category' => 'culture',
          'location' => 'Dhaka',
          'likes' => 167,
          'views' => 980
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Sixty_Dome_Mosque_02.jpg/800px-Sixty_Dome_Mosque_02.jpg',
          'title' => 'Sixty Dome Mosque',
          'description' => 'UNESCO World Heritage site showcasing the architectural brilliance of 15th century Bengal.',
          'category' => 'culture',
          'location' => 'Bagerhat',
          'likes' => 298,
          'views' => 1450
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Ahsan_Manzil_Dhaka_Bangladesh.jpg/800px-Ahsan_Manzil_Dhaka_Bangladesh.jpg',
          'title' => 'Ahsan Manzil Pink Palace',
          'description' => 'The beautiful pink palace on the banks of Buriganga River, symbol of Dhaka\'s royal heritage.',
          'category' => 'culture',
          'location' => 'Dhaka',
          'likes' => 384,
          'views' => 2150
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Tajhat_Palace_Museum.jpg/800px-Tajhat_Palace_Museum.jpg',
          'title' => 'Tajhat Palace',
          'description' => 'Magnificent palace showcasing the grandeur of Bengal\'s zamindari era with intricate architecture.',
          'category' => 'culture',
          'location' => 'Rangpur',
          'likes' => 276,
          'views' => 1820
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Floating_Guava_Market_at_Barisal.jpg/800px-Floating_Guava_Market_at_Barisal.jpg',
          'title' => 'Floating Guava Market',
          'description' => 'Traditional floating market on the rivers of Barisal, showcasing unique water-based commerce.',
          'category' => 'culture',
          'location' => 'Barisal',
          'likes' => 445,
          'views' => 2680
        ]
      ];
    @endphp

    @foreach ($galleryItems as $index => $item)
      <div class="gallery-card" data-category="{{ $item['category'] }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" style="--animation-delay: {{ $index * 0.5 }}s;">
        <div class="image-container">
          <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="gallery-image" style="animation-delay: var(--animation-delay);">
          <div class="image-overlay">
            <div class="overlay-content">
              <button class="view-btn" data-image="{{ $item['img'] }}" data-title="{{ $item['title'] }}">
                <span>👁️ View Full Size</span>
              </button>
            </div>
          </div>
        </div>
        <div class="card-content">
          <span class="location-badge">📍 {{ $item['location'] }}</span>
          <h3 class="card-title">{{ $item['title'] }}</h3>
          <p class="card-description">{{ $item['description'] }}</p>
          <div class="card-stats">
            <div class="stat-item">
              <span>❤️</span>
              <span>{{ $item['likes'] }}</span>
            </div>
            <div class="stat-item">
              <span>👁️</span>
              <span>{{ $item['views'] }}</span>
            </div>
            <div class="stat-item">
              <span>📤</span>
              <span>Share</span>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<!-- Lightbox -->
<div class="lightbox" id="lightbox" onclick="closeLightbox()">
  <div class="lightbox-content" onclick="event.stopPropagation()">
    <button class="close-lightbox" onclick="closeLightbox()">×</button>
    <img class="lightbox-image" id="lightbox-image" src="" alt="">
    <div class="lightbox-info" id="lightbox-info"></div>
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

    // Add click event listeners to view buttons
    document.querySelectorAll('.view-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const image = this.getAttribute('data-image');
        const title = this.getAttribute('data-title');
        openLightbox(image, title);
      });
    });
  });

  // Filter functionality
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      // Remove active class from all buttons
      document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
      // Add active class to clicked button
      btn.classList.add('active');
      
      const filter = btn.getAttribute('data-filter');
      const cards = document.querySelectorAll('.gallery-card');
      
      cards.forEach((card, index) => {
        if (filter === 'all' || card.getAttribute('data-category') === filter) {
          card.style.display = 'block';
          // Re-trigger AOS animation
          setTimeout(() => {
            card.setAttribute('data-aos-delay', index * 100);
            AOS.refresh();
          }, 100);
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // Lightbox functionality
  function openLightbox(src, title) {
    document.getElementById('lightbox-image').src = src;
    document.getElementById('lightbox-image').alt = title;
    document.getElementById('lightbox-info').textContent = title;
    document.getElementById('lightbox').classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    document.getElementById('lightbox').classList.remove('active');
    document.body.style.overflow = 'auto';
  }

  // Close lightbox with Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeLightbox();
    }
  });
</script>
@endsection
