@extends('layouts.app')

@section('title', 'Stories')

@section('content')
<section class="stories-section" style="padding: 20px; background: linear-gradient(135deg, #f8fffe 0%, #e8f5e8 50%, #f8fffe 100%); min-height: 100vh;">
  <style>
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
      bottom: 30px;
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


    @foreach ($stories as $index => $story)
      <div class="story-card">
        <!-- Post Header -->
        <div class="post-header">
          <div class="avatar">{{ $story['avatar'] }}</div>
          <div class="post-info">
            <h3>{{ $story['author'] }}</h3>
            <div class="post-time">{{ $story['time'] }}</div>
          </div>
        </div>

        <!-- Post Content -->
        <div class="post-content">
          <p class="post-text">{{ $story['text'] }}</p>
          <span class="location-tag">
            📍 {{ $story['location'] }}
          </span>
          <img src="{{ $story['img'] }}" alt="{{ $story['title'] }}" class="post-image" />
        </div>

        <!-- Post Actions -->
        <div class="post-actions">
          <div class="action-buttons">
            <button class="action-btn" data-action="like" data-index="{{ $index }}">
              <span class="like-icon">❤️</span>
              <span class="like-text">Like</span>
            </button>
            <button class="action-btn" data-action="comment" data-index="{{ $index }}">
              <span>💬</span>
              <span>Comment</span>
            </button>
            <button class="action-btn" data-action="share" data-index="{{ $index }}">
              <span>📤</span>
              <span>Share</span>
            </button>
            <button class="action-btn" data-action="save" data-index="{{ $index }}">
              <span class="save-icon">🔖</span>
              <span class="save-text">Save</span>
            </button>
          </div>
          <div class="likes-count" id="likes-{{ $index }}">{{ $story['likes'] }} likes</div>
        </div>
      </div>
    @endforeach
  </div>

  <script>
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
