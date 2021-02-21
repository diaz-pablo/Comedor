<div
    id="create-menu"
    class="modal fade"
    tabindex="-1"
    aria-labelledby="create-menu-label"
    aria-hidden="true"
>
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="create-menu-label" class="modal-title text-uppercase">
                    Crear menú
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('admin.menus.store', '#create-menu') }}" id="form-create-menu" class="w-100">
                @csrf

                <div class="modal-body">
                    <div class="form-group row mb-0">
                        <label for="service_at" class="col-12 col-form-label font-weight-light">
                            Fecha del servicio
                        </label>

                        <div class="col-12">
                            <input
                                type="text"
                                id="service_at"
                                name="service_at"
                                class="form-control @error('service_at') is-invalid @enderror font-weight-light"
                                placeholder="Ingresa la fecha del servicio del menú."
                                value="{{ old('service_at') }}"
                                autocomplete="off"
                                autofocus
                            >

                            @include('admin.partials.validation', ['field_name' => 'service_at'])
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-block mb-0">
                        <span class="text-uppercase">Crear menú</span>
                    </button>

                    <button type="button" class="btn btn-outline-secondary btn-block border" data-dismiss="modal">
                        <span class="text-uppercase font-weight-light">Cancelar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
