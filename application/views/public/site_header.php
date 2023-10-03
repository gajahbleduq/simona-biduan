<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Sistem Monitoring Pelayanan Bidang Informasi dan Pengaduan Stakeholders adalah solusi perangkat lunak komprehensif yang dirancang untuk mengelola dan melacak keluhan stakeholder secara efisien dalam sebuah organisasi, khususnya terkait dengan Kementerian Hukum dan Hak Asasi Manusia Republik Indonesia (Polhukam RI). Sistem ini menyediakan platform terpadu bagi para stakeholder untuk mengirimkan masukan mereka, melaporkan masalah, atau mengajukan keluhan terkait layanan. Selain itu, sistem ini juga memfasilitasi proses internal untuk mengelola dan menyelesaikan keluhan-keluhan ini dengan efektif. Dikembangkan oleh Tomi Mulhartono, sebagai Full Stack Developer.">
    <meta name="keywords"
        content="layanan pengaduan, manajemen keluhan, sistem pemantauan, stakeholders, solusi perangkat lunak, aplikasi, pengelolaan, Tomi Mulhartono">
    <meta name="author" content="Tomi Mulhartono">
    <title><?=$this->config->item('app_name')?> | <?= $site_title; ?></title>
    <link rel="apple-touch-icon" href="<?= site_url('themes') ?>/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= site_url(); ?>/assets/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/vendors/css/animate/animate.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/app-assets/css/pages/app-invoice-list.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/css/plugins/forms/pickers/form-pickadate.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/app-assets/css/pages/page-faq.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/assets/css/style.css">
    <!-- END: Custom CSS-->

    <!-- BEGIN: Vendor JS-->
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js">
    </script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js">
    </script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js">
    </script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js">
    </script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/charts/chart.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= site_url('themes') ?>/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/js/scripts/forms/form-repeater.js"></script>
    <!-- END: Page JS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="" style="
	background: url('./assets/bg1.jpg') no-repeat center center fixed;
		-moz-background-size: cover;
		-webkit-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center"
        data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none" style="left: 90% !important;">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="navbar-brand" href="<?= site_url(); ?>">
                        <img src="<?= site_url(); ?>/assets/logo.png" alt="Logo" class="img-fluid mt-0 mb-0 me-1"
                            style="width: 50px; height: 50px;">
                        <img src="<?= site_url(); ?>/assets/logo2.png" alt="Logo" class="img-fluid mt-0 mb-0"
                            style="width: 50px; height: 50px;">
                    </a></li>
            </ul>
        </div>
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                                data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center">
                <li class="nav-item d-block d-lg-block">
                    <a href="<?= site_url(); ?>">
                        <h2 class="brand-text mt-0 mb-0 text-primary fw-bolder" style="font-size: 18px;">
                            <span class="d-xl-block d-none">SISTEM
                                MONITORING PELAYANAN BIDANG INFORMASI DAN PENGADUAN STAKEHOLDERS (SIMONA BIDUAN)
                            </span>
                            <span class="d-xl-none">SIMONA BIDUAN</span>
                        </h2>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item">
                    <div style="height: 40px; width: 40px;">
                    </div>
                </li>
            </ul>

        </div>
    </nav>

    <!-- END: Header-->