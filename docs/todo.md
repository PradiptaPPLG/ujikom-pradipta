# Todo List Ujikom

Berikut adalah daftar pekerjaan yang disusun berdasarkan soal ujikom (Sesi 1) yang diberikan. Semuanya dibuat serapi mungkin tanpa fitur berlebihan (Sesuai SOP dan tidak ada AI Slop).

### 1. Database & Struktur (Unit: Persiapan)
- [x] **[Mudah]** Buat database dengan nama NIK: `3207250203090001` (NIK Pradipta Endra Maulana).
- [x] **[Mudah]** Buat tabel `mahasiswa` (nim, nama, alamat, jenis_kelamin, password).
- [x] **[Mudah]** Insert 3 data dummy mahasiswa dengan password menggunakan fungsi `SHA1`.

### 2. Koneksi Database (Unit: J.620100.016.01)
- [x] **[Mudah]** Buat `koneksi.php`.
- [x] **[Mudah]** Implementasikan script koneksi ke database. (Catatan: Menggunakan `mysqli_` karena `mysql_` sudah usang dan error di XAMPP baru, namun logika tetap sama murni native).

### 3. Form Login (Unit: J.620100.005.02)
- [x] **[Sedang]** Buat `form_login.php`.
- [x] **[Mudah]** Desain elegan tapi *simple* (Kotak kaku, warna tenang, tidak rounded, tidak gradient).
- [x] **[Sedang]** Validasi input NIM dan Password.
- [x] **[Sulit]** Tambahkan animasi tulisan merah berkedip "User dan/atau Password Salah" jika salah.
- [x] **[Mudah]** Jika benar, set `$_SESSION['nim']` dan arahkan ke `index.php`.

### 4. Halaman Utama / Dashboard (Unit: J.620100.016.01 & J.620100.017.02)
- [x] **[Sedang]** Buat `index.php`.
- [x] **[Mudah]** Proteksi halaman: Jika `$_SESSION['nim']` kosong, lempar balik ke `form_login.php`.
- [x] **[Sedang]** Query ke database untuk menampilkan **hanya 1 data** mahasiswa yang login.
- [x] **[Mudah]** Tampilkan data dalam bentuk Tabel (NIM, NAMA, ALAMAT, JENIS KELAMIN, AKSI).
- [x] **[Mudah]** Kolom Aksi berisi link "EDIT" yang mengarah ke `ubah_pass.php` (Gunakan desain titik 3 / dropdown aksi).

### 5. Ubah Password (Unit: J.620100.023.02 Debugging)
- [x] **[Sedang]** Buat `ubah_pass.php`.
- [x] **[Mudah]** Form untuk: Password Lama, Password Baru, Konfirmasi Password Baru.
- [x] **[Sulit]** Validasi:
  - Cek apakah password lama sesuai dengan di database.
  - Cek apakah password baru == konfirmasi password baru.
- [x] **[Sedang]** Update password di database dengan SHA1 jika semua validasi sukses.

### 6. Tools Tambahan (Unit: J.620100.011.01 & J.620100.019.02)
- [ ] **[Bisa Nanti]** Instalasi XAMPP dan Notepad++ (Dilakukan manual oleh kamu).
- [x] **[Mudah]** Buat file `info.php` berisi `phpinfo()`.
- [ ] **[Bisa Nanti]** Aktifkan IonCube Loader di `php.ini` (Dilakukan manual oleh kamu, lihat `documentation.md`).

### 7. Dokumentasi Kode Program (Unit: J.620100.023.02)
- [x] **[Mudah]** Tambahkan komentar dengan bahasa **humanis** di seluruh file kode agar mudah dibaca dan dipahami penguji/developer lain.
