<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Meja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10">
                <h1>Manajemen Meja</h1>
                <p>Halaman ini untuk mengatur data master meja dan status ketersediaan (booking).</p>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('tables.create') }}" class="btn btn-primary">Tambah Meja</a>
            </div>
        </div>
        
        <hr>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nomor Meja</th>
                    <th scope="col">Kapasitas</th>
                    <th scope="col">Status (Ijo/Merah)</th>
                    <th scope="col">Aksi Booking (Toggle)</th>
                    <th scope="col">Aksi Data Meja</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tables as $table)
                    <tr>
                        <td><strong>{{ $table->table_number }}</strong></td>
                        <td>{{ $table->capacity }} orang</td>
                        <td>
                            @if ($table->activeBooking)
                                <!-- Kalo ADA, berarti MEJA MERAH (FILLED) -->
                                <span class="badge bg-danger fs-6">Filled (Terisi)</span>
                            @else
                                <!-- Kalo GAK ADA, berarti MEJA IJO (EMPTY) -->
                                <span class="badge bg-success fs-6">Empty (Kosong)</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('bookings.toggleStatus', $table->id) }}" method="POST">
                                @csrf
                                @method('PATCH') 
                                @if ($table->activeBooking)
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Tandai Kosong (Empty)
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Tandai Terisi (Filled)
                                    </button>
                                @endif
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('tables.destroy', $table->id) }}" method="POST">
                                <a href="{{ route('tables.show', $table->id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus meja ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data meja.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>