<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

<!-- XLSX (For Export to Excel) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 mt-lg-0 mt-md-4 mt-sm-4 mb-4">
        <div class="mt">
            <div class="card">
                <div class="card-header d-flex align-items-center bg-gradient-primary justify-content-between pb-0 p-3">
                    <h5 class="mb-3">Memo</h5>
                    <div class="nav-wrapper position-relative">
                        <button type="button" class="btn btn-default bg-white d-flex align-items-center mb-2">
                            <span>Unread messages</span>
                            <span class="badge bg-primary ms-2"><?= $unread_notifications ?></span>
                        </button>
                    </div>
                </div>
                <div class="card-body border-radius-lg p-3 my-2" style="height:690px; overflow:auto;">
                    <?= csrf_field() ?>
                    <?php if ($unread_notifications == '0'): ?>
                        <div class="empty-notification p-4">
                            <center>
                                <img src="<?= base_url('assets/img/icons/thumbs_up.png') ?>" alt="No Notifications" class="mb-3" style="max-width: 300px;">
                            </center>
                            <p class="text-muted text-center">
                                You have no notifications at the moment. Check back later!
                            </p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($notifications as $notification): ?>
                            <div class="d-flex mt-2 p-2 <?= ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0) ? 'bg-light rounded border-start border-primary border-2' : '' ?>">
                                <div>
                                    <div class="icon icon-shape <?= ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0) ? 'bg-primary' : 'bg-gray-300' ?> shadow-sm text-center border-radius-md" style="width: 32px;">
                                        <i class="ni ni-bell-55 <?= ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0) ? 'text-white' : 'text-dark' ?> opacity-10" aria-hidden="true" style="font-size: 14px;"></i>
                                    </div>
                                </div>
                                <div class="ms-3 w-100">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="numbers">
                                            <h6 class="mb-1 text-dark font-weight-bold">
                                                <?= $notification->n_message ?>
                                            </h6>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="text-xs text-secondary">
                                                    <?php
                                                    $date = new DateTime($notification->n_created_at);
                                                    $formattedDate = $date->format('d F Y, \a\t h:i A');
                                                    ?><?= $formattedDate ?>
                                                </span>

                                                <?php if ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0): ?>
                                                    <span class="badge bg-primary text-xs">Unread</span>
                                                <?php else: ?>
                                                    <span class="badge bg-success text-xs">Read</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <?php if ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0): ?>
                                            <button
                                                class="notification-link btn btn-xs text-primary"
                                                data-id="<?= $notification->n_id ?>"
                                                style="font-size: 11px; padding: 3px 8px; border: 1px solid #ccc; background: white;">
                                                <i class="ni ni-check-bold me-1"></i>Mark read
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 mt-lg-0 mt-md-4 mt-sm-4 mb-4">
        <div class="row">
            <div class="col-12">
                <div class="card bg-gradient-primary">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8 my-auto">
                                <div class="numbers">
                                    <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Welcome Back!</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        <?= $admin_info->qa_name; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 col-md-12 mt-4 mt-lg-0">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">SAMC Summary</h6>
                            <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto" data-bs-toggle="tooltip" data-bs-placement="bottom" title="See which websites are sending traffic to your website">
                                <i class="fas fa-info"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-6 col-12 text-center">
                                <div class="chart mt-5">
                                    <canvas id="chart-doughnut" class="chart-canvas" height="250"></canvas>
                                    <div id="empty-data-backdrop"
                                        class="position-absolute top-0 start-0 w-100 h-100 align-items-center justify-content-center text-center"
                                        style="background: rgba(0, 0, 0, 0.5); color: white; font-size: 18px; display: none;">
                                        No data available
                                    </div>
                                </div>
                                <a href="<?= base_url('provider/samc/my_samc') ?>" class="btn btn-sm bg-gradient-secondary mt-4">View SAMC</a>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <i class="fas fa-edit avatar avatar-sm me-2 d-flex align-items-center justify-content-center bg-light text-secondary rounded-circle" style="width: 40px; height: 40px;"></i>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Draft</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> <?= esc($chart_draft) ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <i class="fas fa-wallet avatar avatar-sm me-2 d-flex align-items-center justify-content-center bg-secondary text-white rounded-circle" style="width: 40px; height: 40px;"></i>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Pending Payment</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> <?= esc($chart_pending_payment) ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <i class="fas fa-spinner avatar avatar-sm me-2 d-flex align-items-center justify-content-center bg-primary text-white rounded-circle" style="width: 40px; height: 40px;"></i>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">In Progress</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"><?= esc($chart_in_progress) ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <i class="fas fa-undo avatar avatar-sm me-2 d-flex align-items-center justify-content-center bg-danger text-white rounded-circle" style="width: 40px; height: 40px;"></i>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Return</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"><?= esc($chart_return) ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <i class="fas fa-check-circle avatar avatar-sm me-2 d-flex align-items-center justify-content-center bg-warning text-white rounded-circle" style="width: 40px; height: 40px;"></i>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Accepted With Amendment</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"><?= esc($chart_accept_with_amendment) ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <i class="fas fa-check avatar avatar-sm me-2 d-flex align-items-center justify-content-center bg-success text-white rounded-circle" style="width: 40px; height: 40px;"></i>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Accepted</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"><?= esc($chart_accept) ?></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Total Registered Provider -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-dark text-sm mb-0 text-capitalize font-weight-bold opacity-7">Total Registered Provider</p>
                                    <h5 class="text-dark font-weight-bolder mb-0"><?= $total_provider ?></h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                    <i class="ni ni-single-02 text-white text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Registered Assessor -->
            <div class="col-lg-6 col-md-6 col-12 mt-4 mt-md-0">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-dark text-sm mb-0 text-capitalize font-weight-bold opacity-7">Total Registered Assessor</p>
                                    <h5 class="text-dark font-weight-bolder mb-0"><?= $total_assessor ?></h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                    <i class="ni ni-badge text-white text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Total SAMC -->
            <div class="col-lg-6 col-md-6 col-12 mt-4 mt-lg-0">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-dark text-sm mb-0 text-capitalize font-weight-bold opacity-7">Total SAMC</p>
                                    <h5 class="text-dark font-weight-bolder mb-0"><?= $total_samc ?></h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                                    <i class="ni ni-planet text-white text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Income -->
            <div class="col-lg-6 col-md-6 col-12 mt-4 mt-lg-0">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-dark text-sm mb-0 text-capitalize font-weight-bold opacity-7">Total Income</p>
                                    <h5 class="text-dark font-weight-bolder mb-0">RM<?= $total_income ?></h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                                    <i class="ni ni-chart-bar-32 text-white text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-12 mt-lg-0 mt-4">
        <div class="card z-index-2 position-relative">
            <div class="card-header p-3 pb-0 bg-gradient-primary">
                <h6>Assessor Expertise Barchart</h6>
            </div>
            <div class="card-body p-3 position-relative">
                <div class="chart position-relative">
                    <canvas id="bar-chart-horizontal" class="chart-canvas" height="300"></canvas>
                    <!-- Backdrop for Empty Data -->
                    <div id="empty-data-backdrop"
                        class="position-absolute top-0 start-0 w-100 h-100  align-items-center justify-content-center text-center"
                        style="background: rgba(0, 0, 0, 0.5); color: white; font-size: 18px; display: none;">
                        No data available
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script src="<?= base_url('') ?>assets/js/plugins/chartjs.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('.notification-link');
        const unreadBadge = document.querySelector('.btn .badge.bg-primary'); // Select the unread notifications badge

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const notificationId = this.getAttribute('data-id');
                const notificationContainer = this.closest('.numbers'); // Find the parent container
                const badge = notificationContainer.querySelector('.badge'); // Find the badge inside the parent container

                // Send AJAX request to mark the notification as read
                fetch('<?= base_url("qvcAdmin/notifications/markAsRead") ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded', // Ensure proper encoding
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: new URLSearchParams({
                            id: notificationId,
                            csrf_test_name: document.querySelector("input[name='csrf_test_name']").value
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update the badge text and style to show "Read"
                            if (badge) {
                                badge.classList.remove('badge-primary'); // Remove 'Unread' class
                                badge.classList.add('badge-success'); // Add 'Read' class
                                badge.textContent = 'Read'; // Update text to "Read"
                            }

                            // Deduct one from the unread notifications count
                            if (unreadBadge) {
                                let currentCount = parseInt(unreadBadge.textContent, 10);
                                if (currentCount > 0) {
                                    unreadBadge.textContent = currentCount - 1;
                                }
                            }

                            // 🔄 **Update CSRF Token in All Forms**
                            if (data.csrf_token) {
                                document.querySelectorAll("input[name='csrf_test_name']").forEach(input => {
                                    input.value = data.csrf_token;
                                });
                            }

                            // Show SweetAlert message
                            Swal.fire({
                                title: 'Notification Read',
                                text: 'The notification has been marked as read.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: 'Failed to mark notification as read.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while marking the notification as read.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    });
            });
        });

        // Fetch Chart Data
        fetch("<?= base_url('qvcAdmin/getSamcExpertiseData') ?>")
            .then(response => response.json())
            .then(data => {
                var ctx6 = document.getElementById("bar-chart-horizontal").getContext("2d");
                var backdrop = document.getElementById("empty-data-backdrop");

                if (!data.data || data.data.length === 0) {
                    // Show Backdrop if Data is Empty
                    backdrop.style.display = "flex";
                } else {
                    // Hide Backdrop if Data is Available
                    backdrop.style.display = "none";

                    // Render Chart
                    new Chart(ctx6, {
                        type: "bar",
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: "Samc by Expertise",
                                weight: 5,
                                borderWidth: 0,
                                borderRadius: 4,
                                backgroundColor: [
                                    '#FF5733', '#33FF57', '#3357FF', '#FF33A8', '#FFD700', '#A833FF'
                                ],
                                data: data.data,
                                fill: false
                            }],
                        },
                        options: {
                            indexAxis: 'y',
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            scales: {
                                y: {
                                    grid: {
                                        drawBorder: false,
                                        display: true,
                                        drawOnChartArea: true,
                                        drawTicks: false,
                                        borderDash: [5, 5]
                                    },
                                    ticks: {
                                        display: true,
                                        padding: 10,
                                        color: '#9ca2b7'
                                    }
                                },
                                x: {
                                    grid: {
                                        drawBorder: false,
                                        display: false,
                                        drawOnChartArea: true,
                                        drawTicks: true,
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#9ca2b7',
                                        padding: 10,
                                        stepSize: 1,
                                        beginAtZero: true
                                    }
                                },
                            },
                        },
                    });
                }
            })
            .catch(error => {
                console.error("Error fetching chart data:", error);
                document.getElementById("empty-data-backdrop").style.display = "flex";
            });
    });
</script>


<script src="<?= base_url() ?>assets/js/plugins/chartjs.min.js"></script>
<script>
    var ctx2 = document.getElementById("chart-doughnut").getContext("2d");
    // Doughnut chart
    new Chart(ctx2, {
        type: "doughnut",
        data: {
            labels: ['Draft', 'Pending Payment', 'In Progress', 'Return', 'Accepted With Amendment', 'Accepted'],
            datasets: [{
                label: "Projects",
                weight: 10,
                cutout: 60,
                tension: 0.9,
                pointRadius: 2,
                borderWidth: 2,
                backgroundColor: ['#e9ecef', '#67748e', '#0ea5e9', '#ea0606', '#fbcf33', '#82d616'],
                data: [
                    <?= esc($chart_draft) ?>,
                    <?= esc($chart_pending_payment) ?>,
                    <?= esc($chart_in_progress) ?>,
                    <?= esc($chart_return) ?>,
                    <?= esc($chart_accept_with_amendment) ?>,
                    <?= esc($chart_accept) ?>
                ],

                fill: false
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                    },
                    ticks: {
                        display: false
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                    },
                    ticks: {
                        display: false,
                    }
                },
            },
        },
    });
</script>