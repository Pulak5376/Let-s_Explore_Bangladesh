<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;

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
Route::post('/welcome', function () {
    return view('welcome');
})->name('welcome');


Route::get('/register', function () {
    return view('register');
});
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

