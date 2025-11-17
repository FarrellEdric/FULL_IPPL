<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Akun</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --primary-light: #dbeafe;
            --secondary: #64748b;
            --secondary-dark: #475569;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --bg-light: #f8fafc;
            --bg-white: #ffffff;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --border: #e2e8f0;
            --radius: 12px;
            --radius-sm: 8px;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.08);
            --font: 'Inter', 'Segoe UI', sans-serif;
        }

        /* ===== Base ===== */
        body {
            font-family: var(--font);
            background-color: var(--bg-light);
            color: var(--text-dark);
            margin: 0;
            padding: 0;
        }

        /* ===== Main Container ===== */
        .admin-container {
            margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
            padding: 30px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        @media (max-width: 1024px) {
            .admin-container {
                margin-left: 0;
                padding: 20px;
            }
        }

        /* ===== Page Header ===== */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border);
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .page-title i {
            color: var(--primary);
        }

        /* ===== Main Content Grid ===== */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
        }

        @media (max-width: 900px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ===== Card ===== */
        .card {
            background: var(--bg-white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        /* ===== Left Section ===== */
        .left-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary);
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn {
            border: none;
            border-radius: var(--radius-sm);
            padding: 12px 18px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .btn i {
            font-size: 1rem;
        }

        .btn-add {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
        }

        .btn-add:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .stats-card {
            background: var(--primary-light);
            border-left: 4px solid var(--primary);
        }

        .stats-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .stats-label {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        /* ===== Right Section ===== */
        .right-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .search-wrapper {
            position: relative;
            width: 100%;
            max-width: 300px;
        }

        .search-wrapper i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .search-input {
            width: 100%;
            padding: 10px 14px 10px 40px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
            background: var(--bg-white);
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .filter-group {
            display: flex;
            gap: 10px;
        }

        .filter-select {
            padding: 10px 14px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
            background: var(--bg-white);
            font-size: 0.95rem;
            cursor: pointer;
        }

        /* ===== Table ===== */
        .table-container {
            overflow-x: auto;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--bg-white);
        }

        thead {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
        }

        th {
            padding: 16px 18px;
            text-align: left;
            font-weight: 600;
            font-size: 0.9rem;
        }

        td {
            padding: 14px 18px;
            text-align: left;
            border-bottom: 1px solid var(--border);
            font-size: 0.9rem;
        }

        tbody tr {
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background-color: #f1f5ff;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-active {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .status-inactive {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            padding: 6px 10px;
            border-radius: var(--radius-sm);
            border: none;
            background: transparent;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-edit-action {
            color: var(--warning);
        }

        .btn-edit-action:hover {
            background-color: rgba(245, 158, 11, 0.1);
        }

        .btn-delete-action {
            color: var(--danger);
        }

        .btn-delete-action:hover {
            background-color: rgba(239, 68, 68, 0.1);
        }

        /* ===== Pagination ===== */
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding: 15px 0;
        }

        .pagination-info {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .pagination-controls {
            display: flex;
            gap: 8px;
        }

        .pagination-btn {
            padding: 8px 12px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
            background: var(--bg-white);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .pagination-btn:hover {
            background: var(--primary-light);
            border-color: var(--primary);
        }

        .pagination-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
    </style>
</head>
<body>
    @extends('layouts.admin')
    @section('title', 'Manajemen Akun')
    
    @section('content')
    <div class="admin-container">
        <div class="page-header">
            <h1 class="page-title"><i class="fas fa-users-cog"></i>Manajemen Akun Pengguna</h1>
        </div>

        <div class="content-grid">
            <div class="left-section">
                <div class="card">
                    <h2 class="section-title"><i class="fas fa-tachometer-alt"></i>Dashboard</h2>
                    <div class="btn-group">
                        <button class="btn btn-add"><i class="fas fa-user-plus"></i> Tambah Akun</button>
                    </div>
                </div>

                <div class="card stats-card">
                    <div class="stats-value">4</div>
                    <div class="stats-label">Total Akun</div>
                </div>

                <div class="card">
                    <h2 class="section-title"><i class="fas fa-info-circle"></i>Informasi</h2>
                    <p style="font-size: 0.9rem; color: var(--text-light); line-height: 1.5;">
                        Halaman ini memungkinkan Anda untuk mengelola semua akun pengguna dalam sistem. 
                        Anda dapat menambah, mengedit, atau menghapus akun sesuai kebutuhan.
                    </p>
                </div>
            </div>

            <div class="right-section">
                <div class="card">
                    <div class="toolbar">
                        <div class="search-wrapper">
                            <i class="fas fa-search"></i>
                            <input type="text" class="search-input" placeholder="Cari nama akun...">
                        </div>
                        <div class="filter-group">
                            <select class="filter-select">
                                <option>Semua Peran</option>
                                <option>Admin</option>
                                <option>Kasir</option>
                                <option>User</option>
                            </select>
                            <select class="filter-select">
                                <option>Semua Status</option>
                                <option>Aktif</option>
                                <option>Nonaktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID Akun</th>
                                    <th>Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>Peran</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ACC-001</td>
                                    <td>Dimass</td>
                                    <td>Admin@gmail.com</td>
                                    <td>Administrator</td>
                                    <td><span class="status-badge status-active">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-action btn-edit-action" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action btn-delete-action" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ACC-002</td>
                                    <td>Edric</td>
                                    <td>Kasir@gmail.com</td>
                                    <td>Kasir</td>
                                    <td><span class="status-badge status-active">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-action btn-edit-action" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action btn-delete-action" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ACC-003</td>
                                    <td>Sarah</td>
                                    <td>sarah@example.com</td>
                                    <td>User</td>
                                    <td><span class="status-badge status-inactive">Nonaktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-action btn-edit-action" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action btn-delete-action" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ACC-004</td>
                                    <td>Rizky</td>
                                    <td>rizky@example.com</td>
                                    <td>Kasir</td>
                                    <td><span class="status-badge status-active">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-action btn-edit-action" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action btn-delete-action" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination">
                        <div class="pagination-info">
                            Menampilkan 1-4 dari 4 akun
                        </div>
                        <div class="pagination-controls">
                            <button class="pagination-btn active">1</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>