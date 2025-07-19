@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- External Libraries for Enhanced UI -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Enhanced Hero Section with Animations -->
<section class="hero-banner">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <div class="hero-text-container">
      <div class="hero-badge">
        <span class="badge-icon">🇧🇩</span>
        <span>Explore Bangladesh</span>
      </div>
      <h1 class="hero-title">
        <span class="title-line" data-aos="fade-up" data-aos-delay="200">Discover the</span>
        <span class="title-line gradient-text" data-aos="fade-up" data-aos-delay="400">Heart of Bengal</span>
        <span class="title-line" data-aos="fade-up" data-aos-delay="600">Like Never Before</span>
      </h1>
      <p class="hero-description" data-aos="fade-up" data-aos-delay="800">
        Immerse yourself in Bangladesh's rich heritage, breathtaking landscapes, and vibrant culture. 
        From the world's longest natural sea beach to the mystical Sundarbans - your extraordinary journey begins here.
      </p>
      <div class="hero-buttons" data-aos="fade-up" data-aos-delay="1000">
        <a href="/places" class="btn-primary">
          <span>Start Your Journey</span>
          <i class="arrow-icon">→</i>
        </a>
        <a href="/package" class="btn-secondary">
          <span>View Packages</span>
          <i class="play-icon">▶</i>
        </a>
      </div>
      <div class="hero-stats" data-aos="fade-up" data-aos-delay="1200">
        <div class="stat-item">
          <span class="stat-number">64+</span>
          <span class="stat-label">Districts</span>
        </div>
        <div class="stat-item">
          <span class="stat-number">1000+</span>
          <span class="stat-label">Destinations</span>
        </div>
        <div class="stat-item">
          <span class="stat-number">5M+</span>
          <span class="stat-label">Happy Travelers</span>
        </div>
      </div>
    </div>
  </div>
  <div class="hero-scroll-indicator">
    <div class="scroll-mouse">
      <div class="scroll-wheel"></div>
    </div>
    <span>Scroll to explore</span>
  </div>
  <div class="floating-elements">
    <div class="float-element float-1"></div>
    <div class="float-element float-2"></div>
    <div class="float-element float-3"></div>
  </div>
</section>

<!-- Enhanced Features Section -->
<section class="features-section">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-badge">Why Choose Us</span>
      <h2>Your Gateway to Authentic Bangladesh</h2>
      <p>Experience the best of Bangladesh with our curated services and local expertise</p>
    </div>
    <div class="features-grid">
      <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
        <div class="feature-icon">
          <i class="icon-map">🗺️</i>
        </div>
        <h3>Expert Local Guides</h3>
        <p>Navigate Bangladesh with certified local experts who know every hidden gem and cultural secret.</p>
      </div>
      <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
        <div class="feature-icon">
          <i class="icon-shield">🛡️</i>
        </div>
        <h3>Safe & Secure Travel</h3>
        <p>Your safety is our priority with 24/7 support, trusted accommodations, and secure transportation.</p>
      </div>
      <div class="feature-card" data-aos="fade-up" data-aos-delay="600">
        <div class="feature-icon">
          <i class="icon-heart">❤️</i>
        </div>
        <h3>Authentic Experiences</h3>
        <p>Immerse yourself in genuine Bengali culture, traditions, and cuisine with local communities.</p>
      </div>
    </div>
  </div>
</section>

<!-- Premium Destinations Carousel -->
<section class="destinations-section">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-badge">Explore Beautiful Places</span>
      <h2>Popular Destinations</h2>
      <p>Discover the most breathtaking locations across Bangladesh with our curated travel experiences</p>
    </div>
    
    <div class="destinations-carousel">
      <div class="carousel-track">
        <div class="destination-card" data-aos="fade-up" data-aos-delay="100">
          <div class="card-image">
            <img src="{{ asset('images/kuakataresort.jpg') }}" alt="Cox's Bazar">
            <div class="card-overlay">
              <div class="location-badge">
                <i class="fas fa-map-marker-alt"></i>
                Cox's Bazar
              </div>
              <div class="card-rating">
                <div class="stars">★★★★★</div>
                <div class="rating-text">4.8</div>
              </div>
            </div>
          </div>
          <div class="card-content">
            <h3>Cox's Bazar Beach Resort</h3>
            <p>Experience the world's longest unbroken sandy sea beach with stunning sunsets and vibrant local culture. Perfect for beach lovers and adventure seekers.</p>
            <div class="card-features">
              <span class="feature-tag">Beach Resort</span>
              <span class="feature-tag">Sea View</span>
              <span class="feature-tag">Adventure</span>
            </div>
          </div>
        </div>
        
        <div class="destination-card" data-aos="fade-up" data-aos-delay="200">
          <div class="card-image">
            <img src="{{ asset('images/sylhetresort.jpg') }}" alt="Sylhet">
            <div class="card-overlay">
              <div class="location-badge">
                <i class="fas fa-map-marker-alt"></i>
                Sylhet
              </div>
              <div class="card-rating">
                <div class="stars">★★★★★</div>
                <div class="rating-text">4.7</div>
              </div>
            </div>
          </div>
          <div class="card-content">
            <h3>Sylhet Tea Gardens</h3>
            <p>Immerse yourself in the lush green tea gardens and rolling hills of Sylhet. Discover the serene beauty of nature and traditional tea culture.</p>
            <div class="card-features">
              <span class="feature-tag">Tea Gardens</span>
              <span class="feature-tag">Hill Station</span>
              <span class="feature-tag">Culture</span>
            </div>
          </div>
        </div>
        
        <div class="destination-card" data-aos="fade-up" data-aos-delay="300">
          <div class="card-image">
            <img src="{{ asset('images/alikadamresort.jpg') }}" alt="Bandarban">
            <div class="card-overlay">
              <div class="location-badge">
                <i class="fas fa-map-marker-alt"></i>
                Bandarban
              </div>
              <div class="card-rating">
                <div class="stars">★★★★★</div>
                <div class="rating-text">4.6</div>
              </div>
            </div>
          </div>
          <div class="card-content">
            <h3>Bandarban Hill Resort</h3>
            <p>Explore the mystical hill tracts and experience the rich tribal culture of Bandarban. Adventure awaits in the clouds and mountains.</p>
            <div class="card-features">
              <span class="feature-tag">Hill Tracts</span>
              <span class="feature-tag">Tribal Culture</span>
              <span class="feature-tag">Trekking</span>
            </div>
          </div>
        </div>
        
        <div class="destination-card" data-aos="fade-up" data-aos-delay="400">
          <div class="card-image">
            <img src="{{ asset('images/mirinjaresort.jpg') }}" alt="Sundarbans">
            <div class="card-overlay">
              <div class="location-badge">
                <i class="fas fa-map-marker-alt"></i>
                Sundarbans
              </div>
              <div class="card-rating">
                <div class="stars">★★★★★</div>
                <div class="rating-text">4.9</div>
              </div>
            </div>
          </div>
          <div class="card-content">
            <h3>Sundarbans Wildlife Safari</h3>
            <p>Journey into the world's largest mangrove forest and spot the magnificent Royal Bengal Tigers in their natural habitat. A true wilderness experience.</p>
            <div class="card-features">
              <span class="feature-tag">Wildlife</span>
              <span class="feature-tag">Mangrove</span>
              <span class="feature-tag">Safari</span>
            </div>
          </div>
        </div>
      </div>
      
      <div class="carousel-controls">
        <button class="carousel-btn prev-btn">
          <i class="fas fa-chevron-left"></i>
        </button>
        <button class="carousel-btn next-btn">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>
      
      <div class="carousel-indicators">
        <button class="indicator active"></button>
        <button class="indicator"></button>
        <button class="indicator"></button>
        <button class="indicator"></button>
      </div>
    </div>
  </div>
</section>
              <span class="feature-tag">Mountains</span>
              <span class="feature-tag">Trekking</span>
              <span class="feature-tag">Culture</span>
            </div>
          </div>
        </div>
        
        <div class="destination-card">
          <div class="card-image">
            <img src="https://images.hive.blog/768x0/https://cdn.pixabay.com/photo/2018/03/20/14/00/sea-3243357_960_720.jpg" alt="Sundarbans - World Heritage Site" />
            <div class="card-overlay">
              <div class="location-badge">
                <i class="location-icon">📍</i>
                <span>Sundarbans</span>
              </div>
              <div class="card-rating">
                <span class="stars">★★★★★</span>
                <span class="rating-text">(4.9)</span>
              </div>
            </div>
          </div>
          <div class="card-content">
            <h3>Sundarbans Mangrove</h3>
            <p>Discover the world's largest mangrove forest and home to the majestic Royal Bengal Tiger</p>
            <div class="card-features">
              <span class="feature-tag">Wildlife</span>
              <span class="feature-tag">Tigers</span>
              <span class="feature-tag">UNESCO</span>
            </div>
          </div>
        </div>
        
        <div class="destination-card">
          <div class="card-image">
            <img src="https://www.travelandexplorebd.com/storage/app/public/posts/April2020/41.jpg" alt="Srimangal - Tea Capital" />
            <div class="card-overlay">
              <div class="location-badge">
                <i class="location-icon">📍</i>
                <span>Srimangal</span>
              </div>
              <div class="card-rating">
                <span class="stars">★★★★★</span>
                <span class="rating-text">(4.7)</span>
              </div>
            </div>
          </div>
          <div class="card-content">
            <h3>Srimangal Tea Gardens</h3>
            <p>Walk through endless tea gardens and experience the finest tea culture in the "Tea Capital of Bangladesh"</p>
            <div class="card-features">
              <span class="feature-tag">Tea Gardens</span>
              <span class="feature-tag">Nature</span>
              <span class="feature-tag">Photography</span>
            </div>
          </div>
        </div>
      </div>
      
      <div class="carousel-controls">
        <button class="carousel-btn prev-btn" aria-label="Previous destination">
          <i class="arrow-left">←</i>
        </button>
        <button class="carousel-btn next-btn" aria-label="Next destination">
          <i class="arrow-right">→</i>
        </button>
      </div>
      
      <div class="carousel-indicators">
        <button class="indicator active" data-slide="0"></button>
        <button class="indicator" data-slide="1"></button>
        <button class="indicator" data-slide="2"></button>
        <button class="indicator" data-slide="3"></button>
      </div>
    </div>
  </div>
</section>

<!-- Premium Travel Packages -->
<section class="packages-section">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-badge">Travel Packages</span>
      <h2>Handcrafted Journey Experiences</h2>
      <p>Discover Bangladesh through our expertly curated travel packages designed for every type of explorer</p>
    </div>
    
    <div class="packages-grid">
      <article class="package-card featured" data-aos="fade-up" data-aos-delay="100">
        <div class="package-badge">Most Popular</div>
        <div class="package-image">
          <img src="{{ asset('images/kuakataresort.jpg') }}" alt="Cox's Bazar Premium Package" />
          <div class="package-overlay">
            <div class="package-duration">5D/4N</div>
          </div>
        </div>
        <div class="package-content">
          <div class="package-header">
            <h3>Cox's Bazar Beach Getaway</h3>
            <div class="package-rating">
              <span class="stars">★★★★★</span>
              <span class="rating-count">(128 reviews)</span>
            </div>
          </div>
          <p class="package-description">Relax on the world's longest natural beach with sunset views, fresh seafood, and beachside adventures including water sports and cultural experiences.</p>
          <div class="package-features">
            <div class="feature-item">
              <i class="feature-icon fas fa-hotel"></i>
              <span>5-Star Beach Resort</span>
            </div>
            <div class="feature-item">
              <i class="feature-icon fas fa-utensils"></i>
              <span>All Meals Included</span>
            </div>
            <div class="feature-item">
              <i class="feature-icon fas fa-car"></i>
              <span>Private Transport</span>
            </div>
            <div class="feature-item">
              <i class="feature-icon fas fa-swimmer"></i>
              <span>Water Sports</span>
            </div>
          </div>
          <div class="package-footer">
            <div class="package-price">
              <span class="price-label">Starting from</span>
              <span class="price-amount">৳25,000</span>
              <span class="price-unit">per person</span>
            </div>
            <a href="{{ route('hotelbook') }}" class="package-btn">
              <span>Book Now</span>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </article>

      <article class="package-card" data-aos="fade-up" data-aos-delay="200">
        <div class="package-image">
          <img src="{{ asset('images/alikadamresort.jpg') }}" alt="Bandarban Adventure Package" />
          <div class="package-overlay">
            <div class="package-duration">4D/3N</div>
          </div>
        </div>
        <div class="package-content">
          <div class="package-header">
            <h3>Bandarban Adventure Tour</h3>
            <div class="package-rating">
              <span class="stars">★★★★★</span>
              <span class="rating-count">(95 reviews)</span>
            </div>
          </div>
          <p class="package-description">Trek through Bangladesh's highest peaks, explore tribal villages, and witness breathtaking mountain vistas with experienced guides.</p>
          <div class="package-features">
            <div class="feature-item">
              <i class="feature-icon fas fa-mountain"></i>
              <span>Mountain Resort</span>
            </div>
            <div class="feature-item">
              <i class="feature-icon fas fa-hiking"></i>
              <span>Professional Guide</span>
            </div>
            <div class="feature-item">
              <i class="feature-icon fas fa-camera"></i>
              <span>Photography Tours</span>
            </div>
            <div class="feature-item">
              <i class="feature-icon fas fa-users"></i>
              <span>Cultural Immersion</span>
            </div>
          </div>
          <div class="package-footer">
            <div class="package-price">
              <span class="price-label">Starting from</span>
              <span class="price-amount">৳18,500</span>
              <span class="price-unit">per person</span>
            </div>
            <a href="{{ route('hotelbook') }}" class="package-btn">
              <span>Book Now</span>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </article>

      <article class="package-card" data-aos="fade-up" data-aos-delay="300">
        <div class="package-image">
          <img src="{{ asset('images/sylhetresort.jpg') }}" alt="Sylhet Tea Garden Package" />
          <div class="package-overlay">
            <div class="package-duration">3D/2N</div>
          </div>
        </div>
        <div class="package-content">
          <div class="package-header">
            <h3>Sylhet Tea Garden Experience</h3>
            <div class="package-rating">
              <span class="stars">★★★★★</span>
              <span class="rating-count">(87 reviews)</span>
            </div>
          </div>
          <p class="package-description">Immerse yourself in the serene tea gardens of Sylhet with guided tours, tea tasting sessions, and scenic hill station visits.</p>
          <div class="package-features">
            <div class="feature-item">
              <i class="feature-icon fas fa-leaf"></i>
              <span>Tea Garden Tours</span>
            </div>
            <div class="feature-item">
              <i class="feature-icon fas fa-coffee"></i>
              <span>Tea Tasting</span>
            </div>
            <div class="feature-item">
              <i class="feature-icon fas fa-tree"></i>
              <span>Nature Walks</span>
            </div>
            <div class="feature-item">
              <i class="feature-icon fas fa-spa"></i>
              <span>Wellness Activities</span>
            </div>
          </div>
          <div class="package-footer">
            <div class="package-price">
              <span class="price-label">Starting from</span>
              <span class="price-amount">৳15,000</span>
              <span class="price-unit">per person</span>
            </div>
            <a href="{{ route('hotelbook') }}" class="package-btn">
              <span>Book Now</span>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </article>
    </div>
    
    <div class="packages-cta" data-aos="fade-up" data-aos-delay="400">
      <p>Can't find the perfect package? Let us create a custom itinerary just for you.</p>
      <a href="{{ route('contact') }}" class="btn-outline">
        <span>Create Custom Package</span>
        <i class="fas fa-plus"></i>
      </a>
    </div>
  </div>
</section>
      </article>

      <article class="package-card" data-aos="fade-up" data-aos-delay="600">
        <div class="package-image">
          <img src="https://th.bing.com/th/id/OIP.vaBk0HxSSfZmkpVS2_s72wHaFE?w=268&h=183" alt="Srimangal Tea Garden Package" />
          <div class="package-overlay">
            <div class="package-duration">3D/2N</div>
          </div>
        </div>
        <div class="package-content">
          <div class="package-header">
            <h3>Srimangal Tea Garden Escape</h3>
            <div class="package-rating">
              <span class="stars">★★★★☆</span>
              <span class="rating-count">(67 reviews)</span>
            </div>
          </div>
          <p class="package-description">Walk through emerald tea gardens, taste the finest teas, and experience the tranquil beauty of Sylhet.</p>
          <div class="package-features">
            <div class="feature-item">
              <i class="feature-icon">🍃</i>
              <span>Tea Tasting</span>
            </div>
            <div class="feature-item">
              <i class="feature-icon">🦋</i>
              <span>Nature Walks</span>
            </div>
            <div class="feature-item">
              <i class="feature-icon">🏞️</i>
              <span>Scenic Views</span>
            </div>
          </div>
          <div class="package-footer">
            <div class="package-price">
              <span class="price-label">Starting from</span>
              <span class="price-amount">৳12,000</span>
              <span class="price-unit">per person</span>
            </div>
            <a href="/package" class="package-btn">
              <span>Book Now</span>
              <i class="arrow-icon">→</i>
            </a>
          </div>
        </div>
      </article>
    </div>
    <div class="packages-cta" data-aos="fade-up" data-aos-delay="800">
      <p>Looking for a custom experience?</p>
      <a href="/contact" class="btn-outline">Create Custom Package</a>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-badge">Testimonials</span>
      <h2>What Our Travelers Say</h2>
      <p>Real stories from adventurers who discovered Bangladesh with us</p>
    </div>
    
    <div class="testimonials-grid">
      <div class="testimonial-card" data-aos="fade-up" data-aos-delay="100">
        <div class="testimonial-content">
          <div class="testimonial-rating">★★★★★</div>
          <p>"An absolutely incredible journey! The local guides were knowledgeable and the experiences were authentic. Cox's Bazar was magical - watching the sunrise over the Bay of Bengal is something I'll never forget. The attention to detail in every aspect of the trip was outstanding."</p>
        </div>
        <div class="testimonial-author">
          <div class="author-avatar">
            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b47c?w=150&h=150&fit=crop&crop=face" alt="Sarah Johnson" />
          </div>
          <div class="author-info">
            <h4>Sarah Johnson</h4>
            <span>Travel Blogger, USA</span>
          </div>
        </div>
      </div>
      
      <div class="testimonial-card" data-aos="fade-up" data-aos-delay="200">
        <div class="testimonial-content">
          <div class="testimonial-rating">★★★★★</div>
          <p>"The Sundarbans tour was a once-in-a-lifetime experience. Seeing the Royal Bengal Tiger in its natural habitat was breathtaking! Our guide's expertise made all the difference - we learned so much about conservation and local ecology. Truly exceptional service."</p>
        </div>
        <div class="testimonial-author">
          <div class="author-avatar">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" alt="Michael Chen" />
          </div>
          <div class="author-info">
            <h4>Michael Chen</h4>
            <span>Wildlife Photographer, Canada</span>
          </div>
        </div>
      </div>
      
      <div class="testimonial-card" data-aos="fade-up" data-aos-delay="300">
        <div class="testimonial-content">
          <div class="testimonial-rating">★★★★★</div>
          <p>"Bangladesh exceeded all my expectations. The warmth of the people and the diversity of landscapes made this trip unforgettable. From the tea gardens of Sylhet to the hill tracts of Bandarban, every moment was perfectly curated. Professional service throughout!"</p>
        </div>
        <div class="testimonial-author">
          <div class="author-avatar">
            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face" alt="Emma Rodriguez" />
          </div>
          <div class="author-info">
            <h4>Emma Rodriguez</h4>
            <span>Adventure Seeker, Spain</span>
          </div>
        </div>
      </div>
      
      <div class="testimonial-card" data-aos="fade-up" data-aos-delay="400">
        <div class="testimonial-content">
          <div class="testimonial-rating">★★★★★</div>
          <p>"The cultural immersion was phenomenal. Staying with local families in the hill districts and learning about their traditions was the highlight of our journey. The team arranged everything seamlessly - from transport to authentic local cuisine experiences."</p>
        </div>
        <div class="testimonial-author">
          <div class="author-avatar">
            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" alt="James Wilson" />
          </div>
          <div class="author-info">
            <h4>James Wilson</h4>
            <span>Cultural Anthropologist, UK</span>
          </div>
        </div>
      </div>
      
      <div class="testimonial-card" data-aos="fade-up" data-aos-delay="500">
        <div class="testimonial-content">
          <div class="testimonial-rating">★★★★★</div>
          <p>"As a solo female traveler, I felt completely safe and supported throughout my Bangladesh adventure. The guides were respectful and knowledgeable, and the accommodations were perfect. This trip changed my perspective on travel in South Asia!"</p>
        </div>
        <div class="testimonial-author">
          <div class="author-avatar">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&h=150&fit=crop&crop=face" alt="Priya Sharma" />
          </div>
          <div class="author-info">
            <h4>Priya Sharma</h4>
            <span>Solo Traveler, India</span>
          </div>
        </div>
      </div>
      
      <div class="testimonial-card" data-aos="fade-up" data-aos-delay="600">
        <div class="testimonial-content">
          <div class="testimonial-rating">★★★★★</div>
          <p>"The photography tour of Bangladesh was expertly planned. Every location offered unique opportunities - from the misty tea gardens to the vibrant river life. The local photographers they connected us with were incredibly talented. Highly recommended!"</p>
        </div>
        <div class="testimonial-author">
          <div class="author-avatar">
            <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=150&h=150&fit=crop&crop=face" alt="Alex Turner" />
          </div>
          <div class="author-info">
            <h4>Alex Turner</h4>
            <span>Professional Photographer, Australia</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* Modern CSS Reset & Variables */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  --primary-green: #00695c;
  --secondary-green: #388e3c;
  --accent-green: #66bb6a;
  --light-green: #e8f5e8;
  --gold: #ffc107;
  --white: #ffffff;
  --black: #000000;
  --gray-100: #f8f9fa;
  --gray-200: #e9ecef;
  --gray-300: #dee2e6;
  --gray-600: #6c757d;
  --gray-900: #212529;
  --shadow-light: 0 2px 10px rgba(0, 0, 0, 0.1);
  --shadow-medium: 0 8px 30px rgba(0, 0, 0, 0.12);
  --shadow-heavy: 0 20px 60px rgba(0, 0, 0, 0.2);
  --border-radius: 12px;
  --border-radius-lg: 20px;
  --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

body {
  font-family: 'Inter', 'Segoe UI', sans-serif;
  line-height: 1.6;
  color: var(--gray-900);
  background: linear-gradient(135deg, #f8fffe 0%, #e8f5e8 100%);
  overflow-x: hidden;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

/* Enhanced Hero Section */
.hero-banner {
  position: relative;
  height: 100vh;
  min-height: 800px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  background: linear-gradient(135deg, 
    rgba(0, 105, 92, 0.9) 0%, 
    rgba(56, 142, 60, 0.8) 50%, 
    rgba(102, 187, 106, 0.7) 100%),
    url('https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=2000&q=80') center/cover;
  animation: heroBackground 20s ease-in-out infinite;
}

@keyframes heroBackground {
  0%, 100% { background-size: 100% 100%; }
  50% { background-size: 110% 110%; }
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at center, 
    rgba(0, 105, 92, 0.4) 0%, 
    rgba(0, 105, 92, 0.8) 100%);
  z-index: 1;
}

.hero-content {
  position: relative;
  z-index: 2;
  text-align: center;
  color: white;
  max-width: 900px;
  padding: 0 20px;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  padding: 8px 16px;
  border-radius: 50px;
  font-size: 14px;
  font-weight: 500;
  margin-bottom: 24px;
  animation: fadeInUp 1s ease-out 0.5s both;
}

.badge-icon {
  font-size: 18px;
}

.hero-title {
  display: flex;
  flex-direction: column;
  gap: 8px;
  margin-bottom: 24px;
}

.title-line {
  display: block;
  font-size: clamp(2.5rem, 8vw, 4.5rem);
  font-weight: 700;
  line-height: 1.1;
  letter-spacing: -0.02em;
}

.gradient-text {
  background: linear-gradient(135deg, #ffc107 0%, #ff9800 50%, #f57c00 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  filter: drop-shadow(0 4px 8px rgba(255, 193, 7, 0.3));
}

.hero-description {
  font-size: clamp(1.1rem, 2.5vw, 1.4rem);
  font-weight: 400;
  opacity: 0.95;
  margin-bottom: 32px;
  max-width: 700px;
  margin-left: auto;
  margin-right: auto;
}

.hero-buttons {
  display: flex;
  gap: 16px;
  justify-content: center;
  flex-wrap: wrap;
  margin-bottom: 48px;
}

.btn-primary, .btn-secondary {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 16px 32px;
  border-radius: 50px;
  font-weight: 600;
  font-size: 16px;
  text-decoration: none;
  transition: var(--transition);
  position: relative;
  overflow: hidden;
}

.btn-primary {
  background: linear-gradient(135deg, var(--gold) 0%, #ff9800 100%);
  color: var(--black);
  box-shadow: 0 8px 25px rgba(255, 193, 7, 0.4);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 12px 35px rgba(255, 193, 7, 0.5);
  background: linear-gradient(135deg, #ffca28 0%, #ffb74d 100%);
}

.btn-secondary {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(10px);
  border: 2px solid rgba(255, 255, 255, 0.3);
  color: white;
}

.btn-secondary:hover {
  background: rgba(255, 255, 255, 0.25);
  transform: translateY(-2px);
}

.hero-stats {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
  gap: 32px;
  max-width: 500px;
  margin: 0 auto;
}

.stat-item {
  text-align: center;
}

.stat-number {
  display: block;
  font-size: 2rem;
  font-weight: 700;
  color: var(--gold);
  margin-bottom: 4px;
}

.stat-label {
  font-size: 14px;
  opacity: 0.8;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.hero-scroll-indicator {
  position: absolute;
  bottom: 30px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  color: white;
  font-size: 12px;
  opacity: 0.7;
  z-index: 2;
  animation: bounce 2s infinite;
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
  40% { transform: translateX(-50%) translateY(-10px); }
  60% { transform: translateX(-50%) translateY(-5px); }
}

.scroll-mouse {
  width: 24px;
  height: 40px;
  border: 2px solid rgba(255, 255, 255, 0.5);
  border-radius: 12px;
  display: flex;
  justify-content: center;
  padding-top: 6px;
}

.scroll-wheel {
  width: 3px;
  height: 6px;
  background: rgba(255, 255, 255, 0.7);
  border-radius: 2px;
  animation: scroll 2s infinite;
}

@keyframes scroll {
  0% { opacity: 1; transform: translateY(0); }
  100% { opacity: 0; transform: translateY(18px); }
}

.floating-elements {
  position: absolute;
  inset: 0;
  z-index: 1;
  pointer-events: none;
}

.float-element {
  position: absolute;
  width: 60px;
  height: 60px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  backdrop-filter: blur(5px);
}

.float-1 {
  top: 20%;
  left: 10%;
  animation: float 6s ease-in-out infinite;
}

.float-2 {
  top: 60%;
  right: 15%;
  animation: float 8s ease-in-out infinite reverse;
}

.float-3 {
  bottom: 20%;
  left: 20%;
  animation: float 10s ease-in-out infinite;
}

@keyframes float {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  50% { transform: translateY(-20px) rotate(180deg); }
}

/* Section Styling */
.section-header {
  text-align: center;
  margin-bottom: 64px;
}

.section-badge {
  display: inline-block;
  background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
  color: white;
  padding: 8px 20px;
  border-radius: 20px;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 16px;
}

.section-header h2 {
  font-size: clamp(2rem, 5vw, 3rem);
  font-weight: 700;
  color: var(--gray-900);
  margin-bottom: 16px;
  line-height: 1.2;
}

.section-header p {
  font-size: 1.1rem;
  color: var(--gray-600);
  max-width: 600px;
  margin: 0 auto;
}

/* Features Section */
.features-section {
  padding: 100px 0;
  background: linear-gradient(135deg, var(--white) 0%, var(--gray-100) 100%);
}

.features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 40px;
}

.feature-card {
  background: var(--white);
  padding: 40px 30px;
  border-radius: var(--border-radius-lg);
  box-shadow: var(--shadow-light);
  border: 1px solid var(--gray-200);
  transition: var(--transition);
  text-align: center;
}

.feature-card:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-medium);
}

.feature-icon {
  width: 80px;
  height: 80px;
  background: linear-gradient(135deg, var(--light-green) 0%, var(--accent-green) 100%);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 24px;
  font-size: 2rem;
}

.feature-card h3 {
  font-size: 1.3rem;
  font-weight: 600;
  color: var(--gray-900);
  margin-bottom: 16px;
}

.feature-card p {
  color: var(--gray-600);
  line-height: 1.6;
}

/* Animation Classes */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

[data-aos="fade-up"] {
  opacity: 0;
  transform: translateY(30px);
  transition: all 0.8s ease-out;
}

[data-aos="fade-up"].aos-animate {
  opacity: 1;
  transform: translateY(0);
}

/* Destinations Section */
.destinations-section {
  padding: 100px 0;
  background: linear-gradient(135deg, var(--gray-100) 0%, var(--white) 100%);
}

.destinations-carousel {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

.carousel-track {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
}

.destination-card {
  background: var(--white);
  border-radius: var(--border-radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-light);
  transition: var(--transition);
  position: relative;
}

.destination-card:hover {
  transform: translateY(-10px);
  box-shadow: var(--shadow-medium);
}

.card-image {
  position: relative;
  height: 250px;
  overflow: hidden;
}

.card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: var(--transition);
}

.destination-card:hover .card-image img {
  transform: scale(1.1);
}

.card-overlay {
  position: absolute;
  top: 20px;
  left: 20px;
  right: 20px;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
}

.location-badge {
  display: flex;
  align-items: center;
  gap: 4px;
  background: rgba(0, 0, 0, 0.7);
  backdrop-filter: blur(10px);
  color: white;
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 500;
}

.card-rating {
  display: flex;
  align-items: center;
  gap: 4px;
  background: rgba(255, 255, 255, 0.9);
  backdrop-filter: blur(10px);
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 12px;
}

.stars {
  color: var(--gold);
}

.rating-text {
  color: var(--gray-600);
  font-weight: 500;
}

.card-content {
  padding: 24px;
}

.card-content h3 {
  font-size: 1.3rem;
  font-weight: 600;
  color: var(--gray-900);
  margin-bottom: 12px;
}

.card-content p {
  color: var(--gray-600);
  line-height: 1.6;
  margin-bottom: 16px;
}

.card-features {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.feature-tag {
  background: var(--light-green);
  color: var(--primary-green);
  padding: 4px 12px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 500;
}

.carousel-controls {
  display: flex;
  justify-content: center;
  gap: 16px;
  margin-top: 40px;
}

.carousel-btn {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  border: none;
  background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: var(--transition);
  font-size: 1.2rem;
}

.carousel-btn:hover {
  transform: scale(1.1);
  box-shadow: var(--shadow-medium);
}

.carousel-indicators {
  display: flex;
  justify-content: center;
  gap: 8px;
  margin-top: 24px;
}

.indicator {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  border: none;
  background: var(--gray-300);
  cursor: pointer;
  transition: var(--transition);
}

.indicator.active {
  background: var(--primary-green);
  transform: scale(1.2);
}

/* Packages Section */
.packages-section {
  padding: 100px 0;
  background: linear-gradient(135deg, var(--white) 0%, var(--light-green) 100%);
}

.packages-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 40px;
  margin-bottom: 60px;
}

.package-card {
  background: var(--white);
  border-radius: var(--border-radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-light);
  transition: var(--transition);
  position: relative;
}

.package-card.featured {
  border: 2px solid var(--gold);
  transform: scale(1.05);
}

.package-card:hover {
  transform: translateY(-8px) scale(1.02);
  box-shadow: var(--shadow-medium);
}

.package-card.featured:hover {
  transform: translateY(-8px) scale(1.07);
}

.package-badge {
  position: absolute;
  top: 20px;
  left: 20px;
  background: var(--gold);
  color: var(--black);
  padding: 6px 16px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 600;
  z-index: 2;
}

.package-image {
  position: relative;
  height: 220px;
  overflow: hidden;
}

.package-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: var(--transition);
}

.package-card:hover .package-image img {
  transform: scale(1.1);
}

.package-overlay {
  position: absolute;
  top: 20px;
  right: 20px;
}

.package-duration {
  background: rgba(0, 0, 0, 0.7);
  backdrop-filter: blur(10px);
  color: white;
  padding: 6px 12px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 500;
}

.package-content {
  padding: 30px;
}

.package-header {
  margin-bottom: 16px;
}

.package-header h3 {
  font-size: 1.3rem;
  font-weight: 600;
  color: var(--gray-900);
  margin-bottom: 8px;
}

.package-rating {
  display: flex;
  align-items: center;
  gap: 8px;
}

.rating-count {
  color: var(--gray-600);
  font-size: 14px;
}

.package-description {
  color: var(--gray-600);
  line-height: 1.6;
  margin-bottom: 20px;
}

.package-features {
  display: flex;
  flex-direction: column;
  gap: 12px;
  margin-bottom: 24px;
}

.feature-item {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 14px;
  color: var(--gray-700);
}

.feature-icon {
  font-size: 16px;
}

.package-footer {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  padding-top: 20px;
  border-top: 1px solid var(--gray-200);
}

.package-price {
  display: flex;
  flex-direction: column;
}

.price-label {
  font-size: 12px;
  color: var(--gray-600);
  margin-bottom: 4px;
}

.price-amount {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--primary-green);
}

.price-unit {
  font-size: 12px;
  color: var(--gray-600);
}

.package-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
  color: white;
  padding: 12px 24px;
  border-radius: 25px;
  text-decoration: none;
  font-weight: 500;
  transition: var(--transition);
}

.package-btn:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-medium);
}

.packages-cta {
  text-align: center;
}

.packages-cta p {
  font-size: 1.1rem;
  color: var(--gray-600);
  margin-bottom: 20px;
}

.btn-outline {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  border: 2px solid var(--primary-green);
  color: var(--primary-green);
  background: transparent;
  padding: 12px 24px;
  border-radius: 25px;
  text-decoration: none;
  font-weight: 500;
  transition: var(--transition);
}

.btn-outline:hover {
  background: var(--primary-green);
  color: white;
  transform: translateY(-2px);
}

/* Testimonials Section */
.testimonials-section {
  padding: 100px 0;
  background: linear-gradient(135deg, var(--gray-900) 0%, var(--primary-green) 100%);
  color: white;
}

.testimonials-section .section-badge {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
}

.testimonials-section .section-header h2 {
  color: white;
}

.testimonials-section .section-header p {
  color: rgba(255, 255, 255, 0.8);
}

.testimonials-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 40px;
}

.testimonial-card {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: var(--border-radius-lg);
  padding: 30px;
  transition: var(--transition);
}

.testimonial-card:hover {
  transform: translateY(-8px);
  background: rgba(255, 255, 255, 0.15);
}

.testimonial-content {
  margin-bottom: 24px;
}

.testimonial-rating {
  color: var(--gold);
  font-size: 1.1rem;
  margin-bottom: 16px;
}

.testimonial-content p {
  font-size: 1rem;
  line-height: 1.6;
  color: rgba(255, 255, 255, 0.9);
  font-style: italic;
}

.testimonial-author {
  display: flex;
  align-items: center;
  gap: 16px;
}

.author-avatar {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  overflow: hidden;
  border: 2px solid rgba(255, 255, 255, 0.3);
}

.author-avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.author-info h4 {
  font-size: 1rem;
  font-weight: 600;
  margin-bottom: 4px;
}

.author-info span {
  font-size: 14px;
  color: rgba(255, 255, 255, 0.7);
}

/* Responsive Design */
@media (max-width: 968px) {
  .packages-grid {
    grid-template-columns: 1fr;
    max-width: 500px;
    margin: 0 auto 60px;
  }
  
  .package-card.featured {
    transform: none;
  }
  
  .package-card.featured:hover {
    transform: translateY(-8px);
  }
}

@media (max-width: 768px) {
  .carousel-track {
    grid-template-columns: 1fr;
  }
  
  .package-footer {
    flex-direction: column;
    gap: 20px;
    align-items: stretch;
  }
  
  .package-btn {
    justify-content: center;
  }
  
  .testimonials-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<!-- Enhanced JavaScript for animations and interactivity -->
<script>
  // Typing animation
  const textEl = document.getElementById('typed-text');
  const phrases = [
    "Welcome to Let's Explore Bangladesh!",
    "Discover breathtaking landscapes.",
    "Experience vibrant culture.",
    "Plan your unforgettable trip today."
  ];

  let currentPhrase = 0;
  let currentChar = 0;
  let isDeleting = false;

  function type() {
    const fullText = phrases[currentPhrase];
    if (isDeleting) {
      const currentText = fullText.substring(0, currentChar - 1);
      currentChar--;
    } else {
      const currentText = fullText.substring(0, currentChar + 1);
      currentChar++;
    }

    if (textEl) {
      textEl.textContent = currentText;
    }

    if (!isDeleting && currentChar === fullText.length) {
      setTimeout(() => isDeleting = true, 2000);
    } else if (isDeleting && currentChar === 0) {
      isDeleting = false;
      currentPhrase = (currentPhrase + 1) % phrases.length;
    }

    setTimeout(type, isDeleting ? 50 : 100);
  }

  document.addEventListener('DOMContentLoaded', () => {
    if(textEl) {
      type();
    }

    const carousel = document.getElementById('carousel');
    if (carousel) {
      const slides = carousel.querySelectorAll('.carousel-slide');
      const prevBtn = document.getElementById('prevBtn');
      const nextBtn = document.getElementById('nextBtn');
      let currentSlide = 0;

      function updateCarousel() {
        slides.forEach((slide, index) => {
          slide.style.display = index === currentSlide ? 'block' : 'none';
        });
      }

      if (prevBtn) {
        prevBtn.addEventListener('click', () => {
          currentSlide = (currentSlide - 1 + slides.length) % slides.length;
          updateCarousel();
        });
      }

      if (nextBtn) {
        nextBtn.addEventListener('click', () => {
          currentSlide = (currentSlide + 1) % slides.length;
          updateCarousel();
        });
      }

      updateCarousel();
    }

    // Initialize AOS animations
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
      });
    }
  });
</script>
@endsection
   