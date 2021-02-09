@extends('adminlte::page')

@section('title', 'Crear estudiante')

@section('plugins.BsStepper', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Crear estudiante</h1>

        <a href="{{ route('admin.students.index') }}" class="btn btn-outline-secondary border">
            <i class="fas fa-times"></i> Cancelar
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        @include('admin.students.partials.alert')

        <div class="col-12">
            <div class="card card-outline card-success">
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
            --color-success: #28a745;
        }
        .bs-stepper .step-trigger:focus {
            color: var(--color-success);
        }
        .active .bs-stepper-circle {
            background-color: var(--color-success);
        }
    </style>
@endsection

