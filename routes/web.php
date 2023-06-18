<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\WarehouseController;

Route::get('/', [AuthController::class, 'check']);

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('auth.login');
Route::post('/login', [AuthController::class, 'attempt'])->middleware('guest')->name('auth.attempt');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        'inventory' => InventoryController::class,
        'warehouse' => WarehouseController::class,
        'history' => HistoryController::class,
    ]);
});
