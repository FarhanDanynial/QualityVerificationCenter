<!-- Modern CSS Libraries -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<!-- Required JS Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- Select2 CSS (add this) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Import table styling -->
<link rel="stylesheet" href="<?= base_url('assets/css/custom_table.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/custom_card.css'); ?>">

<style>
    .select2-container {
        display: block !important;
    }

    .horizontal-line {
        background-image: linear-gradient(to right,
                rgba(0, 0, 0, 1),
                rgba(0, 0, 0, 0.4),
                rgba(0, 0, 0, 0));
    }
</style>

<div class="container-fluid">
    <div class="page-header min-height-150 border-radius-xl mt-4" style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
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
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row mt-3">
        <!-- Provider Data -->
        <div class="col-12 col-md-12 col-xl-4 mt-md-0 mt-4">
            <div class="card h-100">
                <div class="card-header p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h2 class="mb-0 fs-4 fw-bold">Provider Information</h2>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="javascript:;" onclick="showEditModal()" class="btn btn-sm bg-gradient-info action-icon" data-bs-toggle="tooltip" title="Edit Profile">
                                <i class="fas fa-user-edit text-white text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i> Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <hr class="horizontal gray-light my-2">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name:</strong> <br><?= $provider_info->pvd_name ?></li>
                        <hr class="horizontal-line p-0 m-0" />
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> <br><?= $provider_info->pvd_phone ?></li>
                        <hr class="horizontal-line p-0 m-0" />
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> <br><?= $provider_info->pvd_email ?></li>
                        <hr class="horizontal-line p-0 m-0" />
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> <br><?= $provider_info->pvd_address ?></li>
                        <hr class="horizontal-line p-0 m-0" />
                        <li class="list-group-item border-0 ps-0 pb-0"><strong class="text-dark text-sm">Type:</strong> <br><?= $provider_info->pvd_type ?></li>
                        <hr class="horizontal-line p-0 m-0" />
                        <li class="list-group-item border-0 ps-0 pb-0"><strong class="text-dark text-sm">Date of establishment:</strong> <br><?= date('d/m/Y', strtotime($provider_info->pvd_doe)) ?> </li>
                        <hr class="horizontal-line p-0 m-0" />
                        <li class="list-group-item border-0 ps-0 pb-0"><strong class="text-dark text-sm">SSM Number:</strong> <br><?= $provider_info->pvd_ssm_number ?></li>
                        <hr class="horizontal-line p-0 m-0" />
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
        <!-- Provider Field -->
        <div class="col-12 col-md-12 col-xl-8 mt-xl-0 mt-4">
            <div class="card h-100">
                <div class="card-header p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h2 class="mb-0 fs-4 fw-bold">New Feature's Coming Soon</h2>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="javascript:;" class="btn btn-sm bg-gradient-secondary action-icon" data-bs-toggle="tooltip" title="New Feature's Coming Soon">
                                <i class="fas fa-file-upload text-white text-sm" data-bs-toggle="tooltip" data-bs-placement="top"></i> New Feature's Coming Soon
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table" id="datatable-search">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <i class="fas fa-tools fa-2x text-muted mb-2"></i>
                                        <div class="text-muted fw-bold fs-5">This feature is coming soon!</div>
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




<!-- Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog">
        <div class="modal-content">
            <form id="editProfileForm">
                <?= csrf_field() ?>
                <div class="bg-gradient-primary modal-header">
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

<script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script>

<script>
    // Initialize Simple DataTable
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true,
    });

    const assessmentDataTable = new simpleDatatables.DataTable("#assessment_table", {
        searchable: true,
        fixedHeight: true,
    });
</script>