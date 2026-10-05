<?php
// Memulai session agar bisa menyimpan data login user
session_start();

// Memanggil file koneksi untuk menghubungkan ke database
include 'koneksi.php';

// Variabel untuk menyimpan pesan error
$pesan_error = "";

// Mengecek apakah tombol submit login ditekan
if (isset($_POST['login'])) {
    // Mengambil data NIM dan password dari form (mencegah SQL Injection dengan real_escape_string)
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    
    // Mengenkripsi input password dengan SHA1 agar cocok dengan enkripsi di database
    $password_sha1 = sha1($password);

    // Query untuk mencocokkan NIM dan Password di tabel mahasiswa
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim' AND password='$password_sha1'");
    
    // Mengecek apakah ada data yang cocok (jumlah baris > 0)
    if (mysqli_num_rows($query) > 0) {
        // Jika data benar, aktifkan session 'nim'
        $_SESSION['nim'] = $nim;
        
        // Arahkan / Redirect ke halaman index.php
        header("Location: index.php");
        exit(); // Hentikan eksekusi script selanjutnya
    } else {
        // Jika salah, siapkan pesan error
        $pesan_error = "User dan/atau Password Salah";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal Mahasiswa</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6; /* Warna background abu-abu terang */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #1f2937;
        }
        .login-box {
            background-color: #ffffff;
            padding: 40px 30px;
            width: 340px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.025);
            border-radius: 16px; /* Dibuat melengkung membulat halus seperti di referensi foto */
            text-align: center;
        }
        .logo-img {
            width: 75px;
            height: auto;
            margin-bottom: 15px;
        }
        h2 {
            margin-top: 0;
            color: #111827;
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 8px;
            letter-spacing: -0.02em;
        }
        .subtitle {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
            text-align: left; /* Label teks ditaruh di kiri */
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-size: 13px;
            font-weight: 600;
        }
        
        /* Container untuk menggabungkan input dan icon */
        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .input-wrapper svg {
            position: absolute;
            left: 14px;
            color: #9ca3af;
            width: 20px;
            height: 20px;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 12px 12px 44px; /* Padding kiri dilonggarkan untuk ruang ikon */
            border: 1px solid #e5e7eb;
            background-color: #f9fafb; /* Input abu-abu sangat muda */
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            border-radius: 8px; /* Border radius input */
            transition: all 0.2s;
            outline: none;
            color: #111827;
        }
        .form-group input:focus {
            border-color: #3b82f6;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }
        
        .btn-login {
            width: 100%;
            padding: 14px;
            background-color: #374151; /* Warna abu-abu gelap kehitaman seperti difoto */
            color: white;
            border: none;
            border-radius: 8px; /* Tombol membulat */
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            transition: background-color 0.2s;
            margin-top: 10px;
        }
        .btn-login:hover {
            background-color: #1f2937;
        }
        
        /* Pesan Error Berkedip - dibikin lebih nge-blend dengan desain */
        .pesan-error {
            color: #b91c1c;
            text-align: center;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 600;
            animation: blinker 1s linear infinite;
            background-color: #fef2f2;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #fecaca;
        }
        @keyframes blinker {
            50% { opacity: 0.5; }
        }
        
        .footer-text {
            margin-top: 24px;
            font-size: 12px;
            color: #9ca3af;
        }
    </style>
</head>
<body>

<div class="login-box">
    <!-- Logo Kampus Asli -->
    <img src="Logo_Institut_Teknologi_Bandung.png" alt="Logo ITB" class="logo-img">
    
    <h2>Portal Mahasiswa</h2>
    <div class="subtitle">Silakan masuk menggunakan NIM Anda</div>

    <!-- Tempat pesan kesalahan muncul -->
    <?php if ($pesan_error != ""): ?>
        <div class="pesan-error"><?php echo $pesan_error; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label>Nomor Induk Mahasiswa (NIM)</label>
            <div class="input-wrapper">
                <!-- Ikon ID Card (Kotak nama) -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                    <circle cx="8" cy="12" r="2"></circle>
                    <path d="M14 10h4"></path>
                    <path d="M14 14h4"></path>
                </svg>
                <input type="text" name="nim" required autocomplete="off" placeholder="Contoh: 11120001">
            </div>
        </div>
        
        <div class="form-group">
            <label>Kata Sandi</label>
            <div class="input-wrapper">
                <!-- Ikon Gembok (Lock) -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                <input type="password" name="password" required placeholder="••••••••">
            </div>
        </div>
        
        <button type="submit" name="login" class="btn-login">Masuk ke Sistem</button>
    </form>
    
    <div class="footer-text">Sistem Informasi Akademik</div>
</div>

</body>
</html>
