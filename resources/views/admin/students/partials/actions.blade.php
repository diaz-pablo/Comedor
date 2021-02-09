<a
    href="{{ route('admin.students.show', $id) }}"
    class="btn btn-sm text-info"
>
    <i class="fas fa-eye"></i> Ver más
</a>

<span class="text-black-50">|</span>

<a
    href="{{ route('admin.students.edit', $id) }}"
    class="btn btn-sm text-warning"
>
    <i class="fas fa-edit"></i> Editar
</a>

<span class="text-black-50">|</span>

<button
    type="button"
    class="btn btn-sm text-danger"
    data-toggle="modal"
    data-target="#delete-student"
    data-id="{{ $id }}"
    data-document-number="{{ $document_number }}"
    data-surname="{{ $user['surname'] }}"
    data-name="{{ $user['name'] }}"
    data-email="{{ $user['email'] }}"
>
    <i class="fas fa-trash"></i> Eliminar
</button>

