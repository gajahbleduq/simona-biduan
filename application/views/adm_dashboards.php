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
                        <div class="d-flex flex-column align-items-center justify-content-center h-100"
                            style="padding: 1.5rem">
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
                                <h1 class="mb-1 text-white">Selamat datang <strong><?= $full_name; ?></strong>,</h1>
                                <?php
								if($count_submitted > 0) {
									if ($this->user_level == 1) {
										?>
                                <p class="card-text m-auto w-75">
                                    Terdapat <a class="text-danger" href="<?= site_url('submitted') ?>"
                                        style="font-weight: bold;"><?= $count_submitted; ?></a> tiket
                                    baru
                                    yang telah diajukan. Tolong konfirmasi
                                    segera.
                                </p>
                                <?php
									} else {
										?>

                                <p class="card-text m-auto w-75">
                                    Terdapat <a class="text-danger" href="<?= site_url('ins/followedup') ?>"
                                        style="font-weight: bold;"><?= $count_submitted; ?></a> tiket
                                    yang telah diteruskan ke instansi Anda. Tolong konfirmasi
                                    segera.
                                </p>
                                <?php
									}
								}
 								?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Greetings Card ends -->

                <div class="col-xl-8 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Statistik Survey</h4>
                            <div class="dropdown">
                                <i data-feather="more-vertical" class="cursor-pointer" role="button" id="survey-list"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </i>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="survey-list">
                                    <?php foreach($count_surveys as $survey): ?>
                                    <a class="dropdown-item survey-item" href="#"
                                        data-id="<?= $survey['survey_id'] ?>"><?= $survey['title'] ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="mySurveyChart" class="polar-area-chart-ex chartjs" data-height="350"></canvas>
                        </div>
                    </div>
                </div>

                <!--Bar Chart Start -->
                <div class="col-xl-12 col-12">
                    <div class="card">
                        <div
                            class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                            <div class="header-left">
                                <h4 class="card-title">Total Tiket</h4>
                                <small>2 minggu terakhir</small>
                            </div>
                            <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                                <i data-feather="calendar"></i>
                                <input type="text"
                                    class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
                                    placeholder="YYYY-MM-DD" id="dateInput" />
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myTotalTicketsChart" class="bar-chart-ex chartjs" data-height="400"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Bar Chart End -->

            </div>

        </div>

    </div>
</div>
<!-- END: Content-->

<script>
document.addEventListener('DOMContentLoaded', function() {

    'use strict';

    var chartWrapper = $('.chartjs'),
        flatPicker = $('.flat-picker'),
        barChartEx = $('.bar-chart-ex'),
        horizontalBarChartEx = $('.horizontal-bar-chart-ex'),
        lineChartEx = $('.line-chart-ex'),
        radarChartEx = $('.radar-chart-ex'),
        polarAreaChartEx = $('.polar-area-chart-ex'),
        bubbleChartEx = $('.bubble-chart-ex'),
        doughnutChartEx = $('.doughnut-chart-ex'),
        scatterChartEx = $('.scatter-chart-ex'),
        lineAreaChartEx = $('.line-area-chart-ex');

    // Color Variables
    var primaryColorShade = '#836AF9',
        yellowColor = '#ffe800',
        successColorShade = '#28dac6',
        warningColorShade = '#ffe802',
        warningLightColor = '#FDAC34',
        infoColorShade = '#299AFF',
        greyColor = '#4F5D70',
        blueColor = '#2c9aff',
        blueLightColor = '#84D0FF',
        greyLightColor = '#EDF1F4',
        tooltipShadow = 'rgba(0, 0, 0, 0.25)',
        lineChartPrimary = '#666ee8',
        lineChartDanger = '#ff4961',
        labelColor = '#6e6b7b',
        primaryColor = '#1e365c',
        successColor = '#28c76f',
        infoColor = '#00cfe8',
        warningColor = '#ff9f43',
        dangerColor = '#ea5455',
        grid_line_color = 'rgba(200, 200, 200, 0.2)'; // RGBA color helps in dark layout

    // Detect Dark Layout
    if ($('html').hasClass('dark-layout')) {
        labelColor = '#b4b7bd';
    }

    // Wrap charts with div of height according to their data-height
    if (chartWrapper.length) {
        chartWrapper.each(function() {
            $(this).wrap($('<div style="height:' + this.getAttribute('data-height') + 'px"></div>'));
        });
    }

    // Init flatpicker
    if (flatPicker.length) {
        var today = new Date();
        var twoWeeksAgo = new Date();
        twoWeeksAgo.setDate(twoWeeksAgo.getDate() - 14);
        flatPicker.each(function() {
            $(this).flatpickr({
                mode: 'range',
                defaultDate: [twoWeeksAgo,
                    today
                ] // Rentang tanggal default adalah 2 minggu terakhir hingga hari ini
            });
        });
    }

    // Survey Chart
    // ----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    var ctxSurveyChart = document.getElementById('mySurveyChart');
    var SurveyChart;

    $.ajax({
        url: '<?= site_url(); ?>/ajax/survey_chart',
        method: 'GET',
        dataType: 'json',
        success: function(data) {

            var surveyData = data;

            var sangatPuasData = surveyData.map(function(survey) {
                return parseInt(survey.sangat_puas);
            });

            var puasData = surveyData.map(function(survey) {
                return parseInt(survey.puas);
            });

            var cukupData = surveyData.map(function(survey) {
                return parseInt(survey.cukup);
            });

            var kurangPuasData = surveyData.map(function(survey) {
                return parseInt(survey.kurang_puas);
            });

            var tidakPuasData = surveyData.map(function(survey) {
                return parseInt(survey.tidak_puas);
            });

            var combinedData = [
                sangatPuasData.reduce(function(a, b) {
                    return a + b;
                }, 0),
                puasData.reduce(function(a, b) {
                    return a + b;
                }, 0),
                cukupData.reduce(function(a, b) {
                    return a + b;
                }, 0),
                kurangPuasData.reduce(function(a, b) {
                    return a + b;
                }, 0),
                tidakPuasData.reduce(function(a, b) {
                    return a + b;
                }, 0)
            ];

            if (ctxSurveyChart) {
                SurveyChart = new Chart(ctxSurveyChart, {
                    type: 'polarArea',
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        responsiveAnimationDuration: 500,
                        legend: {
                            position: 'right',
                            labels: {
                                usePointStyle: true,
                                padding: 25,
                                boxWidth: 9,
                                fontColor: labelColor
                            }
                        },
                        layout: {
                            padding: {
                                top: -5,
                                bottom: -45
                            }
                        },
                        tooltips: {
                            shadowOffsetX: 1,
                            shadowOffsetY: 1,
                            shadowBlur: 8,
                            shadowColor: tooltipShadow,
                            backgroundColor: window.colors.solid.white,
                            titleFontColor: window.colors.solid.black,
                            bodyFontColor: window.colors.solid.black
                        },
                        scale: {
                            scaleShowLine: true,
                            scaleLineWidth: 1,
                            ticks: {
                                display: false,
                                fontColor: labelColor
                            },
                            reverse: false,
                            gridLines: {
                                display: false
                            }
                        },
                        animation: {
                            animateRotate: false
                        }
                    },
                    data: {
                        labels: ['Sangat Puas', 'Puas', 'Cukup', 'Kurang Puas',
                            'Tidak Puas'
                        ],
                        datasets: [{
                            label: 'Jawaban',
                            backgroundColor: [
                                successColor,
                                infoColor,
                                primaryColor,
                                warningColor,
                                dangerColor
                            ],
                            data: combinedData,
                            borderWidth: 0
                        }]
                    }
                });
            }
        },
        error: function(error) {
            console.log('Error fetching data:', error);
        }
    });

    $('.survey-item').click(function(e) {
        e.preventDefault();
        var surveyId = $(this).data('id');

        $.ajax({
            url: '<?= site_url('ajax/survey_chart') ?>',
            method: 'POST',
            data: {
                survey_id: surveyId
            },
            dataType: 'json',
            success: function(data) {
                var surveyData = data;

                var sangatPuasData = surveyData.map(function(survey) {
                    return parseInt(survey.sangat_puas);
                });

                var puasData = surveyData.map(function(survey) {
                    return parseInt(survey.puas);
                });

                var cukupData = surveyData.map(function(survey) {
                    return parseInt(survey.cukup);
                });

                var kurangPuasData = surveyData.map(function(survey) {
                    return parseInt(survey.kurang_puas);
                });

                var tidakPuasData = surveyData.map(function(survey) {
                    return parseInt(survey.tidak_puas);
                });

                var combinedData = [
                    sangatPuasData.reduce(function(a, b) {
                        return a + b;
                    }, 0),
                    puasData.reduce(function(a, b) {
                        return a + b;
                    }, 0),
                    cukupData.reduce(function(a, b) {
                        return a + b;
                    }, 0),
                    kurangPuasData.reduce(function(a, b) {
                        return a + b;
                    }, 0),
                    tidakPuasData.reduce(function(a, b) {
                        return a + b;
                    }, 0)
                ];

                SurveyChart.data.datasets[0].data = combinedData;
                SurveyChart.update()
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });

    // Total Tickets Chart
    // ----------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // Date Format
    function formatDate(dateString) {
        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            weekday: 'long'
        };
        return new Date(dateString).toLocaleDateString('id-ID', options);
    }

    var ctxTotalTicketsChart = document.getElementById('myTotalTicketsChart');
    var TotalTicketsChart;

    $.ajax({
        url: '<?= site_url(); ?>/ajax/total_tickets_chart',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            if (ctxTotalTicketsChart) {
                TotalTicketsChart = new Chart(ctxTotalTicketsChart, {
                    type: 'bar',
                    options: {
                        elements: {
                            rectangle: {
                                borderWidth: 2,
                                borderSkipped: 'bottom'
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        responsiveAnimationDuration: 500,
                        legend: {
                            display: false
                        },
                        tooltips: {
                            // Updated default tooltip UI
                            shadowOffsetX: 1,
                            shadowOffsetY: 1,
                            shadowBlur: 8,
                            shadowColor: tooltipShadow,
                            backgroundColor: window.colors.solid.white,
                            titleFontColor: window.colors.solid.black,
                            bodyFontColor: window.colors.solid.black
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                gridLines: {
                                    display: true,
                                    color: grid_line_color,
                                    zeroLineColor: grid_line_color
                                },
                                scaleLabel: {
                                    display: false
                                },
                                ticks: {
                                    fontColor: labelColor
                                }
                            }],
                            yAxes: [{
                                display: true,
                                gridLines: {
                                    color: grid_line_color,
                                    zeroLineColor: grid_line_color
                                },
                                ticks: {
                                    stepSize: 100,
                                    min: 0,
                                    fontColor: labelColor
                                }
                            }]
                        }
                    },
                    data: {
                        labels: data.map(item => formatDate(item.date)),
                        datasets: [{
                            label: 'Total Tiket',
                            data: data.map(item => item
                                .total_reports),
                            barThickness: 15,
                            backgroundColor: successColorShade,
                            borderColor: 'transparent'
                        }]
                    }
                });
            }
        },
        error: function(error) {
            console.log('Error fetching data:', error);
        }
    });

    $('#dateInput').on('change', function() {
        var selectedDate = $(this).val();

        $.ajax({
            url: '<?= site_url(); ?>/ajax/total_tickets_chart',
            method: 'POST',
            data: {
                date_range: selectedDate
            },
            dataType: 'json',
            success: function(data) {
                // Perbarui data dan label grafik
                TotalTicketsChart.data.labels = data.map(item => formatDate(item.date));
                TotalTicketsChart.data.datasets[0].data = data.map(item => item
                    .total_reports);

                // Perbarui grafik
                TotalTicketsChart.update();
                // console.log(data);
            },
            error: function(error) {
                console.log('Error fetching data:', error);
            }
        });
    });
});
</script>