-- Script SQL untuk Uji Kompetensi
-- Nama Database: 3207250203090001 (Sesuai NIK Pradipta Endra Maulana)

-- 1. Buat Database
CREATE DATABASE IF NOT EXISTS `3207250203090001`;
USE `3207250203090001`;

-- 2. Buat tabel mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Isi data dummy sesuai soal (Password dienkripsi dengan SHA1)
-- Perintah SHA1() digunakan langsung di SQL untuk mengenkripsi password
INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `jenis_kelamin`, `password`) VALUES
('11120001', 'Agus Ramdhani', 'Jl Merdeka No 23 Tasikmalaya', 'L', SHA1('agus123')),
('11120002', 'Budi Setiawan', 'Jl Nusa Indah No 2 Tasikmalaya', 'L', SHA1('budi123')),
('11120003', 'Cepi Sutisna', 'Jl Cipedes No 10 Tasikmalaya', 'L', SHA1('cepi123'));
