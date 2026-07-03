@extends('layouts.admin')

@section('title','Nuevo Emprendimiento')

@section('content')

<div class="card card-admin">

    <div class="card-header">

        <h3>

            Nuevo Emprendimiento

        </h3>

    </div>

    <div class="card-body">

        <form
            action="{{ route('admin.emprendimientos.store') }}"
            method="POST">

            @csrf

            @include('admin.emprendimientos._form')

        </form>

    </div>

</div>

@endsection