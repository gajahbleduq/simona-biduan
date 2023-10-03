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
                            <a class="nav-link" href="<?= site_url('recommended'); ?>">
                                <i data-feather="skip-forward" class="font-medium-3 me-50"></i>
                                <span class="fw-bold me-50">Direkomendasikan</span>
                                <span class="fw-bolder text-primary"><?= $count_recommended ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= site_url('followedup'); ?>">
                                <i data-feather="trending-up" class="font-medium-3 me-50"></i>
                                <span class="fw-bold me-50">Diteruskan</span>
                                <span class="fw-bolder"><?= $count_followedup ?></span>
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
                                <h2 class="float-start mb-0">Daftar Tiket Diteruskan</h2>
                            </div>
                        </div>
                    </div>
                    <form action="<?= site_url('followedup'); ?>" method="POST">
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
                                    <th>Diteruskan kepada</th>
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
										$instansi_id = $data_reports[$i]["instansi_id"];
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
                                    <td><?php echo $this->general->datetime_indo($created_at); ?></td>
                                    <td><?php echo $created_by; ?></td>
                                    <td><?php echo $xstatus; ?></td>
                                    <td><?php echo $pic; ?></td>
                                    <td><?php if($instansi_name == "") { echo "-"; } else { echo $instansi_name; } ?>
                                    </td>
                                    <td><?php echo $xfinished; ?></td>
                                    <td><?php if($finished_at == "") { echo "-"; } else { echo $this->general->datetime_indo($finished_at); } ?>
                                    </td>
                                    <td><?php if($finished_by == "") { echo "-"; } else { echo $finished_by; } ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center align-content-center gap-1">
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

            window.location.href = "<?= site_url('finish_ticket/')?>" + id + "/" + noTicket + "/followedup";

        }
    });
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