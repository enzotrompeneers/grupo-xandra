<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="viviendas-meta" action="#" method="get">
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
            <label class="col-form-label col-12 col-sm-3">
                Fecha creado
            </label>
            <div class="col-12 col-sm-9 col-xl-4">
                <div class='input-group date' id='m_datepicker'>
                    <input id="m_datepicker_1" type='text' class="form-control m-input" readonly name="fecha-creado" placeholder="fecha creado"/>
                    <span class="input-group-addon">
                        <i class="la la-calendar-check-o"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Fecha modificado
            </label>
            <div class="col-12 col-sm-9 col-xl-4">
                <div class='input-group date' id='m_datepicker'>
                    <input id="m_datepicker_1" type='text' class="form-control m-input" readonly name="fecha-modificado" placeholder="fecha modificado"/>
                    <span class="input-group-addon">
                        <i class="la la-calendar-check-o"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="opciones" class="col-form-label col-12 col-sm-3">
                Opciones json
            </label>
            <div class="col-12 col-sm-9 col-xl-4">
                <textarea id="opciones" class="form-control m-input" id="opciones-json" rows="3" name="opciones-json" placeholder="Opciones json">[]</textarea>
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