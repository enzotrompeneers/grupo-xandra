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
                                        Viviendas
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
                                        Caracteristicas
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#superficies">
                                        Superficies
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#distancias">
                                        Distancias
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#opciones">
                                        Opciones
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#precios">
                                        Precios
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#descripciones">
                                        Descripciones
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#publicacion">
                                        Publicacion
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#notas-acceso">
                                        Notas acceso
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#mapa">
                                        Mapa
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#imagenes">
                                        Imagenes
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#meta">
                                        Meta
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="principal" role="tabpanel">
                                   <?php include 'includes/viviendas/principal.php' ?>
                                </div>

                                <div class="tab-pane" id="caracteristicas" role="tabpanel">
                                    <?php include 'includes/viviendas/caracteristicas.php' ?>
                                </div>

                                <div class="tab-pane" id="superficies" role="tabpanel">
                                    <?php include 'includes/viviendas/superficies.php' ?>
                                </div>

                                <div class="tab-pane" id="distancias" role="tabpanel">
                                    <?php include 'includes/viviendas/distancias.php' ?>
                                </div>

                                <div class="tab-pane" id="opciones" role="tabpanel">
                                    <?php include 'includes/viviendas/opciones.php' ?>
                                </div>

                                <div class="tab-pane" id="precios" role="tabpanel">
                                    <?php include 'includes/viviendas/precios.php' ?>
                                </div>

                                <div class="tab-pane" id="descripciones" role="tabpanel">
                                    <?php include 'includes/viviendas/descripciones.php' ?>
                                </div>

                                <div class="tab-pane" id="publicacion" role="tabpanel">
                                    <?php include 'includes/viviendas/publicacion.php' ?>
                                </div>

                                <div class="tab-pane" id="notas-acceso" role="tabpanel">
                                    <?php include 'includes/viviendas/notas-acceso.php' ?>
                                </div>

                                <div class="tab-pane" id="mapa" role="tabpanel">
                                   <?php include 'includes/viviendas/mapa.php' ?>
                                </div>

                                <div class="tab-pane" id="imagenes" role="tabpanel">
                                   <?php include 'includes/viviendas/imagenes.php' ?>
                                </div>

                                <div class="tab-pane" id="meta" role="tabpanel">
                                   <?php include 'includes/viviendas/meta.php' ?>
                                </div>
                            </div>
                            <!-- add url in 'horizontal.js' of the json file to add the content to the table -->
                            
                            <?php include 'includes/search.php' ?>
                            <!--begin: Datatable -->
                            <table class="viviendas" id="viviendas-table" width="100%">
                                <thead>
                                    <tr>
                                        <th title="id">
                                            Id
                                        </th>
                                        <th title="image">
                                            Image
                                        </th>
                                        <th title="referencia">
                                            Referencia
                                        </th>
                                        <th title="tipo">
                                            Tipo
                                        </th>
                                        <th title="localidad">
                                            Localidad
                                        </th>
                                        <th title="precio de venta">
                                            Precio de venta
                                        </th>
                                        <th title="visible">
                                            Visible
                                        </th>
                                        <th title="destecado">
                                            Destecado
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
                                                referencia
                                            </td>
                                            <td>
                                                tipo
                                            </td>
                                            <td>
                                                localidad
                                            </td>
                                            <td>
                                                precio de venta
                                            </td>
                                            <td>
                                                visible
                                            </td>
                                            <td>
                                                destecado
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td>
                                            id
                                        </td>
                                        <td>
                                            testing search
                                        </td>
                                        <td>
                                            testing search
                                        </td>
                                        <td>
                                            testing search
                                        </td>
                                        <td>
                                            testing search
                                        </td>
                                        <td>
                                            testing search
                                        </td>
                                        <td>
                                            testing search
                                        </td>
                                        <td>
                                            testing search
                                        </td>
                                    </tr>
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