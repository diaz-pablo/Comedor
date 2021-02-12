<div
    id="delete-student"
    class="modal fade"
    tabindex="-1"
    aria-labelledby="delete-student-label"
    aria-hidden="true"
>
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="delete-student-label" class="modal-title text-uppercase"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="text-center font-weight-light text-secondary text-uppercase mb-3">¿Estás seguro de eliminar a?</p>
                <p id="full-name" class="text-center font-weight-light mb-0"></p>
                <p id="document-number" class="text-center font-weight-light mb-0"></p>
                <p id="email" class="text-center font-weight-light mb-3"></p>
            </div>

            <div class="modal-footer">
                <form method="POST" action="#" id="form-delete-student" class="w-100">
                    @csrf @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-block mb-0">
                        <span class="text-uppercase">Eliminar estudiante</span>
                    </button>
                </form>

                <button type="button" class="btn btn-outline-secondary btn-block border" data-dismiss="modal">
                    <span class="text-uppercase font-weight-light">Cancelar</span>
                </button>
            </div>
        </div>
    </div>
</div>
