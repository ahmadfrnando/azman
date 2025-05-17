@section('nav__item-user-riwayat', 'active')

@extends('layouts.app-user')

@section('content')

<section>
    <!-- Tab Menu -->
    <div class="mb-8">
        <div class="border-b border-gray-300">
            <ul class="flex">
                <li class="mr-8">
                    <a href="#" id="tab-penginapan" class="text-lg font-semibold text-gray-800 hover:text-blue-600 py-3 px-4 inline-block cursor-pointer">Riwayat Penginapan</a>
                </li>
                <li class="mr-8">
                    <a href="#" id="tab-transportasi" class="text-lg font-semibold text-gray-800 hover:text-blue-600 py-3 px-4 inline-block cursor-pointer">Riwayat Transportasi</a>
                </li>
                <li class="mr-8">
                    <a href="#" id="tab-umkm" class="text-lg font-semibold text-gray-800 hover:text-blue-600 py-3 px-4 inline-block cursor-pointer">Riwayat UMKM</a>
                </li>
            </ul>
        </div>
    </div>

    <div id="riwayat-penginapan" class="tab-content">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Riwayat Pemesanan Penginapan</h2>
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">No</th>
                    <th class="px-4 py-2 border-b">Nama Penginapan</th>
                    <th class="px-4 py-2 border-b">Jumlah Kamar</th>
                    <th class="px-4 py-2 border-b">Jumlah Orang</th>
                    <th class="px-4 py-2 border-b">Tanggal Check-in</th>
                    <th class="px-4 py-2 border-b">Durasi Inap</th>
                    <th class="px-4 py-2 border-b">Total Harga</th>
                    <th class="px-4 py-2 border-b">Status Pesanan</th>
                </tr>
            </thead>
            <tbody>
                @if($riwayatPenginapan->isEmpty())
                <tr>
                    <td class="px-4 py-2 border-b text-center" colspan="8">Tidak ada riwayat penginapan</td>
                </tr>
                @else
                @foreach ($riwayatPenginapan as $index => $item)
                <tr>
                    <td class="px-4 py-2 border-b text-center">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $item->penginapan->nama }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $item->jumlah_kamar }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $item->jumlah_orang }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ \Carbon\Carbon::parse($item->tanggal_checkin)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $item->jumlah_hari }} Hari</td>
                    <td class="px-4 py-2 border-b text-center">{{ 'Rp. ' . number_format($item->total_harga,0,',','.') }}</td>
                    <td class="px-4 py-2 border-b text-center">
                        @if($item->is_riwayat == false)
                        @if($item->status_pesanan == true)
                        <span class="inline-block px-2 py-1 leading-none bg-green-600 text-white rounded-full">Berhasil</span>
                        @else
                        <span class="inline-block px-2 py-1 leading-none bg-yellow-600 text-white rounded-full">Menunggu Konfirmasi</span>
                        @endif
                        @else
                        <span class="inline-block px-2 py-1 leading-none bg-blue-600 text-white rounded-full">Selesai</span>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{ $riwayatPenginapan->links() }}
    </div>

    <!-- Table Riwayat Pemesanan Transportasi -->
    <div id="riwayat-transportasi" class="tab-content hidden">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Riwayat Pemesanan Transportasi</h2>
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">No</th>
                    <th class="px-4 py-2 border-b">Nama Transportasi</th>
                    <th class="px-4 py-2 border-b">Waktu Pemesanan</th>
                    <th class="px-4 py-2 border-b">Rute</th>
                    <th class="px-4 py-2 border-b">Lama Hari</th>
                    <th class="px-4 py-2 border-b">Jumlah Penumpang</th>
                    <th class="px-4 py-2 border-b">Total Harga</th>
                    <th class="px-4 py-2 border-b">Status Pesanan</th>
                </tr>
            </thead>
            <tbody>
                @if($riwayatTransportasi->isEmpty())
                <tr>
                    <td class="px-4 py-2 border-b text-center" colspan="8">Tidak ada riwayat transportasi</td>
                </tr>
                @else
                @foreach ($riwayatTransportasi as $index => $item)
                <tr>
                    <td class="px-4 py-2 border-b text-center">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $item->transportasi->nama }}</td>
                    <td class="px-4 py-2 border-b text-center">
                        {{ \Carbon\Carbon::parse($item->tanggal_jemput)->format('d/m/Y') }}
                        {{ \Carbon\Carbon::parse($item->waktu_jemput)->format('H:i') }}
                    </td>
                    <td class="px-4 py-2 border-b text-center">{{ $item->lokasi_jemput }} - {{ $item->lokasi_tujuan }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $item->jumlah_hari }} Hari</td>
                    <td class="px-4 py-2 border-b text-center">{{ $item->jumlah_penumpang }} </td>
                    <td class="px-4 py-2 border-b text-center">{{ 'Rp. ' . number_format($item->total_harga,0,',','.') }}
                    <td>
                    <td class="px-4 py-2 border-b text-center">
                        @if($item->is_riwayat == false)
                        @if($item->status_pesanan == true)
                        <span class="inline-block px-2 py-1 leading-none bg-green-600 text-white rounded-full">Berhasil</span>
                        @else
                        <span class="inline-block px-2 py-1 leading-none bg-yellow-600 text-white rounded-full">Menunggu Konfirmasi</span>
                        @endif
                        @else
                        <span class="inline-block px-2 py-1 leading-none bg-blue-600 text-white rounded-full">Selesai</span>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{ $riwayatTransportasi->links() }}
    </div>
    <!-- Table Riwayat Pemesanan UMKM -->
    <div id="riwayat-umkm" class="tab-content hidden">
        <h2 class="text-2xl font-semibold text-gray-800 mt-4 mb-4">Riwayat Pemesanan UMKM</h2>
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">No</th>
                    <th class="px-4 py-2 border-b">Nama Produk</th>
                    <th class="px-4 py-2 border-b">Tanggal Pemesanan</th>
                    <th class="px-4 py-2 border-b">Jumlah Pesanan</th>
                    <th class="px-4 py-2 border-b">Harga Satuan</th>
                    <th class="px-4 py-2 border-b">Total Harga</th>
                    <th class="px-4 py-2 border-b">Status Pesanan</th>
                </tr>
            </thead>
            <tbody>
                @if($riwayatUmkm->isEmpty())
                <tr>
                    <td class="px-4 py-2 border-b text-center" colspan="8">Tidak ada riwayat Umkm</td>
                </tr>
                @else
                @foreach ($riwayatUmkm as $index => $item)
                <tr>
                    <td class="px-4 py-2 border-b text-center">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $item->umkm->nama }}</td>
                    <td class="px-4 py-2 border-b text-center">
                        {{ \Carbon\Carbon::parse($item->tanggal_pemesanan)->format('d/m/Y') }}
                    </td>
                    <td class="px-4 py-2 border-b text-center">{{ $item->jumlah }} Pcs</td>
                    <td class="px-4 py-2 border-b text-center">{{ 'Rp. ' . number_format($item->umkm->harga_satuan,0,',','.') }}
                    </td>
                    <td class="px-4 py-2 border-b text-center">{{ 'Rp. ' . number_format($item->total_harga,0,',','.') }}
                    </td>
                    <td class="px-4 py-2 border-b text-center">
                        @if($item->is_riwayat == false)
                        @if($item->status_pesanan == true)
                        <span class="inline-block px-2 py-1 leading-none bg-green-600 text-white rounded-full">Berhasil</span>
                        @else
                        <span class="inline-block px-2 py-1 leading-none bg-yellow-600 text-white rounded-full">Menunggu Konfirmasi</span>
                        @endif
                        @else
                        <span class="inline-block px-2 py-1 leading-none bg-blue-600 text-white rounded-full">Selesai</span>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{ $riwayatUmkm->links() }}
    </div>
</section>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log("DOM Loaded"); // Debug log
        const tabs = document.querySelectorAll('.tab-content');
        const tabLinks = document.querySelectorAll('a[id^="tab-"]');

        if (!tabs.length || !tabLinks.length) {
            console.log("Tab or Tab Links not found"); // Debug log jika tab tidak ditemukan
        }

        tabLinks.forEach(tab => {
            tab.addEventListener('click', function(e) {
                console.log(`Tab clicked: ${this.id}`); // Debug log saat tab diklik

                e.preventDefault();

                // Hide all tab contents
                tabs.forEach(content => {
                    console.log(`Hiding tab content: ${content.id}`); // Debug log saat menyembunyikan tab
                    content.classList.add('hidden');
                });

                // Deactivate all tabs
                tabLinks.forEach(link => link.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600'));

                // Activate the clicked tab
                this.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');

                // Show the corresponding content
                const target = this.id.split('-')[1];
                const targetTab = document.getElementById(`riwayat-${target}`);
                if (targetTab) {
                    console.log(`Showing tab content: ${targetTab.id}`); // Debug log saat menampilkan tab
                    targetTab.classList.remove('hidden');
                }
            });
        });

        // Default Tab (Penginapan)
        const defaultTab = document.getElementById('tab-penginapan');
        if (defaultTab) {
            defaultTab.click();
            console.log("Default Tab clicked: Riwayat Penginapan"); // Debug log untuk tab default
        }
    });
</script>
@endsection