<!-- Modern CSS Libraries -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

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
        --success-color: #28a745;
        --success-light: #d4edda;
    }

    body {
        font-family: 'Inter', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        background-color: #f8f9fa;
        color: var(--text-primary);
        line-height: 1.5;
        font-size: 0.9rem;
    }

    .receipt-container {
        max-width: 1000px;
        margin: 1.5rem auto;
    }

    .receipt-card {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        background-color: white;
        position: relative;
    }

    .receipt-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        background-color: white;
        border-bottom: 2px solid var(--primary-color);
        padding: 1.5rem;
    }

    .company-logo {
        max-height: 70px;
        width: auto;
    }

    .receipt-title {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .receipt-subtitle {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .paid-stamp {
        position: absolute;
        top: 20px;
        right: 20px;
        background-color: var(--success-color);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        font-weight: 700;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        transform: rotate(-5deg);
        box-shadow: 0 2px 4px rgba(40, 167, 69, 0.3);
    }

    .receipt-info-section {
        background-color: var(--success-light);
        border-radius: var(--border-radius);
        padding: 1rem;
        margin-bottom: 1.5rem;
        border-left: 4px solid var(--success-color);
    }

    .receipt-details {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .receipt-details-card {}

    .receipt-details-title {
        color: var(--text-secondary);
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .receipt-details-value {
        color: var(--text-primary);
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
    }

    .receipt-body {
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
        color: var(--primary-color);
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

    .payment-method-section {
        background-color: var(--accent-color);
        border-radius: var(--border-radius);
        padding: 1rem;
        margin-bottom: 1.5rem;
        border: 1px solid var(--border-color);
    }

    .payment-method-title {
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        color: var(--primary-color);
    }

    .payment-method-details {
        font-size: 0.85rem;
        line-height: 1.4;
    }

    .receipt-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: white;
        border-top: 2px solid var(--primary-color);
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
        text-decoration: none;
    }

    .btn-download {
        background-color: white;
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
    }

    .btn-print {
        background-color: var(--primary-color);
        color: white;
        border: none;
    }

    .btn-download:hover {
        background-color: var(--accent-color);
        color: var(--primary-color);
    }

    .btn-print:hover {
        background-color: #132f4c;
        color: white;
    }

    .button-icon {
        margin-right: 0.25rem;
    }

    .action-bar {
        max-width: 976px !important;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #fff;
        padding: 0.75rem 1.25rem;
        margin: 1.5rem auto;
        /* margin-bottom: 1rem; */
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

    .verification-code {
        background-color: var(--primary-color);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: var(--border-radius);
        font-family: 'Courier New', monospace;
        font-weight: 600;
        letter-spacing: 1px;
        font-size: 0.9rem;
    }

    .amount-highlight {
        background-color: var(--success-light);
        padding: 0.5rem 1rem;
        border-radius: var(--border-radius);
        font-size: 1.1rem;
        font-weight: 700;
        color: #155724;
        border: 1px solid #c3e6cb;
        text-align: center;
    }

    @media print {
        body {
            background-color: white;
        }

        .btn-download,
        .btn-print,
        .action-bar {
            display: none;
        }

        .receipt-card {
            box-shadow: none;
        }

        .paid-stamp {
            position: absolute;
            background-color: #28a745 !important;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
        }
    }

    @media (max-width: 768px) {
        .receipt-details {
            grid-template-columns: 1fr;
        }

        .info-section {
            flex-direction: column;
        }

        .address-card {
            width: 100%;
            margin-bottom: 1rem;
        }

        .receipt-footer {
            flex-direction: column;
            gap: 1rem;
        }
    }

    /* Digital Payment Stamp Styles */
    .digital-stamp {
        position: relative;
        width: 150px;
        height: 150px;
        border: 4px solid #28a745;
        border-radius: 50%;
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        text-align: center;
        box-shadow:
            0 4px 15px rgba(40, 167, 69, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.2);
        animation: stampAppear 0.8s ease-out;
        transform: rotate(-5deg);
        margin-left: auto;
        margin-right: 20px;
        flex-shrink: 0;
    }

    .digital-stamp::before {
        content: '';
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        border: 2px dashed #28a745;
        border-radius: 50%;
        opacity: 0.6;
    }

    .digital-stamp::after {
        content: '';
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
    }

    .stamp-icon {
        font-size: 2rem;
        margin-bottom: 5px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .stamp-text {
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        line-height: 1.1;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        z-index: 1;
    }

    .stamp-date {
        font-size: 0.65rem;
        margin-top: 2px;
        opacity: 0.9;
        font-weight: 500;
    }

    @keyframes stampAppear {
        0% {
            transform: rotate(-5deg) scale(0) rotateY(180deg);
            opacity: 0;
        }

        50% {
            transform: rotate(-5deg) scale(1.1) rotateY(90deg);
            opacity: 0.8;
        }

        100% {
            transform: rotate(-5deg) scale(1) rotateY(0deg);
            opacity: 1;
        }
    }

    /* Alternative stamp styles */
    .digital-stamp.blue {
        border-color: #007bff;
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        box-shadow:
            0 4px 15px rgba(0, 123, 255, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.2);
    }

    .digital-stamp.blue::before {
        border-color: #007bff;
    }

    .digital-stamp.red {
        border-color: #dc3545;
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        box-shadow:
            0 4px 15px rgba(220, 53, 69, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.2);
    }

    .digital-stamp.red::before {
        border-color: #dc3545;
    }

    .digital-stamp.purple {
        border-color: #6f42c1;
        background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);
        box-shadow:
            0 4px 15px rgba(111, 66, 193, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.2);
    }

    .digital-stamp.purple::before {
        border-color: #6f42c1;
    }

    /* Receipt details section modification to accommodate stamp */
    .receipt-details-with-stamp {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
    }

    .receipt-details-content {
        flex: 1;
    }

    /* Demo container for showcase */
    .demo-container {
        padding: 40px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
    }

    .demo-section {
        background: white;
        padding: 30px;
        margin-bottom: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .demo-title {
        color: #1a3b5d;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .stamp-variants {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
        justify-content: center;
        margin: 20px 0;
    }

    .integration-example {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #28a745;
        margin: 20px 0;
    }

    code {
        background: #e9ecef;
        padding: 2px 6px;
        border-radius: 4px;
        font-family: 'Courier New', monospace;
    }

    .receipt-details-content {
        background-color: var(--accent-color);
        border-radius: var(--border-radius);
        padding: 1rem;
        border: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        flex-wrap: wrap;
        /* Optional: makes it responsive */
    }

    .receipt-details-card {
        flex: 1;
    }

    .digital-stamp {
        display: flex;
        flex-direction: column;

    }
</style>

<!-- Action Bar -->
<div class="action-bar">
    <div>
        <h4 class="action-bar-title">Official Receipt</h4>
        <p class="mb-0 text-muted small">Receipt #R-2024-000123</p>
    </div>
    <!-- <div>
        <a href="#" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a>
        <button type="button" class="btn btn-outline-success">
            <i class="fas fa-envelope me-1"></i> Email Receipt
        </button>
    </div> -->
</div>

<div class="container receipt-container">
    <div class="card receipt-card">
        <!-- Paid Stamp -->
        <!-- <div class="paid-stamp">
            <i class="fas fa-check-circle me-1"></i> PAID
        </div> -->

        <div class="receipt-header">
            <div class="receipt-logo d-flex">
                <img src="<?= base_url('assets/img/logos/UPSI.png') ?>" alt="University Logo" class="company-logo mb-2">
                <div class="px-4">
                    <p class="mb-1 fw-bold">Universiti Pendidikan Sultan Idris</p>
                    <p class="mb-0 small">35900 Tanjong Malim, Perak Darul Ridzuan</p>
                    <p class="mb-0 small text-secondary">Tel: +605-450 6000, Email: bpq@upsi.edu.my</p>
                </div>
            </div>
            <div class="receipt-info">
                <h1 class="receipt-title">Resit Rasmi</h1>
                <p class="receipt-subtitle">Official Payment Receipt</p>
                <!-- <div class="verification-code">
                    <i class="fas fa-shield-alt me-1"></i> VER: R240123ABC
                </div> -->
            </div>
        </div>

        <div class="receipt-body">
            <!-- Receipt Information Section -->
            <div class="receipt-info-section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="receipt-details-title">Payment Confirmation</div>
                        <div class="receipt-details-value">
                            <i class="fas fa-check-circle text-success me-1"></i>
                            Payment has been successfully received and processed
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="amount-highlight">
                            Total Received: RM 1,250.00
                        </div>
                    </div>
                </div>
            </div>
            <!-- Payer and Payee Information -->
            <div class="info-section">
                <div class="address-card">
                    <p class="address-title">Received From:</p>
                    <p class="address-content">
                        <strong><?= $pvd_details->pvd_name ?></strong><br>
                        <?= $pvd_details->pvd_address ?><br>
                        <span class="text-secondary">Email: </span><?= $pvd_details->pvd_email ?><br>
                        <span class="text-secondary">Phone: </span><?= $pvd_details->pvd_phone ?>
                    </p>
                </div>
                <div class="address-card">
                    <p class="address-title">Received By:</p>
                    <p class="address-content">
                        <strong>Bendahari UPSI</strong><br>
                        Bahagian Bendahari<br>
                        Universiti Pendidikan Sultan Idris<br>
                        35900 Tanjong Malim, Perak<br>
                        <span class="text-secondary">Email: </span>bendahari@upsi.edu.my<br>
                        <span class="text-secondary">Phone: </span>+605-450 6123
                    </p>
                </div>
            </div>

            <!-- Payment Items Table -->
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
                        <?php foreach ($samc_items as $item) : ?>
                            <tr>
                                <td class="text-center"><?= $counter++; ?></td>
                                <td>
                                    <div class="item-desc"><?= $item->samc_course_name ?></div>
                                    <div class="item-subdesc">SAMC ID: <?= $item->spi_samc_id ?></div>
                                </td>
                                <td class="text-center">1</td>
                                <td class="text-end"><?= number_format(1000, 2) ?></td>
                                <td class="text-end fw-bold"><?= number_format(1000, 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <!-- <tr>
                            <td colspan="2"></td>
                            <td class="text-end">Caj Perkhidmatan</td>
                            <td class="text-end"><?= 0.06 * $invoice_details->sp_amount ?></td>
                        </tr> -->
                        <tr>
                            <td colspan="3" style="border-top: 1px solid #212529; border-bottom: 1px solid #212529;"></td>
                            <td class="text-end fw-bold" style="border-top: 1px solid #212529; border-bottom: 1px solid #212529;">Jumlah</td>
                            <td class="text-end fw-bold" style="border-top: 1px solid #212529; border-bottom: 1px solid #212529;">RM <?= $invoice_details->sp_amount ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="receipt-details-with-stamp">
                <div class="receipt-details-content">
                    <div class="receipt-details-card">
                        <div class="receipt-details-title">Receipt Information</div>
                        <div class="receipt-details-value">No. Resit: R-2024-000123</div>
                        <div class="receipt-details-value">No. Rujukan: R-2024-000123</div>
                        <div class="receipt-details-value">Tarikh: 10/06/2025</div>
                        <div class="receipt-details-value">Masa: 14:30:25</div>
                        <div class="receipt-details-value">Status: <span class="text-success fw-bold">Verified</span></div>
                    </div>
                    <!-- Digital Payment Stamp -->
                    <div class="digital-stamp">
                        <i class="fas fa-check-circle stamp-icon"></i>
                        <div class="stamp-text">
                            PAID
                            <div class="stamp-date"><?= date('d/m/Y') ?></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="receipt-footer">
            <div>
                <p class="thank-you mb-1">Terima kasih atas pembayaran anda. | Thank you for your payment.</p>
                <p class="contact-info mb-0">Resit ini adalah sah dan dihasilkan secara automatik. | This is a valid computer-generated receipt.</p>
                <p class="contact-info mb-0">Untuk sebarang pertanyaan: <strong>bpq@upsi.edu.my</strong> | <strong>+605-450 6123</strong></p>
            </div>
            <div class="button-group">
                <a href="#" class="btn-download">
                    <i class="fas fa-download button-icon"></i> Download PDF
                </a>
                <a href="#" class="btn-print" onclick="window.print()">
                    <i class="fas fa-print button-icon"></i> Print Receipt
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>