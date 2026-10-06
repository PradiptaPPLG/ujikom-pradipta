<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller buat halaman dashboard Ã¢â‚¬â€ .
 * Tugas utamanya: tampilkan data mahasiswa yang sedang login (cuma 1 data).
 */
class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard.
     * Middleware 'auth' sudah dipasang di route, jadi kalau belum login
     * otomatis diarahkan ke halaman login sebelum masuk sini.
     */
    public function index()
    {
        // Ambil data user yang sedang login dari session Auth
        $mahasiswa = Auth::user();

        if ($mahasiswa->nim === 'admin') {
            // Jika admin, ambil semua data mahasiswa (kecuali admin itu sendiri)
            $semuaMahasiswa = \App\Models\Mahasiswa::where('nim', '!=', 'admin')->get();
            $admin = $mahasiswa;
            return view('admin_dashboard', compact('admin', 'semuaMahasiswa'));
        }

        // Jika mahasiswa, tampilkan dashboard simpel miliknya sendiri
        return view('dashboard', compact('mahasiswa'));
    }
}


