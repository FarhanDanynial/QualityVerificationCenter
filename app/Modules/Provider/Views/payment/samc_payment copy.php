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
    /* Global Styles */
    :root {
        --primary-color: #1e40af;
        --secondary-color: #f8fafc;
        --accent-color: #0284c7;
        --text-color: #334155;
        --border-radius: 8px;
        --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .card .card-header {
        padding: 1rem !important;
    }

    /* Payment method */
    .payment-option {
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        padding: 1rem;
        margin-bottom: 0.75rem;
        cursor: pointer;
        transition: var(--transition);
    }

    .payment-option:hover {
        border-color: var(--secondary-color);
        background-color: rgba(62, 109, 176, 0.02);
    }

    .payment-option.selected {
        border-color: var(--secondary-color);
        background-color: rgba(62, 109, 176, 0.04);
        box-shadow: 0 1px 6px rgba(13, 110, 253, 0.08);
    }

    .payment-option-icon {
        width: 30px;
        margin-right: 10px;
        opacity: 0.9;
    }

    /* Summary items */
    .summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        color: var(--text-muted);
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid var(--border-color);
    }

    .summary-total-value {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary-color);
    }

    /* Form elements */
    .form-control {
        padding: 0.5rem 0.75rem;
        border-color: var(--border-color);
    }

    .form-control:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 0.2rem rgba(62, 109, 176, 0.15);
    }

    .section-header {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--primary-color);
    }

    /* Action buttons in summary */
    .btn-proceed {
        display: block;
        width: 100%;
        padding: 0.65rem;
        font-weight: 600;
    }

    /* Action bar */
    .action-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #fff;
        padding: 0.75rem 1.25rem;
        border-radius: var(--border-radius);
        box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
        border: 2px solid #6a11cb;
        /* Purple border */
    }

    .action-bar-title {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0;
    }

    /* Invoice selection info */
    .selection-info {
        background-color: rgba(62, 109, 176, 0.03);
        border-radius: var(--border-radius);
        padding: 0.75rem;
        margin-bottom: 1rem;
        border: 1px solid rgba(62, 109, 176, 0.1);
    }

    /* Overwrite border */
    .card-header:first-child {
        border-radius: inherit !important;
    }
</style>

<div class="container my-4">
    <!-- Action Bar -->
    <div class="action-bar">
        <div>
            <h4 class="action-bar-title">Invoice Management</h4>
            <p class="mb-0 text-muted small">Manage your pending invoices and payment processes</p>
        </div>
        <div>
            <button class="btn btn-outline-primary me-2">
                <i class="fas fa-history me-1"></i> Payment History
            </button>
            <button class="btn btn-primary">
                <i class="fas fa-file-export me-1"></i> Export
            </button>
        </div>
    </div>

    <div class="row">
        <!-- Main content area -->
        <div class="col-lg-8">
            <!-- Invoice listing -->
            <div class="card mb-3">
                <div class="card-header">
                    <h5>SAMC</h5>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table" id="datatable-search">
                            <thead>
                                <tr>
                                    <th width="5%">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                        </div>
                                    </th>
                                    <th width="35%">Title</th>
                                    <!-- <th width="15%">Invoice ID</th> -->
                                    <th width="15%">Status</th>
                                    <!-- <th width="15%">Date</th> -->
                                    <th width="15%">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($samc_data)):
                                    foreach ($samc_data as $samc): ?>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input invoiceCheckbox" type="checkbox" data-amount="1000">
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm"><?= $samc->samc_course_name ?></h6>
                                            </td>
                                            <!-- <td><span class="text-muted">#INV-1003</span></td> -->
                                            <!-- <td>
                                                <?php if ($samc->samc_payment_status == null): ?>
                                                    <span class="badge bg-gradient-warning px-3 py-2">
                                                        Unpaid
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge bg-gradient-info px-3 py-2">
                                                        <?= $samc->samc_status ?>
                                                    </span>
                                                <?php endif; ?>
                                            </td> -->
                                            <td>
                                                <div class="date-container">
                                                    <?php if (!empty($samc->samc_created_at)): ?>
                                                        <span class="badge bg-light text-dark">
                                                            <i class="fas fa-paper-plane text-primary me-1"></i>
                                                            <?= date('d M Y', strtotime($samc->samc_created_at)) ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                RM 1,000.00
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="fas fa-folder-open text-muted mb-2" style="font-size: 2rem;"></i>
                                                <h6 class="text-muted">No records found</h6>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Payment Method</h5>
                </div>
                <div class="card-body">
                    <div class="payment-option selected" data-method="FPX">
                        <div class="d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="paymentMethod" id="fpx" value="FPX" checked>
                            <img src="<?= base_url('assets/img/logos/fpx.png') ?>" alt="FPX" class="payment-option-icon">
                            <div class="flex-grow-1">
                                <div class="fw-medium">Online Banking (FPX)</div>
                                <small class="text-muted">Pay directly from your bank account</small>
                            </div>
                            <div class="ms-auto">
                                <span class="badge bg-light text-dark">Recommended</span>
                            </div>
                        </div>
                    </div>

                    <div class="payment-option" data-method="Card">
                        <div class="d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="paymentMethod" id="card" value="Card">
                            <img src="<?= base_url('assets/img/logos/master_card.png') ?>" alt="Card" class="payment-option-icon">
                            <div class="flex-grow-1">
                                <div class="fw-medium">Credit/Debit Card</div>
                                <small class="text-muted">Visa, Mastercard, American Express</small>
                            </div>
                        </div>
                    </div>

                    <div class="payment-option" data-method="Ewallet">
                        <div class="d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="paymentMethod" id="ewallet" value="Ewallet">
                            <img src="<?= base_url('assets/img/logos/e_wallet.png') ?>" alt="E-Wallet" class="payment-option-icon">
                            <div class="flex-grow-1">
                                <div class="fw-medium">E-Wallet</div>
                                <small class="text-muted">Touch 'n Go, GrabPay, Boost</small>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info mt-3 mb-0 d-flex align-items-start p-2" role="alert">
                        <i class="fas fa-info-circle mt-1 me-2"></i>
                        <div class="small">
                            All transactions are encrypted and processed through our secure payment gateway.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar / Summary -->
        <div class="col-lg-4">
            <div class="card sticky-top" style="top: 1rem; z-index: 100;">
                <div class="card-header">
                    <h5>Payment Summary</h5>
                </div>
                <div class="card-body">
                    <div class="selection-info" id="selectionInfo">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-info-circle text-primary me-2"></i>
                            <div class="small">Please select at least one invoice to proceed</div>
                        </div>
                    </div>

                    <div class="summary-item">
                        <div>Selected Invoices:</div>
                        <div id="selectedCount" class="fw-medium">0</div>
                    </div>
                    <div class="summary-item">
                        <div>Subtotal:</div>
                        <div id="subtotalAmount" class="fw-medium">RM 0.00</div>
                    </div>
                    <div class="summary-item">
                        <div>Processing Fee:</div>
                        <div class="fw-medium">RM 0.00</div>
                    </div>

                    <div class="summary-total">
                        <div class="fw-bold">Total Amount:</div>
                        <div class="summary-total-value" id="totalAmount">RM 0.00</div>
                    </div>

                    <!-- Payment Method Section - Now inside summary card -->
                    <div class="mt-4">
                        <div class="payment-methods-header d-flex align-items-center mb-2">
                            <div class="fw-bold">Payment Method</div>
                            <div class="ms-auto">
                                <span class="badge bg-light text-dark small">
                                    <i class="fas fa-shield-alt me-1"></i> Secure Payment
                                </span>
                            </div>
                        </div>

                        <!-- Simplified payment method options -->
                        <div class="payment-options-container">
                            <div class="payment-option selected" data-method="FPX">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-2" type="radio" name="paymentMethod" id="fpx" value="FPX" checked>
                                    <img src="<?= base_url('assets/img/logos/fpx.png') ?>" alt="FPX" class="payment-option-icon">
                                    <div class="flex-grow-1">
                                        <div class="fw-medium">Online Banking (FPX)</div>
                                    </div>
                                </div>
                            </div>

                            <div class="payment-option" data-method="Card">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-2" type="radio" name="paymentMethod" id="card" value="Card">
                                    <img src="<?= base_url('assets/img/logos/master_card.png') ?>" alt="Card" class="payment-option-icon">
                                    <div class="flex-grow-1">
                                        <div class="fw-medium">Credit/Debit Card</div>
                                    </div>
                                </div>
                            </div>

                            <div class="payment-option" data-method="Ewallet">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-2" type="radio" name="paymentMethod" id="ewallet" value="Ewallet">
                                    <img src="<?= base_url('assets/img/logos/e_wallet.png') ?>" alt="E-Wallet" class="payment-option-icon">
                                    <div class="flex-grow-1">
                                        <div class="fw-medium">E-Wallet</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary btn-proceed" id="proceedPayment" disabled>
                            <i class="fas fa-lock me-2"></i>Proceed to Payment
                        </button>
                        <button class="btn btn-outline-secondary btn-proceed mt-2">
                            <i class="fas fa-arrow-left me-2"></i>Back
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        <small class="text-muted">
                            <i class="fas fa-shield-alt me-1"></i> Secure Payment Powered by SecurePay
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Select all checkbox functionality
    document.getElementById("selectAll").addEventListener("change", function() {
        let checkboxes = document.querySelectorAll(".invoiceCheckbox");
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        updateSummary();
    });

    // Individual checkbox handling
    document.querySelectorAll(".invoiceCheckbox").forEach(checkbox => {
        checkbox.addEventListener("change", updateSummary);
    });

    // Payment method selection
    document.querySelectorAll(".payment-option").forEach(option => {
        option.addEventListener("click", function() {
            // Update the radio button
            this.querySelector('input[type="radio"]').checked = true;

            // Update styling
            document.querySelectorAll(".payment-option").forEach(el => {
                el.classList.remove("selected");
            });
            this.classList.add("selected");
        });
    });

    // Calculate and update summary information
    function updateSummary() {
        let selectedCheckboxes = document.querySelectorAll(".invoiceCheckbox:checked");
        let count = selectedCheckboxes.length;
        let total = 0;

        selectedCheckboxes.forEach(checkbox => {
            total += parseFloat(checkbox.getAttribute("data-amount"));
        });

        document.getElementById("selectedCount").textContent = count;
        document.getElementById("subtotalAmount").textContent = "RM " + total.toFixed(2);
        document.getElementById("totalAmount").textContent = "RM " + total.toFixed(2);
        document.getElementById("proceedPayment").disabled = total === 0;

        // Update selection info visibility
        document.getElementById("selectionInfo").style.display = count > 0 ? "none" : "block";
    }

    // Payment confirmation
    document.getElementById("proceedPayment").addEventListener("click", function() {
        Swal.fire({
            title: "Confirm Payment",
            text: "You are about to process payment for the selected invoices",
            icon: "info",
            showCancelButton: true,
            confirmButtonText: "Proceed",
            confirmButtonColor: "#3e6db0",
            cancelButtonText: "Cancel",
            cancelButtonColor: "#6c757d"
        }).then((result) => {
            if (result.isConfirmed) {
                // Show processing state
                Swal.fire({
                    title: "Processing Payment",
                    text: "Redirecting to payment gateway...",
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Simulate redirect delay
                setTimeout(() => {
                    window.location.href = "payment/checkout";
                }, 1500);
            }
        });
    });

    // Initialize on page load
    updateSummary();
</script>

<!-- Datatable initilize -->

<script>
    document.addEventListener("DOMContentLoaded", function() {

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
                    targets: [3]
                }, // Disable sorting on the Actions column
                {
                    className: "text-center",
                    targets: [1, 2, 3]
                } // Center align these columns
            ],
            order: [
                [0, 'asc']
            ] // Default sort by the first column (No.)
        });

    });
</script>