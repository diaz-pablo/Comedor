@extends('adminlte::page')

@section('title', 'Menús')

@section('plugins.Datatables', true)
@section('plugins.DatePicker', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-uppercase">Menús</h1>

        <a
            href="#"
            class="btn btn-success"
            data-toggle="modal"
            data-target="#create-menu">
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
    </div>

    @include('admin.menus.partials.create-modal')
    @include('admin.menus.partials.delete-modal')
@endsection

@section('css')
    <style>
        .datepicker {
            padding-left: .75rem;
            padding-right: .75rem;
        }
    </style>
@endsection
@section('js')
    <script>
        jQuery('#service_at').datepicker({
            language: 'es',
            startDate: 'od',
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            daysOfWeekDisabled: '0,6',
            datesDisabled: {!! $datesDisabled !!},
            orientation: 'bottom right',
            clearBtn: true,
            autoclose: true,
        });
    </script>

    <script>
        jQuery('#menus-table').DataTable({
            serverSide: true,
            ajax: "{{ route('admin.menus.index') }}",
            processing: true,
            responsive: true,
            autoWidth: false,
            columns: [
                {data: 'id', className: 'font-weight-bold'},
                {data: 'service_at', className: 'font-weight-light text-md-center'},
                {data: 'publication_at', className: 'font-weight-light text-md-center'},
                {data: 'available_quantity', className: 'font-weight-light text-md-center'},
                {data: 'actions', className: 'text-md-center', orderable: false}
            ],
            order: [
                [0, 'desc']
            ],
            language: {
                url : '//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
            }
        });
    </script>

    <script>
        jQuery('#delete-menu').on('show.bs.modal', function (e) {
            const modal = jQuery(this);
            const button = jQuery(e.relatedTarget);

            const id = button.data('id');
            const starterName = button.data('starter-name');
            const mainName = button.data('main-name');
            const dessertName = button.data('dessert-name');
            const serviceAt = button.data('service-at');

            modal.find('#delete-menu-label').text('Menú #' + id);

            if (starterName !== '' || mainName !== '' || dessertName !== '') {
                modal.find('.modal-body #menu').text('Menú');
                modal.find('.modal-body #starter-name').text(starterName);
                modal.find('.modal-body #main-name').text(mainName);
                modal.find('.modal-body #dessert-name').text(dessertName);
            } else {
                modal.find('.modal-body #menu').text('');
                modal.find('.modal-body #starter-name').text('');
                modal.find('.modal-body #main-name').text('');
                modal.find('.modal-body #dessert-name').text('');
            }

            modal.find('.modal-body #service-at').text(serviceAt);
            modal.find('.modal-footer #form-delete-menu').attr('action', `{{ env('APP_URL') }}/admin/menus/${id}`);
        });

        @unless(request()->is('admin/menus/*'))
            if (window.location.hash === '#create-menu') {
                jQuery('#create-menu').modal('show');
            }

            jQuery('#create-menu').on('hide.bs.modal', function () {
                window.location.hash = '#';
            });

            jQuery('#create-menu').on('shown.bs.modal', function () {
                window.location.hash = '#create-menu';
            });
        @endunless
    </script>
@endsection

