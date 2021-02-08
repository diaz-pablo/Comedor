@if (App\Models\User::SUSPENDED === $status)
    <span class="badge badge-pill badge-danger">Suspendido</span>
@elseif(App\Models\User::PENDING === $status)
    <span class="badge badge-pill badge-warning">Pendiente</span>
@else <!-- Está ACTIVO -->
    <span class="badge badge-pill badge-success">Activo</span>
@endif
