@section('nav__item-user-transportasi', 'active')

@extends('layouts.app-user')

@section('content')

<!-- Main Content -->
<div class="flex-1 p-6 overflow-y-auto">
    <!-- Header -->
    <header class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Transportasi</h1>
    </header>

    <!-- Content -->
    <section>
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Pilihan Transportasi</h2>

        <!-- Grid Layout for Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <img src="{{ asset('images/1.jpeg') }}" alt="Hotel Image" class="w-full h-40 object-cover rounded-md mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Mobil XYZ</h3>
                <div class="flex justify-between mt-4">
                    <a href="#" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-secondary">Pesan Sekarang</a>
                    <a href="#" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Detail</a>
                </div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <img src="{{ asset('images/1.jpeg') }}" alt="Hotel Image" class="w-full h-40 object-cover rounded-md mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Mobil XYZ</h3>
                <div class="flex justify-between mt-4">
                    <a href="#" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-secondary">Pesan Sekarang</a>
                    <a href="#" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Detail</a>
                </div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <img src="{{ asset('images/1.jpeg') }}" alt="Hotel Image" class="w-full h-40 object-cover rounded-md mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Mobil XYZ</h3>
                <div class="flex justify-between mt-4">
                    <a href="#" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-secondary">Pesan Sekarang</a>
                    <a href="#" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Detail</a>
                </div>
            </div>

        </div>
    </section>
    @include('partials.user.footer')
</div>

@endsection