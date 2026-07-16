@extends('layouts.admin')

@section('title','Editar Categoría')

@section('content')

<div class="card card-admin">

    <div class="card-header">

        <h3 class="mb-0">

            Editar Categoría

        </h3>

    </div>

    <div class="card-body">

        <form
            action="{{ route('admin.categorias.update',$categoria) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('admin.categorias._form')

        </form>

    </div>

</div>

@endsection