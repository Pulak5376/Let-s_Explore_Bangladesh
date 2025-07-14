@extends('layouts.app')

@section('title', 'Stories')

@section('content')
<section class="stories-section" style="padding: 40px; background-color: #f9f9f9;">
  <style>
    .story-card {
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      animation: fadeInUp 1s ease both;
    }

    .story-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
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
