<div class="col-12">
    <div class="alert alert-{{ $alert_color }} alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">{{ $alert_title}}</h4>

        <p>{{ $alert_message }}</p>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
