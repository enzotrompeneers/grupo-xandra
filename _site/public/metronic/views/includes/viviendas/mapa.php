<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="viviendas-mapa" action="#" method="get">
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

        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-12 col-sm-3">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" class="form-control m-input m-input--solid" placeholder="Buscar..." id="pac-input">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span>
                                        <i class="la la-search"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-12 col-sm-1">
                            Zoom
                        </label>
                        <div class="col-12 col-sm-3">
                            <input type="text" class="form-control m-input" id="zoom" name="zoom" placeholder="Zoom">
                        </div>
  
                        <label class="col-form-label col-12 col-sm-1">
                            Lat
                        </label>
                        <div class="col-12 col-sm-3">
                            <input type="text" class="form-control m-input" id="lat" name="lat" placeholder="Lat">
                        </div>

                        <label class="col-form-label col-12 col-sm-1">
                            Lon
                        </label>
                        <div class="col-12 col-sm-3">
                            <input type="text" class="form-control m-input" id="lon" name="lon" placeholder="Lon">
                        </div>
                    </div>

                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-12">
                            <div id="mymap"></div>
                        </div>
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