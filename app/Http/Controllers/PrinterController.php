<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use Illuminate\Http\Request;

class PrinterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $printers = Printer::all();
        return view('materials.printers.index', [
            'printers' => $printers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materials.printers.create');
    }

    public function store(Request $request)
    {
        $printer = Printer::create($request->all());
        return redirect()->route('printers.index');
    }


    public function show(Printer $printer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Printer $printer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Printer $printer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Printer $printer)
    {
        $printer->delete();
        return redirect()->route('printers.index');
    }
}
