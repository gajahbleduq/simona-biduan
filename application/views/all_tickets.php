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
                                <li class="breadcrumb-item active"><?= $site_title; ?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="float-start mb-0">Status Tiket</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="#">
                                <div class="card btn-outline-primary text-primary">
                                    <div class="card-header">
                                        <div>
                                            <h2 class="fw-bolder mb-0 text-primary"><?= $count_all ?></h2>
                                            <p class="card-text">Total</p>
                                        </div>
                                        <div class="avatar bg-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i data-feather="file-text" class="font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="<?= site_url('submitted'); ?>">
                                <div class="card btn-outline-primary text-primary">
                                    <div class="card-header">
                                        <div>
                                            <h2 class="fw-bolder mb-0 text-primary"><?= $count_submitted ?></h2>
                                            <p class="card-text">Diajukan</p>
                                        </div>
                                        <div class="avatar bg-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i data-feather="file-plus" class="font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="<?= site_url('accepted'); ?>">
                                <div class="card btn-outline-success text-success">
                                    <div class="card-header">
                                        <div>
                                            <h2 class="fw-bolder mb-0 text-success"><?= $count_accepted ?></h2>
                                            <p class="card-text">Diterima</p>
                                        </div>
                                        <div class="avatar bg-success p-50 m-0">
                                            <div class="avatar-content">
                                                <i data-feather="check" class="font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="<?= site_url('rejected'); ?>">
                                <div class="card btn-outline-danger text-danger">
                                    <div class="card-header">
                                        <div>
                                            <h2 class="fw-bolder mb-0 text-danger"><?= $count_rejected ?></h2>
                                            <p class="card-text">Ditolak</p>
                                        </div>
                                        <div class="avatar bg-danger p-50 m-0">
                                            <div class="avatar-content">
                                                <i data-feather="x" class="font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="<?= site_url('processed'); ?>">
                                <div class="card btn-outline-dark text-dark">
                                    <div class="card-header">
                                        <div>
                                            <h2 class="fw-bolder mb-0 text-dark"><?= $count_processed ?></h2>
                                            <p class="card-text">Diproses</p>
                                        </div>
                                        <div class="avatar bg-dark p-50 m-0">
                                            <div class="avatar-content">
                                                <i data-feather="clock" class="font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="<?= site_url('discussed'); ?>">
                                <div class="card btn-outline-info text-info">
                                    <div class="card-header">
                                        <div>
                                            <h2 class="fw-bolder mb-0 text-info"><?= $count_discussed ?></h2>
                                            <p class="card-text">Didiskusikan</p>
                                        </div>
                                        <div class="avatar bg-info p-50 m-0">
                                            <div class="avatar-content">
                                                <i data-feather="users" class="font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="<?= site_url('recommended'); ?>">
                                <div class="card btn-outline-secondary text-secondary">
                                    <div class="card-header">
                                        <div>
                                            <h2 class="fw-bolder mb-0 text-secondary"><?= $count_recommended ?></h2>
                                            <p class="card-text">Direkomendasikan</p>
                                        </div>
                                        <div class="avatar bg-secondary p-50 m-0">
                                            <div class="avatar-content">
                                                <i data-feather="skip-forward" class="font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="<?= site_url('followedup'); ?>">
                                <div class="card btn-outline-warning text-warning">
                                    <div class="card-header">
                                        <div>
                                            <h2 class="fw-bolder mb-0 text-warning"><?= $count_followedup ?></h2>
                                            <p class="card-text">Diteruskan</p>
                                        </div>
                                        <div class="avatar bg-warning p-50 m-0">
                                            <div class="avatar-content">
                                                <i data-feather="trending-up" class="font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="float-start mb-0">Daftar Semua Tiket</h2>
                            </div>
                        </div>
                    </div>
                    <?php if($this->user_level == 2 ) { ?>
                    <div class="content-header-right text-md-end col-md-3 col-12">
                        <button type="button" class="btn btn-primary rounded-3" data-bs-toggle="modal"
                            data-bs-target="#addTicket">
                            <i data-feather='plus'></i>
                            Buat Tiket
                        </button>
                    </div>
                    <?php } ?>
                    <form action="<?= site_url('all_tickets'); ?>" method="POST">
                        <div class="demo-inline-spacing justify-content-center ">
                            <div class="btn btn-outline-primary rounded-3">
                                <i data-feather="calendar" class="font-medium-3"></i>
                                <input type="text" id="filter_date" name="filter_date"
                                    class="flatpickr-range border-0 shadow-none bg-transparent pe-0 text-center"
                                    placeholder="<?php if(!empty($filter_date)) { echo $filter_date; } else { echo "- Rentang Tanggal -"; } ?>" />
                            </div>
                            <button type="submit" class="btn btn-primary rounded-3">Filter</button>
                        </div>
                    </form>
                </div>
                <div class="content-body">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="datatables-basic table" id="datatable1">
                            <thead>
                                <tr>
                                    <th>No. Tiket</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Dibuat pada</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Status</th>
                                    <th>Diubah Pada</th>
                                    <th>Diubah Oleh</th>
                                    <th>Status Selesai</th>
                                    <th>Diselesaikan Pada</th>
                                    <th>Diselesaikan Oleh</th>
                                    <th>Diteruskan Pada</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (sizeof($data_reports)>0) {
                                    for ($i=0;$i<sizeof($data_reports);$i++) {
                                        $id = $data_reports[$i]["id"];
                                        $noticket = $data_reports[$i]["no_ticket"];
                                        $title = $data_reports[$i]["title"];
                                        $description = $data_reports[$i]["description"];
                                        $date = $data_reports[$i]["date"];
                                        $status = $data_reports[$i]["status"];
                                        $created_at = $data_reports[$i]["created_at"];
                                        $created_by = $data_reports[$i]["created_name"];
                                        $updated_at = $data_reports[$i]["updated_at"];
                                        $updated_by = $data_reports[$i]["updated_name"];
                                        $is_finished = $data_reports[$i]["is_finished"];
                                        $finished_at = $data_reports[$i]["finished_at"];
                                        $finished_by = $data_reports[$i]["finished_name"];
                                        $instansi_name = $data_reports[$i]["instansi_name"];

                                        $xstatus = "";
                                        if ($status=="1") { 
                                            $xstatus = "<span class='badge bg-primary'>Diajukan</span>"; 
                                        }
                                        if ($status=="2") { 
                                            $xstatus = "<span class='badge bg-success'>Diterima</span>"; 
                                        }	
                                        if ($status=="3") { 
                                            $xstatus = "<span class='badge bg-danger'>Ditolak</span>"; 
                                        }	
                                        if ($status=="4") { 
                                            $xstatus = "<span class='badge bg-dark'>Diproses</span>"; 
                                        }	
                                        if ($status=="5") { 
                                            $xstatus = "<span class='badge bg-info'>Didiskusikan</span>"; 
                                        }	
                                        if ($status=="6") { 
                                            $xstatus = "<span class='badge bg-secondary'>Direkomendasikan</span>"; 
                                        }	
                                        if ($status=="7") { 
                                            $xstatus = "<span class='badge bg-warning'>Diteruskan</span>"; 
                                        }	

										if ($is_finished=="0") { 
                                            $xfinished = "<span class='badge bg-danger'>Belum Selesai</span>"; 
                                        }	
                                        if ($is_finished=="1") { 
                                            $xfinished = "<span class='badge bg-success'>Sudah Selesai</span>"; 
                                        }
                                        ?>
                                <tr>
                                    <td><?php echo $noticket; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $description; ?></td>
                                    <td><?php echo $this->general->datetime_indo($date); ?></td>
                                    <td><?php echo $this->general->datetime_indo($created_at); ?></td>
                                    <td><?php echo $created_by; ?></td>
                                    <td><?php echo $xstatus; ?></td>
                                    <td><?php if($updated_at == "") { echo "-"; } else { echo $this->general->datetime_indo($updated_at); } ?>
                                    </td>
                                    <td><?php if($updated_by == "") { echo "-"; } else { echo $updated_by; } ?></td>
                                    <td><?php echo $xfinished; ?></td>
                                    <td><?php if($finished_at == "") { echo "-"; } else { echo $this->general->datetime_indo($finished_at); } ?>
                                    </td>
                                    <td><?php if($finished_by == "") { echo "-"; } else { echo $finished_by; } ?></td>
                                    <td><?php if($instansi_name == "") { echo "-"; } else { echo $instansi_name; } ?>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-content-center">
                                            <?php if($status == 1 && $this->user_level == 2) { ?>

                                            <button class="btn btn-sm btn-warning rounded me-1"
                                                onclick="showModalEdit(this)" data-id="<?=$id;?>"
                                                data-noticket="<?=$noticket;?>" data-title="<?=$title;?>"
                                                data-description="<?=$description;?>" data-date="<?=$date;?>"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Tiket">
                                                <i data-feather='edit-2'></i>
                                            </button>

                                            <button type="button"
                                                class="btn btn-sm btn-danger rounded delete-confirm me-1"
                                                data-id="<?php echo $id; ?>" data-noticket="<?php echo $noticket; ?>"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Tiket">
                                                <i data-feather='trash'></i>
                                            </button>

                                            <?php } ?>
                                            <a href="<?= site_url('ticket/') . $noticket; ?>"
                                                class="btn btn-sm btn-primary rounded" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Lihat Tiket">
                                                <i data-feather='eye'></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Add -->
        <div class="modal fade" id="addTicket" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Buat Tiket</h1>
                        </div>
                        <form id="formCreateTicket" action="<?= site_url('all_tickets/add') ?>"
                            class="row gy-1 pt-75 formCreateTicket" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            <div class="col-12">
                                <label class="form-label requiredField" for="title">Judul</label>
                                <input type="text" id="add_title" name="add_title" class="form-control" value=""
                                    required />
                                <div class="invalid-feedback">Mohon masukkan judul tiket.</div>
                            </div>
                            <div class="col-12">
                                <label class="form-label requiredField" for="description">Deskripsi</label>
                                <textarea name="add_description" id="add_description" class="form-control"
                                    required></textarea>
                                <div class="invalid-feedback">Mohon masukkan deskripsi tiket.</div>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="add_date">Tanggal</label>
                                <input type="text" class="form-control dateReport flatpickr-date-time" name="add_date"
                                    id="add_date" />
                            </div>
                            <div class="col-12">
                                <table class="table" id="table_file">
                                    <tr>
                                        <td style="padding: 0; padding-bottom: 10px">
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <div class="mb-1">
                                                        <div>
                                                            <label class="form-label" for="file-name">Nama File</label>
                                                            <input type="text" class="form-control" name="add_file[]" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-1">
                                                        <div>
                                                            <label class="form-label" for="upload">Unggah</label>
                                                            <input type="file" class="form-control" name="uploadfile[]"
                                                                accept=".gif, .jpg, .png, .doc, .docx, .pdf" />
                                                            <p><small class="text-muted">Max Size 2Mb , Type: .gif,
                                                                    .jpg, .png, .doc, .docx, .pdf</small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2" style="display: flex; align-items: center">
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

                            <div class="col-12 text-center mt-2 pt-50">
                                <button type="button" onclick="submitform()" class="btn btn-primary me-1">Buat</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Batalkan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="editTicket" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Ubah Informasi Tiket</h1>
                            <h4>No Tiket <span id="spanNoTicket"></span></h4>
                        </div>
                        <form id="formEditTicket" class="row gy-1 pt-75 formEditTicket" method="POST"
                            enctype="multipart/form-data" action="<?= site_url('all_tickets/edit') ?>">
                            <input type="hidden" id="edit_id" name="edit_id" class="form-control" />
                            <input type="hidden" id="edit_no_ticket" name="edit_no_ticket" class="form-control" />
                            <input type="hidden" id="edit_report_log_id" name="edit_report_log_id"
                                class="form-control" />
                            <div class="col-12 mb-1">
                                <label class="form-label requiredField" for="title">Judul</label>
                                <input type="text" id="edit_title" name="edit_title" class="form-control" required />
                                <div class="invalid-feedback">Mohon masukkan judul tiket.</div>
                            </div>
                            <div class="col-12 mb-1">
                                <label class="form-label requiredField" for="description">Deskripsi</label>
                                <textarea name="edit_description" id="edit_description" class="form-control"
                                    required></textarea>
                                <div class="invalid-feedback">Mohon masukkan deskripsi tiket.</div>
                            </div>
                            <div class="col-12">
                                <label class="form-label requiredField" for="edit_date">Tanggal</label>
                                <input type="text" class="form-control dateReportEdit flatpickr-date-time"
                                    name="edit_date" id="edit_date" />
                            </div>
                            <div class="col-12">
                                <table class="table" id="table_file_edit">
                                    <tbody></tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-icon btn-primary" type="button" id="btnAddFileEdit"
                                        onclick="createRowFileEdit()">
                                        <i data-feather="plus" class="me-25"></i>
                                        <span>Tambah File</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-12 text-center mt-2 pt-50">
                                <button type="button" class="btn btn-primary me-1"
                                    onclick="submitformedit()">Ubah</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Batalkan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- END: Content-->

<script>
$("#datatable1").DataTable({
    scrollY: true,
    scrollX: true,
    scrollCollapse: true,
    paging: true,
    searching: true,
});

document.addEventListener('DOMContentLoaded', function() {

    $('#datatable1').on('draw.dt', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }

        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    // Picker
    var picker = $('.dateReport');
    picker.flatpickr({
        allowInput: true,
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        defaultDate: Date.now()
    });

    $('.delete-confirm').click(function() {
        const id = $(this).data('id');
        const noticket = $(this).data('noticket');

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikannya!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus itu!',
            cancelButtonText: 'Batalkan',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ms-1'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= site_url('all_tickets/delete/'); ?>' + id + '/' +
                    noticket;
            }
        });
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
										<p><small class="text-muted">Max Size 2Mb , Type: .gif, .jpg, .png, .doc, .docx, .pdf</small></p>
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

function removeRowFileEdit(btndel) {
    var table = document.getElementById("table_file_edit");
    var tbodyRowCount = table.tBodies[0].rows.length;
    var rowtemplatetable = $(btndel).closest("tr");
    rowtemplatetable.remove();
}

function createRowFileEdit(id = '', file_name = '', file_url = '', type = '') {

    if (id == '') {

        var td = `<td style="padding: 0; padding-bottom: 10px; padding-top: 10px;">
						<div class="row">
							<div class="col-1" style="display: flex; align-items: center">
								<button type="button" class="btn btn-outline-danger text-nowrap px-1" onclick="removeRowFileEdit(this)">
									<i data-feather="trash-2" class="me-25"></i>
								</button>
							</div>
							<div class="col-11">
                                <div class="mb-1">
                                    <div>
                                        <label class="form-label" for="file-name">Nama File</label>
                                        <input type="text" class="form-control" name="add_file_edit_baru[]" value="` +
            file_name + `" />
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div>
                                        <label class="form-label" for="upload">Unggah</label>
                                        <input type="file" class="form-control" name="uploadfileeditbaru[]" accept=".gif, .jpg, .png, .doc, .docx, .pdf" />
										<p><small class="text-muted">Max Size 2Mb , Type: .gif, .jpg, .png, .doc, .docx, .pdf</small></p>
                                    </div>
                                </div>
							</div>
						</div>
					</td>`;

    } else {

        var iconButton = `<i data-feather="image" class="me-25"></i>`;
        if (type === 'file') {
            iconButton = `<i data-feather="file-text" class="me-25"></i>`
        }
        var fileName = type;
        if (file_name !== '') {
            fileName = file_name
        }
        var button = `<button type="button" class="btn btn-outline-primary">
								` + iconButton + `
								<span>` + fileName + `</span>
							</button>`;

        var td = `<td style="padding: 0; padding-bottom: 10px; padding-top: 10px;">
						<div class="row">
							<div class="col-1" style="display: flex; align-items: center">
								<button type="button" class="btn btn-outline-danger text-nowrap px-1" onclick="removeRowFileEdit(this)">
									<i data-feather="trash-2" class="me-25"></i>
								</button>
							</div>
							<div class="col-11">
								<input type="hidden" class="form-control" name="id_report_file[]" value="` + id + `" />
								<a href="` + file_url + `" target="_blank">` + button + `</a>
							</div>
						</div>
					</td>`;

    }

    var tr = '<tr>' + td + '</tr>';
    $('#table_file_edit').find('tbody').append(tr);

    if (feather) {
        feather.replace({
            width: 14,
            height: 14
        });
    }

    return true
}

function submitformedit() {

    var formEditTicket = $('.formEditTicket');

    // Picker
    var picker = $('.dateReportEdit');
    if (picker.length) {
        picker.flatpickr({
            allowInput: true,
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true
        });
    }

    // Bootstrap Validation
    // --------------------------------------------------------------------
    var checkvalidity = true;
    if (formEditTicket.length) {
        Array.prototype.filter.call(formEditTicket, function(form) {
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


                $('#formEditTicket').submit();

            }
        });

    }
}

function showModalEdit(a) {
    Swal.fire({
        title: 'Mohon Tunggu !',
        html: 'Mencari Data Tiket ...',
        allowOutsideClick: false,
        showConfirmButton: false
    });

    var id = $(a).attr('data-id');
    var noticket = $(a).attr('data-noticket');
    var title = $(a).attr('data-title');
    var description = $(a).attr('data-description');
    var date = $(a).attr('data-date');

    $.ajax({
        url: "<?= site_url('ajax/get_file/'); ?>" + id + "/1",
        type: "GET",
        success: function(data) {

            $("#table_file_edit tr").remove();

            var dataParse = JSON.parse(data);
            if (dataParse.data !== null) {

                dataParse.data.forEach((value, index) => {

                    $('#edit_report_log_id').val(value.report_log_id);
                    createRowFileEdit(value.id_report_file, value.file_name, value.path, value.type)

                });

            } else {
                $('#edit_report_log_id').val('');
                createRowFileEdit('')
            }

        },
        error: function(request, status, error) {
            console.log(error);
        },
        complete: function() {
            Swal.close();

            $('#edit_id').val(id);
            $('#edit_no_ticket').val(noticket);
            $('#spanNoTicket').html(noticket);
            $('#edit_title').val(title);
            $('#edit_description').val(description);
            $('#edit_date').val(date);

            var flatpickr = $("#edit_date").flatpickr({
                allowInput: true,
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                time_24hr: true,
                defaultDate: date
            });

            $('#editTicket').modal('show');
        }
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
