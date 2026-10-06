<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeder buat mengisi data awal mahasiswa.
 */
class MahasiswaSeeder extends Seeder
{
    /**
     * Masukkan 3 data dummy ke tabel mahasiswa.
     */
    public function run(): void
    {
        // Data awal mahasiswa pake sha256 buat password
        DB::table('mahasiswa')->insert([
            [
                'nim'           => 'admin',
                'nama'          => 'Administrator',
                'alamat'        => 'Ruang Server',
                'jenis_kelamin' => 'L',
                'password'      => hash('sha256', 'admin123'), // SHA256 dari 'admin123'
            ],
            [
                'nim'           => '11120001',
                'nama'          => 'Agus Ramdhani',
                'alamat'        => 'Jl Merdeka No 23 Tasikmalaya',
                'jenis_kelamin' => 'L',
                'password'      => hash('sha256', 'agus123'), // SHA256 dari 'agus123'
            ],
            [
                'nim'           => '11120002',
                'nama'          => 'Budi Setiawan',
                'alamat'        => 'Jl Nusa Indah No 2 Tasikmalaya',
                'jenis_kelamin' => 'L',
                'password'      => hash('sha256', 'budi123'), // SHA256 dari 'budi123'
            ],
            [
                'nim'           => '11120003',
                'nama'          => 'Cepi Sutisna',
                'alamat'        => 'Jl Cipedes No 10 Tasikmalaya',
                'jenis_kelamin' => 'L',
                'password'      => hash('sha256', 'cepi123'), // SHA256 dari 'cepi123'
            ],
        ]);
    }
}


