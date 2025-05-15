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
        /* Deeper blue for corporate look */
        --secondary-color: #2c73d2;
        /* Accent blue */
        --accent-color: #f7f9fc;
        /* Subtle background */
        --border-color: #e9ecef;
        /* Subtle border */
        --text-primary: #212529;
        /* Dark text for readability */
        --text-secondary: #495057;
        /* Secondary text */
        --text-muted: #6c757d;
        /* Muted text */
        --border-radius: 4px;
        /* More conservative border radius */
        --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        /* Subtle shadow */
        --transition: all 0.2s ease;
    }

    body {
        font-family: 'Inter', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        background-color: #f8f9fa;
        color: var(--text-primary);
        line-height: 1.6;
    }

    .invoice-container {
        max-width: 1100px;
        margin-top: 2rem;
        margin-bottom: 2rem;
    }

    .invoice-card {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        background-color: white;
    }

    .invoice-header {
        background-color: white;
        border-bottom: 1px solid var(--border-color);
        padding: 2rem;
    }

    .company-logo {
        max-height: 70px;
        width: auto;
    }

    .invoice-title {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1.75rem;
        letter-spacing: -0.5px;
        margin-bottom: 0.5rem;
    }

    .invoice-details {
        background-color: var(--accent-color);
        border-radius: var(--border-radius);
        padding: 1.5rem;
        margin-top: 1rem;
        border-left: 4px solid var(--secondary-color);
    }

    .invoice-details-title {
        color: var(--text-secondary);
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
        font-weight: 500;
    }

    .invoice-details-value {
        color: var(--text-primary);
        font-weight: 600;
        font-size: 1.05rem;
    }

    .status-badge {
        display: inline-block;
        padding: 0.35rem 0.75rem;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
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
        padding: 2rem;
    }

    .table-invoice {
        margin-bottom: 2rem;
    }

    .table-invoice thead th {
        background-color: var(--primary-color);
        color: white;
        font-weight: 500;
        border: none;
        padding: 0.85rem 1rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-invoice tbody td {
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid var(--border-color);
    }

    .table-invoice tbody tr:last-child td {
        border-bottom: none;
    }

    .table-invoice tfoot {
        border-top: 2px solid var(--primary-color);
    }

    .table-invoice tfoot th,
    .table-invoice tfoot td {
        padding: 1rem;
        font-weight: 600;
    }

    .item-description {
        font-weight: 500;
        color: var(--text-primary);
    }

    .item-price {
        font-weight: 600;
        color: var(--primary-color);
    }

    .invoice-footer {
        background-color: white;
        border-top: 1px solid var(--border-color);
        padding: 2rem;
    }

    .thank-you-message {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 0.75rem;
    }

    .contact-info {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
    }

    .print-button {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: var(--border-radius);
        font-weight: 500;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: var(--transition);
    }

    .print-button:hover {
        background-color: #132f4c;
        transform: translateY(-1px);
    }

    .download-button {
        background-color: white;
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
        padding: 0.75rem 1.5rem;
        border-radius: var(--border-radius);
        font-weight: 500;
        margin-right: 1rem;
        transition: var(--transition);
    }

    .download-button:hover {
        background-color: var(--accent-color);
    }

    .button-icon {
        margin-right: 0.5rem;
    }

    .address-section {
        line-height: 1.6;
    }

    .address-section p {
        margin-bottom: 0.25rem;
    }

    .client-address-card {
        padding: 1.5rem;
        background-color: var(--accent-color);
        border-radius: var(--border-radius);
        margin-bottom: 2rem;
    }

    .payment-methods-card {
        padding: 1.5rem;
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
    }

    .summary-card {
        background-color: var(--accent-color);
        padding: 1.5rem;
        border-radius: var(--border-radius);
        border-left: 4px solid var(--secondary-color);
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
    }

    .summary-total {
        font-weight: 700;
        font-size: 1.15rem;
        color: var(--primary-color);
        padding-top: 0.75rem;
        margin-top: 0.75rem;
        border-top: 1px solid var(--border-color);
    }

    .invoice-notes {
        padding: 1.5rem;
        background-color: var(--accent-color);
        border-radius: var(--border-radius);
        margin-top: 2rem;
    }

    .official-stamp {
        width: 150px;
        height: auto;
        margin-top: 1rem;
    }

    @media print {
        body {
            background-color: white;
        }

        .print-button,
        .download-button {
            display: none;
        }

        .invoice-card {
            box-shadow: none;
        }
    }
</style>

<div class="container invoice-container my-5">
    <div class="card invoice-card">
        <div class="invoice-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="<?= base_url('assets/img/logos/UPSI.png') ?>" alt="University Logo" class="company-logo mb-3">
                    <div class="address-section">
                        <p class="mb-1 fw-bold">Universiti Pendidikan Sultan Idris</p>
                        <p class="mb-1">35900 Tanjong Malim,</p>
                        <p class="mb-1">Perak Darul Ridzuan</p>
                        <p class="text-secondary">Tel: +605-450 6000</p>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <h1 class="invoice-title">INVOICE</h1>
                    <div class="invoice-details mt-3">
                        <div class="row mb-2">
                            <div class="col-6 text-start">
                                <p class="invoice-details-title">INVOICE NO.</p>
                                <p class="invoice-details-value">INV-0453119</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="invoice-details-title">DATE ISSUED</p>
                                <p class="invoice-details-value">06/03/2023</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-start">
                                <p class="invoice-details-title">DUE DATE</p>
                                <p class="invoice-details-value">11/03/2023</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="invoice-details-title">STATUS</p>
                                <p><span class="status-badge status-unpaid">UNPAID</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="invoice-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5 class="mb-3 fw-bold">Billed To:</h5>
                    <div class="client-address-card">
                        <div class="address-section">
                            <p class="fw-bold mb-1">John Doe</p>
                            <p class="mb-1">4006 Locust View Drive</p>
                            <p class="mb-1">San Francisco, CA 94110</p>
                            <p>United States</p>
                            <p class="mt-2 mb-0"><strong>Email:</strong> john.doe@example.com</p>
                            <p><strong>Phone:</strong> +1 (555) 123-4567</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3 fw-bold">Payment Details:</h5>
                    <div class="client-address-card">
                        <p class="mb-1"><strong>Reference:</strong> INV-0453119</p>
                        <p class="mb-1"><strong>Payment Method:</strong> Bank Transfer</p>
                        <p><strong>Payment Terms:</strong> Net 30 Days</p>
                    </div>
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
                                <div class="item-description">Premium Support</div>
                                <div class="text-secondary small">Annual subscription for technical support service</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-end">$9.00</td>
                            <td class="text-end item-price">$9.00</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item-description">Enterprise UI Design System License</div>
                                <div class="text-secondary small">Multi-user license for corporate usage</div>
                            </td>
                            <td class="text-center">3</td>
                            <td class="text-end">$100.00</td>
                            <td class="text-end item-price">$300.00</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item-description">Hardware Component Kit</div>
                                <div class="text-secondary small">Essential replacement parts for system maintenance</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-end">$89.00</td>
                            <td class="text-end item-price">$89.00</td>
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

            <div class="row mt-4">
                <div class="col-md-7">
                    <div class="payment-methods-card mb-4">
                        <h5 class="mb-3 fw-bold">Payment Methods</h5>
                        <div class="mb-3">
                            <p class="mb-1"><strong>Bank Transfer</strong></p>
                            <p class="mb-1">Account Name: Universiti Pendidikan Sultan Idris</p>
                            <p class="mb-1">Account Number: 8000-1234-5678</p>
                            <p class="mb-1">Bank: Malaysia National Bank</p>
                            <p class="mb-1">SWIFT/BIC: MABBMYKL</p>
                            <p>Reference: INV-0453119</p>
                        </div>

                        <div class="invoice-notes">
                            <h6 class="fw-bold mb-2">Notes</h6>
                            <p class="mb-0 small">Please ensure all payments are made by the due date. Include the invoice number as reference for all transactions. For questions regarding this invoice, please contact our finance department.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="summary-card">
                        <h5 class="mb-3 fw-bold">Invoice Summary</h5>
                        <div class="summary-item">
                            <span>Subtotal</span>
                            <span>$398.00</span>
                        </div>
                        <div class="summary-item summary-total">
                            <span>Total</span>
                            <span>$437.80</span>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="mb-2 fw-bold">Authorized Signature</p>
                            <img src="/api/placeholder/150/80" alt="Digital Signature" class="official-stamp">
                            <p class="mt-2 small">Ahmad Bin Abdullah</p>
                            <p class="small text-muted">Finance Director</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="invoice-footer">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5 class="thank-you-message">Thank you for your business!</h5>
                    <p class="contact-info">If you have any questions concerning this invoice, please contact us at:</p>
                    <p class="contact-info">Email: <strong>finance@upsi.edu.my</strong> | Phone: <strong>+605-450 6123</strong></p>
                    <p class="small text-muted mt-3">This invoice was generated electronically and is valid without a signature.</p>
                </div>
                <div class="col-md-4 text-md-end mt-4 mt-md-0">
                    <button class="download-button">
                        <i class="fas fa-download button-icon"></i> Download PDF
                    </button>
                    <button class="print-button" onclick="window.print()">
                        <i class="fas fa-print button-icon"></i> Print
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize any interactive components
    $(document).ready(function() {
        // You can add any JavaScript functionality here
        // For example, download functionality for PDF button
        $('.download-button').on('click', function() {
            window.print();
        });
    });
</script>