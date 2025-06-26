<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/places', [CartController::class, 'places'])->name('places');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// Add these GET routes for other pages:
Route::get('/culture', [CartController::class, 'culture'])->name('culture');
Route::get('/about', [CartController::class, 'about'])->name('about');
Route::get('/gallery', [CartController::class, 'gallery'])->name('gallery');
Route::get('/contact', [CartController::class, 'contact'])->name('contact');
