@extends('layouts.admin')

@section('title','Gestión de Usuarios')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="fw-bold">
        Gestión de Usuarios
    </h2>


    <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>

        Nuevo Usuario

    </a>

</div>
<form method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text"
               name="buscar"
               class="form-control"
               placeholder="Buscar por nombre o correo"
               value="{{ request('buscar') }}">
        </div>
        <div class="col-md-3">
            <select name="rol" class="form-select">
                <option value="">Todos los roles</option>
                <option value="admin" {{ request('rol') == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="dueño" {{ request('rol') == 'dueño' ? 'selected' : '' }}>Dueño</option>
            </select>
        </div>
        
        <div class="col-md-3">
            <select name="estado" class="form-select">
                <option value="">Todos</option>
                <option value="1" {{ request('estado')=='1'?'selected':'' }}>Activo</option>
                <option value="0" {{ request('estado')=='0'?'selected':'' }}>Inactivo</option>
            </select>
        </div>
        
        <div class="col-md-2">
            <button class="btn btn-primary w-100">
                 Filtrar
            </button>
        </div>

    </form>
<div class="card card-admin">

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Nombre</th>

                    <th>Correo</th>

                    <th>Rol</th>

                    <th>Estado</th>

                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

                @forelse($usuarios as $usuario)

                    <tr>

                        <td>{{ $usuario->id }}</td>

                        <td>{{ $usuario->name }}</td>

                        <td>{{ $usuario->email }}</td>

                        <td>

                            <span class="badge bg-primary">

                                {{ ucfirst($usuario->rol) }}

                            </span>

                        </td>

                        <td>

                            @if($usuario->activo)

                                <span class="badge bg-success">

                                    Activo

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Inactivo

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('admin.usuarios.show',$usuario) }}"
                               class="btn btn-info btn-sm">

                                <i class="bi bi-eye"></i>

                            </a>

                            <a href="{{ route('admin.usuarios.edit',$usuario) }}"
                               class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil"></i>

                            </a>
                            <form action="{{ route('admin.usuarios.destroy', $usuario) }}"
                                method="POST"
                                style="display:inline-block"
                                onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">

                                 @csrf
                                 @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                 <i class="bi bi-trash"></i>
                                </button>

                            </form>
                    

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            No existen usuarios registrados.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        {{ $usuarios->appends(request()->query())->links() }}

    </div>

</div>

@endsection