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
                                        Traducciones
                                    </h3>
                                </div>
                            </div>
                        </div>
    
                        <div class="m-portlet__body">
                            <!--begin::Portlet-->
                            <div class="row">
                                <div class="col-12 text-right small-margin">
                                    <button id="traducciones-nueva" type="button" class="btn btn-success m-btn  m-btn--icon">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>
                                                Nueva clave
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-right upload-download">
                                    <label id="import-csv" for="file-upload" class="btn btn-primary m-btn  m-btn--icon">
                                        <i class="la la-upload"></i>
                                        Importar csv
                                    </label>
                                    <input id="file-upload" type="file" accept=".csv"/>

                                    <button id="export-csv" type="button" class="btn btn-primary m-btn  m-btn--icon">
                                        <i class="la la-download"></i>
                                        Exportar csv
                                    </button>
                                </div>
                                <div class="col-xl-12">
                                    <?php include 'includes/search.php' ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6 medium-margin">
                                    <!--begin: Datatable -->
                                    <table class="traducciones-nueva" id="traducionnes-neuvo-table" width="100%">
                                        <thead>
                                            <tr>
                                                <th title="id">
                                                    Id
                                                </th>
                                                <th title="Clave">
                                                    Clave
                                                </th>
                                                <th title="tradducion">
                                                    Traduccion
                                                </th>
                                                <th title="comportamiento">
                                                    Comportamiento
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0, $max = 10; $i <= $max; $i++) { ?>
                                                <tr>
                                                    <td>
                                                        id
                                                    </td>
                                                    <td>
                                                        palabra
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                <!--end: Datatable -->
                                </div>
                                
                                <div class="col-xl-6">
                                    <div id="portlet-nueva" class="m-portlet m-portlet--success m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" style="display: none;">
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-title">
                                                    <h3 class="m-portlet__head-text">
                                                        Nueva clave
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="m-portlet__body">
                                        <!--begin::Form-->
                                            <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="traducciones-nuevo" action="#" method="get">
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
                                                        <label for="clave" class="col-form-label col-lg-3 col-sm-12">
                                                            Clave
                                                        </label>
                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                            <input id="clave" type="text" class="form-control m-input" name="clave" placeholder="clave">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="es" class="col-form-label col-lg-3 col-sm-12">
                                                            Es
                                                        </label>
                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                            <input id="es" type="text" class="form-control m-input" name="es" placeholder="es">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="en" class="col-form-label col-lg-3 col-sm-12">
                                                            En
                                                        </label>
                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                            <input id="en" type="text" class="form-control m-input" name="en" placeholder="en">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="nl" class="col-form-label col-lg-3 col-sm-12">
                                                            Nl
                                                        </label>
                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                            <input id="nl" type="text" class="form-control m-input" name="nl" placeholder="nl">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="art-es" class="col-form-label col-lg-3 col-sm-12">
                                                            Art es
                                                        </label>
                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                            <textarea id="art-es" class="form-control m-input" rows="3" name="art-es" placeholder="art es"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="art-en" class="col-form-label col-lg-3 col-sm-12">
                                                            Art en
                                                        </label>
                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                        <textarea id="art-en" class="form-control m-input" rows="3" name="art-en" placeholder="art en"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="art-nl" class="col-form-label col-lg-3 col-sm-12">
                                                            Art nl
                                                        </label>
                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                        <textarea id="art-nl" class="form-control m-input" rows="3" name="art-nl" placeholder="art nl"></textarea>
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
                                        </div>
                                    </div>

                                    <div class="m-portlet m-portlet--warning m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="portlet-editar" style="display: none;">
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-title">
                                                    <h3 class="m-portlet__head-text">
                                                        Editar
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="m-portlet__body">
                                        <!--begin::Form-->
                                            <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="traduccione-editar" action="#" method="get">
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
                                                        <label for="clave" class="col-form-label col-lg-3 col-sm-12">
                                                            Clave
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="clave" type="text" class="form-control m-input" name="clave" placeholder="clave">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="es" class="col-form-label col-lg-3 col-sm-12">
                                                            ES
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="es" type="text" class="form-control m-input" name="es" placeholder="es">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="en" class="col-form-label col-lg-3 col-sm-12">
                                                            EN
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="en" type="text" class="form-control m-input" name="en" placeholder="en">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="nl" class="col-form-label col-lg-3 col-sm-12">
                                                            NL
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="nl" type="text" class="form-control m-input" name="nl" placeholder="nl">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="art-es" class="col-form-label col-lg-3 col-sm-12">
                                                            Art es
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="art-es" type="textarea" class="form-control m-input" name="art-es" placeholder="art es">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="art-es" class="col-form-label col-lg-3 col-sm-12">
                                                            Art en
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="art-en" type="text" class="form-control m-input" name="art en" placeholder="art-en">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="art-es" class="col-form-label col-lg-3 col-sm-12">
                                                            Art nl
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="art-nl" type="text" class="form-control m-input" name="art-nl" placeholder="art nl">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="m-portlet__foot m-portlet__foot--fit">
                                                    <div class="m-form__actions m-form__actions">
                                                        <div class="row">
                                                            <div class="col-lg-9 ml-lg-auto">
                                                                <button type="submit" class="btn btn-accent">
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
                                        </div>
                                    </div>

                                    <div class="m-portlet m-portlet--danger m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="portlet-borrar" style="display: none;">
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-title">
                                                    <h3 class="m-portlet__head-text">
                                                        Borrar
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="m-portlet__body">
                                        <!--begin::Form-->
                                            <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="traducciones-borrar" action="#" method="get">
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
                                                        <label for="clave" class="col-form-label col-lg-3 col-sm-12">
                                                            Clave
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="clave" type="text" class="form-control m-input" name="clave" placeholder="clave">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="es" class="col-form-label col-lg-3 col-sm-12">
                                                            ES
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="es" type="text" class="form-control m-input" name="es" placeholder="es">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="en" class="col-form-label col-lg-3 col-sm-12">
                                                            EN
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="en" type="text" class="form-control m-input" name="en" placeholder="en">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="nl" class="col-form-label col-lg-3 col-sm-12">
                                                            NL
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="nl" type="text" class="form-control m-input" name="nl" placeholder="nl">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="art-es" class="col-form-label col-lg-3 col-sm-12">
                                                            Art es
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="art-es" type="textarea" class="form-control m-input" name="art-es" placeholder="art es">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="art-es" class="col-form-label col-lg-3 col-sm-12">
                                                            Art en
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="art-en" type="text" class="form-control m-input" name="art en" placeholder="art-en">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="art-es" class="col-form-label col-lg-3 col-sm-12">
                                                            Art nl
                                                        </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <input id="art-nl" type="text" class="form-control m-input" name="art-nl" placeholder="art nl">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="m-portlet__foot m-portlet__foot--fit">
                                                    <div class="m-form__actions m-form__actions">
                                                        <div class="row">
                                                            <div class="col-lg-9 ml-lg-auto">
                                                                <button type="submit" class="btn btn-accent">
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
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!--end::Portlet-->
                        </div>
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Body -->

<?php include 'includes/footer.php' ?>