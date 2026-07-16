<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\SolicitudEmprendedor;
use Illuminate\Http\Request;

class SolicitudEmprendedorController extends Controller
{
    public function create()
    {
        $categorias = Categoria::all();
        return view('solicitud-emprendedor.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'nombre_negocio' => 'required|string|max:255',
            'tipo' => 'required|in:fijo,ambulante',
            'categoria_id' => 'nullable|exists:categorias,id',
            'descripcion_negocio' => 'required|string',
            'motivo' => 'required|string',
            'experiencia_previa' => 'nullable|string',
            'imagen_referencial' => 'nullable|string',
        ]);

        SolicitudEmprendedor::create([
            'nombre_completo' => $request->nombre_completo,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'nombre_negocio' => $request->nombre_negocio,
            'tipo' => $request->tipo,
            'categoria_id' => $request->categoria_id,
            'descripcion_negocio' => $request->descripcion_negocio,
            'motivo' => $request->motivo,
            'experiencia_previa' => $request->experiencia_previa,
            'imagen_referencial' => $request->imagen_referencial,
            'estado' => 'pendiente',
        ]);

        return redirect()
            ->route('home')
            ->with('success', 'Tu solicitud ha sido enviada. El administrador revisará tu solicitud.');
    }
}
