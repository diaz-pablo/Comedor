@extends('adminlte::page')

@section('title', 'Datos del menú #' . $menu->id)

@section('plugins.Lightbox', true)

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
                        <h4 class="card-title text-uppercase text-center text-md-left w-100 mb-3">
                            Datos del menú
                        </h4>

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6 font-weight-light text-uppercase text-secondary text-left">
                                        <p>Fecha del servicio</p>
                                    </div>
                                    <div class="col-6 font-weight-light text-right">
                                        <p>{{ \Carbon\Carbon::parse($menu->service_at)->format('d M Y') }}</p>
                                    </div>

                                    <div class="col-6 font-weight-light text-uppercase text-secondary text-left">
                                        <p>Fecha de publicación</p>
                                    </div>
                                    <div class="col-6 font-weight-light text-right">
                                        <p>{{ \Carbon\Carbon::parse($menu->publication_at)->format('d M Y') }}</p>
                                    </div>

                                    <div class="col-6 font-weight-light text-uppercase text-secondary text-left">
                                        <p>Plato de entrada</p>
                                    </div>
                                    <div class="col-6 font-weight-light text-right">
                                        <p>{{ $menu->starter->name }}</p>
                                    </div>

                                    <div class="col-6 font-weight-light text-uppercase text-secondary text-left">
                                        <p>Plato principal</p>
                                    </div>
                                    <div class="col-6 font-weight-light text-right">
                                        <p>{{ $menu->main->name }}</p>
                                    </div>

                                    <div class="col-6 font-weight-light text-uppercase text-secondary text-left">
                                        <p>Postre</p>
                                    </div>
                                    <div class="col-6 font-weight-light text-right">
                                        <p>{{ $menu->dessert->name }}</p>
                                    </div>

                                    <div class="col-6 font-weight-light text-uppercase text-secondary text-left">
                                        <p>Precio</p>
                                    </div>
                                    <div class="col-6 font-weight-light text-right">
                                        <p>$ 5.00</p>
                                    </div>

                                    <div class="col-6 font-weight-light text-uppercase text-secondary text-left">
                                        <p>Cantidad disponible</p>
                                    </div>
                                    <div class="col-6 font-weight-light text-right">
                                        <p>{{ $menu->available_quantity }}</p>
                                    </div>

                                    <hr class="w-100 mt-0">

                                    <div class="col-6 font-weight-light text-uppercase text-secondary text-left">
                                        <p>Fecha de creación</p>
                                    </div>
                                    <div class="col-6 font-weight-light text-right">
                                        <p>{{ $menu->created_at->format('d M Y') }}</p>
                                    </div>

                                    <div class="col-6 font-weight-light text-uppercase text-secondary text-left">
                                        <p>Fecha de actualización</p>
                                    </div>
                                    <div class="col-6 font-weight-light text-right">
                                        <p>{{ $menu->updated_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card card-outline card-info">
                    <div class="card-body row">
                        <h4 class="card-title text-uppercase text-center text-md-left w-100 mb-3">
                            Imágenes del menú
                        </h4>
                        @if ($menu->images->count())
                            @foreach($menu->images as $image)
                                <div class="col-6 col-sm-4">
                                    @include('admin.menus.partials.lightbox')
                                </div>
                            @endforeach

                            <div class="col-12">
                                <p class="font-weight-light text-sm mb-0">Clic en la imagen para ampliarla.</p>
                            </div>
                        @else
                            <p class="font-weight-light text-center text-md-left w-100">
                                No hay imágenes para mostrar, <a href="{{ route('admin.menus.edit', $menu) }}">clic aquí</a> para agregar imágenes.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <script>
        lightbox.option({
            'alwaysShowNavOnTouchDevices': true,
            'albumLabel': 'Imagen %1 de %2',
            'disableScrolling': true,
            'wrapAround': true,
        })
    </script>
@endsection

