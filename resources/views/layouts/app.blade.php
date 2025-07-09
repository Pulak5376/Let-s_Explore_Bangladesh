<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title') - Let's Explore Bangladesh</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <script src="{{ asset('js/script.js') }}" defer></script>

<body>

  <header>
    <a href="/" class="logo">Explore BD</a>

    <div id="menu-toggle" class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <nav>
      <ul id="navbar">
        <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
        <li><a href="/places" class="{{ request()->is('places') ? 'active' : '' }}">Places</a></li>
        <li><a href="/stories" class="{{ request()->is('stories') ? 'active' : '' }}">Stories</a></li>
        <li><a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
        <li><a href="/gallery" class="{{ request()->is('gallery') ? 'active' : '' }}">Gallery</a></li>
        <li><a href="/contact" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
        <li class="dropdown" style="position: relative;">
          <a href="#" class="nav-link dropdown-toggle" onclick="event.preventDefault(); toggleDropdown()">More<span id="dropdown-arrow">&#9662;</span>
          </a>
          <ul id="dropdown-menu" class="dropdown-menu">
            <li><a href="{{ url('/weather') }}">Weather Check</a></li>
            <li><a href="{{ url('/cart') }}">View Cart</a></li>
          </ul>
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
  </script>
</body>

<style>
  body {
    margin: 0;

    font-family: 'Segoe UI', sans-serif;
  }

  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    background-color: rgb(1, 173, 24);
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
    color: white;
    text-decoration: none;
    font-weight: 500;
    padding: 8px 12px;
    color: rgb(0, 0, 0);

    border-radius: 5px;
    transition: background 0.3s;
    font-family: 'Segoe UI', sans-serif;
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
    transition: color 0.3s ease;
    font-family: 'Segoe UI', sans-serif;
  }

  .dropdown-toggle:hover {
    color:rgb(255, 255, 255);
  }

  .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    min-width: 180px;
    padding: 8px 0;
    border-radius: 6px;
    box-shadow: 0 8px 20px rgba(255, 253, 253, 0.08);
    display: none;
    z-index: 999;
  }

  .dropdown-menu li {
    list-style: none;
  }

  .dropdown-menu li a {
    display: block;
    padding: 10px 16px;
    color: rgb(0, 0, 0);
    font-size: 14px;
    text-decoration: none;
    transition: background 0.2s;
    font-family: 'Segoe UI', sans-serif;
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

  main {
    padding: 40px 20px;
  }

  footer {
    text-align: center;
    padding: 20px;
    background: rgb(1, 173, 24);
    color: white;
    margin-top: 60px;
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
  }
</style>
</head>



</html>