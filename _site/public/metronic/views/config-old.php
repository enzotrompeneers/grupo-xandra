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
                                        Config (old)
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="nueva-pagina" action="#" method="get">
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
                                    <label for="clave" class="col-form-label col-12 col-sm-3">
                                        Clave
                                    </label>
                                    <div class="input-group col-12 col-sm-9 col-xl-4">
                                        <input id="clave" type="text" class="form-control m-input" name="clave" placeholder="clave" aria-describedby="basic-addon2">
                                        <span class="input-group-addon" id="basic-addon2">
                                            <i class="la la-key"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="valor" class="col-form-label col-12 col-sm-3">
                                        Valor
                                    </label>
                                    <div class="input-group col-12 col-sm-9 col-xl-4">
                                        <input id="valor" type="text" class="form-control m-input" name="valor" placeholder="valor" aria-describedby="basic-addon2">
                                        <span class="input-group-addon" id="basic-addon2">
                                            <i class="la la-info-circle"></i>
                                        </span>
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

                        <div class="m-portlet__body">

                            <div class="row">
                                <div class="col-xl-12">
                                    <?php include 'includes/search.php' ?>
                                    <!--begin: Datatable -->
                                    <table class="config-table" id="config-table" width="100%">
                                        <thead>
                                            <tr>
                                                <th title="id">
                                                    Id
                                                </th>
                                                <th title="Clave">
                                                    Clave
                                                </th>
                                                <th title="valor">
                                                    Valor
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
                                                        clave
                                                    </td>
                                                    <td>
                                                        valor
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <!--end: Datatable -->
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