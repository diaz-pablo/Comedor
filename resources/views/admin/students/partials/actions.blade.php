<a
    href="{{ route('admin.students.show', $id) }}"
    class="btn btn-sm text-info text-uppercase"
>
    Ver más
</a>

<span class="text-black-50">|</span>

<a
    href="{{ route('admin.students.edit', $id) }}"
    class="btn btn-sm text-warning text-uppercase"
>
    Editar
</a>

<span class="text-black-50">|</span>

<button
    type="button"
    class="btn btn-sm text-danger text-uppercase"
    data-toggle="modal"
    data-target="#delete-student"
    data-id="{{ $id }}"
    data-document-number="{{ $document_number }}"
    data-surname="{{ $user['surname'] }}"
    data-name="{{ $user['name'] }}"
    data-email="{{ $user['email'] }}"
>
    Eliminar
</button>

