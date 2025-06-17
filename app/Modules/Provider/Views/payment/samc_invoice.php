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

<!-- Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<style>
    :root {
        --primary-color: #1a3b5d;
        --secondary-color: #2c73d2;
        --accent-color: #f7f9fc;
        --border-color: #e9ecef;
        --text-primary: #212529;
        --text-secondary: #495057;
        --text-muted: #6c757d;
        --border-radius: 4px;
        --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        --transition: all 0.2s ease;
    }

    body {
        font-family: 'Inter', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        background-color: #f8f9fa;
        color: var(--text-primary);
        line-height: 1.5;
        font-size: 0.9rem;
    }

    .invoice-container {
        max-width: 1000px;
        margin: 1.5rem auto;
    }

    .invoice-card {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        background-color: white;
    }

    .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        background-color: white;
        border-bottom: 1px solid var(--border-color);
        padding: 1.5rem;
    }

    .company-logo {
        max-height: 70px;
        width: auto;
    }

    .invoice-title {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .invoice-status {
        font-size: 1rem;
    }

    .invoice-details {
        background-color: var(--accent-color);
        border-radius: var(--border-radius);
        padding: 1rem;
        border-left: 3px solid var(--secondary-color);
    }

    .invoice-details-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
    }

    .invoice-details-title {
        color: var(--text-secondary);
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 500;
    }

    .invoice-details-value {
        color: var(--text-primary);
        font-weight: 600;
        font-size: 0.85rem;
    }

    .status-badge {
        display: inline-block;
        padding: 0.25rem 0.5rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-unpaid {
        background-color: #fff3f3;
        color: #e74c3c;
    }

    .status-paid {
        background-color: #eefaf3;
        color: #27ae60;
    }

    .invoice-body {
        padding: 1.5rem;
    }

    .info-section {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    .address-card {
        background-color: var(--accent-color);
        border-radius: var(--border-radius);
        padding: 1rem;
        width: 48%;
    }

    .address-title {
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .address-content {
        font-size: 0.85rem;
        margin-bottom: 0;
        line-height: 1.4;
    }

    .table-invoice {
        margin-bottom: 1.5rem;
        font-size: 0.85rem;
    }

    .table-invoice thead th {
        background-color: var(--primary-color);
        color: white;
        font-weight: 500;
        border: none;
        padding: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-invoice tbody td {
        padding: 0.75rem;
        vertical-align: middle;
        border-bottom: 1px solid var(--border-color);
    }

    .table-invoice tfoot {
        border-top: 2px solid var(--primary-color);
    }

    .table-invoice tfoot th,
    .table-invoice tfoot td {
        padding: 0.75rem;
        font-weight: 600;
    }

    .item-desc {
        font-weight: 500;
        font-size: 0.85rem;
    }

    .item-subdesc {
        font-size: 0.75rem;
        color: var(--text-secondary);
    }

    .summary-section {
        display: flex;
        justify-content: space-between;
    }

    .payment-info {
        width: 100%;
    }

    .payment-card {
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        padding: 1rem;
        font-size: 0.85rem;
    }

    .payment-title {
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .payment-details p {
        margin-bottom: 0.25rem;
    }

    .summary-card {
        width: 40%;
        background-color: var(--accent-color);
        border-radius: var(--border-radius);
        padding: 1rem;
        border-left: 3px solid var(--secondary-color);
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 0.25rem 0;
        font-size: 0.85rem;
    }

    .summary-total {
        font-weight: 700;
        font-size: 1rem;
        color: var(--primary-color);
        padding-top: 0.5rem;
        margin-top: 0.5rem;
        border-top: 1px solid var(--border-color);
    }

    .invoice-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: white;
        border-top: 1px solid var(--border-color);
        padding: 1.5rem;
    }

    .thank-you {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.25rem;
        font-size: 0.9rem;
    }

    .contact-info {
        color: var(--text-secondary);
        font-size: 0.8rem;
    }

    .button-group {
        display: flex;
        gap: 0.5rem;
    }

    .btn-download,
    .btn-print {
        display: flex;
        align-items: center;
        padding: 0.5rem 0.75rem;
        border-radius: var(--border-radius);
        font-size: 0.8rem;
        font-weight: 500;
        transition: var(--transition);
    }

    .btn-download {
        background-color: white;
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
        text-decoration: none;
    }

    .btn-print {
        background-color: var(--primary-color);
        color: white;
        border: none;
        text-decoration: none;
    }

    .btn-download:hover {
        background-color: var(--accent-color);
    }

    .btn-print:hover {
        background-color: #132f4c;
        color: white;
    }

    .button-icon {
        margin-right: 0.25rem;
    }

    @media print {
        body {
            background-color: white;
        }

        .btn-download,
        .btn-print {
            display: none;
        }

        .invoice-card {
            box-shadow: none;
        }
    }

    /* Pay button styling */
    .btn-pay {
        display: flex;
        align-items: center;
        padding: 0.5rem 0.75rem;
        border-radius: var(--border-radius);
        font-size: 0.8rem;
        font-weight: 500;
        transition: var(--transition);
        background-color: #27ae60;
        color: white;
        border: none;
        cursor: pointer;
    }

    .btn-pay:hover {
        background-color: #219653;
    }

    /* Modal styling */
    .modal-content {
        border-radius: var(--border-radius);
        border: none;
        box-shadow: var(--box-shadow);
    }

    .modal-header {
        background-color: var(--primary-color);
        color: white;
        border-bottom: none;
        border-top-left-radius: calc(var(--border-radius) - 1px);
        border-top-right-radius: calc(var(--border-radius) - 1px);
    }

    .modal-title {
        font-weight: 600;
    }

    .btn-close {
        color: white;
        filter: brightness(0) invert(1);
    }

    .form-label {
        font-weight: 500;
        font-size: 0.85rem;
        color: var(--text-secondary);
    }

    .form-control {
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        padding: 0.5rem 0.75rem;
        font-size: 0.85rem;
    }

    .form-control:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 0.2rem rgba(44, 115, 210, 0.25);
    }

    .form-text {
        font-size: 0.75rem;
        color: var(--text-muted);
    }

    /* Action bar */
    .action-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #fff;
        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
    }

    .action-bar-title {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0;
    }

    .btn {
        margin-bottom: 0.5rem !important;
        margin-top: 0.5rem !important;
    }
</style>

<!-- Action Bar -->
<div class="action-bar">
    <div>
        <h4 class="action-bar-title">Invoice</h4>
        <p class="mb-0 text-muted small">Invoice #<?= $invoice_details->sp_invoice_number ?></p>
    </div>
    <div>
        <a href="<?= base_url('provider/payment') ?>" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a>
        <!-- Check Invoice Status -->
        <?php if ($invoice_details->sp_status == 'unpaid') : ?>
            <button type="button" class="btn btn-outline-danger" onclick="confirmDelete(
            '<?= $invoice_details->sp_id ?>', 
            '<?= $invoice_details->sp_invoice_number ?>', 
            '<?= number_format($invoice_details->sp_amount, 2) ?>', 
            '<?= base_url('provider/invoice/delete_invoice') ?>'
        )">
                <i class="fas fa-trash-alt me-1"></i> Delete
            </button>
        <?php endif; ?>
    </div>
</div>
<div class="container invoice-container">
    <div class="card invoice-card">
        <div class="invoice-header">
            <div class="invoice-logo d-flex">
                <img src="<?= base_url('assets/img/logos/UPSI.png') ?>" alt="University Logo" class="company-logo mb-2">
                <div class="px-4">
                    <p class="mb-1 fw-bold">Universiti Pendidikan Sultan Idris</p>
                    <p class="mb-0 small">35900 Tanjong Malim, Perak Darul Ridzuan</p>
                    <p class="mb-0 small text-secondary">Tel: +605-450 6000, Email: bpq@upsi.edu.my</p>
                </div>
            </div>
            <div class="invoice-info">
                <h1 class="invoice-title">INVOIS</h1>
                <?php if ($invoice_details->sp_status == 'unpaid') : ?>
                    <span class="badge bg-danger invoice-status">Unpaid</span>
                <?php elseif ($invoice_details->sp_status == 'PAID') : ?>
                    <span class="badge bg-success invoice-status">Paid</span>
                <?php elseif ($invoice_details->sp_status == 'PAYMENT_PROOF_REJECTED') : ?>
                    <span class="badge bg-danger invoice-status">Rejected</span>
                <?php else : ?>
                    <h4 class="badge bg-warning text-dark invoice-status">Pending</h4>
                <?php endif; ?>
            </div>
        </div>


        <div class="invoice-body">
            <div class="info-section">
                <div class="address-card">
                    <p class="address-title">Kepada:</p>
                    <p class="address-content">
                        <strong><?= $pvd_details->pvd_name ?></strong><br>
                        <?= $pvd_details->pvd_address ?><br>
                        <span class="text-secondary">Email: </span><?= $pvd_details->pvd_email ?><br>
                        <span class="text-secondary">Phone: </span><?= $pvd_details->pvd_phone ?>
                    </p>
                </div>
                <div class="address-card">
                    <p class="address-title">Maklumat Bayaran:</p>
                    <p class="address-content">
                        <span class="text-secondary">No. Invois:</span><?= $invoice_details->sp_invoice_number ?><br>
                        <span class="text-secondary">Ruj. Kami:</span> QVC SAMC<br>
                        <?php
                        // Get the string from the database
                        $tarikh_invois = $invoice_details->sp_created_at;

                        // Convert the string to a DateTime object
                        try {
                            $tarikh_invois = new DateTime($tarikh_invois); // Convert the string to DateTime
                            $tarikh_akhir = clone $tarikh_invois;  // Clone it if it's a DateTime object
                            $tarikh_akhir->modify('+30 days');  // Add 30 days to the cloned date
                        } catch (Exception $e) {
                            // Handle exception if date format is invalid
                            echo 'Error: Invalid date format';
                            exit; // or handle the error as needed
                        }

                        ?>

                        <!-- Output the formatted dates -->
                        <span class="text-secondary">Tarikh:</span> <?= $tarikh_invois->format('d/m/Y') ?><br>
                        <span class="text-secondary">Tarikh Akhir Bayaran: </span> <?= $tarikh_akhir->format('d/m/Y') ?>


                    </p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-invoice">
                    <thead>
                        <tr>
                            <th style="width: 5%;">BIL.</th>
                            <th style="width: 40%;">KETERANGAN</th>
                            <th class="text-center" style="width: 15%;">KUANTITI</th>
                            <th class="text-end" style="width: 20%;">HARGA SEUNIT (RM)</th>
                            <th class="text-end" style="width: 20%;">AMAUN (RM)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($item_details as $item) : ?>
                            <tr>
                                <td class="text-center"><?= $counter++; ?></td>
                                <td>
                                    <div class="item-desc"><?= $item['samc_name'] ?></div>
                                    <div class="item-subdesc">SAMC ID: <?= $item['samc_id'] ?></div>
                                </td>
                                <td class="text-center">1</td>
                                <td class="text-end"><?= number_format($item['amount'], 2) ?></td>
                                <td class="text-end fw-bold"><?= number_format($item['amount'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <!-- <tr>
                            <td colspan="2"></td>
                            <td class="text-end">Caj Perkhidmatan</td>
                            <td class="text-end"><?= 0.06 * $total_amount ?></td>
                        </tr> -->
                        <tr>
                            <td colspan="3" style="border-top: 1px solid #212529; border-bottom: 1px solid #212529;"></td>
                            <td class="text-end fw-bold" style="border-top: 1px solid #212529; border-bottom: 1px solid #212529;">Jumlah</td>
                            <td class="text-end fw-bold" style="border-top: 1px solid #212529; border-bottom: 1px solid #212529;">RM <?= $total_amount ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="summary-section">
                <div class="payment-info">
                    <div class="payment-card">
                        <p class="payment-title">Sila bayar atas nama :</p>
                        <div class="payment-details">
                            <!-- <p><strong>Sila bayar atas nama :</strong></p> -->
                            <p>BENDAHARI UNIVERSITI PENDIDIKAN SULTAN IDRIS</p>
                            <p>NO. AKAUN: 08068010003264</p>
                            <p>BANK: BANK ISLAM MALAYSIA BERHAD (BIMB)</p>
                            <br>
                            <p class="mb-0">Sekiranya pembayaran dibuat melalui perbankan internet, sila nyatakan tujuan pembayaran (Contoh : Pembayaran QVC SAMC) pada bahagian keterangan bayaran sebagai rujukan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="invoice-footer">
            <div>
                <p class="thank-you mb-1">Cetakan adalah berkomputer dan tidak memerlukan tandatangan.</p>
                <p class="contact-info mb-0">Hubungi kami di <strong>bpq@upsi.edu.my</strong> | <strong>+605-450 6123</strong></p>
            </div>
            <!-- Add this to the button-group div in the invoice-footer section -->
            <div class="button-group">
                <a href="<?= base_url('provider/invoice/download_invoice/' . $invoice_details->sp_id) ?>" class="btn-download">
                    <i class="fas fa-download button-icon"></i> Download
                </a>
                <a href="<?= base_url('provider/invoice/print_invoice/' . $invoice_details->sp_id) ?>" class="btn-print" target="_blank">
                    <i class="fas fa-print button-icon"></i> Print
                </a>
                <?php if ($invoice_details->sp_status == 'unpaid') : ?>
                    <button type="button" class="btn-pay" data-bs-toggle="modal" data-bs-target="#paymentModal">
                        <i class="fas fa-credit-card button-icon"></i> Upload Payment Slip
                    </button>
                <?php else : ?>
                    <!-- view payment data in modal-->
                    <button type="button" class="btn-pay" data-bs-toggle="modal" data-bs-target="#paymentProofModal">
                        <i class="fas fa-eye button-icon"></i> View Payment Slip
                    </button>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Payment Modal with improved Soft UI styling -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow-sm border-0">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title font-weight-bold" id="paymentModalLabel">Upload Payment Proof</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="paymentProofUploadForm" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="invoice_id" value="<?= $invoice_details->sp_id ?>">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment_date" class="form-control-label text-sm">Payment Date</label>
                                <input type="date" class="form-control form-control-sm" id="payment_date" name="payment_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment_reference" class="form-control-label text-sm">Reference Number</label>
                                <input type="text" class="form-control form-control-sm" id="payment_reference" name="payment_reference"
                                    placeholder="Enter bank reference number" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="payment_proof" class="form-control-label text-sm">Upload Payment Prove</label>
                                <div class="input-group">
                                    <input type="file" class="form-control form-control-sm" id="payment_proof" name="payment_proof"
                                        accept="image/png, image/jpeg, image/jpg, application/pdf" required>
                                </div>
                                <small class="form-text text-xs text-muted">Accepted formats: PNG, JPEG, JPG, PDF (Max size: 2MB)</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="payment_notes" class="form-control-label text-sm">Additional Notes <span class="text-muted">(Optional)</span></label>
                                <textarea class="form-control form-control-sm" id="payment_notes" name="payment_notes" rows="3"
                                    placeholder="Any additional information about the payment"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn bg-gradient-primary btn-md">Submit Payment Proof</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Payment Proof View Modal with improved Soft UI styling -->
<div class="modal fade" id="paymentProofModal" tabindex="-1" aria-labelledby="paymentProofModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content shadow-sm border-0">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title font-weight-bold" id="paymentProofModalLabel">Payment Proof Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <!-- Payment Information Section -->
                <!-- <div class="payment-info-section mb-4">
                    <h6 class="text-uppercase text-primary font-weight-bold mb-3">Payment Details</h6>
                    <div class="payment-details p-3 border border-light shadow-sm rounded-lg bg-gray-100"> -->
                <!-- Invoice Info with icon -->
                <!-- <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                            <div class="icon-shape icon-sm rounded-circle bg-gradient-primary text-white me-3 text-center">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <div>
                                <h6 class="text-dark mb-0 text-sm">Invoice Summary</h6>
                                <div class="d-flex mt-2">
                                    <div class="me-4">
                                        <p class="text-xs mb-0 text-secondary">Amount</p>
                                        <h6 class="font-weight-bold mb-0">RM <?= $invoice_details->sp_amount ?></h6>
                                    </div>
                                    <div>
                                        <p class="text-xs mb-0 text-secondary">Due Date</p>
                                        <h6 class="font-weight-bold mb-0"><?= (new DateTime($invoice_details->sp_created_at))->modify('+30 days')->format('d/m/Y') ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                <!-- Bank Info with icon -->
                <!-- <div class="d-flex align-items-center">
                            <div class="icon-shape icon-sm rounded-circle bg-gradient-success text-white me-3 text-center">
                                <i class="fas fa-university"></i>
                            </div>
                            <div style="width: 100% !important;">
                                <h6 class="text-dark mb-2 text-sm">Bank Details</h6>
                                <div class="bg-white px-3 py-2 rounded border w-100">
                                    <table class="table table-sm table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="text-secondary text-xs ps-0" width="80px">Bank Name</td>
                                                <td class="text-dark text-xs pe-0">BANK ISLAM MALAYSIA BERHAD (BIMB)</td>
                                            </tr>
                                            <tr>
                                                <td class="text-secondary text-xs ps-0">Account No.</td>
                                                <td class="text-dark font-weight-bold text-xs pe-0">08068010003264</td>
                                            </tr>
                                            <tr>
                                                <td class="text-secondary text-xs ps-0">Recipient</td>
                                                <td class="text-dark text-xs pe-0">BENDAHARI UNIVERSITI PENDIDIKAN SULTAN IDRIS</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Payment Proof Display Section -->
                <div class="payment-proof-section mb-4">
                    <!-- <h6 class="text-uppercase text-primary font-weight-bold mb-3">Payment Proof</h6> -->
                    <div class="payment-proof-details p-3 border border-light shadow-sm rounded-lg bg-gray-100">
                        <!-- Payment Details with icons -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-shape icon-xs rounded-circle bg-gradient-info text-white me-3 text-center">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs mb-0 text-secondary">Payment Date</p>
                                        <h6 class="font-weight-bold mb-0 text-sm"><?= isset($invoice_details->sp_payment_date) ? date('d/m/Y', strtotime($invoice_details->sp_payment_date)) : 'N/A' ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-shape icon-xs rounded-circle bg-gradient-warning text-white me-3 text-center">
                                        <i class="fas fa-hashtag"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs mb-0 text-secondary">Reference Number</p>
                                        <h6 class="font-weight-bold mb-0 text-sm"><?= isset($invoice_details->sp_reff_num) ? $invoice_details->sp_reff_num : 'N/A' ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Document Preview -->
                        <?php
                        if (isset($invoice_details) && $invoice_details->sp_prove):
                            $file_extension = pathinfo($invoice_details->sp_prove, PATHINFO_EXTENSION);

                            if (in_array(strtolower($file_extension), ['jpg', 'jpeg', 'png'])):
                        ?>
                                <!-- Image preview -->
                                <img src="<?= base_url($invoice_details->sp_prove) ?>" alt="Payment Proof" class="img-fluid rounded shadow-sm" style="width: 100%; max-widht">
                            <?php elseif (strtolower($file_extension) === 'pdf'): ?>
                                <!-- PDF file icon -->
                                <iframe src="<?= site_url($invoice_details->sp_prove) . '#toolbar=0&navpanes=0&scrollbar=0&zoom=page-fit' ?>" width="100%" height="600px" style="border:1px solid #ccc;">
                                    This browser does not support PDFs. Please download the PDF to view it:
                                </iframe>


                            <?php else: ?>
                                <!-- Generic file icon -->
                                <div class="document-icon mb-3">
                                    <i class="fas fa-file-alt text-primary fa-5x"></i>
                                </div>
                                <h6 class="mb-2"><?= $invoice_details->sp_prove_filename ?></h6>
                                <a href="<?= base_url($invoice_details->sp_prove) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-download me-1"></i> Download File
                                </a>
                            <?php endif; ?>
                        <?php else: ?>
                            <!-- No document uploaded yet -->
                            <div class="document-icon mb-3">
                                <i class="fas fa-file-upload text-muted fa-5x"></i>
                            </div>
                            <h6 class="text-muted">No payment proof has been uploaded yet</h6>
                        <?php endif; ?>

                        <!-- Additional Notes section (if available) -->
                        <?php if (isset($invoice_details) && !empty($invoice_details->sp_notes)): ?>
                            <div class="mt-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="icon-shape icon-xs rounded-circle bg-gradient-dark text-white me-3 text-center">
                                        <i class="fas fa-sticky-note"></i>
                                    </div>
                                    <h6 class="text-dark mb-0 text-sm">Additional Notes</h6>
                                </div>
                                <div class="bg-white p-3 rounded border">
                                    <p class="text-sm mb-0"><?= $invoice_details->sp_notes ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Status section -->
                <!-- <div class="status-section">
                    <?php if (isset($invoice_details)): ?>
                        <?php if ($invoice_details->sp_status == 'pending'): ?>
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <i class="fas fa-clock me-2"></i>
                                <div>Payment proof is currently under review.</div>
                            </div>
                        <?php elseif ($invoice_details->sp_status == 'approved'): ?>
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                <div>Payment has been verified and approved on <?= date('d/m/Y', strtotime($invoice_details->sp_updated_at)) ?>.</div>
                            </div>
                        <?php elseif ($invoice_details->sp_status == 'rejected'): ?>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fas fa-times-circle me-2"></i>
                                <div>
                                    <span>Payment proof was rejected.</span>
                                    <?php if (!empty($invoice_details->sp_remarks)): ?>
                                        <p class="mb-0 mt-1"><strong>Reason:</strong> <?= $invoice_details->sp_remarks ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div> -->

                <div class="d-flex justify-content-end mt-4">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                    <?php if (!isset($invoice_details) || $invoice_details->sp_status == 'rejected'): ?>
                        <a href="<?= base_url('provider/invoice/payment/' . $invoice_details->sp_id) ?>" class="btn bg-gradient-primary">
                            <i class="fas fa-upload me-1"></i> Upload Payment Proof
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for handling file operations -->
<script>
    // File input change handler
    document.getElementById('paymentProofFile')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('filePreview');
        const fileName = document.getElementById('selectedFileName');

        if (file) {
            fileName.textContent = file.name;
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    });

    // Upload form submission
    document.getElementById('paymentProofUploadForm')?.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;

        // Disable submit button and show loading
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Uploading...';

        // Send AJAX request
        fetch('<?= base_url('provider/invoice/submit_invoice_payment_proof') ?>', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    showAlert('success', 'Payment proof uploaded successfully!');

                    // Reload the modal content or refresh the page
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    showAlert('error', data.message || 'Failed to upload payment proof');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('error', 'An error occurred while uploading the file');
            })
            .finally(() => {
                // Re-enable submit button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
    });

    // Upload Payment Proof Form Submission
    // Upload form submission
    document.getElementById('paymentProofUpdateForm')?.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;

        // Disable submit button and show loading
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Uploading...';

        // Send AJAX request
        fetch('<?= base_url('provider/invoice/submit_invoice_payment_proof_update') ?>', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    showAlert('success', 'Payment proof uploaded successfully!');

                    // Reload the modal content or refresh the page
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    showAlert('error', data.message || 'Failed to upload payment proof');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('error', 'An error occurred while uploading the file');
            })
            .finally(() => {
                // Re-enable submit button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
    });


    function deletePaymentProof(invoiceId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action will delete the payment proof and cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6'
        }).then((result) => {
            if (result.isConfirmed) {
                const csrfTokenName = "<?= csrf_token() ?>";
                const csrfHash = "<?= csrf_hash() ?>";

                const requestData = {
                    invoice_id: invoiceId
                };
                requestData[csrfTokenName] = csrfHash;

                fetch('<?= base_url('provider/invoice/delete_payment_proof') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify(requestData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Deleted!',
                                'Payment proof has been deleted successfully.',
                                'success'
                            );

                            document.getElementById('documentPreviewSection').innerHTML = `
                            <div class="text-center">
                                <div class="document-icon mb-3">
                                    <i class="fas fa-file-upload text-muted fa-5x"></i>
                                </div>
                                <h6 class="text-muted">No payment proof has been uploaded yet</h6>
                            </div>
                        `;
                        } else {
                            Swal.fire(
                                'Error!',
                                data.message || 'Failed to delete payment proof.',
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the file.',
                            'error'
                        );
                    });
            }
        });
    }

    // Cancel upload function
    function cancelUpload() {
        document.getElementById('paymentProofFile').value = '';
        document.getElementById('filePreview').style.display = 'none';
    }

    function showAlert(type, message) {
        const icon = type === 'success' ? 'success' : 'error';
        const title = type === 'success' ? 'Success' : 'Error';

        Swal.fire({
            icon: icon,
            title: title,
            text: message,
            timer: 2000,
            showConfirmButton: false
        });
    }
</script>

<!-- Delete Invoice -->
<script>
    // Enhanced Delete Confirmation with SweetAlert2
    function confirmDelete(invoiceId, invoiceNumber, invoiceAmount, deleteUrl) {
        Swal.fire({
            title: 'Delete Invoice?',
            html: `
                <div class="text-center mb-3">
                    <i class="fas fa-exclamation-triangle text-danger" style="font-size: 3rem;"></i>
                </div>
                <div class="invoice-details p-3 bg-light rounded mb-3">
                    <div class="row">
                        <div class="col-6">
                            <small class="text-muted">Invoice Number</small>
                            <div class="fw-bold">${invoiceNumber}</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Amount</small>
                            <div class="fw-bold">RM ${invoiceAmount}</div>
                        </div>
                    </div>
                </div>
                <p class="text-muted mb-0">This action cannot be undone. The invoice and all associated data will be permanently removed.</p>
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e74c3c',
            cancelButtonColor: '#6c757d',
            confirmButtonText: '<i class="fas fa-trash-alt me-2"></i>Yes, Delete!',
            cancelButtonText: '<i class="fas fa-times me-2"></i>Cancel',
            reverseButtons: true,
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return fetch(deleteUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: new URLSearchParams({
                            '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
                            'invoice_id': invoiceId // Now using the dynamic parameter
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .catch(error => {
                        Swal.showValidationMessage(`Request failed: ${error}`);
                    });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                if (result.value && result.value.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Invoice has been deleted successfully.',
                        confirmButtonColor: '#27ae60',
                        timer: 3000,
                        timerProgressBar: true
                    }).then(() => {
                        // Optionally reload the page or remove the row from table
                        window.location.href = '<?= base_url('provider/payment/checkout') ?>';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: result.value ? result.value.message : 'Failed to delete invoice.',
                        confirmButtonColor: '#e74c3c'
                    });
                }
            }
        });
    }
</script>