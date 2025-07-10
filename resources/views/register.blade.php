<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sign Up - Let's Explore Bangladesh</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <body>
  <div class="form-container">
    <h2>Sign Up</h2>
    <form>
      <input type="text" placeholder="Full Name" required />
      <input type="email" placeholder="Email" required />
      <input type="password" placeholder="Password" required />
      <button type="submit">Create Account</button>
    </form>
    <div class="link">
      Already have an account? <a href="login.html">Log in</a>
    </div>
  </div>
</body>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f3f4f6;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .form-container {
      background: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }
    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #2ecc71;
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background: #27ae60;
    }
    .link {
      text-align: center;
      margin-top: 15px;
    }
    .link a {
      color: #3498db;
      text-decoration: none;
    }
  </style>
</head>

</html>
