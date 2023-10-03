    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl"
            role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
            <div class="navbar-header mb-2">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item me-auto">
                        <a class="navbar-brand" href="<?= 	site_url(); ?>">
                            <img src="<?= site_url(); ?>/assets/logo.png" alt="Logo" class="img-fluid mt-0 mb-0 me-1"
                                style="width: 50px; height: 50px;">
                            <img src="<?= site_url(); ?>/assets/logo2.png" alt="Logo" class="img-fluid mt-0 mb-0"
                                style="width: 50px; height: 50px;">
                        </a>
                    </li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0"
                            data-bs-toggle="collapse"><i
                                class="d-block d-xl-none text-primary toggle-icon font-medium-4"
                                data-feather="x"></i></a>
                    </li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include <?= site_url('themes') ?>/includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="<?php if($site_menu == "ticket_generate") { echo "active"; } ?>">
                        <a class="nav-link d-flex align-items-center" href="<?= site_url('ticket_generate') ?>">
                            <i data-feather="file-plus"></i>
                            <span data-i18n="Buat Tiket">Buat Tiket</span>
                        </a>
                    </li>
                    <li class="<?php if($site_menu == "ticket_search") { echo "active"; } ?>">
                        <a class="nav-link d-flex align-items-center" href="<?= site_url('ticket_search'); ?>">
                            <i data-feather="search"></i>
                            <span data-i18n="Cari Tiket">Cari Tiket</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->