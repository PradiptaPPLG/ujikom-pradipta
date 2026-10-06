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
        <h2>Data Mahasiswa</h2>
        
        <!-- Form buat proses logout yang aman (pakai POST method) -->
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
    
    <p style="font-size: 14px; margin-bottom: 20px;">
        Selamat datang di Dashboard Admin. Anda login sebagai <strong>{{ $admin->nama }}</strong>
    </p>

    <!-- Tabel Data Mahasiswa - Sesuai Soal -->
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
            @foreach($semuaMahasiswa as $mhs)
            <tr>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->alamat }}</td>
                <td>{{ $mhs->jenis_kelamin }}</td>
                <td>
                    <!-- Tombol AKSI pake titik 3  -->
                    <div class="dropdown">
                        <button class="dropbtn">&#8942; Opsi</button>
                        <div class="dropdown-content">
                            <a href="{{ url('ubah-password/' . $mhs->nim) }}">EDIT (Ubah Pass)</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


