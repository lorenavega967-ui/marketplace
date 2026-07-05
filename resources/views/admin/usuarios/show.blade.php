@extends('layouts.admin')

@section('title','Detalle Usuario')

@section('content')

<h2>Detalle del Usuario</h2>

<div class="card card-admin">
    <div class="card-body">

        <p><strong>ID:</strong> {{ $usuario->id }}</p>
        <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Rol:</strong> {{ $usuario->rol }}</p>
        <p><strong>Estado:</strong> {{ $usuario->activo ? 'Activo' : 'Inactivo' }}</p>

        <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">
            Volver
        </a>

    </div>
</div>

@endsection