@extends('adminlte::page')

@section('title', 'Mostrar usuario')

@section('plugins.Datatables', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Mostrar usuario</h1>

        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary border">
            <i class="fas fa-arrow-left"></i> Regresar
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card card-outline card-info">
                <div class="card-body">
                    <h4 class="text-center mb-3">Datos personales</h4>

                    <div class="row align-items-center justify-content-center">
                        <div class="col-6 col-sm-3 col-md-4">
                            <img
                                src="{{ $user->profile_photo_path }}"
                                alt="{{ $user->name . ' ' . $user->surname }}"
                                class="img-fluid rounded-circle shadow mb-3"
                            >
                        </div>

                        <div class="col-12 col-md-8">
                            <p class="font-weight-bold text-center mb-0">
                                Número de documento
                            </p>
                            <p class="text-center font-weight-normal">{{ $user->document_number }}</p>

                            <p class="font-weight-bold text-center mb-0">
                                Nombre completo
                            </p>
                            <p class="text-center font-weight-normal">{{ $user->name . ' ' . $user->surname }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card card-outline card-info">
                <div class="card-body">
                    <h4 class="text-center mb-3">Datos de la cuenta</h4>

                    <p class="font-weight-bold text-center mb-0">
                        Correo electrónico
                    </p>
                    <p class="text-center font-weight-normal">{{ $user->email }}</p>

                    <p class="font-weight-bold text-center mb-0">
                        Estado actual
                    </p>
                    <p class="text-center font-weight-normal text-uppercase">
                        @if ($user->status === App\Models\User::SUSPENDED)
                            <span class="badge badge-pill badge-danger">Suspendido</span>
                        @elseif($user->status === App\Models\User::PENDING)
                            <span class="badge badge-pill badge-warning">Pendiente</span>
                        @else <!-- Está ACTIVO -->
                            <span class="badge badge-pill badge-success">Activo</span>
                        @endif
                    </p>

                    <p class="font-weight-bold text-center mb-0">
                        Fecha de creación
                    </p>
                    <p class="text-center font-weight-normal">{{ $user->created_at }}</p>

                    <p class="font-weight-bold text-center mb-0">
                        Fecha de actualización
                    </p>
                    <p class="text-center font-weight-normal">{{ $user->updated_at }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

