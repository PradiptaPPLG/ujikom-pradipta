<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

/**
 * AppServiceProvider — tempat kita daftarkan semua service custom ke Laravel.
 * Yang paling penting di sini: mendaftarkan MahasiswaProvider
 * supaya Laravel tahu cara login pakai NIM dan SHA256.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * Ini dijalankan setelah semua service terdaftar.
     */
    public function boot(): void
    {
        // Daftarkan custom auth provider 'mahasiswa' ke Laravel.
        // Nama 'mahasiswa' ini harus cocok dengan yang ada di config/auth.php bagian providers.
        Auth::provider('mahasiswa', function ($app, array $config) {
            // Setiap kali Laravel butuh autentikasi, dia akan pakai MahasiswaProvider
            return new MahasiswaProvider();
        });
    }
}
