<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice <?= $invoice_details->sp_invoice_number ?></title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "DejaVu Sans", Arial, Helvetica, sans-serif;
            font-size: 10pt;
            line-height: 1.4;
            color: #212529;
        }

        /* Invoice layout */
        .invoice-container {
            width: 100%;
            margin: 0 auto;
        }

        .invoice-header {
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        /* Fix for header row layout */
        .header-row {
            width: 100%;
        }

        .header-row:after {
            content: "";
            display: block;
            clear: both;
        }

        .header-col {
            float: left;
        }

        .logo-col {
            width: 20%;
        }

        .address-col {
            width: 60%;
        }

        .info-col {
            width: 30%;
            text-align: right;
        }

        .company-logo {
            max-width: 150px;
            height: auto;
        }

        .invoice-title {
            color: #1a3b5d;
            font-size: 18pt;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .invoice-info {
            line-height: 1.6;
        }

        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 8pt;
            font-weight: bold;
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

        /* Customer and payment info - fixed for MPDF */
        .info-section {
            margin-bottom: 20px;
            width: 100%;
        }

        .info-section:after {
            content: "";
            display: block;
            clear: both;
        }

        .address-col {
            float: left;
            width: 48%;
            margin-right: 2%;
        }

        .payment-col {
            float: left;
            width: 48%;
            margin-left: 2%;
        }

        .address-card {
            background-color: #f7f9fc;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 15px;
        }

        .address-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Item table */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .items-table th {
            background-color: #1a3b5d;
            color: white;
            font-weight: normal;
            text-transform: uppercase;
            padding: 8px;
            font-size: 9pt;
            text-align: left;
        }

        .items-table td {
            padding: 8px;
            border-bottom: 1px solid #e9ecef;
            vertical-align: top;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .item-desc {
            font-weight: bold;
        }

        .item-subdesc {
            font-size: 8pt;
            color: #6c757d;
        }

        .items-table tfoot {
            border-top: 2px solid #1a3b5d;
        }

        .items-table tfoot th,
        .items-table tfoot td {
            padding: 8px;
            font-weight: bold;
        }

        /* Summary section - fixed for MPDF */
        .summary-section {
            margin-top: 20px;
            width: 100%;
        }

        .summary-section:after {
            content: "";
            display: block;
            clear: both;
        }

        .payment-info-col {
            float: left;
            width: 100%;
            margin-right: 2%;
        }

        .summary-col {
            float: left;
            width: 38%;
            margin-left: 2%;
        }

        .payment-card {
            border: 1px solid #e9ecef;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 15px;
        }

        .payment-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .summary-card {
            background-color: #f7f9fc;
            border-radius: 4px;
            padding: 10px;
            border-left: 3px solid #2c73d2;
        }

        .summary-row {
            margin-bottom: 5px;
            width: 100%;
        }

        .summary-row:after {
            content: "";
            display: block;
            clear: both;
        }

        .summary-label {
            float: left;
            width: 48%;
        }

        .summary-value {
            float: right;
            width: 48%;
            text-align: right;
        }

        .summary-total {
            font-weight: bold;
            font-size: 12pt;
            color: #1a3b5d;
            padding-top: 5px;
            margin-top: 5px;
            border-top: 1px solid #e9ecef;
        }

        /* Footer */
        .invoice-footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #e9ecef;
        }

        .thank-you {
            font-weight: bold;
            color: #1a3b5d;
            margin-bottom: 5px;
        }

        .contact-info {
            color: #6c757d;
            font-size: 8pt;
        }

        .signature-section {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <div class="header-row">
                <div class="header-col logo-col" style="display: flex;">
                    <img src="<?= FCPATH . 'assets/img/logos/UPSI.png' ?>" alt="University Logo" class="company-logo">
                </div>
                <div class="header-col address-col">
                    <div style="padding-left:10px;">
                        <p class="mb-0 small">Universiti Pendidikan Sultan Idris<br>35900 Tanjong Malim, Perak Darul Ridzuan<br>Tel: +605-450 6000, Email: bpq@upsi.edu.my</p>
                    </div>
                </div>
                <div class="header-col info-col">
                    <h1 class="invoice-title">INVOIS</h1>
                </div>
            </div>
        </div>

        <div class="info-section">
            <div class="address-col">
                <div class="address-card">
                    <p class="address-title">Kepada:</p>
                    <p>
                        <strong><?= $pvd_details->pvd_name ?></strong><br>
                        <?= $pvd_details->pvd_address ?><br>
                        <span style="color: #6c757d;">Email:</span><?= $pvd_details->pvd_email ?><br>
                        <span style="color: #6c757d;">Phone:</span><?= $pvd_details->pvd_phone ?>
                    </p>
                </div>
            </div>
            <div class="payment-col">
                <div class="address-card">
                    <p class="address-title">Maklumat Bayaran:</p>
                    <p>
                        <span style="color: #6c757d;">No. Invois:</span> <?= $invoice_details->sp_invoice_number ?><br>
                        <span style="color: #6c757d;">Ruj. Kami:</span> QVC SAMC<br>
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
                        <span style="color: #6c757d;">Tarikh:</span> <?= $tarikh_invois->format('d/m/Y') ?><br>
                        <span style="color: #6c757d;">Tarikh Akhir Bayaran: </span> <?= $tarikh_akhir->format('d/m/Y') ?>

                    </p>
                </div>
            </div>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 6%;">BIL.</th>
                    <th style="width: 42%;">KETERANGAN</th>
                    <th class="text-center" style="width: 11%;">KUANTITI</th>
                    <th class="text-end" style="text-align: right; width: 21%;">HARGA SEUNIT (RM)</th>
                    <th class="text-end" style="text-align: right; width: 20%;">AMAUN (RM)</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?>
                <?php foreach ($item_details as $item) : ?>
                    <tr>
                        <td class="text-center"><?= $counter++; ?></td>
                        <td>
                            <div class="item-desc"><?= $item->samc_course_name ?></div>
                            <!-- <div class="item-subdesc">SAMC ID: <?= $item->spi_samc_id ?></div> -->
                        </td>
                        <td class="text-center">1</td>
                        <td class="text-end" style="text-align: right;"><?= number_format(1000, 2) ?></td>
                        <td class=" text-end fw-bold" style="text-align: right;"><?= number_format(1000, 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <!-- <tr>
                    <td colspan="2"></td>
                    <td class="text-right">Subtotal</td>
                    <td class="text-right">' . $invoice['subtotal'] . '</td>
                </tr> -->
                <tr>
                    <td colspan="3"></td>
                    <td class="text-right" style="font-weight: bold;">Jumlah</td>
                    <td class="text-right" style="font-weight: bold;">RM <?= $invoice_details->sp_amount ?></td>
                </tr>
            </tfoot>
        </table>

        <div class="summary-section">
            <div class="payment-info-col">
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

        <div class="invoice-footer">
            <p class="thank-you">Cetakan adalah berkomputer dan tidak memerlukan tandatangan</p>
            <p class="contact-info">Hubungi kami di<strong>bpq@upsi.edu.my</strong> | <strong>+605-450 6123</strong></p>
        </div>
    </div>
</body>

</html>