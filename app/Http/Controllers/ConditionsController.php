<?php

namespace App\Http\Controllers;

use App\Models\Conditions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.conditions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required|min:3|max:255',
            'inventory_id' => 'required'
        ]);

        if ($validator->fails()) return back()->with('error', $validator)->withInput();

        $validated = $validator->validated();

        Conditions::create([
            'description' => $validated['description'],
            'inventory_id' => $validated['inventory_id'],
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Conditions $conditions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conditions $conditions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conditions $conditions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conditions $conditions)
    {
        //
    }
}
