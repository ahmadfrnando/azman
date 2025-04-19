@section('nav__item-user-dashboard', 'active')

@extends('layouts.app-user')

@section('content')

<section>
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Dashboard</h2>
    <p class="text-gray-700 mb-6">Di sini Anda dapat melakukan pemesanan penginapan dan transportasi untuk perjalanan Anda. Pilih menu di sidebar untuk melanjutkan.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Penginapan Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Total Pemesanan Penginapan</h3>
            <div class="flex justify-between items-center mb-4">
                <span class="text-3xl font-bold text-gray-800">{{ $pemesanan_penginapan->where('status_pesanan', true)->count() }}</span>
                <p class="text-sm text-gray-500">Pemesanan Aktif</p>
            </div>
            <div class="text-sm text-gray-600">Anda memiliki {{ $pemesanan_penginapan->where('status_pesanan', true)->count() }} pemesanan penginapan yang aktif.</div>
        </div>

        <!-- Transportasi Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Total Pemesanan Transportasi</h3>
            <div class="flex justify-between items-center mb-4">
                <span class="text-3xl font-bold text-gray-800">{{ $pemesanan_transportasi->where('status_pesanan', true)->count() }}</span>
                <p class="text-sm text-gray-500">Pemesanan Aktif</p>
            </div>
            <div class="text-sm text-gray-600">Anda memiliki {{ $pemesanan_transportasi->where('status_pesanan', true)->count() }} pemesanan transportasi yang aktif.</div>
        </div>

        <!-- Jumlah Pesanan Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Total Semua Pemesanan</h3>
            <div class="flex justify-between items-center mb-4">
                <span class="text-3xl font-bold text-gray-800">{{ $pemesanan_penginapan->where('status_pesanan', true)->count() + $pemesanan_transportasi->where('status_pesanan', true)->count() }}</span>
                <p class="text-sm text-gray-500">Total Pesanan</p>
            </div>
            <div class="text-sm text-gray-600">Total pesanan yang Anda buat, baik penginapan maupun transportasi.</div>
            <a href="#" class="mt-4 inline-block bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Lihat Semua Pesanan</a>
        </div>
    </div>
</section>
@endsection