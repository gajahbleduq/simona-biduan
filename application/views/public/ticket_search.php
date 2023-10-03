<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <!-- <div class="header-navbar-shadow"></div> -->
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-8 col-12">
                    <section id="faq-search-filter">
                        <div class="card faq-search rounded-3"
                            style="background: linear-gradient(118deg, #1e365c, rgba(30, 54, 92, 0.7))">

                            <div
                                class="card-body text-center d-flex flex-column justify-content-center align-items-center">

                                <!-- main title -->
                                <h2 class="text-white">Mencari status tiket Anda?</h2>

                                <!-- subtitle -->
                                <p class="card-text mb-2 text-white">
                                    atau Anda belum membuat tiket.
                                    <span class="text-white"
                                        onclick="window.location.href = '<?= site_url('ticket_generate') ?>'"
                                        style="cursor: pointer; font-weight: bold">Klik disini</span>
                                </p>

                                <form id="formSearchTicket" class="row gy-1 formSearchTicket w-75" method="POST">

                                    <div class="col-12 text-start">

                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                <i data-feather="search"></i>
                                            </span>
                                            <input type="text" class="form-control" id="txbSearchTicket"
                                                aria-describedby="inputGroupPrepend" name="searchTicket"
                                                placeholder="Masukkan No Tiket Anda" required />
                                            <div class="invalid-feedback">Mohon masukkan nomor tiket anda.</div>
                                        </div>

                                    </div>

                                    <hr />

                                    <div class="col-12 text-start">
                                        <h5 class="text-white">Verifikasi</h5>
                                        <label class="form-label text-white" for="txt_captcha">Berapa hasil
                                            <?=$this->session->userdata('n1')?> + <?=$this->session->userdata('n2')?> =
                                        </label>
                                        <input class="form-control" id="txt_captcha" type="number" min="0"
                                            name="txt_captcha" required />
                                        <div class="invalid-feedback">Anda belum mengisi verifikasi.</div>
                                    </div>

                                </form>

                                <div class="col-12 text-center rounded-3" style="margin-top: 20px; ">
                                    <button type="button" class="btn btn-warning w-25"
                                        onclick="searchTicket()">Cari</button>
                                </div>

                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->

<script>
function searchTicket() {

    var formSearchTicket = $('.formSearchTicket');

    // Bootstrap Validation
    // --------------------------------------------------------------------
    var checkvalidity = true;
    if (formSearchTicket.length) {
        Array.prototype.filter.call(formSearchTicket, function(form) {
            if (form.checkValidity() === false) {
                checkvalidity = false;
                form.classList.add('invalid');
            }
            form.classList.add('was-validated');
        });
    }

    if (checkvalidity) {

        var form = $("#formSearchTicket");
        var formData = new FormData();
        formData.append('searchTicket', $("#txbSearchTicket").val());
        formData.append('txt_captcha', $('#txt_captcha').val());

        Swal.fire({
            title: 'Mohon tunggu !',
            html: 'Mencari Data Tiket ....',
            allowOutsideClick: false,
            showConfirmButton: false
        });

        $.ajax({
            url: "<?= site_url('commist/search_ticket'); ?>",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {

                Swal.close();

                var dataParse = JSON.parse(data);
                if (dataParse.data === null) {

                    Swal.fire({
                        title: 'Warning!',
                        text: dataParse.message,
                        icon: 'warning',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false,
                        allowOutsideClick: false
                    });

                } else {
                    $("#formSearchTicket").attr("action", "<?= site_url('ticket_log')?>");
                    $('#formSearchTicket').submit();
                }

            },
            error: function(request, status, error) {
                console.log(error);
            }
        });

    }

}
</script>
<?php