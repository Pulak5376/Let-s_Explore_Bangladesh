<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title') - Lets Explore Bangladesh</title>
  <link rel="stylesheet" href="/css/style.css" />
  <script src="/js/script.js" defer></script>
</head>
<body>
<header>
  <nav>
    <ul id="navbar">
      <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
      <li><a href="/places" class="{{ request()->is('places') ? 'active' : '' }}">Places</a></li>
      <li><a href="/culture" class="{{ request()->is('culture') ? 'active' : '' }}">Culture</a></li>
      <li><a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
      <li><a href="/gallery" class="{{ request()->is('gallery') ? 'active' : '' }}">Gallery</a></li>
      <li><a href="/contact" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
    </ul>

    <div id="menu-toggle" class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>
</header>

<main>
  @yield('content')
</main>

<footer>
  <p>© 2025. All rights reserved by Lets Explore Bangladesh.</p>
</footer>
</body>
</html>
