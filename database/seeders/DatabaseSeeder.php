<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * DatabaseSeeder Ã¢â‚¬â€ entry point buat semua seeder.
 * Panggil MahasiswaSeeder dari sini.
 */
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Isi data mahasiswa 
        $this->call(MahasiswaSeeder::class);
    }
}


