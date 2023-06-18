<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventory.index', compact('inventories'));
    }

    public function create(Request $request)
    {
        $warehouses = Warehouse::all();
        $selected_warehouse_id = $request->selected_warehouse_id;
        return view('inventory.create', compact('warehouses', 'selected_warehouse_id'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'warehouse_id' => 'required',
        ]);

        if ($validator->fails()) return back()->with('error', $validator)->withInput();

        $validated = $validator->validated();

        Inventory::create([
            'uid' => Str::random(10),
            'name' => $validated['name'],
            'warehouse_id' => $validated['warehouse_id'],
        ]);

        return redirect('inventory')->with('success', 'Berhasil menambahkan data');
    }

    public function show(Inventory $inventory)
    {
        $inventory = Inventory::findOrFail($inventory->id);
        return view('inventory.show', compact('inventory'));
    }

    public function edit(Inventory $inventory)
    {
        $warehouses = Warehouse::all();
        return view('inventory.edit', compact('inventory', 'warehouses'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'warehouse_id' => 'required',
        ]);

        if ($validator->fails()) return back()->with('error', $validator)->withInput();

        $validated = $validator->validated();

        Inventory::findOrFail($inventory->id)->update($validated);
        return redirect('inventory')->with('success', 'Berhasil mengubah data');
    }

    public function destroy(Inventory $inventory)
    {
        Inventory::destroy($inventory->id);
        return redirect('inventory')->with('warning', 'Data berhasil dihapus');
    }
}
