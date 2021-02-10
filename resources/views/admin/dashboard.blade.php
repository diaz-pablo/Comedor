@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-sm-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $quantityActiveStudents }}</h3>

                    <p>Estudiantes activos</p>
                </div>

                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>

                <a href="{{ route('admin.students.index', ['search' => 'activo']) }}" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-12 col-sm-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $quantityPendingStudents }}</h3>

                    <p>Estudiantes pendientes</p>
                </div>

                <div class="icon">
                    <i class="fas fa-user-clock"></i>
                </div>

                <a href="{{ route('admin.students.index', ['search' => 'pendiente']) }}" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-12 col-sm-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $quantitySuspendedStudents }}</h3>

                    <p>Estudiantes suspendidos</p>
                </div>

                <div class="icon">
                    <i class="fas fa-user-times"></i>
                </div>

                <a href="{{ route('admin.students.index', ['search' => 'suspendido']) }}" class="small-box-footer">
                   Más información <i class="fas fa-arrow-circle-right"></i>
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
