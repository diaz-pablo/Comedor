@extends('adminlte::page')

@section('title', 'Menús')

@section('plugins.Datatables', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-uppercase">Menús</h1>

        <a href="{{ route('admin.menus.create') }}" class="btn btn-success">
            <span class="text-uppercase">Crear</span>
        </a>
    </div>
@endsection

@section('content')
    @if (session()->has('alert'))
        @include('admin.partials.alert', [
            'alert_color' => session('alert')[0],
            'alert_title' => session('alert')[1],
            'alert_message' => session('alert')[2]
        ])
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-body table-responsive">
                    <table id="menus-table" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-uppercase font-weight-bold">#</th>
                                <th scope="col" class="text-uppercase font-weight-bold">Plato principal</th>
                                <th scope="col" class="text-uppercase font-weight-bold">Fecha del servicio</th>
                                <th scope="col" class="text-uppercase font-weight-bold">Fecha de publicación</th>
                                <th scope="col" class="text-uppercase font-weight-bold">Cantidad disponible</th>
                                <th scope="col" class="text-uppercase font-weight-bold text-md-center">Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        @include('admin.menus.partials.modal')
    </div>
@endsection

@section('js')
    <script>
        jQuery(document).ready(function() {
            jQuery('#menus-table').DataTable({
                serverSide: true,
                ajax: "{{ route('admin.menus.index') }}",
                processing: true,
                responsive: true,
                autoWidth: false,
                columns: [
                    {data: 'id', className: 'font-weight-bold'},
                    {data: 'main.name', className: 'font-weight-light'},
                    {data: 'service_at', className: 'font-weight-light text-md-center'},
                    {data: 'publication_at', className: 'font-weight-light text-md-center'},
                    {data: 'available_quantity', className: 'font-weight-light text-md-center'},
                    {data: 'actions', className: 'text-md-center', orderable: false}
                ],
                order: [
                    [0, 'asc']
                ],
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
                }
            });

            jQuery('#delete-menu').on('show.bs.modal', function (e) {
                const modal = jQuery(this);
                const button = jQuery(e.relatedTarget);

                const id = button.data('id');
                const starterName = button.data('starter-name');
                const mainName = button.data('main-name');
                const dessertName = button.data('dessert-name');
                const serviceAt = button.data('service-at');
                console.log(starterName, mainName, dessertName, serviceAt);

                modal.find('.modal-title').text("Menú #" + id);
                modal.find('.modal-body #starter-name').text(starterName);
                modal.find('.modal-body #main-name').text(mainName);
                modal.find('.modal-body #dessert-name').text(dessertName);
                modal.find('.modal-body #service-at').text(serviceAt);
                modal.find('.modal-footer #form-delete-menu').attr('action', `{{ env('APP_URL') }}/admin/menus/${id}`);
            });
        });
    </script>
@endsection

