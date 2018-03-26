<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="viviendas-superficies" action="#" method="get">
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
            <label for="vivienda" class="col-form-label col-12 col-sm-3">
                Sup vivienda
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="vivienda" name="sup-vivienda" placeholder="Sup vivienda" type="text" class="form-control m-input" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    m<sup>2</sup>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="parcela" class="col-form-label col-12 col-sm-3">
                Sup parcela
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="parcela" name="sup-parcela" placeholder="Sup parcela" type="text" class="form-control m-input" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    m<sup>2</sup>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="jardin" class="col-form-label col-12 col-sm-3">
                Sup jardin
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="jardin" name="sup-jardin" placeholder="Sup jardin" type="text" class="form-control m-input" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    m<sup>2</sup>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="trastero" class="col-form-label col-12 col-sm-3">
                Sup trastero
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="trastero" name="sup-trastero" placeholder="Sup trastero" type="text" class="form-control m-input" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    m<sup>2</sup>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="garaje" class="col-form-label col-12 col-sm-3">
                Sup garaje
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="garaje" name="sup-garaje" placeholder="Sup garaje" type="text" class="form-control m-input" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    m<sup>2</sup>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="solarium" class="col-form-label col-12 col-sm-3">
                Sup solarium
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="solarium" name="sup-solarium" placeholder="Sup solarium" type="text" class="form-control m-input" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    m<sup>2</sup>
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