@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<h2 class="fw-bold mb-4">
    Panel de Administración
</h2>

<div class="row">

    <div class="col-md-3 mb-4">

        <div class="card shadow-sm border-0">

            <div class="card-body text-center">

                <i class="bi bi-people-fill fs-1 text-primary"></i>

                <h3 class="mt-3">
                    {{ $totalUsuarios }}
                </h3>

                <p class="mb-0">
                    Usuarios
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card shadow-sm border-0">

            <div class="card-body text-center">

                <i class="bi bi-tags-fill fs-1 text-success"></i>

                <h3 class="mt-3">
                    {{ $totalCategorias }}
                </h3>

                <p class="mb-0">
                    Categorías
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card shadow-sm border-0">

            <div class="card-body text-center">

                <i class="bi bi-shop fs-1 text-warning"></i>

                <h3 class="mt-3">
                    {{ $totalEmprendimientos }}
                </h3>

                <p class="mb-0">
                    Emprendimientos
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card shadow-sm border-0">

            <div class="card-body text-center">

                <i class="bi bi-box-seam fs-1 text-danger"></i>

                <h3 class="mt-3">
                    {{ $totalProductos }}
                </h3>

                <p class="mb-0">
                    Productos
                </p>

            </div>

        </div>

    </div>

</div>

@endsection