@if (session()->has('errors'))
    @include('admin.partials.alert', [
        'alert_color' => 'danger',
        'alert_title' => '¡Ups! Algo salió mal, ',
        'alert_message' => 'por favor revisa y corrige los errores antes de crear al estudiante.'
    ])
@endif
