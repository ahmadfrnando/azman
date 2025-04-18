@section('nav__item-user-penginapan', 'active')

@extends('layouts.app-user')

@section('content')

<div class="flex-1 p-6 overflow-y-auto">
    <header class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Penginapan</h1>
    </header>

    <section>
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Pilihan Penginapan</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($data as $item)
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <img src="{{ asset('images/1.jpeg') }}" alt="Hotel Image" class="w-full h-40 object-cover rounded-md mb-4">
                <h3 class="text-lg font-semibold text-gray-800">{{ $item->nama }}</h3>
                <p class="text-gray-600">Sisa Kamar: {{ $item->tersedia }}</p>
                <p class="text-gray-700 mt-2">Harga: {{ 'Rp. ' . number_format($item->harga,0,',','.') }}/malam</p>
                <div class="flex mt-4">
                    <a href="{{ route('user.penginapan.detail', $item->slug) }}" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-secondary font-semibold flex gap-2 uppercase tracking-widest"><x-heroicon-o-check class="w-6 h-6"/> Pesan Sekarang</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @include('partials.user.footer')
</div>

@endsection