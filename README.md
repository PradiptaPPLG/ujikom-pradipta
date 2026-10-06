# Sistem Informasi Akademik Mahasiswa
**Tugas Praktik Demonstrasi Ujian Kompetensi Junior Web Programmer**

## 👨‍💻 Informasi Peserta
- **Nama** : Pradipta Endra Maulana
- **Peran** : Junior Web Programmer
- **Database** : `pradipta_endra_maulana`
- **Tech Stack**: Laravel 13.x, MySQL, PHP 8.x, Vanilla CSS (Tanpa Tailwind/Bootstrap)

---

## 🚀 Panduan Instalasi (Untuk Asesor/Penguji)

Untuk memudahkan Bapak/Ibu Asesor dalam mengecek dan menjalankan aplikasi ini secara lokal di XAMPP, silakan ikuti langkah-langkah praktis berikut:

### Opsi 1: Setup Kilat via File SQL (Sangat Disarankan)
Saya sudah menyiapkan file database siap pakai agar Bapak/Ibu tidak perlu repot menjalankan *command line*.

1. Pastikan modul **Apache** dan **MySQL** sudah berjalan di XAMPP Control Panel.
2. Buka `http://localhost/phpmyadmin` di browser.
3. Buat database baru dengan nama pasti: **`pradipta_endra_maulana`**
4. Klik tab **Import**, lalu pilih file database yang sudah saya sertakan di root folder project ini: 
   👉 **`pradipta_endra_maulana.sql`**
5. Klik **Go** / **Import** di kanan bawah. Semua tabel dan data dummy otomatis masuk.
6. Buka terminal/CMD di dalam folder project ini (`c:\xampp\htdocs\ujikom-pradipta`).
7. Ketikkan perintah ini untuk menyalakan server aplikasi:
   ```bash
   php artisan serve
   ```
8. Aplikasi sudah bisa diakses di **`http://localhost:8000`** 🎉

---

### Opsi 2: Setup via Laravel Migration & Seeder
Jika Bapak/Ibu lebih nyaman menggunakan fitur bawaan Laravel, cukup ikuti ini:

1. Buat database **`pradipta_endra_maulana`** di phpMyAdmin.
2. Buka terminal di dalam folder project ini.
3. Jalankan perintah otomatisasi database:
   ```bash
   php artisan migrate:fresh --seed
   ```
4. Jalankan server lokal:
   ```bash
   php artisan serve
   ```
5. Akses aplikasi di **`http://localhost:8000`**

---

## 🔑 Akun Demo (Data Pengujian)

Setelah aplikasi berjalan, silakan gunakan akun berikut untuk mencoba fitur-fiturnya:

### 1. Akun Administrator (Bisa mengubah password user)
- **NIM** : `admin`
- **Password** : `admin123`

### 2. Akun Mahasiswa (Hanya bisa melihat dashboard sendiri)
| NIM | Nama Mahasiswa | Password Login |
|---|---|---|
| `11120001` | Agus Ramdhani | `agus123` |
| `11120002` | Budi Setiawan | `budi123` |
| `11120003` | Cepi Sutisna | `cepi123` |

*(Catatan: Semua password di database sudah saya enkripsi menggunakan algoritma **SHA256** untuk keamanan maksimal sesuai standar industri, menggantikan SHA1 lama).*

---

Terima kasih atas waktu dan perhatian Bapak/Ibu Asesor dalam menilai hasil kerja saya. Semoga aplikasi ini memenuhi semua standar kriteria kelulusan yang diharapkan. 🙏
