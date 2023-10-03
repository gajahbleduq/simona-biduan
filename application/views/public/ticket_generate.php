<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <!-- <div class="header-navbar-shadow"></div> -->
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-md-8 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header justify-content-center">
                            <h1 class="card-title font-large-1"><?= $site_title; ?></h1>
                        </div>
                        <div class="card-body">
                            <a class="row">
                                <form id="formGenerateTicket" class="formGenerateTicket" method="POST"
                                    autocomplete="off">
                                    <div class=" col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="txt_email">Email</label>
                                            <input class="form-control" id="txt_email" type="text" name="txt_email"
                                                aria-describedby="txt_email" autofocus="" tabindex="1" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="txt_phone">No. Handphone (WhatsApp)</label>
                                            <input class="form-control" id="txt_phone" type="number" name="txt_phone"
                                                aria-describedby="txt_phone" autofocus="" tabindex="2" />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-1">
                                        <label class="form-label text-info">
                                            <i class="ficon text-info" data-feather="info"></i>
                                            Informasi mengenai nomor tiket akan dikirimkan melalui email atau WhatsApp
                                            yang
                                            telah Anda berikan sebelumnya.
                                        </label>
                                    </div>

                                    <hr />

                                    <div class="col-12 mb-1">
                                        <h5 class="requiredField">Verifikasi</h5>
                                        <label class="form-label" for="txt_captcha">Berapa hasil
                                            <?=$this->session->userdata('n1')?> + <?=$this->session->userdata('n2')?> =
                                        </label>
                                        <input class="form-control" id="txt_captcha" type="number" min="0"
                                            name="txt_captcha" tabindex="3" required />
                                        <div class="invalid-feedback">Anda belum mengisi verifikasi.</div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <button type="button" class="btn btn-primary w-100" tabindex="4"
                                                onclick="generateTicket()">Generate</button>
                                        </div>
                                    </div>
                                </form>
                                <p class="text-center mt-1">
                                    <span>Sudah punya nomor tiket?</span>
                                    <a href="<?= site_url('ticket_create'); ?>">
                                        <span class="fw-bolder">Buat tiket</span>
                                    </a>
                                </p>
                                <div class="divider">
                                    <div class="divider-text">atau</div>
                                </div>
                                <p class="text-center mt-1">
                                    <span>Sudah punya akun?</span>
                                    <a href="<?= site_url('login'); ?>">
                                        <span class="fw-bolder">Masuk</span>
                                    </a>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END: Content-->

<script>
function generateTicket() {

    var formGenerateTicket = $('.formGenerateTicket');

    // Bootstrap Validation
    // --------------------------------------------------------------------
    var checkvalidity = true;
    if (formGenerateTicket.length) {
        Array.prototype.filter.call(formGenerateTicket, function(form) {
            if (form.checkValidity() === false) {
                checkvalidity = false;
                form.classList.add('invalid');
            }
            form.classList.add('was-validated');
        });
    }

    if (checkvalidity) {

        Swal.fire({
            title: 'Mohon tunggu !',
            html: 'Generate Nomor Tiket ....',
            allowOutsideClick: false,
            showConfirmButton: false
        });

        $("#formGenerateTicket").attr("action", "<?= site_url('ticket_generate')?>");
        $('#formGenerateTicket').submit();

    }

}
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
    })
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