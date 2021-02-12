@extends('adminlte::page')

@section('title', 'Datos del estudiante #' . $student->id)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-uppercase">Datos del estudiante #{{ $student->id }}</h1>

        <a href="{{ route('admin.students.index') }}" class="btn btn-outline-secondary border">
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
                        Datos personales
                    </h4>

                    <div class="row align-items-center justify-content-center">
                        <div class="col-6 col-sm-3 col-md-4">
                            <img
                                src="{{ $student->user->profile_photo_path }}"
                                alt="{{ $student->user->name . ' ' . $student->user->surname }}"
                                class="img-fluid rounded-circle shadow mb-3"
                            >
                        </div>

                        <div class="col-12 col-md-8">
                            <p class="font-weight-light text-uppercase text-center text-secondary mb-0">
                                Número de documento
                            </p>
                            <p class="text-center font-weight-light">{{ $student->document_number }}</p>

                            <p class="font-weight-light text-uppercase text-center text-secondary mb-0">
                                Nombre completo
                            </p>
                            <p class="text-center font-weight-light">{{ $student->user->name . ' ' . $student->user->surname }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card card-outline card-info">
                <div class="card-body">
                    <h4 class="card-title text-uppercase text-center text-md-left w-100 mb-3">
                        Datos de la cuenta
                    </h4>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <p class="font-weight-light text-uppercase text-secondary text-center mb-0">
                                Correo electrónico
                            </p>
                            <p class="text-center font-weight-light">{{ $student->user->email }}</p>
                        </div>

                        <div class="col-12 col-md-6">
                            <p class="font-weight-light text-uppercase text-secondary text-center mb-0">
                                Estado
                            </p>
                            <p class="text-center text-uppercase">
                                @if ($student->status === App\Models\Student::SUSPENDED)
                                    <span class="badge badge-pill badge-danger font-weight-light">Suspendido</span>
                                @elseif($student->status === App\Models\Student::PENDING)
                                    <span class="badge badge-pill badge-warning font-weight-light">Pendiente</span>
                                @elseif($student->status === App\Models\Student::ACTIVE)
                                    <span class="badge badge-pill badge-success font-weight-light">Activo</span>
                                @endif
                            </p>
                        </div>

                        <div class="col-12 col-md-6">
                            <p class="font-weight-light text-uppercase text-secondary text-center mb-0">
                                Fecha de creación
                            </p>
                            <p class="text-center font-weight-light">{{ $student->user->created_at }}</p>
                        </div>

                        <div class="col-12 col-md-6">
                            <p class="font-weight-light text-uppercase text-secondary text-center mb-0">
                                Fecha de actualización
                            </p>
                            <p class="text-center font-weight-light">{{ $student->user->updated_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

