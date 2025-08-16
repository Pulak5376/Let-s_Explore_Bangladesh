@extends('layouts.app')

@section('title', 'Stories')

@section('content')

<!-- Styles Section -->
<style>
  /* General Styles */
  .stories-container {
    max-width: 800px;
    margin: 40px auto;
  }

  .title {
    text-align: center;
    margin-bottom: 32px;
  }

  .story-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 8px #eee;
    margin-bottom: 32px;
    padding: 24px;
  }

  .post-header {
    display: flex;
    align-items: center;
    margin-bottom: 16px;
  }

  .avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #00695c, #4caf50);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 24px;
    margin-right: 16px;
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

  .post-actions {
    padding: 20px 40px;
    border-top: 2px solid rgba(0, 106, 78, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(255, 255, 255, 0.95);
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
  }

  /* Media Queries */
  @media (max-width: 768px) {
    .story-card {
      padding: 20px;
    }

    .post-text {
      font-size: 18px;
    }

    .post-image {
      height: 40vh;
    }

    .post-actions {
      padding: 10px;
    }

    .likes-count, .location-tag {
      font-size: 14px;
    }
  }
</style>

<!-- Stories Section -->
<div class="stories-container">
  <h1 class="title">Bangladesh Travel Stories</h1>

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
        <div class="avatar">{{ $story['avatar'] ?? '?' }}</div>
        <div class="post-info">
          <h3>{{ $story['author'] ?? 'Anonymous' }}</h3>
          <div class="post-time">{{ $story['time'] ?? '' }}</div>
        </div>
      </div>

      <!-- Post Image -->
      <img class="post-image" src="{{ $story['img'] }}" alt="{{ $story['title'] }}">

      <!-- Post Content -->
      <div class="post-content">
        <p class="post-text">{{ $story['text'] }}</p>
      </div>

      <!-- Post Actions -->
      <div class="post-actions">
        <span class="likes-count">{{ $story['likes'] ?? 0 }} likes</span>
        <span class="location-tag">📍 {{ $story['location'] ?? '' }}</span>
      </div>
    </div>
  @endforeach
</div>

@endsection
