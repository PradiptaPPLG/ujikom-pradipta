<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
    <!-- Kita pakai font Inter dari Google Fonts agar rapi -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* CSS murni, tanpa Bootstrap/Tailwind. Desain tegas, kotak (border-radius: 0), tanpa gradien. */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6; /* Abu-abu terang */
            margin: 0;
            color: #1f2937;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 30px;
            border: 1px solid #e5e7eb;
            /* Kotak tegas, ngga rounded */
            border-radius: 0; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        h2 {
            margin: 0;
            color: #111827;
            font-weight: 600;
        }

        .btn-logout {
            background-color: transparent;
            color: #dc2626;
            border: 1px solid #dc2626;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.2s, color 0.2s;
        }

        .btn-logout:hover {
            background-color: #dc2626;
            color: #ffffff;
        }

        /* Notifikasi sukses/error umum */
        .alert {
            padding: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid transparent;
        }
        .alert-error {
            color: #b91c1c;
            background-color: #fef2f2;
            border-color: #fecaca;
        }
        .alert-success {
            color: #15803d;
            background-color: #f0fdf4;
            border-color: #bbf7d0;
        }
        
        /* Tombol kembali */
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            color: #4b5563;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 16px;
            border: 1px solid #d1d5db;
        }
        .btn-back:hover {
            background-color: #f9fafb;
        }
    </style>
    @yield('styles')
</head>
<body>

    @yield('content')

</body>
</html>

