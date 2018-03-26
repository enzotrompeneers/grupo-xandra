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
                                        Panoramicas
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#principal">
                                        Principal
                                    </a>
                                </li>
                            
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#caracteristicas">
                                        Imagenes
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="principal" role="tabpanel">
                                   <?php include 'includes/panoramicas/principal.php' ?>
                                </div>

                                <div class="tab-pane" id="caracteristicas" role="tabpanel">
                                    <?php include 'includes/panoramicas/imagenes.php' ?>
                                </div>
                            </div>
                            <!-- add url in 'horizontal.js' of the json file to add the content to the table -->
                            
                            <?php include 'includes/search.php' ?>
                            <!--begin: Datatable -->
                            <table class="panoramicas-table" id="panoramicas-table" width="100%">
                                <thead>
                                    <tr>
                                        <th title="id">
                                            Id
                                        </th>
                                        <th title="image">
                                            Image
                                        </th>
                                        <th title="nombre es">
                                            Nombre es
                                        </th>
                                        <th title="nombre en">
                                            Nombre en
                                        </th>
                                        <th title="nombre nl">
                                            Nombre nl
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
                                                image
                                            </td>
                                            <td>
                                                nombre es
                                            </td>
                                            <td>
                                                nombre en
                                            </td>
                                            <td>
                                                nombre nl
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
        </div>
    </div>
</div>
<!-- end:: Body -->

<?php include 'includes/footer.php' ?>