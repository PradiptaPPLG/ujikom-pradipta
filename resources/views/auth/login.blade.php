<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
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
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border-radius: 0; 
            border: 1px solid #e5e7eb;
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
        }

        .subtitle {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-size: 13px;
            font-weight: 600;
        }

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
            padding: 12px 12px 12px 44px;
            border: 1px solid #d1d5db;
            background-color: #f9fafb;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            /* Input juga kotak, ngga rounded */
            border-radius: 0; 
            outline: none;
            color: #111827;
        }

        .form-group input:focus {
            border-color: #3b82f6;
            background-color: #ffffff;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background-color: #1f2937;
            color: white;
            border: none;
            border-radius: 0; /* Kotak */
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #111827;
        }

        /* Animasi pesan merah berkedip  */
        .pesan-error {
            color: #b91c1c;
            text-align: center;
            margin-bottom: 20px;
            font-size: 13px;
            animation: blinker 1s linear infinite;
            background-color: #fef2f2;
            padding: 10px;
            border: 1px solid #fecaca;
            /* Kotak tegas */
            border-radius: 0;; 
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
    <!-- Logo Institusi -->
    <img src="{{ asset('Logo_Institut_Teknologi_Bandung.png') }}" alt="Logo Kampus" class="logo-img">
    
    <h2>Portal Mahasiswa</h2>
    <div class="subtitle">Silakan masuk pake NIM Anda</div>

    <!-- Menampilkan pesan error dari Laravel jika login gagal -->
    @if($errors->any())
        <!-- pake class pesan-error agar berkedip merah  -->
        <div class="pesan-error">
            {{ $errors->first('nim') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="form-group">
            <label>NIM</label>
            <div class="input-wrapper">
                <!-- Ikon ID Card buat NIM (Sesuai instruksi) -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                    <circle cx="8" cy="12" r="2"></circle>
                    <path d="M14 10h4"></path>
                    <path d="M14 14h4"></path>
                </svg>
                <input type="text" name="nim" required autocomplete="off" placeholder="Masukan NIM Anda" value="{{ old('nim') }}">
            </div>
        </div>
        
        <div class="form-group">
            <label>Password</label>
            <div class="input-wrapper">
                <!-- Ikon Gembok buat Password (Sesuai instruksi) -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                <input type="password" name="password" required placeholder="Masukan Password Anda">
            </div>
        </div>
        
        <button type="submit" class="btn-login">LOGIN</button>
    </form>
    
    <div class="footer-text">Sistem Informasi Akademik</div>
</div>

</body>
</html>


