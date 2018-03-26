<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="paginas-seo" action="#" method="get">
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
            <label for="slug-es" class="col-form-label col-lg-3 col-sm-12">
                Slug es
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input id="slug-es" type="text" class="form-control m-input" name="slug-es" placeholder="slug es">
            </div>
        </div>
        
        <div class="form-group m-form__group row">
            <label for="slug-en" class="col-form-label col-lg-3 col-sm-12">
                Slug en
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input id="slug-en" type="text" class="form-control m-input" name="slug-en" placeholder="slug en">
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="slug-nl" class="col-form-label col-lg-3 col-sm-12">
                Slug nl
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input id="slug-nl" type="text" class="form-control m-input" name="slug-nl" placeholder="slug nl">
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="meta-descr-es" class="col-form-label col-lg-3 col-sm-12">
                Meta descr es
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <textarea class="form-control m-input" id="meta-descr-es" rows="3"></textarea>
                <div id="meta-descr-es-feedback"></div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="meta-descr-en" class="col-form-label col-lg-3 col-sm-12">
                Meta descr en
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <textarea class="form-control m-input" id="meta-descr-en" rows="3"></textarea>
                <div id="meta-descr-en-feedback"></div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="meta-descr-nl" class="col-form-label col-lg-3 col-sm-12">
                Meta descr nl
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <textarea class="form-control m-input" id="meta-descr-nl" rows="3"></textarea>
                <div id="meta-descr-nl-feedback"></div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="meta-key-es" class="col-form-label col-lg-3 col-sm-12">
                Meta key es
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="row">
                    <div class="col-lg-7">
                        <input class="form-control m-input" id="meta-key-es"></input>
                    </div>
                    <div class="col-lg-5">
                        <button id="meta-key-es-btn" class="btn btn-success pull-right">Nueva key</button>
                    </div>
                </div>
                <div id="meta-key-es-tag" class="tags"></div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="meta-key-en" class="col-form-label col-lg-3 col-sm-12">
                Meta key en
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="row">
                    <div class="col-lg-7">
                        <input class="form-control m-input" id="meta-key-en"></input>
                    </div>
                    <div class="col-lg-5">
                        <button id="meta-key-en-btn" class="btn btn-success pull-right">Nueva key</button>
                    </div>
                </div>
                
                
                <div id="meta-key-en-tag" class="tags"></div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="meta-key-nl" class="col-form-label col-lg-3 col-sm-12">
                Meta key nl
            </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="row">
                    <div class="col-lg-7">
                        <input class="form-control m-input" id="meta-key-nl"></input>
                    </div>
                    <div class="col-lg-5">
                        <button id="meta-key-nl-btn" class="btn btn-success pull-right">Nueva key</button>
                    </div>
                </div>
                <div id="meta-key-nl-tag" class="tags"></div>
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