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
      --header-bg: rgba(42, 197, 60, 1);
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
      box-shadow: 0 8px 20px rgba(93, 160, 81, 0.26);
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
            <li><a href="{{ url('/reviews') }}">Review</a></li>
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

  <!-- AI Chatbot Support System -->
  <div id="chatbot-container" class="chatbot-hidden">
    <div class="chatbot-header">
      <div class="chatbot-title">
        <div class="chatbot-avatar">🤖</div>
        <div class="chatbot-info">
          <h4>Bangladesh Travel Assistant</h4>
          <span class="chatbot-status">
            <span class="status-indicator"></span>
            Online
          </span>
        </div>
      </div>
      <div class="chatbot-controls">
        <button class="minimize-btn" onclick="minimizeChatbot()">−</button>
        <button class="close-btn" onclick="closeChatbot()">×</button>
      </div>
    </div>
    
    <div class="chatbot-messages" id="chatbot-messages">
      <div class="message bot-message">
        <div class="message-avatar">🇧🇩</div>
        <div class="message-content">
          <p>Hi there! I'm your Bangladesh Travel Assistant. I can help you with:</p>
          <ul>
            <li>🗺️ Finding the best destinations</li>
            <li>🏨 Hotel recommendations</li>
            <li>✈️ Flight and travel planning</li>
            <li>🍜 Local food suggestions</li>
            <li>📸 Photography spots</li>
            <li>💰 Budget planning</li>
          </ul>
          <p>What would you like to explore in Bangladesh?</p>
        </div>
      </div>
    </div>
    
    <div class="chatbot-suggestions">
      <button class="suggestion-btn" onclick="sendSuggestion('Best places to visit in Bangladesh')">
        🏞️ Best Places
      </button>
      <button class="suggestion-btn" onclick="sendSuggestion('Cox Bazar travel guide')">
        🏖️ Cox Bazar
      </button>
      <button class="suggestion-btn" onclick="sendSuggestion('Sundarban tour packages')">
        🐅 Sundarban
      </button>
    </div>
    
    <div class="chatbot-input">
      <div class="input-group">
        <input type="text" id="chatbot-input" placeholder="Ask me anything about Bangladesh travel..." />
        <button class="send-btn" onclick="sendMessage()">
          <span class="send-icon">📤</span>
        </button>
      </div>
    </div>
  </div>

  <!-- Floating Chatbot Button -->
  <button class="chatbot-toggle" onclick="toggleChatbot()" id="chatbot-toggle">
    <span class="chat-icon">💬</span>
    <span class="notification-badge" id="notification-badge">1</span>
  </button>

  <!-- Chatbot Styles -->
  <style>
    /* Chatbot Toggle Button */
    .chatbot-toggle {
      position: fixed;
      bottom: 20px;
      right: 1px;
      width: 60px;
      height: 60px;
      background: linear-gradient(135deg, #00695c, #4caf50);
      border: none;
      border-radius: 50%;
      box-shadow: 0 4px 20px rgba(0, 105, 92, 0.3);
      cursor: pointer;
      z-index: 1000;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .chatbot-toggle:hover {
      transform: scale(1.1);
      box-shadow: 0 6px 25px rgba(0, 105, 92, 0.4);
    }

    .chatbot-toggle .chat-icon {
      font-size: 24px;
      transition: transform 0.3s ease;
    }

    .chatbot-toggle.active .chat-icon {
      transform: rotate(180deg);
    }

    .notification-badge {
      position: absolute;
      top: -5px;
      right: -5px;
      background: #f44336;
      color: white;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      font-size: 12px;
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: center;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.2); }
    }

    /* Chatbot Container */
    #chatbot-container {
      position: fixed;
      bottom: 90px;
      right: 40px;
      width: 380px;
      height: 600px;
      background: white;
      border-radius: 20px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
      z-index: 999;
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      border: 2px solid rgba(0, 105, 92, 0.1);
    }

    #chatbot-container.chatbot-hidden {
      transform: translateY(100%) scale(0.8);
      opacity: 0;
      pointer-events: none;
    }

    #chatbot-container.chatbot-minimized {
      height: 70px;
    }

    /* Chatbot Header */
    .chatbot-header {
      background: linear-gradient(135deg, #00695c, #4caf50);
      color: white;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .chatbot-title {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .chatbot-avatar {
      width: 40px;
      height: 40px;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
    }

    .chatbot-info h4 {
      margin: 0;
      font-size: 16px;
      font-weight: 600;
    }

    .chatbot-status {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 12px;
      opacity: 0.9;
    }

    .status-indicator {
      width: 8px;
      height: 8px;
      background: #4caf50;
      border-radius: 50%;
      animation: blink 2s infinite;
    }

    @keyframes blink {
      0%, 50% { opacity: 1; }
      51%, 100% { opacity: 0.3; }
    }

    .chatbot-controls {
      display: flex;
      gap: 10px;
    }

    .minimize-btn, .close-btn {
      width: 30px;
      height: 30px;
      background: rgba(255, 255, 255, 0.2);
      border: none;
      border-radius: 50%;
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .minimize-btn:hover, .close-btn:hover {
      background: rgba(255, 255, 255, 0.3);
    }

    /* Messages Area */
    .chatbot-messages {
      flex: 1;
      padding: 20px;
      overflow-y: auto;
      background: #f8f9fa;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .message {
      display: flex;
      gap: 12px;
      align-items: flex-start;
    }

    .message-avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: #00695c;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      flex-shrink: 0;
    }

    .user-message .message-avatar {
      background: #2196f3;
      order: 2;
    }

    .user-message {
      flex-direction: row-reverse;
    }

    .message-content {
      background: white;
      border-radius: 18px;
      padding: 12px 16px;
      max-width: 250px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      animation: messageSlide 0.3s ease;
    }

    .user-message .message-content {
      background: #2196f3;
      color: white;
    }

    @keyframes messageSlide {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .message-content p {
      margin: 0 0 8px 0;
      font-size: 14px;
      line-height: 1.4;
    }

    .message-content p:last-child {
      margin-bottom: 0;
    }

    .message-content ul {
      margin: 8px 0;
      padding-left: 16px;
      font-size: 14px;
    }

    .message-content li {
      margin-bottom: 4px;
    }

    /* Suggestions */
    .chatbot-suggestions {
      padding: 15px 20px;
      background: white;
      border-top: 1px solid #e0e0e0;
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .suggestion-btn {
      background: rgba(0, 105, 92, 0.1);
      border: 1px solid rgba(0, 105, 92, 0.2);
      color: #00695c;
      padding: 8px 12px;
      border-radius: 20px;
      font-size: 12px;
      cursor: pointer;
      transition: all 0.3s ease;
      white-space: nowrap;
    }

    .suggestion-btn:hover {
      background: #00695c;
      color: white;
      transform: translateY(-2px);
    }

    /* Input Area */
    .chatbot-input {
      padding: 20px;
      background: white;
      border-top: 1px solid #e0e0e0;
    }

    .input-group {
      display: flex;
      gap: 10px;
      align-items: center;
    }

    #chatbot-input {
      flex: 1;
      padding: 12px 16px;
      border: 2px solid #e0e0e0;
      border-radius: 25px;
      font-size: 14px;
      outline: none;
      transition: border-color 0.3s ease;
    }

    #chatbot-input:focus {
      border-color: #00695c;
    }

    .send-btn {
      width: 45px;
      height: 45px;
      background: linear-gradient(135deg, #00695c, #4caf50);
      border: none;
      border-radius: 50%;
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .send-btn:hover {
      transform: scale(1.1);
      box-shadow: 0 4px 15px rgba(0, 105, 92, 0.3);
    }

    .send-icon {
      font-size: 16px;
    }

    /* Dark Mode Support */
    body.dark-mode #chatbot-container {
      background: #2d2d2d;
      border-color: rgba(102, 187, 106, 0.2);
    }

    body.dark-mode .chatbot-messages {
      background: #1a1a1a;
    }

    body.dark-mode .message-content {
      background: #3d3d3d;
      color: #e0e0e0;
    }

    body.dark-mode .chatbot-input {
      background: #2d2d2d;
      border-color: rgba(102, 187, 106, 0.2);
    }

    body.dark-mode #chatbot-input {
      background: #3d3d3d;
      color: #e0e0e0;
      border-color: rgba(102, 187, 106, 0.3);
    }

    body.dark-mode .chatbot-suggestions {
      background: #2d2d2d;
      border-color: rgba(102, 187, 106, 0.2);
    }

    body.dark-mode .suggestion-btn {
      background: rgba(102, 187, 106, 0.1);
      border-color: rgba(102, 187, 106, 0.2);
      color: #66bb6a;
    }

    body.dark-mode .suggestion-btn:hover {
      background: #66bb6a;
      color: #1a1a1a;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
      #chatbot-container {
        width: calc(100vw - 40px);
        height: calc(100vh - 100px);
        bottom: 10px;
        right: 20px;
      }

      .chatbot-toggle {
        bottom: 10px;
        right: 20px;
      }

      .suggestion-btn {
        font-size: 11px;
        padding: 6px 10px;
      }
    }
  </style>

  <!-- Chatbot JavaScript -->
  <script>
    let chatbotOpen = false;
    let chatbotMinimized = false;

    // Predefined responses for Bangladesh travel
    const chatbotResponses = {
      'best places': [
        "🏞️ Here are Bangladesh's top destinations:",
        "• Cox's Bazar - World's longest natural beach",
        "• Sundarban - Royal Bengal Tiger habitat",
        "• Sajek Valley - Above the clouds experience", 
        "• Saint Martin Island - Coral island paradise",
        "• Srimangal - Tea garden capital",
        "• Bandarban - Hill district beauty",
        "• Rangamati - Lake district",
        "• Paharpur - Ancient Buddhist monastery"
      ],
      'cox bazar': [
        "🏖️ Cox's Bazar Travel Guide:",
        "• 120km long natural beach",
        "• Best time: October to March",
        "• Activities: Beach walking, surfing, parasailing",
        "• Must visit: Himchari, Inani Beach, Teknaf",
        "• Stay: Sea Crown Hotel, Long Beach Hotel",
        "• Food: Fresh seafood, Burmese cuisine"
      ],
      'sundarban': [
        "🐅 Sundarban Mangrove Forest:",
        "• UNESCO World Heritage Site",
        "• Home to Royal Bengal Tigers",
        "• Best time: November to February",
        "• Duration: 2-3 days tour",
        "• Activities: Boat safari, bird watching",
        "• Entry: Through Mongla or Khulna",
        "• Book through authorized tour operators"
      ],
      'hotel': [
        "🏨 Hotel Recommendations by Area:",
        "Cox's Bazar: Sea Crown, Long Beach Hotel",
        "Dhaka: Pan Pacific, The Westin",
        "Chittagong: Peninsula, Agrabad Hotel",
        "Sylhet: Grand Sylhet, Rose View Hotel",
        "Budget options available in all areas",
        "Book in advance during peak season"
      ],
      'food': [
        "🍜 Must-try Bangladesh Foods:",
        "• Hilsa fish curry (national fish)",
        "• Biryani (aromatic rice dish)",
        "• Panta bhat (traditional breakfast)",
        "• Roshogolla & Mishti doi (sweets)",
        "• Fuchka/Pani puri (street food)",
        "• Kacchi biryani",
        "• Shorshe ilish (hilsa in mustard)"
      ],
      'budget': [
        "💰 Bangladesh Travel Budget Guide:",
        "Budget: $20-30/day",
        "• Accommodation: $5-15/night",
        "• Food: $3-8/day",
        "• Transport: $2-10/day",
        "• Activities: $5-20/day",
        "Mid-range: $40-80/day",
        "Luxury: $100+/day"
      ],
      'transport': [
        "🚌 Transportation in Bangladesh:",
        "• Domestic flights (fastest)",
        "• AC buses (comfortable)",
        "• Trains (scenic routes)",
        "• CNG/Rickshaw (local transport)",
        "• Launch/Ferry (river routes)",
        "• Rent a car with driver",
        "Book tickets in advance for comfort"
      ]
    };

    function toggleChatbot() {
      const container = document.getElementById('chatbot-container');
      const toggle = document.getElementById('chatbot-toggle');
      const badge = document.getElementById('notification-badge');
      
      chatbotOpen = !chatbotOpen;
      
      if (chatbotOpen) {
        container.classList.remove('chatbot-hidden');
        toggle.classList.add('active');
        badge.style.display = 'none';
        setTimeout(() => {
          document.getElementById('chatbot-input').focus();
        }, 300);
      } else {
        container.classList.add('chatbot-hidden');
        toggle.classList.remove('active');
        chatbotMinimized = false;
      }
    }

    function minimizeChatbot() {
      const container = document.getElementById('chatbot-container');
      chatbotMinimized = !chatbotMinimized;
      
      if (chatbotMinimized) {
        container.classList.add('chatbot-minimized');
      } else {
        container.classList.remove('chatbot-minimized');
      }
    }

    function closeChatbot() {
      const container = document.getElementById('chatbot-container');
      const toggle = document.getElementById('chatbot-toggle');
      
      container.classList.add('chatbot-hidden');
      toggle.classList.remove('active');
      chatbotOpen = false;
      chatbotMinimized = false;
    }

    function sendMessage() {
      const input = document.getElementById('chatbot-input');
      const message = input.value.trim();
      
      if (message) {
        addMessage(message, 'user');
        input.value = '';
        
        // Simulate typing delay
        setTimeout(() => {
          const response = generateResponse(message);
          addMessage(response, 'bot');
        }, 1000);
      }
    }

    function sendSuggestion(suggestion) {
      document.getElementById('chatbot-input').value = suggestion;
      sendMessage();
    }

    function addMessage(content, sender) {
      const messagesContainer = document.getElementById('chatbot-messages');
      const messageDiv = document.createElement('div');
      messageDiv.className = `message ${sender}-message`;
      
      const avatar = sender === 'user' ? '👤' : '🇧🇩';
      
      if (Array.isArray(content)) {
        content = content.join('<br>');
      }
      
      messageDiv.innerHTML = `
        <div class="message-avatar">${avatar}</div>
        <div class="message-content">
          <p>${content}</p>
        </div>
      `;
      
      messagesContainer.appendChild(messageDiv);
      messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    function generateResponse(message) {
      const lowerMessage = message.toLowerCase();
      
      // Check for keywords and return appropriate response
      for (const [keyword, response] of Object.entries(chatbotResponses)) {
        if (lowerMessage.includes(keyword)) {
          return response;
        }
      }
      
      // Default responses for common queries
      if (lowerMessage.includes('hello') || lowerMessage.includes('hi')) {
        return "Hello! 👋 Welcome to Bangladesh Travel Assistant. How can I help you plan your amazing journey in Bangladesh?";
      }
      
      if (lowerMessage.includes('thank')) {
        return "You're welcome! 😊 Have an amazing time exploring Bangladesh. Feel free to ask if you need more help!";
      }
      
      if (lowerMessage.includes('weather')) {
        return "🌤️ Bangladesh Weather:<br>• Winter (Dec-Feb): 10-25°C, best time to visit<br>• Summer (Mar-May): 25-40°C, hot & humid<br>• Monsoon (Jun-Sep): Heavy rainfall<br>• Post-monsoon (Oct-Nov): Pleasant weather";
      }
      
      if (lowerMessage.includes('visa')) {
        return "📋 Visa Information:<br>• Visa on arrival for many countries<br>• Tourist visa: 30 days<br>• Required: Passport, photos, return ticket<br>• Fee: varies by nationality<br>• Check with Bangladesh embassy in your country";
      }
      
      // Generic helpful response
      return [
        "I'd be happy to help you with that! 🤔",
        "Try asking me about:",
        "• Best places to visit",
        "• Hotel recommendations", 
        "• Food suggestions",
        "• Travel budget",
        "• Transportation",
        "• Weather information",
        "• Visa requirements"
      ];
    }

    // Enter key support
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('chatbot-input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
          sendMessage();
        }
      });
    });
  </script>

</body>
</html>