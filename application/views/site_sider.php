<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="<?= 	site_url('dashboards'); ?>">
                    <!-- <span class="brand-logo">

                    </span> -->
                    <img src="<?= site_url(); ?>/assets/logo.png" alt="Logo" class="img-fluid mt-0 mb-0 me-2"
                        style="width: 50px; height: 50px;">
                    <img src="<?= site_url(); ?>/assets/logo2.png" alt="Logo" class="img-fluid mt-0 mb-0"
                        style="width: 50px; height: 50px;">
                </a>
            </li>
            <li class="nav-item nav-toggle mt-1">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x">
                    </i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc">
                    </i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content mt-1">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class="<?php if($site_menu == "dashboards") { echo "active"; } ?> nav-item"><a
                    class="d-flex align-items-center" href="<?= site_url('dashboards'); ?>"><i
                        data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="Dashboards">Dashboards</span></a>
            </li>
            <?php if($this->user_level != 3) { ?>
            <li class="<?php if($site_menu == "all_tickets") { echo "active"; } ?> nav-item"><a
                    class="d-flex align-items-center" href="<?= site_url('all_tickets'); ?>"><i
                        data-feather="mail"></i><span class="menu-title text-truncate" data-i18n="All Tickets">Semua
                        Tiket</span></a>
            </li>
            <li class="<?php if($site_menu == "ticket_status") { echo "active"; } ?> nav-item"><a
                    class="d-flex align-items-center" href="<?= site_url('submitted'); ?>"><i
                        data-feather="file-text"></i><span class="menu-title text-truncate"
                        data-i18n="All Tickets">Status
                        Tiket</span></a>
            </li>
            <?php } else { ?>
            <li class="<?php if($site_menu == "ticket_status") { echo "active"; } ?> nav-item"><a
                    class="d-flex align-items-center" href="<?= site_url('ins/followedup'); ?>"><i
                        data-feather="file-text"></i><span class="menu-title text-truncate"
                        data-i18n="All Tickets">Status
                        Tiket</span></a>
            </li>
            <?php } ?>
            <?php if($this->user_level == 1) { ?>
            <li class=" navigation-header"><span data-i18n="Administration">Administrasi</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class="<?php if($site_menu == "adm_user") { echo "active"; } ?> nav-item"><a
                    class="d-flex align-items-center" href="<?= site_url('adm_user') ?>"><i
                        data-feather="users"></i><span class="menu-title text-truncate"
                        data-i18n="User Administration">Administrasi Pengguna</span></a>
            </li>
            <li class="<?php if($site_menu == "adm_instansi") { echo "active"; } ?> nav-item"><a
                    class="d-flex align-items-center" href="<?= site_url('adm_instansi') ?>"><i
                        data-feather="command"></i><span class="menu-title text-truncate"
                        data-i18n="User Administration">Administrasi Instansi</span></a>
            </li>
            <li class="<?php if($site_menu == "adm_survey") { echo "active"; } ?> nav-item"><a
                    class="d-flex align-items-center" href="<?= site_url('adm_survey') ?>"><i
                        data-feather="clipboard"></i><span class="menu-title text-truncate"
                        data-i18n="User Administration">Administrasi Survey</span></a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>


<!-- END: Main Menu-->