@extends('adminlte::page')

@section('title', 'Crear estudiante')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="text-uppercase">Crear estudiante</h1>

            <p class="font-sm font-weight-light mb-0">* Campos obligatorios.</p>
        </div>

        <a href="{{ route('admin.students.index') }}" class="btn btn-outline-secondary border">
            <span class="text-uppercase font-weight-light">Cancelar</span>
        </a>
    </div>
@endsection

@section('content')
    @include('admin.students.partials.form')
@endsection

