@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1 class="text-uppercase">Panel</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-sm-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3 class="font-weight-light">{{ $quantityActiveStudents }}</h3>

                    <p class="text-uppercase font-weight-light">Estudiantes activos</p>
                </div>

                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>

                <a href="{{ route('admin.students.index', '#activo') }}" class="small-box-footer">
                    <span class="font-weight-light">Más información</span> <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-12 col-sm-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 class="font-weight-light">{{ $quantityPendingStudents }}</h3>

                    <p class="text-uppercase font-weight-light">Estudiantes pendientes</p>
                </div>

                <div class="icon">
                    <i class="fas fa-user-clock"></i>
                </div>

                <a href="{{ route('admin.students.index', '#pendiente') }}" class="small-box-footer">
                    <span class="font-weight-light">Más información</span> <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-12 col-sm-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3 class="font-weight-light">{{ $quantitySuspendedStudents }}</h3>

                    <p class="text-uppercase font-weight-light">Estudiantes suspendidos</p>
                </div>

                <div class="icon">
                    <i class="fas fa-user-times"></i>
                </div>

                <a href="{{ route('admin.students.index', '#suspendido') }}" class="small-box-footer">
                    <span class="font-weight-light">Más información</span> <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script> console.log('Hi!'); </script>
@endsection
