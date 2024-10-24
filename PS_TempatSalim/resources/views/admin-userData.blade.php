<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempat Salim - Edit Akun</title>
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
        <!-- Button for Adding Data -->
        <div class="flex justify-end mb-4">
            <button type="button" 
                onclick="window.location='{{ route('register.register') }}'"
                class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded">
                + tambah data
            </button>
        </div>

        <!-- Responsive Table Container -->
        <div class="overflow-x-auto shadow-lg rounded-lg">
            <table class="min-w-full bg-white divide-y divide-gray-200">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-center">No</th>
                        <th class="py-3 px-6 text-center">Nama</th>
                        <th class="py-3 px-6 text-center">Username</th>
                        <th class="py-3 px-6 text-center">Password</th>
                        <th class="py-3 px-6 text-center">Nomor Ponsel</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($user as $u)
                        <tr>
                            <td class="py-3 px-6 text-center">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6 text-center">{{ $u->name }}</td>
                            <td class="py-3 px-6 text-center">{{ $u->username }}</td>
                            <td class="py-3 px-6 text-center">{{ $u->password }}</td>
                            <td class="py-3 px-6 text-center">{{ $u->no_telp }}</td>
                            <td class="py-3 px-6 text-center">
                                <!-- Button Container with Flex and Spacing -->
                                <div class="flex justify-center space-x-2">
                                    <!-- Edit Button -->
                                    <button type="button"
                                        onclick="window.location='{{ route('admin.editAkun', ['id_user' => $u->id_user]) }}'"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Ubah
                                    </button>
                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.delete', ['id_user' => $u->id_user]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
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
    </div>
</body>
</html>
