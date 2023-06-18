<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        $warehouses = Warehouse::all();
        return view('dashboard', compact('inventories', 'warehouses'));
    }
}
