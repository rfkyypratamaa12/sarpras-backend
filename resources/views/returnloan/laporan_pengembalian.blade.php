@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">📄 Laporan Pengembalian Barang</h2>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">#</th>
                <th class="border p-2">Nama Peminjam</th>
                <th class="border p-2">Barang</th>
                <th class="border p-2">Jumlah</th>
                <th class="border p-2">Tanggal Pinjam</th>
                <th class="border p-2">Tanggal Kembali</th>
                <th class="border p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($returns as $loan)
            <tr>
                <td class="border p-2">{{ $loop->iteration }}</td>
                <td class="border p-2">{{ $loan->user->name ?? '-' }}</td>
                <td class="border p-2">{{ $loan->item->name ?? '-' }}</td>
                <td class="border p-2">{{ $loan->quantity }}</td>
                <td class="border p-2">{{ $loan->borrowed_at }}</td>
                <td class="border p-2">{{ $loan->returned_at }}</td>
                <td class="border p-2">{{ ucfirst($loan->status) }}</td>
            </tr>
            @empty
            <tr>
                <td class="border p-2 text-center" colspan="7">Tidak ada data pengembalian</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
