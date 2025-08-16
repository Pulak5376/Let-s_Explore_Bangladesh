<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>
    <div id="msg-box" style="display:none;"></div>
    <main class="login-wrapper">
        <section class="login-card" aria-labelledby="loginTitle">
            <h1 id="loginTitle" class="login-title">Let's Explore Bangladesh</h1>

            <form id="loginForm">
                @csrf
                <div class="input-group">
                    <label for="email" class="input-label">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" required />
                    <small id="emailHelp" class="input-error" aria-live="polite"></small>
                </div>
                <div class="input-group">
                    <label for="password" class="input-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required />
                    <small id="passwordHelp" class="input-error" aria-live="polite"></small>
                </div>
                <button type="submit" class="btn-primary" id="login-btn">Login</button>
                <p id="formError" class="form-error" aria-live="assertive"></p>
            </form>
            <p class="register-text">
                Don't have an account?
                <a href="/register" class="register-link">Sign up here</a>
            </p>
            <p class="register-text">
                <a href="/admin/login" class="register-link">Log in as ADMIN</a>
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

        .form-error {
            margin-top: 1rem;
            font-weight: 600;
            color: #e74c3c;
            text-align: center;
            min-height: 1.2rem;
        }

        .input-error {
            color: #d33f2e;
            font-size: 0.8rem;
            height: 1rem;
            margin-top: 0.25rem;
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

        .register-link:hover {
            text-decoration: underline;
        }

        #msg-box {
            position: fixed;
            top: 32px;
            left: 50%;
            transform: translateX(-50%) translateY(-40px);
            min-width: 320px;
            max-width: 90vw;
            z-index: 9999;
            padding: 1rem 2rem;
            border-radius: 10px;
            font-size: 1.08rem;
            font-weight: 600;
            text-align: center;
            display: none;
            opacity: 0;
            transition: opacity 0.4s, transform 0.4s;
            box-shadow: 0 4px 18px rgba(44, 62, 80, 0.10);
            letter-spacing: 0.01em;
        }

        #msg-box.show {
            display: block;
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        #msg-box.success {
            background: linear-gradient(90deg, #e6f9ed 80%, #b2f7cc 100%);
            color: #20734c;
            border: 2px solid #4caf50;
            box-shadow: 0 2px 12px rgba(76, 175, 80, 0.10);
        }

        #msg-box.success::before {
            content: "✔ ";
            font-size: 1.2em;
            color: #43a047;
            margin-right: 0.5em;
        }

        #msg-box.error {
            background: linear-gradient(90deg, #ffeaea 80%, #ffd6d6 100%);
            color: #b71c1c;
            border: 2px solid #e53935;
            box-shadow: 0 2px 12px rgba(229, 57, 53, 0.10);
        }

        #msg-box.error::before {
            content: "✖ ";
            font-size: 1.2em;
            color: #e53935;
            margin-right: 0.5em;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('loginForm');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const emailError = document.getElementById('emailHelp');
            const passwordError = document.getElementById('passwordHelp');
            const formError = document.getElementById('formError');
            const msgBox = document.getElementById('msg-box');

            function showMsg(msg, type) {
                msgBox.textContent = msg;
                msgBox.className = type + ' show';
                msgBox.style.display = 'block';
                setTimeout(() => {
                    msgBox.style.opacity = '1';
                    msgBox.style.transform = 'translateX(-50%) translateY(0)';
                }, 10);
            }

            function hideMsg() {
                msgBox.style.opacity = '0';
                msgBox.style.transform = 'translateX(-50%) translateY(-40px)';
                setTimeout(() => {
                    msgBox.style.display = 'none';
                    msgBox.className = '';
                }, 400);
            }

            form.addEventListener('submit', async (e) => {
                e.preventDefault();

                emailError.textContent = '';
                passwordError.textContent = '';
                formError.textContent = '';

                let valid = true;

                if (!emailInput.value.trim()) {
                    emailError.textContent = 'Email is required.';
                    valid = false;
                }

                if (!passwordInput.value.trim()) {
                    passwordError.textContent = 'Password is required.';
                    valid = false;
                }

                if (!valid) return;

                const formData = new FormData(form);

                try {
                    const response = await fetch('/login', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]')
                                .value,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (response.ok) {
                        showMsg('Login successful!', 'success');
                        setTimeout(() => {
                            hideMsg();
                            window.location.href = '/welcome';
                        }, 2000);
                    } else {
                        showMsg(result.message || 'Login failed.', 'error');
                        setTimeout(hideMsg, 2000);
                    }
                } catch (error) {
                    console.error('Login error:', error);
                    showMsg('Something went wrong. Please try again.', 'error');
                    setTimeout(hideMsg, 2000);
                }
                if (result.redirect) {
                    window.location.href = result.redirect;
                }
            });
        });
    </script>
</body>

</html>
