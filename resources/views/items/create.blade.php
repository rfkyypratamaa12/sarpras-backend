@extends('layouts.app')

@section('title', 'Tambah Barang Baru')

@section('icon')
    <i class="fas fa-box-circle-plus gold-text"></i>
@endsection

@section('breadcrumb', 'Tambah Barang')

@section('content')
    <div class="space-y-6">
        <!-- Header with Back Button -->
        <div class="flex items-start">
            <a href="{{ route('items.index') }}"
                class="mr-4 text-gray-600 hover:text-gray-800 transition-colors p-2 rounded-full hover:bg-gray-100">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-box-circle-plus gold-text mr-3"></i>
                    <span>Tambah Barang Baru</span>
                </h1>
                <p class="text-gray-600 mt-1">Isi form berikut untuk menambahkan barang ke inventaris</p>
            </div>
        </div>

        <!-- Error Notification -->
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-500 text-xl mr-3 mt-0.5"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-red-800 mb-1">Terdapat kesalahan dalam pengisian form</h4>
                        <ul class="list-disc list-inside text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form Container -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 max-w-2xl mx-auto">
            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nama Barang Field -->
                <div class="mb-8">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-tag text-gray-500 mr-2"></i>
                        <span>Nama Barang <span class="text-red-500">*</span></span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all placeholder-gray-400"
                        placeholder="Masukkan nama barang" required autofocus>
                    @error('name')
                        <div class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Kategori Field -->
                <div class="mb-8">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-list-alt text-gray-500 mr-2"></i>
                        <span>Kategori <span class="text-red-500">*</span></span>
                    </label>
                    <select id="category_id" name="category_id"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Quantity Field -->
                <div class="mb-8">
                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-boxes text-gray-500 mr-2"></i>
                        <span>Jumlah Stok <span class="text-red-500">*</span></span>
                    </label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock', 1) }}" min="1"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all"
                        required>
                    @error('stock')
                        <div class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Photo Field -->
                <div class="mb-8">
                    <label for="photo" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-camera text-gray-500 mr-2"></i>
                        <span>Foto Barang</span>
                    </label>
                    <div class="flex items-center">
                        <label for="photo" class="cursor-pointer w-full">
                            <div
                                class="border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-gray-400 transition-colors">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                    <p class="text-sm text-gray-600">Upload foto barang</p>
                                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, JPEG (Maks. 2MB)</p>
                                </div>
                                <input type="file" id="photo" name="photo" accept="image/*" class="hidden">
                            </div>
                        </label>
                        <div id="preview" class="ml-4 hidden">
                            <img id="previewImage" class="h-20 w-20 rounded-lg object-cover border border-gray-200">
                        </div>
                    </div>
                    @error('photo')
                        <div class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 pt-4 border-t border-gray-100">
                    <a href="{{ route('items.index') }}"
                        class="px-5 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Batalkan
                    </a>
                    <button type="submit"
                        class="gold-gradient hover:opacity-90 text-white px-5 py-2.5 rounded-lg flex items-center transition-all transform hover:scale-[1.02]">
                        <i class="fas fa-save mr-2"></i> Simpan Barang
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Image preview functionality
        document.getElementById('photo').addEventListener('change', function(e) {
            const preview = document.getElementById('preview');
            const previewImage = document.getElementById('previewImage');
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    previewImage.src = event.target.result;
                    preview.classList.remove('hidden');
                }

                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        });

        // Auto focus on name field when page loads
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('name').focus();
        });
    </script>
@endsection
