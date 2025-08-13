<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\Auth\AdminLoginController;

Route::get('/', function () {
    return view('1stScreen');
});

Route::get('/places', [CartController::class, 'places'])->name('places');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/stories', [CartController::class, 'stories'])->name('stories');
Route::get('/about', [CartController::class, 'about'])->name('about');
Route::get('/gallery', [CartController::class, 'gallery'])->name('gallery');
Route::get('/contact', [CartController::class, 'contact'])->name('contact');
Route::get('/weather', function () {
    return view('weather');
})->name('weather');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/hotelbook', function () {
    return view('hotelbook');
})->name('hotelbook');
Route::get('/flightbook', function () {
    return view('flightbook');
});
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::post('/welcome', function () {
    return view('welcome');
});


Route::get('/Convert', function () {
    return view('Convert');
});

Route::view('/package', 'package');




Route::get('/bus', function () {
    return view('transports.bus');
})->name('bus.page');

Route::post('/bus/search', [TransportController::class, 'search'])->name('bus.search');

Route::post('/bus/book', [TransportController::class, 'book'])->name('bus.book');

Route::get('/train', function () {
    return view('transports.train');
})->name('train.page');

Route::post('/train/search', [TransportController::class, 'search'])->name('train.search');
Route::post('/{type}/book', [TransportController::class, 'book'])->name('transport.book');



Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});