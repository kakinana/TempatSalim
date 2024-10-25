<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tambah Gedung</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Tambah Gedung</h1>

        <!-- Error handling (if needed) -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.storeGedung') }}" method="POST" class="space-y-6">
            @csrf

            <div class="form-group mb-4">
                <label for="code_gd" class="block text-lg font-medium">Kode Gedung</label>
                <input type="text" name="code_gd" id="code_gd" class="mt-1 block w-full px-4 py-2 border rounded-md" value="{{ old('code_gd') }}" required>
            </div>
            
            <div class="form-group mb-4">
                <label for="name_gd" class="block text-lg font-medium">Nama Gedung</label>
                <input type="text" name="name_gd" id="name_gd" class="mt-1 block w-full px-4 py-2 border rounded-md" value="{{ old('name_gd') }}" required>
            </div>

            <div class="form-group mb-4">
                <label for="price_gd" class="block text-lg font-medium">Harga Sewa</label>
                <input type="text" name="price_gd" id="price_gd" class="mt-1 block w-full px-4 py-2 border rounded-md" value="{{ old('price_gd') }}" required>
            </div>

            <div class="form-group mb-4">
                <label for="stock_gd" class="block text-lg font-medium">Jumlah Unit</label>
                <input type="number" name="stock_gd" id="stock_gd" class="mt-1 block w-full px-4 py-2 border rounded-md" value="{{ old('stock_gd') }}" required>
            </div>

            <div class="form-group mb-4">
                <label for="status_gd" class="block text-lg font-medium">Status</label>
                <select name="status_gd" id="status_gd" class="mt-1 block w-full px-4 py-2 border rounded-md">
                    <option value="1">Tersedia</option>
                    <option value="0">Tidak Tersedia</option>
                </select>
            </div>

            <div class="flex justify-end space-x-4">
                <button href="{{ route('admin.manageGedung') }}" class="bg-red-600 text-white font-bold px-4 py-2 rounded-md">Cancel</a>
                <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded-md shadow hover:bg-green-700 transition duration-300">Tambah Gedung</button>
            </div>
        </form>
    </div>
</body>

</html>
