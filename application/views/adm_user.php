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
                                <h2 class="float-start mb-0">Daftar Pengguna</h2>
                            </div>
                        </div>
                    </div>
                    <div class="content-header-right text-md-end col-md-3 col-12">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
                            <i data-feather='plus'></i>
                            Tambah Pengguna
                        </button>
                    </div>
                </div>
                <div class="content-body">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="datatables-basic table" id="datatable1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Nama Lengkap</th>
                                    <th>No. Handphone</th>
                                    <th>Alamat</th>
                                    <th>Dibuat Pada</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Tingkat</th>
                                    <th>Instansi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (sizeof($data_users)>0) {
                                    for ($i=0;$i<sizeof($data_users);$i++) {
                                        $id = $data_users[$i]["id"];
                                        $email = $data_users[$i]["email"];
                                        $nama = $data_users[$i]["full_name"];
                                        $alamat = $data_users[$i]["address"];
                                        $handphone = $data_users[$i]["phone"];
                                        $user_status = $data_users[$i]["is_active"];
                                        $instansi = $data_users[$i]["instansi"];
                                        $created_at = $data_users[$i]["created_at"];
                                        $created_by = $data_users[$i]["created_name"];
                                        $user_level = $data_users[$i]["role_id"];

                                        $xstatus = "";
                                        if ($user_status=="0") { 
                                            $xstatus = "<span class='badge bg-danger'>Tidak Aktif</span>"; 
                                        }
                                        if ($user_status=="1") { 
                                            $xstatus = "<span class='badge bg-success'>Aktif</span>"; 
                                        }	

                                        $xlevel = "";
										$xinstansi = "";
                                        if ($user_level=="1") { 
                                            $xlevel = "<span class='badge bg-info'>Admin</span>"; 
											$xinstansi = "Kementerian Koordinator Bidang Politik, Hukum, dan Keamanan";
                                        }
                                        if ($user_level=="2") { 
                                            $xlevel = "<span class='badge bg-secondary'>Umum</span>"; 
											$xinstansi = "-";
                                        }
                                        if ($user_level=="3") { 
                                            $xlevel = "<span class='badge bg-primary'>Kementerian</span>"; 
											$xinstansi = $instansi;
                                        }
                                        if ($user_level=="4") { 
                                            $xlevel = "<span class='badge bg-warning'>Instansi</span>"; 
											$xinstansi = $instansi;
                                        }


										$edit_role_id = "edit_role_" . $id;
										$edit_kementerian_id = "edit_kementerian_" . $id;
										$edit_instansi_id = "edit_instansi_" . $id;
										$selectEditKementerian_id = "selectEditKementerian_" . $id;
										$selectEditInstansi_id = "selectEditInstansi_" . $id;
                                        ?>
                                <tr>
                                    <td><?php echo ($i+1); ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $nama; ?></td>
                                    <td><?php echo $handphone; ?></td>
                                    <td><?php echo $alamat; ?></td>
                                    <td><?php if($created_at == "") { echo "-"; } else { echo $this->general->datetime_indo($created_at); } ?>
                                    <td><?php if($created_by == "") { echo $nama; } else { echo $created_by; }; ?></td>
                                    <td><?php echo $xlevel; ?></td>
                                    <td><?php echo $xinstansi; ?></td>
                                    <td><?php echo $xstatus; ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-sm btn-warning rounded" data-bs-toggle="modal"
                                                data-bs-target="#editUser<?php echo $id; ?>">
                                                <i data-feather='edit-2'></i>
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-sm btn-danger rounded delete-confirm"
                                                data-id="<?php echo $id; ?>"><i data-feather='trash'></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Edit User Modal -->
                                <div class="modal fade" id="editUser<?php echo $id; ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                                        <div class="modal-content">
                                            <div class="modal-header bg-transparent">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                                <div class="text-center mb-2">
                                                    <h1 class="mb-1">Ubah Informasi Pengguna</h1>
                                                </div>
                                                <form action="<?= site_url('adm_user/edit/') . $id; ?>"
                                                    class="row gy-1 pt-75" method="POST">
                                                    <div class="row">
                                                        <div class="col-12 mb-1">
                                                            <label class="form-label" for="modalEditUserName">Nama
                                                                Lengkap</label>
                                                            <input type="text" id="edit_name" name="edit_name"
                                                                class="form-control" value="<?php echo $nama; ?>"
                                                                required />
                                                        </div>
                                                        <!-- <div class="col-12 mb-1">
                                                                <label class="form-label"
                                                                    for="modalEditPassword">Password</label>
                                                                <div
                                                                    class="input-group input-group-merge form-password-toggle">
                                                                    <input class="form-control form-control-merge"
                                                                        id="edit_password" type="password"
                                                                        name="edit_password"
                                                                        aria-describedby="login-password"
                                                                        tabindex="2" /><span
                                                                        class="input-group-text cursor-pointer"><i
                                                                            data-feather="eye"></i></span>
                                                                </div>
                                                            </div> -->
                                                        <div class="col-12 col-md-6 mb-1">
                                                            <label class="form-label"
                                                                for="modalEditUserEmail">Email</label>
                                                            <input type="text" id="edit_email" name="edit_email"
                                                                class="form-control bg-white" value="<?= $email; ?>"
                                                                required readonly />
                                                        </div>
                                                        <div class="col-12 col-md-6 mb-1">
                                                            <label class="form-label" for="modalEditUserHandphone">No.
                                                                Handphone</label>
                                                            <input type="number" id="edit_phone" name="edit_phone"
                                                                class="form-control" value="<?= $handphone ?>"
                                                                required />
                                                        </div>
                                                        <div class="col-12 mb-1">
                                                            <label class="form-label"
                                                                for="modalEditAddress">Alamat</label>
                                                            <textarea name="edit_address" id="edit_address"
                                                                class="form-control" required><?= $alamat; ?></textarea>
                                                        </div>
                                                        <div class="col-12 col-md-6 mb-1">
                                                            <label class="form-label"
                                                                for="modalEditUserLevel">Tingkat</label>
                                                            <select id="<?= $edit_role_id; ?>" name="edit_role"
                                                                class="form-select" aria-label="Default select example">
                                                                <option value="">- Pilih Tingkat -</option>
                                                                <?php
																	foreach ($data_roles as $datas) {
																		$id = $datas['id'];
																		$nama = $datas['name'];
																		// $selected = ($id == $user_level) ? 'selected' : '';
																
																		echo "<option value=\"$id\">$nama</option>";
																	}
																?>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-md-6 mb-1">
                                                            <label class="form-label"
                                                                for="modalEditUserStatus">Status</label>
                                                            <select id="edit_status" name="edit_status"
                                                                class="form-select" aria-label="Default select example">
                                                                <option value="0"
                                                                    <?php if($user_status == "0") echo "selected"; ?>>
                                                                    Tidak Aktif</option>
                                                                <option value="1"
                                                                    <?php if($user_status == "1") echo "selected"; ?>>
                                                                    Aktif
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-md-6 mb-1"
                                                            id="<?= $selectEditKementerian_id ?>" style="display:none;">
                                                            <label class="form-label"
                                                                for="modalEditUserStatus">Kementerian</label>
                                                            <select id="<?= $edit_kementerian_id; ?>"
                                                                name="edit_instansi" class="form-select"
                                                                aria-label="Default select example">
                                                                <option value="">- Pilih Kementerian -</option>
                                                                <?php
																	foreach ($data_kementerian as $datas) {
																		$id = $datas['id'];
																		$nama = $datas['instansi'];
																		$selected = ($nama == $instansi) ? 'selected' : '';
																
																		echo "<option value=\"$id\" $selected>$nama</option>";
																	}
																?>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-md-6 mb-1"
                                                            id="<?= $selectEditInstansi_id; ?>" style="display:none;">
                                                            <label class="form-label"
                                                                for="modalEditUserStatus">Instansi</label>
                                                            <select id="<?= $edit_instansi_id ?>" name="edit_instansi"
                                                                class="form-select" aria-label="Default select example">
                                                                <option value="">- Pilih Instansi -</option>
                                                                <?php
																	foreach ($data_instansi as $datas) {
																		$id = $datas['id'];
																		$nama = $datas['instansi'];
																		$selected = ($nama == $instansi) ? 'selected' : '';
																
																		echo "<option value=\"$id\" $selected>$nama</option>";
																	}
																?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 text-center mt-2 pt-50">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1">Ubah</button>
                                                            <button type="reset" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                Batalkan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Edit User Modal -->

                                <script>
                                var <?= $edit_role_id; ?> = document.getElementById('<?= $edit_role_id; ?>');
                                var <?= $edit_kementerian_id; ?> = document.getElementById(
                                    '<?= $edit_kementerian_id; ?>');
                                var <?= $edit_instansi_id; ?> = document.getElementById('<?= $edit_instansi_id; ?>');
                                var <?= $selectEditKementerian_id; ?> = document.getElementById(
                                    '<?= $selectEditKementerian_id; ?>');
                                var <?= $selectEditInstansi_id; ?> = document.getElementById(
                                    '<?= $selectEditInstansi_id; ?>');

                                <?= $edit_role_id; ?>.addEventListener('change', function() {
                                    var selectedValue = this.value;

                                    if (selectedValue == 1 || selectedValue == 2) {
                                        <?= $selectEditKementerian_id ?>.style.display = 'none';
                                        <?= $selectEditInstansi_id ?>.style.display = 'none';
                                        <?= $edit_kementerian_id; ?>.disabled = true;
                                        <?= $edit_instansi_id; ?>.disabled = true;
                                    } else if (selectedValue == 3) {
                                        <?= $selectEditKementerian_id ?>.style.display = 'block';
                                        <?= $selectEditInstansi_id ?>.style.display = 'none';
                                        <?= $edit_kementerian_id; ?>.disabled = false;
                                        <?= $edit_instansi_id; ?>.disabled = true;
                                    } else if (selectedValue == 4) {
                                        <?= $selectEditKementerian_id ?>.style.display = 'none';
                                        <?= $selectEditInstansi_id ?>.style.display = 'block';
                                        <?= $edit_kementerian_id; ?>.disabled = true;
                                        <?= $edit_instansi_id; ?>.disabled = false;
                                    }
                                });
                                </script>
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

        <!-- Modal Add User -->
        <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Tambah Informasi Pengguna</h1>
                        </div>
                        <form action="<?= site_url('adm_user/add') ?>" class="row gy-1 pt-75" method="POST">
                            <div class="col-12">
                                <label class="form-label" for="modalEditUserName">Nama Lengkap</label>
                                <input type="text" id="add_name" name="add_name" class="form-control" value=""
                                    required />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserEmail">Email</label>
                                <input type="text" id="add_email" name="add_email" class="form-control" value=""
                                    required />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserHandphone">No. Handphone</label>
                                <input type="number" id="add_phone" name="add_phone" class="form-control" value=""
                                    required />
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="modalEditPassword">Password</label>
                                <div class="input-group input-group-merge form-password-toggle">
                                    <input class="form-control form-control-merge" id="add_password" type="password"
                                        name="add_password" placeholder="············" aria-describedby=""
                                        tabindex="2" /><span class="input-group-text cursor-pointer" required><i
                                            data-feather="eye"></i></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="add_retype">Ulangi Password</label>
                                <div class="input-group input-group-merge form-password-toggle">
                                    <input class="form-control form-control-merge" id="add_retype" type="password"
                                        name="add_retype" placeholder="············" aria-describedby="add_retype"
                                        tabindex="3" required /><span class="input-group-text cursor-pointer"><i
                                            data-feather="eye"></i></span>
                                </div>
                                <div class="form-label text-danger" id="retype-error"></div>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="modalEditAddress">Alamat</label>
                                <textarea name="add_address" id="add_address" class="form-control" required></textarea>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserLevel">Tingkat</label>
                                <select id="add_role" name="add_role" class="form-select"
                                    aria-label="Default select example">
                                    <!-- <option value="">- Pilih Tingkat -</option> -->
                                    <?php
										foreach ($data_roles as $datas) {
											$id = $datas['id'];
											$nama = $datas['name'];
									
											echo "<option value=\"$id\">$nama</option>";
										}
									?>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">Status</label>
                                <select id="add_status" name="add_status" class="form-select"
                                    aria-label="Default select example">
                                    <option value="0">Tidak Aktif</option>
                                    <option value="1">Aktif</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6" id="selectAddKementerian" style="display: none;">
                                <label class="form-label" for="modalEditUserStatus">Kementerian</label>
                                <select id="add_kementerian" name="add_instansi" class="form-select"
                                    aria-label="Default select example">
                                    <option value="">- Pilih Kementerian -</option>
                                    <?php
										foreach ($data_kementerian as $datas) {
											$id = $datas['id'];
											$nama = $datas['instansi'];
									
											echo "<option value=\"$id\">$nama</option>";
										}
									?>
                                </select>
                            </div>
                            <div class="col-12 col-md-6" id="selectAddInstansi" style="display: none;">
                                <label class="form-label" for="modalEditUserStatus">Instansi</label>
                                <select id="add_instansi" name="add_instansi" class="form-select"
                                    aria-label="Default select example">
                                    <option value="">- Pilih Instansi -</option>
                                    <?php
										foreach ($data_instansi as $datas) {
											$id = $datas['id'];
											$nama = $datas['instansi'];
									
											echo "<option value=\"$id\">$nama</option>";
										}
									?>
                                    </option>
                                </select>
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
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('add_retype').addEventListener('input', function() {
        var password = document.getElementById('add_password').value;
        var retype = this.value;
        var errorElement = document.getElementById('retype-error');

        if (password !== retype) {
            errorElement.innerText = "Passwords do not match.";
        } else {
            errorElement.innerText = "";
        }
    });



    var add_role = document.getElementById('add_role');
    var add_kementerian = document.getElementById('add_kementerian');
    var add_instansi = document.getElementById('add_instansi');
    var selectAddKementerian = document.getElementById('selectAddKementerian');
    var selectAddInstansi = document.getElementById('selectAddInstansi');

    add_role.addEventListener('change', function() {
        var selectedValue = this.value;

        if (selectedValue == 1 || selectedValue == 2) {
            selectAddKementerian.style.display = 'none';
            selectAddInstansi.style.display = 'none';
            add_kementerian.disabled = true; // Menambahkan atribut disabled
            add_instansi.disabled = true; // Menambahkan atribut disabled
        } else if (selectedValue == 3) {
            selectAddKementerian.style.display = 'block';
            selectAddInstansi.style.display = 'none';
            add_kementerian.disabled = false; // Menghapus atribut disabled
            add_instansi.disabled = true; // Menambahkan atribut disabled
        } else if (selectedValue == 4) {
            selectAddKementerian.style.display = 'none';
            selectAddInstansi.style.display = 'block';
            add_kementerian.disabled = true; // Menambahkan atribut disabled
            add_instansi.disabled = false; // Menghapus atribut disabled
        }
    });


    // var edit_role = document.querySelectorAll('.edit_role');
    // var edit_kementerian = document.querySelectorAll('.edit_kementerian');
    // var edit_instansi = document.querySelectorAll('.edit_instansi');
    // var selectEditKementerian = document.querySelectorAll('.selectEditKementerian');
    // var selectEditInstansi = document.querySelectorAll('.selectEditInstansi');

    // for (var i = 0; i < edit_role.length; i++) {
    //     edit_role[i].addEventListener('change', function() {
    //         var selectedValue = this.value;
    //         var index = Array.from(edit_role).indexOf(this);

    //         if (selectedValue == 1 || selectedValue == 2) {
    //             selectEditKementerian[index].style.display = 'none';
    //             selectEditInstansi[index].style.display = 'none';
    //             edit_kementerian[index].disabled = true;
    //             edit_instansi[index].disabled = true;
    //         } else if (selectedValue == 3) {
    //             selectEditKementerian[index].style.display = 'block';
    //             selectEditInstansi[index].style.display = 'none';
    //             edit_kementerian[index].disabled = false;
    //             edit_instansi[index].disabled = true;
    //         } else if (selectedValue == 4) {
    //             selectEditKementerian[index].style.display = 'none';
    //             selectEditInstansi[index].style.display = 'block';
    //             edit_kementerian[index].disabled = true;
    //             edit_instansi[index].disabled = false;
    //         }
    //     });
    // }


    console.log(edit_role);

});
</script>

<script>
$(document).ready(function() {
    $('.delete-confirm').click(function() {
        const id = $(this).data('id');

        Swal.fire({
            title: 'Apakah Anda yakin??',
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
                window.location.href = '<?= site_url(); ?>adm_user/delete/' + id;
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
