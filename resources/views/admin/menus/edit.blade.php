@extends('adminlte::page')

@section('title', 'Editar datos del menú #' . $menu->id)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-uppercase">Crear menú</h1>

        <a href="{{ route('admin.menus.index') }}" class="btn btn-outline-secondary border">
            <span class="text-uppercase font-weight-light">Cancelar</span>
        </a>
    </div>
@endsection

@section('content')
    @include('admin.menus.partials.form')
@endsection
