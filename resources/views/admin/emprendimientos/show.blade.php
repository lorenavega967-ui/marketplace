@extends('layouts.admin')

@section('title','Detalle del Emprendimiento')

@section('content')

<div class="card card-admin">

    <div class="card-header">
        <h3 class="mb-0">Detalle del Emprendimiento</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th>Nombre</th>
                <td>{{ $emprendimiento->nombre }}</td>
            </tr>

            <tr>
                <th>Responsable</th>
                <td>{{ $emprendimiento->responsable }}</td>
            </tr>

            <tr>
                <th>Dueño</th>
                <td>{{ $emprendimiento->user?->name ?? 'Sin usuario' }}</td>
            </tr>

            <tr>
                <th>Categoría</th>
                <td>{{ $emprendimiento->categoria?->nombre ?? '-' }}</td>
            </tr>

            <tr>
                <th>Tipo</th>
                <td>{{ ucfirst($emprendimiento->tipo) }}</td>
            </tr>

            <tr>
                <th>Estado</th>
                <td>{{ ucfirst($emprendimiento->estado) }}</td>
            </tr>

            <tr>
                <th>Horario</th>
                <td>{{ $emprendimiento->horario }}</td>
            </tr>

            <tr>
                <th>Ubicación</th>
                <td>{{ $emprendimiento->ubicacion }}</td>
            </tr>

            <tr>
                <th>WhatsApp</th>
                <td>{{ $emprendimiento->whatsapp }}</td>
            </tr>

            <tr>
                <th>Instagram</th>
                <td>{{ $emprendimiento->instagram }}</td>
            </tr>

            <tr>
                <th>Descripción</th>
                <td>{{ $emprendimiento->descripcion }}</td>
            </tr>

        </table>

        <a href="{{ route('admin.emprendimientos.index') }}" class="btn btn-secondary">
            Volver
        </a>

    </div>

</div>

@endsection