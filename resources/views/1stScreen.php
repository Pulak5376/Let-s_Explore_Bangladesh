<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Let's Explore Bangladesh</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <div class="hero">
    <div class="overlay"></div>

    <div class="content">
      <h1>Lets Explore Bangladesh</h1>
      <p>Explore bangladesh with us.</p>
      <div class="buttons">
        <a href="/login">Login</a>
        <a href="/register">Register</a>
      </div>
    </div>
  </div>

</body>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body,
  html {
    height: 100%;
    font-family: 'Segoe UI', sans-serif;
    color: #fff;
  }

  .hero {
    background-image: url('https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg');
    background-size: cover;
    background-position: center;
    height: 100vh;
    position: relative;
  }

  .overlay {
    background: rgba(0, 0, 0, 0.45);
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
  }

  .logo {
    font-size: 20px;
    font-weight: bold;
    border: 1px solid #fff;
    padding: 6px 12px;
  }

  .content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    z-index: 2;
    max-width: 90%;
  }

  .content h1 {
    font-size: 48px;
    line-height: 1.2;
    font-weight: bold;
    text-transform: uppercase;
  }

  .content p {
    margin-top: 10px;
    font-size: 20px;
    color: #ddd;
  }

  .buttons {
    margin-top: 20px;
  }

  .buttons a {
    display: inline-block;
    margin: 0 8px;
    padding: 10px 20px;
    border: 1px solid #fff;
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    transition: background 0.3s, color 0.3s;
  }

  .buttons a:hover {
    background: #fff;
    color: #000;
  }

  @media (max-width: 768px) {
    .nav {
      padding: 20px 30px;
      flex-direction: column;
      align-items: flex-start;
    }

    .nav-links {
      margin-top: 10px;
      flex-wrap: wrap;
      gap: 15px;
    }

    .content h1 {
      font-size: 32px;
    }

    .buttons a {
      margin: 6px;
      padding: 8px 16px;
    }
  }
</style>

</html>