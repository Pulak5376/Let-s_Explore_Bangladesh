<?php

use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Home Page
Route::get('/home', function () {
    return view('home');
});

// About Page
Route::get('/about', function () {
    return view('about');
});

// Destinations Page
Route::get('/destinations', function () {
    return view('destinations');
});

// Traditional Foods Page
Route::get('/foods', function () {
    return view('foods');
});

// Cultural Crafts Page
Route::get('/crafts', function () {
    return view('crafts');
});

// Contact Page
Route::get('/contact', function () {
    return view('contact');
});
