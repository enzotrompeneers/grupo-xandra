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
                                        Config 
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
                                    <a class="nav-link" data-toggle="tab" href="#viviendas">
                                        Viviendas
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#medio-social">
                                        Medio Social
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#lugar">
                                        Lugar
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="principal" role="tabpanel">
                                   <?php include 'includes/config/principal.php' ?>
                                </div>

                                <div class="tab-pane" id="viviendas" role="tabpanel">
                                    <?php include 'includes/config/viviendas.php' ?>
                                </div>

                                <div class="tab-pane" id="medio-social" role="tabpanel">
                                    <?php include 'includes/config/medio-social.php' ?>
                                </div>

                                <div class="tab-pane" id="lugar" role="tabpanel">
                                    <?php include 'includes/config/lugar.php' ?>
                                </div>
                            </div>
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