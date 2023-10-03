<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Status Tiket</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= site_url('dashboards'); ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Status Tiket</a>
                                </li>
                                <li class="breadcrumb-item active"><?= $site_title; ?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="d-flex justify-content-center align-items-center">
                    <ul class="nav nav-pills mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('submitted'); ?>">
                                <i data-feather="file-plus" class="font-medium-3 me-50"></i>
                                <span class="fw-bold me-50">Diajukan</span>
                                <span class="fw-bolder text-primary"><?= $count_submitted ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('accepted'); ?>">
                                <i data-feather="check" class="font-medium-3 me-50"></i>
                                <span class="fw-bold me-50">Diterima</span>
                                <span class="fw-bolder text-primary"><?= $count_accepted ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('rejected'); ?>">
                                <i data-feather="x" class="font-medium-3 me-50"></i>
                                <span class="fw-bold me-50">Ditolak</span>
                                <span class="fw-bolder text-primary"><?= $count_rejected ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('processed'); ?>">
                                <i data-feather="clock" class="font-medium-3 me-50"></i>
                                <span class="fw-bold me-50">Diproses</span>
                                <span class="fw-bolder text-primary"><?= $count_processed ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('discussed'); ?>">
                                <i data-feather="users" class="font-medium-3 me-50"></i>
                                <span class="fw-bold me-50">Didiskusikan</span>
                                <span class="fw-bolder text-primary"><?= $count_discussed ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= site_url('recommended'); ?>">
                                <i data-feather="skip-forward" class="font-medium-3 me-50"></i>
                                <span class="fw-bold me-50">Direkomendasikan</span>
                                <span class="fw-bolder"><?= $count_recommended ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('followedup'); ?>">
                                <i data-feather="trending-up" class="font-medium-3 me-50"></i>
                                <span class="fw-bold me-50">Diteruskan</span>
                                <span class="fw-bolder text-primary"><?= $count_followedup ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="float-start mb-0">Daftar Tiket Rekomendasi</h2>
                            </div>
                        </div>
                    </div>
                    <form action="<?= site_url('recommended'); ?>" method="POST">
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
                                    <th>Dibuat Pada</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Status</th>
                                    <th>PIC</th>
                                    <th>Diubah Pada</th>
                                    <th>Diubah Oleh</th>
                                    <th>Status Selesai</th>
                                    <th>Diselesaikan Pada</th>
                                    <th>Diselesaikan Oleh</th>
                                    <th class="text-center">Action</th>
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
                                        $pic = $data_reports[$i]["pic"];
                                        $created_at = $data_reports[$i]["created_at"];
                                        $created_by = $data_reports[$i]["created_name"];
										$creator_address = $data_reports[$i]["creator_address"];
										$creator_phone = $data_reports[$i]["creator_phone"];
										$creator_email = $data_reports[$i]["creator_email"];
                                        $updated_at = $data_reports[$i]["updated_at"];
                                        $updated_by = $data_reports[$i]["updated_name"];
										$jumlah_file_attachment = $data_reports[$i]["jumlah_file_attachment"];
										$is_finished = $data_reports[$i]["is_finished"];
										$finished_at = $data_reports[$i]["finished_at"];
										$finished_by = $data_reports[$i]["finished_name"];

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
										$jumlahdiskusi = $data_reports[$i]["jumlah_diskusi"];
                                        ?>
                                <tr>
                                    <td><?php echo $noticket; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $this->general->datetime_indo($created_at); ?></td>
                                    <td><?php echo $created_by; ?></td>
                                    <td><?php echo $xstatus; ?></td>
                                    <td><?php echo $pic; ?></td>
                                    <td><?php if($updated_at == "") { echo "-"; } else { echo $this->general->datetime_indo($updated_at); } ?>
                                    </td>
                                    <td><?php if($updated_by == "") { echo "-"; } else { echo $updated_by; } ?></td>
                                    <td><?php echo $xfinished; ?></td>
                                    <td><?php if($finished_at == "") { echo "-"; } else { echo $this->general->datetime_indo($finished_at); } ?>
                                    </td>
                                    <td><?php if($finished_by == "") { echo "-"; } else { echo $finished_by; } ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center align-content-center gap-1">
                                            <input type="hidden" id="txbJumlahDiskusi<?=$id;?>"
                                                value="<?= $jumlahdiskusi; ?>" />
                                            <?php if($this->user_level == 1 && $is_finished==0) { ?>
                                            <button class="btn btn-sm btn-warning rounded"
                                                onclick="showModalEditStatus(this)" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Ubah Status" data-id="<?=$id;?>"
                                                data-status="<?=$status;?>" data-noTicket="<?=$noticket;?>"
                                                data-title="<?=$title;?>" data-description="<?=$description;?>"
                                                data-date="<?=$date;?>" data-createdAt="<?=$created_at;?>"
                                                data-createdBy="<?=$created_by;?>"
                                                data-creatorAddress="<?=$creator_address;?>"
                                                data-creatorPhone="<?=$creator_phone;?>"
                                                data-creatorEmail="<?=$creator_email;?>"
                                                data-jumlahFileAttachment="<?=$jumlah_file_attachment;?>"
                                                data-jumlahDiskusi="<?=$jumlahdiskusi;?>">
                                                <i data-feather='file-plus'></i>
                                            </button>
                                            <?php }?>
                                            <a href="<?= site_url('ticket/') . $noticket; ?>" target="_blank"
                                                class="btn btn-sm btn-primary rounded" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Lihat Tiket">
                                                <i data-feather='eye'></i>
                                            </a>
                                        </div>
                                        <?php if($this->user_level == 1 && $is_finished==0) { ?>
                                        <div class="d-flex justify-content-center align-content-center gap-1 mt-1">
                                            <button class="btn btn-sm btn-success rounded"
                                                onclick="showModalFinish(this)" data-id="<?=$id;?>"
                                                data-noTicket="<?=$noticket;?>" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Selesaikan">
                                                <i data-feather='check'></i>
                                            </button>
                                        </div>
                                        <?php }?>
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
    </div>
</div>

<!-- Modal Edit Status -->
<div class="modal fade" id="editStatus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-status">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1>Ubah Status Tiket</h1>
                    <h4>No Tiket: <span id="spanNoTicket"></span></h4>
                </div>
                <div class="row">
                    <div class="card card-developer-meetup mb-0">
                        <div class="meetup-img-wrapper rounded-top text-center">
                            <img src="<?= site_url('themes') ?>/app-assets/images/illustration/email.svg"
                                alt="Meeting Pic" height="200" />
                        </div>
                        <div class="card-body">
                            <div class="meetup-header d-flex align-items-center">
                                <div class="meetup-day">
                                    <div class="avatar bg-light-primary rounded">
                                        <div class="avatar-content">
                                            <i data-feather="clipboard" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="card-title mb-25" id="textTitle"></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-xs-12" style="margin-bottom: 12px">
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="alert-circle" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Deskripsi</h6>
                                            <small id="textDescription"></small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Tanggal</h6>
                                            <small id="textDate"></small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1"
                                            onclick="showModalAttachment()">
                                            <div class="avatar-content">
                                                <i data-feather="tag" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body cursor-pointer" onclick="showModalAttachment()">
                                            <h6 class="mb-0">Lampiran</h6>
                                            <small><span id="spanJumlahAttachment"></span> Lampiran</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Dibuat Pada</h6>
                                            <small id="textCreatedAt"></small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1" onclick="showModalCreator()">
                                            <div class="avatar-content">
                                                <i data-feather="user" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body cursor-pointer" onclick="showModalCreator()">
                                            <h6 class="mb-0">Dibuat Oleh</h6>
                                            <small id="textCreatedBy"></small>
                                            <input type="hidden" id="txbEmail" />
                                            <input type="hidden" id="txbPhone" />
                                            <input type="hidden" id="txbAddress" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1"
                                            onclick="showModalViewDiskusi(this)" data-fromView="UbahStatusTiket">
                                            <div class="avatar-content">
                                                <i data-feather="users" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body cursor-pointer" onclick="showModalViewDiskusi(this)"
                                            data-fromView="UbahStatusTiket">
                                            <h6 class="mb-0">Diskusi</h6>
                                            <small><span id="spanJumlahDiskusi"></span> Diskusi</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="formChangeStatus" class="row gy-1 formChangeStatus" method="POST"
                        enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" id="idReport" name="idReport" class="form-control" />
                        <input type="hidden" id="from" name="from" class="form-control" />
                        <input type="hidden" id="urlfrom" name="urlfrom" value="recommended" />
                        <input type="hidden" id="to" name="to" value="7" />
                        <div class="col-12 mb-1">
                            <label class="form-label" for="description">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="col-12 mb-1">
                            <label class="form-label" for="selectFollowedUp">Diteruskan Kepada</label>
                            <select name="selectFollowedUp" id="selectFollowedUp" class="form-control">
                                <option value="">- Pilih Salah Satu -</option>
                                <?php
								if(count($data_instansi) > 0) {
									foreach ($data_instansi as $item) {
										?>
                                <option value="<?=$item['id']?>"><?=$item['instansi']?></option>
                                <?php
									}
								}
								?>
                            </select>
                        </div>

                        <div class="col-12 mb-1">
                            <div id="section_file">
                                <div style="padding: 0; padding-bottom: 0px;">
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
                                                    <p><small class="text-muted">Max Size 2Mb , Type: .gif, .jpg, .png,
                                                            .doc, .docx, .pdf</small></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2"></div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-icon btn-primary" type="button" onclick="addRowFile()">
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Tambah File</span>
                                </button>
                            </div>
                        </div>

                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="button" onclick="submitform()" class="btn btn-primary me-1">Lanjutkan
                                diteruskan</button>
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

<!-- Modal View Attachment -->
<div class="modal fade" id="modal_view_attachment" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-view_attachment">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1>Lihat Lampiran</h1>
                    <h4>No Tiket: <span id="spanNoTicketAttachment"></span></h4>
                </div>
                <div class="row mb-4">
                    <table class="table" id="table_file_view">
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal User -->
<div class="modal fade" id="modal_view_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-view-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1>Informasi Pengguna</h1>
                </div>
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex flex-row meetings">
                        <div class="avatar bg-light-primary rounded me-1">
                            <div class="avatar-content">
                                <i data-feather="user" class="avatar-icon font-medium-3"></i>
                            </div>
                        </div>
                        <div class="content-body">
                            <h6 class="mb-0">Nama Lengkap</h6>
                            <small id="textFullName"></small>
                        </div>
                    </div>
                    <div class="d-flex flex-row meetings">
                        <div class="avatar bg-light-primary rounded me-1">
                            <div class="avatar-content">
                                <i data-feather="mail" class="avatar-icon font-medium-3"></i>
                            </div>
                        </div>
                        <div class="content-body">
                            <h6 class="mb-0">Email</h6>
                            <small id="textEmail"></small>
                        </div>
                    </div>
                    <div class="d-flex flex-row meetings">
                        <div class="avatar bg-light-primary rounded me-1">
                            <div class="avatar-content">
                                <i data-feather="phone" class="avatar-icon font-medium-3"></i>
                            </div>
                        </div>
                        <div class="content-body">
                            <h6 class="mb-0">No. Handphone</h6>
                            <small id="textPhone"></small>
                        </div>
                    </div>
                    <div class="d-flex flex-row meetings">
                        <div class="avatar bg-light-primary rounded me-1">
                            <div class="avatar-content">
                                <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                            </div>
                        </div>
                        <div class="content-body">
                            <h6 class="mb-0">Alamat</h6>
                            <small id="textAddress"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal View Diskusi -->
<div class="modal fade" id="modalViewDiskusi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-status">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Lihat Diskusi</h1>
                    <h4>No Tiket: <span id="spanNoTicketViewDiskusi"></span></h4>
                </div>
                <div class="row">

                    <div id="divRowViewDiskusiNotFound" class="text-center">
                        <span class="text-warning">-- Data diskusi tidak ditemukan --</span>
                    </div>
                    <div id="divRowViewDiskusi" style="display: none;">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- END: Content-->

<script>
$("#datatable1").DataTable({
    // "scrollY": "300px",
    scrollX: true,
    scrollCollapse: true,
    paging: true,
    searching: true,
    order: [
        [5, 'desc']
    ]
});
</script>

<script>
$(document).ready(function() {
    $('#datatable1').on('draw.dt', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }

        $('[data-bs-toggle="tooltip"]').tooltip();
    });
});

function showModalEditStatus(a) {
    var id = $(a).attr('data-id');
    var status = $(a).attr('data-status');
    var noTicket = $(a).attr('data-noTicket');
    var title = $(a).attr('data-title');
    var description = $(a).attr('data-description');
    var date = $(a).attr('data-date');
    var createdAt = $(a).attr('data-createdAt');
    var createdBy = $(a).attr('data-createdBy');
    var creatorAddress = $(a).attr('data-creatorAddress');
    var creatorPhone = $(a).attr('data-creatorPhone');
    var creatorEmail = $(a).attr('data-creatorEmail');
    var jumlahFileAttachment = $(a).attr('data-jumlahFileAttachment');
    var jumlahDiskusi = $(a).attr('data-jumlahDiskusi');

    $('#spanNoTicket').html(noTicket);
    $('#textTitle').html(title);
    $('#textDescription').html(description);
    $('#textDate').html(date);
    $('#spanJumlahAttachment').html(jumlahFileAttachment);
    $('#spanJumlahDiskusi').html(jumlahDiskusi);
    $('#textCreatedAt').html(createdAt);
    $('#textCreatedBy').html(createdBy);
    $('#txbEmail').val(creatorEmail);
    $('#txbPhone').val(creatorPhone);
    $('#txbAddress').val(creatorAddress);

    $('#idReport').val(id);
    $('#from').val(status);

    $('#editStatus').modal('show');

}

function addRowFile() {
    var id = $('#idReport').val();

    var div = `
            <div id="div-entry` + id + `" style="padding: 0; padding-bottom: 0px">
                <div class="row">
                    <div class="col-lg-10">
						<label class="form-label" for="file-name">Nama File</label>
						<input type="text" class="form-control" name="add_file[]" />
						<label class="form-label" for="upload">Unggah</label>
						<input type="file" class="form-control" name="uploadfile[]" accept=".gif, .jpg, .png, .doc, .docx, .pdf" />
						<p><small class="text-muted">Max Size 2Mb , Type: .gif, .jpg, .png, .doc, .docx, .pdf</small></p>
                    </div>
                    <div class="col-lg-2" style="display: flex; align-items: center">
                        <button type="button" class="btn btn-outline-danger text-nowrap px-1"
								onclick="removeRowFile(` + id + `)">
                            <i data-feather="trash-2" class="me-25"></i>
                        </button>
                    </div>
                </div>
                <hr>
            </div>`;


    $('#section_file').append(div);

    if (feather) {
        feather.replace({
            width: 14,
            height: 14
        });
    }

}

function removeRowFile(id) {
    var divToRemove = document.getElementById("div-entry" + id);
    divToRemove.parentNode.removeChild(divToRemove);
}

function submitform() {

    var formChangeStatus = $('.formChangeStatus');

    // Bootstrap Validation
    // --------------------------------------------------------------------
    var checkvalidity = true;
    if (formChangeStatus.length) {
        Array.prototype.filter.call(formChangeStatus, function(form) {
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
            text: 'Anda tidak akan dapat mengembalikan status',
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

                Swal.fire({
                    title: 'Mohon tunggu !',
                    html: 'Memproses ....',
                    allowOutsideClick: false,
                    showConfirmButton: false
                });

                $("#formChangeStatus").attr("action", "<?= site_url('all_tickets/status/')?>" + $('#idReport')
                    .val());
                $('#formChangeStatus').submit();

            }
        });

    }
}

function createRowFile(id = '', file_name = '', file_url = '', type = '') {
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
						<div class="col-12">
							<a href="` + file_url + `" target="_blank">` + button + `</a>
						</div>
					</div>
				</td>`;

    var tr = '<tr>' + td + '</tr>';
    $('#table_file_view').find('tbody').append(tr);

    if (feather) {
        feather.replace({
            width: 14,
            height: 14
        });
    }

    return true
}

function showModalAttachment() {

    var id = $('#idReport').val();
    var noticket = $('#spanNoTicket').text();
    var jumlah_file_attachment = $('#spanJumlahAttachment').text();

    if (jumlah_file_attachment > 0) {

        Swal.fire({
            title: 'Mohon Tunggu !',
            html: 'Mencari Data Lampiran ...',
            allowOutsideClick: false,
            showConfirmButton: false
        });

        $.ajax({
            url: "<?= site_url('ajax/get_file/'); ?>" + id + "/1",
            type: "GET",
            success: function(data) {

                $("#table_file_view tr").remove();

                var dataParse = JSON.parse(data);
                if (dataParse.data !== null) {

                    dataParse.data.forEach((value, index) => {

                        createRowFile(value.id_report_file, value.file_name, value.path, value.type)

                    });

                }

            },
            error: function(request, status, error) {
                console.log(error);
            },
            complete: function() {
                Swal.close();

                $('#spanNoTicketAttachment').html(noticket);

                $('#modal_view_attachment').modal('show');
            }
        });

    }
}

function showModalCreator() {

    var textCreatedBy = $('#textCreatedBy').text();
    var txbEmail = $('#txbEmail').val();
    var txbPhone = $('#txbPhone').val();
    var txbAddress = $('#txbAddress').val();

    $('#textFullName').text(textCreatedBy);
    $('#textEmail').text(txbEmail);
    $('#textPhone').text(txbPhone);
    $('#textAddress').text(txbAddress);

    $('#modal_view_user').modal('show');
}

function showModalFinish(a) {

    var id = $(a).attr('data-id');
    var noTicket = $(a).attr('data-noTicket');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Anda akan menyelesaikan tiket ini',
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Ok, selesaikan !",
        cancelButtonText: 'Tidak, batalkan',
        allowOutsideClick: false,
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {

            Swal.fire({
                title: 'Mohon tunggu !',
                html: 'Memproses ....',
                allowOutsideClick: false,
                showConfirmButton: false
            });

            window.location.href = "<?= site_url('finish_ticket/')?>" + id + "/" + noTicket + "/recommended";

        }
    });
}

function showModalViewDiskusi(a) {
    var fromView = $(a).attr('data-fromView');
    if (fromView == 'TabelJumlahDiskusi') {
        var id = $(a).attr('data-id');
        var noTicket = $(a).attr('data-noTicket');
        var isFinished = $(a).attr('data-isFinished');
    } else {
        var id = $('#idReport').val();
        var noTicket = $('#spanNoTicket').html();
        var isFinished = 1;
    }
    var jumlahDiskusi = parseInt($('#txbJumlahDiskusi' + id).val());
    var userLevel = <?=$this->user_level;?>;

    $('#spanNoTicketViewDiskusi').html(noTicket);

    if (jumlahDiskusi == 0) {
        $('#divRowViewDiskusiNotFound').show();
        $('#divRowViewDiskusi').empty();
        $('#divRowViewDiskusi').hide();
    } else {
        $('#divRowViewDiskusiNotFound').hide();
        $('#divRowViewDiskusi').show();
        $('#divRowViewDiskusi').empty();

        Swal.fire({
            title: 'Mohon tunggu !',
            html: 'Mencari data diskusi ....',
            allowOutsideClick: false,
            showConfirmButton: false
        });

        $.ajax({
            url: "<?= site_url('ajax/get_data_diskusi/'); ?>" + id + "/5",
            type: "GET",
            success: function(data) {

                var dataParse = JSON.parse(data);
                if (dataParse.data !== null) {

                    for (const element of dataParse.data) {

                        var divDiskusiFileImage = '';
                        var divDiskusiFilePdf = '';
                        if (element.file.length > 0) {
                            divDiskusiFileImage = `<div class="d-flex flex-column flex-md-row overflow-x-auto"
											 style="overflow-y: hidden">`;
                            divDiskusiFilePdf = `<hr/><div class="d-flex flex-column flex-md-row overflow-x-auto"
											 style="overflow-y: hidden">`;
                            for (const elementFile of element.file) {
                                if (elementFile.type === 'image') {
                                    var fileImgDiskusi = `<div class="d-flex flex-column align-items-center justify-content-center">
														<img src="` + elementFile.path + `" id="blog-feature-image" class="rounded mb-1 mb-md-0" width="170" height="110" alt="Image" />
														<span>` + elementFile.file_name + `</span>
														</div>`;
                                    divDiskusiFileImage += fileImgDiskusi
                                } else {

                                    var button = `<button type="button" class="btn btn-outline-primary">
													<i data-feather="file-text" class="me-25"></i>
													<span>` + elementFile.file_name + `</span>
												</button>`;

                                    var ahref = `<a href="` + elementFile.path + `" target="_blank">` +
                                        button + `</a>`;
                                    divDiskusiFilePdf += ahref;

                                }
                            }
                            divDiskusiFileImage += `</div>`;
                            divDiskusiFilePdf += `</div>`;
                        }

                        var divDiskusiId = 'divDiskusi' + element.id;
                        var buttonRemoveDiskusi = '';
                        if (userLevel == 1 && isFinished == 0) {
                            buttonRemoveDiskusi = `<button type="button" class="btn btn-icon btn-danger"
										onclick="removeDiskusi(this)"
										data-idReport="` + id + `"
										data-idItem="` + element.id + `"
										data-idName="` + divDiskusiId + `"
									>
										<i data-feather="x"></i>
									</button>`;
                        }

                        var cardDiskusi = `<div class="col-12 mb-2" id="` + divDiskusiId + `">
							<div class="border rounded p-2">
								<div class="d-flex flex-column flex-md-row justify-content-between">
									<h4 class="mb-1">` + element.title + `</h4>
									` + buttonRemoveDiskusi + `
								</div>
								<div class="d-flex flex-row align-items-center" style="margin-bottom: 10px !important;">
									<i data-feather="clock" class="me-25"></i>
									<span>` + element.date + `</span>
								</div>
								<p>` + element.description + `</p>
								` + divDiskusiFileImage + `
								` + divDiskusiFilePdf + `
							</div>
						</div>`;

                        $('#divRowViewDiskusi').append(cardDiskusi);

                        if (feather) {
                            feather.replace({
                                width: 14,
                                height: 14
                            });
                        }


                    }
                }

            },
            error: function(request, status, error) {
                console.log(error);
            },
            complete: function() {
                Swal.close();
            }
        });
    }

    $('#modalViewDiskusi').modal('show');
}
</script>

<?php if($this->session->flashdata('success')) { ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: "Success",
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
        title: "Error",
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