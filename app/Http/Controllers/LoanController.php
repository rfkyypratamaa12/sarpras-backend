<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['user', 'item'])->latest()->paginate(10);
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $items = Item::all();
        return view('loans.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'borrowed_at' => 'required|date',
            'returned_at' => 'required|date|after:borrowed_at',
        ]);

        Loan::create([
            'user_id' => Auth::id(), // dari login manual
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'borrowed_at' => $request->borrowed_at,
            'returned_at' => $request->returned_at,
            'status' => 'pending',
        ]);

        return redirect()->route('loans.index')->with('success', 'Permintaan peminjaman dikirim dan menunggu persetujuan.');
    }

    public function approve($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->update(['status' => 'approved']);
        return back()->with('success', 'Peminjaman disetujui.');
    }

    public function reject($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->update(['status' => 'rejected']);
        return back()->with('error', 'Peminjaman ditolak.');
    }
}
