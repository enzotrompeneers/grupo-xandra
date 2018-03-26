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
                                        Contactos
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="contactos" action="#" method="get">
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
                                    <label for="nombre" class="col-form-label col-12 col-sm-3">
                                        Nombre
                                    </label>
                                   <div class="input-group col-12 col-sm-9 col-xl-4">
                                        <input id="nombre" type="text" class="form-control m-input" name="nombre" placeholder="nombre" aria-describedby="basic-addon2">
                                        <span class="input-group-addon" id="basic-addon2">
                                            <i class="la la-user"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="email" class="col-form-label col-12 col-sm-3">
                                        Email
                                    </label>
                                   <div class="input-group col-12 col-sm-9 col-xl-4">
                                        <input id="email" type="text" class="form-control m-input" name="email" placeholder="email" aria-describedby="basic-addon2">
                                        <span class="input-group-addon" id="basic-addon2">
                                            <i class="la la-envelope"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="telefono" class="col-form-label col-12 col-sm-3">
                                        Telefono
                                    </label>
                                   <div class="input-group col-12 col-sm-9 col-xl-4">
                                        <input id="telefono" type="text" class="form-control m-input" name="telefono" placeholder="telefono" aria-describedby="basic-addon2">
                                        <span class="input-group-addon" id="basic-addon2">
                                            <i class="la la-phone"></i>
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

                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-12 col-sm-3">
                                        Fecha
                                    </label>
                                   <div class="input-group col-12 col-sm-9 col-xl-4">
                                        <div class='input-group date' id='m_datepicker'>
                                            <input id="m_datepicker_1" type='text' class="form-control m-input" readonly name="fecha" placeholder="fecha"/>
                                            <span class="input-group-addon">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="ip" class="col-form-label col-12 col-sm-3">
                                        Ip
                                    </label>
                                   <div class="input-group col-12 col-sm-9 col-xl-4">
                                        <input id="ip" type="text" class="form-control m-input" name="ip" placeholder="ip" aria-describedby="basic-addon2">
                                        <span class="input-group-addon" id="basic-addon2">
                                            <i class="la la-info-circle"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-12 col-sm-3">
                                        Header
                                    </label>
                                    <div class="col-12 col-sm-9">
                                        <div class="summernote" name="header"></div>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-12 col-sm-3">
                                        Email completo
                                    </label>
                                    <div class="col-12 col-sm-9">
                                        <div class="summernote" name="email-completo"></div>
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

                        <div class="m-portlet__body">
                            <?php include 'includes/search.php' ?>
                            <!--begin: Datatable -->
                            <table class="contactos-table" id="contactos-table" width="100%">
                                <thead>
                                    <tr>
                                        <th title="id">
                                            Id
                                        </th>
                                        <th title="fecha">
                                            Fecha
                                        </th>
                                        <th title="clave">
                                            Clave
                                        </th>
                                        <th title="nombre">
                                            Nombre
                                        </th>
                                        <th title="email">
                                            Email
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
                                                fecha
                                            </td>
                                            <td>
                                                clave
                                            </td>
                                            <td>
                                                nombre
                                            </td>
                                            <td>
                                                email
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!--end: Datatable -->
                        </div>
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