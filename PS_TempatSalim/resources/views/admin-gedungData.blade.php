<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Gedung</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Manage Gedung</h1>

        <!-- Add New Gedung Button -->
        <button type="button" onclick="window.location='{{ route('admin.addGedung') }}'" id="openModalBtn" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded mb-6">
            + Add New Gedung
        </button>

        <!-- Gedung List -->
        <table class="min-w-full bg-white border border-gray-200 divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="py-3 px-6 text-left">Code</th>
                    <th class="py-3 px-6 text-left">Nama</th>
                    <th class="py-3 px-6 text-left">Harga</th>
                    <th class="py-3 px-6 text-left">Stok Unit</th>
                    <th class="py-3 px-6 text-left">Status</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gedung as $g)
                    <tr>
                        <td class="py-3 px-6">{{ $g->code_gd }}</td>
                        <td class="py-3 px-6">{{ $g->name_gd }}</td>
                        <td class="py-3 px-6">{{ $g->price_gd }}</td>
                        <td class="py-3 px-6">{{ $g->stock_gd }}</td>
                        <td class="py-3 px-6">{{ $g->status_gd === 1 ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                        <td class="py-3 px-6 flex justify-center space-x-2">
                            <div class="flex justify-center space-x-2">
                                <!-- Edit Button -->
                                <button type="button"
                                    onclick="window.location='{{ route('admin.editGedung', $g->id) }}'"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ubah
                                </button>
                            <form action="{{ route('admin.deleteGedung', $g->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded font-bold">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
