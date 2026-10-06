<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Model Mahasiswa Ã¢â‚¬â€ ini yang jadi "user" di sistem kita.
 * Bukan pakai model User bawaan Laravel, karena struktur tabelnya beda.
 * Primary key-nya NIM (bukan id), dan password-nya SHA256 bukan bcrypt.
 */
class Mahasiswa extends Authenticatable
{
    // Nama tabel di database, 
    protected $table = 'mahasiswa';

    // Primary key-nya NIM, bukan id default Laravel
    protected $primaryKey = 'nim';

    // NIM itu tipe string, bukan integer
    protected $keyType = 'string';

    // ngga pakai auto-increment karena NIM diisi manual
    public $incrementing = false;

    // ngga pakai timestamps (created_at, updated_at) Ã¢â‚¬â€ tabel kita simpel aja
    public $timestamps = false;

    // Kolom yang boleh diisi massal
    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'jenis_kelamin',
        'password',
    ];

    // Kolom yang disembunyikan saat di-convert ke JSON (biar password ngga bocor)
    protected $hidden = [
        'password',
    ];

    /**
     * Override cara Laravel ngecek password Ã¢â‚¬â€ kita pakai SHA256, bukan bcrypt.
     * Dipanggil otomatis saat proses login.
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
}


