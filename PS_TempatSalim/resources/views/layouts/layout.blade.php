<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen font-sans">

    <div class="flex h-full">
        <!-- Sidebar -->
        @yield('sidebar')

        <!-- Main content area -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>

    <script src="scripts.js"></script>
    <script>
        // Show or hide the profile dropdown on click
        document.getElementById('profilePic').addEventListener('click', function() {
            var dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('hidden');
        });
    </script>
</body>
</html>
