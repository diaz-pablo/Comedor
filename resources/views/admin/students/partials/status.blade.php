@if (App\Models\Student::SUSPENDED === $status)
    <span class="badge badge-pill badge-danger text-uppercase font-weight-light">Suspendido</span>
@elseif(App\Models\Student::PENDING === $status)
    <span class="badge badge-pill badge-warning text-uppercase font-weight-light">Pendiente</span>
@elseif(App\Models\Student::ACTIVE === $status)
    <span class="badge badge-pill badge-success text-uppercase font-weight-light">Activo</span>
@endif
