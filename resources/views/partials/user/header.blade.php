@section('header')
<header class="flex justify-between items-center mb-6 bg-white shadow-md p-4 rounded-lg">
    <h1 class="text-3xl font-semibold text-gray-800">Selamat Datang👋, {{ Auth::user()->name }}</h1>

    <!-- Dropdown Profile -->
    <div class="relative">
        <button id="profile-button" class="flex items-center space-x-2 bg-gray-800 text-white px-4 py-2 rounded-md shadow-lg hover:bg-gray-700 focus:outline-none">
            <span>{{ Auth::user()->name }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden">
            <div class="py-1">
                <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile Saya</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pesanan Saya</a>
                <form method="POST" action="#">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- JavaScript untuk Toggle Dropdown -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('profile-button');
        const dropdownMenu = document.getElementById('dropdown-menu');

        button.addEventListener('click', function(event) {
            // Mencegah klik pada tombol agar dropdown tidak segera disembunyikan
            event.stopPropagation();
            // Toggle dropdown visibility
            dropdownMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', function(event) {
            // Jika klik terjadi di luar dropdown atau tombol, sembunyikan dropdown
            if (!button.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
@show