<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    /**
     * Tampilkan semua data peminjaman.
     */
    public function index()
    {
        $loans = Loan::with(['user', 'item'])->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $loans
        ], 200);
    }

    /**
     * Simpan data peminjaman baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'     => 'required|exists:users,id',
            'item_id'     => 'required|exists:items,id',
            'quantity'    => 'required|integer|min:1',
            'borrowed_at' => 'required|date',
            'status'      => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422);
        }

        $loan = Loan::create($request->only([
            'user_id', 'item_id', 'quantity', 'borrowed_at', 'returned_at', 'status'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Peminjaman berhasil ditambahkan',
            'data'    => $loan
        ], 201);
    }

    /**
     * Tampilkan detail peminjaman tertentu.
     */
    public function show(string $id)
    {
        $loan = Loan::with(['user', 'item'])->find($id);

        if (!$loan) {
            return response()->json([
                'success' => false,
                'message' => 'Data peminjaman tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $loan
        ], 200);
    }

    /**
     * Update data peminjaman.
     */
    public function update(Request $request, string $id)
    {
        $loan = Loan::find($id);

        if (!$loan) {
            return response()->json([
                'success' => false,
                'message' => 'Data peminjaman tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_id'     => 'required|exists:users,id',
            'item_id'     => 'required|exists:items,id',
            'quantity'    => 'required|integer|min:1',
            'borrowed_at' => 'required|date',
            'returned_at' => 'nullable|date',
            'status'      => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422);
        }

        $loan->update($request->only([
            'user_id', 'item_id', 'quantity', 'borrowed_at', 'returned_at', 'status'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Peminjaman berhasil diperbarui',
            'data'    => $loan
        ], 200);
    }

    /**
     * Hapus data peminjaman.
     */
    public function destroy(string $id)
    {
        $loan = Loan::find($id);

        if (!$loan) {
            return response()->json([
                'success' => false,
                'message' => 'Data peminjaman tidak ditemukan'
            ], 404);
        }

        $loan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Peminjaman berhasil dihapus'
        ], 200);
    }
}
