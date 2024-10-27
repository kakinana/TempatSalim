@extends('layouts.layout')

@section('title', 'Dashboard Admin')

@section('sidebar')
<!-- resources/views/layouts/sidebar.blade.php -->
<aside class="w-64 bg-indigo-600 text-white flex flex-col justify-between p-6">
    <div>
        <h2 class="text-2xl font-semibold mb-8">Dashboard</h2>
        <nav>
            <a href="#" class="flex items-center py-2 text-indigo-100 hover:text-white">
                <span class="mr-3">🏠</span> Dashboard
            </a>
            <a href="#" class="flex items-center py-2 text-indigo-100 hover:text-white">
                <span class="mr-3">👥</span> Team
            </a>
            <a href="#" class="flex items-center py-2 text-indigo-100 hover:text-white">
                <span class="mr-3">📂</span> Projects
            </a>
            <a href="#" class="flex items-center py-2 text-indigo-100 hover:text-white">
                <span class="mr-3">📅</span> Calendar
            </a>
            <a href="#" class="flex items-center py-2 text-indigo-100 hover:text-white">
                <span class="mr-3">📄</span> Documents
            </a>
            <a href="#" class="flex items-center py-2 text-indigo-100 hover:text-white">
                <span class="mr-3">📊</span> Reports
            </a>

            <div class="mt-8">
                <h3 class="text-sm font-semibold uppercase text-indigo-200 mb-3">Your teams</h3>
                <div class="flex items-center mb-2">
                    <div class="w-6 h-6 bg-indigo-400 rounded-full flex items-center justify-center text-sm font-bold">H</div>
                    <span class="ml-3">Heroicons</span>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-6 h-6 bg-indigo-400 rounded-full flex items-center justify-center text-sm font-bold">T</div>
                    <span class="ml-3">Tailwind Labs</span>
                </div>
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-indigo-400 rounded-full flex items-center justify-center text-sm font-bold">W</div>
                    <span class="ml-3">Workcation</span>
                </div>
            </div>
        </nav>
    </div>
    <a href="#" class="flex items-center text-indigo-100 hover:text-white">
        <span class="mr-3">⚙️</span> Settings
    </a>
</aside>
@endsection

@section('content')
@yield('user-content')
@endsection

