@extends('layouts.layout')

@section('title', 'Dashboard Admin')

@section('sidebar')
<!-- resources/views/layouts/sidebar.blade.php -->
<div class="bg-gray-800 text-white w-64 p-6">
    <h2 class="text-xl font-semibold mb-6">Admin Panel</h2>
    <ul>
        <li class="mb-4"><a href="#" class="hover:text-gray-300">Dashboard</a></li>
        <li class="mb-4"><a href="#" class="hover:text-gray-300">Manage Categories</a></li>
        <li class="mb-4"><a href="#" class="hover:text-gray-300">Manage Buildings</a></li>
        <li class="mb-4"><a href="#" class="hover:text-gray-300">Reports</a></li>
        <li><a href="#" class="hover:text-gray-300">Settings</a></li>
    </ul>
</div>
@endsection

@section('content')
@yield('admin-content')
@endsection

