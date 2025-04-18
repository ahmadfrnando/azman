<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title', 'Pesona Tapteng')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'false',
            theme: {
                extend: {
                    colors: {
                        primary: '#0077B6',
                        secondary: '#4caf50',
                    }
                },
            },
        }
    </script>
    <style>
        .active {
            color: #2A9D8F !important;
        }
    </style>
</head>

<body class="bg-gray-100 flex flex-col items-center justify-center h-screen">
    @if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
        <strong>Success!</strong> {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
        <strong>Error!</strong> {{ session('error') }}
    </div>
    @endif

    <div class="flex w-full max-w-xl bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Left Side (Image) -->
        <div class="hidden lg:block w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('images/1.jpeg') }}');`">
        </div>

        <!-- Right Side (Register Form) -->
        <div class="w-full lg:w-1/2 p-8">
            <h2 class="text-3xl font-bold text-center text-gray-700 mb-6">Create an Account</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Menampilkan error untuk nama -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">Full Name</label>
                    <input type="text" id="name" name="name" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" value="{{ old('name') }}" placeholder="Enter your full name" required>

                    @error('name')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Menampilkan error untuk email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" value="{{ old('email') }}" placeholder="Enter your email" required>

                    @error('email')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Menampilkan error untuk password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" id="password" name="password" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" value="{{ old('password') }}" placeholder="Enter your password" required>

                    @error('password')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Menampilkan error untuk konfirmasi password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" value="{{ old('password_confirmation') }}" placeholder="Confirm your password" required>

                    @error('password_confirmation')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="w-full py-3 bg-blue-500 text-white rounded-md font-semibold hover:bg-blue-600 transition">Register</button>

                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a></p>
                </div>
            </form>

        </div>
    </div>

</body>

</html>