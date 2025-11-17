@extends('layouts.admin')

@section('title', 'Edit Akun Pengguna')

@section('content')
<div class="account-edit-wrapper">
    <div class="account-edit-card">
        <h2><i class="fa-solid fa-user-pen"></i> Edit Akun Pengguna</h2>

        <form class="account-form" action="#" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="username">Nama Pengguna</label>
                <input type="text" id="username" name="username" value="dimass" required>
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" value="dimas@mail.com" required>
            </div>

            <div class="form-group">
                <label for="new-password">Kata Sandi Baru <small>(Kosongkan jika tidak ingin diubah)</small></label>
                <input type="password" id="new-password" name="new-password" placeholder="********">
            </div>

            <div class="form-group">
                <label for="role">Hak Akses (Role)</label>
                <select id="role" name="role" required>
                    <option value="admin" selected>Admin</option>
                    <option value="kasir">Kasir</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status Akun</label>
                <select id="status" name="status" required>
                    <option value="active" selected>Aktif</option>
                    <option value="inactive">Non-Aktif</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    /* ===== Hilangkan scrollbar di semua browser ===== */
    html, body {
        overflow: hidden; /* tidak bisa scroll */
        height: 100%;
    }

    /* Firefox */
    body {
        scrollbar-width: none;
    }

    /* Chrome, Safari, Edge */
    ::-webkit-scrollbar {
        display: none;
    }

    /* ===== Container utama ===== */
    .account-edit-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 15px;
        background-color: #f5f6fa;
        height: 100vh; /* penuh satu layar */
    }

    .account-edit-card {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        padding: 40px 50px;
        width: 100%;
        max-width: 650px;
        animation: fadeIn 0.4s ease;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(10px);}
        to {opacity: 1; transform: translateY(0);}
    }

    .account-edit-card h2 {
        font-size: 1.5rem;
        color: #2c3e50;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 2px solid #eaeaea;
        padding-bottom: 10px;
    }

    /* ===== Form styling ===== */
    .account-form {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .form-group label {
        font-weight: 600;
        color: #34495e;
        margin-bottom: 6px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #dcdde1;
        border-radius: 6px;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #3498db;
        box-shadow: 0 0 4px rgba(52, 152, 219, 0.3);
        outline: none;
    }

    .form-group small {
        color: #888;
        font-size: 0.8em;
        font-weight: normal;
    }

    /* ===== Tombol aksi ===== */
    .form-actions {
        margin-top: 25px;
        display: flex;
        gap: 15px;
        justify-content: flex-end;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 18px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.25s ease;
        text-decoration: none;
    }

    .btn i {
        margin-right: 8px;
    }

    .btn-primary {
        background-color: #3498db;
        color: white;
    }

    .btn-primary:hover {
        background-color: #2c80b4;
    }

    .btn-secondary {
        background-color: #bdc3c7;
        color: #2c3e50;
    }

    .btn-secondary:hover {
        background-color: #a7b1b6;
    }

    /* ===== Responsif ===== */
    @media (max-width: 600px) {
        .account-edit-card {
            padding: 25px;
        }
        .form-actions {
            flex-direction: column;
        }
        .btn {
            width: 100%;
        }
    }
</style>
@endpush


