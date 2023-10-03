    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0"><?= $site_title; ?></h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboards'); ?>">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Pengaturan Akun</a>
                                    </li>
                                    <li class="breadcrumb-item active"><?= $site_title; ?>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if(!empty($data_users)) { ?>

            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills mb-2">
                            <!-- account -->
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('account/profile'); ?>">
                                    <i data-feather="user" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Akun</span>
                                </a>
                            </li>
                            <!-- security -->
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= site_url('account/chgpass'); ?>">
                                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Keamanan</span>
                                </a>
                            </li>
                        </ul>

                        <!-- security -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Ubah Password</h4>
                            </div>
                            <div class="card-body pt-1">
                                <!-- form -->
                                <form action="<?= site_url('account/chgpass/edit/') . $data_users['id']; ?>"
                                    class="validate-form" method="POST">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="old_password">Password
                                                Lama</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control" id="old_password"
                                                    name="old_password" placeholder="Enter current password"
                                                    data-msg="Please current password" required />
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="new_password">Password Baru</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" id="new_password" name="new_password"
                                                    class="form-control" placeholder="Enter new password" required />
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="retype_password">Ulangi
                                                Password Baru</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control" id="retype_password"
                                                    name="retype_password" placeholder="Confirm your new password"
                                                    required />
                                                <div class="input-group-text cursor-pointer"><i data-feather="eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="fw-bolder">Persyaratan Kata Sandi:</p>
                                            <ul class="ps-1 ms-25">
                                                <li class="mb-50">Minimal panjang 8 karakter - semakin panjang, semakin
                                                    baik</li>
                                                <li class="mb-50">Setidaknya satu karakter huruf kecil</li>
                                                <li>Setidaknya satu angka, simbol, atau karakter spasi</li>
                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-1 mt-1">Simpan</button>
                                            <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
                                        </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>
                        <!--/ security -->
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
    <!-- END: Content-->

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