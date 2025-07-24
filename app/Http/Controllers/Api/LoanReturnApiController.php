<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;

class LoanReturnApiController extends Controller
{
    public function index()
    {
        $returns = Loan::with(['user', 'item'])
            ->whereNotNull('returned_at')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data laporan pengembalian',
            'data' => $returns
        ]);
    }
}
