<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Kategori</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f8fafc;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Edit Kategori</h2>

        <form action="{{ route('admin.updateKategori', $kategori->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Category Name -->
            <div class="form-group">
                <label for="name_ct" class="block text-lg font-medium text-gray-700">Category Name</label>
                <input type="text" name="name_ct" id="name_ct" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter Category Name" value="{{ old('name_ct', $kategori->name_ct) }}" required>
            </div>

            <div class="form-group">
                <label for="name_ct" class="block text-lg font-medium text-gray-700">Category Name</label>
                <input type="text" name="detail_ct" id="detail_ct" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter Category Detail" value="{{ old('detail_ct', $kategori->detail_ct) }}" required>
            </div>

            <!-- Status Dropdown -->
            <div class="form-group">
                <label for="status_ct" class="block text-lg font-medium text-gray-700">Status</label>
                <select name="status_ct" id="status_ct" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="1" {{ $kategori->status_ct == 1 ? 'selected' : '' }}>Tersedia</option>
                    <option value="0" {{ $kategori->status_ct == 0 ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="form-group text-center">
                <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded-md shadow hover:bg-green-700 transition duration-300">
                    Update Kategori
                </button>
            </div>
        </form>
    </div>

</body>
</html>
