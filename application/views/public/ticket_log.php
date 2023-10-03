<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <!-- <div class="header-navbar-shadow"></div> -->
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <?php
			$disabledButton = 'disabled';
			if($ticket['is_finished'] == 1 && sizeof($survey_answer_check) == 0) {
				$disabledButton = '';
			}?>
            <div class="content-header-right text-md-end col-md-12 col-12 d-md-block d-block">
                <div class="mb-1 breadcrumb-right">
                    <button type="button" id="btnAddSurvey" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addSurvey" <?=$disabledButton;?>>
                        <i data-feather='plus'></i>
                        Isi Survey
                    </button>
                </div>
            </div>

            <!-- Modal Add Survey -->
            <div class="modal fade" id="addSurvey" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-5 px-sm-5 pt-50">
                            <div class="text-center mb-2">
                                <h1 class="mb-1">Pengisian Survey</h1>
                            </div>
                            <form id="formIsiSurvey" class="row gy-1 pt-75 formIsiSurvey" method="POST">
                                <?php 
								if (sizeof($data_surveys) > 0) {
									for ($i = 0; $i < sizeof($data_surveys); $i++) {
										$id = $data_surveys[$i]["id"];
										$title = $data_surveys[$i]["title"];
										$question = $data_surveys[$i]["question"];
								?>

                                <div style="border: 1px solid;" class="p-2 rounded-3 mb-1">
                                    <div class="col-12">
                                        <input type="hidden" name="txt_id[]" value="<?= $id; ?>">
                                        <p class="form-control-static ms-1"><?= ($i + 1); ?>.
                                            <strong><?= $question; ?></strong>
                                        </p>
                                    </div>
                                    <div class="col-12 ms-1">
                                        <div class="demo-inline-spacing">
                                            <label class="form-label" for="answer<?= $i; ?>">Jawaban :</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="txt_answer[<?= $i; ?>]" id="answer<?= $i; ?>_sp" value="5"
                                                    required />
                                                <label class="form-check-label" for="answer<?= $i; ?>_sp">Sangat
                                                    Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="txt_answer[<?= $i; ?>]" id="answer<?= $i; ?>_p" value="4"
                                                    required />
                                                <label class="form-check-label" for="answer<?= $i; ?>_p">Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="txt_answer[<?= $i; ?>]" id="answer<?= $i; ?>_c" value="3"
                                                    required />
                                                <label class="form-check-label" for="answer<?= $i; ?>_c">Cukup</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="txt_answer[<?= $i; ?>]" id="answer<?= $i; ?>_kp" value="2"
                                                    required />
                                                <label class="form-check-label" for="answer<?= $i; ?>_kp">Kurang
                                                    Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="txt_answer[<?= $i; ?>]" id="answer<?= $i; ?>_tp" value="1"
                                                    required />
                                                <label class="form-check-label" for="answer<?= $i; ?>_tp">Tidak
                                                    Puas</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ms-1">
                                        <div class="invalid-feedback">Anda belum memilih.</div>
                                    </div>
                                </div>

                                <?php
									}
								}
								?>
                                <hr />
                                <div class="mb-1">
                                    <h5 class="requiredField">Verifikasi</h5>
                                    <label class="form-label" for="login-email">Berapa hasil
                                        <?=$this->session->userdata('n1')?> + <?=$this->session->userdata('n2')?> =
                                    </label>
                                    <input class="form-control" id="txt_captcha" type="number" min="0"
                                        name="txt_captcha" aria-describedby="login-captcha" autofocus="" tabindex="1"
                                        required />
                                    <div class="invalid-feedback">Anda belum mengisi verifikasi.</div>
                                </div>

                                <div class="col-12 text-center mt-2 pt-50">
                                    <button type="button" onclick="submitformsurvey()"
                                        class="btn btn-primary me-1">Kirimkan</button>
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
        <div class="content-body">
            <section class="app-user-view-account">
                <div class="row">
                    <!-- User Sidebar -->
                    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                        <!-- User Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="user-avatar-section">
                                    <div class="d-flex align-items-center flex-column">
                                        <div class="user-info text-center mt-3 mb-2">
                                            <div class="d-flex justify-content-center mb-1">
                                                <div
                                                    class="modal-refer-earn-step d-flex width-100 height-100 rounded-circle justify-content-center align-items-center bg-light-primary">
                                                    <i data-feather="clipboard" class="font-large-3"></i>
                                                </div>
                                            </div>
                                            <h4><?=$ticket['title'];?></h4>
                                            <div
                                                class="d-flex flex-column gap-1 align-items-center justify-content-center">
                                                <span
                                                    class="badge bg-<?=$ticket['status_color'];?>"><?=$ticket['status_name'];?></span>
                                                <?php
												if($ticket['is_finished'] == 1){
													?>
                                                <span class="badge bg-light-success">Sudah Selesai</span>
                                                <?php
												}else{
													?>
                                                <span class="badge bg-light-danger">Belum Selesai</span>
                                                <?php
												}
												?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="fw-bolder border-bottom pb-50 mb-1">
                                    Details
                                </h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">No. Tiket:</span>
                                            <span><?=$ticket['no_ticket'];?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Deskripsi:</span>
                                            <span><?=$ticket['description'];?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Tanggal:</span>
                                            <span><?=$this->general->datetime_indo($ticket['date']);?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Tanggal dibuat:</span>
                                            <span><?=$this->general->datetime_indo($ticket['created_at']);?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Dibuat oleh:</span>
                                            <span onclick="showModalUser(this)"
                                                data-fullName="<?=$ticket['full_name'];?>"
                                                data-email="<?=$ticket['email'];?>"
                                                data-address="<?=$ticket['address'];?>"
                                                data-phone="<?=$ticket['phone'];?>"
                                                class="text-primary fw-bold cursor-pointer">
                                                <?=$ticket['full_name'];?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->

                        <?php
						if(count($ticket['file']) > 0) {
							?>

                        <!-- Attachment Card -->
                        <div class="card card-user-timeline">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <i data-feather="file" class="user-timeline-title-icon"></i>
                                    <h4 class="card-title">Lampiran</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table" id="table_file_view">
                                    <tbody>
                                        <?php
										foreach ($ticket['file'] as $item_file) {
											?>
                                        <tr>
                                            <td style="padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <a href="<?=$item_file['path']?>" target="_blank">
                                                            <button type="button" class="btn btn-outline-primary">
                                                                <i data-feather="<?=$item_file['type'] === 'image' ? 'image': 'file-text'?>"
                                                                    class="me-25"></i>
                                                                <span><?=$item_file['file_name']?></span>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
										}
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php
						}
						?>
                    </div>
                    <!--/ User Sidebar -->

                    <!-- Modal User -->
                    <div class="modal fade" id="modal_view_user" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-view-user">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
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

                    <!-- User Content -->
                    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

                        <!-- Activity Timeline -->
                        <div class="card card-user-timeline">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <i data-feather="list" class="user-timeline-title-icon"></i>
                                    <h4 class="card-title">Log Tiket</h4>
                                </div>
                            </div>
                            <div class="card-body pt-1">
                                <ul class="timeline ms-50">
                                    <?php
									if(count($timeLine) > 0) {
										$nodiskusi = 1;
										foreach ($timeLine as $item) {
									?>
                                    <li class="timeline-item">
                                        <?php
											if($item['from'] == 0 || $item['to'] == 0) {
												?>
                                        <span
                                            class="timeline-point timeline-point-primary timeline-point-indicator"></span>
                                        <?php
											}else{
												?>
                                        <span class="timeline-point timeline-point-<?=$item['color'];?>">
                                            <i data-feather="<?=$item['icon'];?>"></i>
                                        </span>
                                        <?php
											}
										?>
                                        <div class="timeline-event">
                                            <div
                                                class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                <div class="d-flex flex-sm-row flex-column">
                                                    <?php
													if ($item['from'] == 7 && $item['to'] == 7){
														?>
                                                    <h6 class="text-<?= $item['color_from'] ?>">Tiket diterima
                                                        <?=$ticket['instansi_name'];?></h6>
                                                    <?php
													}
													elseif($item['to'] != 0) {
														?>
                                                    <h6 class="text-<?= $item['color_from'] ?>">
                                                        <?= $item['name_from'] == null ? 'Tiket' : $item['name_from'] ?>
                                                    </h6>
                                                    <?= $item['name_from'] == null ? '&nbsp;' : '<i data-feather="arrow-right"></i>' ?>
                                                    <h6 class="text-<?= $item['color'] ?>"><?= $item['name'] ?></h6>
                                                    <?php
													}
													else{
														?>
                                                    <h6 class="text-<?= $item['color_from'] ?>">
                                                        <?= $item['description'];?> <?=$nodiskusi++;?></h6>
                                                    <?php
													}
													?>
                                                </div>
                                                <span class="timeline-event-time me-1"><?= $item['timeline'] ?></span>
                                            </div>
                                            <div class="d-flex flex-row align-items-center"
                                                style="margin-bottom: 10px !important;">
                                                <i data-feather="clock" class="me-25"></i>
                                                <span><?= $this->general->datetime_indo($item['created_at']); ?></span>
                                            </div>
                                            <?php
											if($item['to'] != 0) {
												?>
                                            <p><?= $item['description'] ?></p>

                                            <?php
												if($item['from'] == 6 && $item['to'] == 7 && $ticket['instansi_id'] != null) {
													?>
                                            <div class="rounded p-2"
                                                style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                                                <p>Tiket ini diteruskan ke <span
                                                        class="text-warning"><?=$ticket['instansi_name'];?></span></p>
                                            </div>
                                            <?php
												}
												?>

                                            <?php
											}else{
												?>
                                            <div class="rounded p-2"
                                                style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                                                <div class="d-flex align-items-start">
                                                    <div>
                                                        <h5 class="text-primary fw-bolder mb-25">
                                                            <?= $item['item']['title'] ?></h5>
                                                        <p class="card-text">Tanggal Diskusi :
                                                            <?= $this->general->datetime_indo($item['item']['date']); ?>
                                                        </p>
                                                        <p class="card-text">
                                                            <?= $item['item']['description'] ?>
                                                        </p>

                                                        <?php
																if(count($item['item']['file']) > 0){
																	?>
                                                        <!--Image File-->
                                                        <div class="d-flex flex-column flex-md-row flex-wrap">
                                                            <?php
																		foreach ($item['item']['file'] as $fileTimelineItem) {
																			if($fileTimelineItem['type'] === 'image') {
																				?>
                                                            <div
                                                                class="d-flex flex-column align-items-center justify-content-center">
                                                                <img src="<?=$fileTimelineItem['path']?>"
                                                                    id="blog-feature-image" class="rounded mb-1 mb-md-0"
                                                                    width="170" height="110" alt="Image" />
                                                                <span><?=$fileTimelineItem['file_name']?></span>
                                                            </div>
                                                            <?php
																			}
																		}
																		?>
                                                        </div>
                                                        <hr />
                                                        <!--PDF File-->
                                                        <div class="d-flex flex-column flex-md-row flex-wrap gap-2">
                                                            <?php
																		foreach ($item['item']['file'] as $fileTimelineItem) {
																			if($fileTimelineItem['type'] === 'file') {
																				?>
                                                            <a href="<?=$fileTimelineItem['path']?>" target="_blank">
                                                                <div class="d-flex flex-row align-items-center cursor-pointer border border-primary rounded"
                                                                    style="padding: 10px;">
                                                                    <i data-feather="file-text"
                                                                        class="me-25 font-large-1"></i>
                                                                    <span><?=$fileTimelineItem['file_name']?></span>
                                                                </div>
                                                            </a>
                                                            <?php
																			}
																		}
																		?>
                                                        </div>
                                                        <?php
																}
																?>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php
											}

											if (count($item['file']) && $item['to'] != 1){
												?>
                                            <!--Image File-->
                                            <div class="d-flex flex-column flex-md-row flex-wrap">
                                                <?php
													foreach ($item['file'] as $fileTimeline) {
														if($fileTimeline['type'] === 'image') {
															?>
                                                <div
                                                    class="d-flex flex-column align-items-center justify-content-center">
                                                    <img src="<?=$fileTimeline['path']?>" id="blog-feature-image"
                                                        class="rounded mb-1 mb-md-0" width="170" height="110"
                                                        alt="Image" />
                                                    <span><?=$fileTimeline['file_name']?></span>
                                                </div>
                                                <?php
														}
													}
													?>
                                            </div>
                                            <hr />
                                            <!--PDF File-->
                                            <div class="d-flex flex-column flex-md-row flex-wrap gap-2">
                                                <?php
													foreach ($item['file'] as $fileTimeline) {
														if($fileTimeline['type'] === 'file') {
															?>
                                                <a href="<?=$fileTimeline['path']?>" target="_blank">
                                                    <div class="d-flex flex-row align-items-center cursor-pointer border border-primary rounded"
                                                        style="padding: 10px;">
                                                        <i data-feather="file-text" class="me-25 font-large-1"></i>
                                                        <span><?=$fileTimeline['file_name']?></span>
                                                    </div>
                                                </a>
                                                <?php
														}
													}
													?>
                                            </div>
                                            <?php
											}
											?>

                                        </div>
                                    </li>
                                    <?php
										}
									}

									if($ticket['is_finished'] == 1) {
										?>
                                    <li class="timeline-item">
                                        <span
                                            class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                        <div class="timeline-event">
                                            <div
                                                class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                <h6>Selesai</h6>
                                                <span
                                                    class="timeline-event-time me-1"><?= $ticket['timeline_finished_by'] ?></span>
                                            </div>
                                            <div class="d-flex flex-row align-items-center"
                                                style="margin-bottom: 10px !important;">
                                                <i data-feather="clock" class="me-25"></i>
                                                <span><?= $this->general->datetime_indo($ticket['finished_at']); ?></span>
                                            </div>
                                            <p><?= $ticket['finished_full_name'] ?> telah menyelesaikan tiket ini</p>
                                        </div>
                                    </li>
                                    <?php
									}
									?>
                                </ul>
                            </div>
                        </div>
                        <!-- /Activity Timeline -->
                    </div>
                    <!--/ User Content -->
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->

<script>
function submitformsurvey() {

    var formIsiSurvey = $('.formIsiSurvey');

    // Bootstrap Validation
    // --------------------------------------------------------------------
    var checkvalidity = true;
    if (formIsiSurvey.length) {
        Array.prototype.filter.call(formIsiSurvey, function(form) {
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
            text: 'Anda akan mengisi survey ini',
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

                var form = $("#formIsiSurvey");
                var formData = new FormData(form[0]);

                $.ajax({
                    url: "<?= site_url('ticket/' . $ticket['no_ticket'] . '/survey/add') ?>",
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        Swal.close();

                        var dataParse = JSON.parse(data);
                        var title = 'Error';
                        var icon = 'error';
                        if (dataParse.success) {
                            title = 'Success';
                            icon = 'success';
                            $('#btnAddSurvey').prop("disabled", true);
                        }

                        Swal.fire({
                            title: title,
                            html: dataParse.message,
                            icon: icon,
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false,
                            allowOutsideClick: false
                        }).then(function() {
                            if (dataParse.success) {
                                $('#addSurvey').modal('hide');
                            }
                        });

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

            }
        });

    }
}

function showModalUser(a) {

    var fullName = $(a).attr('data-fullName');
    var email = $(a).attr('data-email');
    var address = $(a).attr('data-address');
    var phone = $(a).attr('data-phone');

    $('#textFullName').text(fullName);
    $('#textEmail').text(email);
    $('#textPhone').text(phone);
    $('#textAddress').text(address);

    $('#modal_view_user').modal('show');
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