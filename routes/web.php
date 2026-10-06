<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UbahPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kita definisikan semua rute aplikasi kita.
| Kita hapus route bawaan Breeze yang ribet, dan ganti dengan yang super simpel
| .
|
*/

// Jika user mengakses root url (/), arahkan ke form login
Route::get('/', function () {
    return redirect()->route('login');
});

// === Rute buat Tamu (Belum Login) ===
Route::middleware('guest')->group(function () {
    // Halaman form login (setara form_login.php)
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    
    // Proses saat tombol submit login ditekan
    Route::post('/login', [LoginController::class, 'login']);
});

// === Rute buat User Authenticated (Sudah Login) ===
Route::middleware('auth')->group(function () {
    // Halaman utama / dashboard (setara index.php)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Halaman form ubah password
    Route::get('/ubah-password/{nim}', [UbahPasswordController::class, 'show'])->name('ubah-password');
    
    // Proses saat tombol submit ubah password ditekan
    Route::post('/ubah-password/{nim}', [UbahPasswordController::class, 'update']);

    // Proses logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

