<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="viviendas-caracteristicas" action="#" method="get">
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
                Dormitorios
            </label>
            <div class="col-12 col-sm-9 col-xl-4">
                <div class="row align-items-center">
                    <div class="col-4">
                        <input type="text" class="form-control" id="dormitorios_input"  placeholder="Nùmero" name="dormitorios" readonly disabled>
                    </div>
                    <div class="col-8">
                        <div id="dormitorios" class="m-nouislider--drag-danger"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Banos
            </label>
            <div class="col-12 col-sm-9 col-xl-4">
                <div class="row align-items-center">
                    <div class="col-4">
                        <input type="text" class="form-control" id="banos_input"  placeholder="Nùmero" name="banos" readonly disabled>
                    </div>
                    <div class="col-8">
                        <div id="banos" class="m-nouislider--drag-danger"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Piscina
            </label>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="piscina">
                    <option value="comunitaria">
                        Comunitaria
                    </option>
                    <option value="opcional">
                        Opcional
                    </option>
                    <option value="privada">
                        Privada
                    </option>
                    <option value="sin-piscina">
                        Sin piscina
                    </option>
                </select>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <a href="#" class="btn btn-success m-btn m-btn--icon">
                    <span>
                        <i class="fa fa-plus"></i>
                        <span>
                            Crear Valor
                        </span>
                    </span>
                </a>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Jardin
            </label>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="jardin">
                    <option value="comunitario">
                        Comunitario
                    </option>
                    <option value="privado">
                        Privado
                    </option>
                    <option value="sin-jardin">
                        Sin jardin
                    </option>
                </select>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <a href="#" class="btn btn-success m-btn m-btn--icon">
                    <span>
                        <i class="fa fa-plus"></i>
                        <span>
                            Crear Valor
                        </span>
                    </span>
                </a>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Orientacion
            </label>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="orientacion">
                    <option value="este">
                        Este
                    </option>
                    <option value="na">
                        N/A
                    </option>
                    <option value="noreste">
                        Noreste
                    </option>
                    <option value="noroeste">
                        Noroeste
                    </option>
                    <option value="norte">
                        Norte
                    </option>
                    <option value="oeste">
                        Oeste
                    </option>
                    <option value="sur">
                        Sur
                    </option>
                    <option value="sur-este">
                        Sur-este
                    </option>
                </select>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <a href="#" class="btn btn-success m-btn m-btn--icon">
                    <span>
                        <i class="fa fa-plus"></i>
                        <span>
                            Crear Valor
                        </span>
                    </span>
                </a>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Vista
            </label>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="vista">
                    <option value="al-mar">
                        Al mar
                    </option>
                    <option value="na">
                        N/A
                    </option>
                </select>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <a href="#" class="btn btn-success m-btn m-btn--icon">
                    <span>
                        <i class="fa fa-plus"></i>
                        <span>
                            Crear Valor
                        </span>
                    </span>
                </a>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Parking
            </label>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="parking">
                    <option value="">
                    </option>
                </select>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <a href="#" class="btn btn-success m-btn m-btn--icon">
                    <span>
                        <i class="fa fa-plus"></i>
                        <span>
                            Crear Valor
                        </span>
                    </span>
                </a>
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