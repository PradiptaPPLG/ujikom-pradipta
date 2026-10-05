<?php
// Memulai session untuk mengecek status login
session_start();

// Memanggil file koneksi ke database
include 'koneksi.php';

// Memeriksa apakah session 'nim' kosong (belum login)
if (empty($_SESSION['nim'])) {
    // Jika kosong, arahkan kembali ke form login
    header("Location: form_login.php");
    exit();
}

// Menyimpan NIM dari session ke variabel agar mudah dipanggil
$nim_login = $_SESSION['nim'];

// Query untuk mengambil HANYA 1 data mahasiswa yang sesuai dengan session NIM
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim_login'");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama Akademik</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 40px 20px;
            color: #334155;
        }
        .container {
            background-color: #fff;
            padding: 32px;
            border: 1px solid #e2e8f0;
            max-width: 900px;
            margin: 0 auto;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border-radius: 0; /* Tetap kotak */
        }
        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 16px;
            margin-bottom: 24px;
        }
        h2 {
            margin: 0;
            color: #0f172a;
            font-weight: 600;
            letter-spacing: -0.02em;
        }
        p {
            font-size: 14px;
            margin-bottom: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 14px;
        }
        table, th, td {
            border: 1px solid #e2e8f0;
        }
        th, td {
            padding: 12px 16px;
            text-align: left;
        }
        th {
            background-color: #f1f5f9;
            color: #0f172a;
            font-weight: 600;
        }
        
        /* Styling dropdown aksi (Titik 3 / More) */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropbtn {
            background-color: #ffffff;
            color: #475569;
            padding: 6px 12px;
            font-size: 13px;
            font-family: 'Inter', sans-serif;
            border: 1px solid #cbd5e1;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #ffffff;
            min-width: 150px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            z-index: 1;
            border: 1px solid #e2e8f0;
        }
        .dropdown-content a {
            color: #334155;
            padding: 10px 16px;
            text-decoration: none;
            display: block;
            font-size: 13px;
            transition: background-color 0.2s;
        }
        .dropdown-content a:hover {
            background-color: #f1f5f9;
            color: #0f172a;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown:hover .dropbtn {
            background-color: #f8fafc;
            border-color: #94a3b8;
        }

        .btn-logout {
            text-decoration: none;
            background-color: #ffffff;
            color: #ef4444;
            padding: 8px 16px;
            border: 1px solid #ef4444;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s;
        }
        .btn-logout:hover {
            background-color: #ef4444;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header-bar">
        <h2>Data Mahasiswa</h2>
        <!-- Link untuk logout dan menghapus session -->
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>
    
    <p>Selamat datang, Anda login sebagai NIM: <strong><?php echo htmlspecialchars($nim_login); ?></strong></p>

    <!-- Tabel Data Mahasiswa -->
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>JENIS KELAMIN</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Mengambil baris hasil query menjadi array asosiatif (sesuai instruksi mysql_fetch_array / mysqli_fetch_array)
            if ($row = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                
                // Bagian Aksi dengan fitur menu titik 3 (More) yang didalamnya terdapat link EDIT
                echo "<td>";
                echo "<div class='dropdown'>";
                echo "  <button class='dropbtn'>&#8942; Opsi</button>";
                echo "  <div class='dropdown-content'>";
                // Link edit menuju ubah_pass.php
                echo "      <a href='ubah_pass.php'>EDIT (Ubah Pass)</a>";
                echo "  </div>";
                echo "</div>";
                echo "</td>";
                
                echo "</tr>";
            } else {
                echo "<tr><td colspan='5'>Data tidak ditemukan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
