@section('plugins.DatePicker', true)
@section('plugins.Select2', true)

<form
    method="POST"
    action="{{ $menu->id ? route('admin.menus.update', $menu) : route('admin.menus.store') }}"
    class="row"
    novalidate
>
    @csrf

    @if ($menu->id)
        @method('PUT')
    @endif

    <div class="col-12 col-md-6">
        <div class="card card-outline {{ $menu->id ? 'card-warning' : 'card-success' }}">
            <div class="card-body">
                <div class="form-group row">
                    <label for="service_at" class="col-12 col-form-label font-weight-light">
                        Fecha del servicio
                    </label>

                    <div class="col-12">
                        <input
                            type="text"
                            id="service_at"
                            name="service_at"
                            class="form-control @error('service_at') is-invalid @enderror font-weight-light"
                            placeholder="Ingresa la fecha del servicio del menú."
                            value="{{ old('service_at', $menu->service_at) }}"
                            autofocus
                        >

                        @include('admin.partials.validation', ['field_name' => 'service_at'])
                    </div>
                </div>

                <div class="form-group row">
                    <label for="starter_id" class="col-12 col-form-label font-weight-light">
                        Plato de entrada
                    </label>

                    <div class="col-12">
                        <select
                            id="starter_id"
                            class="custom-select font-weight-light @error('starter_id') is-invalid @enderror"
                        >
                            <option class="font-weight-light" disabled selected>
                                -- Buscar o Agregar --
                            </option>

                            @foreach($starters as $starter)
                                <option
                                    value="{{ $starter->id }}"
                                    class="font-weight-light"
                                    {{ optional($menu->starter)->id === $starter->id || old('starter_id') === $starter->id ? "selected" : "" }}
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
                        Plato principal
                    </label>

                    <div class="col-12">
                        <select
                            id="main_id"
                            class="custom-select font-weight-light @error('main_id') is-invalid @enderror"
                        >
                            <option class="font-weight-light" disabled selected>
                                -- Buscar o Agregar --
                            </option>

                            @foreach($mains as $main)
                                <option
                                    value="{{ $main->id }}"
                                    class="font-weight-light"
                                    {{ optional($menu->main)->id === $main->id || old('main_id') === $main->id ? "selected" : "" }}
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
                        Postre
                    </label>

                    <div class="col-12">
                        <select
                            id="dessert_id"
                            class="custom-select font-weight-light @error('dessert_id') is-invalid @enderror"
                        >
                            <option class="font-weight-light" disabled selected>
                                -- Buscar o Agregar --
                            </option>

                            @foreach($desserts as $dessert)
                                <option
                                    value="{{ $dessert->id }}"
                                    class="font-weight-light"
                                    {{ optional($menu->dessert)->id === $dessert->id || old('dessert_id') === $dessert->id ? "selected" : "" }}
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
                        Fecha de publicación
                    </label>

                    <div class="col-12">
                        <input
                            type="text"
                            id="publication_at"
                            name="publication_at"
                            class="form-control @error('publication_at') is-invalid @enderror font-weight-light"
                            placeholder="Ingresa la fecha de publicación del menú."
                            value="{{ old('publication_at', $menu->publication_at) }}"
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
                            Cantidad disponible
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
                    <label for="images" class="col-12 col-form-label font-weight-light">
                        Imágenes
                    </label>

                    <div class="col-12">
                        Dropzone.js
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

@section('js')
    <script>
        jQuery(document).ready(function () {
            jQuery('#service_at').datepicker({
                uiLibrary: 'bootstrap4'
            });

            jQuery('#publication_at').datepicker({
                uiLibrary: 'bootstrap4'
            });

            jQuery('#starter_id').select2({
                tags: true
            });

            jQuery('#main_id').select2({
                tags: true
            });

            jQuery('#dessert_id').select2({
                tags: true
            });
        });
    </script>
@endsection
