<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>
  <main class="register-wrapper">
    <section class="register-card" aria-labelledby="registerTitle">
      <h1 id="registerTitle" class="register-title">Create Your Account</h1>

      <div id="msg-box" style="display:none;"></div>
      <form id="registerForm" >
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

        <button type="submit" class="btn-primary" id="submit-btn">Sign Up</button>
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

    #msg-box {
      width: 100%;
      margin-bottom: 1rem;
      padding: 0.85rem 1.2rem;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      text-align: center;
      display: none;
      transition: opacity 0.3s;
    }
    #msg-box.success {
      background: #e6f9ed;
      color: #20734c;
      border: 1.5px solid #4caf50;
      box-shadow: 0 2px 8px rgba(76, 175, 80, 0.08);
    }
    #msg-box.error {
      background: #ffeaea;
      color: #b71c1c;
      border: 1.5px solid #e53935;
      box-shadow: 0 2px 8px rgba(229, 57, 53, 0.08);
    }
    body.dark-mode #msg-box.success {
      background: #1b3c2b;
      color: #81c784;
      border-color: #388e3c;
    }
    body.dark-mode #msg-box.error {
      background: #3a2323;
      color: #ef9a9a;
      border-color: #e57373;
    }

  </style>

  <script>
    const subbtn = document.getElementById('submit-btn');
    const msgBox = document.getElementById('msg-box');

    function showMsg(msg, type) {
      msgBox.textContent = msg;
      msgBox.className = type;
      msgBox.style.display = 'block';
      msgBox.style.opacity = '1';
    }
    function hideMsg() {
      msgBox.style.opacity = '0';
      setTimeout(() => { msgBox.style.display = 'none'; }, 300);
    }

    subbtn.addEventListener('click', function(event) {
      event.preventDefault();
      hideMsg();
      const pass = document.getElementById('password').value;
      const confirmPass = document.getElementById('password_confirmation').value;

      const form = new FormData(document.getElementById('registerForm'));
      if (!form.get('name') || !form.get('email') || !form.get('password') || !form.get('password_confirmation')) {
        setTimeout(() => {
          showMsg('Please fill in all fields!', 'error');
        }, 300);
        return;
      }
      if (pass.length < 4) {
        setTimeout(() => {
          showMsg('Password must be at least 4 characters long!', 'error');
        }, 1000);
        return;
      }
      if (pass !== confirmPass) {
        setTimeout(() => {
        showMsg('Passwords do not match!', 'error');
        }, 1000);
        return;
      }
      fetch('/signup', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
          'Accept': 'application/json'
        },
        body: new FormData(document.getElementById('registerForm'))
      }).then(
        data => data.json()
      ).then(
        (data) => {
          if (data.success) {
            showMsg("Registration successful!", 'success');
            setTimeout(() => {
              window.location.href = "/login";
            }, 1200);
          } else {
            setTimeout(() => {
              showMsg("Registration failed: " + data.message, 'error');
            }, 1000);
          }
        }
      ).catch(() => {
        setTimeout(() => {
          showMsg("An error occurred. Please try again.", 'error');
        }, 500);
      });
    });
  </script>
</body>

</html>