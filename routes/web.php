

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
use App\Http\Controllers\FlightBookingController;
use App\Http\Controllers\Admin\FlightsController;

use App\Http\Controllers\StoriesController;

Route::get('/stories', [StoriesController::class, 'index'])->name('stories.index');
Route::post('/stories', [StoriesController::class, 'store'])->name('stories.store');
Route::delete('/stories/{id}', [StoriesController::class, 'destroy'])->name('stories.destroy');
Route::get('/', function () {
    return view('1stScreen');
});

Route::get('/places', [CartController::class, 'places'])->name('places');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

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


Route::get('/flightbook', [FlightBookingController::class, 'create'])->name('flightbook');
Route::post('/flightbook', [FlightBookingController::class, 'store'])->name('flightbook.store');
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

Route::get('/train', function () {
    return view('transports.train');
})->name('train.page');

Route::post('/train/search', [X::class, 'search'])->name('train.search');
Route::post('/{type}/book', [X::class, 'book'])->name('transport.book');

// Booking and Payment routes
Route::get('/{type}/bookings', [X::class, 'myBookings'])->name('transport.bookings');
Route::post('/payment/initiate', [X::class, 'initiatePayment'])->name('payment.initiate');

use App\Http\Controllers\GalleryController;

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');



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

    // Places management
    Route::get('/places/add', [\App\Http\Controllers\Admin\PlacesController::class, 'create'])->name('admin.places.add');
    Route::post('/places/add', [\App\Http\Controllers\Admin\PlacesController::class, 'store'])->name('admin.places.store');
    Route::get('/places/view', [\App\Http\Controllers\Admin\PlacesController::class, 'index'])->name('admin.places.view');


    Route::get('/transports/addbus', [Y::class, 'addBus'])->name('admin.transports.addbus');
    Route::post('/transports/addbus', [Y::class, 'storeBus'])->name('admin.transports.storebus');
    Route::get('/transports/viewbus', [Y::class, 'viewBus'])->name('admin.transports.viewbus');

    Route::get('/transports/addtrain', [Y::class, 'addTrain'])->name('admin.transports.addtrain');
    Route::post('/transports/addtrain', [Y::class, 'storeTrain'])->name('admin.transports.storetrain');
    Route::get('/transports/viewtrain', [Y::class, 'viewTrain'])->name('admin.transports.viewtrain');

    Route::get('/transports/viewtransports', [Y::class, 'viewTransports'])->name('admin.transports.viewtransports');
    Route::delete('/transports/{id}', [Y::class, 'destroy'])->name('admin.transports.destroy');
    Route::get('/transports/{id}/edit', [Y::class, 'edit'])->name('admin.transports.edit');
    Route::put('/transports/{id}', [Y::class, 'update'])->name('admin.transports.update');
    Route::get('/transports/search', [Y::class, 'searchTransport'])->name('admin.transports.search');

    Route::get('/bookings/transports', [Y::class, 'viewList'])->name('admin.bookings.transports.viewlist');
    Route::delete('/bookings/transports/{id}', [Y::class, 'destroyBooking'])->name('admin.bookings.transports.destroy');
    Route::get('/bookings/transports/search', [Y::class, 'searchBookings'])->name('admin.transports.searchbookings');

    Route::get('/stories', [\App\Http\Controllers\Admin\StoriesController::class, 'index'])->name('admin.stories.index');
    Route::delete('/stories/{id}', [\App\Http\Controllers\Admin\StoriesController::class, 'destroy'])->name('admin.stories.destroy');
    Route::get('/transports/addflight', [FlightsController::class, 'addFlight'])->name('admin.transports.addflight');
    Route::post('/transports/addflight', [FlightsController::class, 'storeflight'])->name('admin.transports.storeflight');
    Route::get('/transports/viewflights', [FlightsController::class, 'viewFlights'])->name('admin.transports.viewflights');
    Route::get('/bookings/transports/viewflightbooking', [FlightsController::class, 'viewFlightBookings'])->name('admin.bookings.transports.viewflightbooking');

    Route::get('/admin/reviews', [\App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('admin.review');
    Route::delete('/admin/reviews/{id}', [\App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('admin.review.destroy');

    // Gallery management
    Route::get('/galleries', [\App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('admin.galleries.index');
    Route::get('/galleries/add', [\App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('admin.galleries.add');
    Route::post('/galleries/add', [\App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('admin.galleries.store');
    Route::get('/galleries/{id}/edit', [\App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('admin.galleries.edit');
    Route::put('/galleries/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('admin.galleries.update');
    Route::delete('/galleries/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('admin.galleries.destroy');

    // Contact management
    Route::get('/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts.index');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
});
