@extends('layouts.app')

@section('title', 'About')

@section('content')
<section class="about-section" style="max-width: 900px; margin: 40px auto; padding: 32px 24px; background: #fff; border-radius: 14px; box-shadow: 0 4px 24px #e0e7ef;">
  <h1 style="text-align:center; color:#1e7e34; font-size:2.5rem; margin-bottom: 18px;">About Us</h1>
  <p style="text-align:center; font-size:1.15rem; color:#444; margin-bottom: 18px;">
    Let's Explore Bangladesh is dedicated to showcasing the breathtaking natural beauty, rich culture, and amazing travel experiences Bangladesh offers.
  </p>
  <div style="display:flex; justify-content:center; margin-bottom: 50px;">
    <img src="data:image/webp;base64,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" alt="Bangladesh Flag" style="height: 144px; width: 216px; border-radius: 16px; box-shadow:0 4px 24px #e0e0e0; object-fit:cover;">
  </div>
  <p style="text-align:center; font-size:1.08rem; color:#666; margin-bottom: 32px;">
    Our mission is to help travelers explore the best destinations with trusted packages and personalized services.
  </p>

  <style>
    .team-list {
      display: flex;
      flex-wrap: wrap;
      gap: 28px;
      justify-content: center;
      margin-top: 30px;
    }
    .team-card {
      color: #fff;
      border-radius: 14px;
      box-shadow: 0 4px 18px #2228;
      padding: 26px 32px;
      min-width: 220px;
      max-width: 260px;
      text-align: center;
      transition: box-shadow 0.2s;
    }
    .team-card:hover {
      box-shadow: 0 8px 32px #222b;
    }
    .team-card img {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 14px;
      box-shadow: 0 2px 12px #111a;
      border: 3px solid #fff;
    }
    .team-role {
      color: #ffd700;
      font-size: 1.08rem;
      margin-bottom: 6px;
      font-weight: 500;
    }
    .team-name {
      font-weight: 700;
      font-size: 1.15rem;
      margin-bottom: 8px;
      color: #fff;
    }
    .team-emoji {
      font-size: 2.2rem;
      margin-bottom: 10px;
    }

    /* Dark Mode Styles */
    body.dark-mode {
      background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%) !important;
    }

    body.dark-mode .about-section {
      background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%) !important;
      box-shadow: 0 4px 24px rgba(76, 175, 80, 0.2) !important;
      border: 1px solid rgba(102, 187, 106, 0.3) !important;
      color: #e0e0e0 !important;
    }

    body.dark-mode h1,
    body.dark-mode h2 {
      color: #81c784 !important;
    }

    body.dark-mode p {
      color: #b0bec5 !important;
    }

    body.dark-mode .team-card {
      box-shadow: 0 4px 18px rgba(76, 175, 80, 0.3) !important;
      border: 1px solid rgba(102, 187, 106, 0.2) !important;
    }

    body.dark-mode .team-card:hover {
      box-shadow: 0 8px 32px rgba(76, 175, 80, 0.4) !important;
    }

    body.dark-mode .team-name {
      color: #e0e0e0 !important;
    }

    body.dark-mode .team-role {
      color: #ffd700 !important;
    }
  </style>

  <h2 style="margin-top: 40px; color: #1e7e34; text-align:center; font-size:2rem;">Tour Management Team</h2>
  <div class="team-list">
    <div class="team-card" style="background:#10b34cff;">
      <img src="https://static.vecteezy.com/system/resources/previews/024/183/525/non_2x/avatar-of-a-man-portrait-of-a-young-guy-illustration-of-male-character-in-modern-color-style-vector.jpg" alt="Pulak Deb Nath">
      <div class="team-emoji">👨‍💼</div>
      <div class="team-name">Pulak Deb Nath</div>
      <div class="team-role">Manager</div>
    </div>
    <div class="team-card" style="background:#1565c0;">
      <img src="https://static.vecteezy.com/system/resources/previews/024/183/502/non_2x/male-avatar-portrait-of-a-young-man-with-a-beard-illustration-of-male-character-in-modern-color-style-vector.jpg" alt="Sabbir Ahmed">
      <div class="team-emoji">💰</div>
      <div class="team-name">Sabbir Ahmed</div>
      <div class="team-role">Treasurer</div>
    </div>
    <div class="team-card" style="background:#ff9800;">
      <img src="https://img.favpng.com/1/9/15/3d-male-avatar-cartoon-man-with-glasses-Bnq3PC7J_t.jpg" alt="Abir Hasan">
      <div class="team-emoji">🧭</div>
      <div class="team-name">Abir Hasan</div>
      <div class="team-role">Guide</div>
    </div>
    <div class="team-card" style="background:#d32f2f;">
      <img src="https://www.shutterstock.com/image-vector/cool-beard-man-vector-logo-600nw-1719020434.jpg" alt="Nehal Ahmed">
      <div class="team-emoji">🛡️</div>
      <div class="team-name">Nehal Ahmed</div>
      <div class="team-role">Moderator</div>
    </div>
    <div class="team-card" style="background:#7b1fa2;">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwyZCRGO6ekkX3zdFaclEgroQ5omvhbeMDDg&s" alt="Shovan Samanta Turzo">
      <div class="team-emoji">🤝</div>
      <div class="team-name">Shovan Samanta Turzo</div>
      <div class="team-role">Coordinator</div>
    </div>
  </div>
</section>
@endsection
