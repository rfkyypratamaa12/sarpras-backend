@extends('layouts.app') <!-- Ganti dengan layout utama kamu -->

@section('content')
<div class="p-6 animate__animated animate__fadeInUp">
    <div class="bg-white shadow-xl rounded-xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">👥 Manajemen Pengguna</h2>
            <a href="{{ route('users.create') }}"
               class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg font-semibold transition duration-300 shadow-md">
                + Tambah Pengguna
            </a>
        </div>

        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-3 px-6 text-left text-sm font-semibold">#</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold">Nama</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold">Email</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold">Role</th>
                    <th class="py-3 px-6 text-center text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($users as $index => $user)
                    <tr class="hover:bg-gray-50 transition-all">
                        <td class="py-3 px-6">{{ $index + 1 }}</td>
                        <td class="py-3 px-6 font-medium">{{ $user->name }}</td>
                        <td class="py-3 px-6">{{ $user->email }}</td>
                        <td class="py-3 px-6">{{ ucfirst($user->role) }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="text-blue-500 hover:underline mr-2">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                  class="inline-block" onsubmit="return confirm('Yakin ingin hapus pengguna ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500">Belum ada data pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
