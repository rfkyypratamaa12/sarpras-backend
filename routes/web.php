<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanReturnReportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    // Route dashboard & lainnya
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route manajemen pengguna
    Route::resource('users', UserController::class);
    Route::resource('users', UserController::class);
});


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('items', ItemController::class);
    Route::resource('loans', LoanController::class)->only(['index', 'create', 'store']);
    Route::post('/loans/{id}/approve', [LoanController::class, 'approve'])->name('loans.approve');
    Route::post('/loans/{id}/reject', [LoanController::class, 'reject'])->name('loans.reject');
    Route::get('/laporan/pengembalian', [LoanReturnReportController::class, 'index'])->name('laporan.pengembalian');
    Route::resource('users', UserController::class);
});
