<?php
// Memulai session, wajib di awal file untuk mengecek login
session_start();

// Memanggil koneksi database
include 'koneksi.php';

// Proteksi halaman, kembalikan ke login jika belum login
if (empty($_SESSION['nim'])) {
    header("Location: form_login.php");
    exit();
}

$nim_login = $_SESSION['nim'];
$pesan_notif = ""; // Variabel untuk pesan notifikasi (sukses/gagal)
$warna_notif = ""; // Warna notifikasi (merah=gagal, hijau=sukses)

// Jika tombol 'Ubah Password' diklik (form disubmit)
if (isset($_POST['ubah'])) {
    $pass_lama = mysqli_real_escape_string($koneksi, $_POST['pass_lama']);
    $pass_baru = mysqli_real_escape_string($koneksi, $_POST['pass_baru']);
    $pass_confirm = mysqli_real_escape_string($koneksi, $_POST['pass_confirm']);

    // 1. Enkripsi password lama untuk dicocokkan dengan database
    $pass_lama_sha1 = sha1($pass_lama);

    // Ambil password dari database milik mahasiswa yang sedang login
    $cek_db = mysqli_query($koneksi, "SELECT password FROM mahasiswa WHERE nim='$nim_login'");
    $data_db = mysqli_fetch_array($cek_db);
    $password_di_database = $data_db['password'];

    // 2. Mengecek apakah Password Lama salah
    if ($pass_lama_sha1 !== $password_di_database) {
        // Jika salah, proses batal
        $pesan_notif = "Proses Batal: Password Lama Salah!";
        $warna_notif = "red";
    } 
    // 3. Jika password lama benar, tapi password baru dan konfirmasi tidak sama
    else if ($pass_baru !== $pass_confirm) {
        // Jika tidak sama, proses batal
        $pesan_notif = "Proses Batal: Password Baru dan Konfirmasi Password tidak sama!";
        $warna_notif = "red";
    } 
    // 4. Jika password lama benar, dan konfirmasi password baru sama
    else {
        // Proses update password berhasil. Enkripsi pass_baru dengan SHA1
        $pass_baru_sha1 = sha1($pass_baru);
        
        // Update data ke tabel
        $update = mysqli_query($koneksi, "UPDATE mahasiswa SET password='$pass_baru_sha1' WHERE nim='$nim_login'");
        
        if ($update) {
            $pesan_notif = "Proses Berhasil: Password Anda telah diubah.";
            $warna_notif = "green";
        } else {
            $pesan_notif = "Terjadi kesalahan pada sistem database.";
            $warna_notif = "red";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 40px 20px;
            color: #334155;
            display: flex;
            justify-content: center;
        }
        .container {
            background-color: #fff;
            padding: 32px;
            border: 1px solid #e2e8f0;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border-radius: 0;
        }
        h2 {
            margin-top: 0;
            color: #0f172a;
            font-weight: 600;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 16px;
            margin-bottom: 24px;
            letter-spacing: -0.02em;
            font-size: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 500;
            color: #475569;
        }
        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }
        .form-group input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        .btn-submit {
            background-color: #2563eb;
            color: white;
            padding: 12px 16px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            transition: background-color 0.2s;
            width: 100%;
            margin-top: 8px;
        }
        .btn-submit:hover {
            background-color: #1d4ed8;
        }
        .btn-kembali {
            display: block;
            text-align: center;
            margin-top: 16px;
            background-color: #ffffff;
            color: #475569;
            padding: 10px 16px;
            text-decoration: none;
            border: 1px solid #cbd5e1;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s;
        }
        .btn-kembali:hover {
            background-color: #f8fafc;
            color: #0f172a;
        }
        .notifikasi {
            padding: 12px 16px;
            margin-bottom: 24px;
            border: 1px solid transparent;
            font-weight: 500;
            font-size: 14px;
            background-color: #f8fafc;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Formulir Ubah Password</h2>
    
    <!-- Menampilkan area notifikasi jika ada pesan error atau sukses -->
    <?php if ($pesan_notif != ""): ?>
        <div class="notifikasi" style="color: <?php echo $warna_notif; ?>; border-color: <?php echo $warna_notif; ?>;">
            <?php echo $pesan_notif; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label>Password Lama:</label>
            <input type="password" name="pass_lama" required>
        </div>
        <div class="form-group">
            <label>Password Baru:</label>
            <input type="password" name="pass_baru" required>
        </div>
        <div class="form-group">
            <label>Confirm Password Baru:</label>
            <input type="password" name="pass_confirm" required>
        </div>
        <button type="submit" name="ubah" class="btn-submit">Ubah Password</button>
    </form>
    
    <a href="index.php" class="btn-kembali">&laquo; Kembali ke Utama</a>
</div>

</body>
</html>
