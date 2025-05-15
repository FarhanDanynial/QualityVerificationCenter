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
        max-height: 60px;
        width: auto;
    }

    .invoice-title {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
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
        width: 55%;
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
</style>

<div class="container invoice-container">
    <div class="card invoice-card">
        <div class="invoice-header">
            <div class="invoice-logo">
                <img src="<?= base_url('assets/img/logos/UPSI.png') ?>" alt="University Logo" class="company-logo mb-2">
                <div>
                    <p class="mb-1 fw-bold">Universiti Pendidikan Sultan Idris</p>
                    <p class="mb-0 small">35900 Tanjong Malim, Perak Darul Ridzuan</p>
                    <p class="mb-0 small text-secondary">Tel: +605-450 6000</p>
                </div>
            </div>
            <div class="invoice-info">
                <h1 class="invoice-title">INVOICE</h1>
                <table class="invoice-table">
                    <tr>
                        <td class="label"><strong>Invoice Number</strong></td>
                        <td class="value">: INV-0453119</td>
                    </tr>
                    <tr>
                        <td class="label"><strong>Date Issued</strong></td>
                        <td class="value">: 06/03/2023</td>
                    </tr>
                    <tr>
                        <td class="label"><strong>Due Date</strong></td>
                        <td class="value">: 11/03/2023</td>
                    </tr>
                    <tr>
                        <td class="label"><strong>Status</strong></td>
                        <td class="value">: <span class="status-badge status-unpaid">UNPAID</span></td>
                    </tr>
                </table>
            </div>
        </div>


        <div class="invoice-body">
            <div class="info-section">
                <div class="address-card">
                    <p class="address-title">Billed To:</p>
                    <p class="address-content">
                        <strong>John Doe</strong><br>
                        4006 Locust View Drive<br>
                        San Francisco, CA 94110<br>
                        United States<br>
                        <span class="text-secondary">Email:</span> john.doe@example.com<br>
                        <span class="text-secondary">Phone:</span> +1 (555) 123-4567
                    </p>
                </div>
                <div class="address-card">
                    <p class="address-title">Payment Details:</p>
                    <p class="address-content">
                        <span class="text-secondary">Reference:</span> INV-0453119<br>
                        <span class="text-secondary">Payment Method:</span> Bank Transfer<br>
                        <span class="text-secondary">Payment Terms:</span> Net 30 Days
                    </p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-invoice">
                    <thead>
                        <tr>
                            <th style="width: 45%;">ITEM DESCRIPTION</th>
                            <th class="text-center" style="width: 15%;">QTY</th>
                            <th class="text-end" style="width: 20%;">UNIT PRICE</th>
                            <th class="text-end" style="width: 20%;">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="item-desc">Premium Support</div>
                                <div class="item-subdesc">Annual subscription for technical support service</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-end">$9.00</td>
                            <td class="text-end fw-bold">$9.00</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item-desc">Enterprise UI Design System License</div>
                                <div class="item-subdesc">Multi-user license for corporate usage</div>
                            </td>
                            <td class="text-center">3</td>
                            <td class="text-end">$100.00</td>
                            <td class="text-end fw-bold">$300.00</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item-desc">Hardware Component Kit</div>
                                <div class="item-subdesc">Essential replacement parts for system maintenance</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-end">$89.00</td>
                            <td class="text-end fw-bold">$89.00</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-end">Subtotal</td>
                            <td class="text-end">$398.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-end fw-bold">Total Due</td>
                            <td class="text-end fw-bold">$437.80</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="summary-section">
                <div class="payment-info">
                    <div class="payment-card">
                        <p class="payment-title">Payment Methods</p>
                        <div class="payment-details">
                            <p><strong>Bank Transfer</strong></p>
                            <p>Account Name: Universiti Pendidikan Sultan Idris</p>
                            <p>Account Number: 8000-1234-5678</p>
                            <p>Bank: Malaysia National Bank</p>
                            <p>SWIFT/BIC: MABBMYKL</p>
                            <p class="mb-0">Reference: INV-0453119</p>
                        </div>
                    </div>
                </div>
                <div class="summary-card">
                    <p class="payment-title">Invoice Summary</p>
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>$398.00</span>
                    </div>
                    <div class="summary-row summary-total">
                        <span>Total</span>
                        <span>$437.80</span>
                    </div>

                    <div class="mt-3 text-center">
                        <p class="mb-1 small fw-bold">Authorized Signature</p>
                        <p class="mb-0 small">Ahmad Bin Abdullah</p>
                        <p class="small text-muted">Finance Director</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="invoice-footer">
            <div>
                <p class="thank-you mb-1">Thank you for your business!</p>
                <p class="contact-info mb-0">Questions? Contact us at <strong>finance@upsi.edu.my</strong> | <strong>+605-450 6123</strong></p>
            </div>
            <div class="button-group">
                <button class="btn-download">
                    <i class="fas fa-download button-icon"></i> Download
                </button>
                <a href="<?= base_url('provider/payment/print_invoice/' . '123abcd') ?>" class="btn-print" target="_blank">
                    <i class="fas fa-print button-icon"></i> Print
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btn-download').on('click', function() {
            window.print();
        });
    });
</script>