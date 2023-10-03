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
    <title>SIMONA BIDUAN | Masuk</title>
    <link rel="apple-touch-icon" href="<?= site_url('themes') ?>/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= site_url(); ?>/assets/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/vendors/css/animate/animate.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/vendors/css/extensions/sweetalert2.min.css">
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
        href="<?= site_url('themes') ?>/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/app-assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('themes') ?>/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= site_url('themes') ?>/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static   menu-collapsed"
    data-open="click" data-menu="vertical-menu-modern" data-col="blank-page" style="
	background: url('./assets/bg2.jpg') no-repeat fixed;
		-moz-background-size: cover;
		-webkit-background-size: cover;
		-o-background-size: cover;
		background-size: 75% 100%;
	">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- <a class="brand-logo" href="<?= site_url(); ?>">
                            <img src="<?= site_url(); ?>/assets/logo.png" alt="Logo" class="img-fluid mt-0 mb-0 me-1"
                                style="height: 60px;">
                            <img src="<?= site_url(); ?>/assets/logo2.png" alt="Logo" class="img-fluid mt-0 mb-0"
                                style="width: 60px; height: 60px;">
                            <h2 class="brand-text text-primary ms-1 mt-1">SIMONA BIDUAN</h2>
                        </a> -->
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <!-- <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                                <img class="img-fluid"
                                    src="<?= site_url('themes') ?>/app-assets/images/pages/login-v2.svg"
                                    alt="Login V2" />
                            </div> -->
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <div class="d-flex align-items-center">
                                    <img src="<?= site_url(); ?>/assets/logo.png" alt="Logo"
                                        class="img-fluid mt-0 mb-0 me-1" style="width: 50px; height: 50px;">
                                    <img src="<?= site_url(); ?>/assets/logo2.png" alt="Logo"
                                        class="img-fluid mt-0 mb-0" style="width: 50px; height: 50px;">
                                    <h2 class="card-title text-primary ms-1 mt-1 fw-bolder">SIMONA BIDUAN</h2>
                                </div>
                                <h2 class="card-title fw-bold mb-1 mt-5">Sistem Monitoring Pelayanan Bidang Informasi
                                    dan
                                    Pengaduan Stakeholders</h2>

                                <p class="card-text mb-2">Silakan masuk ke akun Anda.</p>
                                <form class="auth-login-form mt-2" action="<?= site_url('login'); ?>" method="POST">
                                    <div class="mb-1">
                                        <label class="form-label" for="login-email">Email</label>
                                        <input class="form-control" id="txt_email" type="text" name="txt_email"
                                            placeholder="email@email.com" aria-describedby="login-email" autofocus=""
                                            tabindex="1" required />
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Password</label>
                                            <!-- <a
                                                href="auth-forgot-password-cover.html"><small>Forgot
                                                    Password?</small></a> -->
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="login-password"
                                                type="password" name="txt_passwd" placeholder="············"
                                                aria-describedby="login-password" tabindex="2" required /><span
                                                class="input-group-text cursor-pointer"><i
                                                    data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <!-- <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="remember-me" type="checkbox"
                                                tabindex="3" />
                                            <label class="form-check-label" for="remember-me"> Remember Me</label>
                                        </div>
                                    </div> -->
                                    <hr />
                                    <div class="mb-1">
                                        <h5>Verifikasi</h5>
                                        <label class="form-label" for="login-email">Berapa hasil
                                            <?=$this->session->userdata('n1')?> + <?=$this->session->userdata('n2')?> =
                                        </label>
                                        <input class="form-control" id="txt_captcha" type="number" min="0"
                                            name="txt_captcha" aria-describedby="login-captcha" autofocus=""
                                            tabindex="3" required />
                                    </div>
                                    <button class="btn btn-primary w-100" tabindex="4">Masuk</button>
                                </form>
                                <p class="text-center mt-2"><span>Pertama kali di sini?</span><a
                                        href="<?= site_url('register'); ?>"><span class="fw-bolder">&nbsp;Daftar
                                            akun</span></a></p>
                                <div class="divider">
                                    <div class="divider-text">atau</div>
                                </div>
                                <p class="text-center mt-2"><span>Ingin tanpa akun?</span><a
                                        href="<?= site_url('ticket_generate'); ?>"><span class="fw-bolder">&nbsp;Klik
                                            disini</span></a>
                                </p>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= site_url('themes') ?>/app-assets/js/core/app-menu.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= site_url('themes') ?>/app-assets/js/scripts/pages/auth-login.js"></script>
    <script src="<?= site_url('themes') ?>/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <!-- END: Page JS-->

    <script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
    </script>


    <?php if($this->session->flashdata('success')) { ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: "Berhasil",
            text: "<?= $this->session->flashdata('success'); ?>",
            icon: 'success',
            confirmButtonText: 'Baik, saya mengerti!',
            customClass: {
                confirmButton: 'btn btn-success',
            },
            buttonsStyling: false
        });
    });
    </script>
    <?php } ?>

    <?php if($this->session->flashdata('error')) { ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: "Gagal",
            text: "<?= $this->session->flashdata('error'); ?>",
            icon: 'error',
            confirmButtonText: 'Baik, saya mengerti!',
            customClass: {
                confirmButton: 'btn btn-danger',
            },
            buttonsStyling: false
        });
    });
    </script>
    <?php } ?>


</body>
<!-- END: Body-->




</html>
