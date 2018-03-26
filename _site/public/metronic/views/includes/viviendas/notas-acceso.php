<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="viviendas-notas-acceso" action="#" method="get">
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
            <label for="nombre" class="col-form-label col-12 col-sm-3">
                Acceso nombre contacto
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="nombre" type="text" class="form-control m-input" name="acceso-nombre-contacto" placeholder="Acceso nombre contacto" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    <i class="la la-user"></i>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="telefono" class="col-form-label col-12 col-sm-3">
                Acceso telefono contacto
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="telefono" type="text" class="form-control m-input" name="acceso-telefono-contacto" placeholder="Acceso telefono contacto" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    <i class="la la-phone"></i>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="clave" class="col-form-label col-12 col-sm-3">
                Acceso referencia clave
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="clave" type="text" class="form-control m-input" name="acceso-referncia-clave" placeholder="Acceso referencia clave" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    <i class="la la-key"></i>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="ubicacion" class="col-form-label col-12 col-sm-3">
                Acceso ubicacion clave
            </label>
            <div class="input-group col-12 col-sm-9 col-xl-4">
                <input id="ubicacion" type="text" class="form-control m-input" name="acceso-ubicacion-clave" placeholder="Acceso ubicacion clave" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">
                    <i class="la la-key"></i>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Acceso notas
            </label>
            <div class="col-12 col-sm-9">
                <div class="summernote" name="acceso-notas"></div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Alarma notas
            </label>
            <div class="col-12 col-sm-9">
                <div class="summernote" name="alarma-notas"></div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Observaciones
            </label>
            <div class="col-12 col-sm-9">
                <div class="summernote" name="observaciones"></div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Id xml
            </label>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <input type="text" class="form-control m-input" name="id-xml" placeholder="Id xml">
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-12 col-sm-3">
                Agente
            </label>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <input type="text" class="form-control m-input" name="agente" placeholder="Agente">
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