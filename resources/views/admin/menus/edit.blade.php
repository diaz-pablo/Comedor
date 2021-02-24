@extends('adminlte::page')

@section('title', 'Editar datos del menú #' . $menu->id)

@section('plugins.DatePicker', true)
@section('plugins.Select2', true)
@section('plugins.Dropzone', true)
@section('plugins.Lightbox', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="text-uppercase">Editar datos del menú #{{ $menu->id }}</h1>
            <p class="font-sm font-weight-light mb-0">* Campos obligatorios.</p>
        </div>

        <a href="{{ route('admin.menus.index') }}" class="btn btn-outline-secondary border">
            <span class="text-uppercase font-weight-light">Cancelar</span>
        </a>
    </div>
@endsection

@section('content')
    @if (session()->has('alert'))
        @include('admin.partials.alert', [
            'alert_color' => session('alert')[0],
            'alert_title' => session('alert')[1],
            'alert_message' => session('alert')[2]
        ])
    @endif

    @if ($menu->images->count())
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-warning">
                    <div class="card-body row">
                        @foreach($menu->images as $image)
                            <div class="col-6 col-sm-3 col-md-2">
                                <form method="POST" action="{{ route('admin.images.destroy', $image) }}">
                                    @csrf @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm position-absolute m-1">
                                        <i class="fas fa-times"></i>
                                    </button>

                                    @include('admin.menus.partials.lightbox')
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('admin.menus.update', $menu) }}"
        class="row"
        enctype="multipart/form-data"
        novalidate
    >
        @csrf @method('PUT')

        <div class="col-12 col-md-6">
            <div class="card card-outline card-warning">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="service_at" class="col-12 col-form-label font-weight-light">
                            Fecha del servicio *
                        </label>

                        <div class="col-12">
                            <input
                                type="text"
                                id="service_at"
                                name="service_at"
                                class="form-control @error('service_at') is-invalid @enderror font-weight-light"
                                placeholder="Ingresa la fecha del servicio del menú."
                                value="{{ old('service_at', $menu->service_at) }}"
                                autocomplete="off"
                            >

                            @include('admin.partials.validation', ['field_name' => 'service_at'])
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="starter_id" class="col-12 col-form-label font-weight-light">
                            Plato de entrada *
                        </label>

                        <div class="col-12">
                            <select
                                id="starter_id"
                                name="starter_id"
                                class="custom-select font-weight-light @error('starter_id') is-invalid @enderror"
                            >
                                <option class="font-weight-light" disabled selected>
                                    - Buscar o Agregar -
                                </option>

                                @foreach($starters as $starter)
                                    <option
                                        value="{{ $starter->id }}"
                                        class="font-weight-light"
                                        {{ optional($menu->starter)->id === $starter->id || intval(old('starter_id')) === $starter->id ? "selected" : "" }}
                                    >
                                        {{ $starter->name }}
                                    </option>
                                @endforeach
                            </select>

                            @include('admin.partials.validation', ['field_name' => 'starter_id'])
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="main_id" class="col-12 col-form-label font-weight-light">
                            Plato principal *
                        </label>

                        <div class="col-12">
                            <select
                                id="main_id"
                                name="main_id"
                                class="custom-select font-weight-light @error('main_id') is-invalid @enderror"
                            >
                                <option class="font-weight-light" disabled selected>
                                    - Buscar o Agregar -
                                </option>

                                @foreach($mains as $main)
                                    <option
                                        value="{{ $main->id }}"
                                        class="font-weight-light"
                                        {{ optional($menu->main)->id === $main->id || intval(old('main_id')) === $main->id ? "selected" : "" }}
                                    >
                                        {{ $main->name }}
                                    </option>
                                @endforeach
                            </select>

                            @include('admin.partials.validation', ['field_name' => 'main_id'])
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dessert_id" class="col-12 col-form-label font-weight-light">
                            Postre *
                        </label>

                        <div class="col-12">
                            <select
                                id="dessert_id"
                                name="dessert_id"
                                class="custom-select font-weight-light @error('dessert_id') is-invalid @enderror"
                            >
                                <option class="font-weight-light" disabled selected>
                                    - Buscar o Agregar -
                                </option>

                                @foreach($desserts as $dessert)
                                    <option
                                        value="{{ $dessert->id }}"
                                        class="font-weight-light"
                                        {{ optional($menu->dessert)->id === $dessert->id || intval(old('dessert_id')) === $dessert->id ? "selected" : "" }}
                                    >
                                        {{ $dessert->name }}
                                    </option>
                                @endforeach
                            </select>

                            @include('admin.partials.validation', ['field_name' => 'dessert_id'])
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card card-outline {{ $menu->id ? 'card-warning' : 'card-success' }}">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="publication_at" class="col-12 col-form-label font-weight-light">
                            Fecha de publicación *
                        </label>

                        <div class="col-12">
                            <input
                                type="text"
                                id="publication_at"
                                name="publication_at"
                                class="form-control @error('publication_at') is-invalid @enderror font-weight-light"
                                placeholder="Ingresa la fecha de publicación del menú."
                                value="{{ old('publication_at', $menu->publication_at) }}"
                                autocomplete="off"
                            >

                            @include('admin.partials.validation', ['field_name' => 'publication_at'])
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <div class="row">
                                <label for="unit_price" class="col-12 col-form-label font-weight-light">
                                    Precio
                                </label>

                                <div class="col-12">
                                    <p class="font-weight-light">
                                        $5,00
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-8">
                            <label for="available_quantity" class="col-12 col-form-label font-weight-light">
                                Cantidad disponible *
                            </label>

                            <div class="col-12">
                                <input
                                    type="text"
                                    id="available_quantity"
                                    name="available_quantity"
                                    class="form-control @error('available_quantity') is-invalid @enderror font-weight-light"
                                    placeholder="Ingresa la cantidad disponible de menús."
                                    value="{{ old('available_quantity', $menu->available_quantity) }}"
                                >

                                @include('admin.partials.validation', ['field_name' => 'available_quantity'])
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-form-label font-weight-light">
                            Imágenes
                        </label>

                        <div class="col-12">
                            <div class="dropzone"></div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button
                        type="submit"
                        class="btn {{ $menu->id ? 'btn-warning' : 'btn-success' }}"
                    >
                        @if ($menu->id)
                            <span class="text-uppercase">Editar menú</span>
                        @else
                            <span class="text-uppercase">Crear menú</span>
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('css')
    <style type="text/css">
        .datepicker {
            padding-left: .75rem;
            padding-right: .75rem;
        }
    </style>
@endsection

@section('js')
    <script>
        jQuery('#service_at').datepicker({
            language: 'es',
            startDate: 'od',
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            daysOfWeekDisabled: '0,6',
            datesDisabled: {!! $datesDisabled !!},
            orientation: 'bottom right',
            clearBtn: true,
            autoclose: true,
        });
    </script>

    <script>
        jQuery('#publication_at').datepicker({
            language: 'es',
            startDate: 'now',
            endDate: '{{ $menu->service_at }}',
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            orientation: 'bottom right',
            clearBtn: true,
            autoclose: true,
        });
    </script>

    <script>
        jQuery('#starter_id').select2({
            tags: true
        });
    </script>

    <script>
        jQuery('#main_id').select2({
            tags: true
        });
    </script>

    <script>
        jQuery('#dessert_id').select2({
            tags: true
        });
    </script>

    <script>
        Dropzone.autoDiscover = false;

        const dropzone = new Dropzone('.dropzone', {
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: '{{ route('admin.menus.images.store', $menu) }}',
            acceptedFiles: 'image/*',
            maxFilesize: 2,
            paramName: 'image',
            dictDefaultMessage: 'Suelta los archivos aquí o haz clic para subirlos.',
        });

        dropzone.on('error', function (file, res) {
            let message = res.errors.image[0];
            jQuery('.dz-error-message:last > span').text(message);
        });
    </script>
@endsection
