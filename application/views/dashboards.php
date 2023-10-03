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
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <div class="row match-height">

                <!-- Greetings Card starts -->
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="card card-congratulations">
                        <div class="d-flex flex-column align-items-center justify-content-center h-100">
                            <img src="<?= site_url('themes') ?>/app-assets/images/elements/decore-left.png"
                                class="congratulations-img-left" alt="card-img-left" />
                            <img src="<?= site_url('themes') ?>/app-assets/images/elements/decore-right.png"
                                class="congratulations-img-right" alt="card-img-right" />
                            <div class="avatar avatar-xl bg-primary shadow">
                                <div class="avatar-content">
                                    <img class="round" src="<?= $this->user_photo; ?>" alt="avatar" height="40"
                                        width="40">
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-1 text-white">Selamat datang <strong><?= $full_name; ?></strong></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Greetings Card ends -->
                <!-- search header -->
                <div class="col-xl-8 col-md-6 col-12">
                    <section id="faq-search-filter">
                        <div class="card faq-search"
                            style="background-image: url('<?= site_url('themes') ?>/app-assets/images/banner/banner.png')">
                            <div class="card-body text-center">
                                <!-- main title -->
                                <h2 class="text-primary">Mencari status tiket Anda?</h2>

                                <!-- subtitle -->
                                <p class="card-text mb-2">
                                    atau Anda belum membuat tiket.
                                    <span class="text-primary"
                                        onclick="window.location.href = '<?= site_url('all_tickets') ?>'"
                                        style="cursor: pointer; font-weight: bold">Klik disini</span>
                                </p>

                                <!-- search input -->
                                <div class="input-group input-group-merge mb-50">
                                    <div class="input-group-text" id="searchIcon">
                                        <i data-feather="search"></i>
                                    </div>
                                    <input type="text" class="form-control" id="txbSearchTicket" autocomplete="off"
                                        placeholder="Masukkan nomor tiket Anda ...." style="padding-left: 10px;" />
                                </div>

                                <div id="loadSearchTicket" class="hidden">
                                    <strong>Memuat...</strong>
                                    <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- /search header -->

            </div>

        </div>

    </div>
</div>
<!-- END: Content-->

<script>
$("#txbSearchTicket").keyup(function(event) {
    if (event.keyCode === 13) {
        $('#loadSearchTicket').removeClass('hidden');
        $('#loadSearchTicket').addClass('d-flex align-items-center');
        $('#searchIcon').addClass('disabledCustom');
        $('#txbSearchTicket').attr('disabled', true);

        searchTicket()
    }
});

function searchTicket() {

    $.ajax({
        url: "<?= site_url('ajax/search_ticket/'); ?>" + $('#txbSearchTicket').val(),
        type: "GET",
        success: function(data) {

            var dataParse = JSON.parse(data);
            if (dataParse.data === null) {

                Swal.fire({
                    title: 'Warning!',
                    text: ' Tiket tidak ditemukan!',
                    icon: 'warning',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false,
                    allowOutsideClick: false
                });

            } else {
                window.location.href = '<?= site_url('ticket/') ?>' + $('#txbSearchTicket').val();
            }

        },
        error: function(request, status, error) {
            console.log(error);
        },
        complete: function() {
            $('#loadSearchTicket').removeClass('d-flex align-items-center');
            $('#loadSearchTicket').addClass('hidden');
            $('#searchIcon').removeClass('disabledCustom');
            $('#txbSearchTicket').attr('disabled', false);
        }
    });

}
</script>
<?php