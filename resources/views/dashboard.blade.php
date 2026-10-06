@extends('layouts.app')

@section('styles')
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-size: 14px;
    }
    table, th, td {
        border: 1px solid #d1d5db;
    }
    th, td {
        padding: 12px 16px;
        text-align: left;
    }
    th {
        background-color: #f3f4f6;
        color: #111827;
        font-weight: 600;
    }

    /* Styling dropdown titik 3 / Opsi buat AKSI */
    .dropdown {
        position: relative;
        display: inline-block;
    }
    .dropbtn {
        background-color: #ffffff;
        color: #374151;
        padding: 6px 12px;
        font-size: 13px;
        font-family: 'Inter', sans-serif;
        border: 1px solid #d1d5db;
        cursor: pointer;
        /* Kotak tegas */
        border-radius: 0;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #ffffff;
        min-width: 140px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        z-index: 1;
        border: 1px solid #d1d5db;
    }
    .dropdown-content a {
        color: #111827;
        padding: 10px 16px;
        text-decoration: none;
        display: block;
        font-size: 13px;
    }
    .dropdown-content a:hover {
        background-color: #f3f4f6;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
    .dropdown:hover .dropbtn {
        background-color: #f9fafb;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="header-bar">
        <h2>Dashboard Mahasiswa</h2>
        
        <!-- Form buat proses logout yang aman (pakai POST method) -->
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
    
    <p style="font-size: 16px; margin-bottom: 20px; color: #374151;">
        Hello whatsapp, <strong>{{ $mahasiswa->nama }}</strong>!  Selamat datang di panel akademik Anda.
    </p>

    <!-- Tabel Data Mahasiswa -->
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>JENIS KELAMIN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->alamat }}</td>
                <td>{{ $mahasiswa->jenis_kelamin }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection


