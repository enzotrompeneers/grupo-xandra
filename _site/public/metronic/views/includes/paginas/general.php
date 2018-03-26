<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="paginas-general" action="#" method="get">
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
                Parent id
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="parent-id">
                    <option value="ninguno">
                        ninguno
                    </option>
                    <option value="inicio">
                        inicio
                    </option>
                    <option value="viviendas">
                        viviendas
                    </option>
                    <option value="empresa">
                        empresa
                    </option>
                    <option value="contacto">
                        contacto
                    </option>
                    <option value="politica-privacidad">
                        politica-privacidad
                    </option>
                    <option value="aviso-legal">
                        aviso-legal
                    </option>
                    <option value="politica-cookies">
                        politica-cookies
                    </option>
                </select>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-lg-3 col-sm-12">
                Header menu
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                    <label>
                        <input type="checkbox" checked="checked" name="header-menu">
                        <span></span>
                    </label>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-lg-3 col-sm-12">
                Footer menu
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                    <label>
                        <input type="checkbox" checked="checked" name="footer-menu">
                        <span></span>
                    </label>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label class="col-form-label col-lg-3 col-sm-12">
                Privado
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                    <label>
                        <input type="checkbox" checked="unchecked" name="privado">
                        <span></span>
                    </label>
                </span>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="titulo-es" class="col-form-label col-lg-3 col-sm-12">
                Titulo es
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input id="titulo-es" type="text" class="form-control m-input" name="titulo-es" placeholder="titulo es">
            </div>
        </div>
        
        <div class="form-group m-form__group row">
            <label for="titulo-en" class="col-form-label col-lg-3 col-sm-12">
                Titulo en
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input id="titulo-en" type="text" class="form-control m-input" name="titulo-en" placeholder="titulo en">
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="titulo-nl" class="col-form-label col-lg-3 col-sm-12">
                Titulo nl
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input id="titulo-nl" type="text" class="form-control m-input" name="titulo-nl" placeholder="titulo nl">
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="link-es" class="col-form-label col-lg-3 col-sm-12">
                Link es
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input id="link-es" type="text" class="form-control m-input" name="link-es" placeholder="link es">
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="link-en" class="col-form-label col-lg-3 col-sm-12">
                Link en
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input id="link-en" type="text" class="form-control m-input" name="titulo-en" placeholder="link en">
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="link-nl" class="col-form-label col-lg-3 col-sm-12">
                Link nl
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input id="link-nl" type="text" class="form-control m-input" name="titulo-nl" placeholder="link nl">
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