@extends('layouts.admin')

@section('title', 'Gestión de Categorías')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="fw-bold">
        Gestión de Categorías
    </h2>

    <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Nueva Categoría
    </a>

</div>

<form method="GET" class="row g-2 mb-3">

    <div class="col-md-10">
        <input
            type="text"
            name="buscar"
            class="form-control"
            placeholder="Buscar categoría..."
            value="{{ request('buscar') }}">
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
                    <th>Slug</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                @forelse($categorias as $categoria)

                    <tr>

                        <td>{{ $categoria->id }}</td>

                        <td>{{ $categoria->nombre }}</td>

                        <td>
                            <span class="badge bg-secondary">
                                {{ $categoria->slug }}
                            </span>
                        </td>

                        <td>

                            <a href="{{ route('admin.categorias.show', $categoria) }}"
                               class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('admin.categorias.edit', $categoria) }}"
                               class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form
                                action="{{ route('admin.categorias.destroy', $categoria) }}"
                                method="POST"
                                style="display:inline-block"
                                onsubmit="return confirm('¿Eliminar esta categoría?')">

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

                        <td colspan="4" class="text-center">
                            No existen categorías registradas.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        {{ $categorias->links() }}

    </div>

</div>

@endsection