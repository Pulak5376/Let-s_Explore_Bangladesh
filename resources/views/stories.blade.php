@extends('layouts.app')

@section('title', 'Stories')

@section('content')

<!-- Immersive Hero Section -->
<section class="hero-stories">
  <div class="hero-background">
    <div class="hero-slides">
      <div class="hero-slide active" data-bg="https://sundarbantravel.com/wp-content/uploads/2023/02/River_in_Sundarban.jpg"></div>
      <div class="hero-slide" data-bg="https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg"></div>
      <div class="hero-slide" data-bg="https://th.bing.com/th/id/OIP.s2MqHWn2L7W8SV0dE4TrEAHaEK?w=267&h=180&c=7&r=0&o=7&pid=1.7&rm=3"></div>
      <div class="hero-slide" data-bg="https://images.hive.blog/768x0/https://cdn.pixabay.com/photo/2018/03/20/14/00/sea-3243357_960_720.jpg"></div>
    </div>
    <div class="hero-overlay"></div>
  </div>
  

    <!-- Story Create Form -->
    <div class="story-form-container" style="margin-bottom: 40px;">
      <form method="POST" action="{{ route('stories.store') }}">
        @csrf
        <div>
          <input type="text" name="title" placeholder="Title" required style="width: 100%; padding: 8px; margin-bottom: 8px;" />
        </div>
        <div>
          <textarea name="content" placeholder="Share your story..." required style="width: 100%; padding: 8px; margin-bottom: 8px;"></textarea>
        </div>
        <button type="submit" style="padding: 8px 16px; background: #2ecc40; color: #fff; border: none; border-radius: 4px;">Post Story</button>
      </form>
    </div>

    }

    .hero-slides {
      position: relative;
      width: 100%;
      height: 100%;
    }

    .hero-slide {
      position: absolute;
      inset: 0;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      opacity: 0;
      transition: opacity 2s ease-in-out;
      animation: kenBurns 15s ease-in-out infinite;
    }

    .hero-slide.active {
      opacity: 1;
    }

    @keyframes kenBurns {
      0%, 100% { transform: scale(1) rotate(0deg); }
      25% { transform: scale(1.05) rotate(0.5deg); }
      50% { transform: scale(1.1) rotate(0deg); }
      75% { transform: scale(1.05) rotate(-0.5deg); }
    }

    .hero-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, 
        rgba(0, 105, 92, 0.7) 0%, 
        rgba(0, 105, 92, 0.5) 50%, 
        rgba(0, 0, 0, 0.6) 100%);
      z-index: 2;
    }

    .hero-content {
      position: relative;
      z-index: 3;
      text-align: center;
      color: white;
      max-width: 1000px;
      padding: 0 40px;
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      padding: 12px 24px;
      border-radius: 50px;
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 32px;
      animation: fadeInUp 1s ease-out 0.5s both;
      position: relative;
      overflow: hidden;
    }

    .badge-pulse {
      position: absolute;
      left: 16px;
      width: 8px;
      height: 8px;
      background: #00ff88;
      border-radius: 50%;
      animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
      0%, 100% { 
        opacity: 1; 
        transform: scale(1); 
        box-shadow: 0 0 0 0 rgba(0, 255, 136, 0.7);
      }
      50% { 
        opacity: 0.8; 
        transform: scale(1.2); 
        box-shadow: 0 0 0 10px rgba(0, 255, 136, 0);
      }
    }

    .hero-title {
      margin-bottom: 32px;
      line-height: 1.1;
    }

    .title-word {
      display: inline-block;
      font-size: clamp(3rem, 8vw, 5rem);
      font-weight: 800;
      margin: 0 16px;
      opacity: 0;
      transform: translateY(50px);
      animation: wordReveal 1s ease-out forwards;
    }

    .title-word:nth-child(1) { animation-delay: 0.2s; }
    .title-word:nth-child(2) { animation-delay: 0.4s; }
    .title-word:nth-child(3) { animation-delay: 0.6s; }

    @keyframes wordReveal {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .gradient-text {
      background: linear-gradient(135deg, #ffd700 0%, #ff6b35 50%, #f7931e 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      filter: drop-shadow(0 4px 12px rgba(255, 215, 0, 0.3));
    }

    .hero-subtitle {
      display: flex;
      flex-direction: column;
      gap: 8px;
      font-size: clamp(1.2rem, 3vw, 1.6rem);
      font-weight: 400;
      opacity: 0.9;
      margin-bottom: 48px;
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
    }

    .subtitle-line {
      display: block;
      opacity: 0;
      transform: translateY(30px);
      animation: slideInUp 1s ease-out forwards;
    }

    .subtitle-line:nth-child(1) { animation-delay: 0.8s; }
    .subtitle-line:nth-child(2) { animation-delay: 1s; }

    @keyframes slideInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .hero-stats {
      display: flex;
      justify-content: center;
      gap: 60px;
      margin-bottom: 48px;
      flex-wrap: wrap;
    }

    .stat-item {
      text-align: center;
      opacity: 0;
      transform: translateY(30px);
      animation: statReveal 1s ease-out forwards;
    }

    @keyframes statReveal {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .stat-number {
      display: block;
      font-size: 2.5rem;
      font-weight: 700;
      color: #ffd700;
      margin-bottom: 8px;
      text-shadow: 0 2px 8px rgba(255, 215, 0, 0.3);
    }

    .stat-label {
      display: block;
      font-size: 1rem;
      font-weight: 500;
      opacity: 0.8;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .hero-cta {
      display: flex;
      gap: 24px;
      justify-content: center;
      flex-wrap: wrap;
      opacity: 0;
      transform: translateY(30px);
      animation: ctaReveal 1s ease-out forwards;
      animation-delay: 1.6s;
    }

    @keyframes ctaReveal {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .cta-primary, .cta-secondary {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      padding: 18px 36px;
      border-radius: 50px;
      font-weight: 600;
      font-size: 16px;
      text-decoration: none;
      border: none;
      cursor: pointer;
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
    }

    .cta-primary {
      background: linear-gradient(135deg, #ffd700 0%, #ff6b35 100%);
      color: #1a1a1a;
      box-shadow: 0 8px 25px rgba(255, 215, 0, 0.3);
    }

    .cta-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(255, 215, 0, 0.4);
    }

    .cta-secondary {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      border: 2px solid rgba(255, 255, 255, 0.2);
      color: white;
    }

    .cta-secondary:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-3px);
    }

    .scroll-indicator {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 3;
      text-align: center;
      color: white;
      opacity: 0.8;
      animation: bounce 2s ease-in-out infinite;
    }

    .scroll-mouse {
      width: 24px;
      height: 40px;
      border: 2px solid rgba(255, 255, 255, 0.5);
      border-radius: 12px;
      margin: 0 auto 8px;
      position: relative;
    }

    .scroll-wheel {
      width: 4px;
      height: 8px;
      background: rgba(255, 255, 255, 0.8);
      border-radius: 2px;
      position: absolute;
      top: 6px;
      left: 50%;
      transform: translateX(-50%);
      animation: scrollWheel 2s ease-in-out infinite;
    }

    @keyframes scrollWheel {
      0%, 100% { top: 6px; opacity: 1; }
      50% { top: 20px; opacity: 0.3; }
    }

    @keyframes bounce {
      0%, 100% { transform: translateX(-50%) translateY(0); }
      50% { transform: translateX(-50%) translateY(-10px); }
    }

    .floating-particles {
      position: absolute;
      inset: 0;
      z-index: 2;
      pointer-events: none;
    }

    .particle {
      position: absolute;
      width: 4px;
      height: 4px;
      background: rgba(255, 215, 0, 0.6);
      border-radius: 50%;
      animation: float 6s ease-in-out infinite;
    }

    .particle:nth-child(1) {
      top: 20%;
      left: 10%;
      animation-delay: 0s;
      animation-duration: 8s;
    }

    .particle:nth-child(2) {
      top: 40%;
      right: 15%;
      animation-delay: 2s;
      animation-duration: 6s;
    }

    .particle:nth-child(3) {
      bottom: 30%;
      left: 20%;
      animation-delay: 4s;
      animation-duration: 7s;
    }

    .particle:nth-child(4) {
      top: 60%;
      right: 25%;
      animation-delay: 1s;
      animation-duration: 9s;
    }

    .particle:nth-child(5) {
      bottom: 20%;
      right: 30%;
      animation-delay: 3s;
      animation-duration: 5s;
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0) rotate(0deg);
        opacity: 0;
      }
      10%, 90% {
        opacity: 1;
      }
      50% {
        transform: translateY(-20px) rotate(180deg);
        opacity: 0.8;
      }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .hero-content {
        padding: 0 20px;
      }
      
      .title-word {
        margin: 0 8px;
        font-size: clamp(2rem, 12vw, 3rem);
      }
      
      .hero-stats {
        gap: 30px;
      }
      
      .stat-number {
        font-size: 2rem;
      }
      
      .hero-cta {
        flex-direction: column;
        align-items: center;
      }
      
      .cta-primary, .cta-secondary {
        width: 100%;
        max-width: 280px;
        justify-content: center;
      }
    }
    .social-feed {
      max-width: 100%;
      margin: 0;
      padding: 0;
    }

    .story-card {
      background: transparent;
      border: none;
      border-radius: 0;
      margin-bottom: 40px;
      box-shadow: none;
      transition: all 0.3s ease;
      animation: fadeInUp 0.6s ease both;
      overflow: visible;
      width: 100%;
    }

    .story-card:nth-child(1) { animation-delay: 0.0s; }
    .story-card:nth-child(2) { animation-delay: 0.1s; }
    .story-card:nth-child(3) { animation-delay: 0.2s; }
    .story-card:nth-child(4) { animation-delay: 0.3s; }
    .story-card:nth-child(5) { animation-delay: 0.4s; }
    .story-card:nth-child(6) { animation-delay: 0.5s; }
    .story-card:nth-child(7) { animation-delay: 0.6s; }
    .story-card:nth-child(8) { animation-delay: 0.7s; }

    .story-card:hover {
      box-shadow: none;
      transform: none;
    }

    .post-header {
      display: flex;
      align-items: center;
      padding: 20px 40px;
      border-bottom: 2px solid rgba(0, 106, 78, 0.1);
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
    }

    .avatar {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: linear-gradient(135deg, #00695c, #4caf50);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
      font-size: 24px;
      margin-right: 16px;
      border: 3px solid rgba(0, 106, 78, 0.2);
    }

    .post-info h3 {
      margin: 0;
      font-size: 22px;
      font-weight: 600;
      color: #1a1a1a;
    }

    .post-time {
      font-size: 16px;
      color: #65676b;
      margin-top: 4px;
    }

    .post-content {
      padding: 0;
      width: 100%;
    }

    .post-text {
      padding: 30px 40px 20px;
      font-size: 20px;
      line-height: 1.6;
      color: #1c1e21;
      margin: 0;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
    }

    .post-image {
      width: 100%;
      height: 60vh;
      object-fit: cover;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .post-image:hover {
      transform: scale(1.02);
    }

    .post-actions {
      padding: 20px 40px;
      border-top: 2px solid rgba(0, 106, 78, 0.1);
      border-bottom: 2px solid rgba(0, 106, 78, 0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      margin-bottom: 20px;
    }

    .action-buttons {
      display: flex;
      gap: 40px;
    }

    .action-btn {
      display: flex;
      align-items: center;
      gap: 12px;
      background: none;
      border: none;
      color: #65676b;
      font-size: 18px;
      cursor: pointer;
      padding: 12px 16px;
      border-radius: 8px;
      transition: all 0.2s ease;
      font-weight: 500;
    }

    .action-btn:hover {
      background: rgba(0, 106, 78, 0.05);
      color: #00695c;
      transform: scale(1.05);
    }

    .action-btn.liked {
      color: #e74c3c;
    }

    .action-btn.saved {
      color: #f39c12;
    }

    .likes-count {
      font-size: 18px;
      color: #65676b;
      font-weight: 600;
    }

    .location-tag {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(0, 106, 78, 0.15);
      color: #00695c;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 16px;
      font-weight: 600;
      margin: 20px 40px;
    }

    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(30px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .stories-section h1 {
      color: #00695c !important;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
      text-align: center;
      margin-bottom: 8px;
    }

    .stories-section p {
      color: #65676b !important;
      text-align: center;
      margin-bottom: 32px;
    }

    /* Dark Mode Styles */
    body.dark-mode {
      background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%) !important;
    }

    body.dark-mode .stories-section {
      background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%) !important;
    }

    body.dark-mode .story-card {
      background: transparent !important;
      border-color: transparent !important;
      box-shadow: none !important;
    }

    body.dark-mode .story-card:hover {
      box-shadow: none !important;
    }

    body.dark-mode .post-header {
      border-color: rgba(102, 187, 106, 0.3) !important;
      background: rgba(36, 37, 38, 0.95) !important;
    }

    body.dark-mode .post-text {
      background: rgba(36, 37, 38, 0.95) !important;
    }

    body.dark-mode .post-actions {
      border-color: rgba(102, 187, 106, 0.3) !important;
      background: rgba(36, 37, 38, 0.95) !important;
    }

    body.dark-mode .post-info h3 {
      color: #e4e6ea !important;
    }

    body.dark-mode .post-time {
      color: #b0b3b8 !important;
    }

    body.dark-mode .post-text {
      color: #e4e6ea !important;
    }

    body.dark-mode .post-actions {
      border-color: rgba(102, 187, 106, 0.15) !important;
    }

    body.dark-mode .action-btn {
      color: #b0b3b8 !important;
    }

    body.dark-mode .action-btn:hover {
      background: rgba(102, 187, 106, 0.1) !important;
      color: #66bb6a !important;
    }

    body.dark-mode .likes-count {
      color: #b0b3b8 !important;
    }

    body.dark-mode .stories-section h1 {
      color: #66bb6a !important;
    }

    body.dark-mode .stories-section p {
      color: #b0b3b8 !important;
    }

    body.dark-mode .location-tag {
      background: rgba(102, 187, 106, 0.2) !important;
      color: #66bb6a !important;
    }

    @media (max-width: 768px) {
      .stories-section {
        padding: 10px;
      }
      
      .social-feed {
        max-width: 100%;
      }
      
      .post-header {
        padding: 15px 20px;
      }
      
      .post-text {
        padding: 20px;
        font-size: 18px;
      }
      
      .post-actions {
        padding: 15px 20px;
      }
      
      .action-buttons {
        gap: 20px;
      }
      
      .action-btn {
        padding: 8px 12px;
        font-size: 16px;
      }
      
      .location-tag {
        margin: 15px 20px;
        font-size: 14px;
      }
      
      .post-image {
        height: 40vh;
      }
    }

    /* Floating Action Button */
    .fab {
      position: fixed;
      bottom: 100px;
      right: 30px;
      width: 60px;
      height: 60px;
      background: linear-gradient(135deg, #00695c, #d32f2f);
      border: none;
      border-radius: 50%;
      color: white;
      font-size: 24px;
      cursor: pointer;
      box-shadow: 0 4px 20px rgba(0, 105, 92, 0.4);
      transition: all 0.3s ease;
      z-index: 100;
    }

    .fab:hover {
      transform: scale(1.1);
      box-shadow: 0 6px 30px rgba(0, 105, 92, 0.6);
    }

    .fab:active {
      transform: scale(0.95);
    }

    /* Floating tooltip */
    .fab::before {
      content: 'Share Your Story';
      position: absolute;
      right: 70px;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(0, 0, 0, 0.8);
      color: white;
      padding: 8px 12px;
      border-radius: 6px;
      font-size: 14px;
      white-space: nowrap;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }

    .fab:hover::before {
      opacity: 1;
      visibility: visible;
      right: 75px;
    }

    /* Override chatbot positioning for stories page */
    .chatbot-toggle {
      right: 30px !important;
      bottom: 20px !important;
      z-index: 1001 !important;
    }

    #chatbot-container {
      right: 30px !important;
      bottom: 90px !important;
      z-index: 1000 !important;
    }

    /* Mobile responsive override */
    @media (max-width: 768px) {
      .fab {
        bottom: 80px;
        right: 20px;
      }
      
      .chatbot-toggle {
        right: 20px !important;
        bottom: 10px !important;
      }

      #chatbot-container {
        right: 10px !important;
        bottom: 70px !important;
        width: calc(100vw - 20px) !important;
        height: calc(100vh - 120px) !important;
      }
    }
  </style>

    <div class="social-feed">
    <div style="text-align: center; margin-bottom: 40px;">
      <h1 style="font-size: 28px; color: #333;">🌍 Bangladesh Travel Stories</h1>
      <p style="font-size: 16px; color: #666;">Share your adventures and discover amazing travel experiences</p>
    </div>

    @php
      $stories = [
        [
          'img' => 'https://sundarbantravel.com/wp-content/uploads/2023/02/River_in_Sundarban.jpg',
          'title' => 'Into the Wild: Sundarban Adventure',
          'text' => 'Just returned from an incredible journey through the Sundarban mangroves! 🐅 Spotted fresh tiger tracks and witnessed the most breathtaking sunset over the Bengal waters. The silence of the wilderness is truly magical.',
          'author' => 'Farhan Rahman',
          'location' => 'Sundarban',
          'time' => '2 hours ago',
          'likes' => 127,
          'avatar' => 'FR'
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg',
          'title' => 'Paradise Found: Saint Martin Island',
          'text' => 'Camping under the stars on Saint Martin beach was pure bliss! 🌟 Fresh seafood, crystal clear waters, and the Milky Way stretched across the entire sky. This little piece of paradise is calling me back already! 🏝️',
          'author' => 'Nusrat Jahan',
          'location' => 'Saint Martin Island',
          'time' => '5 hours ago',
          'likes' => 89,
          'avatar' => 'NJ'
        ],
        [
          'img' => 'https://th.bing.com/th/id/OIP.s2MqHWn2L7W8SV0dE4TrEAHaEK?w=267&h=180&c=7&r=0&o=7&pid=1.7&rm=3',
          'title' => 'Above the Clouds: Sajek Valley',
          'text' => 'Woke up literally above the clouds this morning! ☁️ Sajek Valley never fails to amaze me. The sunrise painted the sky in the most incredible shades of orange and pink. Already planning my next trip here!',
          'author' => 'Tanvir Alam',
          'location' => 'Sajek Valley',
          'time' => '1 day ago',
          'likes' => 203,
          'avatar' => 'TA'
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/6/66/Boat_in_river%2C_Bangladesh.jpg',
          'title' => 'Crystal Waters: Jaflong Adventure',
          'text' => 'Crossed the crystal-clear Piyain River on a traditional bamboo raft today! 🚣‍♀️ The tea gardens of Jaflong are absolutely stunning. Collected some beautiful river stones and made friends with local fishermen. What a day!',
          'author' => 'Shama Islam',
          'location' => 'Jaflong, Sylhet',
          'time' => '2 days ago',
          'likes' => 156,
          'avatar' => 'SI'
        ],
        [
          'img' => 'https://th.bing.com/th/id/OIP.4BFQViNLOulToeA3-AyEsAHaEK?w=314&h=180&c=7&r=0&o=7&pid=1.7&rm=3',
          'title' => 'Ancient Wonders: Paharpur Heritage',
          'text' => 'Exploring the ruins of Somapura Mahavihara was like traveling back 1300 years! 🏛️ The intricate terracotta designs and massive Buddhist monastery remains are absolutely mind-blowing. History comes alive here!',
          'author' => 'Rafiq Hasan',
          'location' => 'Paharpur, Naogaon',
          'time' => '3 days ago',
          'likes' => 94,
          'avatar' => 'RH'
        ],
        [
          'img' => 'https://images.hive.blog/768x0/https://cdn.pixabay.com/photo/2018/03/20/14/00/sea-3243357_960_720.jpg',
          'title' => 'Endless Beauty: Cox Bazar Beach',
          'text' => 'Nothing beats a sunrise walk on the worlds longest natural beach! 🌅 The sound of waves crashing and the endless golden sand stretching to the horizon is pure therapy. Cox Bazar, you have my heart! ❤️',
          'author' => 'Laila Chowdhury',
          'location' => 'Cox Bazar',
          'time' => '4 days ago',
          'likes' => 312,
          'avatar' => 'LC'
        ],
        [
          'img' => 'https://cdn-jlkmh.nitrocdn.com/JBpvnBXJHwcvYfacMymVcdLoTRonnoqY/assets/images/optimized/rev-a1adf00/royalbengaltours.com/wp-content/uploads/2019/08/A-glimpse-into-the-lives-of-tea-workers-in-Sreemangal-Bangladesh.webp',
          'title' => 'Tea Garden Dreams: Srimangal',
          'text' => 'Cycling through endless tea gardens and sipping the famous seven-layer tea! 🍃 Met some amazing tea workers who shared their stories. The lush green landscapes of Srimangal are absolutely therapeutic! 🚴‍♀️',
          'author' => 'Mehzabin Karim',
          'location' => 'Srimangal',
          'time' => '1 week ago',
          'likes' => 178,
          'avatar' => 'MK'
        ],
        [
          'img' => 'https://www.travelmate.com.bd/wp-content/uploads/2015/07/Qhseck8.jpg.webp',
          'title' => 'Hilltop Serenity: Bandarban Heights',
          'text' => 'Hiking up Nilgiri was challenging but so worth it! 🥾 Standing above the clouds with the whole valley spread below was an unforgettable experience. The tribal villages and their warm hospitality made this trip extra special! 🏔️',
          'author' => 'Arif Mahmud',
          'location' => 'Bandarban',
          'time' => '1 week ago',
          'likes' => 245,
          'avatar' => 'AM'
        ],
      ];
    @endphp


    @foreach ($stories as $story)
      <div class="story-card">
        <!-- Post Header -->
        <div class="post-header">
          <div class="avatar">{{ $story->user->name[0] ?? '?' }}</div>
          <div class="post-info">
            <h3>{{ $story->user->name ?? 'Anonymous' }}</h3>
            <div class="post-time">{{ $story->created_at->diffForHumans() }}</div>
          </div>
        </div>

        <!-- Post Content -->
        <div class="post-content">
          <p class="post-text">{{ $story->content }}</p>
        </div>

        <!-- Post Actions -->
        <div class="post-actions">
          <form method="POST" action="{{ route('stories.destroy', $story->id) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="action-btn" style="color: #e74c3c;">Delete</button>
          </form>
        </div>
      </div>
    @endforeach
  </div>

  <script>
    // Hero Background Slideshow
    function initHeroSlideshow() {
      const slides = document.querySelectorAll('.hero-slide');
      let currentSlide = 0;
      
      // Set initial backgrounds
      slides.forEach((slide, index) => {
        const bgUrl = slide.getAttribute('data-bg');
        slide.style.backgroundImage = `url(${bgUrl})`;
      });
      
      function nextSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
      }
      
      // Change slide every 5 seconds
      setInterval(nextSlide, 5000);
    }

    // Counter Animation
    function animateCounters() {
      const counters = document.querySelectorAll('.stat-number[data-count]');
      
      counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000; // 2 seconds
        const increment = target / (duration / 16); // 60fps
        let current = 0;
        
        const timer = setInterval(() => {
          current += increment;
          if (current >= target) {
            current = target;
            clearInterval(timer);
          }
          
          // Format large numbers
          if (target >= 1000) {
            counter.textContent = Math.floor(current).toLocaleString();
          } else {
            counter.textContent = Math.floor(current);
          }
        }, 16);
      });
    }

    // Hero CTA Interactions
    function initHeroCTA() {
      const primaryCTA = document.querySelector('.cta-primary');
      const secondaryCTA = document.querySelector('.cta-secondary');
      
      primaryCTA.addEventListener('click', function() {
        // Smooth scroll to stories section
        document.querySelector('.stories-section').scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
        
        // Show create story modal (placeholder)
        setTimeout(() => {
          alert('🌟 Ready to share your Bangladesh adventure?\n\nFeature coming soon - you\'ll be able to:\n📸 Upload stunning photos\n📝 Write your travel story\n📍 Tag amazing locations\n🤝 Connect with fellow adventurers');
        }, 800);
      });
      
      secondaryCTA.addEventListener('click', function() {
        // Smooth scroll to stories
        document.querySelector('.stories-section').scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      });
    }

    // Parallax Effect for Hero
    function initParallax() {
      window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const heroHeight = document.querySelector('.hero-stories').offsetHeight;
        
        if (scrolled < heroHeight) {
          const parallaxSpeed = scrolled * 0.5;
          document.querySelector('.hero-background').style.transform = `translateY(${parallaxSpeed}px)`;
          
          // Fade effect
          const opacity = 1 - (scrolled / heroHeight);
          document.querySelector('.hero-content').style.opacity = opacity;
        }
      });
    }

    // Initialize all hero functions
    document.addEventListener('DOMContentLoaded', function() {
      initHeroSlideshow();
      initHeroCTA();
      initParallax();
      
      // Start counter animation after a delay
      setTimeout(animateCounters, 1000);
    });

    // Event delegation for action buttons
    document.addEventListener('click', function(e) {
      if (e.target.closest('.action-btn')) {
        const button = e.target.closest('.action-btn');
        const action = button.getAttribute('data-action');
        const index = button.getAttribute('data-index');
        
        switch(action) {
          case 'like':
            toggleLike(button, index);
            break;
          case 'comment':
            showComments(index);
            break;
          case 'share':
            sharePost(index);
            break;
          case 'save':
            toggleSave(button, index);
            break;
        }
      }
    });

    // Like functionality
    function toggleLike(button, index) {
      const likeIcon = button.querySelector('.like-icon');
      const likeText = button.querySelector('.like-text');
      const likesCountEl = document.getElementById('likes-' + index);
      const currentLikes = parseInt(likesCountEl.textContent);
      
      if (button.classList.contains('liked')) {
        button.classList.remove('liked');
        likeIcon.textContent = '❤️';
        likeText.textContent = 'Like';
        likesCountEl.textContent = (currentLikes - 1) + ' likes';
      } else {
        button.classList.add('liked');
        likeIcon.textContent = '❤️';
        likeText.textContent = 'Liked';
        likesCountEl.textContent = (currentLikes + 1) + ' likes';
        
        // Heart animation
        button.style.transform = 'scale(1.2)';
        setTimeout(function() {
          button.style.transform = 'scale(1)';
        }, 200);
      }
    }

    // Save functionality
    function toggleSave(button, index) {
      const saveIcon = button.querySelector('.save-icon');
      const saveText = button.querySelector('.save-text');
      
      if (button.classList.contains('saved')) {
        button.classList.remove('saved');
        saveIcon.textContent = '🔖';
        saveText.textContent = 'Save';
      } else {
        button.classList.add('saved');
        saveIcon.textContent = '📌';
        saveText.textContent = 'Saved';
      }
    }

    // Comment functionality
    function showComments(index) {
      alert('Comments feature coming soon! 💬');
    }

    // Share functionality
    function sharePost(index) {
      if (navigator.share) {
        navigator.share({
          title: 'Amazing Bangladesh Travel Story',
          text: 'Check out this incredible travel story from Bangladesh!',
          url: window.location.href
        });
      } else {
        // Fallback for browsers that don't support Web Share API
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(function() {
          alert('Link copied to clipboard! 📤');
        });
      }
    }

    // Image click to zoom
    document.querySelectorAll('.post-image').forEach(function(img) {
      img.addEventListener('click', function() {
        if (this.style.position === 'fixed') {
          // Close zoom
          this.style.position = '';
          this.style.top = '';
          this.style.left = '';
          this.style.width = '';
          this.style.height = '';
          this.style.zIndex = '';
          this.style.objectFit = 'cover';
          this.style.cursor = 'pointer';
          this.style.transform = '';
          document.body.style.overflow = '';
        } else {
          // Open zoom
          this.style.position = 'fixed';
          this.style.top = '50%';
          this.style.left = '50%';
          this.style.transform = 'translate(-50%, -50%)';
          this.style.width = '90vw';
          this.style.height = '90vh';
          this.style.zIndex = '1000';
          this.style.objectFit = 'contain';
          this.style.cursor = 'zoom-out';
          document.body.style.overflow = 'hidden';
        }
      });
    });
  </script>

  <!-- Floating Action Button -->
  <button class="fab" data-action="create-post">
    ✏️
  </button>

  <script>
    // Create new post functionality
    document.querySelector('.fab').addEventListener('click', function() {
      alert('🌟 Share your amazing Bangladesh travel story!\n\nFeature coming soon - you\'ll be able to:\n📸 Upload photos\n📝 Write your adventure\n📍 Tag locations\n🤝 Connect with fellow travelers');
    });
  </script>
</section>
@endsection
