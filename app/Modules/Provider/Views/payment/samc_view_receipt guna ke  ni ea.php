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

    .receipt-container {
        max-width: 1000px;
        margin: 1.5rem auto;
    }

    .receipt-card {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        background-color: white;
    }

    .receipt-header {
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

    .receipt-title {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .receipt-details {
        background-color: var(--accent-color);
        border-radius: var(--border-radius);
        padding: 1rem;
        border-left: 3px solid var(--secondary-color);
    }

    .payment-status {
        display: inline-block;
        padding: 0.35rem 0.75rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-top: 0.5rem;
    }

    .status-paid {
        background-color: #eefaf3;
        color: #27ae60;
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
    }

    .address-content {
        font-size: 0.85rem;
        margin-bottom: 0;
        line-height: 1.4;
    }

    .table-receipt {
        margin-bottom: 1.5rem;
        font-size: 0.85rem;
    }

    .table-receipt thead th {
        background-color: var(--primary-color);
        color: white;
        font-weight: 500;
        border: none;
        padding: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-receipt tbody td {
        padding: 0.75rem;
        vertical-align: middle;
        border-bottom: 1px solid var(--border-color);
    }

    .table-receipt tfoot {
        border-top: 2px solid var(--primary-color);
    }

    .table-receipt tfoot th,
    .table-receipt tfoot td {
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

    .payment-info {
        width: 100%;
        margin-bottom: 1.5rem;
    }

    .summary-section {
        display: flex;
        justify-content: space-between;
    }

    .payment-details-card {
        width: 48%;
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        padding: 1rem;
    }

    .payment-details-title {
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .payment-method {
        font-size: 0.85rem;
    }

    .payment-info-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        font-size: 0.85rem;
    }

    .payment-info-label {
        color: var(--text-secondary);
        font-weight: 500;
    }

    .payment-info-value {
        font-weight: 600;
    }

    .summary-card {
        width: 48%;
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

    .summary-label {
        color: var(--text-secondary);
    }

    .summary-total {
        font-weight: 700;
        font-size: 1rem;
        color: var(--primary-color);
        padding-top: 0.5rem;
        margin-top: 0.5rem;
        border-top: 1px solid var(--border-color);
    }

    .receipt-footer {
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

    .receipt-stamp {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .receipt-stamp-img {
        width: 150px;
        height: auto;
        opacity: 0.8;
    }

    .receipt-stamp-text {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1.2rem;
        margin-top: 0.5rem;
        text-transform: uppercase;
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
    }

    .btn-print {
        background-color: var(--primary-color);
        color: white;
        border: none;
    }

    .btn-download:hover {
        background-color: var(--accent-color);
    }

    .btn-print:hover {
        background-color: #132f4c;
    }

    .button-icon {
        margin-right: 0.25rem;
    }

    .verification-section {
        text-align: center;
        margin-top: 1rem;
        padding: 1rem;
        background-color: var(--accent-color);
        border-radius: var(--border-radius);
    }

    .verification-title {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .verification-code {
        font-family: monospace;
        font-size: 1rem;
        font-weight: 600;
        letter-spacing: 1px;
        background-color: white;
        padding: 0.5rem;
        border-radius: var(--border-radius);
        display: inline-block;
        border: 1px dashed var(--border-color);
    }

    .verification-note {
        font-size: 0.75rem;
        color: var(--text-secondary);
        margin-top: 0.5rem;
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
    }
</style>

<!-- Action Bar -->
<div class="action-bar">
    <div>
        <h4 class="action-bar-title">Receipt</h4>
        <p class="mb-0 text-muted small">Receipt #RCP<?= $receipt_details->receipt_number ?></p>
    </div>
    <div>
        <a href="<?= base_url('provider/payment') ?>" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a>
    </div>
</div>

<div class="container receipt-container">
    <div class="card receipt-card">
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
                <h1 class="receipt-title">RESIT</h1>
                <div class="payment-status status-paid">Pembayaran Diterima</div>
            </div>
        </div>

        <div class="receipt-body">
            <div class="info-section">
                <div class="address-card">
                    <p class="address-title">Maklumat Penerima:</p>
                    <p class="address-content">
                        <strong><?= $pvd_details->pvd_name ?></strong><br>
                        <?= $pvd_details->pvd_address ?><br>
                        <span class="text-secondary">Email: </span><?= $pvd_details->pvd_email ?><br>
                        <span class="text-secondary">Phone: </span><?= $pvd_details->pvd_phone ?>
                    </p>
                </div>
                <div class="address-card">
                    <p class="address-title">Maklumat Resit:</p>
                    <p class="address-content">
                        <span class="text-secondary">No. Resit: </span>RCP<?= $receipt_details->receipt_number ?><br>
                        <span class="text-secondary">No. Invois: </span><?= $invoice_details->sp_invoice_number ?><br>
                        <span class="text-secondary">Tarikh Bayaran: </span><?= date('d/m/Y', strtotime($receipt_details->payment_date)) ?><br>
                        <span class="text-secondary">Ruj. Bayaran: </span><?= $receipt_details->payment_reference ?>
                    </p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-receipt">
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
                        <tr>
                            <td colspan="3" style="border-top: 1px solid #212529; border-bottom: 1px solid #212529;"></td>
                            <td class="text-end fw-bold" style="border-top: 1px solid #212529; border-bottom: 1px solid #212529;">Jumlah Dibayar</td>
                            <td class="text-end fw-bold" style="border-top: 1px solid #212529; border-bottom: 1px solid #212529;">RM <?= $invoice_details->sp_amount ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="summary-section">
                <div class="payment-details-card">
                    <p class="payment-details-title">Maklumat Pembayaran:</p>
                    <div class="payment-method mb-2">
                        <span class="payment-info-label">Kaedah Pembayaran:</span>
                        <span class="payment-info-value"><?= $receipt_details->payment_method ?></span>
                    </div>
                    <div class="payment-info-row">
                        <span class="payment-info-label">Tarikh Bayaran:</span>
                        <span class="payment-info-value"><?= date('d/m/Y', strtotime($receipt_details->payment_date)) ?></span>
                    </div>
                    <div class="payment-info-row">
                        <span class="payment-info-label">Rujukan Pembayaran:</span>
                        <span class="payment-info-value"><?= $receipt_details->payment_reference ?></span>
                    </div>
                    <?php if ($receipt_details->payment_method == 'Bank Transfer') : ?>
                        <div class="payment-info-row">
                            <span class="payment-info-label">Bank:</span>
                            <span class="payment-info-value"><?= $receipt_details->bank_name ?></span>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="summary-card">
                    <div class="summary-row">
                        <span class="summary-label">Jumlah Invois:</span>
                        <span>RM <?= number_format($invoice_details->sp_amount, 2) ?></span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Jumlah Dibayar:</span>
                        <span>RM <?= number_format($receipt_details->amount_paid, 2) ?></span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Baki:</span>
                        <span>RM 0.00</span>
                    </div>
                    <div class="summary-row summary-total">
                        <span>Status:</span>
                        <span>DIBAYAR SEPENUHNYA</span>
                    </div>
                </div>
            </div>

            <div class="receipt-stamp">
                <div class="receipt-stamp-text">Pembayaran Telah Disahkan</div>
            </div>

            <div class="verification-section">
                <p class="verification-title">Kod Pengesahan</p>
                <div class="verification-code"><?= $receipt_details->verification_code ?></div>
                <p class="verification-note">Resit ini adalah sah dan boleh disahkan melalui portal UPSI dengan menggunakan kod pengesahan di atas.</p>
            </div>
        </div>

        <div class="receipt-footer">
            <div>
                <p class="thank-you mb-1">Terima kasih atas pembayaran anda!</p>
                <p class="contact-info mb-0">Sebarang pertanyaan? Hubungi kami di <strong>finance@upsi.edu.my</strong> | <strong>+605-450 6123</strong></p>
            </div>
            <div class="button-group">
                <a href="<?= base_url('provider/payment/download_receipt/') ?>" class="btn-download">
                    <i class="fas fa-download button-icon"></i> Download
                </a>
                <a href="<?= base_url('provider/payment/print_receipt/') ?>" class="btn-print" target="_blank">
                    <i class="fas fa-print button-icon"></i> Print
                </a>
            </div>
        </div>
    </div>
</div>