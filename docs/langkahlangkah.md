# Langkah-langkah Testing (Pengujian Aplikasi)

Dokumen ini berisi panduan untuk menguji aplikasi secara mandiri sebelum dinilai oleh asesor. Lakukan langkah-langkah di bawah ini secara berurutan untuk memastikan semua fungsi berjalan 100% sesuai dengan soal ujikom.

## 1. Persiapan Database (Wajib)
1. Buka XAMPP, pastikan modul **Apache** dan **MySQL** berstatus *Start* (warna hijau).
2. Buka browser, akses `http://localhost/phpmyadmin`.
3. Buka database `3207250203090001`. Jika belum ada isinya, klik tab **Import** lalu masukkan file `database.sql` dan klik **Go**.
4. Pastikan tabel `mahasiswa` muncul dan berisi 3 data.

## 2. Pengujian Proteksi Keamanan (Sistem Session)
*Ini menguji apakah aplikasi bisa diretas atau masuk paksa tanpa login.*
1. Buka tab baru di browser.
2. Langsung ketikkan URL: `http://localhost/ujikom-pradipta/index.php` tanpa lewat form login.
3. **Hasil yang diharapkan:** Browser harus otomatis melempar (me-redirect) kamu kembali ke halaman `form_login.php`. Jika berhasil kembali ke form login, artinya sistem Session sudah aman.

## 3. Pengujian Skenario Gagal Login
1. Di halaman `form_login.php`, masukkan NIM asal (contoh: `123123`).
2. Masukkan Kata Sandi asal (contoh: `ngasal`).
3. Klik tombol **Masuk ke Sistem**.
4. **Hasil yang diharapkan:** Halaman memuat ulang dan muncul tulisan peringatan merah berkedip bertuliskan: **"User dan/atau Password Salah"**.

## 4. Pengujian Skenario Berhasil Login & Tampil 1 Data
1. Di halaman `form_login.php`, masukkan salah satu akun dummy, misalnya:
   - **NIM**: `11120001`
   - **Kata Sandi**: `agus123`
2. Klik tombol **Masuk ke Sistem**.
3. **Hasil yang diharapkan:** Kamu berhasil masuk ke halaman `index.php` (Data Mahasiswa).
4. **Cek Tabel:** Pastikan di tabel hanya muncul **1 data mahasiswa saja** (yaitu datanya Agus Ramdhani). (Ini membuktikan perintah query filter session di MySQL berhasil jalan).

## 5. Pengujian Skenario Ubah Password GAGAL (Sandi Lama Salah)
1. Di halaman `index.php`, klik tombol opsi (Titik 3 / Opsi) di tabel, lalu pilih **EDIT (Ubah Pass)**.
2. Kamu akan dialihkan ke `ubah_pass.php`.
3. Masukkan **Password Lama**: `salahsalah`
4. Masukkan **Password Baru**: `rahasia1`
5. Masukkan **Confirm Password Baru**: `rahasia1`
6. Klik **Ubah Password**.
7. **Hasil yang diharapkan:** Muncul notifikasi merah berbunyi **"Proses Batal: Password Lama Salah!"**.

## 6. Pengujian Skenario Ubah Password GAGAL (Konfirmasi Beda)
1. Masih di halaman `ubah_pass.php`.
2. Masukkan **Password Lama**: `agus123` (Asli).
3. Masukkan **Password Baru**: `rahasia1`
4. Masukkan **Confirm Password Baru**: `rahasia2` (Sengaja dibedakan).
5. Klik **Ubah Password**.
6. **Hasil yang diharapkan:** Muncul notifikasi merah berbunyi **"Proses Batal: Password Baru dan Konfirmasi Password tidak sama!"**.

## 7. Pengujian Skenario Ubah Password BERHASIL
1. Masukkan **Password Lama**: `agus123` (Asli).
2. Masukkan **Password Baru**: `rahasia123`
3. Masukkan **Confirm Password Baru**: `rahasia123`
4. Klik **Ubah Password**.
5. **Hasil yang diharapkan:** Muncul notifikasi hijau berbunyi **"Proses Berhasil: Password Anda telah diubah."**.
6. *Opsional:* Kamu bisa buka phpmyadmin dan lihat kolom password di tabel mahasiswa, kodenya pasti berubah (karena sudah kena fungsi SHA1 yang baru).

## 8. Pengujian Logout
1. Klik tombol **&laquo; Kembali ke Utama** untuk balik ke `index.php`.
2. Di pojok kanan atas, klik tombol **Logout** yang berwarna merah.
3. **Hasil yang diharapkan:** Kamu dilempar keluar ke `form_login.php`.
4. (Tes sekali lagi), coba tekan tombol *Back* (panah kiri) di browser. Kalau kamu tetep nggak bisa lihat data dan dipaksa diam di form login, berarti fungsi *destroy session* berhasil 100%.

---
**✅ SELESAI.**
Jika semua langkah di atas menghasilkan "Hasil yang diharapkan", maka aplikasimu siap dipresentasikan dan dijamin lulus!
