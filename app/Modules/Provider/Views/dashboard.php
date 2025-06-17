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

<!-- Select 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link href="<?= base_url(); ?>assets/css/select2override.css" rel="stylesheet" />
<style>
    .dataTable-wrapper .dataTable-container .table tbody tr td {
        padding: 0.25rem 1rem !important;
    }

    .dataTable-wrapper .dataTable-container .table thead tr th {
        padding: 0.75rem 1rem;
        opacity: .7;
        font-weight: bolder;
        color: #000000;
        text-transform: uppercase;
        font-size: 1rem;
        background-color: #0ea5e9;
    }

    .dataTable-wrapper .dataTable-bottom {
        padding-top: 1rem !important;
    }

    .horizontal-line {
        background-image: linear-gradient(to right,
                rgba(0, 0, 0, 1),
                rgba(0, 0, 0, 0.4),
                rgba(0, 0, 0, 0));
    }
</style>

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
                <div class="card-body border-radius-lg p-3 my-2" style="height:720px; overflow:auto;">
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
    <!-- Simplifeid Data, Memo and Submission Button -->
    <div class="col-lg-6">
        <div class="card bg-gradient-primary text-white">
            <div class="p-3 d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="mb-0">Submit Proforma to QVC UPSI</h5>
                    <p class="text-sm mb-0">
                        Submit your course Proforma for verification to the Quality Verification Center (QVC).</p>
                </div>
                <!-- <div class="col-lg-3 col-sm-6 col-12">
                    <button class="btn bg-white w-100 mb-0 toast-btn text-dark" type="button" data-bs-toggle="modal" data-bs-target="#samc_modal">
                        Submit Courses
                    </button>
                </div> -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <a href="<?= base_url('provider/samc/samc_form_p1') ?>" class="btn bg-white w-100 mb-0 toast-btn text-dark" type="button">
                        New Courses
                    </a>
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
            <div class="col-lg-6 col-sm-6">
                <div class="card  mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Course Submitted</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        100 (dummy)
                                        <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Active Course</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        300 (dummy)
                                        <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 mt-sm-0 mt-4">
                <div class="card  mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Payment</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        RM50, 000 (dummy)
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Expired Course</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        100 (dummy)
                                        <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Notification Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('.notification-link');
        const unreadBadge = document.querySelector('.btn .badge.bg-primary'); // Select the unread notifications badge

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const notificationId = this.getAttribute('data-id');
                const notificationContainer = this.closest('.notification-item'); // Change to the correct parent class
                const badge = notificationContainer ? notificationContainer.querySelector('.badge') : null;

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
                            // Find the notification container
                            const notificationContainer = this.closest('.d-flex.mt-2.p-2');

                            // Find the badge inside the notification
                            const badge = notificationContainer ? notificationContainer.querySelector('.badge') : null;

                            // ✅ Update the badge text and style to show "Read"
                            if (badge) {
                                badge.classList.remove('bg-primary'); // Remove 'Unread' class
                                badge.classList.add('bg-success'); // Add 'Read' class
                                badge.textContent = 'Read'; // Update text
                            }

                            // ✅ Deduct one from the unread notifications count
                            if (unreadBadge) {
                                let currentCount = parseInt(unreadBadge.textContent, 10);
                                if (currentCount > 0) {
                                    unreadBadge.textContent = currentCount - 1;
                                }
                            }

                            // ✅ Update the notification container styling
                            if (notificationContainer) {
                                notificationContainer.classList.remove('bg-light', 'rounded', 'border-start', 'border-primary', 'border-2');
                            }

                            // ✅ Update the icon color
                            const iconContainer = notificationContainer.querySelector('.icon-shape');
                            if (iconContainer) {
                                iconContainer.classList.remove('bg-primary');
                                iconContainer.classList.add('bg-gray-300');
                            }

                            // ✅ Update the icon text color
                            const icon = iconContainer.querySelector('.ni');
                            if (icon) {
                                icon.classList.remove('text-white');
                                icon.classList.add('text-dark');
                            }

                            // ✅ Hide the "Mark Read" button
                            this.style.display = 'none';

                            // 🔄 **Update CSRF Token in All Forms**
                            if (data.csrf_token) {
                                document.querySelectorAll("input[name='csrf_test_name']").forEach(input => {
                                    input.value = data.csrf_token;
                                });
                            }

                            // ✅ Show SweetAlert message
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