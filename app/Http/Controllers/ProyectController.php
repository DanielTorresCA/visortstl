<?php

namespace App\Http\Controllers;

use App\Models\Proyect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProyectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyects = Proyect::all();
        return view('proyect.index', compact('proyects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyect.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
           $request->validate([
            'name' => 'required|string|max:255',
            'customer'=>'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
            'deadline' => 'nullable|date',
            'completed_at' => 'nullable|date',
            'price'=>'nullable|numeric',
        ]);
        $iduser = auth()->id();
        Proyect::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'deadline' => $request->deadline,
            'user_id' => $iduser,
            'customer' => $request->customer,
            'price' => $request->price,
        ]);
        return redirect()->route('proyects.index')->with('success', 'Proyecto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyect $proyect)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyect $proyect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyect $proyect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyect = Proyect::findOrFail($id);
        $proyect->delete();
        return redirect()->route('proyects.index')->with('success', 'Proyecto eliminado exitosamente.');
    }
}
