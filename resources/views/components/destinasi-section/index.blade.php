@props(['destinasi' => []])

<div class=" max-w-7xl mx-auto bg-white px-6 py-16 sm:py-20 lg:px-0 overflow-hidden lg:overflow-visible">
    <div class="mb-20 lg:max-w-4xl">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Destinasi Favorit di Tapanuli Tengah</h1>
        <p class="mt-4 text-xl leading-8 text-gray-500">Berikut adalah rekomendasi destinasi wisata favorit yang bisa kamu kunjungi di Tapanuli Tengah. Sudah siap untuk petualanganmu?</p>
    </div>
    @forelse ($destinasi as $item)
    <div class="{{ $loop->index > 0 ? 'mt-28 md:mt-32' : '' }} relative isolate overflow-visible lg:overflow-visible">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <svg class="absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]" aria-hidden="true">
                <defs>
                    <pattern id="e813992c-7d03-4cc4-a2bd-151760b470a0" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                        <path d="M100 200V.5M.5 .5H200" fill="none" />
                    </pattern>
                </defs>
                <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                    <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z" stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)" />
            </svg>
        </div>
        <div class="{{ $loop->index == 1 ? 'block md:flex' : 'flex' }} flex-col-reverse md:flex-row items-center mx-auto lg:mx-0 lg:max-w-none">
            @if ($loop->index == 1)
            <x-destinasi-section.image img-url="{{ $item->gambar }}"></x-destinasi-section.image>
            @endif
            <div class="mt-4 md:mt-0 lg:mx-auto lg:w-full lg:max-w-7xl {{ $loop->index == 1 ? 'flex justify-end' : '' }}">
                <div class="lg:pr-4">
                    <div class="lg:max-w-md">
                        <a href="{{ route('destinasi.detail', ['slug' => $item->slug]) }}" class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">{{ $item->nama }}</a>
                        <p class="mt-6 mb-10 text-xl leading-8 text-gray-500 text-justify">{!! $item->deskripsi !!}</p>
                        <!-- <a href="{{ route('destinasi.detail', ['slug' => $item->slug]) }}" class="rounded-md bg-secondary px-5 py-3 font-semibold text-white shadow-sm hover:bg-secondary/[0.8] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Lihat Details</a> -->
                    </div>
                </div>
            </div>

            @if ($loop->index != 1)
            <x-destinasi-section.image img-url="{{ $item->gambar }}"></x-destinasi-section.image>
            @endif
        </div>
    </div>
    @empty
    <div class="col-span-full flex justify-center items-center flex-col text-center">
        <img src="{{ asset('images/no-data.svg') }}" alt="No Data Available" class="w-1/2 md:w-1/4 mb-4">
        <p class="text-lg font-semibold">Data belum ada</p>
    </div>
    @endforelse
</div>