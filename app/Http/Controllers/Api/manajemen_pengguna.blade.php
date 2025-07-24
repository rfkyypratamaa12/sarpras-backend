@extends('layouts.app') {{-- Ganti dengan layout kamu --}}

@section('content')
<div class="p-6 bg-white rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">
            👥 Manajemen Pengguna
        </h2>
        {{-- Tombol Tambah Pengguna --}}
        <a href="{{ route('users.create') }}" class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500 transition-all duration-300 shadow">
            + Tambah Pengguna
        </a>
    </div>

    <table class="w-full table-auto border border-gray-200 rounded">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="text-center border-b">
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2">{{ $user->name }}</td>
                <td class="px-4 py-2">{{ $user->email }}</td>
                <td class="px-4 py-2">{{ $user->role }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:underline">Edit</a> |
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-500 hover:underline">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
