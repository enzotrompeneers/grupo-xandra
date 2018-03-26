<?php include 'includes/header.php' ?>
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">	
    <?php include 'includes/sidebar.php' ?>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <?php include 'includes/breadcrumb.php' ?>
                <?php include 'includes/pill-menu.php' ?>
            </div>
        </div>
        <!-- END: Subheader -->
		<div class="m-content">
			<div class="row">
                <div class="col-xl-12">
                    <!--begin::Portlet-->
                    <div class="m-portlet">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Email client
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="email-client" action="#" method="get">
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
                                        Idioma
                                    </label>
                                    <div class="col-12 col-sm-9 col-xl-4">
                                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="ideoma">
                                            <option value="es">
                                                Es
                                            </option>
                                            <option value="en">
                                                En
                                            </option>
                                            <option value="nl">
                                                Nl
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-12 col-sm-3">
                                        !vivienda
                                    </label>
                                    <div class="col-12 col-sm-6 col-xl-4">
                                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="clase">
                                            <option value="test">
                                                Test -
                                            </option>
                                            <option value="test2">
                                                Test 2 - 
                                            </option>
                                            <option value="test3">
                                                Test 3 -
                                            </option>
                                        </select>
                                    </div>
                                    
                                    <div class="input-group col-12 col-sm-3">
                                        <a href="#" class="btn btn-success m-btn m-btn--icon">
                                            <span>
                                                <i class="fa fa-plus"></i>
                                                <span>
                                                    Anadir
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="email" class="col-form-label col-12 col-sm-3">
                                        Email
                                    </label>
                                    <div class="input-group col-12 col-sm-6 col-xl-4">
                                        <input id="email" type="text" class="form-control m-input" name="email" placeholder="email" aria-describedby="basic-addon2">
                                        <span class="input-group-addon" id="basic-addon2">
                                            <i class="la la-envelope"></i>
                                        </span>
                                    </div>
                                    <div class="input-group col-12 col-sm-3">
                                        <a href="#" class="btn btn-success m-btn m-btn--icon">
                                            <span>
                                                <i class="fa fa-plus"></i>
                                                <span>
                                                    Anadir
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="asunto" class="col-form-label col-12 col-sm-3">
                                        Asunto
                                    </label>
                                    <div class="input-group col-12 col-sm-9 col-xl-4">
                                        <input id="asunto" type="text" class="form-control m-input" name="asunto" placeholder="asunto" aria-describedby="basic-addon2">
                                        <span class="input-group-addon" id="basic-addon2">
                                            <i class="la la-institution"></i>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-12 col-sm-3">
                                        Mensaje
                                    </label>
                                    <div class="col-12 col-sm-9">
                                        <div class="summernote" name="mensaje"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions">
                                    <div class="row">
                                        <div class="col-lg-9 ml-lg-auto">
                                            <button type="submit" class="btn btn-success enviar">
                                                !enviar
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
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Body -->

<?php include 'includes/footer.php' ?>