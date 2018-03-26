
<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="config-lugar" action="#" method="get">
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

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="form-group m-form__group row">
                    <label for="calle" class="col-form-label col-12 col-sm-3">
                        Calle
                    </label>
                    <div class="input-group col-12 col-sm-9">
                        <input id="calle" type="text" class="form-control m-input" name="calle" placeholder="calle" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="la la-map-marker"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label for="city" class="col-form-label col-12 col-sm-3">
                        Ciudad
                    </label>
                    <div class="input-group col-12 col-sm-9">
                        <input id="city" type="text" class="form-control m-input" name="ciudad" placeholder="ciudad" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="la la-map-marker"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label for="codigo-postal" class="col-form-label col-12 col-sm-3">
                        Código postal
                    </label>
                    <div class="input-group col-12 col-sm-9">
                        <input id="codigo-postal" type="text" class="form-control m-input" name="codigo-postal" placeholder="código postal" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="la la-map-marker"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label for="provincia" class="col-form-label col-12 col-sm-3">
                        Provincia
                    </label>
                    <div class="input-group col-12 col-sm-9">
                        <input id="provincia" type="text" class="form-control m-input" name="provincia" placeholder="provincia" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="la la-map-marker"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label for="pais" class="col-form-label col-12 col-sm-3">
                        País
                    </label>
                    <div class="input-group col-12 col-sm-9">
                        <input id="pais" type="text" class="form-control m-input" name="pais" placeholder="país" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="la la-map-marker"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label for="longitude" class="col-form-label col-12 col-sm-3">
                        Longitude
                    </label>
                    <div class="input-group col-12 col-sm-9">
                        <input id="longitude" type="text" class="form-control m-input" name="longitude" placeholder="longitude" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="la la-map-marker"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label for="latitude" class="col-form-label col-12 col-sm-3">
                        Latitude
                    </label>
                    <div class="input-group col-12 col-sm-9">
                        <input id="latitude" type="text" class="form-control m-input" name="latitude" placeholder="latitude" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="la la-map-marker"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label for="zoom" class="col-form-label col-12 col-sm-3">
                        Zoom
                    </label>
                    <div class="input-group col-12 col-sm-9">
                        <input id="zoom" type="text" class="form-control m-input" name="zoom" placeholder="zoom" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="la la-map-marker"></i>
                        </span>
                    </div>
                </div>
            </div>


            <div class="col-12 col-md-6">
                <div id="mymap"></div>
            </div>
        </div>
    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions">
            <div class="row">
                <div class="col-lg-12 ml-lg-auto">
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