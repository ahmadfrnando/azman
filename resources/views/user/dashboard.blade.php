@section('nav__item-user-dashboard', 'active')

@extends('layouts.app-user')

@section('content')

<!-- Main Content -->
<div class="flex-1 p-6">
    <!-- Header -->
    <header class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Selamat Datang, {{ Auth::user()->name }}</h1>
    </header>

    <!-- Content -->
    <section>
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Dashboard</h2>
        <p class="text-gray-700">Di sini Anda dapat melakukan pemesanan penginapan dan transportasi untuk perjalanan Anda. Pilih menu di sidebar untuk melanjutkan.</p>

        <!-- Add More Content Here -->
    </section>
</div>
@endsection