<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="login.css" />
</head>

<body>
  <main class="login-wrapper">
    <section class="login-card" aria-labelledby="loginTitle">
      <h1 id="loginTitle" class="login-title">Let's Explore Bangladesh</h1>

      <form id="loginForm" action="{{ route('welcome') }}" method="POST">
        @csrf

        <div class="input-group">
          <label for="email" class="input-label">Email Address</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="you@example.com"
            required
            autocomplete="email"
            aria-describedby="emailHelp" />
          <small id="emailHelp" class="input-error" aria-live="polite"></small>
        </div>

        <div class="input-group">
          <label for="password" class="input-label">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="••••••••"
            required
            autocomplete="current-password"
            aria-describedby="passwordHelp" />
          <small id="passwordHelp" class="input-error" aria-live="polite"></small>
        </div>

        <button type="submit" class="btn-primary">Login</button>
        <p id="formError" class="form-error" aria-live="assertive"></p>
      </form>

      <p class="register-text">
        Don't have an account?
        <a href="/register" class="register-link">Sign up here</a>
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

    .login-wrapper {
      width: 100%;
      max-width: 420px;
      padding: 1rem;
    }

    .login-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 12px 30px rgba(28, 88, 115, 0.25);
      padding: 2.5rem 3rem;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .login-title {
      font-weight: 700;
      font-size: 2.25rem;
      color: #1c5873;
      margin-bottom: 1rem;
      text-align: center;
    }

    form {
      width: 100%;
    }

    .input-group {
      margin-bottom: 1.5rem;
      position: relative;
    }

    .input-label {
      display: block;
      margin-bottom: 0.4rem;
      font-weight: 600;
      font-size: 0.9rem;
      color: #34495e;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      border: 1.5px solid #d1d8e0;
      font-size: 1rem;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
      outline: none;
      border-color: #1c5873;
      box-shadow: 0 0 8px rgba(28, 88, 115, 0.4);
    }

    .input-error {
      color: #d33f2eff;
      font-size: 0.8rem;
      height: 1.2rem;
      margin-top: 0.25rem;
      visibility: hidden;
    }

    .btn-primary {
      width: 100%;
      padding: 0.9rem 0;
      background-color: #296e8aff;
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

    .form-error {
      margin-top: 1rem;
      font-weight: 600;
      color: #e74c3c;
      text-align: center;
      min-height: 1.2rem;
      visibility: hidden;
    }

    .register-text {
      margin-top: 1.75rem;
      font-size: 0.9rem;
      color: #34495e;
      text-align: center;
    }

    .register-link {
      color: #1c5873;
      text-decoration: none;
      font-weight: 600;
      margin-left: 0.25rem;
    }

    .register-link:hover,
    .register-link:focus {
      text-decoration: underline;
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const form = document.getElementById('loginForm');
      const emailInput = form.email;
      const passwordInput = form.password;

      const emailError = document.getElementById('emailHelp');
      const passwordError = document.getElementById('passwordHelp');
      const formError = document.getElementById('formError');

      function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
      }

      form.addEventListener('submit', (e) => {
        emailError.textContent = '';
        passwordError.textContent = '';
        formError.textContent = '';
        emailInput.classList.remove('invalid');
        passwordInput.classList.remove('invalid');
        formError.classList.remove('visible');

        let valid = true;

        if (!emailInput.value.trim()) {
          emailError.textContent = 'Email is required.';
          emailInput.classList.add('invalid');
          valid = false;
        } else if (!validateEmail(emailInput.value.trim())) {
          emailError.textContent = 'Please enter a valid email address.';
          emailInput.classList.add('invalid');
          valid = false;
        }

        if (!passwordInput.value) {
          passwordError.textContent = 'Password is required.';
          passwordInput.classList.add('invalid');
          valid = false;
        }

        if (!valid) {
          e.preventDefault();
          return;
        }

        e.preventDefault();

        setTimeout(() => {
          alert(`Welcome back, ${emailInput.value.trim()}!`);
          form.submit();
        }, 200);
      });
    });
  </script>
</body>

</html>
