@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<style>
  /* Import AOS for animations */
  @import url('https://unpkg.com/aos@2.3.1/dist/aos.css');

  .gallery-hero {
    background: linear-gradient(135deg, rgba(0, 106, 78, 0.9), rgba(76, 175, 80, 0.8)), 
                url('https://images.unsplash.com/photo-1539650116574-75c0c6d73d0e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
    padding: 8rem 2rem;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .gallery-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0, 106, 78, 0.7) 0%, rgba(244, 42, 65, 0.3) 100%);
    z-index: 1;
    animation: gradientShift 8s ease-in-out infinite;
  }

  @keyframes gradientShift {
    0%, 100% {
      background: linear-gradient(45deg, rgba(0, 106, 78, 0.7) 0%, rgba(244, 42, 65, 0.3) 100%);
    }
    50% {
      background: linear-gradient(45deg, rgba(244, 42, 65, 0.4) 0%, rgba(0, 106, 78, 0.8) 100%);
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
  }

  .gallery-card:hover .gallery-image {
    transform: scale(1.15);
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
          'img' => 'https://www.travelandexplorebd.com/storage/app/public/posts/April2020/41.jpg',
          'title' => 'Jaflong Crystal Waters',
          'description' => 'Experience the pristine beauty of Jaflong with its crystal-clear rivers and stone collections in the heart of Sylhet.',
          'category' => 'nature',
          'location' => 'Sylhet',
          'likes' => 234,
          'views' => 1520
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Sundarban_Tiger.jpg/330px-Sundarban_Tiger.jpg',
          'title' => 'Royal Bengal Tiger',
          'description' => 'The majestic Royal Bengal Tiger in its natural habitat within the largest mangrove forest in the world.',
          'category' => 'nature',
          'location' => 'Sundarbans',
          'likes' => 456,
          'views' => 2340
        ],
        [
          'img' => 'https://images.hive.blog/768x0/https://cdn.pixabay.com/photo/2018/03/20/14/00/sea-3243357_960_720.jpg',
          'title' => 'Cox\'s Bazar Sunset',
          'description' => 'The world\'s longest natural sea beach offers spectacular sunset views over the Bay of Bengal.',
          'category' => 'beaches',
          'location' => 'Cox\'s Bazar',
          'likes' => 678,
          'views' => 3450
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/5/50/Sajek_Valley_20161205.jpg',
          'title' => 'Sajek Valley Clouds',
          'description' => 'Wake up above the clouds in the Queen of Hills, surrounded by lush green valleys and tribal culture.',
          'category' => 'hills',
          'location' => 'Rangamati',
          'likes' => 345,
          'views' => 1890
        ],
        [
          'img' => 'https://cosmosgroup.sgp1.digitaloceanspaces.com/news/details/5967770_Kaptai%20Lake%20Rangamati%20Travel%20guide.jpg',
          'title' => 'Kaptai Lake Serenity',
          'description' => 'A tranquil artificial lake surrounded by green hills, perfect for boat rides and peaceful relaxation.',
          'category' => 'nature',
          'location' => 'Rangamati',
          'likes' => 289,
          'views' => 1670
        ],
        [
          'img' => 'https://ttg.com.bd/uploads/tours/plans/204_36376273530_3c9a0335f5_b-copyjpg.webp',
          'title' => 'Bandarban Mountains',
          'description' => 'Breathtaking mountain landscapes and tribal culture in Bangladesh\'s hill district paradise.',
          'category' => 'hills',
          'location' => 'Bandarban',
          'likes' => 412,
          'views' => 2100
        ],
        [
          'img' => 'https://media-cdn.tripadvisor.com/media/attractions-splice-spp-720x480/0a/32/be/dc.jpg',
          'title' => 'Srimangal Tea Gardens',
          'description' => 'Rolling green tea gardens stretch as far as the eye can see in Bangladesh\'s tea capital.',
          'category' => 'nature',
          'location' => 'Srimangal',
          'likes' => 523,
          'views' => 2890
        ],
        [
          'img' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3',
          'title' => 'Traditional Rickshaw Art',
          'description' => 'Colorful rickshaw art represents the vibrant culture and artistic heritage of Bangladesh.',
          'category' => 'culture',
          'location' => 'Dhaka',
          'likes' => 167,
          'views' => 980
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Sixty_Dome_Mosque%2C_Bagerhat.jpg/300px-Sixty_Dome_Mosque%2C_Bagerhat.jpg',
          'title' => 'Sixty Dome Mosque',
          'description' => 'UNESCO World Heritage site showcasing the architectural brilliance of 15th century Bengal.',
          'category' => 'culture',
          'location' => 'Bagerhat',
          'likes' => 298,
          'views' => 1450
        ]
      ];
    @endphp

    @foreach ($galleryItems as $index => $item)
      <div class="gallery-card" data-category="{{ $item['category'] }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
        <div class="image-container">
          <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="gallery-image">
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
