<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>
  <!-- Dark Mode Toggle -->
  <div class="dark-mode-toggle" style="position: fixed; top: 20px; right: 20px; z-index: 1000;">
    <label for="darkToggle" style="color: white; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 10px;">
      <span>Dark Mode</span>
      <input type="checkbox" id="darkToggle" onchange="toggleDarkMode()" style="transform: scale(1.2);" />
    </label>
  </div>

  <main class="register-wrapper">
    <section class="register-card" aria-labelledby="registerTitle">
      <h1 id="registerTitle" class="register-title">Create Your Account</h1>

      <form id="registerForm">
        @csrf

        <div class="input-group">
          <label for="name" class="input-label">Full Name</label>
          <input type="text" id="name" name="name" placeholder="Your Name" required />
        </div>

        <div class="input-group">
          <label for="email" class="input-label">Email Address</label>
          <input type="email" id="email" name="email" placeholder="you@example.com" required />
        </div>

        <div class="input-group">
          <label for="password" class="input-label">Password</label>
          <input type="password" id="password" name="password" placeholder="••••••••" required />
        </div>

        <div class="input-group">
          <label for="password_confirmation" class="input-label">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required />
        </div>

        <button type="submit" class="btn-primary">Sign Up</button>
      </form>

      <p class="login-text">
        Already have an account?
        <a href="/login" class="login-link">Log in here</a>
      </p>
    </section>
  </main>

  <style>
    * {
      box-sizing: border-box;
    }

    body,
    html {
      margin: 0;
      height: 100%;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #0f3443, #1c5873);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .register-wrapper {
      width: 100%;
      max-width: 420px;
      padding: 1rem;
    }

    .register-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 12px 30px rgba(28, 88, 115, 0.25);
      padding: 2.5rem 3rem;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .register-title {
      font-weight: 700;
      font-size: 2.25rem;
      color: #1c5873;
      margin-bottom: 1.5rem;
      text-align: center;
    }

    form {
      width: 100%;
    }

    .input-group {
      margin-bottom: 1.25rem;
    }

    .input-label {
      display: block;
      margin-bottom: 0.4rem;
      font-weight: 600;
      font-size: 0.9rem;
      color: #34495e;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      border: 1.5px solid #d1d8e0;
      font-size: 1rem;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input:focus {
      outline: none;
      border-color: #1c5873;
      box-shadow: 0 0 8px rgba(28, 88, 115, 0.4);
    }

    .btn-primary {
      width: 100%;
      padding: 0.9rem 0;
      background-color: #296e8a;
      color: #fff;
      font-size: 1.1rem;
      font-weight: 700;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      box-shadow: 0 6px 15px rgba(28, 88, 115, 0.5);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-primary:hover,
    .btn-primary:focus {
      background-color: #16475a;
      box-shadow: 0 8px 20px rgba(22, 71, 90, 0.7);
      outline: none;
    }

    .login-text {
      margin-top: 1.75rem;
      font-size: 0.9rem;
      color: #34495e;
      text-align: center;
    }

    .login-link {
      color: #1c5873;
      text-decoration: none;
      font-weight: 600;
      margin-left: 0.25rem;
    }

    .login-link:hover,
    .login-link:focus {
      text-decoration: underline;
    }

    /* Dark Mode Styles */
    body.dark-mode {
      background: linear-gradient(135deg, #1a1a1a, #2d2d2d) !important;
    }

    body.dark-mode .register-card {
      background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%) !important;
      box-shadow: 0 12px 30px rgba(76, 175, 80, 0.25) !important;
      border: 1px solid rgba(102, 187, 106, 0.3) !important;
    }

    body.dark-mode .register-title {
      color: #81c784 !important;
    }

    body.dark-mode .input-label {
      color: #b0bec5 !important;
    }

    body.dark-mode input[type="text"],
    body.dark-mode input[type="email"],
    body.dark-mode input[type="password"] {
      background: rgba(50, 50, 50, 0.9) !important;
      border-color: #4caf50 !important;
      color: #e0e0e0 !important;
    }

    body.dark-mode input[type="text"]::placeholder,
    body.dark-mode input[type="email"]::placeholder,
    body.dark-mode input[type="password"]::placeholder {
      color: #a0a0a0 !important;
    }

    body.dark-mode input[type="text"]:focus,
    body.dark-mode input[type="email"]:focus,
    body.dark-mode input[type="password"]:focus {
      border-color: #66bb6a !important;
      box-shadow: 0 0 8px rgba(102, 187, 106, 0.4) !important;
    }

    body.dark-mode .btn-primary {
      background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
      box-shadow: 0 6px 15px rgba(76, 175, 80, 0.5) !important;
    }

    body.dark-mode .btn-primary:hover,
    body.dark-mode .btn-primary:focus {
      background: linear-gradient(135deg, #4caf50, #2e7d32) !important;
      box-shadow: 0 8px 20px rgba(76, 175, 80, 0.7) !important;
    }

    body.dark-mode .login-text {
      color: #b0bec5 !important;
    }

    body.dark-mode .login-link {
      color: #66bb6a !important;
    }
  </style>

  <script>
    function toggleDarkMode() {
      const isDark = document.body.classList.toggle('dark-mode');
      document.getElementById('darkToggle').checked = isDark;
      localStorage.setItem('darkMode', isDark);
    }

    // Load dark mode preference
    document.addEventListener('DOMContentLoaded', () => {
      const savedDarkMode = localStorage.getItem('darkMode') === 'true';
      if (savedDarkMode) {
        document.body.classList.add('dark-mode');
        document.getElementById('darkToggle').checked = true;
      }

      // Make toggleDarkMode globally accessible
      window.toggleDarkMode = toggleDarkMode;
    });
  </script>
</body>

</html>
