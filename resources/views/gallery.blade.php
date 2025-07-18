@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<style>
  .gallery-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9)), 
                url('https://images.unsplash.com/photo-1539650116574-75c0c6d73d0e?ixlib=rb-4.0.3') center/cover;
    padding: 6rem 2rem;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
  }

  .gallery-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.3);
    z-index: 1;
  }

  .gallery-hero > * {
    position: relative;
    z-index: 2;
  }

  .gallery-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 4rem 2rem;
    background: #f8f9fa;
    min-height: 100vh;
  }

  .filter-tabs {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
  }

  .filter-btn {
    background: white;
    border: 2px solid #e9ecef;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    color: #6c757d;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .filter-btn.active,
  .filter-btn:hover {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border-color: transparent;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
  }

  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
  }

  .gallery-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
  }

  .gallery-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  }

  .image-container {
    position: relative;
    overflow: hidden;
    height: 250px;
  }

  .gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .gallery-card:hover .gallery-image {
    transform: scale(1.1);
  }

  .image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(102, 126, 234, 0.8), rgba(118, 75, 162, 0.8));
    opacity: 0;
    transition: opacity 0.3s ease;
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
  }

  .view-btn {
    background: rgba(255,255,255,0.2);
    border: 2px solid white;
    color: white;
    padding: 0.5rem 1.5rem;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
  }

  .view-btn:hover {
    background: white;
    color: #667eea;
  }

  .card-content {
    padding: 1.5rem;
  }

  .location-badge {
    display: inline-block;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 500;
    margin-bottom: 0.75rem;
  }

  .card-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    line-height: 1.3;
  }

  .card-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1rem;
  }

  .card-stats {
    display: flex;
    gap: 1rem;
    padding-top: 1rem;
    border-top: 1px solid #e9ecef;
  }

  .stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #6c757d;
    font-size: 0.9rem;
  }

  .lightbox {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.9);
    z-index: 1000;
    justify-content: center;
    align-items: center;
  }

  .lightbox.active {
    display: flex;
  }

  .lightbox-content {
    max-width: 90%;
    max-height: 90%;
    position: relative;
  }

  .lightbox-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .close-lightbox {
    position: absolute;
    top: -40px;
    right: 0;
    color: white;
    font-size: 2rem;
    cursor: pointer;
    background: none;
    border: none;
  }

  /* Dark Mode Styles */
  body.dark-mode .gallery-container {
    background: #1a1a1a;
  }

  body.dark-mode .gallery-card {
    background: #2c2c2c;
    border: 1px solid #3a3a3a;
  }

  body.dark-mode .card-title {
    color: #e9ecef;
  }

  body.dark-mode .card-description {
    color: #adb5bd;
  }

  body.dark-mode .filter-btn {
    background: #2c2c2c;
    color: #adb5bd;
    border-color: #3a3a3a;
  }

  @media (max-width: 768px) {
    .gallery-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }
    
    .gallery-hero {
      padding: 4rem 1rem;
    }
    
    .gallery-container {
      padding: 2rem 1rem;
    }
    
    .filter-tabs {
      gap: 0.5rem;
    }
    
    .filter-btn {
      padding: 0.5rem 1rem;
      font-size: 0.9rem;
    }
  }
</style>

<section class="gallery-hero">
  <h1 style="font-size: 3rem; margin-bottom: 1rem; font-weight: 800;">Bangladesh Gallery</h1>
  <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">
    Discover the breathtaking beauty of Bangladesh through our curated collection of stunning photography
  </p>
</section>

<div class="gallery-container">
  <div class="filter-tabs">
    <button class="filter-btn active" data-filter="all">All</button>
    <button class="filter-btn" data-filter="nature">Nature</button>
    <button class="filter-btn" data-filter="culture">Culture</button>
    <button class="filter-btn" data-filter="beaches">Beaches</button>
    <button class="filter-btn" data-filter="hills">Hills</button>
  </div>

  <div class="gallery-grid">
    @php
      $galleryItems = [
        [
          'img' => 'https://www.travelandexplorebd.com/storage/app/public/posts/April2020/41.jpg',
          'title' => 'Jaflong Crystal Waters',
          'description' => 'Experience the pristine beauty of Jaflong with its crystal-clear rivers and stone collections.',
          'category' => 'nature',
          'location' => 'Sylhet',
          'likes' => 234,
          'views' => 1520
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Sundarban_Tiger.jpg/330px-Sundarban_Tiger.jpg',
          'title' => 'Royal Bengal Tiger',
          'description' => 'The majestic Royal Bengal Tiger in its natural habitat within the Sundarbans mangrove forest.',
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
          'description' => 'Wake up above the clouds in the Queen of Hills, surrounded by lush green valleys.',
          'category' => 'hills',
          'location' => 'Rangamati',
          'likes' => 345,
          'views' => 1890
        ],
        [
          'img' => 'https://cosmosgroup.sgp1.digitaloceanspaces.com/news/details/5967770_Kaptai%20Lake%20Rangamati%20Travel%20guide.jpg',
          'title' => 'Kaptai Lake Serenity',
          'description' => 'A tranquil artificial lake surrounded by green hills, perfect for boat rides and relaxation.',
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
        ]
      ];
    @endphp

    @foreach ($galleryItems as $item)
      <div class="gallery-card" data-category="{{ $item['category'] }}">
        <div class="image-container">
          <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="gallery-image">
          <div class="image-overlay">
            <div class="overlay-content">
              <button class="view-btn" onclick="openLightbox('{{ $item['img'] }}', '{{ $item['title'] }}')">
                👁️ View Full Size
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
  </div>
</div>

<script>
  // Filter functionality
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      // Remove active class from all buttons
      document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
      // Add active class to clicked button
      btn.classList.add('active');
      
      const filter = btn.getAttribute('data-filter');
      const cards = document.querySelectorAll('.gallery-card');
      
      cards.forEach(card => {
        if (filter === 'all' || card.getAttribute('data-category') === filter) {
          card.style.display = 'block';
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