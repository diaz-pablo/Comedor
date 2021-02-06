<form
    method="POST"
    action="{{ $user->id ? route('admin.users.update', $user) : route('admin.users.store') }}"
    novalidate
>
    @csrf

    @if ($user->id)
        @method('PUT')
    @endif

    <div id="stepper" class="bs-stepper">
        <!-- BS STEPPER HEADER -->
        <div class="bs-stepper-header">
            <div class="step" data-target="#personal-information">
                <button type="button" class="btn step-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Datos personales</span>
                </button>
            </div>

            <div class="line"></div>

            <div class="step" data-target="#account-data">
                <button type="button" class="btn step-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Datos de la cuenta</span>
                </button>
            </div>
        </div>
        <!-- BS STEPPER HEADER -->

        <!-- BS STEPPER CONTENT -->
        <div class="bs-stepper-content">
            <div id="personal-information" class="content">
                <div class="form-group row">
                    <label for="document_number" class="col-12 col-md-4 col-form-label text-muted">
                        Número de documento
                    </label>

                    <div class="col-12 col-md-8">
                        <input
                            type="text"
                            id="document_number"
                            name="document_number"
                            class="form-control @error('document_number') is-invalid @enderror"
                            placeholder="Ingresa el número de documento."
                            value="{{ old('document_number') ?: $user->document_number }}"
                            autofocus
                        >

                        @include('admin.partials.validation', ['field_name' => 'document_number'])
                    </div>
                </div>

                <div class="form-group row">
                    <label for="surname" class="col-12 col-md-4 col-form-label text-muted">
                        Apellido
                    </label>

                    <div class="col-12 col-md-8">
                        <input
                            type="text"
                            id="surname"
                            name="surname"
                            class="form-control @error('surname') is-invalid @enderror"
                            placeholder="Ingresa el apellido."
                            value="{{ old('surname') ?: $user->surname }}"
                        >

                        @include('admin.partials.validation', ['field_name' => 'surname'])
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-12 col-md-4 col-form-label text-muted">
                        Nombre
                    </label>

                    <div class="col-12 col-md-8">
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Ingresa el nombre."
                            value="{{ old('name') ?: $user->name }}"
                        >

                        @include('admin.partials.validation', ['field_name' => 'name'])
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-md-4"></div>

                    <div class="col-md-4">
                        <button
                            type="button"
                            id="next"
                            class="btn btn-outline-secondary btn-block border"
                        >
                            Datos de la cuenta <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div id="account-data" class="content">
                <div class="form-group row">
                    <label for="email" class="col-12 col-md-4 col-form-label text-muted">
                        Correo electrónico
                    </label>

                    <div class="col-12 col-md-8">
                        <input
                            type="text"
                            id="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Ingresa el correo electrónico."
                            value="{{ old('email') ?: $user->email }}"
                        >

                        @include('admin.partials.validation', ['field_name' => 'email'])
                    </div>
                </div>

                @if ($user->id)
                    <div class="form-group row">
                        <div class="col-12 col-md-4"></div>

                        <div class="col-12 col-md-8">
                            <p class="text-secondary text-sm mb-0">
                                Si actualiza el correo electrónico, el usuario deberá verificar el mismo.
                            </p>
                        </div>
                    </div>
                @endif

                <div class="form-group row">
                    <div class="col-12 col-md-4"></div>

                    <div class="col-12 col-md-8">
                        @if ($user->id)
                            <div class="custom-control custom-checkbox">
                                <input
                                    type="checkbox"
                                    id="generate_new_password"
                                    name="generate_new_password"
                                    class="custom-control-input"
                                >

                                <label for="generate_new_password" class="custom-control-label text-secondary d-flex align-items-center">
                                    Generar nueva contraseña y enviarla al correo electrónico indicado arriba.
                                </label>
                            </div>
                        @else
                            <p class="text-secondary text-sm mb-0">
                                Se generará una contraseña de manera aleatoria, y se la enviará al correo electrónico indicado arriba.
                            </p>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-md-4 col-form-label text-muted">Estado</label>

                    <div class="col-12 col-md-8">
                        <div class="custom-control custom-radio">
                            <input
                                type="radio"
                                id="suspended"
                                name="status"
                                value="{{ App\Models\User::SUSPENDED }}"
                                class="custom-control-input @error('status') is-invalid @enderror"
                                {{ $user->status === App\Models\User::SUSPENDED || old('status') === App\Models\User::SUSPENDED ? "checked" : "" }}
                            >

                            <label
                                for="suspended"
                                class="custom-control-label text-secondary font-weight-normal @error('status') text-danger @enderror"
                            >
                                Suspendido
                            </label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input
                                type="radio"
                                id="pending"
                                value="{{ App\Models\User::PENDING }}"
                                name="status"
                                class="custom-control-input @error('status') is-invalid @enderror"
                                {{ $user->status === App\Models\User::PENDING || old('status') === App\Models\User::PENDING ? "checked" : "" }}
                            >

                            <label
                                for="pending"
                                class="custom-control-label text-secondary font-weight-normal @error('status') text-danger @enderror"
                            >
                                Pendiente
                            </label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input
                                type="radio"
                                id="active"
                                value="{{ App\Models\User::ACTIVE }}"
                                name="status"
                                class="custom-control-input @error('status') is-invalid @enderror"
                                {{ $user->status === App\Models\User::ACTIVE || old('status') === App\Models\User::ACTIVE ? "checked" : "" }}
                            >

                            <label
                                for="active"
                                class="custom-control-label text-secondary font-weight-normal @error('status') text-danger @enderror"
                            >
                                Activo
                            </label>
                        </div>

                        @include('admin.partials.validation', ['field_name' => 'status'])
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-md-4 d-flex justify-content-md-end">
                        <button
                            type="button"
                            id="previous"
                            class="btn btn-outline-secondary border btn-block mb-1"
                        >
                            <i class="fas fa-arrow-left"></i> Datos personales
                        </button>
                    </div>

                    <div class="col-md-4">
                        <button
                            type="submit"
                            class="btn {{ $user->id ? 'btn-warning' : 'btn-success' }} btn-block"
                        >
                            @if ($user->id)
                                <i class="fas fa-user-edit"></i> Editar usuario
                            @else
                                <i class="fas fa-user-plus"></i> Crear usuario
                            @endif
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- BS STEPPER CONTENT -->
    </div>
</form>

@section('js')
    <script>
        const stepper = new Stepper(jQuery("#stepper")[0]);

        jQuery("#next").on("click", function (e){
            stepper.next();
        });

        jQuery("#previous").on("click", function (e){
            e.preventDefault();
            stepper.previous();
        });
    </script>
@endsection

