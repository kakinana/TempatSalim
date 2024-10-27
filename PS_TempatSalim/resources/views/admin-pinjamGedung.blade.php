<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Create New Rental</h2>
    <form action="{{ route('admin.storePinjam') }}" method="POST">
        @csrf

        <!-- User Selection -->
        <div class="mb-3">
            <label for="id_user" class="form-label">User</label>
            <select id="id_user" class="form-control" name="id_user" required>
                <option value="">Select User</option>
                @foreach($user as $u)
                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Building Selection -->
        <div class="mb-3">
            <label for="id_gd" class="form-label">Pilih Gedung</label>
            <select name="id_gd" id="id_gd" class="form-control" required>
                <option value="">Select Building</option>
                @foreach($gedung as $ged)
                    <option value="{{ $ged->id }}">{{ $ged->name_gd }}</option>
                @endforeach
            </select>
        </div>

        <!-- Total Rent -->
        <div class="mb-3">
            <label for="unit_rent" class="form-label">Banyak Unit</label>
            <input type="number" class="form-control" name="unit_rent" required max="2">
        </div>

        <!-- Rent Start Date -->
        <div class="mb-3">
            <label for="date_rent" class="form-label">Tanggal Awal Pemakaian</label>
            <input type="date" class="form-control" name="date_rent" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit Rental</button> 
    </form>
</div>
</body>
</html>
