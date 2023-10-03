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
                                <li class="breadcrumb-item"><a href="#">Pengaturan Akun </a>
                                </li>
                                <li class="breadcrumb-item active"> <?= $site_title; ?>
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
                            <a class="nav-link active" href="<?= site_url('account/profile'); ?>">
                                <i data-feather="user" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Akun</span>
                            </a>
                        </li>
                        <!-- security -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('account/chgpass'); ?>">
                                <i data-feather="lock" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Keamanan</span>
                            </a>
                        </li>
                    </ul>

                    <!-- profile -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Detail Profil</h4>
                        </div>
                        <div class="card-body py-2 my-25">
                            <!-- form -->
                            <form action="<?= site_url('account/profile/edit/') . $data_users['id']; ?>"
                                enctype="multipart/form-data" class="validate-form" method="POST">
                                <div class="d-flex">
                                    <a href="#" class="me-25">
                                        <img src="<?= $this->user_photo; ?>" id="account-upload-img"
                                            class="uploadedAvatar rounded me-50" alt="profile image" height="100"
                                            width="100" />
                                    </a>
                                    <div class="d-flex align-items-end mt-75 ms-1">
                                        <div>
                                            <label for="account-upload"
                                                class="btn btn-sm btn-primary mb-75 me-75">Unggah</label>
                                            <input type="file" class="mb-75 me-75" id="account-upload" name="edit_photo"
                                                accept="image/*" hidden />
                                            <button type="button" id="account-reset"
                                                class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                            <p class="mb-0">Tipe file yang diizinkan: png, jpg, jpeg.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2 pt-50">
                                    <div class="row">
                                        <div class="col-12 mb-1">
                                            <label class="form-label" for="modalEditUserName">Nama
                                                Lengkap</label>
                                            <input type="text" id="edit_nama" name="edit_nama" class="form-control"
                                                value="<?= $data_users['full_name']; ?>" required />
                                        </div>
                                        <div class="col-12 col-md-6 mb-1">
                                            <label class="form-label" for="modalEditUserEmail">Email</label>
                                            <input type="text" id="edit_email" name="edit_email"
                                                class="form-control bg-white" value="<?= $data_users['email']; ?>"
                                                required readonly />
                                        </div>
                                        <div class="col-12 col-md-6 mb-1">
                                            <label class="form-label" for="modalEditUserHandphone">No. Handphone</label>
                                            <input type="number" id="edit_phone" name="edit_phone" class="form-control"
                                                value="<?= $data_users['phone']; ?>" required />
                                        </div>
                                        <div class="col-12 mb-1">
                                            <label class="form-label" for="modalEditAddress">Alamat</label>
                                            <textarea name="edit_address" id="edit_address" class="form-control"
                                                required><?= $data_users['address']; ?></textarea>
                                        </div>
                                        <div class="col-12 text-start mt-2 pt-50">
                                            <button type="submit" class="btn btn-primary me-1">Simpan</button>
                                            <button type="reset" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                    </div>
                    <!--/ profile -->
                </div>
            </div>

        </div>

        <?php } ?>

    </div>
</div>
<!-- END: Content-->

<script>
var accountUploadImg = $('#account-upload-img'),
    accountUploadBtn = $('#account-upload'),
    accountUserImage = $('.uploadedAvatar'),
    accountResetBtn = $('#account-reset');

if (accountUserImage) {
    var resetImage = accountUserImage.attr('src');
    accountUploadBtn.on('change', function(e) {
        var reader = new FileReader(),
            files = e.target.files;
        reader.onload = function() {
            if (accountUploadImg) {
                accountUploadImg.attr('src', reader.result);
            }
        };
        reader.readAsDataURL(files[0]);
    });

    accountResetBtn.on('click', function() {
        accountUserImage.attr('src', resetImage);
    });
}
</script>

<?php if($this->session->flashdata('success')) { ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: "Berhasil",
        text: "<?= $this->session->flashdata('success'); ?>",
        icon: 'success',
        confirmButtonText: 'Baik, saya mengertiOk, got it!',
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