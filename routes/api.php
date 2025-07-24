<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\LoanController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ApiLoanController;
use App\Http\Controllers\Api\CategoryController;

Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('loans', ApiLoanController::class);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('users', UserController::class);
});

Route::apiResource('items', ItemController::class);