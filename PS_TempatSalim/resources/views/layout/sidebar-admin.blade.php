@extends('layouts.layout')

@section('title', 'Dashboard Admin')

@section('sidebar')
<div class="bg-red-500 text-white w-64 min-h-screen flex flex-col p-4">
    <div class="text-white flex flex-col items-center">
        @if(auth()->check())
           <h2 class="text-xl font-bold p-6">{{ auth()->user()->name }}</h2>
        @else
            <h2 class="text-xl font-bold p-6">Adminum</h2>
        @endif
    </div>
    <nav class="mt-6 flex-grow">
        <ul>
            <li class="mb-2 text-amber-50">
                <a href="{{ route('homepage')}}" class="font-semibold text-amber-100 block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Homepage</a>
            </li>
            <li class="mb-2">
                <a href="{{ route('admin-manageData') }}" class="font-semibold block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Daftar Akun User</a>
            </li>
            <li class="mb-2">
                <a href="{{ route('admin-manageIzin') }}" class="font-semibold block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Daftar Gedung</a>
            </li>
        </ul>
    </nav>
    <div class="mt-auto">
        <a href="{{ route('logout') }}" class="text-yellow-500 font-bold block py-2.5 px-4 text-logout transition duration-200 hover:bg-black rounded">Logout</a>
    </div>
</div>
@endsection

@section('content')
@yield('admin-content')
@endsection

