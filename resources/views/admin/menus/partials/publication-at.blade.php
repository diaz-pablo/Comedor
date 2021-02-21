@if ($publication_at)
    {{ $publication_at }}
@else
    <span class="text-sm text-danger text-uppercase font-weight-light">
        Sin fecha de publicación
    </span>
@endif
