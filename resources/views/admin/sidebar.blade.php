@extends('layout.main_layout')
@section('header-title', 'Dashboard Administratif')
@section('content')

@include('admin.component.sidebar') {{-- Pastikan path file sidebar Anda benar di resources/views/admin/component/sidebar.blade.php --}}

<main class="main flex-1 p-6 md:p-8" id="main">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8" data-aos="fade-down" data-aos-duration="1000">
            <div class="mb-4 md:mb-0">
                <div class="flex items-center">
                    <div class="h-16 w-16 rounded-full bg-gradient-to-br from-indigo-500 to-purple-700 flex items-center justify-center shadow-2xl shadow-purple-300 transform hover:scale-105 transition-transform duration-300">
                        <i class="ri-dashboard-fill text-white text-3xl"></i>
                    </div>
                    <div class="ml-5">
                        <h1 class="text-4xl font-extrabold text-gray-900 leading-tight">Selamat Datang Kembali, Admin!</h1>
                        <p class="text-gray-700 text-lg mt-1">{{ now()->format('l, F j, Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative w-full md:w-64">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </span>
                    <input type="text" class="pl-10 pr-4 py-2.5 w-full bg-white border border-gray-200 rounded-full focus:outline-none focus:ring-3 focus:ring-blue-400 focus:border-transparent transition-all duration-300 shadow-md" placeholder="Cari di sini...">
                </div>
                <div class="relative">
                    <button class="relative p-3 bg-white text-gray-600 rounded-full border border-gray-200 hover:bg-gray-100 transition-all duration-300 focus:outline-none focus:ring-3 focus:ring-blue-400 shadow-md">
                        <i class="ri-notification-3-line text-xl"></i>
                        <span class="absolute top-0 right-0 h-5 w-5 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center transform translate-x-1/3 -translate-y-1/3 animate-pulse">5</span>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-3xl overflow-hidden shadow-xl shadow-indigo-100/50 border border-gray-100 transform hover:scale-102 transition-all duration-300 card-hover" data-aos="fade-up" data-aos-delay="100">
                <div class="px-7 py-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-indigo-100 p-4 rounded-full">
                            <i class="ri-user-3-line text-indigo-600 text-3xl"></i>
                        </div>
                        <div class="bg-green-100 py-1.5 px-3 rounded-full text-xs font-medium text-green-700 flex items-center">
                            <i class="ri-arrow-up-line mr-1"></i> 16%
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ number_format($userCount) }}</h3>
                    <p class="text-gray-500 text-sm">Pengguna Reguler</p>
                </div>
                <div class="h-1.5 w-full bg-gradient-to-r from-indigo-500 to-purple-600"></div>
            </div>
            
            <div class="bg-white rounded-3xl overflow-hidden shadow-xl shadow-blue-100/50 border border-gray-100 transform hover:scale-102 transition-all duration-300 card-hover" data-aos="fade-up" data-aos-delay="200">
                <div class="px-7 py-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-blue-100 p-4 rounded-full">
                            <i class="ri-archive-line text-blue-600 text-3xl"></i>
                        </div>
                        <div class="bg-green-100 py-1.5 px-3 rounded-full text-xs font-medium text-green-700 flex items-center">
                            <i class="ri-arrow-up-line mr-1"></i> 8%
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ number_format($itemCount) }}</h3>
                    <p class="text-gray-500 text-sm">Total Barang</p>
                </div>
                <div class="h-1.5 w-full bg-gradient-to-r from-blue-500 to-cyan-400"></div>
            </div>
            
            <div class="bg-white rounded-3xl overflow-hidden shadow-xl shadow-amber-100/50 border border-gray-100 transform hover:scale-102 transition-all duration-300 card-hover" data-aos="fade-up" data-aos-delay="300">
                <div class="px-7 py-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-amber-100 p-4 rounded-full">
                            <i class="ri-folder-3-line text-amber-600 text-3xl"></i>
                        </div>
                        <div class="bg-blue-100 py-1.5 px-3 rounded-full text-xs font-medium text-blue-700 flex items-center">
                            <i class="ri-arrow-right-line mr-1"></i> Stabil
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ number_format($categoryCount) }}</h3>
                    <p class="text-gray-500 text-sm">Kategori</p>
                </div>
                <div class="h-1.5 w-full bg-gradient-to-r from-amber-500 to-orange-400"></div>
            </div>
            
            <div class="bg-white rounded-3xl overflow-hidden shadow-xl shadow-emerald-100/50 border border-gray-100 transform hover:scale-102 transition-all duration-300 card-hover" data-aos="fade-up" data-aos-delay="400">
                <div class="px-7 py-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-emerald-100 p-4 rounded-full">
                            <i class="ri-exchange-funds-line text-emerald-600 text-3xl"></i>
                        </div>
                        <div class="bg-green-100 py-1.5 px-3 rounded-full text-xs font-medium text-green-700 flex items-center">
                            <i class="ri-arrow-up-line mr-1"></i> 24%
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ number_format($completedLoans) }}</h3>
                    <p class="text-gray-500 text-sm">Peminjaman Selesai</p>
                </div>
                <div class="h-1.5 w-full bg-gradient-to-r from-emerald-500 to-green-400"></div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-6">
            <div class="lg:col-span-8" data-aos="fade-right" data-aos-delay="500">
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-100/50 border border-gray-100 overflow-hidden">
                    <div class="flex flex-col md:flex-row md:items-center justify-between px-7 py-6 border-b border-gray-100">
                        <div>
                            <h2 class="font-bold text-xl text-gray-800">Statistik Peminjaman</h2>
                            <p class="text-gray-600 text-sm mt-1">Tren dan gambaran umum pergerakan inventaris</p>
                        </div>
                        
                        <div class="mt-4 md:mt-0">
                            <div class="p-1 bg-gray-100 rounded-full inline-flex space-x-1 shadow-inner">
                                <button id="btn-daily" onclick="switchChart('daily')" class="chart-btn text-sm font-medium px-4 py-2 rounded-full transition duration-200">Harian</button>
                                <button id="btn-weekly" onclick="switchChart('weekly')" class="chart-btn text-sm font-medium px-4 py-2 rounded-full transition duration-200">Mingguan</button>
                                <button id="btn-monthly" onclick="switchChart('monthly')" class="chart-btn active text-sm font-medium px-4 py-2 rounded-full transition duration-200">Bulanan</button>
                                <button id="btn-yearly" onclick="switchChart('yearly')" class="chart-btn text-sm font-medium px-4 py-2 rounded-full transition duration-200">Tahunan</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-7">
                        <div class="h-[380px]">
                            <canvas id="loanChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="lg:col-span-4" data-aos="fade-left" data-aos-delay="600">
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-100/50 border border-gray-100 overflow-hidden h-full">
                    <div class="px-7 py-6 border-b border-gray-100">
                        <h2 class="font-bold text-xl text-gray-800">Status Inventaris</h2>
                        <p class="text-gray-600 text-sm mt-1">Status inventaris dan peminjaman saat ini</p>
                    </div>
                    
                    <div class="p-7">
                        <div class="mb-8">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <span class="h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                                        <i class="ri-time-line text-orange-600 text-lg"></i>
                                    </span>
                                    <span class="text-gray-700 font-medium">Menunggu Persetujuan</span>
                                </div>
                                <span class="text-gray-800 font-bold text-lg">{{ $pendingLoans }}</span>
                            </div>
                            <div class="h-2.5 bg-gray-100 rounded-full overflow-hidden">
                            </div>
                        </div>
                        
                        <div class="mb-8">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <span class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                        <i class="ri-hand-coin-line text-blue-600 text-lg"></i>
                                    </span>
                                    <span class="text-gray-700 font-medium">Item Sedang Dipinjam</span>
                                </div>
                                <span class="text-gray-800 font-bold text-lg">{{ $onLoanItems }}</span>
                            </div>
                            <div class="h-2.5 bg-gray-100 rounded-full overflow-hidden">
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <span class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center mr-3">
                                        <i class="ri-stack-line text-emerald-600 text-lg"></i>
                                    </span>
                                    <span class="text-gray-700 font-medium">Tersedia untuk Dipinjam</span>
                                </div>
                                <span class="text-gray-800 font-bold text-lg">{{ $availableItems }}</span>
                            </div>
                            <div class="h-2.5 bg-gray-100 rounded-full overflow-hidden">
                            </div>
                        </div>
                        
                        <div class="mt-8 p-5 bg-purple-50 rounded-2xl border border-purple-100 shadow-inner">
                            <div class="flex items-start">
                                <div class="h-12 w-12 rounded-full bg-purple-100 flex items-center justify-center mr-4 mt-1">
                                    <i class="ri-information-line text-purple-600 text-2xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 mb-1.5 text-lg">Ringkasan Inventaris</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Anda memiliki <span class="font-semibold text-purple-700">{{ $availableItems }}</span> item yang tersedia untuk dipinjam, dengan <span class="font-semibold text-orange-600">{{ $pendingLoans }}</span> menunggu persetujuan.
                                    </p>
                                    <a href="#" class="mt-3 inline-flex items-center text-sm font-medium text-purple-600 hover:text-purple-800 transition-colors">
                                        Lihat laporan rinci
                                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-6">
            <div class="lg:col-span-4" data-aos="fade-up" data-aos-delay="700">
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-100/50 border border-gray-100 overflow-hidden">
                    <div class="flex items-center justify-between px-7 py-6 border-b border-gray-100">
                        <div>
                            <h2 class="font-bold text-xl text-gray-800">Pengguna Terbaru</h2>
                            <p class="text-gray-600 text-sm mt-1">Akun pengguna terbaru</p>
                        </div>
                        <a href="#" class="text-purple-600 hover:text-purple-800 font-medium text-sm flex items-center transition-colors">
                            Lihat semua
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                    
                    <div class="overflow-hidden">
                        <div class="divide-y divide-gray-100">
                            @forelse ($recentUsers as $user)
                            <div class="px-7 py-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="{{ $user->profile_picture ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=random&color=fff' }}"
                                            alt="{{ $user->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-md">
                                        <div class="ml-4">
                                            <p class="font-medium text-gray-800 text-base">{{ $user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('users.edit', $user->id) }}" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors" title="Edit Pengguna">
                                            <i class="ri-pencil-line text-base"></i>
                                        </a>
                                        <form method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini? Tindakan ini tidak dapat dibatalkan.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors shadow-md" title="Hapus Pengguna">
                                                <i class="ri-delete-bin-line text-base"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="px-7 py-5 text-center text-gray-500">Tidak ada pengguna terbaru yang ditemukan.</div>
                            @endforelse
                        </div>
                    </div>
                    
                    <div class="px-7 py-5 bg-gray-50 border-t border-gray-100">
                        <a href="#" class="text-sm text-center w-full inline-block text-gray-600 hover:text-gray-800 font-medium">
                            Muat lebih banyak pengguna
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="lg:col-span-8" data-aos="fade-up" data-aos-delay="800">
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-100/50 border border-gray-100 overflow-hidden h-full">
                    <div class="flex flex-col md:flex-row md:items-center justify-between px-7 py-6 border-b border-gray-100">
                        <div class="mb-4 md:mb-0">
                            <div class="flex items-center">
                                <div class="mr-4">
                                    <span class="h-10 w-10 bg-purple-100 rounded-full flex items-center justify-center">
                                        <i class="ri-file-list-3-line text-purple-600 text-xl"></i>
                                    </span>
                                </div>
                                <div>
                                    <h2 class="font-bold text-xl text-gray-800">Aktivitas Peminjaman Terbaru</h2>
                                    <p class="text-gray-600 text-sm mt-1">Lacak permintaan peminjaman dan pengembalian</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex space-x-2 p-1 bg-gray-100 rounded-full shadow-inner">
                            <button id="tab-loans" onclick="switchTab('loans')" class="tab-btn active px-4 py-2 text-sm font-medium rounded-full">
                                Permintaan Peminjaman
                            </button>
                            <button id="tab-returns" onclick="switchTab('returns')" class="tab-btn px-4 py-2 text-sm font-medium rounded-full">
                                Permintaan Pengembalian
                            </button>
                        </div>
                    </div>
                    
                    <div id="content-loans" class="tab-content">
                        {{-- Asumsi komponen Livewire menangani pengambilan dan tampilan datanya sendiri --}}
                        @livewire('loan-requests')
                        
                        {{-- Fallback untuk peminjaman terbaru jika Livewire tidak digunakan atau untuk data awal --}}
                        @if ($recentLoans->isEmpty())
                            <div class="p-7 text-center text-gray-500">Tidak ada permintaan peminjaman terbaru.</div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item</th>
                                            <th scope="col" class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengguna</th>
                                            <th scope="col" class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                            <th scope="col" class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($recentLoans as $loan)
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-7 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loan->item->name ?? 'N/A' }}</td>
                                                <td class="px-7 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loan->user->name ?? 'N/A' }}</td>
                                                <td class="px-7 py-4 whitespace-nowrap">
                                                    @php
                                                        $statusClass = [
                                                            'pending' => 'bg-orange-100 text-orange-800',
                                                            'on_loan' => 'bg-blue-100 text-blue-800',
                                                            'completed' => 'bg-green-100 text-green-800',
                                                            'rejected' => 'bg-red-100 text-red-800',
                                                        ][$loan->status] ?? 'bg-gray-100 text-gray-800';
                                                    @endphp
                                                    <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                                        {{ ucfirst(str_replace('_', ' ', $loan->status)) }}
                                                    </span>
                                                </td>
                                                <td class="px-7 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loan->created_at->format('d M Y') }}</td>
                                                <td class="px-7 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3" title="Lihat Detail">Lihat</a>
                                                    {{-- Tambahkan tombol aksi berdasarkan status peminjaman, misal Setujui/Tolak --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    
                    <div id="content-returns" class="tab-content hidden">
                        @livewire('return-request')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    /* Gaya kustom untuk tombol grafik dan tab */
    .chart-btn {
        background-color: transparent;
        color: #6b7280; /* gray-500 */
        transition: all 0.2s ease-in-out;
    }
    
    .chart-btn:hover {
        background-color: #e5e7eb; /* gray-100 */
    }
    
    .chart-btn.active {
        background-color: #6366f1; /* indigo-500 */
        color: white;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4); /* Bayangan lembut untuk status aktif */
        transform: translateY(-2px);
    }
    
    .tab-btn {
        background-color: #f9fafb; /* gray-50 */
        color: #6b7280; /* gray-500 */
        transition: all 0.2s ease-in-out;
    }
    
    .tab-btn:hover {
        background-color: #e5e7eb; /* gray-100 */
    }
    
    .tab-btn.active {
        background-color: #6366f1; /* indigo-500 */
        color: white;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4); /* Bayangan lembut untuk status aktif */
        transform: translateY(-2px);
    }
    
    /* Animasi Grafik Saat Memuat */
    #loanChart {
        animation: fadeIn 0.8s ease-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Efek Hover Kartu (diperkuat) */
    .card-hover {
        transition: all 0.3s ease-out;
    }
    
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px -8px rgba(0, 0, 0, 0.15), 0 10px 15px -5px rgba(0, 0, 0, 0.08);
    }
</style>

<script>
    // Konfigurasi Grafik
    const ctx = document.getElementById('loanChart').getContext('2d');
    let chart;
    
    
    function createChart(labels, data, label = 'Total Peminjaman') {
        if (chart) chart.destroy(); // Hancurkan grafik yang ada sebelum membuat yang baru
        
        // Buat gradien latar belakang untuk area grafik
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(99, 102, 241, 0.5)');  // Indigo-500 dengan opasitas
        gradient.addColorStop(1, 'rgba(99, 102, 241, 0.0)'); // Transparan

        chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: label,
                    data: data,
                    borderWidth: 3,
                    borderColor: '#6366f1', // Indigo-500
                    backgroundColor: gradient,
                    fill: true, // Isi area di bawah garis
                    tension: 0.4, // Kehalusan garis (ketegangan kurva Bezier)
                    pointBackgroundColor: '#6366f1',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: '#6366f1',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 3,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Izinkan grafik mengisi tinggi kontainernya
                scales: {
                    y: { 
                        beginAtZero: true, // Mulai sumbu Y dari nol
                        grid: {
                            display: true,
                            drawBorder: false,
                            color: 'rgba(226, 232, 240, 0.6)', // Garis grid abu-abu muda
                        },
                        ticks: {
                            padding: 10,
                            font: {
                                size: 12
                            },
                            color: '#64748b' // Slate-500 untuk label tick
                        }
                    },
                    x: {
                        grid: {
                            display: false, // Sembunyikan garis grid sumbu X
                            drawBorder: false
                        },
                        ticks: {
                            padding: 10,
                            font: {
                                size: 12
                            },
                            color: '#64748b' // Slate-500 untuk label tick
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Sembunyikan legenda dataset
                    },
                    tooltip: {
                        backgroundColor: '#1e293b', // Latar belakang gelap untuk tooltip
                        titleFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 18
                        },
                        padding: 15,
                        cornerRadius: 8,
                        displayColors: false, // Jangan tampilkan kotak warna di tooltip
                        callbacks: {
                            label: function(context) {
                                return `${context.parsed.y} peminjaman`; // Format label kustom
                            }
                        }
                    }
                },
                interaction: {
                    mode: 'index', // Aktifkan tooltip untuk menampilkan semua dataset pada nilai x tertentu
                    intersect: false, // Tooltip ditampilkan meskipun tidak langsung di atas titik
                },
                animation: {
                    duration: 1200, // Durasi animasi dalam milidetik
                    easing: 'easeOutQuart' // Fungsi easing untuk animasi
                }
            }
        });
    }

    // Fungsi untuk mengganti data grafik berdasarkan periode yang dipilih (Harian, Mingguan, Bulanan, Tahunan)
    function switchChart(type) {
        let labels = [], data = [];

        if (type === 'daily') {
            labels = dailyData.map(row => row.date);
            data = dailyData.map(row => row.total);
        } else if (type === 'weekly') {
            labels = weeklyData.map(row => 'Minggu ' + row.week);
            data = weeklyData.map(row => row.total);
        } else if (type === 'monthly') {
            const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            labels = monthlyData.map(row => monthNames[row.month - 1]);
            data = monthlyData.map(row => row.total);
        } else if (type === 'yearly') {
            labels = yearlyData.map(row => row.year);
            data = yearlyData.map(row => row.total);
        }

        // Buat atau perbarui grafik dengan data baru
        createChart(labels, data, 'Total Peminjaman (' + type.charAt(0).toUpperCase() + type.slice(1) + ')');

        // Perbarui status tombol aktif untuk pemilihan periode grafik
        document.querySelectorAll('.chart-btn').forEach(btn => btn.classList.remove('active'));
        document.getElementById('btn-' + type).classList.add('active');
    }
    
    // Fungsionalitas penggantian tab untuk Permintaan Peminjaman vs. Permintaan Pengembalian
    function switchTab(tab) {
        // Sembunyikan semua konten tab
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Tampilkan konten tab yang dipilih
        document.getElementById('content-' + tab).classList.remove('hidden');
        
        // Perbarui status tombol aktif untuk pemilihan tab
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        document.getElementById('tab-' + tab).classList.add('active');
    }

    // Inisialisasi grafik dan antarmuka saat DOM dimuat sepenuhnya
    document.addEventListener('DOMContentLoaded', function() {
        // Mulai dengan grafik bulanan secara default
        switchChart('monthly');
        
        // AOS.init() sudah dipanggil di main_layout.blade.php, jadi elemen dengan data-aos akan beranimasi saat scroll.
        // Animasi hover kartu yang ada ditangani oleh transisi CSS.
    });
</script>

@endsection
