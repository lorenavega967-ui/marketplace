@extends('layouts.admin')

@section('title', 'Gestión de Emprendimientos')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="fw-bold">
        Gestión de Emprendimientos
    </h2>

    <a href="{{ route('admin.emprendimientos.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Nuevo Emprendimiento
    </a>

</div>

<form method="GET" class="row g-2 mb-3">

    <div class="col-md-4">

        <input
            type="text"
            name="buscar"
            class="form-control"
            placeholder="Buscar emprendimiento..."
            value="{{ request('buscar') }}">

    </div>

    <div class="col-md-3">

        <select name="estado" class="form-select">

            <option value="">Todos los estados</option>

            <option value="pendiente" {{ request('estado')=='pendiente' ? 'selected' : '' }}>
                Pendiente
            </option>

            <option value="aprobado" {{ request('estado')=='aprobado' ? 'selected' : '' }}>
                Aprobado
            </option>

            <option value="rechazado" {{ request('estado')=='rechazado' ? 'selected' : '' }}>
                Rechazado
            </option>

        </select>

    </div>

    <div class="col-md-3">

        <select name="tipo" class="form-select">

            <option value="">Todos los tipos</option>

            <option value="fijo" {{ request('tipo')=='fijo' ? 'selected' : '' }}>
                Fijo
            </option>

            <option value="ambulante" {{ request('tipo')=='ambulante' ? 'selected' : '' }}>
                Ambulante
            </option>

            <option value="invitado" {{ request('tipo')=='invitado' ? 'selected' : '' }}>
                Invitado
            </option>

        </select>

    </div>

    <div class="col-md-2">

        <button class="btn btn-primary w-100">
            Buscar
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

                    <th>Dueño</th>

                    <th>Categoría</th>

                    <th>Tipo</th>

                    <th>Estado</th>

                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

                @forelse($emprendimientos as $emprendimiento)

                    <tr>

                        <td>{{ $emprendimiento->id }}</td>

                        <td>{{ $emprendimiento->nombre }}</td>

                        <td>
                            {{ $emprendimiento->user?->name ?? $emprendimiento->responsable }}
                        </td>

                        <td>
                            {{ $emprendimiento->categoria?->nombre ?? '-' }}
                        </td>

                        <td>

                            <span class="badge bg-info">

                                {{ ucfirst($emprendimiento->tipo) }}

                            </span>

                        </td>

                        <td>

                            @php
                                $colores = [
                                    'pendiente' => 'warning',
                                    'aprobado' => 'success',
                                    'rechazado' => 'danger'
                                ];
                            @endphp

                            <span class="badge bg-{{ $colores[$emprendimiento->estado] ?? 'secondary' }}">

                                {{ ucfirst($emprendimiento->estado) }}

                            </span>

                        </td>

                        <td>

                            <a href="{{ route('admin.emprendimientos.show', $emprendimiento) }}"
                               class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('admin.emprendimientos.edit', $emprendimiento) }}"
                               class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('admin.emprendimientos.destroy', $emprendimiento) }}"
                                  method="POST"
                                  style="display:inline-block"
                                  onsubmit="return confirm('¿Eliminar este emprendimiento?')">

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

                        <td colspan="7" class="text-center">

                            No hay emprendimientos registrados.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        {{ $emprendimientos->links() }}

    </div>

</div>

@endsection