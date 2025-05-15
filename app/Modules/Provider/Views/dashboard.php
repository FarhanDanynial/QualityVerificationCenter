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
</style>

<div class="row">
    <!-- Provider Profile -->
    <div class="col-lg-5 col-md-12 col-sm-12 mt-lg-0 mt-md-4 mt-sm-4">
        <div class="page-header min-height-100 border-radius-xl" style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="../../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            <?= $provider_info->pvd_name ?>
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            <?= $provider_info->pvd_address ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">My Information</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="javascript:;" onclick="showEditModal()">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <hr class="horizontal gray-light my-2">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name:</strong> <br><?= $provider_info->pvd_name ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> <br><?= $provider_info->pvd_phone ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> <br><?= $provider_info->pvd_email ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> <br><?= $provider_info->pvd_address ?></li>
                        <li class="list-group-item border-0 ps-0 pb-0"><strong class="text-dark text-sm">Type:</strong> <br><?= $provider_info->pvd_type ?></li>
                        <li class="list-group-item border-0 ps-0 pb-0"><strong class="text-dark text-sm">Date of establishment:</strong> <br><?= date('d/m/Y', strtotime($provider_info->pvd_doe)) ?> </li>
                        <li class="list-group-item border-0 ps-0 pb-0"><strong class="text-dark text-sm">SSM Number:</strong> <br><?= $provider_info->pvd_ssm_number ?></li>
                        <li class="list-group-item border-0 ps-0 pb-0">
                            <strong class="text-dark text-sm">SSM Cert:</strong>
                            <br>
                            <a href="<?= base_url($provider_info->pvd_ssm_cert) ?>" class="btn btn-primary btn-sm mt-2" target="_blank">
                                <i class="fas fa-file-pdf me-2" style="font-size: 1rem;"></i> View SSM Certificate
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Simplifeid Data, Memo and Submission Button -->
    <div class="col-lg-7">
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
            <div class="col-lg-6 col-sm-6">
                <div class="card  mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Course Submitted</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        100
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
                                        300
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
                                        RM50, 000
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
                                        100
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
        <div class="mt-4">
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
                <div class="card-body border-radius-lg p-3 my-2" style="height:338px; overflow:auto;">
                    <?php if ($unread_notifications == '0'): ?>
                        <div class="empty-notification p-4">
                            <center>
                                <img src="<?= base_url('assets/img/icons/thumbs_up.png') ?>" alt="No Notifications" class="mb-3" style="max-width: 230px;">
                            </center>
                            <p class="text-muted text-center">
                                You have no notifications at the moment. Check back later!
                            </p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($notifications as $notification): ?>
                            <div class="d-flex mt-3">
                                <div>
                                    <div class="icon icon-shape bg-primary-soft shadow text-center border-radius-md shadow-none">
                                        <i class="ni ni-bell-55 text-lg text-primary text-gradient opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="numbers">
                                        <h6 class="mb-1 text-dark text-sm">
                                            <a href="#"
                                                class="notification-link"
                                                data-id="<?= $notification->n_id ?>"
                                                style="text-decoration: none; color: inherit;">
                                                <?= $notification->n_message ?>
                                            </a>
                                        </h6>
                                        <span class="text-sm">
                                            <?php
                                            $date = new DateTime($notification->n_created_at);
                                            $formattedDate = $date->format('d F Y, \a\t h:i A');
                                            ?><?= $formattedDate ?>
                                        </span>

                                        <?php if ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0): ?>
                                            <span class="badge badge-primary">Unread</span>
                                        <?php else: ?>
                                            <span class="badge badge-success">Read</span>
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
    });
</script>


<!-- Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog">
        <div class="modal-content">
            <form id="editProfileForm">
                <?= csrf_field() ?>
                <div class="bg-primary modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control bg-light" id="name" name="pvd_name" value="<?= $provider_info->pvd_name ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="phone" name="pvd_phone" value="<?= $provider_info->pvd_phone ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="pvd_email" value="<?= $provider_info->pvd_email ?>">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Location</label>
                        <input type="text" class="form-control" id="address" name="pvd_location" value="<?= $provider_info->pvd_address ?>">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Date of Establishment</label>
                        <input type="text" class="form-control bg-light" id="doe" name="doe" value="<?= date('d/m/Y', strtotime($provider_info->pvd_doe)) ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">SSM Number</label>
                        <input type="text" class="form-control bg-light" id="ssm_number" name="ssm_number" value="<?= $provider_info->pvd_ssm_number ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">SSM Cert</label>
                        <br>
                        <a href="<?= base_url($provider_info->pvd_ssm_cert) ?>" class="btn btn-primary btn-sm mt-2" target="_blank">
                            <i class="fas fa-file-pdf me-2" style="font-size: 1rem;"></i> View SSM Certificate
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary mb-0" data-bs-dismiss="modal"><i class="fas fa-times" style="font-size: 1rem !important;"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-sm btn-primary mb-0"><i class="fas fa-save" style="font-size: 1rem !important;"></i>&nbsp; Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Profile Script -->
<script>
    function showEditModal() {
        const editProfileModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
        editProfileModal.show();
    }

    document.getElementById('editProfileForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        formData.append("<?= csrf_token() ?>", "<?= csrf_hash() ?>");

        fetch("<?= base_url('provider/update_profile') ?>", {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Failed to update profile.',
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred.',
                });
            });
    });
</script>