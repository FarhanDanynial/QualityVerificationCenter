<!-- Modern UI Framework -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- DataTables CSS with modern theme -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

<!-- FontAwesome Pro for better icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<!-- Select2 with Bootstrap 5 theme -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

<style>
    :root {
        --corporate-primary: #0f4c81;
        /* Professional blue */
        --corporate-secondary: #e9ecef;
        /* Light gray for backgrounds */
        --corporate-accent: #3498db;
        /* Accent blue */
        --corporate-success: #2ecc71;
        /* Success green */
        --corporate-warning: #f39c12;
        /* Warning orange */
        --corporate-danger: #e74c3c;
        /* Danger red */
        --text-primary: #2c3e50;
        /* Dark blue-gray text */
        --text-secondary: #7f8c8d;
        /* Medium gray text */
        --border-radius: 0.375rem;
        --box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }

    body {
        color: var(--text-primary);
        background-color: #f8f9fa;
        font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    }

    /* Card styles */
    .card {
        border: none;
        box-shadow: var(--box-shadow);
        border-radius: var(--border-radius);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    .card-header {
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        background-color: #fff;
        padding: 1.25rem 1.5rem;
        font-weight: 600;
    }

    /* Dashboard stats cards */
    .stat-card {
        height: 100%;
        border-left: 4px solid var(--corporate-primary);
    }

    .stat-card .icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background-color: rgba(15, 76, 129, 0.1);
        color: var(--corporate-primary);
    }

    .stat-card .numbers h5 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0;
    }

    .stat-card .numbers p {
        color: var(--text-secondary);
        font-weight: 500;
    }

    /* Profile section */
    .profile-header {
        background: linear-gradient(to right, var(--corporate-primary), var(--corporate-accent));
        height: 120px;
        border-radius: var(--border-radius) var(--border-radius) 0 0;
    }

    .profile-content {
        position: relative;
        margin-top: -60px;
        background-color: #fff;
        border-radius: var(--border-radius);
        padding: 1.5rem;
    }

    .profile-avatar {
        width: 100px;
        height: 100px;
        border: 4px solid #fff;
        border-radius: 50%;
        margin-top: -70px;
        box-shadow: var(--box-shadow);
        object-fit: cover;
    }

    .profile-info h4 {
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .profile-info p {
        color: var(--text-secondary);
    }

    /* Info list styles */
    .info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .info-list li {
        padding: 0.75rem 0;
        border-bottom: 1px solid var(--corporate-secondary);
    }

    .info-list li:last-child {
        border-bottom: none;
    }

    .info-list .info-label {
        font-weight: 600;
        color: var(--text-primary);
        display: block;
        margin-bottom: 0.25rem;
    }

    .info-list .info-value {
        color: var(--text-secondary);
    }

    /* Button styles */
    .btn-corporate {
        background-color: var(--corporate-primary);
        border: none;
        color: white;
        padding: 0.5rem 1.25rem;
        border-radius: var(--border-radius);
        font-weight: 500;
        transition: all 0.2s;
    }

    .btn-corporate:hover {
        background-color: var(--corporate-accent);
        transform: translateY(-1px);
        box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
    }

    .btn-outline-corporate {
        border: 1px solid var(--corporate-primary);
        color: var(--corporate-primary);
        background-color: transparent;
        padding: 0.5rem 1.25rem;
        border-radius: var(--border-radius);
        font-weight: 500;
        transition: all 0.2s;
    }

    .btn-outline-corporate:hover {
        background-color: var(--corporate-primary);
        color: white;
    }

    /* Action header card */
    .action-header {
        background: linear-gradient(to right, var(--corporate-primary), var(--corporate-accent));
        color: white;
        border-radius: var(--border-radius);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .action-header h5 {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .action-header p {
        opacity: 0.9;
        margin-bottom: 0;
    }

    /* Notification section */
    .notification-item {
        padding: 1rem;
        border-bottom: 1px solid var(--corporate-secondary);
        transition: background-color 0.2s;
    }

    .notification-item:hover {
        background-color: rgba(15, 76, 129, 0.05);
    }

    .notification-item:last-child {
        border-bottom: none;
    }

    .notification-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background-color: rgba(15, 76, 129, 0.1);
        color: var(--corporate-primary);
    }

    .badge-unread {
        background-color: var(--corporate-primary);
        color: white;
    }

    .badge-read {
        background-color: var(--corporate-success);
        color: white;
    }

    /* Modal styles */
    .modal-header {
        border-bottom: 1px solid var(--corporate-secondary);
        padding: 1.25rem 1.5rem;
    }

    .modal-footer {
        border-top: 1px solid var(--corporate-secondary);
        padding: 1.25rem 1.5rem;
    }

    /* Empty state styles */
    .empty-state {
        padding: 3rem 2rem;
        text-align: center;
    }

    .empty-state img {
        max-width: 150px;
        margin-bottom: 1.5rem;
        opacity: 0.7;
    }

    .empty-state p {
        color: var(--text-secondary);
        font-size: 1rem;
        max-width: 300px;
        margin: 0 auto;
    }

    /* DataTables customization */
    .dataTable {
        border-collapse: separate;
        border-spacing: 0;
    }

    .dataTable thead th {
        background-color: var(--corporate-primary);
        color: white;
        font-weight: 600;
        padding: 1rem;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .dataTable tbody td {
        padding: 0.75rem 1rem;
        vertical-align: middle;
    }

    /* Form controls */
    .form-control:focus {
        border-color: var(--corporate-accent);
        box-shadow: 0 0 0 0.25rem rgba(15, 76, 129, 0.25);
    }

    /* Select2 customization */
    .select2-container--bootstrap-5.select2-container--focus .select2-selection {
        border-color: var(--corporate-accent);
        box-shadow: 0 0 0 0.25rem rgba(15, 76, 129, 0.25);
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <!-- Left Column: Profile Information -->
        <div class="col-lg-4 mb-4">
            <!-- Profile Card -->
            <div class="card mb-4">
                <div class="profile-header"></div>
                <div class="profile-content">
                    <div class="d-flex flex-column align-items-center">
                        <img src="../../../assets/img/bruce-mars.jpg" class="profile-avatar" alt="Profile Image">
                        <div class="text-center mt-3 profile-info">
                            <h4><?= $provider_info->pvd_name ?></h4>
                            <p class="text-muted"><?= $provider_info->pvd_type ?></p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
                        <h6 class="fw-bold mb-0">Provider Information</h6>
                        <button class="btn btn-sm btn-outline-corporate" onclick="showEditModal()">
                            <i class="fas fa-pencil-alt me-1"></i> Edit
                        </button>
                    </div>

                    <ul class="info-list">
                        <li>
                            <span class="info-label"><i class="fas fa-phone-alt me-2 text-muted"></i> Contact Number</span>
                            <span class="info-value"><?= $provider_info->pvd_phone ?></span>
                        </li>
                        <li>
                            <span class="info-label"><i class="fas fa-envelope me-2 text-muted"></i> Email Address</span>
                            <span class="info-value"><?= $provider_info->pvd_email ?></span>
                        </li>
                        <li>
                            <span class="info-label"><i class="fas fa-map-marker-alt me-2 text-muted"></i> Location</span>
                            <span class="info-value"><?= $provider_info->pvd_address ?></span>
                        </li>
                        <li>
                            <span class="info-label"><i class="fas fa-calendar-alt me-2 text-muted"></i> Date of Establishment</span>
                            <span class="info-value"><?= date('d/m/Y', strtotime($provider_info->pvd_doe)) ?></span>
                        </li>
                        <li>
                            <span class="info-label"><i class="fas fa-id-card me-2 text-muted"></i> SSM Number</span>
                            <span class="info-value"><?= $provider_info->pvd_ssm_number ?></span>
                        </li>
                        <li>
                            <span class="info-label"><i class="fas fa-file-alt me-2 text-muted"></i> SSM Certificate</span>
                            <a href="<?= base_url($provider_info->pvd_ssm_cert) ?>" class="btn btn-sm btn-outline-corporate mt-2" target="_blank">
                                <i class="fas fa-file-pdf me-1"></i> View Certificate
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Right Column: Dashboard Content -->
        <div class="col-lg-8">
            <!-- Action Header -->
            <div class="action-header d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5>Submit Proforma to QVC UPSI</h5>
                    <p>Submit your course Proforma for verification to the Quality Verification Center (QVC).</p>
                </div>
                <div>
                    <a href="<?= base_url('provider/samc/samc_form_p1') ?>" class="btn btn-light">
                        <i class="fas fa-plus-circle me-2"></i> New Course
                    </a>
                </div>
            </div>

            <!-- Stats Cards Row -->
            <div class="row mb-4">
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="card stat-card h-100">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="numbers">
                                    <p class="mb-1">Submitted Courses</p>
                                    <h5>100</h5>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-alt fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="card stat-card h-100">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="numbers">
                                    <p class="mb-1">Active Courses</p>
                                    <h5>300</h5>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-check-circle fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="card stat-card h-100">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="numbers">
                                    <p class="mb-1">Total Payment</p>
                                    <h5>RM50,000</h5>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-money-bill-wave fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card stat-card h-100">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="numbers">
                                    <p class="mb-1">Expired Courses</p>
                                    <h5>100</h5>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-hourglass-end fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifications Card -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Notifications</h6>
                    <button type="button" class="btn btn-sm btn-outline-corporate">
                        <i class="fas fa-bell me-1"></i> Unread
                        <span class="badge bg-danger ms-1"><?= $unread_notifications ?></span>
                    </button>
                </div>

                <div class="card-body p-0" style="max-height: 400px; overflow-y: auto;">
                    <?php if ($unread_notifications == '0'): ?>
                        <div class="empty-state">
                            <img src="<?= base_url('assets/img/icons/thumbs_up.png') ?>" alt="No Notifications">
                            <p>You have no unread notifications at the moment.</p>
                        </div>
                    <?php else: ?>
                        <div class="notification-list">
                            <?php foreach ($notifications as $notification): ?>
                                <div class="notification-item">
                                    <div class="d-flex">
                                        <div class="notification-icon me-3">
                                            <i class="fas fa-bell"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <a href="#" class="notification-link text-decoration-none" data-id="<?= $notification->n_id ?>">
                                                <h6 class="mb-1 fw-semibold"><?= $notification->n_message ?></h6>
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    <?php
                                                    $date = new DateTime($notification->n_created_at);
                                                    $formattedDate = $date->format('d F Y, \a\t h:i A');
                                                    echo $formattedDate;
                                                    ?>
                                                </small>
                                                <?php if ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0): ?>
                                                    <span class="badge badge-unread">Unread</span>
                                                <?php else: ?>
                                                    <span class="badge badge-read">Read</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editProfileForm">
                <?= csrf_field() ?>
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold">Edit Provider Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Provider Name</label>
                            <input type="text" class="form-control bg-light" id="name" name="pvd_name" value="<?= $provider_info->pvd_name ?>" readonly>
                            <small class="text-muted">Name cannot be changed</small>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Contact Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="text" class="form-control" id="phone" name="pvd_phone" value="<?= $provider_info->pvd_phone ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="pvd_email" value="<?= $provider_info->pvd_email ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Location</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                <input type="text" class="form-control" id="address" name="pvd_location" value="<?= $provider_info->pvd_address ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="doe" class="form-label">Date of Establishment</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                <input type="text" class="form-control bg-light" id="doe" name="doe" value="<?= date('d/m/Y', strtotime($provider_info->pvd_doe)) ?>" readonly>
                            </div>
                            <small class="text-muted">Date cannot be changed</small>
                        </div>
                        <div class="col-md-6">
                            <label for="ssm_number" class="form-label">SSM Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                <input type="text" class="form-control bg-light" id="ssm_number" name="ssm_number" value="<?= $provider_info->pvd_ssm_number ?>" readonly>
                            </div>
                            <small class="text-muted">SSM Number cannot be changed</small>
                        </div>
                        <div class="col-12">
                            <label class="form-label">SSM Certificate</label>
                            <div>
                                <a href="<?= base_url($provider_info->pvd_ssm_cert) ?>" class="btn btn-outline-corporate" target="_blank">
                                    <i class="fas fa-file-pdf me-2"></i> View Current Certificate
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-corporate">
                        <i class="fas fa-save me-1"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript Dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Notification Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('.notification-link');
        const unreadBadge = document.querySelector('.badge.bg-danger');

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const notificationId = this.getAttribute('data-id');
                const notificationItem = this.closest('.notification-item');
                const badge = notificationItem.querySelector('.badge');

                // Send AJAX request to mark the notification as read
                fetch('<?= base_url("qvcAdmin/notifications/markAsRead") ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
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
                            // Update the badge
                            if (badge) {
                                badge.classList.remove('badge-unread');
                                badge.classList.add('badge-read');
                                badge.textContent = 'Read';
                            }

                            // Update the counter badge
                            if (unreadBadge) {
                                let currentCount = parseInt(unreadBadge.textContent, 10);
                                if (currentCount > 0) {
                                    unreadBadge.textContent = currentCount - 1;

                                    // If no more unread notifications, update the badge color
                                    if (currentCount - 1 === 0) {
                                        unreadBadge.classList.remove('bg-danger');
                                        unreadBadge.classList.add('bg-secondary');
                                    }
                                }
                            }

                            // Update CSRF token
                            if (data.csrf_token) {
                                document.querySelectorAll("input[name='csrf_test_name']").forEach(input => {
                                    input.value = data.csrf_token;
                                });
                            }

                            // Show a subtle toast notification instead of an intrusive alert
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            });

                            Toast.fire({
                                icon: 'success',
                                title: 'Notification marked as read'
                            });
                        } else {
                            // Show error toast
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to mark notification as read.',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while processing your request.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    });
            });
        });
    });

    // Profile Edit Modal
    function showEditModal() {
        const editProfileModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
        editProfileModal.show();
    }

    // Profile Form Submission
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