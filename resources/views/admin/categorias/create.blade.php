@extends('layouts.admin')

@section('title','Nueva Categoría')

@section('content')

<div class="card card-admin">

    <div class="card-header">

        <h3 class="mb-0">

            Nueva Categoría

        </h3>

    </div>

    <div class="card-body">

        <form
            action="{{ route('admin.categorias.store') }}"
            method="POST">

            @csrf

            @include('admin.categorias._form')

        </form>

    </div>

</div>

@endsection