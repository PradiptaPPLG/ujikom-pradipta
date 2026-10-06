@extends('layouts.app')

@section('styles')
<style>
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: 500;
        color: #374151;
    }
    
    .form-group input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        outline: none;
        /* Kotak tegas */
        border-radius: 0;
    }
    
    .form-group input:focus {
        border-color: #2563eb;
    }
    
    .btn-submit {
        background-color: #1f2937;
        color: white;
        padding: 12px 16px;
        border: none;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        font-family: 'Inter', sans-serif;
        width: 100%;
        margin-top: 10px;
        /* Kotak tegas */
        border-radius: 0;
    }
    
    .btn-submit:hover {
        background-color: #111827;
    }
</style>
@endsection

@section('content')
<div class="container" style="max-width: 500px;">
    <h2 style="border-bottom: 2px solid #2563eb; padding-bottom: 15px; margin-bottom: 25px; font-size: 20px;">Formulir Ubah Password - {{ $targetNim }}</h2>

    <!-- Area Notifikasi -->
    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Ubah Password -->
    <form method="POST" action="{{ url('ubah-password/' . $targetNim) }}">
        @csrf
        
        <div class="form-group">
            <label>Password Baru:</label>
            <input type="password" name="pass_baru" required>
        </div>
        
        <div class="form-group">
            <label>Confirm Password Baru:</label>
            <input type="password" name="pass_confirm" required>
        </div>
        
        <button type="submit" class="btn-submit">Ubah Password</button>
    </form>
    
    <div style="text-align: center;">
        <a href="{{ route('dashboard') }}" class="btn-back">&laquo; Kembali ke Utama</a>
    </div>
</div>
@endsection
