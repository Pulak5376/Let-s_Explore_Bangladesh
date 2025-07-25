@extends('layouts.app')

@section('title', 'Explore Places')

@section('content')
<style>
  /* Import AOS for animations */
  @import url('https://unpkg.com/aos@2.3.1/dist/aos.css');

  .places-hero {
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 105, 92, 0.2) 50%, rgba(0, 0, 0, 0.4) 100%), 
                url('https://images.unsplash.com/photo-1605640840605-14ac1855827b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
    padding: 8rem 2rem;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .places-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 105, 92, 0.1) 100%);
    z-index: 1;
    animation: gradientShift 10s ease-in-out infinite;
  }

  @keyframes gradientShift {
    0%, 100% {
      background: linear-gradient(45deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 105, 92, 0.1) 100%);
    }
    50% {
      background: linear-gradient(45deg, rgba(0, 105, 92, 0.1) 0%, rgba(0, 0, 0, 0.3) 100%);
    }
  }

  .places-hero::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
      radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
      radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
      radial-gradient(circle at 40% 40%, rgba(0, 105, 92, 0.1) 0%, transparent 50%);
    z-index: 2;
    animation: floatingOrbs 15s ease-in-out infinite;
  }

  @keyframes floatingOrbs {
    0%, 100% { transform: translateY(0px) scale(1); }
    33% { transform: translateY(-20px) scale(1.1); }
    66% { transform: translateY(10px) scale(0.9); }
  }

  .places-hero > * {
    position: relative;
    z-index: 3;
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

  .hero-stats {
    display: flex;
    justify-content: center;
    gap: 3rem;
    margin-top: 3rem;
    animation: statsSlideIn 2s ease-out 1s both;
  }

  @keyframes statsSlideIn {
    0% {
      opacity: 0;
      transform: translateY(50px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .stat-item {
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    padding: 1.5rem;
    border-radius: 15px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
  }

  .stat-item:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 10px 30px rgba(0, 105, 92, 0.3);
  }

  .stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: #ffffff;
    display: block;
    line-height: 1;
  }

  .stat-label {
    font-size: 1rem;
    opacity: 0.9;
    margin-top: 0.5rem;
  }

  .places-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 6rem 2rem;
    background: linear-gradient(135deg, #f8f9fa 0%, #e8f5e8 100%);
    min-height: 100vh;
  }

  .division-filters {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 4rem;
    flex-wrap: wrap;
  }

  .filter-btn {
    background: linear-gradient(135deg, #ffffff, #f8f9fa);
    color: #00695c;
    border: 2px solid rgba(0, 105, 92, 0.2);
    padding: 12px 25px;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 600;
    font-size: 14px;
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
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
    transition: left 0.5s;
  }

  .filter-btn:hover::before {
    left: 100%;
  }

  .filter-btn:hover,
  .filter-btn.active {
    background: linear-gradient(135deg, #00695c, #4caf50);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 105, 92, 0.3);
    border-color: #00695c;
  }

  .places-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
  }

  .place-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 105, 92, 0.1);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    border: 1px solid rgba(0, 105, 92, 0.1);
  }

  .place-card:hover {
    transform: translateY(-15px) scale(1.03);
    box-shadow: 0 25px 50px rgba(0, 105, 92, 0.2);
    border-color: #00695c;
  }

  .image-container {
    position: relative;
    overflow: hidden;
    height: 280px;
  }

  .place-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
    filter: brightness(1.1) saturate(1.2);
  }

  .place-card:hover .place-image {
    transform: scale(1.15) rotate(2deg);
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

  .place-card:hover .image-overlay {
    opacity: 1;
  }

  .price-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.9rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
  }

  .card-content {
    padding: 1.5rem;
  }

  .division-badge {
    display: inline-block;
    background: linear-gradient(135deg, #28a745, #20c997);
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

  .card-details {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    color: #6c757d;
    font-size: 0.9rem;
  }

  .detail-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .add-to-cart-btn {
    width: 100%;
    background: linear-gradient(135deg, #ff6b6b, #ee5a52);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .add-to-cart-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #ee5a52, #d63384);
    transition: left 0.3s ease;
    z-index: -1;
  }

  .add-to-cart-btn:hover::before {
    left: 0;
  }

  .add-to-cart-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(255, 107, 107, 0.4);
  }

  .stats-section {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 3rem 2rem;
    margin: 3rem 0;
    border-radius: 20px;
    text-align: center;
  }

  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
  }

  .stat-item {
    text-align: center;
  }

  .stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
  }

  .stat-label {
    font-size: 1rem;
    opacity: 0.9;
  }

  /* Filter animations */
  .place-card.fade-in {
    animation: fadeInUp 0.6s ease forwards;
  }

  .place-card.fade-out {
    animation: fadeOut 0.3s ease forwards;
  }

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

  @keyframes fadeOut {
    to {
      opacity: 0;
      transform: scale(0.8);
    }
  }

  /* Dark Mode Styles */
  body.dark-mode .places-container {
    background: #1a1a1a;
  }

  body.dark-mode .place-card {
    background: #2c2c2c;
    border: 1px solid #3a3a3a;
  }

  body.dark-mode .card-title {
    color: #e9ecef;
  }

  body.dark-mode .card-details {
    color: #adb5bd;
  }

  body.dark-mode .filter-btn {
    background: #2c2c2c;
    color: #adb5bd;
    border-color: #3a3a3a;
  }

  body.dark-mode .stats-section {
    background: linear-gradient(135deg, #2c2c2c, #3a3a3a);
  }

  @media (max-width: 768px) {
    .places-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }
    
    .places-hero {
      padding: 4rem 1rem;
    }
    
    .places-container {
      padding: 2rem 1rem;
    }
    
    .division-filters {
      gap: 0.5rem;
    }
    
    .filter-btn {
      padding: 0.5rem 1rem;
      font-size: 0.9rem;
    }
  }
</style>

<?php
$divisions = [
  [
    'id' => 'dhaka',
    'name' => 'Dhaka',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/37/Lalbagh_Fort%2C_Dhaka.jpg/800px-Lalbagh_Fort%2C_Dhaka.jpg',
    'description' => 'Capital city with rich history and culture'
  ],
  [
    'id' => 'chittagong',
    'name' => 'Chittagong',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg',
    'description' => 'Home to Cox\'s Bazar and hill tracts'
  ],
  [
    'id' => 'sylhet',
    'name' => 'Sylhet',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/1e/Sreemangal_tea_garden_2017-08-20.jpg',
    'description' => 'Tea gardens and natural beauty'
  ],
  [
    'id' => 'rajshahi',
    'name' => 'Rajshahi',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/42/Paharpur_Buddhist_Bihar.jpg',
    'description' => 'Ancient archaeological sites'
  ],
  [
    'id' => 'khulna',
    'name' => 'Khulna',
    'image' => 'https://sundarbantravel.com/wp-content/uploads/2023/02/River_in_Sundarban.jpg',
    'description' => 'Gateway to the Sundarbans'
  ],
  [
    'id' => 'barisal',
    'name' => 'Barisal',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Floating_Guava_Market_at_Barisal.jpg/800px-Floating_Guava_Market_at_Barisal.jpg',
    'description' => 'Venice of Bengal with floating markets'
  ],
  [
    'id' => 'rangpur',
    'name' => 'Rangpur',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Tajhat_Palace_Museum.jpg/800px-Tajhat_Palace_Museum.jpg',
    'description' => 'Historical palaces and archaeological sites'
  ],
  [
    'id' => 'mymensingh',
    'name' => 'Mymensingh',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Mymensingh_Museum.jpg/800px-Mymensingh_Museum.jpg',
    'description' => 'Rich cultural heritage and natural beauty'
  ]
];

$places = [
  // Dhaka Division
  [
    'id' => 1,
    'name' => 'Lalbagh Fort',
    'duration' => '1 Day',
    'price' => 500,
    'division' => 'dhaka',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/37/Lalbagh_Fort%2C_Dhaka.jpg/800px-Lalbagh_Fort%2C_Dhaka.jpg'
  ],
  [
    'id' => 2,
    'name' => 'Ahsan Manzil',
    'duration' => '1 Day',
    'price' => 300,
    'division' => 'dhaka',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Ahsan_Manzil_Dhaka_Bangladesh.jpg/800px-Ahsan_Manzil_Dhaka_Bangladesh.jpg'
  ],
  [
    'id' => 3,
    'name' => 'Sonargaon',
    'duration' => '1 Day',
    'price' => 800,
    'division' => 'dhaka',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e5/Folk_Art_and_Crafts_Museum%2C_Sonargaon.jpg/800px-Folk_Art_and_Crafts_Museum%2C_Sonargaon.jpg'
  ],
  // Chittagong Division
  [
    'id' => 4,
    'name' => "Cox's Bazar",
    'duration' => '3 Days',
    'price' => 4500,
    'division' => 'chittagong',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg'
  ],
  [
    'id' => 5,
    'name' => 'Bandarban',
    'duration' => '3 Days',
    'price' => 6000,
    'division' => 'chittagong',
    'image' => 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrfKrjXKId8O-EqVuAurYfalgeAHOBT4iwE3HysRUhaPPb_o35nrpRfoPTVOjwZwzwvtr6JzxtWShTdeP1uXaQwvyHbRbtooQ67bwWtlOgCP13sSh_XuGYRtJVRuY1syKC62EAA=s680-w680-h510-rw'
  ],
  [
    'id' => 6,
    'name' => 'Rangamati',
    'duration' => '3 Days',
    'price' => 2000,
    'division' => 'chittagong',
    'image' => 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqMMZ83iuq1LLPmgkmXDrnyMZZyJC4zbRHkxK3BmfwfSL2jL3dTVTkTN9WDLgDCIJ4KAhOyPbs2Uk0V5UP7ScaD02PzxlAdeHKS7hse5ACNYMenq0JeBBQPfCZt6uf81L3P88CT=s680-w680-h510-rw'
  ],
  [
    'id' => 7,
    'name' => 'Sajek Valley',
    'duration' => '2 Days',
    'price' => 2500,
    'division' => 'chittagong',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Sajek_Valley_Bangladesh.jpg/800px-Sajek_Valley_Bangladesh.jpg'
  ],
  [
    'id' => 8,
    'name' => 'Kaptai Lake',
    'duration' => '3 Day',
    'price' => 250,
    'division' => 'chittagong',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/Kaptai_Lake_05.jpg/1024px-Kaptai_Lake_05.jpg'
  ],
  [
    'id' => 9,
    'name' => 'Khagrachari',
    'duration' => '2 Day',
    'price' => 4000,
    'division' => 'chittagong',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Midway_to_Konglak_Hill%2C_Khagrachari%2C_Bangladesh.jpg/800px-Midway_to_Konglak_Hill%2C_Khagrachari%2C_Bangladesh.jpg'
  ],
  // Sylhet Division
  [
    'id' => 10,
    'name' => 'Sreemangal',
    'duration' => '2 Days',
    'price' => 2500,
    'division' => 'sylhet',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/1e/Sreemangal_tea_garden_2017-08-20.jpg'
  ],
  [
    'id' => 11,
    'name' => 'Sylhet City',
    'duration' => '2 Days',
    'price' => 1000,
    'division' => 'sylhet',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/77/Keane_Bridge_and_Ali_Amjad%27s_Clock%2C_Sylhet.jpg'
  ],
  [
    'id' => 12,
    'name' => 'Vulaganj',
    'duration' => '2 Days',
    'price' => 1800,
    'division' => 'sylhet',
    'image' => 'https://adarbepari.com/wp-content/uploads/2016/05/bholaganj-sadapathor-sylhet.jpg'
  ],
  [
    'id' => 13,
    'name' => 'Jaflong',
    'duration' => '2 Days',
    'price' => 2200,
    'division' => 'sylhet',
    'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZWP36lsPTPR-RFvtJoT27ZQQN2eSVTHnMpg&s'
  ],
  // Rajshahi Division
  [
    'id' => 14,
    'name' => 'Paharpur',
    'duration' => '1 Day',
    'price' => 1000,
    'division' => 'rajshahi',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/42/Paharpur_Buddhist_Bihar.jpg'
  ],
  [
    'id' => 15,
    'name' => 'Puthia Temple Complex',
    'duration' => '1 Day',
    'price' => 800,
    'division' => 'rajshahi',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Puthia_Temple_Complex.jpg/800px-Puthia_Temple_Complex.jpg'
  ],
  [
    'id' => 16,
    'name' => 'Varendra Research Museum',
    'duration' => '1 Day',
    'price' => 500,
    'division' => 'rajshahi',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Varendra_Research_Museum.jpg/800px-Varendra_Research_Museum.jpg'
  ],
  // Khulna Division
  [
    'id' => 17,
    'name' => 'Sundarban',
    'duration' => '2 Days',
    'price' => 3500,
    'division' => 'khulna',
    'image' => 'https://sundarbantravel.com/wp-content/uploads/2023/02/River_in_Sundarban.jpg'
  ],
  [
    'id' => 18,
    'name' => 'Sixty Dome Mosque',
    'duration' => '1 Day',
    'price' => 600,
    'division' => 'khulna',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Sixty_Dome_Mosque_02.jpg/800px-Sixty_Dome_Mosque_02.jpg'
  ],
  [
    'id' => 19,
    'name' => 'Kuakata Beach',
    'duration' => '2 Days',
    'price' => 2800,
    'division' => 'khulna',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Kuakata_beach_sunset.jpg/800px-Kuakata_beach_sunset.jpg'
  ],
  // Barisal Division
  [
    'id' => 20,
    'name' => 'Floating Guava Market',
    'duration' => '1 Day',
    'price' => 800,
    'division' => 'barisal',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Floating_Guava_Market_at_Barisal.jpg/800px-Floating_Guava_Market_at_Barisal.jpg'
  ],
  [
    'id' => 21,
    'name' => 'Durga Sagar',
    'duration' => '1 Day',
    'price' => 600,
    'division' => 'barisal',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d8/Durga_Sagar_Barisal.jpg/800px-Durga_Sagar_Barisal.jpg'
  ],
  // Rangpur Division
  [
    'id' => 22,
    'name' => 'Tajhat Palace',
    'duration' => '1 Day',
    'price' => 700,
    'division' => 'rangpur',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Tajhat_Palace_Museum.jpg/800px-Tajhat_Palace_Museum.jpg'
  ],
  [
    'id' => 23,
    'name' => 'Kantajew Temple',
    'duration' => '1 Day',
    'price' => 500,
    'division' => 'rangpur',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Kantanagar_Temple.jpg/800px-Kantanagar_Temple.jpg'
  ],
  // Mymensingh Division
  [
    'id' => 24,
    'name' => 'Mymensingh Museum',
    'duration' => '1 Day',
    'price' => 400,
    'division' => 'mymensingh',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Mymensingh_Museum.jpg/800px-Mymensingh_Museum.jpg'
  ],
  [
    'id' => 25,
    'name' => 'Brahmaputra River',
    'duration' => '1 Day',
    'price' => 600,
    'division' => 'mymensingh',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Brahmaputra_River_in_Mymensingh.jpg/800px-Brahmaputra_River_in_Mymensingh.jpg'
  ]
];
?>

<section class="places-hero">
  <div class="hero-content">
    <h1 class="hero-title">Explore Bangladesh</h1>
    <p class="hero-subtitle">
      Discover amazing destinations across all 8 divisions of Bangladesh. From pristine beaches to lush green hills, ancient temples to modern cities.
    </p>
    <div class="hero-stats">
      <div class="stat-item">
        <span class="stat-number">8</span>
        <span class="stat-label">Divisions</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">25+</span>
        <span class="stat-label">Amazing Places</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">🇧🇩</span>
        <span class="stat-label">Beautiful Bangladesh</span>
      </div>
    </div>
  </div>
</section>

<div class="places-container">
  <!-- Division Filter Buttons -->
  <div class="division-filters">
    <button class="filter-btn active" data-division="all">All Places</button>
    @foreach ($divisions as $division)
      <button class="filter-btn" data-division="{{ $division['id'] }}">{{ $division['name'] }}</button>
    @endforeach
  </div>

  <!-- Statistics Section -->
  <div class="stats-section">
    <h2 style="font-size: 2rem; margin-bottom: 1rem;">Travel Statistics</h2>
    <p style="opacity: 0.9;">Explore Bangladesh's rich diversity</p>
    <div class="stats-grid">
      <div class="stat-item">
        <div class="stat-number">8</div>
        <div class="stat-label">Divisions</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">25+</div>
        <div class="stat-label">Destinations</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">64</div>
        <div class="stat-label">Districts</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">∞</div>
        <div class="stat-label">Adventures</div>
      </div>
    </div>
  </div>

  <!-- Places Grid -->
  <div class="places-grid" id="places-grid">
    @foreach ($places as $place)
      <div class="place-card fade-in" data-division="{{ $place['division'] }}">
        <div class="image-container">
          <img src="{{ $place['image'] }}" alt="{{ $place['name'] }}" class="place-image">
          <div class="price-badge">৳{{ number_format($place['price']) }}</div>
          <div class="image-overlay">
            <div style="text-align: center; color: white;">
              <h4 style="margin-bottom: 0.5rem;">{{ $place['name'] }}</h4>
              <p style="opacity: 0.9;">{{ ucfirst($place['division']) }} Division</p>
            </div>
          </div>
        </div>
        <div class="card-content">
          <span class="division-badge">📍 {{ ucfirst($place['division']) }}</span>
          <h3 class="card-title">{{ $place['name'] }}</h3>
          <div class="card-details">
            <div class="detail-item">
              <span>⏱️</span>
              <span>{{ $place['duration'] }}</span>
            </div>
            <div class="detail-item">
              <span>💰</span>
              <span>৳{{ number_format($place['price']) }}/person</span>
            </div>
          </div>
          
          <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="place_id" value="{{ $place['id'] }}">
            <button type="submit" class="add-to-cart-btn">
              🛒 Add to Cart
            </button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const placeCards = document.querySelectorAll('.place-card');

    // Division names mapping
    const divisionNames = {
      'dhaka': 'Dhaka',
      'chittagong': 'Chittagong',
      'sylhet': 'Sylhet',
      'rajshahi': 'Rajshahi',
      'khulna': 'Khulna',
      'barisal': 'Barisal',
      'rangpur': 'Rangpur',
      'mymensingh': 'Mymensingh'
    };

    // Filter functionality with animations
    function filterPlaces(selectedDivision) {
      placeCards.forEach((card, index) => {
        const cardDivision = card.getAttribute('data-division');
        
        if (selectedDivision === 'all' || cardDivision === selectedDivision) {
          card.style.display = 'block';
          setTimeout(() => {
            card.classList.remove('fade-out');
            card.classList.add('fade-in');
          }, index * 100);
        } else {
          card.classList.remove('fade-in');
          card.classList.add('fade-out');
          setTimeout(() => {
            card.style.display = 'none';
          }, 300);
        }
      });
    }

    // Add click event listeners to filter buttons
    filterBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        // Remove active class from all buttons
        filterBtns.forEach(b => b.classList.remove('active'));
        
        // Add active class to clicked button
        this.classList.add('active');
        
        // Filter places
        const selectedDivision = this.getAttribute('data-division');
        filterPlaces(selectedDivision);
        
        // Smooth scroll to places grid
        document.getElementById('places-grid').scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      });
    });

    // Enhanced add to cart functionality
    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
      btn.addEventListener('click', function(e) {
        const originalText = this.innerHTML;
        
        // Visual feedback
        this.innerHTML = '✅ Added!';
        this.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
        
        // Create success animation
        this.style.transform = 'scale(0.95)';
        setTimeout(() => {
          this.style.transform = 'scale(1)';
        }, 150);
        
        // Reset after 2 seconds
        setTimeout(() => {
          this.innerHTML = originalText;
          this.style.background = 'linear-gradient(135deg, #00695c, #4caf50)';
        }, 2000);
      });
    });

    // Initialize AOS animations
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
      });
    }
  });
</script>

<style>
  /* Mobile responsiveness enhancements */
  @media (max-width: 768px) {
    .places-hero {
      padding: 4rem 1rem;
      min-height: 80vh;
    }

    .hero-title {
      font-size: 2.5rem;
    }

    .hero-subtitle {
      font-size: 1.1rem;
    }

    .hero-stats {
      flex-direction: column;
      gap: 1.5rem;
    }

    .stat-item {
      padding: 1rem;
    }

    .stat-number {
      font-size: 2rem;
    }

    .division-filters {
      gap: 0.5rem;
    }

    .filter-btn {
      padding: 8px 16px;
      font-size: 12px;
    }

    .places-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }

    .places-container {
      padding: 3rem 1rem;
    }
  }

  @media (max-width: 480px) {
    .hero-title {
      font-size: 2rem;
    }

    .hero-subtitle {
      font-size: 1rem;
    }
  }
</style>

<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
@endsection
