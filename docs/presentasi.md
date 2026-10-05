# Bahan Presentasi Ujikom

Halo! Dokumen ini disiapkan khusus buat kamu presentasi di depan asesor. Poin-poin di bawah ini dirancang terstruktur namun mudah diucapkan.

## 1. Tentang Aplikasi
"Aplikasi ini adalah Sistem Informasi Akademik sederhana yang dibuat sesuai instruksi, berfokus pada fungsionalitas CRUD dasar, Autentikasi yang aman, dan implementasi Session. Aplikasi ini bersifat *Restricted Access*, artinya tidak ada satupun halaman yang bisa diakses tanpa login terlebih dahulu."

## 2. Tech Stack (Teknologi yang Digunakan)
- **Backend**: **PHP Native Murni (Tanpa Framework)**. Mengikuti standar kompetensi pemrograman terstruktur.
- **Database**: **MySQL** (Diakses menggunakan ekstensi `mysqli` di PHP agar kompatibel dengan server versi terbaru).
- **Frontend/UI**: **HTML5 & CSS3 Murni**. Tidak menggunakan Bootstrap atau framework CSS lain untuk menjaga aplikasi tetap ringan, rapih, dengan desain kotak/tegas yang profesional (Menghindari kesan berlebihan).

## 3. Hubungan Front-End (FE) dan Back-End (BE)
"Hubungan antara FE dan BE di aplikasi ini bersifat *Server-Side Rendering* (SSR). 
Setiap kali user melakukan interaksi di tampilan (misal klik login atau ubah password di HTML), data akan dikirim menggunakan *HTTP POST Request* ke server. 
Server (PHP) akan memproses data tersebut, mengeceknya ke Database (MySQL), dan langsung menghasilkan output halaman HTML baru yang dikembalikan ke layar pengguna."

## 4. Implementasi Konsep MVC (Model-View-Controller)
Meskipun aplikasi ini menggunakan PHP Native murni tanpa framework seperti Laravel/CodeIgniter, aplikasi ini tetap menerapkan pola dasar yang menyerupai MVC agar kode tetap bersih (Clean Code):
- **Model (Data)**: Diwakili oleh struktur database (tabel `mahasiswa`) dan fungsi-fungsi SQL (seperti `mysqli_query` dan koneksi database di `koneksi.php`). Ini adalah tempat data disimpan dan diambil.
- **View (Tampilan)**: Diwakili oleh blok-blok kode HTML, CSS, dan tag `echo` pada PHP. Ini berfungsi menyajikan data secara visual ke pengguna (seperti `form_login.php` bagian UI-nya, atau tabel di `index.php`).
- **Controller (Logika)**: Diwakili oleh script PHP yang mengatur jalannya program (Misalnya pengecekan if-else saat login, validasi penggantian password di `ubah_pass.php`, dan sistem proteksi Session). Controller bertugas menerima input dari View, berkoordinasi dengan Model (Database), dan menentukan View mana yang harus ditampilkan selanjutnya.

## 5. Keamanan Sederhana
- Enkripsi password menggunakan `SHA1` di level database sesuai instruksi soal.
- Proteksi halaman menggunakan `$_SESSION`, jika belum login, otomatis dilempar keluar sistem.
