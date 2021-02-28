@if ($available_quantity)
    {{ $available_quantity }}
@else
    <span class="text-sm text-uppercase font-weight-light">
        Sin cantidad disponible
    </span>
@endif
