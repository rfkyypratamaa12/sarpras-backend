<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class LoanReturnReportController extends Controller
{
    public function index()
    {
        $returns = Loan::with(['user', 'item'])
            ->whereNotNull('returned_at') // sudah dikembalikan
            ->latest()
            ->get();

        return view('returnloan.laporan_pengembalian', compact('returns'));
    }
}
