<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

/**
 * Controller buat fitur ubah password - .
 * Ada 3 skenario validasi :
 * 1. Password lama salah -> batal
 * 2. Password baru ngga sama dengan konfirmasi -> batal
 * 3. Semua benar -> update database
 */
class UbahPasswordController extends Controller
{
    /**
     * Tampilkan form ubah password.
     */
    public function show($nim)
    {
        if (Auth::user()->nim !== 'admin') {
            abort(403, 'Akses Ditolak: Hanya Admin yang bisa ubah password');
        }

        return view('ubah-password', ['targetNim' => $nim]);
    }

    /**
     * Proses pergantian password.
     */
    public function update(Request $request, $nim)
    {
        if (Auth::user()->nim !== 'admin') {
            abort(403, 'Akses Ditolak: Hanya Admin yang bisa ubah password');
        }

        // Validasi input - semua field wajib diisi
        $request->validate([
            'pass_baru'    => 'required|string',
            'pass_confirm' => 'required|string',
        ]);

        // Cek apakah password baru sama dengan konfirmasi
        if ($request->pass_baru !== $request->pass_confirm) {
            // ngga sama - proses batal
            return back()->with('error', 'Proses Batal: Password Baru dan Konfirmasi Password ngga sama!');
        }

        // Update password target
        $passBaru = hash('sha256', $request->pass_baru);
        Mahasiswa::where('nim', $nim)->update(['password' => $passBaru]);

        return back()->with('success', 'Proses Berhasil: Password Mahasiswa (NIM: '.$nim.') telah diubah.');
    }
}


