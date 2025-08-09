<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BusBookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TransportController;

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
Route::get('/login', function () {
    return view('login');
});
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
Route::get('/register', function () {
    return view('register');
});

Route::get('/Convert', function () {
    return view('Convert');
});

Route::view('/package', 'package');

Route::post('/signup', [RegisterController::class, 'store']);

Route::post('/dologin', [LoginController::class, 'authenticate']);


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
