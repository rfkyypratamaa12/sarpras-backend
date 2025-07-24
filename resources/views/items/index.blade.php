@extends('layouts.app')

@section('title', 'Data Barang')

@section('icon')
    <i class="fas fa-boxes gold-text"></i>
@endsection

@section('breadcrumb', 'Manajemen Barang')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-boxes gold-text mr-3"></i>
                    <span>Manajemen Inventaris Barang</span>
                </h1>
                <p class="text-gray-600 mt-1">Daftar lengkap semua barang yang tersedia</p>
            </div>
            <a href="{{ route('items.create') }}"
                class="gold-gradient hover:opacity-90 text-white px-5 py-2.5 rounded-lg flex items-center transition-all transform hover:scale-[1.02]">
                <i class="fas fa-plus mr-2"></i> Tambah Barang Baru
            </a>
        </div>

        <!-- Success Notification -->
        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg flex items-start">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-green-500 text-xl mr-3 mt-0.5"></i>
                </div>
                <div>
                    <p class="text-green-700 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Items Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Barang
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kategori
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stok
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Foto
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($items as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600 mr-4">
                                            <i class="fas fa-box"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
                                            <div class="text-xs text-gray-500">ID: {{ $item->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-purple-100 text-purple-800">
                                        {{ $item->category->name }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 text-sm font-medium rounded-full {{ $item->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $item->stock }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($item->photo)
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="Foto Barang"
                                            class="h-12 w-12 rounded-lg object-cover border border-gray-200">
                                    @else
                                        <div
                                            class="h-12 w-12 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400">
                                            <i class="fas fa-camera text-lg"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end space-x-3">
                                        <a href="{{ route('items.edit', $item) }}"
                                            class="text-yellow-600 hover:text-yellow-800 bg-yellow-50 hover:bg-yellow-100 px-4 py-2 rounded-lg inline-flex items-center transition-all">
                                            <i class="fas fa-pencil-alt mr-2 text-sm"></i> Edit
                                        </a>
                                        <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="button" onclick="confirmDelete(this)"
                                                class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-4 py-2 rounded-lg inline-flex items-center transition-all">
                                                <i class="fas fa-trash-alt mr-2 text-sm"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="bg-gray-50 rounded-xl p-8 max-w-md mx-auto">
                                        <div
                                            class="gold-gradient rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                            <i class="fas fa-box-open text-white text-2xl"></i>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Barang</h3>
                                        <p class="text-gray-500 mb-6">Anda belum memiliki data barang. Tambahkan barang baru
                                            untuk memulai.</p>
                                        <a href="{{ route('items.create') }}"
                                            class="gold-gradient hover:opacity-90 text-white px-5 py-2.5 rounded-lg inline-flex items-center transition-all transform hover:scale-[1.02]">
                                            <i class="fas fa-plus mr-2"></i> Tambah Barang Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($items->hasPages())
                <div class="bg-white px-6 py-4 border-t border-gray-100">
                    {{ $items->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        function confirmDelete(button) {
            if (confirm('Apakah Anda yakin ingin menghapus barang ini?')) {
                button.closest('form').submit();
            }
        }
    </script>
@endsection
