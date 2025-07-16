@extends('layouts.app')

@section('title', 'Weather Check')

@section('content')
<section style="
  background-image: url('https://images.unsplash.com/photo-1503264116251-35a269479413?auto=format&fit=crop&w=1350&q=80');
  background-size: cover;
  background-position: center;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
  backdrop-filter: blur(2px);
">
  <div class="weather-card">
    <h1>🌤️ Weather Check</h1>
    <p>Live weather updates for cities in Bangladesh</p>

    <form id="weatherForm">
      <input type="text" id="city" name="city" placeholder="Enter city (e.g. Dhaka)" required />
      <button type="submit">Check Weather</button>
    </form>

    <div id="weatherResult"></div>
  </div>
</section>

<style>
.weather-card {
  background: rgba(255, 255, 255, 0.95);
  padding: 35px 25px;
  border-radius: 18px;
  width: 100%;
  max-width: 480px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
  text-align: center;
  backdrop-filter: blur(10px);
  border: 1px solid #e0e0e0;
}

.weather-card h1 {
  font-size: 2.4rem;
  color: #1a73e8;
  margin-bottom: 12px;
  font-weight: 700;
}

.weather-card p {
  font-size: 1rem;
  color: #444;
  margin-bottom: 28px;
}

.weather-card input[type="text"] {
  padding: 12px 14px;
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
  margin-bottom: 15px;
  outline: none;
  transition: border-color 0.3s ease;
}

.weather-card input[type="text"]:focus {
  border-color: #1a73e8;
}

.weather-card button {
  width: 100%;
  padding: 12px;
  background: linear-gradient(135deg, #1a73e8, #4285f4);
  color: #fff;
  font-size: 16px;
  font-weight: 600;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.weather-card button:hover {
  background: linear-gradient(135deg, #155ab6, #3367d6);
}

#weatherResult {
  margin-top: 30px;
  font-size: 16px;
  color: #333;
}

.spinner {
  border: 4px solid #eee;
  border-top: 4px solid #1a73e8;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  margin: 20px auto;
  animation: spin 1.5s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Dark Mode Styles */
body.dark-mode .weather-card {
  background: rgba(44, 44, 44, 0.95) !important;
  border-color: rgba(102, 187, 106, 0.3) !important;
  box-shadow: 0 12px 30px rgba(76, 175, 80, 0.25) !important;
}

body.dark-mode .weather-card h1 {
  color: #81c784 !important;
}

body.dark-mode .weather-card p {
  color: #b0bec5 !important;
}

body.dark-mode .weather-card input {
  background: rgba(50, 50, 50, 0.9) !important;
  border-color: #4caf50 !important;
  color: #e0e0e0 !important;
}

body.dark-mode .weather-card input::placeholder {
  color: #a0a0a0 !important;
}

body.dark-mode .weather-card input:focus {
  border-color: #66bb6a !important;
  box-shadow: 0 0 8px rgba(102, 187, 106, 0.4) !important;
}

body.dark-mode .weather-card button {
  background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
  border-color: #4caf50 !important;
}

body.dark-mode .weather-card button:hover {
  background: linear-gradient(135deg, #4caf50, #2e7d32) !important;
  box-shadow: 0 8px 20px rgba(76, 175, 80, 0.4) !important;
}

body.dark-mode #weatherResult h2 {
  color: #66bb6a !important;
}

body.dark-mode #weatherResult p {
  color: #a5d6a7 !important;
}

@media (max-width: 500px) {
  .weather-card {
    padding: 25px 18px;
  }

  .weather-card h1 {
    font-size: 1.9rem;
  }

  .weather-card p {
    font-size: 0.95rem;
  }

  .weather-card input,
  .weather-card button {
    font-size: 15px;
  }
}
</style>

<script>
document.getElementById('weatherForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  const city = document.getElementById('city').value.trim();
  const apiKey = 'fd5ae443d3fcaebb135ad14367ba95d2';
  const url = `https://api.openweathermap.org/data/2.5/weather?q=${encodeURIComponent(city)}&appid=${apiKey}&units=metric`;

  const resultDiv = document.getElementById('weatherResult');
  resultDiv.innerHTML = '<div class="spinner"></div>';

  try {
    const res = await fetch(url);
    if (!res.ok) throw new Error('City not found');
    const data = await res.json();

    setTimeout(() => {
      const icon = data.weather[0].icon;
      resultDiv.innerHTML = `
        <h2 style="color:#1a73e8; margin-bottom:10px;">${data.name}</h2>
        <img src="https://openweathermap.org/img/wn/${icon}@2x.png" alt="Weather icon">
        <p style="font-size:18px; margin: 5px 0;">${data.weather[0].main} - ${data.weather[0].description}</p>
        <p style="font-size:22px; font-weight: bold; margin: 10px 0;">${data.main.temp}&deg;C</p>
        <p style="font-size:14px; color: #666;">Humidity: ${data.main.humidity}% | Wind: ${data.wind.speed} m/s</p>
      `;
    }, 800);
  } catch (err) {
    setTimeout(() => {
      resultDiv.innerHTML = '<p style="color:red; font-weight:500;">City not found or API error. Please try again.</p>';
    }, 800);
  }
});
</script>
@endsection
