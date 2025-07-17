<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title') - Let's Explore Bangladesh</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <script src="{{ asset('js/script.js') }}" defer></script>
  <style>
    :root {
      --bg-light: #ffffff;
      --bg-dark: #121212;
      --text-light: #000000;
      --text-dark: #ffffff;
      --header-bg: rgb(1, 173, 24);
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--bg-light);
      color: var(--text-light);
      transition: background-color 0.3s, color 0.3s;
    }

    body.dark-mode {
      background-color: var(--bg-dark);
      color: var(--text-dark);
    }

    body.dark-mode header {
      background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
    }

    body.dark-mode .logo {
      color: #e8f5e8 !important;
    }

    body.dark-mode nav ul li a {
      color: #e8f5e8 !important;
    }

    body.dark-mode nav ul li a:hover {
      color: #81c784 !important;
      background: rgba(129, 199, 132, 0.1) !important;
    }

    body.dark-mode .dropdown-content {
      background: linear-gradient(135deg, #2c2c2c, #3a3a3a) !important;
      border: 1px solid rgba(102, 187, 106, 0.3) !important;
    }

    body.dark-mode .dropdown-content a {
      color: #e0e0e0 !important;
    }

    body.dark-mode .dropdown-content a:hover {
      background: rgba(76, 175, 80, 0.2) !important;
      color: #81c784 !important;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background-color: var(--header-bg);
      color: white;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .logo {
      color: rgb(0, 0, 0);
      font-family: cursive;
      font-size: 1.5rem;
      font-weight: bold;
      cursor: pointer;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
      margin: 0;
      padding: 0;
      align-items: center;
    }

    nav ul li a {
      color: rgb(0, 0, 0);
      text-decoration: none;
      font-weight: 500;
      padding: 8px 12px;
      border-radius: 5px;
      transition: background 0.3s;
    }

    nav ul li a.active,
    nav ul li a:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    .dropdown-toggle {
      color: rgb(0, 0, 0);
      font-weight: 600;
      cursor: pointer;
      display: inline-block;
      padding: 8px 12px;
    }

    .dropdown-toggle:hover {
      color: white;
    }

    .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 0;
      background: white;
      min-width: 180px;
      padding: 8px 0;
      border-radius: 6px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      display: none;
      z-index: 999;
    }

    .dropdown-menu li a {
      display: block;
      padding: 10px 16px;
      color: rgb(0, 0, 0);
      font-size: 14px;
      text-decoration: none;
    }

    .dropdown-menu li a:hover {
      background-color: #eaf4ff;
      color: rgb(23, 111, 226);
    }

    .rotate-up {
      transform: rotate(180deg);
    }

    .hamburger {
      display: none;
      flex-direction: column;
      gap: 4px;
      cursor: pointer;
    }

    .hamburger span {
      width: 25px;
      height: 3px;
      background: white;
      border-radius: 2px;
    }

    .dark-switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 26px;
      margin-left: 10px;
    }

    .dark-switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #999;
      transition: 0.4s;
      border-radius: 34px;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 20px;
      width: 20px;
      left: 4px;
      bottom: 3px;
      background-color: white;
      transition: 0.4s;
      border-radius: 50%;
    }

    .dark-switch input:checked+.slider {
      background-color: #007bff;
    }

    .dark-switch input:checked+.slider:before {
      transform: translateX(24px);
    }


    main {
      padding: 40px 20px;
    }

    footer {
      text-align: center;
      padding: 20px;
      background: var(--header-bg);
      color: white;
      margin-top: 60px;
    }

    .dark-mode-toggle {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 14px;
      font-weight: 500;
      color: black;
      margin-left: 10px;
    }

    @media (max-width: 768px) {
      nav ul {
        flex-direction: column;
        position: absolute;
        top: 65px;
        left: 0;
        width: 100%;
        background: rgb(2, 245, 35);
        display: none;
      }

      nav ul.show {
        display: flex;
      }

      .hamburger {
        display: flex;
      }

      .dark-switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 26px;
        margin-left: 10px;
      }

      .dark-switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #999;
        transition: 0.4s;
        border-radius: 34px;
      }

      .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 4px;
        bottom: 3px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
      }

      .dark-switch input:checked+.slider {
        background-color: #007bff;
      }

      .dark-switch input:checked+.slider:before {
        transform: translateX(24px);
      }

      .dark-mode-toggle {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: 500;
        color: black;
        margin-left: 10px;
      }

    }
  </style>
</head>

<body>
  <header>
    <a href="/" class="logo">Let'sExplore BD</a>

    <div class="hamburger" id="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <nav>
      <ul id="navbar">
        <li><a href="/welcome" class="{{ request()->is('/welcome') ? 'active' : '' }}">Home</a></li>
        <li><a href="/places" class="{{ request()->is('places') ? 'active' : '' }}">Places</a></li>
        <li><a href="/package" class="{{ request()->is('package') ? 'active' : '' }}">Combo Packages</a></li>
        <li><a href="/stories" class="{{ request()->is('stories') ? 'active' : '' }}">Stories</a></li>
        <li><a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
        <li><a href="/gallery" class="{{ request()->is('gallery') ? 'active' : '' }}">Gallery</a></li>
        <li><a href="/contact" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>

        <li class="dropdown" style="position: relative;">
          <a href="#" class="nav-link dropdown-toggle" onclick="event.preventDefault(); toggleDropdown('transport-menu', 'transport-arrow')">Transport<span id="transport-arrow">&#9662;</span></a>
          <ul id="transport-menu" class="dropdown-menu">
            <li><a href="{{ url('/train') }}">Train Ticket</a></li>
            <li><a href="{{ url('/bus') }}">Bus Ticket</a></li>

          </ul>
        </li>

        <li class="dropdown" style="position: relative;">
          <a href="#" class="nav-link dropdown-toggle" onclick="event.preventDefault(); toggleDropdown('more-menu', 'more-arrow')">More<span id="more-arrow">&#9662;</span></a>
          <ul id="more-menu" class="dropdown-menu">
            <li><a href="{{ url('/hotelbook') }}">Hotel Booking</a></li>
            <li><a href="{{ url('/flightbook') }}">Flight Booking</a></li>
            <li><a href="{{ url('/weather') }}">Weather Check</a></li>
            <li><a href="{{ url('/cart') }}">View Cart</a></li>
             <li><a href="{{ url('/Review') }}">Review</a></li>
              <li><a href="{{ url('/Convert') }}">Currency Converter</a></li>
          </ul>
        </li>

        <li>
          <div class="dark-mode-toggle">
            <span>Dark Mode</span>
            <label class="dark-switch">
              <input type="checkbox" id="darkToggle" onchange="toggleDarkMode()" />
              <span class="slider"></span>
            </label>
          </div>

        </li>
      </ul>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    <p>© 2025. All rights reserved by Let's Explore Bangladesh.</p>
  </footer>

  <script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
      document.getElementById('navbar').classList.toggle('show');
    });

    function toggleDropdown() {
      const menu = document.getElementById('dropdown-menu');
      const arrow = document.getElementById('dropdown-arrow');

      const isOpen = menu.style.display === 'block';
      menu.style.display = isOpen ? 'none' : 'block';
      arrow.classList.toggle('rotate-up', !isOpen);
    }

    document.addEventListener('click', function(e) {
      const menu = document.getElementById('dropdown-menu');
      const toggle = document.querySelector('.dropdown-toggle');

      if (!menu.contains(e.target) && !toggle.contains(e.target)) {
        menu.style.display = 'none';
        document.getElementById('dropdown-arrow').classList.remove('rotate-up');
      }
    });

    function toggleDarkMode() {
      const isDark = document.body.classList.toggle('dark-mode');
      document.getElementById('darkToggle').checked = isDark;
      localStorage.setItem('darkMode', isDark);
    }

    document.addEventListener('DOMContentLoaded', function() {
      const savedDarkMode = localStorage.getItem('darkMode') === 'true';
      if (savedDarkMode) {
        document.body.classList.add('dark-mode');
        const darkToggle = document.getElementById('darkToggle');
        if (darkToggle) {
          darkToggle.checked = true;
        }
      }
    });

    function toggleDropdown(menuId, arrowId) {
      const menu = document.getElementById(menuId);
      const arrow = document.getElementById(arrowId);

      const isOpen = menu.style.display === 'block';
      menu.style.display = isOpen ? 'none' : 'block';
      arrow.classList.toggle('rotate-up', !isOpen);
    }
    document.addEventListener('click', function(e) {
      const dropdowns = [{
          menuId: 'more-menu',
          arrowId: 'more-arrow'
        },
        {
          menuId: 'transport-menu',
          arrowId: 'transport-arrow'
        }
      ];

      dropdowns.forEach(({
        menuId,
        arrowId
      }) => {
        const menu = document.getElementById(menuId);
        const arrow = document.getElementById(arrowId);
        const toggle = document.querySelector(`#${arrowId}`).parentElement;

        if (
          menu &&
          arrow &&
          !menu.contains(e.target) &&
          !toggle.contains(e.target)
        ) {
          menu.style.display = 'none';
          arrow.classList.remove('rotate-up');
        }
      });
    });
  </script>
</body>

</html>