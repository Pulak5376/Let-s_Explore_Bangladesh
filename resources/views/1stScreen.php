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
        transform: scale(1);
        transition: transform 8s ease-in-out;
        will-change: transform;
      }

      /* Slow zoom effect */
      .hero:hover::before {
        transform: scale(1.08);
      }

      /* Dark overlay */
      .hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
          180deg,
          rgba(0, 0, 0, 0.25) 0%,
          var(--clr-overlay) 70%
        );
      }

      .hero-content {
        position: relative;
        z-index: 1;
        max-width: 760px;
        padding-inline: 1.25rem;
        animation: fadeUp 0.9s ease 0.15s both;
      }

      .hero h1 {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
      }

      .hero p {
        margin-top: 0.75rem;
        font-size: clamp(1rem, 2.5vw, 1.25rem);
        color: #e4e4e4;
        line-height: 1.6;
      }

      /* ---------- BUTTONS ---------- */
      .button-group {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
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
        transition: background 0.35s ease, color 0.35s ease;
      }

      .btn:hover,
      .btn:focus-visible {
        background: var(--clr-light);
        color: var(--clr-dark);
      }

      /* ---------- ANIMATIONS ---------- */
      @keyframes fadeUp {
        0% {
          opacity: 0;
          transform: translateY(40px);
        }
        100% {
          opacity: 1;
          transform: translateY(0);
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
    </header>
  </body>
</html>
