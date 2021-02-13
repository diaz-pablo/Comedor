@extends('adminlte::page')

@section('title', 'Crear estudiante')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-uppercase">Crear estudiante</h1>

        <a href="{{ route('admin.students.index') }}" class="btn btn-outline-secondary border">
            <span class="text-uppercase font-weight-light">Cancelar</span>
        </a>
    </div>
@endsection

@section('content')
    @include('admin.students.partials.form')
@endsection

