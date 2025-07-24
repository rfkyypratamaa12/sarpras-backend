@extends('layouts.app')

@section('title', 'Edit Barang')

@section('icon')
    <i class="fas fa-edit text-yellow-500"></i>
@endsection

@section('breadcrumb', 'Edit Barang')

@section('content')
<div class="max-w-3xl mx-auto space-y-8">
    <!-- Header -->
    <div class="flex items-start space-x-4">
        <a href="{{ route('items.index') }}"
            class="text-gray-500 hover:text-yellow-600 transition p-2 rounded-full hover:bg-gray-100">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-edit text-yellow-500 mr-3"></i> Edit Barang
            </h1>
            <p class="text-sm text-gray-500">ID: {{ $item->id }} – Perbarui detail barang di bawah ini</p>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-xl shadow p-6 border border-gray-200">
        <form action="{{ route('items.update', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Barang -->
            <div class="mb-6">
                <label for="name" class="block font-medium text-sm text-gray-700 mb-2">Nama Barang <span class="text-red-500">*</span></label>
                <input id="name" name="name" type="text" required autofocus
                    value="{{ old('name', $item->name) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500"
                    placeholder="Masukkan nama barang">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kategori -->
            <div class="mb-6">
                <label for="category_id" class="block font-medium text-sm text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                <select id="category_id" name="category_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Stok -->
            <div class="mb-6">
                <label for="stock" class="block font-medium text-sm text-gray-700 mb-2">Jumlah Stok <span class="text-red-500">*</span></label>
                <input id="stock" name="stock" type="number" min="1" required
                    value="{{ old('stock', $item->stock) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                @error('stock')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Foto -->
            <div class="mb-6">
                <label class="block font-medium text-sm text-gray-700 mb-2">Foto Barang</label>
                @if ($item->photo)
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('storage/' . $item->photo) }}" alt="Foto Barang"
                            class="w-24 h-24 object-cover rounded-md border border-gray-300">
                        <label class="ml-4 text-sm text-gray-600 cursor-pointer">
                            <input type="checkbox" name="remove_photo" class="mr-2"> Hapus foto saat ini
                        </label>
                    </div>
                @endif
                <input type="file" name="photo" id="photo" accept="image/*"
                    class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md p-2 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200 transition">
                <p class="text-xs text-gray-500 mt-1">Format: JPG, JPEG, PNG. Maksimal 30MB.</p>
                <div id="preview" class="mt-4 hidden">
                    <img id="previewImage" class="h-24 w-24 object-cover rounded-md border border-gray-300">
                </div>
                @error('photo')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol -->
            <div class="flex justify-between items-center border-t pt-6 mt-6">
                <button type="button" onclick="confirmDelete()"
                    class="text-red-600 hover:text-red-800 bg-red-100 px-4 py-2 rounded-md transition">
                    <i class="fas fa-trash-alt mr-1"></i> Hapus Barang
                </button>
                <div class="flex space-x-3">
                    <a href="{{ route('items.index') }}"
                        class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
            </div>
        </form>

        <!-- Form Hapus -->
        <form id="deleteForm" action="{{ route('items.destroy', $item) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>

<script>
    // Preview gambar
    document.getElementById('photo').addEventListener('change', function (e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview');
        const previewImage = document.getElementById('previewImage');

        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                previewImage.src = event.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
        }
    });

    // Konfirmasi hapus
    function confirmDelete() {
        if (confirm('Yakin ingin menghapus barang ini?')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
@endsection
