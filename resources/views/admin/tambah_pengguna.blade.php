@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-md animate-fade-in">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Tambah Pengguna Baru</h2>

    <form action="{{ route('users.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Nama</label>
            <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-blue-50 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Email</label>
            <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-blue-50 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Role</label>
            <select name="role" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-blue-50 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Password</label>
            <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-blue-50 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-blue-50 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300">
        </div>

        <div class="text-right">
            <button type="submit" class="bg-yellow-500 text-white font-semibold px-6 py-2 rounded-md shadow hover:bg-yellow-600 transition duration-300 transform hover:scale-105">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
