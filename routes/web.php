<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TransportController as X;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\TransportController as Y;

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

Route::post('/bus/search', [X::class, 'search'])->name('bus.search');

Route::post('/bus/book', [X::class, 'book'])->name('bus.book');

Route::get('/train', function () {
    return view('transports.train');
})->name('train.page');

Route::post('/train/search', [X::class, 'search'])->name('train.search');
Route::post('/{type}/book', [X::class, 'book'])->name('transport.book');



Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::post('/admin/logout', function () {
        Auth::logout();
        return redirect('/admin/login');
    })->name('admin.logout');

    
    Route::get('/transports/addbus', [Y::class, 'addBus'])->name('admin.transports.addbus');
    Route::post('/transports/addbus', [Y::class, 'storeBus'])->name('admin.transports.storebus');
    Route::get('/transports/viewbus', [Y::class, 'viewBus'])->name('admin.transports.viewbus');

});
