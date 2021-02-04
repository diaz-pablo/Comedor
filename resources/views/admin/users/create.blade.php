@extends('adminlte::page')

@section('title', 'Crear usuario')

@section('plugins.BsStepper', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Crear usuario</h1>

        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary border">
            <i class="fas fa-arrow-left"></i> Cancelar
        </a>
    </div>
@stop

@section('content')
    <form method="POST" action="{{ route('admin.users.store') }}" class="row" novalidate>
        @csrf

        @if (session()->has('errors'))
            @include('admin.partials.alert', [
                'alert_color' => 'danger',
                'alert_title' => '¡Ups, ocurrió un error!',
                'alert_message' => 'Por favor revisa todos los campos antes de crear al usuario.'
            ])
        @endif

        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div id="stepper" class="bs-stepper">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#personal-information">
                                <button type="button" class="btn step-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Datos personales</span>
                                </button>
                            </div>

                            <div class="line"></div>

                            <div class="step" data-target="#account-data">
                                <button type="button" class="btn step-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Datos de la cuenta</span>
                                </button>
                            </div>
                        </div>

                        <div class="bs-stepper-content">
                            <div id="personal-information" class="content">
                                <div class="form-group row">
                                    <label for="document_number" class="col-12 col-md-4 col-form-label text-muted">
                                        Número de documento
                                    </label>

                                    <div class="col-12 col-md-8">
                                        <input
                                            type="text"
                                            id="document_number"
                                            name="document_number"
                                            class="form-control @error('document_number') is-invalid @enderror"
                                            placeholder="Ingresa el número de documento."
                                            value="{{ old('document_number') }}"
                                        >

                                        @include('admin.partials.validation', ['field_name' => 'document_number'])
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="surname" class="col-12 col-md-4 col-form-label text-muted">
                                        Apellido
                                    </label>

                                    <div class="col-12 col-md-8">
                                        <input
                                            type="text"
                                            id="surname"
                                            name="surname"
                                            class="form-control @error('surname') is-invalid @enderror"
                                            placeholder="Ingresa el apellido."
                                            value="{{ old('surname') }}"
                                        >

                                        @include('admin.partials.validation', ['field_name' => 'surname'])
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-12 col-md-4 col-form-label text-muted">
                                        Nombre
                                    </label>

                                    <div class="col-12 col-md-8">
                                        <input
                                            type="text"
                                            id="name"
                                            name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Ingresa el nombre."
                                            value="{{ old('name') }}"
                                        >

                                        @include('admin.partials.validation', ['field_name' => 'name'])
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <button
                                            type="button"
                                            id="next"
                                            class="btn btn-outline-secondary btn-block border"
                                        >
                                            Ir al Paso 2 <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id="account-data" class="content">
                                <div class="form-group row">
                                    <label for="email" class="col-12 col-md-4 col-form-label text-muted">
                                        Correo electrónico
                                    </label>

                                    <div class="col-12 col-md-8">
                                        <input
                                            type="text"
                                            id="email"
                                            name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Ingresa el correo electrónico."
                                            value="{{ old('email') }}"
                                        >

                                        @include('admin.partials.validation', ['field_name' => 'email'])
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-md-4"></div>

                                    <div class="col-12 col-md-8">
                                        <p class="text-secondary text-sm mb-0">
                                            Se generará una contraseña de manera aleatoria, y se la enviará al correo electrónico indicado arriba.
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-md-4 col-form-label text-muted">Estado</label>

                                    <div class="col-12 col-md-8">
                                        <div class="custom-control custom-radio">
                                            <input
                                                type="radio"
                                                id="suspended"
                                                name="status"
                                                value="suspended"
                                                class="custom-control-input @error('status') is-invalid @enderror"
                                                {{ old('status') === "suspended" ? "checked" : "" }}
                                            >

                                            <label
                                                for="suspended"
                                                class="custom-control-label text-secondary font-weight-normal @error('status') text-danger @enderror"
                                            >
                                                Suspendido
                                            </label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input
                                                type="radio"
                                                id="pending"
                                                value="pending"
                                                name="status"
                                                class="custom-control-input @error('status') is-invalid @enderror"
                                                {{ old('status') === "pending" ? "checked" : "" }}
                                            >

                                            <label
                                                for="pending"
                                                class="custom-control-label text-secondary font-weight-normal @error('status') text-danger @enderror"
                                            >
                                                Pendiente
                                            </label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input
                                                type="radio"
                                                id="active"
                                                value="active"
                                                name="status"
                                                class="custom-control-input @error('status') is-invalid @enderror"
                                                {{ old('status') === "active" ? "checked" : "" }}
                                            >

                                            <label
                                                for="active"
                                                class="custom-control-label text-secondary font-weight-normal @error('status') text-danger @enderror"
                                            >
                                                Activo
                                            </label>
                                        </div>

                                        @include('admin.partials.validation', ['field_name' => 'status'])
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-md-4 d-flex justify-content-md-end">
                                        <button
                                            type="button"
                                            id="previous"
                                            class="btn btn-outline-secondary border btn-block mb-1"
                                        >
                                            <i class="fas fa-arrow-left"></i> Regresar al Paso 1
                                        </button>
                                    </div>

                                    <div class="col-md-4">
                                        <button
                                            type="submit"
                                            class="btn btn-success btn-block"
                                        >
                                            <i class="fas fa-user-plus"></i> Crear usuario
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('js')
    <script>
        const stepper = new Stepper(jQuery("#stepper")[0]);

        jQuery("#next").on("click", function (e){
            stepper.next();
        });

        jQuery("#previous").on("click", function (e){
            e.preventDefault();
            stepper.previous();
        });
    </script>
@stop

