<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Category</title>
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
        <h2 class="text-2xl font-bold text-center mb-6">Add New Category</h2>

        <form action="{{ route('kategori.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- ID Category -->
            <div class="form-group">
                <label for="id_ct" class="block text-lg font-medium text-gray-700">Category ID</label>
                <input type="text" name="id_ct" id="id_ct" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter Category ID" value="{{ old('id_ct') }}" required>
            </div>

            <!-- Category Name -->
            <div class="form-group">
                <label for="name_ct" class="block text-lg font-medium text-gray-700">Category Name</label>
                <input type="text" name="name_ct" id="name_ct" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter Category Name" value="{{ old('name_ct') }}" required>
            </div>

            <!-- Building (gedung) Dropdown -->
            <div class="form-group">
                <label for="code_gd" class="block text-lg font-medium text-gray-700">Building</label>
                <select name="code_gd" id="code_gd" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">-- Select Building --</option>
                    @foreach($gedung as $gd)
                        <option value="{{ $gd->code_gd }}">{{ $gd->name_gd }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Status Dropdown -->
            <div class="form-group">
                <label for="status_ct" class="block text-lg font-medium text-gray-700">Status</label>
                <select name="status_ct" id="status_ct" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="form-group text-center">
                <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded-md shadow hover:bg-green-700 transition duration-300">
                    Add Category
                </button>
            </div>
        </form>
    </div>

</body>
</html>
