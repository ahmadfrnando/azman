@section('sidebar')
<div class="w-64 bg-primary text-white flex flex-col d-flex h-full p-4">
    <a href="/dashboard" class="text-2xl font-bold mb-8">Pesona Tapteng</a>
    <nav class="flex flex-col space-y-4">
        <a href="{{ url('/user/dashboard') }}" class="hover:bg-secondary p-2 rounded flex gap-2 font-semibold @yield('nav__item-user-dashboard')"><x-heroicon-o-chart-pie class="w-6 h-6"/> Dashboard</a>
        <a href="{{ url('/user/penginapan') }}" class="hover:bg-secondary p-2 rounded flex gap-2 font-semibold @yield('nav__item-user-penginapan')"><x-heroicon-o-building-office class="w-6 h-6"/> Penginapan</a>
        <a href="{{ url('/user/transportasi') }}" class="hover:bg-secondary p-2 rounded flex gap-2 font-semibold @yield('nav__item-user-transportasi')"><x-heroicon-o-truck class="w-6 h-6"/> Transportasi</a>
        <a href="{{ url('/user/riwayat') }}" class="hover:bg-secondary p-2 rounded flex gap-2 font-semibold @yield('nav__item-user-riwayat')"><x-heroicon-o-clock class="w-6 h-6"/> Riwayat Pesanan</a>
    </nav>
</div>
@show