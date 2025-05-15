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
        --primary-color: #2c3e50;
        --secondary-color: #3498db;
        --accent-color: #f8f9fa;
        --border-color: #dee2e6;
        --text-primary: #2c3e50;
        --text-secondary: #6c757d;
        --text-muted: #95a5a6;
        --border-radius: 6px;
        --box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
        --transition: all 0.2s ease;
    }

    body {
        font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        background-color: #f8f9fa;
        color: var(--text-primary);
    }

    .invoice-container {
        max-width: 1000px;
    }

    .invoice-card {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
    }

    .invoice-header {
        background-color: white;
        border-bottom: 1px solid var(--border-color);
        padding: 2rem;
    }

    .company-logo {
        max-height: 60px;
        width: auto;
    }

    .invoice-title {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .invoice-details {
        background-color: var(--accent-color);
        border-radius: var(--border-radius);
        padding: 1.5rem;
        margin-top: 1.5rem;
    }

    .invoice-details-title {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
    }

    .invoice-details-value {
        color: var(--text-primary);
        font-weight: 600;
        font-size: 1rem;
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
        padding: 0.75rem 1rem;
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
        margin-bottom: 0.5rem;
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
        box-shadow: var(--box-shadow);
        transition: var(--transition);
    }

    .print-button:hover {
        background-color: #1a2a3a;
        transform: translateY(-1px);
    }

    .print-button i {
        margin-right: 0.5rem;
    }

    .address-section {
        line-height: 1.5;
    }

    .address-section p {
        margin-bottom: 0.25rem;
    }

    @media print {
        body {
            background-color: white;
        }

        .print-button {
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
                    <img src="<?= base_url('assets/img/logos/UPSI.png') ?>" alt="Company Logo" class="company-logo mb-3">
                    <div class="address-section">
                        <p class="mb-1">Universiti Pendidikan Sultan Idris</p>
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
                                <p class="invoice-details-value">#0453119</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="invoice-details-title">DATE ISSUED</p>
                                <p class="invoice-details-value">06/03/2019</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-start">
                                <p class="invoice-details-title">DUE DATE</p>
                                <p class="invoice-details-value">11/03/2019</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="invoice-details-title">STATUS</p>
                                <p class="invoice-details-value text-danger">UNPAID</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="invoice-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5 class="mb-2">Billed To:</h5>
                    <div class="address-section">
                        <p class="fw-bold mb-1">John Doe</p>
                        <p class="mb-1">4006 Locust View Drive</p>
                        <p class="mb-1">San Francisco, CA</p>
                        <p>United States</p>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-invoice">
                    <thead>
                        <tr>
                            <th style="width: 40%;">Item Description</th>
                            <th class="text-center" style="width: 15%;">Quantity</th>
                            <th class="text-end" style="width: 15%;">Rate</th>
                            <th class="text-end" style="width: 15%;">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="item-description">Premium Support</div>
                                <div class="text-secondary small">Annual subscription</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-end">$9.00</td>
                            <td class="text-end item-price">$9.00</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item-description">Soft UI Design System PRO</div>
                                <div class="text-secondary small">User license</div>
                            </td>
                            <td class="text-center">3</td>
                            <td class="text-end">$100.00</td>
                            <td class="text-end item-price">$300.00</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item-description">Parts for service</div>
                                <div class="text-secondary small">Hardware components</div>
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
                            <td class="text-end">Tax (10%)</td>
                            <td class="text-end">$39.80</td>
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
                <div class="col-md-8">
                    <div class="payment-methods mb-4">
                        <h5 class="mb-3">Payment Methods</h5>
                        <p class="mb-1"><strong>Bank Transfer</strong></p>
                        <p class="mb-1">Account Name: Company Name LLC</p>
                        <p class="mb-1">Account Number: 1234567890</p>
                        <p class="mb-1">SWIFT/BIC: ABABUS33</p>
                        <p>Reference: Invoice #0453119</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-light p-3 rounded">
                        <h5 class="mb-3">Invoice Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>$398.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tax (10%)</span>
                            <span>$39.80</span>
                        </div>
                        <div class="d-flex justify-content-between pt-2 border-top mt-2">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold">$437.80</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="invoice-footer">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="thank-you-message">Thank you for your business!</h5>
                    <p class="contact-info">If you have any questions concerning this invoice, please contact us at:</p>
                    <p class="contact-info">Email: <strong>support@creative-tim.com</strong></p>
                    <p class="small text-muted mt-3">This invoice was generated electronically and is valid without a signature.</p>
                </div>
                <div class="col-md-4 text-md-end mt-4 mt-md-0">
                    <button class="print-button" onclick="window.print()">
                        <i class="fas fa-print"></i> Print Invoice
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>