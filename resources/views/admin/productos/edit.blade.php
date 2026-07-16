@extends('layouts.admin')

@section('title','Editar Producto')

@section('content')

<div class="card card-admin">
    <div class="card-header">
        <h3 class="mb-0">Editar Producto</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.productos.update', $producto) }}" method="POST">
            @csrf
            @method('PUT')

            @include('admin.productos._form')
        </form>
    </div>
</div>

@endsection
