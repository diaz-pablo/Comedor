@extends('adminlte::page')

@section('title', 'Datos del menú #' . $menu->id)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-uppercase">Datos del menú #{{ $menu->id }}</h1>

        <a href="{{ route('admin.menus.index') }}" class="btn btn-outline-secondary border">
            <span class="text-uppercase font-weight-light">Regresar</span>
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card card-outline card-info">
                <div class="card-body">
                    @if ($menu->images->count() > 1)
                        @include('admin.menus.partials.carousel')
                    @elseif ($menu->images->count() == 1)
                        <img src="{{ url($menu->images->first()->url) }}" alt="" class="img-fluid">
                    @else
                        <p class="text-lg text-center font-weight-light mb-0">
                            El menú no posee imágenes para mostrar.
                        </p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card card-outline card-info">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection

