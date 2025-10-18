<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Livewire\store;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categorias = Category::all();
        return view('category.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryName' => 'required|string|max:255',
            'isActive' => 'nullable|boolean',
        ]);
       Category::create($request->all());
       return redirect()->route('category')->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('category.edit',[
            'categoria' => Category::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Category $category)
{
    $validated = $request->validate([
        'categoryName' => ['required','string','max:255'],
        'isActive' => ['nullable','boolean'],
    ]);

    $category->update([
        'categoryName' => $validated['categoryName'],
        'isActive' => (bool) ($validated['isActive'] ?? false),
    ]);

    return redirect()->route('categories.index')->with('success', 'Categoría actualizada.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Category::findOrFail($id);
        $categoria->delete();
        return redirect()->route('category')->with('success', 'Categoría eliminada exitosamente.');
    }
}
