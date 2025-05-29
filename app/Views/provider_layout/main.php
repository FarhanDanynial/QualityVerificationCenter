<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/favicon.png">
    <title>
        QVC UPSI
    </title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url() ?>assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="<?= base_url() ?>assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url() ?>assets/css/soft-ui-dashboard.css?v=1.1.1" rel="stylesheet" />
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery (MUST be loaded first) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Optional: Add Animate.css for better animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


    <!-- Custom SweetAlert2 Styling -->
    <style>
        .swal2-popup {
            border-radius: 10px !important;
            font-family: 'Inter', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif !important;
        }

        .swal2-title {
            color: var(--text-primary) !important;
            font-weight: 600 !important;
        }

        .swal2-html-container {
            color: var(--text-secondary) !important;
            line-height: 1.5 !important;
        }

        .swal2-confirm {
            border-radius: 6px !important;
            font-weight: 500 !important;
            padding: 0.5rem 1rem !important;
        }

        .swal2-cancel {
            border-radius: 6px !important;
            font-weight: 500 !important;
            padding: 0.5rem 1rem !important;
        }

        .swal2-timer-progress-bar {
            background: rgba(255, 255, 255, 0.6) !important;
        }

        .invoice-details {
            background-color: #f8f9fa !important;
            border: 1px solid #e9ecef !important;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?= view('provider_layout/sidebar') ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <?= view('provider_layout/navbar') ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">

            <?= view($view, $data); ?>
        </div>

    </main>
    <!--   Core JS Files   -->
    <script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/choices.min.js"></script>
    <script src="<?= base_url() ?>assets/js/soft-ui-dashboard.min.js?v=1.1.1"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check for success messages
            <?php if (session()->getFlashdata('success')) : ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '<?= session()->getFlashdata('success') ?>',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#27ae60',
                    timer: 5000,
                    timerProgressBar: true,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            <?php endif; ?>

            // Check for error messages
            <?php if (session()->getFlashdata('error')) : ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '<?= session()->getFlashdata('error') ?>',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#e74c3c',
                    timer: 8000,
                    timerProgressBar: true,
                    showClass: {
                        popup: 'animate__animated animate__shakeX'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            <?php endif; ?>

            // Check for warning messages
            <?php if (session()->getFlashdata('warning')) : ?>
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: '<?= session()->getFlashdata('warning') ?>',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#f39c12',
                    timer: 6000,
                    timerProgressBar: true,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            <?php endif; ?>

            // Check for info messages
            <?php if (session()->getFlashdata('info')) : ?>
                Swal.fire({
                    icon: 'info',
                    title: 'Information',
                    text: '<?= session()->getFlashdata('info') ?>',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3498db',
                    timer: 6000,
                    timerProgressBar: true,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            <?php endif; ?>
        });
    </script>

</body>

</html>