<!--begin::Form-->
<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="paginas-textos" action="#" method="get">
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

        <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary m-tabs-line--2x" role="tablist">
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#art-es" role="tab">
                    <img src="../assets/app/media/img/icons/es.gif" alt="es">
                    Art es
                </a>
            </li>
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link" data-toggle="tab" href="#art-en" role="tab">
                    <img src="../assets/app/media/img/icons/en.gif" alt="es">
                    Art en
                </a>
            </li>
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link" data-toggle="tab" href="#art-nl" role="tab">
                    <img src="../assets/app/media/img/icons/nl.gif" alt="es">
                    Art nl
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="art-es" role="tabpanel">
                <div class="form-group row">
                    <div class="col-lg-12">
                        <div id="art-es" class="summernote" name="art-es"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="art-en" role="tabpanel">
                <div class="form-group row">
                    <div class="col-lg-12">
                        <div id="art-en" class="summernote" name="art-en"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="art-nl" role="tabpanel">
                <div class="form-group row">
                    <div class="col-lg-12">
                        <div id="art-en" class="summernote" name="art-nl"></div>
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