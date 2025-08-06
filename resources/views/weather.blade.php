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
    <p>Live weather updates for cities worldwide</p>

    <form id="weatherForm">
      <div class="input-container">
        <input type="text" id="city" name="city" placeholder="Enter city name or country (e.g. Dhaka, Bangladesh)" required />
        <button type="button" id="getCurrentLocation" class="location-btn" title="Use current location">📍</button>
      </div>
      <button type="submit" id="submitBtn">
        <span id="submitText">Check Weather</span>
        <div id="submitSpinner" class="button-spinner" style="display: none;"></div>
      </button>
    </form>

    <div id="weatherResult"></div>
    
    <!-- Recent searches -->
    <div id="recentSearches" class="recent-searches" style="display: none;">
      <h3>Recent Searches</h3>
      <div id="recentList"></div>
    </div>
  </div>
</section>

<style>
.weather-card {
  background: rgba(255, 255, 255, 0.95);
  padding: 35px 25px;
  border-radius: 18px;
  width: 100%;
  max-width: 500px;
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

.input-container {
  position: relative;
  display: flex;
  gap: 8px;
  margin-bottom: 15px;
}

.weather-card input[type="text"] {
  padding: 12px 14px;
  flex: 1;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
  outline: none;
  transition: all 0.3s ease;
}

.weather-card input[type="text"]:focus {
  border-color: #1a73e8;
  box-shadow: 0 0 8px rgba(26, 115, 232, 0.3);
}

.location-btn {
  padding: 12px;
  background: #f8f9fa;
  border: 1px solid #ccc;
  border-radius: 8px;
  cursor: pointer;
  font-size: 16px;
  transition: all 0.3s ease;
}

.location-btn:hover {
  background: #e9ecef;
  transform: scale(1.05);
}

.weather-card button[type="submit"] {
  width: 100%;
  padding: 12px;
  background: linear-gradient(135deg, #1a73e8, #4285f4);
  color: #fff;
  font-size: 16px;
  font-weight: 600;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  position: relative;
}

.weather-card button[type="submit"]:hover {
  background: linear-gradient(135deg, #155ab6, #3367d6);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(26, 115, 232, 0.4);
}

.weather-card button[type="submit"]:disabled {
  opacity: 0.7;
  cursor: not-allowed;
  transform: none;
}

.button-spinner {
  border: 2px solid transparent;
  border-top: 2px solid #fff;
  border-radius: 50%;
  width: 16px;
  height: 16px;
  animation: spin 1s linear infinite;
}

#weatherResult {
  margin-top: 30px;
  font-size: 16px;
  color: #333;
}

.weather-display {
  background: linear-gradient(135deg, #f8f9fa, #e9ecef);
  border-radius: 12px;
  padding: 20px;
  margin-top: 20px;
  border: 1px solid #dee2e6;
}

.weather-main {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 15px;
  margin-bottom: 15px;
}

.weather-icon {
  width: 80px;
  height: 80px;
}

.temperature {
  font-size: 3rem;
  font-weight: bold;
  color: #1a73e8;
  margin: 0;
}

.weather-details {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 10px;
  margin-top: 15px;
}

.detail-item {
  background: rgba(255, 255, 255, 0.7);
  padding: 8px;
  border-radius: 6px;
  font-size: 14px;
}

.recent-searches {
  margin-top: 25px;
  text-align: left;
}

.recent-searches h3 {
  font-size: 1.1rem;
  color: #666;
  margin-bottom: 10px;
}

.recent-item {
  display: inline-block;
  background: #f8f9fa;
  border: 1px solid #dee2e6;
  border-radius: 20px;
  padding: 5px 12px;
  margin: 3px;
  font-size: 12px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.recent-item:hover {
  background: #e9ecef;
  transform: translateY(-1px);
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

.error-message {
  color: #dc3545;
  background: #f8d7da;
  border: 1px solid #f5c6cb;
  border-radius: 8px;
  padding: 15px;
  margin-top: 15px;
  font-weight: 500;
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

body.dark-mode .location-btn {
  background: rgba(50, 50, 50, 0.9) !important;
  border-color: #4caf50 !important;
  color: #e0e0e0 !important;
}

body.dark-mode .weather-display {
  background: linear-gradient(135deg, rgba(50, 50, 50, 0.9), rgba(40, 40, 40, 0.9)) !important;
  border-color: #4caf50 !important;
}

body.dark-mode .temperature {
  color: #66bb6a !important;
}

body.dark-mode .detail-item {
  background: rgba(60, 60, 60, 0.7) !important;
  color: #b0bec5 !important;
}

body.dark-mode .recent-item {
  background: rgba(50, 50, 50, 0.9) !important;
  border-color: #4caf50 !important;
  color: #b0bec5 !important;
}

@media (max-width: 500px) {
  .weather-card {
    padding: 25px 18px;
  }

  .input-container {
    flex-direction: column;
  }

  .weather-main {
    flex-direction: column;
    gap: 10px;
  }

  .temperature {
    font-size: 2.5rem;
  }

  .weather-details {
    grid-template-columns: 1fr;
  }
}
</style>

<script>
class WeatherApp {
  constructor() {
    this.apiKey = 'fd5ae443d3fcaebb135ad14367ba95d2';
    this.recentSearches = JSON.parse(localStorage.getItem('weatherSearches')) || [];
    this.init();
  }

  init() {
    document.getElementById('weatherForm').addEventListener('submit', (e) => this.handleSubmit(e));
    document.getElementById('getCurrentLocation').addEventListener('click', () => this.getCurrentLocation());
    this.displayRecentSearches();
  }

  async handleSubmit(e) {
    e.preventDefault();
    const city = document.getElementById('city').value.trim();
    if (!city) return;

    this.setLoading(true);
    await this.getWeatherData(city);
    this.setLoading(false);
  }

  async getCurrentLocation() {
    if (!navigator.geolocation) {
      this.showError('Geolocation is not supported by this browser.');
      return;
    }

    this.setLoading(true);
    navigator.geolocation.getCurrentPosition(
      async (position) => {
        const { latitude, longitude } = position.coords;
        await this.getWeatherByCoords(latitude, longitude);
        this.setLoading(false);
      },
      (error) => {
        this.showError('Unable to retrieve your location.');
        this.setLoading(false);
      }
    );
  }

  async getWeatherData(city) {
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${encodeURIComponent(city)}&appid=${this.apiKey}&units=metric`;
    
    try {
      const res = await fetch(url);
      if (!res.ok) throw new Error('City not found');
      const data = await res.json();
      
      this.displayWeather(data);
      this.addToRecentSearches(city);
    } catch (err) {
      this.showError('City not found or API error. Please check the city name and try again.');
    }
  }

  async getWeatherByCoords(lat, lon) {
    const url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${this.apiKey}&units=metric`;
    
    try {
      const res = await fetch(url);
      if (!res.ok) throw new Error('Location not found');
      const data = await res.json();
      
      this.displayWeather(data);
      document.getElementById('city').value = `${data.name}, ${data.sys.country}`;
    } catch (err) {
      this.showError('Unable to get weather for your location.');
    }
  }

  displayWeather(data) {
    const resultDiv = document.getElementById('weatherResult');
    const icon = data.weather[0].icon;
    const sunrise = new Date(data.sys.sunrise * 1000).toLocaleTimeString();
    const sunset = new Date(data.sys.sunset * 1000).toLocaleTimeString();

    resultDiv.innerHTML = `
      <div class="weather-display">
        <h2 style="color:#1a73e8; margin-bottom:15px;">${data.name}, ${data.sys.country}</h2>
        <div class="weather-main">
          <img src="https://openweathermap.org/img/wn/${icon}@2x.png" alt="Weather icon" class="weather-icon">
          <div>
            <p class="temperature">${Math.round(data.main.temp)}°C</p>
            <p style="font-size:16px; margin: 0; text-transform: capitalize;">${data.weather[0].description}</p>
          </div>
        </div>
        <div class="weather-details">
          <div class="detail-item">
            <strong>Feels like:</strong><br>${Math.round(data.main.feels_like)}°C
          </div>
          <div class="detail-item">
            <strong>Humidity:</strong><br>${data.main.humidity}%
          </div>
          <div class="detail-item">
            <strong>Wind Speed:</strong><br>${data.wind.speed} m/s
          </div>
          <div class="detail-item">
            <strong>Pressure:</strong><br>${data.main.pressure} hPa
          </div>
          <div class="detail-item">
            <strong>Visibility:</strong><br>${(data.visibility / 1000).toFixed(1)} km
          </div>
          <div class="detail-item">
            <strong>UV Index:</strong><br>${data.uvi || 'N/A'}
          </div>
          <div class="detail-item">
            <strong>Sunrise:</strong><br>${sunrise}
          </div>
          <div class="detail-item">
            <strong>Sunset:</strong><br>${sunset}
          </div>
        </div>
      </div>
    `;
  }

  showError(message) {
    const resultDiv = document.getElementById('weatherResult');
    resultDiv.innerHTML = `<div class="error-message">${message}</div>`;
  }

  setLoading(isLoading) {
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const submitSpinner = document.getElementById('submitSpinner');

    if (isLoading) {
      submitBtn.disabled = true;
      submitText.style.display = 'none';
      submitSpinner.style.display = 'block';
    } else {
      submitBtn.disabled = false;
      submitText.style.display = 'block';
      submitSpinner.style.display = 'none';
    }
  }

  addToRecentSearches(city) {
    if (!this.recentSearches.includes(city)) {
      this.recentSearches.unshift(city);
      this.recentSearches = this.recentSearches.slice(0, 5); // Keep only 5 recent searches
      localStorage.setItem('weatherSearches', JSON.stringify(this.recentSearches));
      this.displayRecentSearches();
    }
  }

  displayRecentSearches() {
    if (this.recentSearches.length === 0) return;

    const recentDiv = document.getElementById('recentSearches');
    const recentList = document.getElementById('recentList');
    
    recentList.innerHTML = this.recentSearches
      .map(city => `<span class="recent-item" onclick="weatherApp.searchRecent('${city}')">${city}</span>`)
      .join('');
    
    recentDiv.style.display = 'block';
  }

  searchRecent(city) {
    document.getElementById('city').value = city;
    this.getWeatherData(city);
  }
}

// Initialize the app
const weatherApp = new WeatherApp();
</script>
@endsection
