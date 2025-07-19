@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<style>
  /* Import AOS for animations */
  @import url('https://unpkg.com/aos@2.3.1/dist/aos.css');

  .contact-hero {
    background: linear-gradient(135deg, rgba(0, 106, 78, 0.9), rgba(76, 175, 80, 0.8)), 
                url('https://images.unsplash.com/photo-1596524430615-b46475ddff6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
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

  .contact-hero::before {
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

  .contact-hero > * {
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

  .contact-section {
    max-width: 1200px;
    margin: 0 auto;
    padding: 6rem 2rem;
    background: linear-gradient(135deg, #f8f9fa 0%, #e8f5e8 100%);
    min-height: 100vh;
  }

  .contact-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: start;
  }

  .contact-form {
    background: white;
    padding: 3rem;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 106, 78, 0.1);
    border: 1px solid rgba(0, 106, 78, 0.1);
  }

  .form-title {
    color: #006a4e;
    font-size: 2rem;
    margin-bottom: 1.5rem;
    font-weight: 700;
  }

  .form-group {
    margin-bottom: 1.5rem;
  }

  .form-group input,
  .form-group textarea {
    width: 100%;
    padding: 1rem 1.5rem;
    border: 2px solid rgba(0, 106, 78, 0.2);
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    font-family: inherit;
    background: #fafafa;
  }

  .form-group input:focus,
  .form-group textarea:focus {
    outline: none;
    border-color: #006a4e;
    background: white;
    box-shadow: 0 0 0 3px rgba(0, 106, 78, 0.1);
  }

  .form-group textarea {
    resize: vertical;
    min-height: 120px;
  }

  .submit-btn {
    background: linear-gradient(135deg, #006a4e, #4caf50);
    color: white;
    border: none;
    padding: 1rem 3rem;
    border-radius: 12px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    position: relative;
    overflow: hidden;
  }

  .submit-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
  }

  .submit-btn:hover::before {
    left: 100%;
  }

  .submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 106, 78, 0.3);
  }

  .contact-info {
    background: white;
    padding: 3rem;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 106, 78, 0.1);
    border: 1px solid rgba(0, 106, 78, 0.1);
  }

  .info-title {
    color: #006a4e;
    font-size: 2rem;
    margin-bottom: 2rem;
    font-weight: 700;
  }

  .info-item {
    display: flex;
    align-items: center;
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: linear-gradient(135deg, rgba(0, 106, 78, 0.05), rgba(76, 175, 80, 0.05));
    border-radius: 15px;
    border: 1px solid rgba(0, 106, 78, 0.1);
    transition: all 0.3s ease;
  }

  .info-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 106, 78, 0.15);
  }

  .info-icon {
    font-size: 2rem;
    margin-right: 1rem;
    color: #006a4e;
    width: 60px;
    text-align: center;
  }

  .info-content h3 {
    color: #006a4e;
    margin: 0 0 0.5rem 0;
    font-size: 1.2rem;
    font-weight: 600;
  }

  .info-content p {
    color: #666;
    margin: 0;
    font-size: 1rem;
  }

  .success-message {
    background: linear-gradient(135deg, #d4edda, #c3e6cb);
    color: #155724;
    padding: 1rem 1.5rem;
    border-radius: 12px;
    margin-bottom: 2rem;
    border: 1px solid #c3e6cb;
    animation: slideIn 0.5s ease;
  }

  .error-message {
    background: linear-gradient(135deg, #f8d7da, #f5c6cb);
    color: #721c24;
    padding: 1rem 1.5rem;
    border-radius: 12px;
    margin-bottom: 2rem;
    border: 1px solid #f5c6cb;
    animation: slideIn 0.5s ease;
  }

  @keyframes slideIn {
    0% {
      opacity: 0;
      transform: translateY(-10px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .map-section {
    background: white;
    border-radius: 20px;
    padding: 3rem;
    margin-top: 4rem;
    box-shadow: 0 10px 40px rgba(0, 106, 78, 0.1);
    border: 1px solid rgba(0, 106, 78, 0.1);
  }

  .map-title {
    color: #006a4e;
    font-size: 2rem;
    margin-bottom: 2rem;
    font-weight: 700;
    text-align: center;
  }

  /* Dark Mode Styles */
  body.dark-mode .contact-hero {
    background: linear-gradient(135deg, rgba(0, 106, 78, 0.95), rgba(244, 42, 65, 0.8)), 
                url('https://images.unsplash.com/photo-1596524430615-b46475ddff6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
  }

  body.dark-mode .contact-section {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
  }

  body.dark-mode .contact-form,
  body.dark-mode .contact-info,
  body.dark-mode .map-section {
    background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%);
    box-shadow: 0 10px 40px rgba(0, 106, 78, 0.2);
  }

  body.dark-mode .form-title,
  body.dark-mode .info-title,
  body.dark-mode .map-title {
    color: #4caf50;
  }

  body.dark-mode .form-group input,
  body.dark-mode .form-group textarea {
    background: rgba(50, 50, 50, 0.9);
    border-color: rgba(76, 175, 80, 0.3);
    color: #e0e0e0;
  }

  body.dark-mode .form-group input::placeholder,
  body.dark-mode .form-group textarea::placeholder {
    color: #a0a0a0;
  }

  body.dark-mode .form-group input:focus,
  body.dark-mode .form-group textarea:focus {
    border-color: #4caf50;
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.3);
  }

  body.dark-mode .info-item {
    background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(0, 106, 78, 0.1));
    border-color: rgba(76, 175, 80, 0.2);
  }

  body.dark-mode .info-content h3 {
    color: #4caf50;
  }

  body.dark-mode .info-content p {
    color: #b0bec5;
  }

  @media (max-width: 768px) {
    .contact-hero {
      padding: 4rem 1rem;
      min-height: 70vh;
    }

    .hero-title {
      font-size: 2.5rem;
    }

    .hero-subtitle {
      font-size: 1.1rem;
    }

    .contact-content {
      grid-template-columns: 1fr;
      gap: 2rem;
    }

    .contact-section {
      padding: 3rem 1rem;
    }

    .contact-form,
    .contact-info {
      padding: 2rem;
    }

    .form-title,
    .info-title {
      font-size: 1.5rem;
    }

    .info-item {
      padding: 1rem;
    }

    .info-icon {
      font-size: 1.5rem;
      width: 50px;
    }
  }

  @media (max-width: 480px) {
    .hero-title {
      font-size: 2rem;
    }

    .hero-subtitle {
      font-size: 1rem;
    }

    .contact-form,
    .contact-info {
      padding: 1.5rem;
    }

    .info-item {
      flex-direction: column;
      text-align: center;
      gap: 1rem;
    }

    .info-icon {
      margin-right: 0;
    }
  }
</style>

<!-- Hero Section -->
<section class="contact-hero">
  <div class="hero-content">
    <h1 class="hero-title">Contact Us</h1>
    <p class="hero-subtitle">
      Have questions, feedback, or want to book a package? We're here to help you plan your perfect Bangladesh adventure.
    </p>
  </div>
</section>

<!-- Main Content Section -->
<div class="contact-section">
  <div class="contact-content">
    <!-- Contact Form -->
    <div class="contact-form" data-aos="fade-right">
      <h2 class="form-title">Send us a Message</h2>
      
      {{-- Success/Error Messages --}}
      @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
      @endif

      @if($errors->any())
        <div class="error-message">
          @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      <form action="#" method="POST">
        @csrf
        <div class="form-group">
          <input type="text" name="name" placeholder="Your Full Name" required />
        </div>
        
        <div class="form-group">
          <input type="email" name="email" placeholder="Your Email Address" required />
        </div>
        
        <div class="form-group">
          <input type="text" name="subject" placeholder="Subject" required />
        </div>
        
        <div class="form-group">
          <textarea name="message" rows="5" placeholder="Tell us how we can help you..." required></textarea>
        </div>
        
        <button type="submit" class="submit-btn">Send Message</button>
      </form>
    </div>

    <!-- Contact Information -->
    <div class="contact-info" data-aos="fade-left">
      <h2 class="info-title">Get in Touch</h2>
      
      <div class="info-item" data-aos="fade-up" data-aos-delay="100">
        <div class="info-icon">📧</div>
        <div class="info-content">
          <h3>Email</h3>
          <p>info@letsexplorebangladesh.com<br>support@letsexplorebangladesh.com</p>
        </div>
      </div>

      <div class="info-item" data-aos="fade-up" data-aos-delay="200">
        <div class="info-icon">📞</div>
        <div class="info-content">
          <h3>Phone</h3>
          <p>+880 1XXX-XXXXXX<br>+880 1XXX-XXXXXX</p>
        </div>
      </div>

      <div class="info-item" data-aos="fade-up" data-aos-delay="300">
        <div class="info-icon">📍</div>
        <div class="info-content">
          <h3>Address</h3>
          <p>Dhaka, Bangladesh<br>Postal Code: 1000</p>
        </div>
      </div>

      <div class="info-item" data-aos="fade-up" data-aos-delay="400">
        <div class="info-icon">🕒</div>
        <div class="info-content">
          <h3>Business Hours</h3>
          <p>Mon - Fri: 9:00 AM - 6:00 PM<br>Sat - Sun: 10:00 AM - 4:00 PM</p>
        </div>
      </div>

      <div class="info-item" data-aos="fade-up" data-aos-delay="500">
        <div class="info-icon">🌐</div>
        <div class="info-content">
          <h3>Follow Us</h3>
          <p>Facebook | Instagram | Twitter<br>LinkedIn | YouTube</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Map Section -->
  <div class="map-section" data-aos="fade-up">
    <h2 class="map-title">Find Us on Map</h2>
    <div style="width: 100%; height: 300px; background: linear-gradient(135deg, rgba(0, 106, 78, 0.1), rgba(76, 175, 80, 0.1)); border-radius: 15px; display: flex; align-items: center; justify-content: center; border: 2px dashed rgba(0, 106, 78, 0.3);">
      <div style="text-align: center; color: #666;">
        <div style="font-size: 3rem; margin-bottom: 1rem;">🗺️</div>
        <p style="font-size: 1.1rem; margin: 0;">Interactive Map Coming Soon</p>
        <p style="font-size: 0.9rem; margin: 0.5rem 0 0 0; opacity: 0.7;">Located in the heart of Dhaka, Bangladesh</p>
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
  });
</script>
@endsection
