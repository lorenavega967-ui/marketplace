@extends('layouts.admin')

@section('title','Nuevo Producto')

@section('content')

<div class="card card-admin">
    <div class="card-header">
        <h3 class="mb-0">Nuevo Producto</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.productos.store') }}" method="POST">
            @csrf

            @include('admin.productos._form')
        </form>
    </div>
</div>

@endsection
