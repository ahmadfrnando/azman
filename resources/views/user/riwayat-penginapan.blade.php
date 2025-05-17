@section('nav__item-user-riwayat', 'active')

@extends('layouts.app-user')

@section('content')

<section>
    @include('user.header-riwayat', ['isCurrent' => 'penginapan'])
    <div id="riwayat-penginapan" class="tab-content {{ $isCurrent=='penginapan' ? 'block' : 'hidden' }}">
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
                @if($model->isEmpty())
                <tr>
                    <td class="px-4 py-2 border-b text-center" colspan="8">Tidak ada riwayat penginapan</td>
                </tr>
                @else
                @foreach ($model as $index => $item)
                <tr>
                    <td class="px-4 py-2 border-b text-center">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $item->penginapan->nama ?? '' }}</td>
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
        {{ $model->links() }}
    </div>
</section>

@endsection