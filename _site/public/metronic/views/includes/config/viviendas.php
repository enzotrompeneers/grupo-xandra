
<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="config-viviendas" action="#" method="get">
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
            <label for="resultados-por-pagina" class="col-form-label col-12 col-sm-3">
                Resultatos por pagina
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="resultatos-por-pagina" type="text" class="form-control m-input" name="resultatos-por-pagina" placeholder="resultatos por pagina" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    <i class="la la-cog"></i>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="rango-precio" class="col-form-label col-12 col-sm-3">
                Rango precio
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="rango-precio" type="text" class="form-control m-input" name="rango-precio" placeholder="rango precio" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    <i class="la la-cog"></i>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="max-dormitorios" class="col-form-label col-12 col-sm-3">
                Max dormitorios
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="max-dormitorios" type="text" class="form-control m-input" name="max-dormitorios" placeholder="max dormitorios" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    <i class="la la-cog"></i>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="max-banos" class="col-form-label col-12 col-sm-3">
                Max Banos
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="max-banos" type="text" class="form-control m-input" name="max-banos" placeholder="max banos" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    <i class="la la-cog"></i>
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