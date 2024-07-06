<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TempatController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\DriverDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/rate-wisata/{id}', [HomeController::class, 'rateWisata']);

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login-post', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Tempat routes
Route::get('/tempat', [TempatController::class, 'index'])->name('tempat.index');
Route::get('/tempat/{id}', [TempatController::class, 'show'])->name('tempat.show');

Route::middleware('auth')->group(function () {
    Route::post('/tempat', [TempatController::class, 'store'])->name('tempat.store');
    Route::post('/tempat/order/{id}', [TempatController::class, 'order'])->name('tempat.order');
    Route::get('/tempat/create', [TempatController::class, 'create'])->name('tempat.create');
    Route::get('/tempat/{id}/edit', [TempatController::class, 'edit'])->name('tempat.edit');
    Route::put('/tempat/{id}', [TempatController::class, 'update'])->name('tempat.update');
    Route::delete('/tempat/{id}', [TempatController::class, 'destroy'])->name('tempat.destroy');
});

// Pesanan routes
Route::middleware('auth')->post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
Route::get('/pesanan/{id}/create', [PesananController::class, 'create'])->name('pesanan.create');
Route::get('/pesanan/{id}/pesan', [PesananController::class, 'show'])->name('pesanan.show');

// Driver routes
Route::group(['middleware' => 'checkRole:driver'], function () {
    Route::get('/driver/dashboard', [DriverDashboardController::class, 'index'])->name('driver.dashboard');
    Route::get('/driver/profile', [ProfileController::class, 'show'])->name('driver.profile');
    Route::put('driver/update-status/{id}', [DriverController::class, 'updateStatus'])->name('driver.updateStatus');

    });

    Route::middleware('auth')->group(function () {
    Route::get('/driver/profile', [ProfileController::class, 'show'])->name('driver.profile');
    Route::get('/driver/dashboard', [DriverDashboardController::class, 'index'])->name('driver.dashboard');
});

// Dashboard routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/client/dashboard', [ClientDashboardController::class, 'index'])->name('client.dashboard');
    Route::get('/client/profile', [ProfileController::class, 'show'])->name('client.profile');
    Route::get('/admin/profile', [ProfileController::class, 'show'])->name('admin.profile');
});

// Resource routes
Route::middleware('auth')->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/pengguna', PenggunaController::class);
    Route::resource('/kunjungan', KunjunganController::class);
});

// Travel packages routes
Route::get('travel-packages', [\App\Http\Controllers\TravelPackageController::class, 'index'])->name('travel_package.index');
Route::get('travel-packages/{travel_package:slug}', [\App\Http\Controllers\TravelPackageController::class, 'show'])->name('travel_package.show');

// Blogs routes
Route::get('blogs', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('blogs/{blog:slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
Route::get('blogs/category/{category:slug}', [\App\Http\Controllers\BlogController::class, 'category'])->name('blog.category');

Route::get('/', [HomeController::class, 'index'])->name('homepage');

// Contact route
Route::get('contact', function () {
    return view('contact');
})->name('contact');

Auth::routes(['register' => false]);

Auth::routes();