<a
    href="{{ route('admin.users.show', $id) }}"
    class="btn btn-sm text-info"
>
    <i class="fas fa-eye"></i> Ver más
</a>

<span class="text-black-50">|</span>

<a
    href="{{ route('admin.users.edit', $id) }}"
    class="btn btn-sm text-warning"
>
    <i class="fas fa-edit"></i> Editar
</a>

<span class="text-black-50">|</span>

<button
    type="button"
    class="btn btn-sm text-danger"
    data-toggle="modal"
    data-target="#delete-user"
    data-id="{{ $id }}"
    data-document_number="{{ $document_number }}"
    data-surname="{{ $surname }}"
    data-name="{{ $name }}"
    data-email="{{ $email }}"
>
    <i class="fas fa-trash"></i> Eliminar
</button>


