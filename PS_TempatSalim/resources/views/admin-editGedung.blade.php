<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Gedung</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Edit Gedung</h1>

        <form action="{{ route('admin.updateGedung', $gedung->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-4">
                <label for="name_gd" class="block text-lg font-medium">Nama Gedung</label>
                <input type="text" name="name_gd" id="name_gd" class="mt-1 block w-full px-4 py-2 border rounded-md" value="{{ $gedung->name_gd }}" required>
            </div>

            <div class="form-group mb-4">
                <label for="code_gd" class="block text-lg font-medium">Kode Gedung</label>
                <input type="text" name="code_gd" id="code_gd" class="mt-1 block w-full px-4 py-2 border rounded-md" value="{{ $gedung->code_gd }}" required>
            </div>

            <div class="form-group mb-4">
                <label for="price_gd" class="block text-lg font-medium">Harga Sewa</label>
                <input type="text" name="price_gd" id="price_gd" class="mt-1 block w-full px-4 py-2 border rounded-md" value="{{ $gedung->price_gd }}" required>
            </div>

            <div class="form-group mb-4">
                <label for="stock_gd" class="block text-lg font-medium">Jumlah Unit</label>
                <input type="number" name="stock_gd" id="stock_gd" class="mt-1 block w-full px-4 py-2 border rounded-md" value="{{ $gedung->stock_gd }}" required>
            </div>

            <div class="form-group mb-4">
                <label for="status_gd" class="block text-lg font-medium">Status</label>
                <select name="status_gd" id="status_gd" class="mt-1 block w-full px-4 py-2 border rounded-md">
                    <option value="1" {{ $gedung->status_gd ? 'selected' : '' }}>Tersedia</option>
                    <option value="0" {{ !$gedung->status_gd ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.manageGedung') }}" class="bg-red-600 text-white px-4 py-2 rounded-md">Cancel</a>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Update Gedung</button>
            </div>
        </form>
    </div>
</body>

</html>
