@section('nav__item-user-penginapan', 'active')

@extends('layouts.app-user')

@section('content')

<section>
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Pilihan Penginapan</h2>
    @if($data->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($data as $item)
        <div class="bg-white p-4 rounded-lg shadow-lg">
            <img src="{{ asset('storage/'.$item->gambar) }}" alt="Hotel Image" class="w-full h-40 object-cover rounded-md mb-4">
            <h3 class="text-lg font-semibold text-gray-800">{{ $item->nama }}</h3>
            <p class="text-gray-600">Sisa Kamar: {{ $item->tersedia }}</p>
            <p class="text-gray-700 mt-2">Harga: {{ 'Rp. ' . number_format($item->harga,0,',','.') }}/malam</p>
            <div class="flex mt-4">
                <a href="{{ route('user.penginapan.detail', $item->slug) }}" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-secondary">Pesan Sekarang</a>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="col-span-full flex justify-center items-center flex-col text-center">
        <img src="{{ asset('images/no-data.svg') }}" alt="No Data Available" class="w-1/2 md:w-1/4 mb-4">
        <p class="text-lg font-semibold">Data belum ada</p>
    </div>
    @endif
</section>

@endsection