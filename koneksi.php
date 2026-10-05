<?php
/**
 * File koneksi ke database mysql
 * Disesuaikan menggunakan fungsi mysqli_ karena mysql_ (sesuai soal) 
 * sudah dihapus/deprecated pada PHP modern (PHP 7 ke atas).
 * Ini memastikan kode bisa berjalan di XAMPP versi terbaru.
 */

// Konfigurasi Database (Ganti nama db dengan NIK kamu)
$host     = "localhost";
$username = "root";
$password = "";
$database = "3207250203090001"; 

// Melakukan koneksi ke database menggunakan mysqli_connect
$koneksi = mysqli_connect($host, $username, $password, $database);

// Mengecek apakah koneksi berhasil atau gagal
if (!$koneksi) {
    // Jika gagal, tampilkan pesan error dan hentikan eksekusi script
    die("Koneksi database gagal: " . mysqli_connect_error());
}
// Jika tidak error, maka koneksi berhasil dan siap digunakan di file lain.
?>
