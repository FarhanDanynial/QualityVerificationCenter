<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
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
        <!-- Assessor Data -->
        <div class="col-12 col-md-12 col-xl-4 mt-md-0 mt-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Provider Information</h6>
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
        <!-- Assessor Field -->
        <div class="col-12 col-md-12 col-xl-8 mt-xl-0 mt-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">My Certificate's</h6>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-search">
                            <thead class="thead-light">
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
                                    <td>1</td>
                                    <td>Quality Management Workshop</td>
                                    <td>2025-01-10</td>
                                    <td>2025-01-12</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-md px-3 py-1" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-md px-3 py-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Annual Provider Evaluation</td>
                                    <td>2025-02-01</td>
                                    <td>2025-02-28</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-md px-3 py-1" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-md px-3 py-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Supplier Quality Audit</td>
                                    <td>2025-03-05</td>
                                    <td>2025-03-07</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-md px-3 py-1" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-md px-3 py-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Customer Satisfaction Survey</td>
                                    <td>2025-04-01</td>
                                    <td>2025-04-30</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-md px-3 py-1" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-md px-3 py-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Training Program for Staff</td>
                                    <td>2025-05-15</td>
                                    <td>2025-05-17</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-md px-3 py-1" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-md px-3 py-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
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


<!-- Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editProfileForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="pvd_name" value="<?= $provider_info->pvd_name ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="phone" name="pvd_phone" value="<?= $provider_info->pvd_phone ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="pvd_email" value="<?= $provider_info->pvd_email ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Location</label>
                        <input type="text" class="form-control" id="address" name="pvd_address" value="<?= $provider_info->pvd_address ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="pvd_type" value="<?= $provider_info->pvd_type ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="doe" class="form-label">Date of Establishment</label>
                        <input type="date" class="form-control" id="doe" name="pvd_doe" value="<?= date('Y-m-d', strtotime($provider_info->pvd_doe)) ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

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

<!-- Edit Profile Script -->
<script>
    function showEditModal() {
        const editProfileModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
        editProfileModal.show();
    }

    document.getElementById('editProfileForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('<?= base_url("provider/update") ?>', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Profile updated successfully.',
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