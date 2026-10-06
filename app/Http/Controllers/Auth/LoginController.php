<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller yang ngurusin proses login dan logout.
 * Alurnya sama persis  Ã¢â‚¬â€ cek NIM + password SHA256,
 * kalau benar simpan session dan redirect ke dashboard.
 */
class LoginController extends Controller
{
    /**
     * Tampilkan halaman form login.
     * Kalau sudah login, langsung diarahkan ke dashboard.
     */
    public function showLoginForm()
    {
        // Kalau sudah login, ngga perlu ke halaman login lagi
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    /**
     * Proses form login yang sudah disubmit user.
     * Ini setara dengan logika di form_login.php versi PHP native.
     */
    public function login(Request $request)
    {
        // Validasi input Ã¢â‚¬â€ NIM dan password wajib diisi
        $request->validate([
            'nim'      => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba login dengan NIM dan password yang diinput
        // Laravel akan memanggil MahasiswaProvider::validateCredentials()
        // yang kita buat buat ngecek SHA256
        $credentials = $request->only('nim', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil! Regenerasi session biar aman dari serangan session fixation
            $request->session()->regenerate();

            // Redirect ke halaman dashboard ()
            return redirect()->intended(route('dashboard'));
        }

        // Login gagal Ã¢â‚¬â€ kembalikan ke form dengan pesan error
        //  "jika user dan/atau password salah diberitahukan oleh sistem"
        return back()->withErrors([
            'nim' => 'User dan/atau Password Salah',
        ])->withInput($request->only('nim'));
    }

    /**
     * Proses logout Ã¢â‚¬â€ hapus session dan redirect ke halaman login.
     * Setara dengan logout.php di versi PHP native.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus semua data session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}


