@extends('adminlte::page')

@section('title', 'Menús')

@section('plugins.DatePicker', true)
@section('plugins.Select2', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Menús</h1>

        <a href="{{ route('admin.menus.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Crear
        </a>
    </div>
@endsection

@section('content')
    <main class="row">
        @foreach($menus as $menu)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card card-outline card-primary">
                    <img
                        src="{{ Storage::url('/default-user.png') }}"
                        class="card-img-top img-fluid shadow-sm"
                        alt="..."
                        style="height: 12.5rem;"
                    >

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-7">
                                <p class="font-weight-bold text-center text-md-right mb-0">
                                    Fecha del servicio
                                </p>
                            </div>

                            <div class="col-12 col-md-5">
                                <p class="text-center text-md-left font-weight-normal">
                                    {{ $menu->service_at }}
                                </p>
                            </div>

                            <div class="col-12 col-md-7">
                                <p class="font-weight-bold text-center text-md-right mb-0">
                                    Fecha de publicación
                                </p>
                            </div>

                            <div class="col-12 col-md-5">
                                <p class="text-center text-md-left font-weight-normal">
                                    {{ $menu->publication_at }}
                                </p>
                            </div>

                            <div class="col-12 col-md-7">
                                <p class="font-weight-bold text-center text-md-right mb-0">
                                    Cantidad disponible
                                </p>
                            </div>

                            <div class="col-12 col-md-5">
                                <p class="text-center text-md-left font-weight-normal">
                                    {{ $menu->available_quantity }}
                                </p>
                            </div>

                            <hr class="w-100 mt-0">

                            <div class="col-6 text-center mb-3">
                                <a
                                    href="{{ route('admin.menus.show', $menu) }}"
                                    class="text-info"
                                >
                                    <i class="fas fa-eye"></i> Ver más
                                </a>
                            </div>

                            <div class="col-6 text-center mb-3">
                                <a
                                    href="{{ route('admin.menus.edit', $menu) }}"
                                    class="text-warning"
                                >
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                            </div>

                            <div class="col-12 mb-0">
                                <form method="POST" action="{{ route('admin.menus.destroy', $menu) }}" novalidate>
                                    @csrf @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-outline-danger btn-block"
                                    >
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-12 d-flex justify-content-end mb-3">
            {{ $menus->links('vendor.pagination.bootstrap-4') }}
        </div>
    </main>
@endsection

@section('css')

@endsection

@section('js')

@endsection
