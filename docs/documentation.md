# Dokumentasi Sistem Informasi Akademik

Dokumen ini berisi panduan teknis terkait aplikasi yang telah dibangun sesuai dengan standar ujikom.

## 1. Persiapan Database
1. Buka `http://localhost/phpmyadmin`
2. Buat database baru dengan nama NIK kamu: `3207250203090001`
3. Kamu bisa menggunakan file `database.sql` yang sudah disediakan di folder ini. Cukup buka tab "Import" di phpmyadmin, lalu upload file `database.sql` tersebut, ATAU kamu copy paste isi `database.sql` ke tab SQL dan klik GO.

## 2. Struktur File
- `koneksi.php` : File jembatan antara PHP dan database MySQL.
- `form_login.php` : Halaman awal untuk autentikasi user.
- `index.php` : Halaman dashboard yang diproteksi session, menampilkan data mahasiswa terkait.
- `ubah_pass.php` : Halaman untuk mengganti password dengan validasi ketat.
- `logout.php` : Script untuk menghapus session dan keluar dari aplikasi.
- `info.php` : Menampilkan informasi PHP environment.

## 3. Catatan Penting Mengenai Fungsi MySQL
Di soal aslinya tertulis menggunakan fungsi `mysql_connect`, `mysql_select_db`, `mysql_query`, dll. 
Fungsi-fungsi tersebut sudah **DIHAPUS** secara permanen dari PHP versi 7 ke atas. Karena saat ini hampir semua XAMPP terbaru menggunakan PHP 8+, jika kita menggunakan fungsi lama tersebut, web akan *crash* dan Error 500.
Oleh karena itu, di source code kita menggunakan standar penggantinya, yaitu `mysqli_` (MySQL Improved). Logikanya 100% sama dengan `mysql_`, hanya ketambahan huruf "i" dan sedikit penyesuaian parameter. Jika asesor menanyakan hal ini, kamu bisa jawab:
> "Sesuai best practice PHP modern, fungsi mysql_ lawas sudah deprecated dan tidak didukung XAMPP terbaru, sehingga saya mengimplementasikan mysqli_ agar aplikasi dapat berjalan tanpa error."

## 4. Instalasi IonCube Loader (Manual - Sesuai Soal)
Soal menyebutkan agar file koneksi.php diamankan oleh ioncube dan kita harus mengaktifkan IonCube Loader. Berikut tahapannya untuk dipraktekan:
1. Buka `http://localhost/info.php` yang telah kita buat.
2. Lihat arsitektur PHP kamu (x86 atau x64) dan versinya (misal PHP 8.1).
3. Download IonCube loader dari situs resminya (https://www.ioncube.com/loaders.php).
4. Ekstrak file zip hasil download, cari file `.dll` yang sesuai dengan versi PHP kamu (misal `ioncube_loader_win_8.1.dll`).
5. Copy file `.dll` tersebut ke folder `C:\xampp\php\ext\`.
6. Buka file `php.ini` dari XAMPP Control Panel (Config -> php.ini).
7. Tambahkan baris ini di paling atas atau di bawah `[PHP]`:
   `zend_extension = "C:\xampp\php\ext\ioncube_loader_win_8.1.dll"` (sesuaikan nama file).
8. Restart Apache di XAMPP. Refresh halaman `info.php`, jika berhasil akan ada teks tulisan ioncube loader terinstall.
