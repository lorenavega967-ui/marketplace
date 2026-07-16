<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $query = Categoria::query();
                // Buscar por nombre
                if ($request->filled('buscar')) {
        $query->where('nombre', 'like', '%' . $request->buscar . '%');
                }
                
        $categorias = $query->orderBy('nombre')
                         ->paginate(10)
                         ->appends($request->query());
                         
         return view('admin.categorias.index', compact('categorias'));
    }

    public function create(){
        return view('admin.categorias.create');
    }

    public function store(Request $request){
    $request->validate([
        'nombre' => 'required|max:50|unique:categorias,nombre'
    ]);

    Categoria::create([
        'nombre' => $request->nombre,
        'slug' => Str::slug($request->nombre)
    ]);

    return redirect()
        ->route('admin.categorias.index')
        ->with('success', 'Categoría creada correctamente.');
    }


    public function show(Categoria $categoria){
    return view('admin.categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria){
    return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria){
    $request->validate([
        'nombre' => 'required|max:50|unique:categorias,nombre,' . $categoria->id
    ]);

    $categoria->update([
        'nombre' => $request->nombre,
        'slug' => Str::slug($request->nombre)
    ]);

    return redirect()
        ->route('admin.categorias.index')
        ->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy(Categoria $categoria){
    $categoria->delete();

    return redirect()
        ->route('admin.categorias.index')
        ->with('success', 'Categoría eliminada correctamente.');
    }
}