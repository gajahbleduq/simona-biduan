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
        href="<?= site_url('themes') ?>/app-assets/css/core/menu/menu-types/vertical-menu.css">
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
    <?php
	if ($site_title === 'Dashboards')
	{
		?>
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/app-assets/css/pages/page-faq.css">
    <!-- END: Page CSS-->
    <?php
	}
	?>
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

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                                data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav align-items-center">
                    <li class="nav-item d-block d-lg-block">
                        <h2 class="brand-text mt-0 mb-0 text-primary fw-bolder" style="font-size: 18px;">SIMONA BIDUAN
                        </h2>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <!-- <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                            data-feather="moon"></i></a></li> -->
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span
                                class="user-name fw-bolder"><?= $this->user_nama; ?></span><span
                                class="user-status"><?php if($this->user_level == 1 ) { echo "Admin"; } else if($this->user_level == 2 ) { echo "Public"; } else if($this->user_level == 3 || $this->user_level == 4) { echo $this->user_instansi; } ?></span>
                        </div>
                        <span class="avatar">
                            <img class="round" src="<?= $this->user_photo; ?>" alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="<?= site_url('account/profile') ?>"><i class="me-50"
                                data-feather="user"></i>
                            Akun</a><a class="dropdown-item" href="<?= site_url('logout') ?>"><i class="me-50"
                                data-feather="power"></i> Keluar</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a href="#">
                <h6 class="section-label mt-75 mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="<?= site_url('themes') ?>/app-assets/images/icons/xls.png" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                            Manager</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="<?= site_url('themes') ?>/app-assets/images/icons/jpg.png" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="<?= site_url('themes') ?>/app-assets/images/icons/pdf.png" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                            Marketing Manager</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="<?= site_url('themes') ?>/app-assets/images/icons/doc.png" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web
                            Designer</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a href="#">
                <h6 class="section-label mt-75 mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="<?= site_url('themes') ?>/app-assets/images/portrait/small/avatar-s-8.jpg" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="<?= site_url('themes') ?>/app-assets/images/portrait/small/avatar-s-1.jpg" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="<?= site_url('themes') ?>/app-assets/images/portrait/small/avatar-s-14.jpg" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                            Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="<?= site_url('themes') ?>/app-assets/images/portrait/small/avatar-s-6.jpg" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between"><a
                class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="me-75"
                        data-feather="alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>

    <!-- END: Header-->