@extends('adminlte::page')

@section('title', 'Crear menú')

@section('plugins.DatePicker', true)
@section('plugins.Select2', true)

@section('content_header')
    <h1>Crear menú</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card-outline card-success">
                    <form method="POST" action="#" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="service_at">
                                Fecha del servicio
                            </label>

                            <input
                                type="text"
                                id="service_at"
                                name="service_at"
                                class="form-control"
                            >
                        </div>

                        <div class="form-group">
                            <label for="publication_at">
                                Fecha de publicación
                            </label>

                            <input
                                type="text"
                                id="publication_at"
                                name="publication_at"
                                class="form-control"
                            >
                        </div>

                        <div class="form-group">
                            <label for="starter_id">
                                Plato de entrada
                            </label>

                            <select id="starter_id" class="custom-select">
                                <option selected>-- Buscar o Agregar --</option>
                                @foreach($starters as $starter)
                                    <option value="{{ $starter->id }}">{{ $starter->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="main_id">
                                Plato principal
                            </label>

                            <select id="main_id" class="custom-select">
                                <option selected>-- Buscar o Agregar --</option>
                                @foreach($mains as $main)
                                    <option value="{{ $main->id }}">{{ $main->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="dessert_id">
                                Postre
                            </label>

                            <select id="dessert_id" class="custom-select">
                                <option selected>-- Buscar o Agregar --</option>
                                @foreach($desserts as $dessert)
                                    <option value="{{ $dessert->id }}">{{ $dessert->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="available_quantity">
                                Cantidad disponible
                            </label>

                            <input
                                type="text"
                                id="available_quantity"
                                name="available_quantity"
                                class="form-control"
                            >
                        </div>

                        <button type="submit" class="btn btn-success btn-block">
                            Crear menú
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

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
