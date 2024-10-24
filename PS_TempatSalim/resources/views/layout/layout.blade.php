<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&display=swap');
    .flatpickr-calendar {
        z-index: 9999;
    }
</style>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="bg-red-500 text-white">
        <div class="container mx-auto py-4 flex justify-between items-center">
            <div class="text-3xl font-bold">TEMPAT SALIM</div>
            <nav class="space-x-4">
                <a href="/" class="hover:underline">Home</a>
                <a href="/about-us" class="hover:underline">About Us</a>
                <a href="/services" class="hover:underline">Building List</a>
                <a href="/contact" class="hover:underline">Contact</a>
            </nav>
        </div>
    </header>
        <!-- Sidebar -->
        @yield('sidebar')

        <!-- Main Content -->
        <main class="container mx-auto my-10">
            @yield('content')
        </main>
    </div>
</body>
</html>
