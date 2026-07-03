<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
public function index(Request $request)
{
    $query = User::query();

    //  Busqueda ya sea por correo o nombre.
    if ($request->filled('buscar')) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->buscar . '%')
              ->orWhere('email', 'like', '%' . $request->buscar . '%');
        });
    }

    // Filtro por rol 
    if ($request->filled('rol')) {
        $query->where('rol', $request->rol);
    }

    // Filtro por estado 
    if ($request->filled('estado')) {
        $query->where('activo', $request->estado);
    }

    $usuarios = $query->paginate(10);

    return view('admin.usuarios.index', compact('usuarios'));
}

    public function create()
    {
        return view('admin.usuarios.create');
    }

// Validacion de datos.
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'rol' => 'required',
        'activo' => 'required'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'rol' => $request->rol,
        'activo' => $request->activo
    ]);

    return redirect()->route('admin.usuarios.index')
                     ->with('success', 'Usuario creado correctamente');
}

    public function show(User $usuario)
    {
        return view('admin.usuarios.show', compact('usuario'));
    }

    public function edit(User $usuario)
    {
        return view('admin.usuarios.edit', compact('usuario'));
    }

// metodo para actualizar 
public function update(Request $request, User $usuario)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email,' . $usuario->id,
        'rol' => 'required',
        'activo' => 'required'
    ]);

    $usuario->name = $request->name;
    $usuario->email = $request->email;
    $usuario->rol = $request->rol;
    $usuario->activo = $request->activo;

    //  Solo para cambiar la contraseña si el usuario la escribe
    if ($request->filled('password')) {
        $usuario->password = Hash::make($request->password);
    }

    $usuario->save();

    return redirect()->route('admin.usuarios.index')
                     ->with('success', 'Usuario actualizado correctamente');
}

// metodo para eliminar el usuario 
public function destroy(User $usuario)
{
    $usuario->delete();

    return redirect()->route('admin.usuarios.index')
                     ->with('success', 'Usuario eliminado correctamente');
}
}