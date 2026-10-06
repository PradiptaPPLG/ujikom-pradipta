<?php

namespace App\Providers;

use App\Models\Mahasiswa;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Hash;

/**
 * MahasiswaProvider - ini adalah "jembatan" antara Laravel Auth dan tabel mahasiswa kita.
 * Karena kita ngga pakai tabel users standar dan passwordnya SHA256 (bukan bcrypt),
 * kita perlu bikin provider sendiri yang ngajarin Laravel cara login yang kita mau.
 */
class MahasiswaProvider implements UserProvider
{
    /**
     * Cari mahasiswa berdasarkan NIM (ini yang dipakai saat cek session).
     */
    public function retrieveById($identifier): ?Authenticatable
    {
        return Mahasiswa::find($identifier);
    }

    /**
     * Cari mahasiswa berdasarkan "remember token" - kita ngga pakai fitur ini,
     * tapi wajib ada karena interface minta.
     */
    public function retrieveByToken($identifier, $token): ?Authenticatable
    {
        return null; // Fitur "remember me" ngga dipakai di 
    }

    /**
     * Update remember token - kita skip juga karena ngga dipakai.
     */
    public function updateRememberToken(Authenticatable $user, $token): void
    {
        // ngga diimplementasikan - ngga ada kolom remember_token di tabel kita
    }

    /**
     * Cari mahasiswa berdasarkan kredensial (NIM + password).
     * Dipanggil oleh Laravel saat proses login di LoginRequest.
     */
    public function retrieveByCredentials(array $credentials): ?Authenticatable
    {
        // Cari mahasiswa yang NIM-nya cocok
        return Mahasiswa::where('nim', $credentials['nim'])->first();
    }

    /**
     * Cek apakah password yang diinput user cocok dengan yang ada di database.
     * Kita enkripsi input pakai SHA256, lalu bandingkan dengan yang di database.
     */
    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        // Enkripsi password yang diinput dengan SHA256
        $inputPasswordHashed = hash('sha256', $credentials['password']);

        // Bandingkan dengan password yang tersimpan di database
        return $inputPasswordHashed === $user->getAuthPassword();
    }

    /**
     * Rehash password kalau perlu - kita ngga pakai fitur ini.
     */
    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false): void
    {
        // ngga diimplementasikan - kita pakai SHA256 statis 
    }
}


