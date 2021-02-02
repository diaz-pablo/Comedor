<a href="{{ route('admin.users.show', $id) }}"
   class="btn btn-sm text-info"
   data-toggle="tooltip"
   data-placement="bottom"
   title="Ver más">
    <i class="fas fa-eye"></i>
</a>

<span class="text-black-50">|</span>

<a href="{{ route('admin.users.edit', $id) }}"
   class="btn btn-sm text-warning"
   data-toggle="tooltip"
   data-placement="bottom"
   title="Editar">
    <i class="fas fa-edit"></i>
</a>

<span class="text-black-50">|</span>

<form method="POST" action="{{ route('admin.users.destroy', $id) }}" class="d-inline">
    @csrf @method('DELETE')
    <button type="submit"
            class="btn btn-sm text-danger"
            data-toggle="tooltip"
            data-placement="bottom"
            title="Eliminar">
        <i class="fas fa-trash"></i>
    </button>
</form>
