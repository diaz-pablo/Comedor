<form
    method="POST"
    action="{{ $student->id ? route('admin.students.update', $student) : route('admin.students.store') }}"
    class="row"
    novalidate
>
    @csrf

    @if ($student->id)
        @method('PUT')
    @endif

    <div class="col-12 col-md-6">
        <div class="card card-outline {{ $student->id ? 'card-warning' : 'card-success' }}">
            <div class="card-body">
                <h4 class="card-title text-uppercase w-100 mb-3">
                    Datos personales
                </h4>

                <div class="form-group row">
                    <label for="document_number" class="col-12 col-form-label font-weight-light">
                        Número de documento
                    </label>

                    <div class="col-12">
                        <input
                            type="text"
                            id="document_number"
                            name="document_number"
                            class="form-control @error('document_number') is-invalid @enderror font-weight-light"
                            placeholder="Ingresa el número de documento del estudiante."
                            value="{{ old('document_number', $student->document_number) }}"
                            autofocus
                        >

                        @include('admin.partials.validation', ['field_name' => 'document_number'])
                    </div>
                </div>

                <div class="form-group row">
                    <label for="surname" class="col-12 col-form-label font-weight-light">
                        Apellido
                    </label>

                    <div class="col-12">
                        <input
                            type="text"
                            id="surname"
                            name="surname"
                            class="form-control @error('surname') is-invalid @enderror font-weight-light"
                            placeholder="Ingresa el apellido del estudiante."
                            value="{{ old('surname', optional($student->user)->surname) }}"
                        >

                        @include('admin.partials.validation', ['field_name' => 'surname'])
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-12 col-form-label font-weight-light">
                        Nombre
                    </label>

                    <div class="col-12">
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror font-weight-light"
                            placeholder="Ingresa el nombre del estudiante."
                            value="{{ old('name', optional($student->user)->name) }}"
                        >

                        @include('admin.partials.validation', ['field_name' => 'name'])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="card card-outline {{ $student->id ? 'card-warning' : 'card-success' }}">
            <div class="card-body">
                <h4 class="card-title text-uppercase w-100 mb-3">
                    Datos de la cuenta
                </h4>

                <div class="form-group row">
                    <label for="email" class="col-12 col-form-label font-weight-light">
                        Correo electrónico
                    </label>

                    <div class="col-12">
                        <input
                            type="text"
                            id="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror font-weight-light"
                            placeholder="Ingresa el correo electrónico del estudiante."
                            value="{{ old('email', optional($student->user)->email) }}"
                        >

                        @include('admin.partials.validation', ['field_name' => 'email'])
                    </div>
                </div>

                @if ($student->id)
                    <div class="form-group row">
                        <div class="col-12">
                            <p class="font-weight-light text-sm mb-0">
                                Al actualizar el correo electrónico, el estudiante deberá verificar el mismo.
                            </p>
                        </div>
                    </div>
                @endif

                <div class="form-group row">
                    <label for="generate_new_password" class="col-12 col-form-label font-weight-light">
                        Contraseña
                    </label>

                    <div class="col-12">
                        @if ($student->id)
                            <div class="custom-control custom-checkbox">
                                <input
                                    type="checkbox"
                                    id="generate_new_password"
                                    name="generate_new_password"
                                    class="custom-control-input"
                                >

                                <label for="generate_new_password" class="custom-control-label font-weight-light text-sm">
                                    Generar una nueva contraseña y enviarla al correo electrónico indicado arriba.
                                </label>
                            </div>
                        @else
                            <p class="font-weight-light text-sm mb-0">
                                La contraseña se genera de manera aleatoria y se envía al correo electrónico indicado arriba.
                            </p>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-form-label font-weight-light">
                        Estado
                    </label>

                    <div class="col-12">
                        <select name="status" class="custom-select font-weight-light @error('status') is-invalid @enderror">
                            <option class="font-weight-light" disabled selected>
                                -- Elige un estado para el estudiante --
                            </option>

                            <option
                                class="font-weight-light"
                                value="{{ App\Models\Student::SUSPENDED }}"
                                {{ $student->status === App\Models\Student::SUSPENDED || old('status') === App\Models\Student::SUSPENDED ? "selected" : "" }}
                            >
                                Suspendido
                            </option>

                            <option
                                class="font-weight-light"
                                value="{{ App\Models\Student::PENDING }}"
                                {{ $student->status === App\Models\Student::PENDING || old('status') === App\Models\Student::PENDING ? "selected" : "" }}
                            >
                                Pendiente
                            </option>

                            <option
                                class="font-weight-light"
                                value="{{ App\Models\Student::ACTIVE }}"
                                {{ $student->status === App\Models\Student::ACTIVE || old('status') === App\Models\Student::ACTIVE ? "selected" : "" }}
                            >
                                Activo
                            </option>
                        </select>

                        @include('admin.partials.validation', ['field_name' => 'status'])
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button
                    type="submit"
                    class="btn {{ $student->id ? 'btn-warning' : 'btn-success' }}"
                >
                    @if ($student->id)
                        <span class="text-uppercase">Editar estudiante</span>
                    @else
                        <span class="text-uppercase">Crear estudiante</span>
                    @endif
                </button>
            </div>
        </div>
    </div>
</form>

