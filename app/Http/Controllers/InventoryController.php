<?php

namespace App\Http\Controllers;

use App\Models\Conditions;
use App\Models\Inventory;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::with('warehouse')->get();
        return view('features.inventory.index', compact('inventories'));
    }

    public function create(Request $request)
    {
        $warehouses = Warehouse::all();
        $selected_warehouse_id = $request->selected_warehouse_id;
        return view('features.inventory.create', compact('warehouses', 'selected_warehouse_id'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'warehouse_id' => 'required',
            'check_in' => 'nullable|date',
            'check_out' => 'nullable|date',
            'price' => 'nullable|numeric',
        ]);

        if ($validator->fails()) return back()->with('error', $validator)->withInput();

        $validated = $validator->validated();

        Inventory::create([
            'uid' => Str::random(10),
            'name' => $validated['name'],
            'warehouse_id' => $validated['warehouse_id'],
            'check_in' => $validated['check_in'] ?? Date::now(),
            'check_out' => $validated['check_out'],
            'price' => $validated['price']
        ]);

        return redirect('inventory')->with('success', 'Berhasil menambahkan data');
    }

    public function show(Inventory $inventory)
    {
        $conditions = Conditions::where('inventory_id', $inventory->id)->latest()->get();
        return view('features.inventory.show', compact('inventory', 'conditions'));
    }

    public function edit(Inventory $inventory)
    {
        $warehouses = Warehouse::all();
        return view('features.inventory.edit', compact('inventory', 'warehouses'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'warehouse_id' => 'required',
            'price' => 'nullable|numeric',
            'check_in' => 'nullable|date',
            'check_out' => 'nullable|date',
            'status' => 'required'
        ]);

        if ($validator->fails()) return back()->with('error', $validator)->withInput();

        $validated = $validator->validated();

        $inventory->update($validated);
        return redirect()->route('inventory.show', compact('inventory'))->with('success', 'Berhasil mengubah data');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->conditions()->delete();
        $inventory->delete();
        return redirect('inventory')->with('warning', 'Data berhasil dihapus');
    }

    public function printAll()
    {
        $inventories = Inventory::with('warehouse')->get();
        return view('features.print.inventories', compact('inventories'));
    }

    public function print(Inventory $inventory)
    {
        $inventory = Inventory::findOrFail($inventory->id);
        return view('features.print.inventory', compact('inventory'));
    }
}
