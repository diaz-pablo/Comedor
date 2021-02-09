@extends('adminlte::page')

@section('title', 'Lista de usuarios')

@section('plugins.Datatables', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Lista de usuarios</h1>

        <a href="{{ route('admin.users.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Crear usuario
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
                                <th scope="col">Estado</th>
                                <th scope="col" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        @include('admin.users.partials.modal')
    </div>
@endsection

@section('js')
    <script>
        jQuery(document).ready(function() {
            jQuery('#users-table').DataTable({
                serverSide: true,
                ajax: "{{ route('admin.users.index') }}",
                responsive: true,
                autoWidth: false,
                columns: [
                    {data: 'id'},
                    {data: 'document_number'},
                    {data: 'surname'},
                    {data: 'name'},
                    {data: 'status', className: 'text-md-center'},
                    {data: 'actions', 'orderable': false}
                ],
                order: [
                    [0, 'desc']
                ],
                language: {
                    'url' : '//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
                },
            });

            jQuery('#delete-user').on('show.bs.modal', function (e) {
                const modal = jQuery(this);
                const button = jQuery(e.relatedTarget);

                const id = button.data('id');
                const documentNumber = button.data('document_number');
                const surname = button.data('surname');
                const name = button.data('name');
                const email = button.data('email');

                modal.find('.modal-title').text("# " + id);
                modal.find('.modal-body #full-name').text(`${name}  ${surname}`);
                modal.find('.modal-body #document-number').text(documentNumber);
                modal.find('.modal-body #email').text(email);
                modal.find('.modal-footer #form-delete-user').attr('action', `{{ env('APP_URL') }}/admin/users/${id}`);
            });
        });
    </script>
@endsection

