<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="viviendas-publicacion" action="#" method="get">
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
            <label class="col-8 col-md-4 col-form-label">
                Visible
            </label>
            <div class="col-4 col-md-2">
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                    <label>
                        <input type="checkbox" checked="checked" name="visible">
                        <span></span>
                    </label>
                </span>
            </div>

            <label class="col-8 col-md-4 col-form-label">
                Vendido
            </label>
            <div class="col-4 col-md-2">
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                    <label>
                        <input type="checkbox" checked="checked" name="vendido">
                        <span></span>
                    </label>
                </span>
            </div>

            <label class="col-8 col-md-4 col-form-label">
                Reservado
            </label>
            <div class="col-4 col-md-2">
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                    <label>
                        <input type="checkbox" checked="checked" name="reservado">
                        <span></span>
                    </label>
                </span>
            </div>

            <label class="col-8 col-md-4 col-form-label">
                Destacado
            </label>
            <div class="col-4 col-md-2">
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                    <label>
                        <input type="checkbox" checked="checked" name="destacado">
                        <span></span>
                    </label>
                </span>
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