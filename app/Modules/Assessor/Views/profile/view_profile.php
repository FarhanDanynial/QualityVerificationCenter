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
    <div class="page-header min-height-150 border-radius-xl mt-4" style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;"><span class="mask bg-gradient-primary opacity-6"></span></div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative"><img src="../../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm"></div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1"><?= $assessor_info->asr_name ?></h5>
                    <p class="mb-0 font-weight-bold text-sm"><?= get_university_name($assessor_info->asr_qu_id) ?></p>
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
                <div class="card-header p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h2 class="mb-0 fs-4 fw-bold">Assessor Information</h2>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="javascript:;" onclick="showEditModal()" class="btn btn-sm bg-gradient-info action-icon" data-bs-toggle="tooltip" title="Edit Profile">
                                <i class="fas fa-user-edit text-white text-sm" data-bs-toggle="tooltip" data-bs-placement="top"></i> Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <hr class="horizontal gray-light my-2">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name:</strong><br><?= $assessor_info->asr_name ?></li>
                        <hr class="horizontal-line p-0 m-0" />
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong><br><?= $assessor_info->asr_phone ?></li>
                        <hr class="horizontal-line p-0 m-0" />
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong><br><?= $assessor_info->asr_email ?></li>
                        <hr class="horizontal-line p-0 m-0" />
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Service Address:</strong><br><?= $assessor_info->asr_service_address ?></li>
                        <hr class="horizontal-line p-0 m-0" />
                        <li class="list-group-item border-0 ps-0 pb-0">
                            <strong class="text-dark text-sm">Expertise:</strong><br>
                            <?php foreach ($assessor_expertise as $expert): ?>
                                <span class="badge my-2 badge-primary">
                                    <?= $expert->ef_desc; ?>
                                </span> &nbsp;
                            <?php endforeach; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Assessor Field -->
        <div class="col-12 col-md-12 col-xl-8 mt-xl-0 mt-4">
            <div class="card h-100">
                <div class="card-header p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h2 class="mb-0 fs-4 fw-bold">My Certificate's</h2>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="javascript:;" onclick="showEditModal()" class="btn btn-sm bg-gradient-info action-icon" data-bs-toggle="tooltip" title="Upload Certificate">
                                <i class="fas fa-file-upload text-white text-sm" data-bs-toggle="tooltip" data-bs-placement="top"></i> Upload Certificate
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
                                    <td>1</td>
                                    <td>Quality Management Workshop</td>
                                    <td>2025-01-10</td>
                                    <td>2025-01-12</td>
                                    <td>
                                        <div class="btn-group" role="group"><button type="button" class="btn btn-primary btn-md px-3 py-1" title="View"><i class="fas fa-eye"></i></button><button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete"><i class="fas fa-trash"></i></button></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Annual Provider Evaluation</td>
                                    <td>2025-02-01</td>
                                    <td>2025-02-28</td>
                                    <td>
                                        <div class="btn-group" role="group"><button type="button" class="btn btn-primary btn-md px-3 py-1" title="View"><i class="fas fa-eye"></i></button><button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete"><i class="fas fa-trash"></i></button></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Supplier Quality Audit</td>
                                    <td>2025-03-05</td>
                                    <td>2025-03-07</td>
                                    <td>
                                        <div class="btn-group" role="group"><button type="button" class="btn btn-primary btn-md px-3 py-1" title="View"><i class="fas fa-eye"></i></button><button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete"><i class="fas fa-trash"></i></button></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Customer Satisfaction Survey</td>
                                    <td>2025-04-01</td>
                                    <td>2025-04-30</td>
                                    <td>
                                        <div class="btn-group" role="group"><button type="button" class="btn btn-primary btn-md px-3 py-1" title="View"><i class="fas fa-eye"></i></button><button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete"><i class="fas fa-trash"></i></button></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Training Program for Staff</td>
                                    <td>2025-05-15</td>
                                    <td>2025-05-17</td>
                                    <td>
                                        <div class="btn-group" role="group"><button type="button" class="btn btn-primary btn-md px-3 py-1" title="View"><i class="fas fa-eye"></i></button><button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete"><i class="fas fa-trash"></i></button></div>
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
    <div class="modal-lg modal-dialog">
        <div class="modal-content">
            <form id="editProfileForm"><?= csrf_field() ?>
                <div class="bg-gradient-primary  modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"><label for="name" class="form-label">Name</label><input type="text" class="form-control" id="name" name="asr_name" value="<?= $assessor_info->asr_name ?>" required></div>
                    <div class="mb-3"><label for="phone" class="form-label">Mobile</label><input type="text" class="form-control" id="phone" name="asr_phone" value="<?= $assessor_info->asr_phone ?>" required></div>
                    <div class="mb-3"><label for="email" class="form-label">Email</label><input type="email" class="form-control" id="email" name="asr_email" value="<?= $assessor_info->asr_email ?>" required></div>
                    <div class="mb-3"><label for="address" class="form-label">Location</label><input type="text" class="form-control" id="address" name="asr_service_address" value="<?= $assessor_info->asr_service_address ?>" required></div>
                    <!-- My Expertise -->
                    <div class="mb-3">
                        <label for="expertise" class="form-label">My Expertise</label><br>
                        <?php foreach ($assessor_expertise as $expert): ?>
                            <span class="badge my-2 badge-primary">
                                <?= $expert->ef_desc; ?>
                                <i class="fas fa-times text-danger ms-2 delete-expertise" data-id="<?= $expert->aef_id; ?>" style="cursor: pointer;"></i>
                            </span> &nbsp;
                        <?php endforeach; ?>
                    </div>
                    <!-- Expertise Select2 Fields -->
                    <div id="expertiseFields">
                        <div class="mb-3 expertise-field"><label for="expertise" class="form-label">Expertise 1</label><br><select id="expertise" class="form-select select2" name="expertise[]" required>
                                <option value="">Select Expertise</option>
                                <!-- Dynamic expertise options should be populated here --><?php foreach ($expertise_list as $expertise): ?><option value="<?= $expertise->ef_id ?>"><?= $expertise->ef_desc ?></option><?php endforeach; ?>
                            </select></div>
                    </div>
                    <!-- Button to add another expertise --><button type="button" class="btn btn-primary btn-sm" id="addExpertiseBtn"><i class="fas fa-add" style="font-size: 1rem !important;"></i>&nbsp;
                        Expertise</button>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary mb-0" data-bs-dismiss="modal"><i class="fas fa-times" style="font-size: 1rem !important;"></i>&nbsp;
                        Close</button><button type="submit" class="btn btn-primary mb-0"><i class="fas fa-save" style="font-size: 1rem !important;"></i>&nbsp;

                        Save Changes</button></div>
            </form>
        </div>
    </div>
</div>
<script>
    const dataTable = new DataTable("#datatable-search", {

        responsive: true,
        dom: '<"top"fl>rt<"bottom"ip><"clear">',
        language: {

            search: "_INPUT_",
            searchPlaceholder: "Search records...",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            infoEmpty: "Showing 0 to 0 of 0 entries",
            infoFiltered: "(filtered from _MAX_ total entries)",
            emptyTable: `<div class="d-flex flex-column align-items-center" > <i class="fas fa-folder-open text-muted mb-2" style="font-size: 2rem;" ></i> <h6 class="text-muted" >No records found</h6> </div>`,
            paginate: {
                first: '<i class="fas fa-angle-double-left"></i>',
                previous: '<i class="fas fa-angle-left"></i>',
                next: '<i class="fas fa-angle-right"></i>',
                last: '<i class="fas fa-angle-double-right"></i>'
            }
        }

        ,
        pageLength: 10,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        columnDefs: [{
                orderable: false,
                targets: [4]
            }

            , // Disable sorting on the Actions column

            {
                className: "text-center",
                targets: [0, 3, 4]
            }

            // Center align these columns
        ],
        order: [
            [0, 'asc']
        ] // Default sort by the first column (No.)
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

        fetch("<?= base_url('assessor/update_profile') ?>", {
            method: 'POST',
            body: formData

        }).then(response => response.json()).then(data => {
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

        }).catch(() => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An unexpected error occurred.',
            });
        });
    });
</script>
<script>
    jQuery(document).ready(function($) {

        // Initialize Select2 on the expertise select input inside a modal
        $('#expertise').select2({
            placeholder: "Select Expertise",
            dropdownParent: $('#editProfileModal') // Append dropdown to the modal
        });


        let expertiseCount = 2; // Counter for unique IDs

        $('#addExpertiseBtn').on('click', function() {
            let newId = 'expertise_' + expertiseCount; // Create a unique ID

            let newField = `
            <div class="mb-3 expertise-field" >
                <label for="${newId}" class="form-label" >Expertise ${expertiseCount}</label>
                <select id="${newId}" class="form-select select2" name="expertise[]" required> <option value="" >Select Expertise</option>
                    <?php foreach ($expertise_list as $expertise): ?>
                        <option value="<?= $expertise->ef_id ?>" ><?= $expertise->ef_desc ?></option>
                    <?php endforeach; ?>
                </select>
            </div> `;

            $('#expertiseFields').append(newField); // Append new field

            // Apply Select2 to the new field with the correct dropdownParent
            $('#' + newId).select2({
                placeholder: "Select Expertise",
                dropdownParent: $('#editProfileModal') // Ensure it's inside the modal
            });

            expertiseCount++; // Increment counter for next ID
        });

        // Initialize Select2 for the first field (if exists)
        $('#expertise').select2({
            placeholder: "Select Expertise",
            dropdownParent: $('#editProfileModal')
        });
        // Handle the form submission
        // $('#editProfileForm').submit(function(e) {
        //     e.preventDefault();
        //     // Handle your AJAX form submission here
        //     var formData = $(this).serialize();
        //     $.ajax({
        //         url: 'assessor/update_profile', // Replace with your form submission URL
        //         type: 'POST',
        //         data: formData,
        //         success: function(response) {
        //             // Handle success response
        //             console.log(response);
        //         },
        //         error: function(err) {
        //             // Handle error response
        //             console.log(err);
        //         }
        //     });
        // });
    });
</script>
<!-- Ajax to delete My Expertise -->
<script>
    jQuery(document).ready(function($) {
        $('.delete-expertise').on('click', function() {
            var expertiseId = $(this).data("id");
            var badge = $(this).closest("span"); // Select the parent badge

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"

            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({

                        url: "<?= base_url('assessor/delete_expertise'); ?>",
                        type: "POST",
                        data: {
                            id: expertiseId,
                            csrf_test_name: document.querySelector("input[name='csrf_test_name']").value
                        }

                        ,
                        dataType: "json", // Ensure JSON response

                        success: function(response) {
                                if (response.success) {
                                    if (response.csrf_token) {

                                        // 🔄 Update all CSRF token inputs in the form
                                        document.querySelectorAll("input[name='csrf_test_name']").forEach(input => {
                                            input.value = response.csrf_token;
                                        });
                                    }

                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Expertise has been removed.",
                                        icon: "success",
                                        timer: 2000,
                                        showConfirmButton: false
                                    });

                                    badge.fadeOut(300, function() {
                                        $(this).remove();
                                    });
                                } else {
                                    Swal.fire({
                                        title: "Failed!",
                                        text: "Failed to delete expertise.",
                                        icon: "error"
                                    });
                                }
                            }

                            ,
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "Something went wrong. Please try again.",
                                icon: "error"
                            });
                            console.log(xhr.responseText); // Debugging
                        }
                    });
                }
            });
        });
    });
</script>