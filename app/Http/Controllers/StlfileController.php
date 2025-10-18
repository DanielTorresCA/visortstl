<?php

namespace App\Http\Controllers;

use App\Models\Stlfile;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\StoreStlfileRequest;
use Illuminate\Support\Facades\Log;
class StlfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stlfile.index', [
            'stlfiles' => Stlfile::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('stlfile.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStlfileRequest $request)
    {
        // 1) Validación (StoreStlfileRequest)
        // 2) Preparamos disco/carpeta
        $disk = 'public';             // public = storage/app/public
        $dir  = 'uploads/stls';       // carpeta destino

        // 3) Tomamos el archivo
        $file = $request->file('file');
    
        $original = $file->getClientOriginalName();             // ej: pieza_super.stl
        $ext      = $file->getClientOriginalExtension();        // stl
        $base     = pathinfo($original, PATHINFO_FILENAME);     // pieza_super
        $stored   = Str::slug($base) . '-' . now()->format('YmdHis') . '.' . $ext;

        // 5) Guardamos el archivo con nuestro nombre
        $path = $file->storeAs($dir, $stored, $disk);           // ej: uploads/stls/pieza-super-20251005.stl
    
        // 6) Persistimos en BD
        Stlfile::create([   
            'fileName'    => $request->filled('displayName') ? $request->displayName : $original,
            'filePath'    => $path,                            // guardamos ruta relativa
            'category_id' => $request->input('category_id'),
            'isActive'    => (bool) $request->input('isActive', true),
        ]);
      

        return redirect()->route('stls.index')->with('success', 'Archivo STL subido correctamente.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Stlfile $stlfile)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stlfile $stlfile)
    {
        $categories = Category::all();
        return view('stlfile.edit', compact('stlfile','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stlfile $stlfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stlfile $stlfile)
    {
        // 1) Borramos el archivo físico
        Storage::disk('public')->delete($stlfile->filePath);

        // 2) Borramos el registro de la BD
        $stlfile->delete();

        return redirect()->route('stls.index')->with('success', 'Archivo STL eliminado correctamente.');
    }
}
