@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('icon')
<i class="fas fa-user-edit gold-text"></i>
@endsection

@section('breadcrumb', 'Edit Pengguna')

@section('content')
    <div class="space-y-6">
        <!-- Header with Back Button -->
        <div class="flex items-start">
            <a href="{{ route('users.index') }}"
               class="mr-4 text-gray-600 hover:text-gray-800 transition-colors p-2 rounded-full hover:bg-gray-100">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-user-edit gold-text mr-3"></i>
                    <span>Edit Data Pengguna</span>
                </h1>
                <p class="text-gray-600 mt-1">Perbarui informasi pengguna sistem</p>
            </div>
        </div>

        <!-- Form Container -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 max-w-md mx-auto">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="mb-8">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-user text-gray-500 mr-2"></i>
                        <span>Nama Lengkap <span class="text-red-500">*</span></span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all placeholder-gray-400"
                        placeholder="Masukkan nama lengkap" required autofocus>
                    @error('name')
                        <div class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-8">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-envelope text-gray-500 mr-2"></i>
                        <span>Alamat Email <span class="text-red-500">*</span></span>
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all placeholder-gray-400"
                        placeholder="contoh@email.com" required>
                    @error('email')
                        <div class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-8">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-lock text-gray-500 mr-2"></i>
                        <span>Password Baru</span>
                    </label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all placeholder-gray-400 @error('password') border-red-500 @enderror"
                            placeholder="Kosongkan jika tidak diubah">
                        <button type="button" onclick="togglePasswordVisibility('password')"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Minimal 8 karakter</p>
                    @error('password')
                        <div class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Password Confirmation Field -->
                <div class="mb-8">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-lock text-gray-500 mr-2"></i>
                        <span>Konfirmasi Password Baru</span>
                    </label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all placeholder-gray-400"
                            placeholder="Kosongkan jika tidak diubah">
                        <button type="button" onclick="togglePasswordVisibility('password_confirmation')"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Role Selection -->
                <div class="mb-8">
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-user-tag text-gray-500 mr-2"></i>
                        <span>Role Pengguna <span class="text-red-500">*</span></span>
                    </label>
                    <select id="role" name="role"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all">
                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-between items-center pt-6 border-t border-gray-100">
                    <div>
                        <button type="button" onclick="confirmDelete()"
                            class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-5 py-2.5 rounded-lg inline-flex items-center transition-all">
                            <i class="fas fa-trash-alt mr-2"></i> Hapus Pengguna
                        </button>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('users.index') }}"
                            class="px-5 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Batalkan
                        </a>
                        <button type="submit"
                            class="gold-gradient hover:opacity-90 text-white px-5 py-2.5 rounded-lg flex items-center transition-all transform hover:scale-[1.02]">
                            <i class="fas fa-save mr-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>

            <!-- Delete Form (Hidden) -->
            <form id="deleteForm" action="{{ route('users.destroy', $user) }}" method="POST" class="hidden">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(fieldId) {
            const input = document.getElementById(fieldId);
            const icon = input.nextElementSibling.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        function confirmDelete() {
            if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
                document.getElementById('deleteForm').submit();
            }
        }

        // Auto focus on name field when page loads
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('name').focus();
        });
    </script>
@endsection
