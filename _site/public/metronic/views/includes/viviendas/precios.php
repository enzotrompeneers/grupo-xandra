<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="viviendas-precios" action="#" method="get">
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
            <label for="venta" class="col-form-label col-12 col-sm-3">
                Precio de venta
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="venta" name="precio-de-venta" placeholder="precio de venta" type="text" class="form-control m-input" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    &euro;
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="anterior" class="col-form-label col-12 col-sm-3">
                Precio anterior
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="anterior" name="precio-anterior" placeholder="precio anterior" type="text" class="form-control m-input" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    &euro;
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="neto" class="col-form-label col-12 col-sm-3">
                Precio neto
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="neto" name="precio-neto" placeholder="precio neto" type="text" class="form-control m-input" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    &euro;
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Precio desde
            </label>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                    <label>
                        <input type="checkbox" checked="checked" name="garaje">
                        <span></span>
                    </label>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="comunidad" class="col-form-label col-12 col-sm-3">
                Gastos comunidad
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="comunidad" name="gastos-comunidad" placeholder="gastos comunidad" type="text" class="form-control m-input" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    &euro;
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="ibi" class="col-form-label col-12 col-sm-3">
                Gastos ibi
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="ibi" name="gastos-ibi" placeholder="gastos ibi" type="text" class="form-control m-input" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    &euro;
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Precio historial
            </label>
            <div class="col-12 col-sm-9">
                <div class="summernote" name="precio-historial"></div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Descripcion es
            </label>
            <div class="col-12 col-sm-9">
                <div class="summernote" name="description-es"></div>
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