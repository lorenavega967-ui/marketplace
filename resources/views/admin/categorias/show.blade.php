@extends('layouts.admin')

@section('title','Detalle de Categoría')

@section('content')

<div class="card card-admin">

    <div class="card-header">

        <h3>

            Información de la Categoría

        </h3>

    </div>

    <div class="card-body">

        <table class="table">

            <tr>

                <th>ID</th>

                <td>{{ $categoria->id }}</td>

            </tr>

            <tr>

                <th>Nombre</th>

                <td>{{ $categoria->nombre }}</td>

            </tr>

            <tr>

                <th>Slug</th>

                <td>{{ $categoria->slug }}</td>

            </tr>

            <tr>

                <th>Creada</th>

                <td>{{ $categoria->created_at->format('d/m/Y H:i') }}</td>

            </tr>

        </table>

        <a
            href="{{ route('admin.categorias.index') }}"
            class="btn btn-secondary">

            Volver

        </a>

    </div>

</div>

@endsection