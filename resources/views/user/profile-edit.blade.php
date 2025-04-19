@extends('layouts.app-user')

@section('content')

<section>
    @if (session('success'))
    <div class="fixed top-0 right-0 m-4 w-full md:w-1/3 bg-green-500 text-white p-4 rounded-lg shadow-lg">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="fixed top-0 right-0 m-4 w-full md:w-1/3 bg-red-500 text-white p-4 rounded-lg shadow-lg">
        {{ session('error') }}
    </div>
    @endif
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('user.profile.update', $user->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="w-full p-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="w-full p-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</section>

@endsection