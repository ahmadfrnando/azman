@section('nav__item-user-penginapan', 'active')

@extends('layouts.app-user')

@section('content')
<section>
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Detail Penginapan</h2>

    <!-- Gambar dan Deskripsi -->
    <div class="bg-white p-4 rounded-lg shadow-lg mb-6">
        <img src="{{ asset('storage/'.$penginapan->gambar) }}" alt="Hotel Image" class="w-full h-80 object-cover rounded-md mb-4">
        <p class="text-gray-700 mb-4">{!! $penginapan->deskripsi !!}</p>
        <p class="text-gray-600 mb-4">Harga: {{ 'Rp. ' . number_format($penginapan->harga,0,',','.') }}/malam</p>
        <p class="text-gray-600 mb-4">Sisa Kamar: {{ $penginapan->tersedia }}</p>
    </div>

    <!-- Form Pemesanan -->
    <div class="bg-white p-4 rounded-lg shadow-lg mb-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Pesan Sekarang</h3>
        <form action="{{ route('user.penginapan.pesan', $penginapan->slug) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label for="jumlah_orang" class="block text-sm font-medium text-gray-600">Jumlah Orang</label>
                    <input type="number" name="jumlah_orang" id="jumlah_orang" class="w-full p-3 mt-2 border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="tanggal_checkin" class="block text-sm font-medium text-gray-600">Tanggal Checkin</label>
                    <input type="date" name="tanggal_checkin" id="tanggal_checkin" class="w-full p-3 mt-2 border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="jumlah_kamar" class="block text-sm font-medium text-gray-600">Jumlah Kamar</label>
                    <input type="number" name="jumlah_kamar" id="jumlah_kamar" min="1" max="{{ $penginapan->tersedia }}" class="w-full p-3 mt-2 border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="jumlah_hari" class="block text-sm font-medium text-gray-600">Jumlah Hari</label>
                    <input type="number" name="jumlah_hari" id="jumlah_hari" min="1" class="w-full p-3 mt-2 border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="no_hp" class="block text-sm font-medium text-gray-600">Nomor HP/WA</label>
                    <input type="number" name="no_hp" id="no_hp" class="w-full p-3 mt-2 border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="catatan" class="block text-sm font-medium text-gray-600">Catatan</label>
                    <textarea name="catatan" id="catatan" class="w-full p-3 mt-2 border border-gray-300 rounded-md" rows="3" required></textarea>
                </div>
            </div>

            <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-secondary">Pesan Sekarang</button>
        </form>
    </div>
</section>
@endsection