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

<!-- FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Import table styling -->
<link rel="stylesheet" href="<?= base_url('assets/css/custom_table.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/custom_card.css'); ?>">

<style>
    .nav-link {
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .nav-link.active {
        background-color: #5e72e4;
        /* color: white !important; */
        box-shadow: 0 3px 5px rgba(94, 114, 228, 0.3);
    }

    .action-btn {
        border-radius: 6px;
        transition: all 0.2s;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    .pending-card {
        border-left: 4px solid #5e72e4;
        transition: all 0.3s;
    }

    .pending-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
    }

    .badge {
        padding: 6px 10px;
        font-weight: 500;
        font-size: 0.75rem;
    }

    .status-badge {
        border-radius: 6px;
        padding: 8px 10px;
        display: inline-block;
        margin-bottom: 5px;
        font-weight: 500;
    }

    .action-container {
        display: flex;
        gap: 5px;
    }

    .action-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 0.2s;
    }

    .action-icon:hover {
        transform: translateY(-2px);
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: #c8c8c8;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #a1a1a1;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center p-0 pt-3">
                <h2 class="mb-0 fs-4 fw-bold">My SAMC</h2>
            </div>
            <div class="card-body p-0 mt-4">
                <div class="row mb-0">
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Assignments</p>
                                            <h5 class="font-weight-bolder mb-0">

                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow text-center rounded-circle">
                                            <i class="fas fa-clipboard text-white opacity-10"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">In Progress</p>
                                            <h5 class="font-weight-bolder mb-0">

                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-info shadow text-center rounded-circle">
                                            <i class="fas fa-sync-alt text-white opacity-10"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Completed</p>
                                            <h5 class="font-weight-bolder mb-0">

                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-success shadow text-center rounded-circle">
                                            <i class="fas fa-check text-white opacity-10"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Pending</p>
                                            <h5 class="font-weight-bolder mb-0">

                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-warning shadow text-center rounded-circle">
                                            <i class="fas fa-hourglass-half text-white opacity-10"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter & Controls -->
            <div class="card mb-4">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-7">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="filter-btn btn bg-gradient-secondary" data-filter="Draft" style="font-size: 12px;">
                                    <i class="fas fa-list-alt me-1"></i> Draft
                                </button>
                                <button class="filter-btn btn bg-gradient-warning" data-filter="Pending Payment" style="font-size: 12px;">
                                    <i class="fas fa-spinner me-1"></i> Pending Payment
                                </button>
                                <button class="filter-btn btn bg-gradient-success" data-filter="Paid" style="font-size: 12px;">
                                    <i class="fas fa-award me-1"></i> Paid
                                </button>

                                <button class="filter-btn btn bg-gradient-primary" data-filter="Reviewed" style="font-size: 12px;">
                                    <i class="fas fa-check-circle me-1"></i> Reviewed
                                </button>
                                <button class="filter-btn btn bg-gradient-warning" data-filter="Conditional Pass" style="font-size: 12px;">
                                    <i class="fas fa-clipboard-check me-1"></i> Conditional
                                </button>
                                <button class="filter-btn btn bg-gradient-dark" data-filter="" style="font-size: 12px;">
                                    <i class="fas fa-th-list me-1"></i> All
                                </button>
                                <button id="export-btn" class="btn bg-gradient-success me-2" style="font-size: 12px;">
                                    Export
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 mt-3 mt-md-0">
                            <div class="d-flex align-items-center justify-content-md-end">
                                <a href="<?= base_url('provider/samc/new_samc') ?>" class="btn bg-gradient-success me-2" style="font-size: 12px;">
                                    <i class="fas fa-credit-card"></i> New SAMC
                                </a>
                                <a href="<?= base_url('provider/payment/checkout') ?>" class="btn bg-gradient-success me-2" style="font-size: 12px;">
                                    <i class="fas fa-credit-card"></i> Make Payment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SAMC Table -->
            <div class="card">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table" id="datatable-search">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:60px;">No.</th>
                                    <th>Course Name</th>
                                    <th style="width:170px;">Status</th>
                                    <th style="width:200px;">Important Dates</th>
                                    <th style="width:120px;" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1;
                                if (!empty($samc_info)):
                                    foreach ($samc_info as $samc): ?>
                                        <tr>
                                            <td class="text-center"><?= $counter++; ?></td>
                                            <td>
                                                <h6 class="mb-0 text-sm"><?= $samc->samc_course_name ?></h6>
                                            </td>
                                            <td>
                                                <?= get_samc_pvd_status_badge($samc->samc_status) ?>
                                            </td>
                                            <td>
                                                <div class="date-container">
                                                    <?php if (!empty($samc->samc_created_at)): ?>
                                                        <span class="badge bg-light text-dark">
                                                            <i class="fas fa-check-circle text-primary me-1"></i>
                                                            Created At: <?= date('d M Y', strtotime($samc->samc_created_at)) ?>
                                                        </span>
                                                    <?php endif; ?>
                                                    <?php if (!empty($samc->samc_payment_date)): ?>
                                                        <span class="badge bg-light text-dark">
                                                            <i class="fas fa-paper-plane text-primary me-1"></i>
                                                            Payment: <?= date('d M Y', strtotime($samc->samc_payment_date)) ?>
                                                        </span>
                                                    <?php endif; ?>

                                                    <?php if (!empty($samc->samc_assigned_date)): ?>
                                                        <span class="badge bg-light text-dark">
                                                            <i class="fas fa-user-check text-info me-1"></i>
                                                            Assigned: <?= date('d M Y', strtotime($samc->samc_assigned_date)) ?>
                                                        </span>
                                                    <?php endif; ?>

                                                    <?php if (!empty($samc->samc_reviewed_date)): ?>
                                                        <span class="badge bg-light text-dark">
                                                            <i class="fas fa-clipboard-check text-success me-1"></i>
                                                            Reviewed: <?= date('d M Y', strtotime($samc->samc_reviewed_date)) ?>
                                                        </span>
                                                    <?php endif; ?>

                                                    <?php if (!empty($samc->samc_expired_date)): ?>
                                                        <span class="badge bg-light text-dark">
                                                            <i class="fas fa-calendar-times text-danger me-1"></i>
                                                            Expires: <?= date('d M Y', strtotime($samc->samc_expired_date)) ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="action-container justify-content-center">
                                                    <a href="<?= base_url('provider/getSamcData/' . $samc->samc_id) ?>"
                                                        class="btn btn-sm bg-gradient-info action-icon"
                                                        data-bs-toggle="tooltip" title="Details">
                                                        <i class="fas fa-info-circle" style="font-size: 12px;"></i>
                                                    </a>
                                                    <?php if (in_array($samc->samc_status, ['DRAFT', 'Returned'])): ?>
                                                        <a href="<?= base_url('provider/samc/edit_samc_form/') . $samc->samc_id ?>"
                                                            class="btn btn-sm bg-gradient-success action-icon">
                                                            <i class="fas fa-edit" style="font-size: 16px;"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function() {
        // Accept button click
        jQuery('.accept-form').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            let form = jQuery(this);
            let formData = form.serialize(); // Serialize form data including CSRF token

            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to accept the assignment and start reviewing.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, accept it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    jQuery.ajax({
                        url: form.attr('action'), // Get form action URL
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'Accepted!',
                                    'The SAMC has been marked as accepted.',
                                    'success'
                                ).then(() => {
                                    location.reload(); // Reload the page
                                });
                            } else {
                                Swal.fire('Error!', 'There was a problem updating the SAMC.', 'error');
                            }
                        },
                        error: function() {
                            Swal.fire('Error!', 'Something went wrong. Please try again.', 'error');
                        }
                    });
                }
            });
        });

        // Reject button click
        jQuery('.reject-form').on('submit', function(e) {
            e.preventDefault();
            let form = jQuery(this);
            let formData = form.serialize(); // Serialize form data including CSRF token

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to reject this assignment?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, Reject it",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show input for rejection reason
                    Swal.fire({
                        title: "Reason for rejection",
                        input: "textarea",
                        inputPlaceholder: "Enter the reason for rejection here...",
                        showCancelButton: true,
                        confirmButtonText: "Submit",
                        cancelButtonText: "Cancel",
                    }).then((reasonResult) => {
                        if (reasonResult.isConfirmed) {
                            let rejectionReason = reasonResult.value;
                            form.find('input[name="reason"]').val(rejectionReason); // Set reason value

                            jQuery.ajax({
                                url: form.attr('action'), // Get form action URL
                                type: 'POST',
                                data: form.serialize(),
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire(
                                            "Rejected!",
                                            "The assignation has been rejected.",
                                            "success"
                                        ).then(() => {
                                            location.reload(); // Reload the page
                                        });
                                    } else {
                                        Swal.fire('Error!', 'There was a problem updating the SAMC.', 'error');
                                    }
                                },
                                error: function() {
                                    Swal.fire('Error!', 'Something went wrong. Please try again.', 'error');
                                }
                            });
                        }
                    });
                }
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Initialize DataTable with more options
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
                emptyTable: `<div class="d-flex flex-column align-items-center">
                    <i class="fas fa-folder-open text-muted mb-2" style="font-size: 2rem;"></i>
                    <h6 class="text-muted">No records found</h6>
                 </div>`,
                paginate: {
                    first: '<i class="fas fa-angle-double-left"></i>',
                    previous: '<i class="fas fa-angle-left"></i>',
                    next: '<i class="fas fa-angle-right"></i>',
                    last: '<i class="fas fa-angle-double-right"></i>'
                }
            },
            pageLength: 10,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            columnDefs: [{
                    orderable: false,
                    targets: [4]
                }, // Disable sorting on the Actions column
                {
                    className: "text-center",
                    targets: [0, 3, 4]
                } // Center align these columns
            ],
            order: [
                [0, 'asc']
            ] // Default sort by the first column (No.)
        });

        // Filter button functionality
        document.querySelectorAll(".filter-btn").forEach(button => {
            button.addEventListener("click", () => {
                // Remove active class from all buttons
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('active');
                });

                // Add active class to clicked button
                button.classList.add('active');

                const filterValue = button.getAttribute("data-filter");

                if (filterValue) {
                    dataTable.search(filterValue).draw();
                } else {
                    dataTable.search('').draw(); // Clear search when "All" is clicked
                }
            });
        });

        // Export to Excel functionality
        document.getElementById('export-btn').addEventListener('click', function() {
            const table = document.getElementById('datatable-search');
            const filename = 'SAMC_Data_' + new Date().toISOString().slice(0, 10) + '.xlsx';

            // Create a workbook with all visible data (respecting filters)
            const visibleRows = [];

            // Get headers
            const headers = [];
            table.querySelectorAll('thead th').forEach(th => {
                headers.push(th.textContent.trim());
            });
            visibleRows.push(headers);

            // Get visible data rows
            table.querySelectorAll('tbody tr:not([style*="display: none"])').forEach(tr => {
                const rowData = [];
                tr.querySelectorAll('td').forEach(td => {
                    // Get text content only, strip HTML
                    rowData.push(td.textContent.trim());
                });
                visibleRows.push(rowData);
            });

            // Create worksheet from the filtered rows
            const worksheet = XLSX.utils.aoa_to_sheet(visibleRows);

            // Create workbook and add worksheet
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "SAMC Records");

            // Export workbook to Excel file
            XLSX.writeFile(workbook, filename);
        });
    });
</script>