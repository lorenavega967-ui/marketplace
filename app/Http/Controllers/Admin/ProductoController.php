<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Emprendimiento;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $query = Producto::with('emprendimiento');

        if ($request->filled('buscar')) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%');
        }

        if ($request->filled('estado')) {
            $query->where('disponible', $request->estado);
        }

        $productos = $query
            ->latest()
            ->paginate(10)
            ->appends($request->query());

        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {
        $emprendimientos = Emprendimiento::orderBy('nombre')->get();

        return view('admin.productos.create', compact('emprendimientos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'emprendimiento_id' => 'required|exists:emprendimientos,id',
            'imagen' => 'nullable|string|max:255',
            'disponible' => 'nullable|boolean',
        ]);

        Producto::create([
            'emprendimiento_id' => $request->emprendimiento_id,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $request->imagen,
            'disponible' => $request->boolean('disponible'),
        ]);

        return redirect()
            ->route('admin.productos.index')
            ->with('success', 'Producto creado correctamente.');
    }

    public function show(Producto $producto)
    {
        $producto->load('emprendimiento');

        return view('admin.productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $emprendimientos = Emprendimiento::orderBy('nombre')->get();

        return view('admin.productos.edit', compact('producto', 'emprendimientos'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'emprendimiento_id' => 'required|exists:emprendimientos,id',
            'imagen' => 'nullable|string|max:255',
            'disponible' => 'nullable|boolean',
        ]);

        $producto->update([
            'emprendimiento_id' => $request->emprendimiento_id,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $request->imagen,
            'disponible' => $request->boolean('disponible'),
        ]);

        return redirect()
            ->route('admin.productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()
            ->route('admin.productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}
