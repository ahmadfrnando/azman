@props(['title' => '', 'description' => '', 'slug' => '', 'link' => '#','pesan' => false,'gambar' => 'images/1.jpeg' ,'phone' => '08217772121'])

<div class="text-center flex flex-col items-center py-6 px-4 group/item hover:shadow-xl">
    <div class="w-fit rounded bg-secondary p-4 md:p-5 mb-4 flex justify-center">
        {{ $gambar }}
    </div>
    <h3 class="text-xl md:text-2xl text-gray-900 tracking-tight mb-4 font-bold group-hover/item:text-secondary">{{ $title }}</h3>
    <div class="flex space-x-4">
        @if($pesan==true)
        <a href="https://wa.me/{{ $phone }}?text=Halo%20saya%20tertarik%20dengan%20{{ $slug }}" class="text-secondary mt-4 hover:text-primary transition-colors duration-150 ease-in-out font-bold text-sm md:text-base px-4 py-2 rounded-md bg-white border-2 border-secondary hover:border-primary" target="_blank">Pesan Sekarang</a>
        @endif
        <a href="{{ $link }}/detail/{{ $slug }}" class="text-secondary mt-4 hover:text-primary transition-colors duration-150 ease-in-out font-bold text-sm md:text-base px-4 py-2 rounded-md bg-white border-2 border-secondary hover:border-primary">Lihat Detail</a>
    </div>
</div>