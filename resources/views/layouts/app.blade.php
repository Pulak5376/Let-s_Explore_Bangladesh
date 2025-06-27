<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title') - Let's Explore Bangladesh</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>

  {{-- ✅ Header/Navbar --}}
  <header>
    <div class="logo"><i>Explore BD</i></div> {{-- Optional Logo --}}
    
    <div id="menu-toggle" class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <nav>
      <ul id="navbar">
        <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
        <li><a href="/places" class="{{ request()->is('places') ? 'active' : '' }}">Places</a></li>
        <li><a href="/culture" class="{{ request()->is('culture') ? 'active' : '' }}">Culture</a></li>
        <li><a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
        <li><a href="/gallery" class="{{ request()->is('gallery') ? 'active' : '' }}">Gallery</a></li>
        <li><a href="/contact" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
      </ul>
    </nav>
  </header>

  {{-- ✅ Page Main Content --}}
  <main>
    @yield('content')
  </main>

  {{-- ✅ Footer --}}
  <footer>
    <p>© 2025. All rights reserved by Let's Explore Bangladesh.</p>
  </footer>

</body>
</html>
