<!DOCTYPE html>
<html>

<head>
    <title>PDF Certificate</title>
    <style>
        @page {
            size: A4;
            /* Set page size */
            margin: 0;
            /* Remove default margins */
            background-image: url('<?= base_url('assets/img/certificate/certificate_bg.png') ?>');
            background-size: cover;
        }

        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            width: 210mm;
            /* A4 Width */
            height: 297mm;
            /* A4 Height */
        }

        .content {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        h1 {
            color: darkblue;
            font-size: 24px;
        }

        p {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="content">
        <h1>Certificate of Achievement</h1>
        <p>This certificate is awarded to <b>John Doe</b></p>
    </div>
</body>

</html>