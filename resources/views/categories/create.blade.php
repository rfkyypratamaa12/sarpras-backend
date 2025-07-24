@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('icon')
    <i class="fas fa-plus-circle gold-text"></i>
@endsection

@section('breadcrumb', 'Tambah Kategori')

@section('content')
    <div class="space-y-6">
        <!-- Header with Back Button -->
        <div class="flex items-start">
            <a href="{{ route('categories.index') }}"
                class="mr-4 text-gray-600 hover:text-gray-800 transition-colors p-2 rounded-full hover:bg-gray-100">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-plus-circle gold-text mr-3"></i>
                    <span>Tambah Kategori Baru</span>
                </h1>
                <p class="text-gray-600 mt-1">Isi form berikut untuk menambahkan kategori baru</p>
            </div>
        </div>

        <!-- Form Container -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 max-w-lg mx-auto">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <!-- Name Field -->
                <div class="mb-8">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-tag text-gray-500 mr-2"></i>
                        <span>Nama Kategori</span>
                    </label>
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all placeholder-gray-400"
                        placeholder="Contoh: Elektronik, Furniture, dll" required>

                    @error('name')
                        <div class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 pt-4 border-t border-gray-100">
                    <a href="{{ route('categories.index') }}"
                        class="px-5 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Batalkan
                    </a>
                    <button type="submit"
                        class="gold-gradient hover:opacity-90 text-white px-5 py-2.5 rounded-lg flex items-center transition-all transform hover:scale-[1.02]">
                        <i class="fas fa-save mr-2"></i> Simpan Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Auto focus on name field when page loads
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('name').focus();
        });
    </script>
@endsection
