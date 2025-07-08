@extends('layouts.app')

@section('title', 'Weather Check')

@section('content')
<section style="background-image: url('https://images.unsplash.com/photo-1503264116251-35a269479413?auto=format&fit=crop&w=1350&q=80');
                background-size: cover; background-position: center; min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px;">

    <div class="weather-card">
        <h1>🌤️ Weather Check</h1>
        <p>Live weather updates for cities in Bangladesh</p>

        <form id="weatherForm">
            <input type="text" id="city" name="city" placeholder="Enter city (e.g. Dhaka)" required>
            <button type="submit">Check Weather</button>
        </form>

        <div id="weatherResult"></div>
    </div>
</section>

<style>
.weather-card {
    background: rgba(255, 255, 255, 0.9);
    padding: 30px 20px;
    border-radius: 15px;
    max-width: 100%;
    width: 100%;
    max-width: 450px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.weather-card h1 {
    font-size: 2rem;
    color: #1a73e8;
    margin-bottom: 10px;
}

.weather-card p {
    font-size: 1rem;
    color: #444;
    margin-bottom: 25px;
}

.weather-card input[type="text"] {
    padding: 12px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
}

.weather-card button {
    margin-top: 15px;
    width: 100%;
    padding: 12px;
    background-color: #1a73e8;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.weather-card button:hover {
    background-color: #155ab6;
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
    animation: spin 2s linear infinite;
}
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@media (max-width: 500px) {
    .weather-card {
        padding: 25px 15px;
    }

    .weather-card h1 {
        font-size: 1.7rem;
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
                <p style="font-size:22px; font-weight: bold; margin: 10px 0;">${data.main.temp}°C</p>
                <p style="font-size:14px; color: #666;">Humidity: ${data.main.humidity}% | Wind: ${data.wind.speed} m/s</p>
            `;
        }, 1000);
    } catch (err) {
        setTimeout(() => {
            resultDiv.innerHTML = '<p style="color:red;">City not found or API error. Please try again.</p>';
        }, 1000);
    }
});
</script>
@endsection
