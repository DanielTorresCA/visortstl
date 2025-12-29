<?php

namespace App\Http\Controllers;

use App\Models\Proyect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Printer;
use App\Models\Filament;


class ProyectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyects = Proyect::all();
        $proyects->load('user');
        return view('proyect.index', compact('proyects'));
    }

    public function create()
    {
        $printers = Printer::all();
        $filaments = Filament::all();
        return view('proyect.create', compact('printers', 'filaments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'customer' => 'string|max:255',
            'description' => 'nullable|string',
            'status' => 'in:pendiente,completado,cancelado|required|string',
            'deadline' => 'date',
            'completed_at' => 'nullable|date',
            'price' => 'numeric',
            'printTime' => 'numeric',
            'materialUsed' => 'numeric',
            'isFail' => 'nullable|boolean',
            'printer_id' => 'exists:printers,id',
            'filament_id' => 'exists:filaments,id',

        ]);
        $iduser = auth()->id();
        $proyect = Proyect::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'deadline' => $request->deadline,
            'user_id' => $iduser,
            'customer' => $request->customer,
            'price' => $request->price,
            'printTime' => $request->printTime,
            'materialUsed' => $request->materialUsed,
        ]);
        return redirect()->route('proyects.index')->with('success', 'Proyecto creado exitosamente.');
    }

    public function show(Proyect $proyect)
    {

    }
    public function edit(Proyect $proyect)
    {
        //
    }

    public function update(Request $request, Proyect $proyect)
    {
        //
    }
    public function destroy(string $id)
    {
        $proyect = Proyect::findOrFail($id);
        $proyect->delete();
        return redirect()->route('proyects.index')->with('success', 'Proyecto eliminado exitosamente.');
    }

    public function entregarProyect(string $id)
    {
        $proyect = Proyect::findOrFail($id);
        $proyect->status = 'completado';
        $proyect->completed_at = now();
        $proyect->save();
        return redirect()->route('proyects.index')->with('success', 'Proyecto marcado como entregado.');
    }
    public function cancelarProyect(string $id)
    {
        $proyect = Proyect::findOrFail($id);
        $proyect->status = 'cancelado';
        $proyect->save();
        return redirect()->route('proyects.index')->with('success', 'Proyecto marcado como cancelado.');

    }

}
