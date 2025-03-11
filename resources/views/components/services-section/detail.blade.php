@props(['gambar' => 'images/1.jpeg', 'judul' => '' ,'deskripsi' => '', 'slug' => '', 'phone' => '08217772121'])

<div class="text-justify flex flex-col items-center py-6 px-10">
    <h3 class="text-xl md:text-3xl text-gray-900 tracking-tight mb-4 font-bold">{{ $judul }}</h3>
    <div class="w-fit rounded bg-secondary p-4 md:p-5 mb-4 flex justify-center">
        <img src="{{ asset($gambar) }}" alt="{{ $slug }}">
    </div>
    <p class="text-sm md:text-base leading-normal text-gray-500">{{ $deskripsi }}</p>
    <div class="flex space-x-4 mt-4">
        <a href="https://wa.me/{{ $phone }}?text=Halo%20saya%20tertarik%20dengan%20{{ $slug }}" class="text-secondary mt-4 hover:text-primary transition-colors duration-150 ease-in-out font-bold text-sm md:text-base px-4 py-2 rounded-md bg-white border-2 border-secondary hover:border-primary" target="_blank">Pesan Sekarang</a>
    </div>
</div>