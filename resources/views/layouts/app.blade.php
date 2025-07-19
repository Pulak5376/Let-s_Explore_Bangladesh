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
      --text-dark: #ffffffbe;
      --header-bg: rgba(183, 255, 191, 1);
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

    body.dark-mode .hamburger span {
      background: #e8f5e8 !important;
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
      background: black;
      border-radius: 2px;
      transition: all 0.3s ease;
    }

    .hamburger.active span:nth-child(1) {
      transform: rotate(45deg) translate(5px, 5px);
    }

    .hamburger.active span:nth-child(2) {
      opacity: 0;
    }

    .hamburger.active span:nth-child(3) {
      transform: rotate(-45deg) translate(7px, -6px);
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
      color: black;
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

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      height: 60px;
      width: 60px;
      object-fit: cover;
      border-radius: 50%;
      background: white;
      border: 3px solid #10740fff;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }


    @media (max-width: 768px) {
      #navbar {
        flex-direction: column;
        position: fixed;
        top: 65px;
        left: -100%;
        width: 280px;
        height: calc(100vh - 65px);
        background: linear-gradient(135deg, #00695c 0%, #388e3c 100%);
        display: flex;
        transition: left 0.3s ease;
        z-index: 999;
        overflow-y: auto;
        padding-top: 20px;
      }

      #navbar.show {
        left: 0;
      }

      #navbar li {
        margin: 0;
        width: 100%;
      }

      #navbar li a {
        padding: 15px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        color: white;
        width: 100%;
        display: block;
      }

      #navbar li a:hover,
      #navbar li a.active {
        background-color: rgba(255, 255, 255, 0.1);
        color: #81c784 !important;
      }

      .hamburger {
        display: flex;
      }

      .dropdown-menu {
        position: static !important;
        background: rgba(255, 255, 255, 0.1) !important;
        box-shadow: none !important;
        border-radius: 0 !important;
        padding: 0 !important;
        margin-left: 20px !important;
        width: calc(100% - 20px) !important;
        min-width: auto !important;
      }

      .dropdown-menu li a {
        color: rgba(255, 255, 255, 0.8) !important;
        padding: 12px 20px !important;
        font-size: 14px !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
      }

      .dropdown-menu li a:hover {
        background-color: rgba(255, 255, 255, 0.1) !important;
        color: white !important;
      }

      .mobile-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 998;
        display: none;
      }

      .mobile-overlay.show {
        display: block;
      }

      body.menu-open {
        overflow: hidden;
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
    <a href="{{ url('/welcome') }}" class="logo">
      <img src="{{ asset('images/logo.png') }}" alt="Let's Explore Bangladesh">
    </a>

    <div class="hamburger" id="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <nav>
      <ul id="navbar">
        <li><a href="{{ url('/welcome') }}" class="{{ request()->is('welcome') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ url('/places') }}" class="{{ request()->is('places') ? 'active' : '' }}">Places</a></li>
        <li><a href="{{ url('/package') }}" class="{{ request()->is('package') ? 'active' : '' }}">Combo Packages</a></li>
        <li><a href="{{ url('/stories') }}" class="{{ request()->is('stories') ? 'active' : '' }}">Stories</a></li>
        <li><a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
        <li><a href="{{ url('/gallery') }}" class="{{ request()->is('gallery') ? 'active' : '' }}">Gallery</a></li>
        <li><a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>

        <li class="dropdown" style="position: relative;">
          <a href="#" class="nav-link dropdown-toggle" onclick="event.preventDefault(); toggleDropdown('transport-menu', 'transport-arrow')">Transport<span id="transport-arrow">&#9662;</span></a>
          <ul id="transport-menu" class="dropdown-menu">
            <li><a href="{{ url('/bus') }}">Bus Ticket</a></li>
            <li><a href="{{ url('/train') }}">Train Ticket</a></li>
            <li><a href="{{ url('/flightbook') }}">Flight Ticket</a></li>
          </ul>
        </li>

        <li class="dropdown" style="position: relative;">
          <a href="#" class="nav-link dropdown-toggle" onclick="event.preventDefault(); toggleDropdown('more-menu', 'more-arrow')">More<span id="more-arrow">&#9662;</span></a>
          <ul id="more-menu" class="dropdown-menu">
            <li><a href="{{ url('/hotelbook') }}">Hotel Booking</a></li>
            <li><a href="{{ url('/weather') }}">Weather Check</a></li>
            <li><a href="{{ url('/cart') }}">View Cart</a></li>
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

</body>
</html>