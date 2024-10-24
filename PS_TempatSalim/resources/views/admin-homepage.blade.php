@extends('layouts.app')

@section('title', 'Homepage Admin')

@section('content')
<!-- Header Banner -->
<div class="relative bg-cover bg-center h-96" style="background-image: url('path_to_image.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white">
        <h1 class="text-4xl font-bold mb-4">Solutions for Quality Elderly Care</h1>
        <p class="text-lg">Providing the best care solutions for elderly with love and compassion.</p>
    </div>
</div>

<!-- Service Cards Section -->
<section class="py-12 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-10">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($categories as $category)
            <div class="bg-white shadow-lg rounded-lg hover:scale-105 transform transition-all duration-300">
                <div class="p-6">
                    <div class="icon mb-4">
                        <img src="path_to_icon.png" alt="icon" class="mx-auto w-16 h-16">
                    </div>
                    <h5 class="text-xl font-semibold mb-2">{{ $category->name }}</h5>
                    <p class="text-gray-700 mb-4">{{ $category->description }}</p>
                    <a href="{{ url('/categories', $category->id) }}" class="inline-block bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600">Learn More</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-12 bg-red-100">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div>
                <h3 class="text-4xl font-bold text-red-600">39</h3>
                <p class="text-gray-600">Best Nurses</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-red-600">129k</h3>
                <p class="text-gray-600">Happy Seniors</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-red-600">29</h3>
                <p class="text-gray-600">Expert Doctors</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-red-600">289k</h3>
                <p class="text-gray-600">Seniors Club Members</p>
            </div>
        </div>
    </div>
</section>

<!-- About Us and Testimonial Section -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="text-3xl font-bold mb-4">Why Choose Us</h2>
                <p class="text-gray-700 mb-4">We cater to emotional, physical, and independent living needs for elderly individuals with care and empathy.</p>
                <ul class="list-disc pl-5 text-gray-600">
                    <li class="mb-2">Emotional Needs</li>
                    <li>Independent Living</li>
                </ul>
            </div>
            <div>
                <h2 class="text-3xl font-bold mb-4">Testimonial</h2>
                <blockquote class="border-l-4 border-red-500 pl-4 italic text-gray-700">
                    “This care center has made my elderly parent's life much better with specialized care and attention.”
                </blockquote>
                <p class="mt-4 text-right">- John Doe, Designer</p>
            </div>
        </div>
    </div>
</section>
@endsection
