@section('nav__item-user-transportasi', 'active')

@extends('layouts.app-user')

@section('content')

<section>
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Detail Transportasi</h2>

    <!-- Gambar dan Deskripsi -->
    <div class="bg-white p-4 rounded-lg shadow-lg mb-6">
        <img src="{{ asset('storage/'.$transportasi->gambar) }}" alt="Hotel Image" class="w-full h-80 object-cover rounded-md mb-4">
        <p class="text-gray-700 mb-4">{!! $transportasi->deskripsi !!}</p>
        <p class="text-gray-600 mb-4">Harga: {{ 'Rp. ' . number_format($transportasi->harga,0,',','.') }}/malam</p>
        <p class="text-gray-600 mb-4">Sisa Kamar: {{ $transportasi->tersedia }}</p>
    </div>

    <!-- Form Pemesanan -->
    <div class="bg-white p-4 rounded-lg shadow-lg mb-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Pesan Sekarang</h3>
        <form action="{{ route('user.transportasi.pesan', $transportasi->slug) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label for="jumlah_penumpang" class="block text-sm font-medium text-gray-600">Jumlah Penumpang</label>
                    <input type="number" name="jumlah_penumpang" id="jumlah_penumpang" class="w-full p-3 mt-2 border border-gray-300 rounded-md" required>
                </div>


                <div class="mb-4">
                    <label for="jumlah_kendaraan" class="block text-sm font-medium text-gray-600">Jumlah Kendaraan</label>
                    <input type="number" name="jumlah_kendaraan" id="jumlah_kendaraan" min="1" max="{{ $transportasi->tersedia }}" class="w-full p-3 mt-2 border border-gray-300 rounded-md" required>
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
                    <label for="tanggal_jemput" class="block text-sm font-medium text-gray-600">Tanggal Jemput</label>
                    <input type="date" name="tanggal_jemput" id="tanggal_jemput" class="w-full p-3 mt-2 border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="waktu_jemput" class="block text-sm font-medium text-gray-600">Waktu Jemput</label>
                    <input type="time" name="waktu_jemput" id="waktu_jemput" class="w-full p-3 mt-2 border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="lokasi_jemput" class="block text-sm font-medium text-gray-600">Lokasi Jemput</label>
                    <textarea name="lokasi_jemput" id="lokasi_jemput" class="w-full p-3 mt-2 border border-gray-300 rounded-md" rows="3" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="lokasi_tujuan" class="block text-sm font-medium text-gray-600">Lokasi Tujuan</label>
                    <textarea name="lokasi_tujuan" id="lokasi_tujuan" class="w-full p-3 mt-2 border border-gray-300 rounded-md" rows="3" required></textarea>
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