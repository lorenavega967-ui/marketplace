@extends('layouts.admin')

@section('title','Editar Emprendimiento')

@section('content')

<div class="card card-admin">

    <div class="card-header">
        <h3 class="mb-0">Editar Emprendimiento</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.emprendimientos.update', $emprendimiento) }}" method="POST">

            @csrf
            @method('PUT')

            @include('admin.emprendimientos._form')

        </form>

    </div>

</div>

@endsection