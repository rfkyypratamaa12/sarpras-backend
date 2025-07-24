@extends('layouts.app')

@section('title', 'Manajemen Kategori')

@section('icon')
    <i class="fas fa-tags gold-text"></i>
@endsection

@section('breadcrumb', 'Manajemen Kategori')

@section('content')
    <div class="space-y-6">
        <!-- Header and Add Button -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-tags gold-text mr-3"></i>
                    <span>Manajemen Kategori Barang</span>
                </h1>
                <p class="text-gray-600 mt-1">Kelola kategori inventaris barang Anda</p>
            </div>
            <a href="{{ route('categories.create') }}"
                class="gold-gradient hover:opacity-90 text-white px-5 py-2.5 rounded-lg flex items-center transition-all transform hover:scale-[1.02]">
                <i class="fas fa-plus mr-2"></i> Tambah Kategori
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

        <!-- Categories Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Kategori
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($categories as $category)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600 mr-4">
                                            <i class="fas fa-tag"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $category->name }}</div>
                                            <div class="text-xs text-gray-500">ID: {{ $category->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-3">
                                        <a href="{{ route('categories.edit', $category) }}"
                                            class="text-yellow-600 hover:text-yellow-800 bg-yellow-50 hover:bg-yellow-100 px-4 py-2 rounded-lg inline-flex items-center transition-all">
                                            <i class="fas fa-pencil-alt mr-2 text-sm"></i> Edit
                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                            class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')"
                                                class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-4 py-2 rounded-lg inline-flex items-center transition-all">
                                                <i class="fas fa-trash-alt mr-2 text-sm"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Empty State -->
        @if ($categories->isEmpty())
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
                <div class="mx-auto max-w-md">
                    <div class="gold-gradient rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tags text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Kategori</h3>
                    <p class="text-gray-500 mb-6">Anda belum memiliki kategori barang. Tambahkan kategori baru untuk
                        memulai.</p>
                    <a href="{{ route('categories.create') }}"
                        class="gold-gradient hover:opacity-90 text-white px-5 py-2.5 rounded-lg inline-flex items-center transition-all transform hover:scale-[1.02]">
                        <i class="fas fa-plus mr-2"></i> Tambah Kategori Pertama
                    </a>
                </div>
            </div>
        @endif

        <!-- Pagination -->
        @if ($categories->hasPages())
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 px-6 py-4">
                {{ $categories->links() }}
            </div>
        @endif
    </div>

    <script>
        // Confirmation for delete
        document.querySelectorAll('form[method="POST"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection
