<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5 col-md-6">
        <h1>Edit Meja: {{ $table->table_number }}</h1>
        <hr>

        <form action="{{ route('tables.update', $table->id) }}" method="POST">
            @csrf
            @method('PUT') <div class="mb-3">
                <label for="table_number" class="form-label">Nomor Meja</label>
                <input type="text" class="form-control @error('table_number') is-invalid @enderror" 
                       id="table_number" name="table_number" 
                       value="{{ old('table_number', $table->table_number) }}">
                @error('table_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="capacity" class="form-label">Kapasitas</label>
                <input type="number" class="form-control @error('capacity') is-invalid @enderror" 
                       id="capacity" name="capacity" 
                       value="{{ old('capacity', $table->capacity) }}">
                @error('capacity')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select @error('status') is-invalid @enderror" 
                        id="status" name="status">
                    <option value="empty" {{ old('status', $table->status) == 'empty' ? 'selected' : '' }}>Empty (Kosong)</option>
                    <option value="filled" {{ old('status', $table->status) == 'filled' ? 'selected' : '' }}>Filled (Terisi)</option>
                    <option value="maintenance" {{ old('status', $table->status) == 'maintenance' ? 'selected' : '' }}>Maintenance (Perbaikan)</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('tables.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>