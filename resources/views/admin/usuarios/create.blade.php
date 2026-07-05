@extends('layouts.admin')

@section('title','Crear Usuario')

@section('content')

<h2 class="mb-4">Crear Usuario</h2>

<div class="card card-admin">
    <div class="card-body">

        <form action="{{ route('admin.usuarios.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Correo</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Rol</label>
                <select name="rol" class="form-select">
                    <option value="admin">Administrador</option>
                    <option value="dueño">Dueño</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Estado</label>
                <select name="activo" class="form-select">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            <button class="btn btn-primary">
                Guardar Usuario
            </button>

            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
</div>

@endsection