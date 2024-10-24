<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempat Salim - Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('resources/assets/bg-lgn.jpg'); 
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-4">
    <div class="w-full max-w-4xl">
        <body class="bg-gray-100 flex items-center justify-center min-h-screen">
            <div class="w-full max-w-4xl">
                <h1 class="text-2xl font-bold mb-4">Manage Kategori</h1>
                <button type="button" onclick="window.location='{{ route('kategori.create') }}'" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded mb-4">+ Add New Kategori</button>
                <table class="min-w-full bg-white divide-y divide-gray-200">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <tr>
                            <th class="py-3 px-6 text-center">ID</th>
                            <th class="py-3 px-6 text-center">Category Name</th>
                            <th class="py-3 px-6 text-center">Building Name</th>
                            <th class="py-3 px-6 text-center">Status</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                <tbody>
                @foreach($kategori as $k)
                    <tr>
                        <td class="py-3 px-6 text-center">{{ $k->id_ct }}</td>
                        <td class="py-3 px-6 text-center">{{ $k->name_ct }}</td>
                        <td class="py-3 px-6 text-center">{{ $k->gedung->name_gd }}</td> <!-- Assuming gedung has name_gd field -->
                        <td class="py-3 px-6 text-center">{{ $k->status_ct ? 'Available' : 'Not Available' }}</td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex justify-center space-x-2">
                                <!-- Edit Button -->
                                <button type="button"
                                    onclick="window.location='{{ route('kategori.edit', $k->id_ct) }}'"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ubah
                                </button>
                                <!-- Delete Button -->
                                <form action="{{ route('kategori.delete', $k->id_ct) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
