<!-- Tab Menu -->
<div class="mb-8">
    <div class="border-b border-gray-300">
        <ul class="flex">
            <li class="mr-8">
                <a href="/user/riwayat?tab=penginapan" class="text-lg font-semibold text-gray-800 {{ $isCurrent=='penginapan' ? 'bg-primary text-white' : 'hover:text-primary' }} py-3 px-4 inline-block cursor-pointer ">Riwayat Penginapan</a>
            </li>
            <li class="mr-8">
                <a href="/user/riwayat?tab=transportasi" class="text-lg font-semibold text-gray-800 {{ $isCurrent=='transportasi' ? 'bg-primary text-white' : 'hover:text-primary' }} py-3 px-4 inline-block cursor-pointer ">Riwayat Transportasi</a>
            </li>
            <li class="mr-8">
                <a href="/user/riwayat?tab=umkm" class="text-lg font-semibold text-gray-800 py-3 px-4 {{ $isCurrent=='umkm' ? 'bg-primary text-white' : 'hover:text-primary' }} inline-block cursor-pointer ">Riwayat UMKM</a>
            </li>
        </ul>
    </div>
</div>