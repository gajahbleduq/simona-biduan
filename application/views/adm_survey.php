<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0"><?= $site_title ?></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= site_url('dashboards'); ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Administrasi</a>
                                </li>
                                <li class="breadcrumb-item active"><?= $site_title ?>
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
                                <h2 class="float-start mb-0">Daftar Pertanyaan Survey</h2>
                            </div>
                        </div>
                    </div>
                    <div class="content-header-right text-md-end col-md-3 col-12">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addSurvey">
                            <i data-feather='plus'></i>
                            Tambah Pertanyaan Survey
                        </button>
                    </div>
                </div>
                <div class="content-body">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="datatables-basic table" id="datatable1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Pertanyaan</th>
                                    <th>Dibuat Pada</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Diubah Pada</th>
                                    <th>Diubah Oleh</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (sizeof($data_surveys)>0) {
                                    for ($i=0;$i<sizeof($data_surveys);$i++) {
                                        $id = $data_surveys[$i]["id"];
                                        $title = $data_surveys[$i]["title"];
                                        $question = $data_surveys[$i]["question"];
                                        $created_at = $data_surveys[$i]["created_at"];
                                        $created_by = $data_surveys[$i]["created_name"];
                                        $updated_at = $data_surveys[$i]["updated_at"];
                                        $updated_by = $data_surveys[$i]["updated_name"];
                                        ?>
                                <tr>
                                    <td><?php echo ($i+1); ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $question; ?></td>
                                    <td><?php echo $created_at; ?></td>
                                    <td><?php echo $created_by; ?></td>
                                    <td><?php echo $updated_at; ?></td>
                                    <td><?php echo $updated_by; ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-sm btn-warning rounded" data-bs-toggle="modal"
                                                data-bs-target="#editSurvey<?php echo $id; ?>">
                                                <i data-feather='edit-2'></i>
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-sm btn-danger rounded delete-confirm"
                                                data-id="<?php echo $id; ?>"><i data-feather='trash'></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Edit Survey -->
                                <div class="modal fade" id="editSurvey<?= $id ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                                        <div class="modal-content">
                                            <div class="modal-header bg-transparent">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                                <div class="text-center mb-2">
                                                    <h1 class="mb-1">Ubah Pertanyaan Survey</h1>
                                                </div>
                                                <form action="<?= site_url('adm_survey/edit/') . $id ?>"
                                                    class="row gy-1 pt-75" method="POST">
                                                    <div class="col-12 mb-1">
                                                        <label class="form-label" for="title">Judul</label>
                                                        <input type="text" id="edit_title" name="edit_title"
                                                            class="form-control" value="<?= $title ?>" required />
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <label class="form-label" for="question">Pertanyaan</label>
                                                        <input type="text" id="edit_question" name="edit_question"
                                                            class="form-control" value="<?= $question ?>" required />
                                                    </div>
                                                    <div class="col-12 text-center mt-2 pt-50">
                                                        <button type="submit" class="btn btn-primary me-1">Ubah</button>
                                                        <button type="reset" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            Batalkan
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

        <!-- Modal Add Survey -->
        <div class="modal fade" id="addSurvey" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Tambah Pertanyaan Survey</h1>
                        </div>
                        <form action="<?= site_url('adm_survey/add') ?>" class="row gy-1 pt-75" method="POST">
                            <div class="col-12">
                                <label class="form-label" for="title">Judul</label>
                                <input type="text" id="add_title" name="add_title" class="form-control" value=""
                                    required />
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="question">Pertanyaan</label>
                                <input type="text" id="add_question" name="add_question" class="form-control" value=""
                                    required />
                            </div>
                            <div class="col-12 text-center mt-2 pt-50">
                                <button type="submit" class="btn btn-primary me-1">Tambah</button>
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
</script>

<script>
$(document).ready(function() {
    $('.delete-confirm').click(function() {
        const id = $(this).data('id');

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
                window.location.href = '<?= site_url(); ?>adm_survey/delete/' + id;
            }
        });
    });
});
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