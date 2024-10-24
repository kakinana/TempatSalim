<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow-md">
        <nav class="container mx-auto p-4">
            <ul class="flex justify-center space-x-8">
                <li><a href="#about" class="text-gray-700 font-semibold hover:text-orange-500">About</a></li>
                <li><a href="#building-list" class="text-gray-700 font-semibold hover:text-orange-500">Building List</a></li>
                <li><a href="#testimoni" class="text-gray-700 font-semibold hover:text-orange-500">Contact Us</a></li>
                <li><a href="{{ route('login')}}" class="text-gray-700 font-semibold hover:text-orange-500">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="py-16">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold text-orange-500 mb-12">Most Demanding</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="meetroom.jpg" alt="Meeting Room" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-2 text-gray-800">Meeting Room</h2>
                        <p class="text-gray-600 italic">A space where ideas come to life—our meeting rooms blend comfort and technology to foster creativity and collaboration.</p>
                    </div>
                </div>

                <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="ballroom.jpg" alt="Ballroom" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-2 text-gray-800">Ballroom</h2>
                        <p class="text-gray-600 italic">Step into elegance—our ballroom is where celebrations shine, perfect for unforgettable moments and grand occasions.</p>
                    </div>
                </div>

                <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="stadium.jpg" alt="Stadium" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-2 text-gray-800">Stadium</h2>
                        <p class="text-gray-600 italic">Feel the adrenaline in every cheer—our stadium immerses you in the excitement, where every event becomes a spectacular experience</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
