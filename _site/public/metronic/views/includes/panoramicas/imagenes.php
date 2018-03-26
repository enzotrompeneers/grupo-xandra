<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="panoramicas-imagenes" action="#" method="get">
    <div class="m-portlet__body">
        <div class="m-form__content">
            <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert" id="m_form_2_msg">
                <div class="m-alert__icon">
                    <i class="la la-warning"></i>
                </div>
                <div class="m-alert__text">
                    mensaje de error!
                </div>
                <div class="m-alert__close">
                    <button type="button" class="close" data-close="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <div class="col-12">
                <div class="m-dropzone dropzone" action="inc/api/dropzone/upload.php" id="m-dropzone-three">
                    <div class="m-dropzone__msg dz-message needsclick">
                        <h3 class="m-dropzone__msg-title">
                            Suelta los archivos aquí o haz clic para cargarlos.
                        </h3>
                        <span class="m-dropzone__msg-desc">
                            <i class="fa fa-plus-square-o big-icon" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions">
            <div class="row">
                <div class="col-lg-9 ml-lg-auto">
                    <button type="submit" class="btn btn-success guardar">
                        Guardar
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--end::Form-->