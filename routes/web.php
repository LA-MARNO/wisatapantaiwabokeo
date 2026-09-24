<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AuthController;


// Route To Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route To Halaman About
Route::get('/tentang', [AboutController::class, 'index'])->name('about');
// route To wisata
Route::get('/wisata', [WisataController::class, 'index'])->name('wisata');
// route to galeri
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
// Route To Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');



//Route To Login
Route::middleware('guest')->group(function () {
    // Route GET & POST menggunakan URL tersembunyi yang sama
    Route::get('/login-hidden-forAdmin', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login-hidden-forAdmin', [AuthController::class, 'login']);
});


// Route Group Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return Inertia::render('Admin/DashboardView');
    });

    Route::get('/beranda', function () {
        return Inertia::render('Admin/BerandaAdmin');
    });

     Route::get('/tentang', function () {
        return Inertia::render('Admin/TentangPantai');
    });

    Route::get('/wisata', function () {
        return Inertia::render('Admin/WisataPantai');
    });

    Route::get('/galeri', function () {
        return Inertia::render('Admin/GaleriPantai');
    });

     Route::get('/kontak', function () {
        return Inertia::render('Admin/Kontak');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

