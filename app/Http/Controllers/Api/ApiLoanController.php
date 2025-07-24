<?php

namespace App\Http\Controllers\Api;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApiLoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['user', 'item'])->get();
        return response()->json($loans);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'     => 'required|exists:users,id',
            'item_id'     => 'required|exists:items,id',
            'quantity'    => 'required|integer|min:1',
            'borrowed_at' => 'required|date',
            'status'      => 'required|string|in:borrowed,returned,pending',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $loan = Loan::create($request->all());
        return response()->json($loan, 201);
    }

    public function show($id)
    {
        $loan = Loan::with(['user', 'item'])->find($id);
        if (!$loan) {
            return response()->json(['message' => 'Peminjaman tidak ditemukan'], 404);
        }
        return response()->json($loan);
    }

    public function update(Request $request, $id)
    {
        $loan = Loan::find($id);
        if (!$loan) {
            return response()->json(['message' => 'Peminjaman tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'quantity'    => 'sometimes|integer|min:1',
            'returned_at' => 'nullable|date',
            'status'      => 'sometimes|string|in:borrowed,returned,pending',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $loan->update($request->all());
        return response()->json($loan);
    }

    public function destroy($id)
    {
        $loan = Loan::find($id);
        if (!$loan) {
            return response()->json(['message' => 'Peminjaman tidak ditemukan'], 404);
        }

        $loan->delete();
        return response()->json(['message' => 'Peminjaman berhasil dihapus']);
    }
}
