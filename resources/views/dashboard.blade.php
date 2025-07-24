@extends('layouts.app')

@section('title', 'Dashboard')

@section('icon')
    <i class="fas fa-tachometer-alt text-yellow-500 animate__animated animate__pulse animate__infinite"></i>
@endsection

@section('breadcrumb', 'Ringkasan')

@section('content')
    <div class="space-y-10 animate__animated animate__fadeInUp">
        <!-- Header -->
        <div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3 animate__animated animate__fadeInLeft">
                <i class="fas fa-tachometer-alt text-yellow-500"></i>
                Ringkasan Dashboard
            </h1>
            <p class="text-sm text-gray-500 mt-1">Selamat datang kembali, Admin! Ini ringkasan datanya yaa~</p>
        </div>

        <!-- Cards Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $cards = [
                    ['label' => 'Total Kategori', 'count' => $categoryCount, 'icon' => 'fas fa-tags', 'growth' => '+2.5%', 'color' => 'from-indigo-400 to-indigo-600'],
                    ['label' => 'Total Barang', 'count' => $itemCount, 'icon' => 'fas fa-box-open', 'growth' => '+5.3%', 'color' => 'from-blue-400 to-blue-600'],
                    ['label' => 'Total Pengguna', 'count' => $userCount, 'icon' => 'fas fa-users', 'growth' => '+3.1%', 'color' => 'from-purple-400 to-purple-600'],
                    ['label' => 'Total Peminjaman', 'count' => $loanCount, 'icon' => 'fas fa-exchange-alt', 'growth' => '+7.8%', 'color' => 'from-green-400 to-green-600'],
                ];
            @endphp

            @foreach($cards as $index => $card)
                <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-5 transition transform hover:scale-105 hover:shadow-2xl animate__animated animate__fadeInUp animate__delay-{{ $index }}s">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">{{ $card['label'] }}</p>
                            <h2 class="text-3xl font-extrabold text-gray-800 mt-1">{{ $card['count'] }}</h2>
                        </div>
                        <div class="p-3 rounded-xl bg-gradient-to-tr {{ $card['color'] }} text-white shadow-md">
                            <i class="{{ $card['icon'] }} text-lg"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="inline-flex items-center text-xs font-medium bg-green-100 text-green-700 px-2 py-1 rounded-full animate__animated animate__zoomIn animate__delay-1s">
                            <i class="fas fa-arrow-up text-xs mr-1"></i> {{ $card['growth'] }} dari minggu lalu
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Aksi Cepat & Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Aksi Cepat -->
            <div class="bg-gradient-to-b from-white via-gray-50 to-white rounded-2xl shadow-lg border border-gray-200 p-6 animate__animated animate__fadeInLeft">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-bolt text-yellow-500 animate__animated animate__heartBeat animate__infinite animate__slow"></i>
                    Aksi Cepat
                </h3>
                <div class="space-y-3">
                    <a href="{{ route('items.create') }}" class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition transform hover:scale-105">
                        <div class="p-2 rounded-lg bg-blue-100 text-blue-600 mr-3">
                            <i class="fas fa-plus"></i>
                        </div>
                        <span class="text-gray-700 font-medium">Tambah Barang Baru</span>
                    </a>
                    <a href="{{ route('loans.create') }}" class="flex items-center p-3 rounded-lg hover:bg-green-50 transition transform hover:scale-105">
                        <div class="p-2 rounded-lg bg-green-100 text-green-600 mr-3">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <span class="text-gray-700 font-medium">Buat Peminjaman Baru</span>
                    </a>
                    <a href="{{ route('users.create') }}" class="flex items-center p-3 rounded-lg hover:bg-purple-50 transition transform hover:scale-105">
                        <div class="p-2 rounded-lg bg-purple-100 text-purple-600 mr-3">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span class="text-gray-700 font-medium">Tambah Pengguna Baru</span>
                    </a>
                </div>
            </div>

            <!-- Statistik -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 md:col-span-2 animate__animated animate__fadeInRight">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-chart-line text-yellow-500"></i>
                    Statistik Bulan Ini
                </h3>
                <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg border-dashed border-2 border-yellow-100">
                    <p class="text-gray-400 italic">📊 Grafik akan tampil di sini yaa ✨</p>
                </div>
            </div>
        </div>
    </div>
@endsection
