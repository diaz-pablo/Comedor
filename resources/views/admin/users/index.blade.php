@extends('adminlte::page')

@section('title', 'Lista de usuarios')

@section('plugins.Datatables', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Lista de usuarios</h1>

        <a href="{{ route('admin.users.create') }}" class="btn btn-success">
            <i class="fas fa-user-plus"></i> Crear usuario
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        @if (session()->has('alert'))
            @include('admin.partials.alert', [
                'alert_color' => session('alert')[0],
                'alert_title' => session('alert')[1],
                'alert_message' => session('alert')[2]
            ])
        @endif

        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-body table-responsive">
                    <table id="users-table" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Documento</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo electrónico</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        jQuery(document).ready(function() {
            jQuery("#users-table").DataTable({
                serverSide: true,
                ajax: "{{ route('admin.users.index') }}",
                responsive: true,
                autoWidth: false,
                columns: [
                    {data: "id"},
                    {data: "document_number"},
                    {data: "surname"},
                    {data: "name"},
                    {data: "email"},
                    {data: "actions", "orderable": false}
                ],
                order: [
                    [0, "desc"]
                ],
                language: {
                    "url" : "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                }
            });
        });
    </script>
@endsection

