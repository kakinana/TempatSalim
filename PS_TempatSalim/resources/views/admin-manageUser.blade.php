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

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-xs">
        <!-- Edit User Data -->
        <form action="{{ route('admin.update', ['id_user' => $user->id_user]) }}" method="POST">
            @csrf
            @method('PUT')
            <h2 class="text-center text-3xl font-bold text-orange-600 mb-4">TEMPAT SALIM</h2>
            <p class="text-center text-gray-500 mb-6">Ubad Data Akun</p>
            
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

            <!-- Update form -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" value="{{$user->name}}" name="name">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-orange-400" id="username" name="username" value="{{$user->username}}" type="text" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="no_telp">Nomor Ponsel</label>
                <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-orange-400" id="no_telp" name="no_telp" type="text" value="{{$user->no_telp}}" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="role" class="form-select" required>
                    <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                    <option value="user" @if($user->role == 'user') selected @endif>Pengguna</option>
                </select>
            </div>
            <div class="flex items-center justify-center">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Ubah Data
                </button>
            </div>
        </div>
    </form>
</body>

</html>
