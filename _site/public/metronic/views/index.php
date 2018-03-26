<?php include 'includes/header.php' ?>
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">	
    <?php include 'includes/sidebar.php' ?>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Dashboard
                    </h3>
                </div>
                <div>
                    <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                        <span class="m-subheader__daterange-label">
                            <span class="m-subheader__daterange-title"></span>
                            <span class="m-subheader__daterange-date m--font-brand"></span>
                        </span>
                        <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                            <i class="la la-angle-down"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <div class="m-content">
            <div class="row">
                <div class="col-xl-4">
                    <?php include 'includes/dashboard/trends.php' ?>
                </div>

                <div class="col-xl-4">
                    <?php include 'includes/dashboard/activity.php' ?>
                </div>

                <div class="col-xl-4">
                    <?php include 'includes/dashboard/blog.php' ?>
                </div>
            </div>

            <div class="m-portlet">
                <?php include 'includes/dashboard/stats.php' ?>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <?php include 'includes/dashboard/calendar.php' ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <?php include 'includes/dashboard/tasks.php' ?>
                </div>

                <div class="col-xl-6">
                    <?php include 'includes/dashboard/support-tickets.php' ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <?php include 'includes/dashboard/recent-activities.php' ?>
                </div>

                <div class="col-xl-6 col-lg-12">
                    <?php include 'includes/dashboard/recent-notifications.php' ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8">
                    <?php include 'includes/dashboard/exclusive-datatable.php' ?>
                </div>

                <div class="col-xl-4">
                    <?php include 'includes/dashboard/audit.php' ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4">
                    <?php include 'includes/dashboard/sales.php' ?>
                </div>

                <div class="col-xl-4">
                    <?php include 'includes/dashboard/inbound-bandwidth.php' ?>
                </div>

                <div class="col-xl-4">
                    <?php include 'includes/dashboard/top-products.php' ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8">
                    <?php include 'includes/dashboard/best-sellers.php' ?>
                </div>

                <div class="col-xl-4">
                    <?php include 'includes/dashboard/authors-profit.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>