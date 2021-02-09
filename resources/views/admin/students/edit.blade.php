@extends('adminlte::page')

@section('title', 'Editar datos del estudiante #' . $student->id)

@section('plugins.BsStepper', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Editar datos del estudiante #{{ $student->id }}</h1>

        <a href="{{ route('admin.students.index') }}" class="btn btn-outline-secondary border">
            <i class="fas fa-times"></i> Cancelar
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        @include('admin.students.partials.alert')

        <div class="col-12">
            <div class="card card-outline card-warning">
                <div class="card-body">
                    @include('admin.students.partials.form')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        :root {
            --color-warning: #ffc107;
        }
        .bs-stepper .step-trigger:focus {
            color: var(--color-warning);
        }
        .active .bs-stepper-circle {
            background-color: var(--color-warning);
        }
    </style>
@endsection


