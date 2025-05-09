@section('nav__item-user-umkm', 'active')

@extends('layouts.app-user')

@section('content')

<section>
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Detail Produk</h2>

    <!-- Gambar dan Deskripsi -->
    <div class="bg-white p-4 rounded-lg shadow-lg mb-6">
        <img src="{{ asset('storage/'.$umkm->gambar) }}" alt="Hotel Image" class="w-full h-80 object-cover rounded-md mb-4">
        <p class="text-gray-700 mb-4">{!! $umkm->deskripsi !!}</p>
        <p class="text-gray-600 mb-4">Harga: {{ 'Rp. ' . number_format($umkm->harga_satuan,0,',','.') }}/pcs</p>
        <p class="text-gray-600 mb-4">Sisa Produk: {{ $umkm->tersedia }}</p>
    </div>
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong>Perhatian!</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong>{{ session('success') }}</strong>
    </div>
    @endif

    <!-- Form Pemesanan -->
    <div class="bg-white p-4 rounded-lg shadow-lg mb-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Pesan Sekarang</h3>
        <form action="{{ route('user.umkm.pesan', $umkm->slug) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label for="jumlah" class="block text-sm font-medium text-gray-600">Jumlah Pesanan</label>
                    <input type="number" name="jumlah" id="jumlah" min="1" max="{{ $umkm->tersedia }}" class="w-full p-3 mt-2 border border-gray-300 rounded-md" value="{{ old('jumlah') }}" required>
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" min="1" class="w-full p-3 mt-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="no_hp" class="block text-sm font-medium text-gray-600">Nomor HP/WA</label>
                    <input type="number" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" class="w-full p-3 mt-2 border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="tanggal_pemesanan" class="block text-sm font-medium text-gray-600">Tanggal Pemesanan</label>
                    <input type="date" name="tanggal_pemesanan" id="tanggal_pemesanan" class="w-full p-3 mt-2 border border-gray-300 rounded-md" required>
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