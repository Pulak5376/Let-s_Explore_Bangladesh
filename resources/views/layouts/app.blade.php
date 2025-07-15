<!DOCTYPE html>
<html lang="en" data-theme="light">
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
    :root {
      --brand-green: #0abf2e;
      --brand-green-light: #2ed864;
      --bg-light: #f8f9fa;
      --bg-dark: #121212;
      --text-light: #1b1b1b;
      --text-dark: #e5e5e5;
      --header-height: 70px;
      --radius: 10px;
      --transition: 0.25s ease;
    }

    [data-theme="dark"] {
      --bg-light: var(--bg-dark);
      --text-light: var(--text-dark);
      --brand-green: #2ed864;
    }

    *,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
    html{scroll-behavior:smooth}
    body {
      font-family: 'Poppins', sans-serif;
      color: var(--text-light);
      background: var(--bg-light);
      overflow-x: hidden;
      transition: background var(--transition), color var(--transition);
    }

    header {
      position: sticky;
      top: 0;
      width: 100%;
      background: var(--brand-green);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 28px;
      z-index: 1000;
      box-shadow: 0 2px 6px rgba(0,0,0,.08);
    }

    .logo {
      font-weight: 700;
      font-size: 1.4rem;
      text-decoration: none;
      color: #fff;
      display: flex;
      align-items: center;
      gap: .4rem;
    }

    .theme-toggle {
      background: none;
      border: none;
      color: #fff;
      cursor: pointer;
      font-size: 1.35rem;
      display: flex;
      align-items: center;
      gap: .4rem;
    }

    nav .nav-list {
      display: flex;
      gap: 1.4rem;
      list-style: none;
    }

    .nav-link {
      position: relative;
      font-weight: 500;
      text-decoration: none;
      color: #fff;
      transition: opacity var(--transition);
    }

    .nav-link:hover,
    .nav-link.active {
      opacity: 0.9;
    }

    .nav-link::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -4px;
      width: 0;
      height: 2px;
      background: #fff;
      transition: width var(--transition);
    }

    .nav-link:hover::after,
    .nav-link.active::after {
      width: 100%;
    }

    .dropdown {
      position: relative;
    }

    .dropdown-toggle {
      display: flex;
      align-items: center;
      gap: .25rem;
      cursor: pointer;
    }

    .dropdown-menu {
      position: absolute;
      top: 100%;
      right: 0;
      background: #fff;
      border-radius: var(--radius);
      box-shadow: 0 8px 18px rgba(0,0,0,.08);
      padding: .5rem 0;
      list-style: none;
      display: none;
      min-width: 160px;
      color: var(--text-light);
    }

    .dropdown-menu.show {
      display: block;
      animation: fadeIn .25s ease forwards;
    }

    .dropdown-menu li a {
      display: block;
      padding: .55rem 1rem;
      color: inherit;
      text-decoration: none;
      font-size: .9rem;
      white-space: nowrap;
    }

    .dropdown-menu li a:hover {
      background: #f1f3f5;
      color: var(--brand-green);
    }

    .hamburger {
      display: none;
      flex-direction: column;
      gap: 4px;
      cursor: pointer;
    }

    .hamburger span {
      width: 24px;
      height: 3px;
      background: #fff;
      border-radius: 2px;
      transition: transform .3s, opacity .3s;
    }

    .hamburger.active span:nth-child(1) {
      transform: translateY(7px) rotate(45deg);
    }

    .hamburger.active span:nth-child(2) {
      opacity: 0;
    }

    .hamburger.active span:nth-child(3) {
      transform: translateY(-7px) rotate(-45deg);
    }

    @media(max-width:768px){
      .nav-list {
        position: fixed;
        inset: 0 0 0 auto;
        width: 75%;
        background: var(--brand-green);
        flex-direction: column;
        padding: 5rem 2rem;
        transform: translateX(100%);
        transition: transform .35s ease;
      }

      .nav-list.open {
        transform: translateX(0);
      }

      .hamburger {
        display: flex;
      }
    }




    .cta-buttons {
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .btn {
      padding: 0.8rem 2rem;
      font-weight: 600;
      border-radius: 40px;
      text-decoration: none;
      background: #fff;
      color: var(--brand-green);
      box-shadow: 0 6px 18px rgba(0,0,0,.15);
      transition: transform 0.25s, box-shadow 0.25s;
    }

    .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 24px rgba(0,0,0,.2);
    }

    .btn-ghost {
      background: transparent;
      border: 2px solid #fff;
      color: #fff;
    }

    .btn-ghost:hover {
      background: #fff;
      color: #000;
    }

    footer {
      background: var(--brand-green);
      color: #fff;
      text-align: center;
      padding: 1.25rem 1rem;
      margin-top: 4rem;
      font-size: .9rem;
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header>
    <a href="/" class="logo">Let'sExplore Bangladesh</a>
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
    <button class="theme-toggle" id="themeToggle" title="Toggle Dark Mode">
      <i data-feather="moon"></i>
    </button>
    <div id="hamburger" class="hamburger" aria-label="Toggle navigation" aria-expanded="false">
      <span></span><span></span><span></span>
    </div>
  </header>

  <!-- Hero -->
  

  <!-- Main Blade Content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer>
    © 2025 • Let's Explore Bangladesh. All rights reserved.
  </footer>

  <!-- Scripts -->
  <script>
    feather.replace();

    const hamburger = document.getElementById('hamburger');
    const navList = document.getElementById('navbar');
    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('active');
      navList.classList.toggle('open');
      hamburger.setAttribute('aria-expanded', navList.classList.contains('open'));
    });

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

    const themeToggle = document.getElementById('themeToggle');
    const htmlElement = document.documentElement;
    themeToggle.addEventListener('click', () => {
      const isDark = htmlElement.getAttribute('data-theme') === 'dark';
      htmlElement.setAttribute('data-theme', isDark ? 'light' : 'dark');
      localStorage.setItem('theme', isDark ? 'light' : 'dark');
    });

    window.addEventListener('DOMContentLoaded', () => {
      const savedTheme = localStorage.getItem('theme');
      if (savedTheme) {
        htmlElement.setAttribute('data-theme', savedTheme);
      }
    });
  </script>
</body>
</html>
