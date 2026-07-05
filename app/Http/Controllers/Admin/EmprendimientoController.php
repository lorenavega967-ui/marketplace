<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Emprendimiento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EmprendimientoController extends Controller
{
    public function index(Request $request){
    $query = Emprendimiento::with(['user', 'categoria']);

    // Buscar por nombre
    if ($request->filled('buscar')) {
        $query->where('nombre', 'like', '%' . $request->buscar . '%');
    }

    // Filtrar por estado
    if ($request->filled('estado')) {
        $query->where('estado', $request->estado);
    }

    // Filtrar por tipo
    if ($request->filled('tipo')) {
        $query->where('tipo', $request->tipo);
    }

    $emprendimientos = $query
        ->latest()
        ->paginate(10)
        ->appends($request->query());

    return view('admin.emprendimientos.index', compact('emprendimientos'));
    }

    public function create(){
    $usuarios = User::where('rol', 'dueño')
        ->where('activo', true)
        ->orderBy('name')
        ->get();

    $categorias = Categoria::orderBy('nombre')->get();

    return view('admin.emprendimientos.create', compact(
        'usuarios',
        'categorias'
    ));
    }

    public function store(Request $request){
    $request->validate([
        'nombre' => 'required|max:100',
        'categoria_id' => 'nullable|exists:categorias,id',
        'user_id' => 'nullable|exists:users,id',
        'tipo' => 'required|in:fijo,ambulante,invitado',
        'estado' => 'required|in:pendiente,aprobado,rechazado',
        'whatsapp' => 'nullable|max:20',
        'instagram' => 'nullable|max:100',
    ]);

    Emprendimiento::create([

        'user_id' => $request->user_id,

        'categoria_id' => $request->categoria_id,

        'creado_por' => Auth::id(),

        'tipo' => $request->tipo,

        'nombre' => $request->nombre,

        'responsable' => $request->responsable,

        'slug' => Str::slug($request->nombre),

        'descripcion' => $request->descripcion,

        'horario' => $request->horario,

        'ubicacion' => $request->ubicacion,

        'whatsapp' => $request->whatsapp,

        'instagram' => $request->instagram,

        'estado' => $request->estado,

    ]);

    return redirect()
        ->route('admin.emprendimientos.index')
        ->with('success', 'Emprendimiento creado correctamente.');
    }

    public function show(Emprendimiento $emprendimiento){
    $emprendimiento->load(['user', 'categoria', 'creador', 'revisor']);

    return view('admin.emprendimientos.show', compact('emprendimiento'));
    }

    public function edit(Emprendimiento $emprendimiento){
    $usuarios = User::where('rol', 'dueño')
        ->where('activo', true)
        ->orderBy('name')
        ->get();

    $categorias = Categoria::orderBy('nombre')->get();

    return view('admin.emprendimientos.edit', compact(
        'emprendimiento',
        'usuarios',
        'categorias'
    ));}

    public function update(Request $request, Emprendimiento $emprendimiento)
{
    $request->validate([
        'nombre' => 'required|max:100',
        'categoria_id' => 'nullable|exists:categorias,id',
        'user_id' => 'nullable|exists:users,id',
        'tipo' => 'required|in:fijo,ambulante,invitado',
        'estado' => 'required|in:pendiente,aprobado,rechazado',
        'whatsapp' => 'nullable|max:20',
        'instagram' => 'nullable|max:100',
    ]);

    $datos = $request->only([
        'user_id',
        'categoria_id',
        'tipo',
        'nombre',
        'responsable',
        'descripcion',
        'horario',
        'ubicacion',
        'whatsapp',
        'instagram',
        'estado',
        'motivo_rechazo',
    ]);

    $datos['slug'] = Str::slug($request->nombre);

    // Si cambia el estado, registramos quién revisó el emprendimiento
    if ($request->estado !== 'pendiente') {
      $datos['revisado_por'] = Auth::id();
    }

    $emprendimiento->update($datos);

    return redirect()
        ->route('admin.emprendimientos.index')
        ->with('success', 'Emprendimiento actualizado correctamente.');
    }

    public function destroy(Emprendimiento $emprendimiento){
    $emprendimiento->delete();

    return redirect()
        ->route('admin.emprendimientos.index')
        ->with('success', 'Emprendimiento eliminado correctamente.');
    }
}