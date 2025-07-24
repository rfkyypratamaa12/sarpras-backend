<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Loan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $itemCount = Item::count();
        $userCount = User::where('role', 'user')->count();
        $loanCount = Loan::count();

        return view('dashboard', compact('categoryCount', 'itemCount', 'userCount', 'loanCount'));
    }
}
