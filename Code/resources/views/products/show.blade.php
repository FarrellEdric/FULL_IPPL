<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5 col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Detail Produk: {{ $product->name }}</h3>
            </div>
            <div class="card-body">
                @if ($product->photo)
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-width: 400px;">
                    </div>
                @endif

                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px;">Nama Produk</th>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $product->description ?? '-' }}</td>
                    </tr>
                    <tr>    
                        <th>Harga</th>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>{{ $product->stock_quantity }}</td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $product->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Diupdate Pada</th>
                        <td>{{ $product->updated_at->format('d M Y, H:i') }}</td>
                    </tr>
                </table>
                
                <a href="{{ route('products.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit Produk Ini</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>