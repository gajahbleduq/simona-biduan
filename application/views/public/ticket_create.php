<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <!-- <div class="header-navbar-shadow"></div> -->
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header justify-content-center">
                            <h1 class="card-title font-large-1"><?= $site_title; ?></h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form id="formCreateTicket" action="<?= site_url('ticket_create') ?>"
                                    class="formCreateTicket" method="POST" enctype="multipart/form-data"
                                    autocomplete="off">
                                    <div class="col-12 mb-1">
                                        <label class="form-label requiredField" for="no_ticket">Nomor Tiket</label>
                                        <input type="text" id="txt_noticket" name="txt_noticket" class="form-control"
                                            value="" autofocus="" required />
                                        <div class="invalid-feedback">Mohon masukkan nomor tiket.</div>
                                    </div>
                                    <div class=" col-12">
                                        <div class="mb-1">
                                            <label class="form-label requiredField" for="txt_email">Validasi email atau
                                                no handphone sesuai nomor tiket</label>
                                            <input class="form-control" id="txt_valid" type="text" name="txt_valid"
                                                placeholder="Masukkan alamat email atau no handphone"
                                                aria-describedby="txt_email" required />
                                        </div>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <label class="form-label requiredField" for="full_name">Nama Lengkap</label>
                                        <input type="text" id="txt_fullname" name="txt_fullname" class="form-control"
                                            value="" required />
                                        <div class="invalid-feedback">Mohon masukkan nama lengkap.</div>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <label class="form-label requiredField" for="address">Alamat</label>
                                        <input type="text" id="txt_address" name="txt_address" class="form-control"
                                            value="" required />
                                        <div class="invalid-feedback">Mohon masukkan alamat lengkap.</div>
                                    </div>
                                    <hr />
                                    <div class="col-12 mb-1">
                                        <label class="form-label requiredField" for="title">Judul</label>
                                        <input type="text" id="txt_title" name="txt_title" class="form-control" value=""
                                            required />
                                        <div class="invalid-feedback">Mohon masukkan judul tiket.</div>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <label class="form-label requiredField" for="description">Deskripsi</label>
                                        <textarea name="txt_description" id="txt_description" class="form-control"
                                            required></textarea>
                                        <div class="invalid-feedback">Mohon masukkan deskripsi tiket.</div>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="date">Tanggal Kejadian</label>
                                        <input type="text" class="form-control dateReport flatpickr-date-time"
                                            name="txt_date" id="txt_date" />
                                    </div>
                                    <div class="col-12 mb-1">
                                        <table class="table" id="table_file">
                                            <tr>
                                                <td style="padding: 0; padding-bottom: 10px">
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <div class="mb-1">
                                                                <div>
                                                                    <label class="form-label" for="file-name">Nama
                                                                        File</label>
                                                                    <input type="text" class="form-control"
                                                                        name="add_file[]" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-1">
                                                                <div>
                                                                    <label class="form-label"
                                                                        for="upload">Unggah</label>
                                                                    <input type="file" class="form-control"
                                                                        name="uploadfile[]"
                                                                        accept=".gif, .jpg, .png, .doc, .docx, .pdf" />
                                                                    <p><small class="text-muted">Max Size 2Mb , Type:
                                                                            .gif, .jpg, .png, .doc, .docx, .pdf</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2"
                                                            style="display: flex; align-items: center">
                                                            <button type="button"
                                                                class="btn btn-outline-danger text-nowrap px-1">
                                                                <i data-feather="trash-2" class="me-25"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-icon btn-primary" type="button" id="btnAddFile">
                                                <i data-feather="plus" class="me-25"></i>
                                                <span>Tambah File</span>
                                            </button>
                                        </div>
                                    </div>

                                    <hr />

                                    <div class="col-12 mb-1">
                                        <h5 class="requiredField">Verifikasi</h5>
                                        <label class="form-label" for="txt_captcha">Berapa hasil
                                            <?=$this->session->userdata('n1')?> + <?=$this->session->userdata('n2')?> =
                                        </label>
                                        <input class="form-control" id="txt_captcha" type="number" min="0"
                                            name="txt_captcha" required />
                                        <div class="invalid-feedback">Anda belum mengisi verifikasi.</div>
                                    </div>

                                    <div class="col-12 text-center mt-2 pt-50 mb-1">
                                        <button type="button" onclick="submitform()" class="btn btn-primary me-1">Buat
                                            Tiket</button>
                                    </div>
                                </form>
                                <div class="divider">
                                    <div class="divider-text">atau</div>
                                </div>
                                <p class="text-center mt-1">
                                    <span>Belum punya nomor tiket?</span>
                                    <a href="<?= site_url('ticket_generate'); ?>">
                                        <span class="fw-bolder">Klik disini</span>
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
document.addEventListener('DOMContentLoaded', function() {

    // Picker
    var picker = $('.dateReport');
    picker.flatpickr({
        allowInput: true,
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        defaultDate: Date.now()
    });

    //add file modal create ticket
    $('#btnAddFile').click(function() {
        var td = `<td style="padding: 0; padding-bottom: 10px; padding-top: 10px;">
					<div class="row">
						<div class="col-lg-10">
							<div class="mb-1">
								<div>
									<label class="form-label" for="file-name">File Name</label>
									<input type="text" class="form-control" name="add_file[]" />
								</div>
							</div>
							<div class="mb-1">
								<div>
									<label class="form-label" for="upload">Upload</label>
									<input type="file" class="form-control" name="uploadfile[]" accept=".gif, .jpg, .png, .doc, .docx, .pdf" />
								</div>
							</div>
						</div>
						<div class="col-lg-2" style="display: flex; align-items: center">
							<button type="button" class="btn btn-outline-danger text-nowrap px-1">
								<i data-feather="trash-2" class="me-25"></i>
							</button>
						</div>
					</div>
				</td>`;
        var tr = '<tr>' + td + '</tr>';
        $('#table_file').find('tbody').append(tr);

        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }

    });

    //remove file modal create ticket
    $('#table_file').on('click', 'button', function(e) {
        var table = document.getElementById("table_file");
        var tbodyRowCount = table.tBodies[0].rows.length;
        if (tbodyRowCount > 1) {
            var rowtemplatetable = $(this).closest("tr");
            rowtemplatetable.remove();
        }
    });

});


function submitform() {

    var formCreateTicket = $('.formCreateTicket');

    // Picker
    var picker = $('.dateReport');
    if (picker.length) {
        picker.flatpickr({
            allowInput: true,
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
            defaultDate: Date.now()
        });
    }

    // Bootstrap Validation
    // --------------------------------------------------------------------
    var checkvalidity = true;
    if (formCreateTicket.length) {
        Array.prototype.filter.call(formCreateTicket, function(form) {
            if (form.checkValidity() === false) {
                checkvalidity = false;
                form.classList.add('invalid');
            }
            form.classList.add('was-validated');
        });
    }

    if (checkvalidity) {

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Isian telah sesuai',
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Ok, saya yakin!",
            cancelButtonText: 'Tidak, batalkan',
            allowOutsideClick: false,
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-outline-danger ms-1'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                $('#formCreateTicket').submit();
            }
        });

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
    });
});
</script>
<?php } ?>

<?php if($this->session->flashdata('error')) { ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: "Gagal",
        html: "<?= $this->session->flashdata('error'); ?>",
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