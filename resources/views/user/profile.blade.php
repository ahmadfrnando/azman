@extends('layouts.app-user')

@section('content')

<section class="p-6">

    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Informasi Pengguna</h2>
            <div class="mt-4">
                <p><strong>Nama:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Tanggal Bergabung:</strong> {{ $user->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="mb-6">
            <div class="mt-4">
                <a href="{{ route('user.profile.edit') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Edit Profil</a>
            </div>
        </div>
    </div>
</section>

@endsection
