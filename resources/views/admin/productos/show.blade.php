@extends('layouts.admin')

@section('title','Detalle del Producto')

@section('content')

<div class="card card-admin">
    <div class="card-header">
        <h3 class="mb-0">Detalle del Producto</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $producto->id }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $producto->nombre }}</td>
            </tr>
            <tr>
                <th>Emprendimiento</th>
                <td>{{ $producto->emprendimiento?->nombre ?? '-' }}</td>
            </tr>
            <tr>
                <th>Precio</th>
                <td>${{ number_format($producto->precio, 2) }}</td>
            </tr>
            <tr>
                <th>Estado</th>
                <td>{{ $producto->disponible ? 'Disponible' : 'No disponible' }}</td>
            </tr>
            <tr>
                <th>Imagen</th>
                <td>{{ $producto->imagen ?? '-' }}</td>
            </tr>
            <tr>
                <th>Descripcion</th>
                <td>{{ $producto->descripcion ?? '-' }}</td>
            </tr>
        </table>

        <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>
</div>

@endsection
