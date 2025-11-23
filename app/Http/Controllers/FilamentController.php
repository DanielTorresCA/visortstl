<?php

namespace App\Http\Controllers;

use App\Models\Filament;
use Illuminate\Http\Request;

class FilamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filaments = Filament::all();
        return view('materials.filaments.index', compact('filaments'));
    }

    public function create()
    {
       return view('materials.filaments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'color' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'startWeight' => 'required|numeric',
            'brand' => 'required|string|max:100',
            'quantity' => 'required|integer|min:1'
        ]);
        $validatedData['actualWeight'] = $validatedData['startWeight'];

        Filament::create($validatedData);

        return redirect()->route('filaments.index')->with('success', 'Filamento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Filament $filament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filament $filament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filament $filament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $filament = Filament::findOrFail($id);
        $filament->delete();
        return redirect()->route('filaments.index')->with('success', 'Filamento eliminado exitosamente.');
    }
}
