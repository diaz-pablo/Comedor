@if ($publication_at)
    {{ $publication_at }}
@else
    <span class="badge badge-pill badge-warning text-sm text-uppercase font-weight-light">
        Sin fecha de publicación
    </span>
@endif
