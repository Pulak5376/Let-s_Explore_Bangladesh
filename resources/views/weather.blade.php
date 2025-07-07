@extends('layouts.app')

@section('title', 'Weather Check')

@section('content')
<section style="padding:40px; text-align:center;">
    <h1 style="font-size: 2.5rem; color: #1a73e8;">Weather Check</h1>
    <p style="font-size: 1.2rem;">Check the latest weather updates for your travel destinations in Bangladesh.</p>

    <form id="weatherForm" style="margin: 30px auto; max-width: 400px;">
        <input type="text" id="city" name="city" placeholder="Enter city (e.g. Dhaka)" 
               style="padding: 10px; width: 70%; border: 1px solid #ccc; border-radius: 5px;" required>
        <button type="submit" 
                style="padding: 10px 20px; background-color: #1a73e8; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Check Weather
        </button>
    </form>

    <div id="weatherResult" style="margin-top: 30px; font-size: 18px;"></div>
</section>

<script>
document.getElementById('weatherForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const city = document.getElementById('city').value.trim();
    const apiKey = 'fd5ae443d3fcaebb135ad14367ba95d2';
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${encodeURIComponent(city)}&appid=${apiKey}&units=metric`;

    document.getElementById('weatherResult').innerHTML = 'Loading...';

    try {
        const res = await fetch(url);
        if (!res.ok) throw new Error('City not found');
        const data = await res.json();
        const icon = data.weather[0].icon;

        document.getElementById('weatherResult').innerHTML = `
            <h2 style="margin-bottom:10px;">${data.name}</h2>
            <img src="http://openweathermap.org/img/wn/${icon}@2x.png" alt="Weather Icon">
            <p style="font-size:18px;">${data.weather[0].main} - ${data.weather[0].description}</p>
            <p style="font-size:22px;"><b>${data.main.temp}°C</b></p>
            <p>Humidity: ${data.main.humidity}% | Wind: ${data.wind.speed} m/s</p>
        `;
    } catch (err) {
        document.getElementById('weatherResult').innerHTML = '<span style="color:red;">City not found or API error.</span>';
    }
});
</script>
@endsection
