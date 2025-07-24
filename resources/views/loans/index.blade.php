@extends('layouts.app')

@section('title', 'Manajemen Peminjaman')

@section('icon')
    <i class="fas fa-exchange-alt gold-text"></i>
@endsection

@section('breadcrumb', 'Manajemen Peminjaman')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-exchange-alt gold-text mr-3"></i>
                    <span>Manajemen Peminjaman Barang</span>
                </h1>
                <p class="text-gray-600 mt-1">Daftar permohonan peminjaman barang inventaris</p>
            </div>
            <a href="{{ route('loans.create') }}"
                class="gold-gradient hover:opacity-90 text-white px-5 py-2.5 rounded-lg flex items-center transition-all transform hover:scale-[1.02]">
                <i class="fas fa-plus mr-2"></i> Ajukan Peminjaman
            </a>
        </div>

        <!-- Loans Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Peminjam
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Barang
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jumlah
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Pinjam
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Kembali
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($loans as $loan)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <!-- Peminjam Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $loan->user->name ?? 'User dihapus' }}
                                            </div>
                                            <div class="text-xs text-gray-500">{{ $loan->user->email ?? '' }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Barang Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if ($loan->item->photo)
                                            <img src="{{ asset('storage/' . $loan->item->photo) }}" alt="Foto Barang"
                                                class="h-10 w-10 rounded-md object-cover mr-3">
                                        @else
                                            <div
                                                class="h-10 w-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 mr-3">
                                                <i class="fas fa-box"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $loan->item->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $loan->item->category->name }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Jumlah Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                        {{ $loan->quantity }}
                                    </span>
                                </td>

                                <!-- Tanggal Pinjam Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ \Carbon\Carbon::parse($loan->borrowed_at)->format('d M Y') }}
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($loan->borrowed_at)->format('H:i') }}
                                    </div>
                                </td>

                                <!-- Tanggal Kembali Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($loan->returned_at)
                                        <div class="text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($loan->returned_at)->format('d M Y') }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ \Carbon\Carbon::parse($loan->returned_at)->format('H:i') }}
                                        </div>
                                    @else
                                        <span class="text-sm text-gray-400">-</span>
                                    @endif
                                </td>

                                <!-- Status Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($loan->status == 'pending')
                                        <span
                                            class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800 flex items-center">
                                            <i class="fas fa-clock mr-1 text-xs"></i> Menunggu
                                        </span>
                                    @elseif($loan->status == 'approved')
                                        <span
                                            class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 flex items-center">
                                            <i class="fas fa-check-circle mr-1 text-xs"></i> Disetujui
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 flex items-center">
                                            <i class="fas fa-times-circle mr-1 text-xs"></i> Ditolak
                                        </span>
                                    @endif
                                </td>

                                <!-- Aksi Column -->
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    @if ($loan->status == 'pending')
                                        <div class="flex space-x-2 justify-end">
                                            <form method="POST" action="{{ route('loans.approve', $loan->id) }}">
                                                @csrf
                                                <button type="submit"
                                                    class="text-green-600 hover:text-green-800 bg-green-50 hover:bg-green-100 px-3 py-1.5 rounded-lg inline-flex items-center transition-all">
                                                    <i class="fas fa-check mr-1 text-sm"></i> Setujui
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('loans.reject', $loan->id) }}">
                                                @csrf
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg inline-flex items-center transition-all">
                                                    <i class="fas fa-times mr-1 text-sm"></i> Tolak
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-gray-400 text-sm">Selesai diproses</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="bg-gray-50 rounded-xl p-8 max-w-md mx-auto">
                                        <div
                                            class="gold-gradient rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                            <i class="fas fa-exchange-alt text-white text-2xl"></i>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Peminjaman</h3>
                                        <p class="text-gray-500 mb-6">Tidak ada data peminjaman barang saat ini</p>
                                        <a href="{{ route('loans.create') }}"
                                            class="gold-gradient hover:opacity-90 text-white px-5 py-2.5 rounded-lg inline-flex items-center transition-all transform hover:scale-[1.02]">
                                            <i class="fas fa-plus mr-2"></i> Ajukan Peminjaman Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($loans->hasPages())
                <div class="bg-white px-6 py-4 border-t border-gray-100">
                    {{ $loans->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
