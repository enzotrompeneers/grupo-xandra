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
                                        Paginas
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="m-portlet__body">
                            <!--begin::Portlet-->
                            <div class="m-portlet m-portlet--success m-portlet--head-solid-bg m-portlet--head-sm m-portlet--collapsed" data-portlet="true" id="m_portlet_tools_1">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <div class="m-portlet__head-tools">
                                                <ul class="m-portlet__nav">
                                                    <li class="m-portlet__nav-item">
                                                        <a href=""  data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon">
                                                            <i class="la la-plus"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h3 class="m-portlet__head-text">
                                                Nueva pagina
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-portlet__body">
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
                                                <label for="pagina" class="col-form-label col-12 col-sm-3">
                                                    Nueva pagina
                                                </label>
                                                <div class="input-group col-12 col-sm-9 col-xl-4">
                                                    <input id="pagina" type="text" class="form-control m-input" name="pagina" placeholder="nueva pagina" aria-describedby="basic-addon2">
                                                    <span class="input-group-addon" id="basic-addon2">
                                                    <i class="la la-plus"></i>
                                                </span>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-12 col-sm-3">
                                                    Clase
                                                </label>
                                                <div class="col-12 col-sm-9 col-xl-4">
                                                    <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="clase">
                                                        <option value="ninguno">
                                                            Ninguno
                                                        </option>
                                                        <option value="inicio">
                                                            Inicio
                                                        </option>
                                                        <option value="inicio">
                                                            Inicio
                                                        </option>
                                                        <option value="viviendas">
                                                            Viviendas
                                                        </option>
                                                        <option value="empresa">
                                                            Empresa
                                                        </option>
                                                        <option value="contacto">
                                                            Contacto
                                                        </option>
                                                        <option value="politica-privacidad">
                                                            Politica-privacidad
                                                        </option>
                                                        <option value="aviso-legal">
                                                            Aviso-legal
                                                        </option>
                                                        <option value="politica-cookies">
                                                            Politica-cookies
                                                        </option>
                                                    </select>
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
                            <!--end::Portlet-->

                            <!--begin::Portlet-->
                            <div class="m-portlet m-portlet--accent m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_1">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <div class="m-portlet__head-tools">
                                                <ul class="m-portlet__nav">
                                                    <li class="m-portlet__nav-item">
                                                        <a href=""  data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon">
                                                            <i class="la la-plus"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h3 class="m-portlet__head-text">
                                                Editar pagina
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-portlet__body">
                                    <div class="row">
                                        <div class="col-12 col-xl-5">
                                            <menu id="nestable-menu">
                                                <button type="button" class="btn btn-primary m-btn  m-btn--icon" data-action="expand-all">
                                                    <i class="fa fa-expand"></i>
                                                    Expand All
                                                </button>
                                                <button type="button" class="btn btn-primary m-btn  m-btn--icon" data-action="collapse-all">
                                                    <i class="fa fa-compress"></i>
                                                    Collapse All
                                                </button>
                                            </menu>
                                            <div class="cf nestable-lists">
                                                <div class="dd" id="nestable">
                                                    <ol class="dd-list">
                                                        <h1>Menu principal</h1>
                                                        <li class="dd-item" data-id="1">
                                                            <div class="dd-handle">
                                                                <button class="btn btn-accent m-btn  m-btn--icon e-left btn-move">
                                                                    <i class="fa fa-arrows"></i>
                                                                </button>
                                                                inicio
                                                                <a href="#" class="btn btn-accent m-btn  m-btn--icon e-right pagina-editar">
                                                                    <i class="fa fa-edit"></i>
                                                                    Editar
                                                                </a>
                                                            </div>
                                                        </li>

                                                        <li class="dd-item" data-id="2">
                                                            <div class="dd-handle">
                                                                <button class="btn btn-accent m-btn  m-btn--icon e-left btn-move">
                                                                    <i class="fa fa-arrows"></i>
                                                                </button>
                                                                viviendas
                                                                <a href="#" class="btn btn-accent m-btn  m-btn--icon e-right pagina-editar">
                                                                    <i class="fa fa-edit"></i>
                                                                    Editar
                                                                </a>
                                                            </div>

                                                            <ol class="dd-list">
                                                                <li class="dd-item" data-id="3">
                                                                    <div class="dd-handle">
                                                                        <button class="btn btn-accent m-btn  m-btn--icon e-left btn-move">
                                                                            <i class="fa fa-arrows"></i>
                                                                        </button>
                                                                        empresa
                                                                        <a href="#" class="btn btn-accent m-btn  m-btn--icon e-right pagina-editar">
                                                                            <i class="fa fa-edit"></i>
                                                                            Editar
                                                                        </a>
                                                                    </div>
                                                                </li>

                                                                <li class="dd-item" data-id="4">
                                                                    <div class="dd-handle">
                                                                        <button class="btn btn-accent m-btn  m-btn--icon e-left btn-move">
                                                                            <i class="fa fa-arrows"></i>
                                                                        </button>
                                                                        contacto
                                                                        <a href="#" class="btn btn-accent m-btn  m-btn--icon e-right pagina-editar">
                                                                            <i class="fa fa-edit"></i>
                                                                            Editar
                                                                        </a>
                                                                    </div>
                                                                </li>

                                                                <li class="dd-item" data-id="5">
                                                                    <div class="dd-handle">
                                                                        <button class="btn btn-accent m-btn  m-btn--icon e-left btn-move">
                                                                            <i class="fa fa-arrows"></i>
                                                                        </button>
                                                                        politica-privacidad
                                                                        <a href="#" class="btn btn-accent m-btn  m-btn--icon e-right pagina-editar">
                                                                            <i class="fa fa-edit"></i>
                                                                            Editar
                                                                        </a>
                                                                    </div>
                                                                </li>

                                                                <li class="dd-item" data-id="6">
                                                                    <div class="dd-handle">
                                                                        <button class="btn btn-accent m-btn  m-btn--icon e-left btn-move">
                                                                            <i class="fa fa-arrows"></i>
                                                                        </button>
                                                                        aviso-legal
                                                                        <a href="#" class="btn btn-accent m-btn  m-btn--icon e-right pagina-editar">
                                                                            <i class="fa fa-edit"></i>
                                                                            Editar
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ol>
                                                        </li>

                                                        <li class="dd-item" data-id="11">
                                                            <div class="dd-handle">
                                                                <button class="btn btn-accent m-btn  m-btn--icon e-left btn-move">
                                                                    <i class="fa fa-arrows"></i>
                                                                </button>
                                                            politica-cookies
                                                            <a href="#" class="btn btn-accent m-btn  m-btn--icon e-right pagina-editar">
                                                                <i class="fa fa-edit"></i>
                                                                Editar
                                                            </a>
                                                            </div>
                                                        </li>
                                                    </ol>

                                                    <ol class="dd-list">
                                                        <h1>Fuera de menu</h1>
    

                                                        <li class="dd-item" data-id="12">
                                                            Arrastre y suelte aquí
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-7">
                                            <div id="portlet-editar" class="m-portlet m-portlet--accent m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" style="display: none;">
                                                <div class="m-portlet__head">
                                                    <div class="m-portlet__head-caption">
                                                        <div class="m-portlet__head-title">
                                                            
                                                            <h3 class="m-portlet__head-text">
                                                                Editar: pagename
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="m-portlet__body">
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#general">
                                                                General
                                                            </a>
                                                        </li>
                                                    
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#seo">
                                                                Seo
                                                            </a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#textos">
                                                                Textos
                                                            </a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#imagenes">
                                                                Imagenes
                                                            </a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#documentos">
                                                                Documentos
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="general" role="tabpanel">
                                                            <?php include 'includes/paginas/general.php' ?>
                                                        </div>

                                                        <div class="tab-pane" id="seo" role="tabpanel">
                                                            <?php include 'includes/paginas/seo.php' ?>
                                                        </div>

                                                        <div class="tab-pane" id="textos" role="tabpanel">
                                                            <?php include 'includes/paginas/textos.php' ?>
                                                        </div>

                                                        <div class="tab-pane" id="imagenes" role="tabpanel">
                                                            <?php include 'includes/paginas/imagenes.php' ?>
                                                        </div>

                                                        <div class="tab-pane" id="documentos" role="tabpanel">
                                                            <?php include 'includes/paginas/documentos.php' ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="m-portlet__foot m-portlet__foot--fit pull-right">
                                                    <button type="button" class="btn btn-danger" id="m_sweetalert_demo_8">
                                                        <i class="fa fa-trash"></i>
                                                        Borrar pagina
                                                    </button>
                                                </div>
                                            </div>
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
