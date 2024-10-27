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
            @if($kategori instanceof \Illuminate\Database\Eloquent\Collection)
                @foreach($kategori as $k)
                    <a href="#">
                        <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $k->name_ct }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $k->detail_ct }}</p>

                        <!-- Display related gedungs -->
                        @foreach($k->gedungs as $g)
                            <a href="{{ route('gedung.show', ['id' => $g->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Take a peek
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        @endforeach
                    </div>
                @endforeach
            @else
                <a href="#">
                    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $kategori->name_ct }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $kategori->detail_ct }}</p>

                    <!-- Display related gedungs -->
                    @foreach($kategori->gedungs as $g)
                        <a href="{{ route('gedung.show', ['id' => $g->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Take a peek
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>
