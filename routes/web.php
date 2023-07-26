<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConditionsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\WarehouseController;
use App\Models\Conditions;
use App\Models\History;
use App\Models\Warehouse;

Route::get('/', [AuthController::class, 'check']);

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('auth.login');
Route::post('/login', [AuthController::class, 'attempt'])->middleware('guest')->name('auth.attempt');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/print', [DashboardController::class, 'print'])->name('dashboard.print');

    Route::get('/inventory/print', [InventoryController::class, 'printAll'])->name('print.inventory.all');
    Route::get('/inventory/{inventory}/print', [InventoryController::class, 'print'])->name('print.inventory');
    Route::get('/warehouse/print', [WarehouseController::class, 'printAll'])->name('print.warehouse.all');
    Route::post('/warehouse/print', [WarehouseController::class, 'printModal'])->name('print.warehouse.modal');
    Route::get('/warehouse/{warehouse}/print', [WarehouseController::class, 'print'])->name('print.warehouse');
    Route::delete('/history/delete/all', [HistoryController::class, 'deleteAll'])->name('history.delete.all');

    Route::resources([
        'inventory' => InventoryController::class,
        'warehouse' => WarehouseController::class,
        'history' => HistoryController::class,
        'conditions' => ConditionsController::class
    ]);

    Route::view('/scanner', 'features.scanner.index')->name('dashboard.scanner');
});
