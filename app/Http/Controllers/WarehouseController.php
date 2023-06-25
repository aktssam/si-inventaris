<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('features.warehouse.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255'
        ]);

        if ($validator->fails()) return back()->with('error', $validator)->withInput();

        Warehouse::create($validator->validate());
        return redirect('warehouse')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        $warehouse = Warehouse::findOrFail($warehouse->id);
        $inventories = $warehouse->inventories->load('warehouse');
        return view('features.warehouse.show', compact('warehouse', 'inventories'));
    }

    public function printAll()
    {
        $warehouses = Warehouse::all();
        return view('features.print.warehouses', compact('warehouses'));
    }

    public function print(Warehouse $warehouse)
    {
        $warehouse = Warehouse::findOrFail($warehouse->id);
        $inventories = $warehouse->inventories->load('warehouse');
        return view('features.print.warehouse', compact('warehouse', 'inventories'));
    }

    public function printModal(Request $request)
    {
        $warehouse = Warehouse::findOrFail($request->warehouse_id ?? 1);
        $inventories = $warehouse->inventories->load('warehouse');
        return redirect(route('print.warehouse', compact('warehouse')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }
}
