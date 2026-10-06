<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration buat membuat tabel mahasiswa.
 * Strukturnya persis :
 * nim (PK), nama, alamat, jenis_kelamin, password (SHA256).
 */
return new class extends Migration
{
    /**
     * Buat tabelnya Ã¢â‚¬â€ dijalankan saat php artisan migrate.
     */
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            // NIM sebagai primary key (string, bukan auto increment integer)
            $table->string('nim', 20)->primary();

            // Kolom-kolom 
            $table->string('nama', 100);
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['L', 'P']);

            // Password disimpan sebagai SHA256 (64 karakter heksadesimal)
            $table->string('password', 64);

            // ngga ada timestamps (created_at, updated_at) Ã¢â‚¬â€ , tabel simpel
        });
    }

    /**
     * Rollback Ã¢â‚¬â€ hapus tabelnya kalau migration dibatalkan.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};


