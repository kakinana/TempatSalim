<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex font-sans">

    <!-- Sidebar -->
    <aside class="w-64 bg-yellow-600 text-white flex flex-col justify-between p-6">
        <div>
            <h2 class="text-2xl font-bold mb-8">TEMPAT SALIM</h2>
            <nav>
                <a href="{{ route('user.homepage') }}" class="flex items-center py-2 text-indigo-100 hover:text-white">
                    <span class="mr-3">🏠</span> Homepage
                </a>
                <a href="#" class="flex items-center py-2 text-indigo-100 hover:text-white">
                    <span class="mr-3">👥</span> Ajukan Penyewaan
                </a>
                <a href="#" class="flex items-center py-2 text-indigo-100 hover:text-white">
                    <span class="mr-3">📂</span> Riwayat Penyewaan
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main content -->
    <div class="flex-1 p-6">
        <header class="flex justify-between items-center mb-6">
            <input type="text" placeholder="Search..." class="w-80 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300">
            <div class="flex items-center">
                <img src="https://via.placeholder.com/30" alt="Profile Picture" class="w-8 h-8 rounded-full mr-2">
                @if(auth()->check())
                    <span class="text-x5 font-bold p-6">{{ auth()->user()->nama }}</span>
                @else
                    <span class="text-x5 font-bold p-6">Nama tidak tersedia</span>
                @endif
            </div>
        </header>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="container mx-auto py-10">
                <!-- Gedung Details Card -->
                <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 overflow-hidden">
                    <img class="w-full h-64 object-cover object-center" src="/path/to/gedung-image.jpg" alt="{{ $gedung->name_gd }}">
                    
                    <div class="p-6">
                        <h1 class="text-3xl font-semibold text-gray-800 dark:text-white">{{ $gedung->name_gd }}</h1>
                        <p class="mt-4 text-gray-600 dark:text-gray-400">{{ $gedung->description }}</p>
                        
                        <!-- Additional details -->
                        <div class="mt-4">
                            <p class="text-gray-600 dark:text-gray-400"><strong>Kategori:</strong> @foreach ($gedung->kategori as $c)
                                <p class="text-gray-600 dark:text-gray-400">- {{$c->name_ct }}</p>
                            @endforeach
                            <p class="text-gray-600 dark:text-gray-400"><strong>Harga:</strong> {{ $gedung->price_gd }}</p>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Unit Tersedia:</strong> {{ $gedung->stock_gd }}</p>
                        </div>
                        
                        <a href="{{ url()->previous() }}" class="inline-flex items-center mt-4 px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Go Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>