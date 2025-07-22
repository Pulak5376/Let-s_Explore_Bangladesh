<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Let's Explore Bangladesh</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap"
      rel="stylesheet"
    />

    <style>
      :root {
        /* Brand palette */
        --clr-primary: #16a085;
        --clr-light: #ffffff;
        --clr-dark: #0b0c10;
        --clr-overlay: rgba(11, 12, 16, 0.55);
      }

      *,
      *::before,
      *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body,
      html {
        height: 100%;
        font-family: "Poppins", sans-serif;
        color: var(--clr-light);
        background-color: var(--clr-dark);
      }

      /* ---------- HERO ---------- */
      .hero {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        isolation: isolate; /* make overlay apply only inside */
        overflow: hidden;
      }

      .hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg");
        background-size: cover;
        background-position: center;
        transform: scale(1.05);
        transition: transform 15s ease-in-out;
        will-change: transform;
        animation: heroZoom 20s ease-in-out infinite alternate;
      }

      /* Continuous zoom animation */
      @keyframes heroZoom {
        0% { transform: scale(1.05); }
        100% { transform: scale(1.15); }
      }

      /* Animated gradient overlay */
      .hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
          45deg,
          rgba(22, 160, 133, 0.3) 0%,
          rgba(0, 0, 0, 0.4) 30%,
          rgba(11, 12, 16, 0.6) 70%,
          rgba(22, 160, 133, 0.2) 100%
        );
        animation: gradientShift 8s ease-in-out infinite;
      }

      @keyframes gradientShift {
        0%, 100% {
          background: linear-gradient(
            45deg,
            rgba(22, 160, 133, 0.3) 0%,
            rgba(0, 0, 0, 0.4) 30%,
            rgba(11, 12, 16, 0.6) 70%,
            rgba(22, 160, 133, 0.2) 100%
          );
        }
        50% {
          background: linear-gradient(
            225deg,
            rgba(22, 160, 133, 0.4) 0%,
            rgba(11, 12, 16, 0.5) 30%,
            rgba(0, 0, 0, 0.5) 70%,
            rgba(22, 160, 133, 0.3) 100%
          );
        }
      }

      /* Floating particles */
      .hero-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 0;
      }

      .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        pointer-events: none;
        animation: float 6s ease-in-out infinite;
      }

      .particle:nth-child(1) { width: 4px; height: 4px; left: 10%; animation-delay: 0s; }
      .particle:nth-child(2) { width: 6px; height: 6px; left: 20%; animation-delay: 1s; }
      .particle:nth-child(3) { width: 3px; height: 3px; left: 30%; animation-delay: 2s; }
      .particle:nth-child(4) { width: 5px; height: 5px; left: 40%; animation-delay: 0.5s; }
      .particle:nth-child(5) { width: 4px; height: 4px; left: 50%; animation-delay: 1.5s; }
      .particle:nth-child(6) { width: 7px; height: 7px; left: 60%; animation-delay: 2.5s; }
      .particle:nth-child(7) { width: 3px; height: 3px; left: 70%; animation-delay: 0.8s; }
      .particle:nth-child(8) { width: 5px; height: 5px; left: 80%; animation-delay: 1.8s; }
      .particle:nth-child(9) { width: 4px; height: 4px; left: 90%; animation-delay: 2.2s; }
      .particle:nth-child(10) { width: 6px; height: 6px; left: 15%; animation-delay: 3s; }

      @keyframes float {
        0%, 100% {
          transform: translateY(100vh) rotate(0deg);
          opacity: 0;
        }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% {
          transform: translateY(-100px) rotate(360deg);
          opacity: 0;
        }
      }

      .hero-content {
        position: relative;
        z-index: 1;
        max-width: 760px;
        padding-inline: 1.25rem;
        animation: fadeUp 1.2s ease 0.5s both;
      }

      .hero h1 {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        background: linear-gradient(
          135deg,
          #ffffff 0%,
          #16a085 50%,
          #ffffff 100%
        );
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: titleGlow 3s ease-in-out infinite, textShimmer 4s ease-in-out infinite;
        text-shadow: 0 0 30px rgba(22, 160, 133, 0.5);
        position: relative;
      }

      /* Glowing text animations */
      @keyframes titleGlow {
        0%, 100% { 
          filter: drop-shadow(0 0 10px rgba(22, 160, 133, 0.4));
          transform: scale(1);
        }
        50% { 
          filter: drop-shadow(0 0 25px rgba(22, 160, 133, 0.8));
          transform: scale(1.02);
        }
      }

      @keyframes textShimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
      }

      .hero p {
        margin-top: 0.75rem;
        font-size: clamp(1rem, 2.5vw, 1.25rem);
        color: #e4e4e4;
        line-height: 1.6;
        animation: fadeInUp 1.5s ease 1s both;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
      }

      /* Typing effect for subtitle */
      .hero p::before {
        content: "";
        animation: typing 3s steps(60) 2s both;
      }

      /* ---------- BUTTONS ---------- */
      .button-group {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
        animation: slideInUp 1.8s ease 1.5s both;
      }

      .btn {
        display: inline-block;
        padding: 0.75rem 2.4rem;
        font-weight: 600;
        font-size: 1rem;
        border-radius: 100vmax;
        border: 2px solid var(--clr-light);
        background: transparent;
        color: var(--clr-light);
        text-decoration: none;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(22, 160, 133, 0.2);
      }

      .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(
          90deg,
          transparent,
          rgba(255, 255, 255, 0.2),
          transparent
        );
        transition: left 0.6s;
      }

      .btn:hover::before {
        left: 100%;
      }

      .btn:hover,
      .btn:focus-visible {
        background: linear-gradient(135deg, var(--clr-primary), #1abc9c);
        color: var(--clr-light);
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(22, 160, 133, 0.4);
        border-color: var(--clr-primary);
      }

      .btn:active {
        transform: translateY(-1px);
        transition: transform 0.1s;
      }

      /* Pulse animation for buttons */
      .btn:nth-child(1) {
        animation: buttonPulse 2s ease-in-out 3s infinite;
      }

      .btn:nth-child(2) {
        animation: buttonPulse 2s ease-in-out 3.5s infinite;
      }

      @keyframes buttonPulse {
        0%, 100% { box-shadow: 0 8px 32px rgba(22, 160, 133, 0.2); }
        50% { box-shadow: 0 8px 32px rgba(22, 160, 133, 0.5), 0 0 0 10px rgba(22, 160, 133, 0.1); }
      }

      /* ---------- ANIMATIONS ---------- */
      @keyframes fadeUp {
        0% {
          opacity: 0;
          transform: translateY(60px);
        }
        100% {
          opacity: 1;
          transform: translateY(0);
        }
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

      @keyframes slideInUp {
        0% {
          opacity: 0;
          transform: translateY(50px) scale(0.8);
        }
        100% {
          opacity: 1;
          transform: translateY(0) scale(1);
        }
      }

      /* Scroll indicator */
      .scroll-indicator {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        color: rgba(255, 255, 255, 0.8);
        animation: bounce 2s infinite;
        font-size: 1.5rem;
        z-index: 2;
      }

      @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
          transform: translateX(-50%) translateY(0);
        }
        40% {
          transform: translateX(-50%) translateY(-10px);
        }
        60% {
          transform: translateX(-50%) translateY(-5px);
        }
      }

      /* ---------- RESPONSIVE ---------- */
      @media (max-width: 500px) {
        .btn {
          width: 100%;
          max-width: 280px;
        }
      }
    </style>
  </head>
  <body>
    <header class="hero">
      <!-- Floating particles -->
      <div class="hero-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
      </div>

      <div class="hero-content">
        <h1>Let's Explore Bangladesh</h1>
        <p>
          Discover breathtaking landscapes, vibrant culture, and unforgettable
          adventures across the lush land of Bengal.
        </p>
        <div class="button-group">
          <a class="btn" href="/login">Login</a>
          <a class="btn" href="/register">Register</a>
        </div>
      </div>

      <!-- Scroll indicator -->
      <div class="scroll-indicator">
        ↓
      </div>
    </header>
  </body>
</html>
