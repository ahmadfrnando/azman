<div class="overflow-hidden bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto grid max-w-6xl lg:mx-0 lg:max-w-none">
            <div class="lg:pr-8 lg:pt-4">
                <div class="text-center mb-16 md:mb-20">
                    <h2 class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $judul }}</h2>
                    <p class="w-full md:w-4/5 mx-auto mt-6 text-lg leading-8 text-gray-500">{{ $deskripsi }}</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-x-4 gap-y-14 md:gap-y-16">
                    @forelse ($items as $item)
                    <x-services-section.item :pesan="$pesan" :link="$link" title="{{ $item->nama }}" description="{{ $item->deskripsi }}" slug="{{ $item->slug }}" phone="{{ $phone }}">
                        <x-slot:gambar>
                            <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->slug }}" class="w-48 h-48 md:w-64 md:h-64">
                        </x-slot:gambar>
                    </x-services-section.item>
                    @empty
                    <div class="col-span-full flex justify-center items-center flex-col text-center">
                        <img src="{{ asset('images/no-data.svg') }}" alt="No Data Available" class="w-1/2 md:w-1/4 mb-4">
                        <p class="text-lg font-semibold">Data belum ada</p>
                    </div>
                    @endforelse
                </div>
                <div class="mt-8">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
</div>