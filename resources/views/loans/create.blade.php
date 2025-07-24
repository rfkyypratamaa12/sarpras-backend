@extends('layouts.app')

@section('title', 'Pengajuan Peminjaman Barang')

@section('icon')
    <i class="fas fa-hand-holding gold-text"></i>
@endsection

@section('breadcrumb', 'Pengajuan Peminjaman')

@section('content')
    <div class="space-y-6">
        <!-- Header with Back Button -->
        <div class="flex items-start">
            <a href="{{ url()->previous() }}"
                class="mr-4 text-gray-600 hover:text-gray-800 transition-colors p-2 rounded-full hover:bg-gray-100">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-hand-holding gold-text mr-3"></i>
                    <span>Pengajuan Peminjaman Barang</span>
                </h1>
                <p class="text-gray-600 mt-1">Isi formulir berikut untuk mengajukan peminjaman barang inventaris</p>
            </div>
        </div>

        <!-- Form Container -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 max-w-2xl mx-auto">
            <form action="{{ route('loans.store') }}" method="POST">
                @csrf

                <!-- Barang Field -->
                <div class="mb-8">
                    <label for="item_id" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-box text-gray-500 mr-2"></i>
                        <span>Barang <span class="text-red-500">*</span></span>
                    </label>
                    <select id="item_id" name="item_id" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all @error('item_id') border-red-500 @enderror">
                        <option value="">-- Pilih Barang --</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}" {{ old('item_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }} (Stok: {{ $item->stock }})
                            </option>
                        @endforeach
                    </select>
                    @error('item_id')
                        <div class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Quantity Field -->
                <div class="mb-8">
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-layer-group text-gray-500 mr-2"></i>
                        <span>Jumlah <span class="text-red-500">*</span></span>
                    </label>
                    <input type="number" id="quantity" name="quantity" min="1" value="{{ old('quantity', 1) }}"
                        required
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all @error('quantity') border-red-500 @enderror">
                    @error('quantity')
                        <div class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Date Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Borrow Date -->
                    <div>
                        <label for="borrowed_at" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-calendar-plus text-gray-500 mr-2"></i>
                            <span>Tanggal Pinjam <span class="text-red-500">*</span></span>
                        </label>
                        <input type="date" id="borrowed_at" name="borrowed_at" value="{{ old('borrowed_at') }}" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all @error('borrowed_at') border-red-500 @enderror">
                        @error('borrowed_at')
                            <div class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Return Date -->
                    <div>
                        <label for="returned_at" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-calendar-minus text-gray-500 mr-2"></i>
                            <span>Tanggal Kembali <span class="text-red-500">*</span></span>
                        </label>
                        <input type="date" id="returned_at" name="returned_at" value="{{ old('returned_at') }}" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all @error('returned_at') border-red-500 @enderror">
                        @error('returned_at')
                            <div class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Purpose Field -->
                <div class="mb-8">
                    <label for="purpose" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-clipboard-list text-gray-500 mr-2"></i>
                        <span>Tujuan Peminjaman <span class="text-red-500">*</span></span>
                    </label>
                    <textarea id="purpose" name="purpose" rows="3"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all @error('purpose') border-red-500 @enderror"
                        placeholder="Masukkan tujuan peminjaman" required>{{ old('purpose') }}</textarea>
                    @error('purpose')
                        <div class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex justify-between items-center pt-6 border-t border-gray-100">
                    <a href="{{ url()->previous() }}"
                        class="px-5 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Batalkan
                    </a>
                    <button type="submit"
                        class="gold-gradient hover:opacity-90 text-white px-5 py-2.5 rounded-lg flex items-center transition-all transform hover:scale-[1.02]">
                        <i class="fas fa-paper-plane mr-2"></i> Ajukan Peminjaman
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Set minimum dates and date validation
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            const borrowDate = document.getElementById('borrowed_at');
            const returnDate = document.getElementById('returned_at');

            // Set minimum borrow date to today
            borrowDate.min = today;

            // Update return date minimum when borrow date changes
            borrowDate.addEventListener('change', function() {
                returnDate.min = this.value;

                // If return date is before new borrow date, reset it
                if (returnDate.value && returnDate.value < this.value) {
                    returnDate.value = this.value;
                }
            });

            // Initialize return date min if borrow date already has value
            if (borrowDate.value) {
                returnDate.min = borrowDate.value;
            }
        });
    </script>
@endsection
