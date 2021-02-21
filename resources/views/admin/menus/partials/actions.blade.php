<a
    href="{{ route('admin.menus.show', $id) }}"
    class="btn btn-sm text-info text-uppercase"
>
    Ver más
</a>

<span class="text-black-50">|</span>

<a
    href="{{ route('admin.menus.edit', $id) }}"
    class="btn btn-sm text-warning text-uppercase"
>
    Editar
</a>

<span class="text-black-50">|</span>

<button
    type="button"
    class="btn btn-sm text-danger text-uppercase"
    data-toggle="modal"
    data-target="#delete-menu"
    data-id="{{ $id }}"
    data-starter-name="{{ $starter ? $starter['name'] : null }}"
    data-main-name="{{ $main ? $main['name'] : null }}"
    data-dessert-name="{{ $dessert ? $dessert['name'] : null }}"
    data-service-at="{{ $service_at }}"
>
    Eliminar
</button>
