<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rental List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-4">
    <div class="w-full max-w-4xl">
        <body class="bg-gray-100 flex items-center justify-center min-h-screen">
            <div class="w-full max-w-4xl">
                <h1 class="text-2xl font-bold mb-4">Manage Kategori</h1>
                <button type="button" onclick="window.location='{{ route('admin.addPinjam') }}'" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded mb-4">+ Add New Peminjaman</button>
                <table class="min-w-full bg-white divide-y divide-gray-200">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <tr>
                            <th class="py-3 px-6 text-center">No</th>
                            <th class="py-3 px-6 text-center">Nama User</th>
                            <th class="py-3 px-6 text-center">Nama Gedung</th>
                            <th class="py-3 px-6 text-center">Banyak Unit</th>
                            <th class="py-3 px-6 text-center">Waktu Sewa</th>
                            <th class="py-3 px-6 text-center">Waktu Kembali</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                <tbody>
                @foreach($pinjam as $p)
                    @foreach ($user as $u)
                        @foreach ($gedung as $g)
                        <tr>
                            <td class="py-3 px-6 text-center">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6 text-center">{{ $u->name }}</td>
                            <td class="py-3 px-6 text-center">{{ $g->name_gd }}</td>
                            <td class="py-3 px-6 text-center">{{ $p->unit_rent }}</td>
                            <td class="py-3 px-6 text-center">{{ $u->date_rent }}</td>
                            <td class="py-3 px-6 text-center">{{ $u->date_due }}</td>
                        </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
