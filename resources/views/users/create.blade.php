@extends('layout.main_layout')
@section('header-title', 'Tambah Pengguna Baru')
@section('content')

@include('admin.component.sidebar')

<main class="main flex-1 p-6 md:p-8 bg-gray-50 min-h-screen" id="main">
    <div class="max-w-3xl mx-auto">
        <div class="flex items-center mb-10 space-x-4" data-aos="fade-down">
            <a href="{{ route('users.index') }}" class="text-gray-400 hover:text-gray-700 transition">
                <i class="ri-arrow-left-line text-3xl"></i>
            </a>
            <div class="h-16 w-16 rounded-3xl bg-gradient-to-br from-green-600 to-teal-700 flex items-center justify-center shadow-lg shadow-green-300">
                <i class="ri-user-add-line text-white text-3xl"></i>
            </div>
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900">Tambah Pengguna Baru</h1>
                <p class="text-gray-600 mt-1 text-lg">Isi detail untuk membuat akun pengguna baru.</p>
            </div>
        </div>

        <section class="bg-white rounded-3xl shadow-lg p-10" data-aos="fade-up" data-aos-delay="150">

            <form action="{{ route('users.store') }}" method="POST" novalidate>
                @csrf

                {{-- Floating Label Input --}}
                <div class="relative z-0 w-full mb-8 group">
                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                        class="block py-3 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none 
                               focus:outline-none focus:ring-0 focus:border-green-600 peer @error('name') border-red-500 focus:border-red-500 @enderror" 
                        placeholder=" " autocomplete="off" />
                    <label for="name" 
                        class="absolute text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                               peer-focus:scale-75 peer-focus:-translate-y-6">
                        Nama Lengkap
                    </label>
                    @error('name')
                        <p class="flex items-center mt-2 text-sm text-red-600">
                            <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-8 group">
                    <input type="email" name="email" id="email" value="{{ old('email') }}" 
                        class="block py-3 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none 
                               focus:outline-none focus:ring-0 focus:border-green-600 peer @error('email') border-red-500 focus:border-red-500 @enderror" 
                        placeholder=" " autocomplete="off" />
                    <label for="email" 
                        class="absolute text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                               peer-focus:scale-75 peer-focus:-translate-y-6">
                        Alamat Email
                    </label>
                    @error('email')
                        <p class="flex items-center mt-2 text-sm text-red-600">
                            <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-8 group">
                    <input type="password" name="password" id="password" 
                        class="block py-3 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none 
                               focus:outline-none focus:ring-0 focus:border-green-600 peer @error('password') border-red-500 focus:border-red-500 @enderror" 
                        placeholder=" " autocomplete="new-password" />
                    <label for="password" 
                        class="absolute text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                               peer-focus:scale-75 peer-focus:-translate-y-6">
                        Password
                    </label>
                    @error('password')
                        <p class="flex items-center mt-2 text-sm text-red-600">
                            <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-10 group">
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                        class="block py-3 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none 
                               focus:outline-none focus:ring-0 focus:border-green-600 peer" 
                        placeholder=" " autocomplete="new-password" />
                    <label for="password_confirmation" 
                        class="absolute text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                               peer-focus:scale-75 peer-focus:-translate-y-6">
                        Konfirmasi Password
                    </label>
                </div>

                <div class="flex flex-wrap justify-between items-center gap-4">
                    <button type="submit" 
                        class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-full bg-gradient-to-r from-green-600 to-teal-500
                               text-white font-semibold text-lg shadow-lg hover:from-green-700 hover:to-teal-600 transition-all duration-300
                               focus:outline-none focus:ring-4 focus:ring-green-300">
                        <i class="ri-save-line text-xl"></i> Simpan Pengguna
                    </button>

                    <a href="{{ route('users.index') }}" 
                       class="text-green-700 font-semibold text-lg hover:underline transition-colors">
                        Batal
                    </a>
                </div>
            </form>

        </section>
    </div>
</main>

@endsection
