<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title') • Let's Explore Bangladesh</title>

  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- Custom CSS / JS Assets -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('js/script.js') }}" defer></script>

  <style>
    /* Reset */
    *,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
    body{font-family:'Poppins',sans-serif;color:#1b1b1b;background:#f8f9fa;overflow-x:hidden}

    /* Header & Navigation */
    header{position:sticky;top:0;width:100%;background:#0abf2e;color:#fff;display:flex;align-items:center;justify-content:space-between;padding:12px 28px;z-index:1000;box-shadow:0 2px 6px rgba(0,0,0,.08)}
    .logo{font-weight:700;font-size:1.4rem;letter-spacing:.5px;text-decoration:none;color:#fff;display:flex;align-items:center;gap:.4rem}

    nav{display:flex;align-items:center}
    .nav-list{display:flex;gap:1.4rem;list-style:none}
    .nav-link{position:relative;font-weight:500;text-decoration:none;color:#fff;transition:opacity .25s}
    .nav-link.active,.nav-link:hover{opacity:.9}
    .nav-link::after{content:"";position:absolute;left:0;bottom:-4px;width:0;height:2px;background:#fff;transition:width .25s}
    .nav-link:hover::after,.nav-link.active::after{width:100%}

    /* Dropdown */
    .dropdown{position:relative}
    .dropdown-toggle{display:flex;align-items:center;gap:.25rem;cursor:pointer}
    .dropdown-menu{position:absolute;top:100%;right:0;background:#fff;border-radius:8px;box-shadow:0 8px 18px rgba(0,0,0,.08);padding:.5rem 0;list-style:none;display:none;min-width:160px}
    .dropdown-menu.show{display:block;animation:fadeIn .25s ease forwards}
    .dropdown-menu li a{display:block;padding:.55rem 1rem;color:#1b1b1b;text-decoration:none;font-size:.9rem;white-space:nowrap}
    .dropdown-menu li a:hover{background:#f1f3f5;color:#0abf2e}

    @keyframes fadeIn{from{opacity:0;transform:translateY(-8px)}to{opacity:1;transform:translateY(0)}}

    /* Hamburger */
    .hamburger{display:none;flex-direction:column;gap:4px;cursor:pointer}
    .hamburger span{width:24px;height:3px;background:#fff;border-radius:2px;transition:transform .3s,opacity .3s}
    .hamburger.active span:nth-child(1){transform:translateY(7px) rotate(45deg)}
    .hamburger.active span:nth-child(2){opacity:0}
    .hamburger.active span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}

    /* Mobile Nav */
    @media(max-width:768px){
      .nav-list{position:fixed;inset:0 0 0 auto;width:75%;background:#0abf2e;flex-direction:column;padding:5rem 2rem;transform:translateX(100%);transition:transform .35s cubic-bezier(.5,0,.5,1)}
      .nav-list.open{transform:translateX(0)}
      .hamburger{display:flex}
    }

    /* Hero Section */
    .hero{position:relative;isolation:isolate;height:calc(100vh - 70px);display:flex;align-items:center;justify-content:center;text-align:center;color:#fff;background:url('https://images.unsplash.com/photo-1518684079-25c0f4ac9936?auto=format&fit=crop&w=2000&q=80') center/cover no-repeat}
    .hero::after{content:"";position:absolute;inset:0;background:linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.25));z-index:-1}

    .hero h1{font-size:clamp(2.2rem,5vw,4.5rem);font-weight:700;line-height:1.15;animation:slideUp .9s ease both .2s}
    .hero p{margin-top:.8rem;font-size:clamp(1rem,2vw,1.4rem);font-weight:300;color:#e6e6e6;animation:slideUp .9s ease both .35s}
    @keyframes slideUp{0%{opacity:0;transform:translateY(28px)}100%{opacity:1;transform:translateY(0)}}

    .cta-buttons{margin-top:1.8rem;display:flex;gap:1rem;justify-content:center;animation:slideUp .9s ease both .5s}
    .btn{display:inline-block;padding:.8rem 2rem;font-weight:600;border-radius:40px;text-decoration:none;background:#fff;color:#0abf2e;box-shadow:0 6px 18px rgba(0,0,0,.15);transition:transform .25s,box-shadow .25s}
    .btn:hover{transform:translateY(-3px);box-shadow:0 10px 24px rgba(0,0,0,.2)}

    main{padding:3rem 1.5rem;max-width:1200px;margin-inline:auto}
    footer{background:#0abf2e;color:#fff;text-align:center;padding:1.25rem 1rem;margin-top:4rem;font-size:.9rem}
  </style>
</head>
<body>
  <!-- ===== Header ===== -->
  <header>
    <a href="/" class="logo">Explore BD</a>

    <nav>
      <ul class="nav-list" id="navbar">
        <li><a href="/welcome" class="nav-link {{ request()->is('welcome') ? 'active' : '' }}">Home</a></li>
        <li><a href="/places" class="nav-link {{ request()->is('places') ? 'active' : '' }}">Places</a></li>
        <li><a href="/stories" class="nav-link {{ request()->is('stories') ? 'active' : '' }}">Stories</a></li>
        <li><a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">About</a></li>
        <li><a href="/gallery" class="nav-link {{ request()->is('gallery') ? 'active' : '' }}">Gallery</a></li>
        <li><a href="/contact" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
        <li class="dropdown">
          <span class="nav-link dropdown-toggle" id="dropdownToggle">More <i data-feather="chevron-down"></i></span>
          <ul class="dropdown-menu" id="dropdownMenu">
            <li><a href="/weather">Weather Check</a></li>
            <li><a href="/cart">View Cart</a></li>
          </ul>
        </li>
      </ul>
    </nav>

    <div id="hamburger" class="hamburger" aria-label="Toggle navigation" aria-expanded="false">
      <span></span><span></span><span></span>
    </div>
  </header>

  <!-- ===== Animated Hero ===== -->
  <section class="hero">
    <div class="hero-content">
      <h1>Discover Bangladesh's Hidden Gems</h1>
      <p>From the Sundarbans to the rolling tea gardens—start your adventure today.</p>
      <div class="cta-buttons">
        <a href="/places" class="btn">Explore Places</a>
        <a href="/register" class="btn" style="background:#0abf2e;color:#fff">Join Us</a>
      </div>
    </div>
  </section>

  <!-- ===== Main Content (Blade) ===== -->
  <main>
    @yield('content')
  </main>

  <!-- ===== Footer ===== -->
  <footer>
    © 2025 • Let's Explore Bangladesh. All rights reserved.
  </footer>

  <script>
    // Feather Icons
    feather.replace();

    // Mobile Nav Toggle
    const hamburger = document.getElementById('hamburger');
    const navList = document.getElementById('navbar');
    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('active');
      navList.classList.toggle('open');
      hamburger.setAttribute('aria-expanded', navList.classList.contains('open'));
    });

    // Dropdown
    const dropdownToggle = document.getElementById('dropdownToggle');
    const dropdownMenu = document.getElementById('dropdownMenu');
    dropdownToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      dropdownMenu.classList.toggle('show');
    });
    document.addEventListener('click', (e) => {
      if (!dropdownMenu.contains(e.target) && !dropdownToggle.contains(e.target)) {
        dropdownMenu.classList.remove('show');
      }
    });
  </script>
</body>
</html>