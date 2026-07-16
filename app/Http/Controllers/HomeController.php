<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Emprendimiento;
use App\Models\Noticia;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $noticias = Noticia::where('estado', 'publicado')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $emprendimientosDestacados = Emprendimiento::where('estado', 'aprobado')
            ->with('categoria')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $productosRecientes = Producto::where('disponible', true)
            ->with('emprendimiento')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $categorias = Categoria::all();

        return view('welcome', compact(
            'noticias',
            'emprendimientosDestacados',
            'productosRecientes',
            'categorias'
        ));
    }

    public function emprendimientos(Request $request)
    {
        $query = Emprendimiento::where('estado', 'aprobado')
            ->with('categoria');

        if ($request->filled('categoria')) {
            $query->where('categoria_id', $request->categoria);
        }

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->filled('buscar')) {
            $query->where(function ($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->buscar . '%')
                  ->orWhere('descripcion', 'like', '%' . $request->buscar . '%')
                  ->orWhere('ubicacion', 'like', '%' . $request->buscar . '%');
            });
        }

        $emprendimientos = $query->paginate(12);
        $categorias = Categoria::all();

        return view('home.emprendimientos', compact('emprendimientos', 'categorias'));
    }

    public function productos(Request $request)
    {
        $query = Producto::where('disponible', true)
            ->with('emprendimiento.categoria');

        if ($request->filled('categoria')) {
            $query->whereHas('emprendimiento', function ($q) use ($request) {
                $q->where('categoria_id', $request->categoria);
            });
        }

        if ($request->filled('tipo')) {
            $query->where('es_combo', $request->tipo === 'combo');
        }

        if ($request->filled('precio_min')) {
            $query->where('precio', '>=', $request->precio_min);
        }

        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->precio_max);
        }

        if ($request->filled('buscar')) {
            $query->where(function ($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->buscar . '%')
                  ->orWhere('descripcion', 'like', '%' . $request->buscar . '%');
            });
        }

        $productos = $query->paginate(12);
        $categorias = Categoria::all();

        return view('home.productos', compact('productos', 'categorias'));
    }

    public function showEmprendimiento($slug)
    {
        $emprendimiento = Emprendimiento::where('slug', $slug)
            ->where('estado', 'aprobado')
            ->with(['categoria', 'productos' => function ($query) {
                $query->where('disponible', true);
            }])
            ->firstOrFail();

        return view('home.emprendimiento-show', compact('emprendimiento'));
    }
}
