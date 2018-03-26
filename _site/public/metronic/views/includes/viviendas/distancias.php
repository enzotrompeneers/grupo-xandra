<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="viviendas-distancias" action="#" method="get">
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
            <label class="col-form-label col-lg-3 col-sm-12">
                Distancia aeropuerto
            </label>
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="row align-items-center">
                    <div class="col-3">
                        <input type="text" class="form-control" id="aeropuerto_input"  placeholder="Distancia" name="distancia-aeropuerto" readonly disabled>
                    </div>
                    <div class="col-3">
                        <select class="form-control m-bootstrap-select m_selectpicker" name="distancia-aeropuerto-unit">
                            <option value="km">
                                km
                            </option>
                            <option value="m">
                                m
                            </option>
                        </select>
                    </div>

                    <div class="col-6">
                        <div id="aeropuerto" class="m-nouislider--drag-danger"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-lg-3 col-sm-12">
                Distancia playa
            </label>
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="row align-items-center">
                    <div class="col-3">
                        <input type="text" class="form-control" id="playa_input"  placeholder="Distancia" name="distancia-playa" readonly disabled>
                    </div>
                    <div class="col-3">
                        <select class="form-control m-bootstrap-select m_selectpicker" name="distancia-playa-unit">
                            <option value="km">
                                km
                            </option>
                            <option value="m">
                                m
                            </option>
                        </select>
                    </div>

                    <div class="col-6">
                        <div id="playa" class="m-nouislider--drag-danger"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-lg-3 col-sm-12">
                Distancia ciudad
            </label>
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="row align-items-center">
                    <div class="col-3">
                        <input type="text" class="form-control" id="ciudad_input"  placeholder="Distancia" name="distancia-ciudad" readonly disabled>
                    </div>
                    <div class="col-3">
                        <select class="form-control m-bootstrap-select m_selectpicker" name="distancia-ciudad-unit">
                            <option value="km">
                                km
                            </option>
                            <option value="m">
                                m
                            </option>
                        </select>
                    </div>

                    <div class="col-6">
                        <div id="ciudad" class="m-nouislider--drag-danger"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-lg-3 col-sm-12">
                Distancia golf
            </label>
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="row align-items-center">
                    <div class="col-3">
                        <input type="text" class="form-control" id="golf_input"  placeholder="Distancia" name="distancia-golf" readonly disabled>
                    </div>
                    <div class="col-3">
                        <select class="form-control m-bootstrap-select m_selectpicker" name="distancia-golf-unit">
                            <option value="km">
                                km
                            </option>
                            <option value="m">
                                m
                            </option>
                        </select>
                    </div>

                    <div class="col-6">
                        <div id="golf" class="m-nouislider--drag-danger"></div>
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