@extends('layouts.app')

@section('title', 'About')

@section('content')
<style>
  /* Import AOS for animations */
  @import url('https://unpkg.com/aos@2.3.1/dist/aos.css');

  .about-hero {
    background: linear-gradient(135deg, rgba(0, 105, 92, 0.9), rgba(76, 175, 80, 0.8)), 
                url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
    padding: 8rem 2rem;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
    min-height: 85vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .about-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0, 105, 92, 0.7) 0%, rgba(244, 42, 65, 0.3) 100%);
    z-index: 1;
    animation: gradientShift 8s ease-in-out infinite;
  }

  @keyframes gradientShift {
    0%, 100% {
      background: linear-gradient(45deg, rgba(0, 105, 92, 0.7) 0%, rgba(244, 42, 65, 0.3) 100%);
    }
    50% {
      background: linear-gradient(45deg, rgba(244, 42, 65, 0.4) 0%, rgba(0, 105, 92, 0.8) 100%);
    }
  }

  .about-hero > * {
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

  .about-section {
    max-width: 1200px;
    margin: 0 auto;
    padding: 6rem 2rem;
    background: linear-gradient(135deg, #f8f9fa 0%, #e8f5e8 100%);
    min-height: 100vh;
  }

  .content-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    margin-bottom: 4rem;
    align-items: center;
  }

  .content-text {
    background: white;
    padding: 3rem;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 105, 92, 0.1);
    border: 1px solid rgba(0, 105, 92, 0.1);
  }

  .section-title {
    color: #00695c;
    font-size: 2.5rem;
    margin-bottom: 2rem;
    font-weight: 700;
  }

  .section-text {
    color: #444;
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 1.5rem;
  }

  .flag-container {
    text-align: center;
    position: relative;
  }

  .flag-image {
    height: 200px;
    width: 300px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 105, 92, 0.2);
    object-fit: cover;
    transition: transform 0.3s ease;
    border: 3px solid #00695c;
  }

  .flag-image:hover {
    transform: scale(1.05) rotate(2deg);
  }

  .team-section {
    margin-top: 6rem;
  }

  .team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
  }

  .team-card {
    background: linear-gradient(135deg, #00695c, #4caf50);
    color: white;
    border-radius: 20px;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .team-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
  }

  .team-card:hover::before {
    left: 100%;
  }

  .team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 105, 92, 0.3);
  }

  .team-avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 0 auto 1rem;
    border: 4px solid rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
  }

  .team-name {
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #ffffff;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
  }

  .team-role {
    color: #ffd700;
    font-size: 1rem;
    margin-bottom: 1rem;
    font-weight: 500;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
  }

  .team-bio {
    font-size: 0.9rem;
    opacity: 0.95;
    line-height: 1.5;
    color: #f0f0f0;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
  }

  .stats-section {
    background: white;
    border-radius: 20px;
    padding: 3rem;
    margin: 4rem 0;
    box-shadow: 0 10px 40px rgba(0, 105, 92, 0.1);
    border: 1px solid rgba(0, 105, 92, 0.1);
  }

  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
  }

  .stat-item {
    text-align: center;
    padding: 1.5rem;
    background: linear-gradient(135deg, rgba(0, 105, 92, 0.1), rgba(76, 175, 80, 0.1));
    border-radius: 15px;
    border: 1px solid rgba(0, 105, 92, 0.2);
    transition: all 0.3s ease;
  }

  .stat-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 105, 92, 0.2);
  }

  .stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: #00695c;
    display: block;
    margin-bottom: 0.5rem;
  }

  .stat-label {
    color: #666;
    font-weight: 500;
  }

  /* Dark Mode Styles */
  body.dark-mode .about-section {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
  }

  body.dark-mode .content-text,
  body.dark-mode .stats-section {
    background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%);
    border-color: rgba(76, 175, 80, 0.2);
  }

  body.dark-mode .section-title {
    color: #4caf50;
  }

  body.dark-mode .section-text {
    color: #b0bec5;
  }

  body.dark-mode .stat-item {
    background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(0, 106, 78, 0.1));
    border-color: rgba(76, 175, 80, 0.2);
  }

  body.dark-mode .stat-number {
    color: #4caf50;
  }

  body.dark-mode .stat-label {
    color: #b0bec5;
  }

  body.dark-mode .team-card {
    background: linear-gradient(135deg, #2e7d32, #1b5e20);
  }

  body.dark-mode .team-name {
    color: #ffffff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  }

  body.dark-mode .team-role {
    color: #ffd700;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
  }

  body.dark-mode .team-bio {
    color: #e8f5e8;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
  }

  @media (max-width: 768px) {
    .about-hero {
      padding: 4rem 1rem;
      min-height: 70vh;
    }

    .hero-title {
      font-size: 2.5rem;
    }

    .hero-subtitle {
      font-size: 1.1rem;
    }

    .content-grid {
      grid-template-columns: 1fr;
      gap: 2rem;
    }

    .about-section {
      padding: 3rem 1rem;
    }

    .content-text {
      padding: 2rem;
    }

    .section-title {
      font-size: 2rem;
    }

    .flag-image {
      width: 250px;
      height: 167px;
    }

    .team-grid {
      grid-template-columns: 1fr;
    }

    .stats-grid {
      grid-template-columns: repeat(2, 1fr);
      gap: 1rem;
    }

    .stat-item {
      padding: 1rem;
    }

    .stat-number {
      font-size: 2rem;
    }
  }

  @media (max-width: 480px) {
    .hero-title {
      font-size: 2rem;
    }

    .hero-subtitle {
      font-size: 1rem;
    }

    .stats-grid {
      grid-template-columns: 1fr;
    }
  }
</style>

<!-- Hero Section -->
<section class="about-hero">
  <div class="hero-content">
    <h1 class="hero-title">About Us</h1>
    <p class="hero-subtitle">
      Discover the beauty of Bangladesh with us. We're passionate about showcasing our country's rich heritage, stunning landscapes, and vibrant culture to the world.
    </p>
  </div>
</section>

<!-- Main Content Section -->
<div class="about-section">
  <!-- Mission Section -->
  <div class="content-grid" data-aos="fade-up">
    <div class="content-text">
      <h2 class="section-title">Our Mission</h2>
      <p class="section-text">
        Let's Explore Bangladesh is dedicated to showcasing the breathtaking natural beauty, rich culture, and amazing travel experiences that Bangladesh offers to both local and international travelers.
      </p>
      <p class="section-text">
        We believe that Bangladesh is a hidden gem with incredible potential for tourism. From the world's longest natural beach at Cox's Bazar to the mangrove forests of the Sundarbans, every corner of our country tells a unique story.
      </p>
      <p class="section-text">
        Our mission is to help travelers explore the best destinations with trusted packages, personalized services, and authentic experiences that create lasting memories.
      </p>
    </div>
    <div class="flag-container" data-aos="fade-left">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Flag_of_Bangladesh.svg/800px-Flag_of_Bangladesh.svg.png" 
           alt="Bangladesh Flag" class="flag-image">
    </div>
  </div>

  <!-- Statistics Section -->
  <div class="stats-section" data-aos="fade-up">
    <h2 class="section-title" style="text-align: center; margin-bottom: 1rem;">Why Choose Us</h2>
    <p style="text-align: center; color: #666; font-size: 1.1rem;">Trusted by thousands of travelers</p>
    <div class="stats-grid">
      <div class="stat-item" data-aos="zoom-in" data-aos-delay="100">
        <span class="stat-number">5000+</span>
        <span class="stat-label">Happy Travelers</span>
      </div>
      <div class="stat-item" data-aos="zoom-in" data-aos-delay="200">
        <span class="stat-number">50+</span>
        <span class="stat-label">Destinations</span>
      </div>
      <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
        <span class="stat-number">8</span>
        <span class="stat-label">Divisions Covered</span>
      </div>
      <div class="stat-item" data-aos="zoom-in" data-aos-delay="400">
        <span class="stat-number">24/7</span>
        <span class="stat-label">Customer Support</span>
      </div>
    </div>
  </div>

  <!-- Team Section -->
  <div class="team-section">
    <h2 class="section-title" style="text-align: center;" data-aos="fade-up">Meet Our Team</h2>
    <p style="text-align: center; color: #666; font-size: 1.1rem; margin-bottom: 3rem;" data-aos="fade-up">
      Five passionate individuals working together to make your Bangladesh journey unforgettable
    </p>
    
    <div class="team-grid">
      <div class="team-card" data-aos="fade-up" data-aos-delay="100">
        <div class="team-avatar">👨‍💼</div>
        <h3 class="team-name">Pulok</h3>
        <p class="team-role">Founder & CEO</p>
        <p class="team-bio">
          Visionary leader passionate about showcasing Bangladesh's beauty and cultural heritage to the world.
        </p>
      </div>
      
      <div class="team-card" data-aos="fade-up" data-aos-delay="200">
        <div class="team-avatar">👩‍💻</div>
        <h3 class="team-name">Turzo</h3>
        <p class="team-role">Lead Developer</p>
        <p class="team-bio">
          Tech enthusiast creating seamless digital experiences for travelers exploring Bangladesh.
        </p>
      </div>
      
      <div class="team-card" data-aos="fade-up" data-aos-delay="300">
        <div class="team-avatar">🗺️</div>
        <h3 class="team-name">Nehal</h3>
        <p class="team-role">Travel Guide Specialist</p>
        <p class="team-bio">
          Local expert with deep knowledge of Bangladesh's hidden gems and cultural treasures.
        </p>
      </div>
      
      <div class="team-card" data-aos="fade-up" data-aos-delay="400">
        <div class="team-avatar">🎨</div>
        <h3 class="team-name">Abir</h3>
        <p class="team-role">Creative Director</p>
        <p class="team-bio">
          Artistic visionary crafting compelling visual stories that capture Bangladesh's essence.
        </p>
      </div>
      
      <div class="team-card" data-aos="fade-up" data-aos-delay="500">
        <div class="team-avatar">📋</div>
        <h3 class="team-name">Sabbir</h3>
        <p class="team-role">Operations Manager</p>
        <p class="team-bio">
          Ensuring smooth operations and exceptional customer experiences for every Bangladesh adventure.
        </p>
      </div>
    </div>
  </div>

  <!-- Vision Section -->
  <div class="content-grid" data-aos="fade-up" style="margin-top: 6rem;">
    <div class="content-text">
      <h2 class="section-title">Our Vision</h2>
      <p class="section-text">
        We envision Bangladesh as a premier tourist destination in South Asia, recognized globally for its natural beauty, cultural richness, and warm hospitality.
      </p>
      <p class="section-text">
        Through sustainable tourism practices and community engagement, we aim to create economic opportunities while preserving the authentic character of our beloved country.
      </p>
      <p class="section-text">
        Join us in this journey of discovery and let's explore Bangladesh together, one destination at a time.
      </p>
    </div>
    <div class="content-text" style="background: linear-gradient(135deg, rgba(0, 105, 92, 0.1), rgba(76, 175, 80, 0.1)); border-color: #00695c;">
      <h2 class="section-title">Contact Information</h2>
      <p class="section-text">📧 Email: info@letsexplorebangladesh.com</p>
      <p class="section-text">📞 Phone: +880 1XX-XXXXXXX</p>
      <p class="section-text">📍 Address: Dhaka, Bangladesh</p>
      <p class="section-text">
        <strong>Follow Us:</strong><br>
        🌐 Website | 📘 Facebook | 📸 Instagram | 🐦 Twitter
      </p>
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
  });
</script>
@endsection
