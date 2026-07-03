@extends('layouts.admin')

@section('title', 'Gestion de Productos')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Gestion de Productos</h2>

    <a href="{{ route('admin.productos.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Nuevo Producto
    </a>
</div>

<form method="GET" class="row g-2 mb-3">
    <div class="col-md-6">
        <input type="text"
               name="buscar"
               class="form-control"
               placeholder="Buscar producto..."
               value="{{ request('buscar') }}">
    </div>

    <div class="col-md-4">
        <select name="estado" class="form-select">
            <option value="">Todos los estados</option>
            <option value="1" {{ request('estado') === '1' ? 'selected' : '' }}>Disponible</option>
            <option value="0" {{ request('estado') === '0' ? 'selected' : '' }}>No disponible</option>
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
                    <th>Producto</th>
                    <th>Emprendimiento</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->emprendimiento?->nombre ?? '-' }}</td>
                        <td>${{ number_format($producto->precio, 2) }}</td>
                        <td>
                            @if($producto->disponible)
                                <span class="badge bg-success">Disponible</span>
                            @else
                                <span class="badge bg-secondary">No disponible</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.productos.show', $producto) }}"
                               class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('admin.productos.edit', $producto) }}"
                               class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('admin.productos.destroy', $producto) }}"
                                  method="POST"
                                  style="display:inline-block"
                                  onsubmit="return confirm('Eliminar este producto?')">
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
                            No hay productos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $productos->links() }}
    </div>
</div>

@endsection
