@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('plugins.BsStepper', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Editar usuario</h1>

        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary border">
            <i class="fas fa-arrow-left"></i> Cancelar
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        @include('admin.users.partials.alert')

        <div class="col-12">
            <div class="card card-outline card-warning">
                <div class="card-body">
                    @include('admin.users.partials.form')
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


