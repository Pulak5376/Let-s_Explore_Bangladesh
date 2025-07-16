@extends('layouts.app')

@section('title', 'Stories')

@section('content')
<section class="stories-section" style="padding: 40px; background: linear-gradient(135deg, #e8f5e8 0%, #f1f8e9 50%, #e8f5e8 100%); min-height: 100vh;">
  <style>
    .story-card {
      background: linear-gradient(135deg, #f1f8e9 0%, #e8f5e8 100%);
      border: 2px solid rgba(102, 187, 106, 0.2);
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(46, 125, 50, 0.15);
      transition: all 0.3s ease;
      animation: fadeInUp 1s ease both;
    }

    .story-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 35px rgba(46, 125, 50, 0.25);
      border-color: rgba(102, 187, 106, 0.3);
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
      color: #2e7d32 !important;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
    }

    .stories-section p {
      color: #388e3c !important;
    }

    .story-card h3 {
      color: #2e7d32 !important;
      font-weight: 600;
    }

    .story-card p {
      color: #558b2f !important;
    }

    /* Dark Mode Styles */
    body.dark-mode {
      background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%) !important;
    }

    body.dark-mode .stories-section {
      background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%) !important;
    }

    body.dark-mode .stories-section h1 {
      color: #81c784 !important;
    }

    body.dark-mode .stories-section > div p {
      color: #b0bec5 !important;
    }

    body.dark-mode .story-card {
      background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%) !important;
      border-color: rgba(102, 187, 106, 0.3) !important;
      box-shadow: 0 8px 25px rgba(76, 175, 80, 0.2) !important;
    }

    body.dark-mode .story-card:hover {
      box-shadow: 0 15px 35px rgba(76, 175, 80, 0.3) !important;
      border-color: rgba(102, 187, 106, 0.4) !important;
    }

    body.dark-mode .story-card h3 {
      color: #66bb6a !important;
    }

    body.dark-mode .story-card p {
      color: #a5d6a7 !important;
    }

    body.dark-mode .story-card div[style*="color: #888"] {
      color: #90a4ae !important;
    }

    @media (max-width: 768px) {
      .stories-section {
        padding: 20px;
      }
    }
  </style>

  <div style="text-align: center; margin-bottom: 30px;">
    <h1 style="font-size: 36px; color: #333;">Travel Stories</h1>
    <p style="font-size: 18px; color: #666;">Read inspiring stories from travelers exploring Bangladesh.</p>
  </div>

  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
    @php
      $stories = [
        [
          'img' => 'https://sundarbantravel.com/wp-content/uploads/2023/02/River_in_Sundarban.jpg',
          'title' => 'Into the Wild: Sundarban Adventure',
          'text' => 'Cruising through the mangrove labyrinth, I spotted a Royal Bengal Tiger’s paw print on the muddy bank...',
          'author' => 'Farhan Rahman'
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg',
          'title' => 'A Night Under the Stars: Saint Martin’s',
          'text' => 'We camped on the beach, grilled fresh fish, and watched the Milky Way stretch across the sky...',
          'author' => 'Nusrat Jahan'
        ],
        [
          'img' => 'https://th.bing.com/th/id/OIP.s2MqHWn2L7W8SV0dE4TrEAHaEK?w=267&h=180&c=7&r=0&o=7&pid=1.7&rm=3',
          'title' => 'Above the Clouds: Sajek Valley',
          'text' => 'Waking up to a sea of clouds below our cottage was surreal...',
          'author' => 'Tanvir Alam'
        ],
        [
          'img' => 'https://upload.wikimedia.org/wikipedia/commons/6/66/Boat_in_river%2C_Bangladesh.jpg',
          'title' => 'River Stones: Jaflong',
          'text' => 'We crossed the crystal-clear river on a bamboo raft and wandered through endless tea gardens...',
          'author' => 'Shama Islam'
        ],
        [
          'img' => 'https://th.bing.com/th/id/OIP.4BFQViNLOulToeA3-AyEsAHaEK?w=314&h=180&c=7&r=0&o=7&pid=1.7&rm=3',
          'title' => 'Echoes of History: Paharpur Ruins',
          'text' => 'Walking among the ancient bricks of Somapura Mahavihara...',
          'author' => 'Rafiq Hasan'
        ],
        [
          'img' => 'https://images.hive.blog/768x0/https://cdn.pixabay.com/photo/2018/03/20/14/00/sea-3243357_960_720.jpg',
          'title' => 'Waves and Wonders: Cox\'s Bazar',
          'text' => 'The endless stretch of golden sand and the roar of the Bay of Bengal...',
          'author' => 'Laila Chowdhury'
        ],
        [
          'img' => 'https://cdn-jlkmh.nitrocdn.com/JBpvnBXJHwcvYfacMymVcdLoTRonnoqY/assets/images/optimized/rev-a1adf00/royalbengaltours.com/wp-content/uploads/2019/08/A-glimpse-into-the-lives-of-tea-workers-in-Sreemangal-Bangladesh.webp',
          'title' => 'Tea Trails: Srimangal',
          'text' => 'Cycling through the lush tea gardens and tasting the famous seven-layer tea...',
          'author' => 'Mehzabin Karim'
        ],
        [
          'img' => 'https://www.travelmate.com.bd/wp-content/uploads/2015/07/Qhseck8.jpg.webp',
          'title' => 'Hilltop Serenity: Bandarban',
          'text' => 'Hiking up Nilgiri, the clouds drifted below my feet...',
          'author' => 'Arif Mahmud'
        ],
      ];
    @endphp

    @foreach ($stories as $story)
      <div class="story-card">
        <img src="{{ $story['img'] }}" alt="{{ $story['title'] }}" style="width: 100%; height: 180px; object-fit: cover;">
        <div style="padding: 18px;">
          <h3 style="margin: 0 0 10px;">{{ $story['title'] }}</h3>
          <p style="color: #555;">"{{ $story['text'] }}"</p>
          <div style="font-size: 14px; color: #888; margin-top: 10px;">— {{ $story['author'] }}</div>
        </div>
      </div>
    @endforeach
  </div>
</section>
@endsection
