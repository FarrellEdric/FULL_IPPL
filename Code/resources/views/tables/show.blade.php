<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Meja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Detail Meja: {{ $table->table_number }}</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px;">Nomor Meja</th>
                        <td>{{ $table->table_number }}</td>
                    </tr>
                    <tr>
                        <th>Kapasitas</th>
                        <td>{{ $table->capacity }} orang</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if ($table->status == 'empty')
                                <span class="badge bg-success fs-6">Empty (Kosong)</span>
                            @elseif ($table->status == 'filled')
                                <span class="badge bg-danger fs-6">Filled (Terisi)</span>
                            @else
                                <span class="badge bg-warning fs-6">{{ $table->status }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $table->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Diupdate Pada</th>
                        <td>{{ $table->updated_at->format('d M Y, H:i') }}</td>
                    </tr>
                </table>
                
                <a href="{{ route('tables.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
                <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-warning">Edit Meja Ini</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>