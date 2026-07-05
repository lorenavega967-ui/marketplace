@extends('layouts.admin')

@section('title','Editar Usuario')

@section('content')

<h2 class="mb-4">Editar Usuario</h2>

<div class="card card-admin">
    <div class="card-body">

        <form action="{{ route('admin.usuarios.update', $usuario) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $usuario->name }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Correo</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ $usuario->email }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Nueva contraseña (opcional)</label>
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Dejar vacío si no cambiará">
            </div>

            <div class="mb-3">
                <label>Rol</label>
                    <select name="rol" class="form-select">
                        <option value="admin" {{ $usuario->rol == 'admin' ? 'selected' : '' }}> Administrador</option>
                        <option value="dueño" {{ $usuario->rol == 'dueño' ? 'selected' : '' }}>Dueño</option>
                    </select>
            </div>

            <div class="mb-3">
                <label>Estado</label>
                <select name="activo" class="form-select">
                    <option value="1" {{ $usuario->activo==1?'selected':'' }}>Activo</option>
                    <option value="0" {{ $usuario->activo==0?'selected':'' }}>Inactivo</option>
                </select>
            </div>

            <button class="btn btn-warning">
                Actualizar
            </button>

            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
</div>

@endsection