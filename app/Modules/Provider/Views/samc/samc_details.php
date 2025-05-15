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
<link href="<?= base_url(); ?>assets/css/certificate.css" rel="stylesheet" />
<!-- Additional CSS to enhance the UI -->
<style>
    /* body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
    }

    .card {
        border: none;
        border-radius: 0.5rem;
    }

    .card-header {
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, .05);
    }

    .form-control {
        border: 1px solid #e9ecef;
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #b0c4de;
    }

    .form-control[readonly] {
        background-color: #f8f9fa;
    }

    .form-label {
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-primary {
        background-color: #3b5998;
        border-color: #3b5998;
        box-shadow: 0 2px 6px rgba(59, 89, 152, 0.2);
    }

    .btn-primary:hover {
        background-color: #344e86;
        border-color: #344e86;
    }

    .nav-pills .nav-link {
        color: #495057;
        font-size: 0.875rem;
        border-radius: 4px;
    }

    .nav-pills .nav-link.active {
        background-color: #3b5998;
        color: #fff;
    }

    .certificate-container {
        border: 1px solid #e9ecef;
        background-color: #fff;
        border-radius: 0.25rem;
        overflow: hidden;
    }

    .table {
        font-size: 0.875rem;
    }

    .badge {
        padding: 0.5em 0.75em;
        font-weight: 500;
    } */


    .certificate_card {
        /* width: clamp(200px, 61vh, 18vw);*/
        height: clamp(280px, 85vh, 30.2vw);
        position: relative;
        overflow: hidden;
        margin-top: 20px;
        margin-bottom: 20px;
        overflow: hidden;
        z-index: 10;
        touch-action: none;
        border-radius: 5% / 3.5%;
        box-shadow: -5px -5px 5px -5px var(--color1),
            5px 5px 5px -5px var(--color2),
            -7px -7px 10px -5px transparent,
            7px 7px 10px -5px transparent,
            0 0 5px 0px rgba(255, 255, 255, 0),
            0 55px 35px -20px rgba(0, 0, 0, 0.5);
        transition: transform 0.5s ease,
            box-shadow 0.2s ease;
        will-change: transform,
            filter;
        background-color: #040712;
        background-image: url('<?= base_url('assets/img/certificate/certificate_bg.png') ?>');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 50% 50%;
        transform-origin: center;
    }

    .certificate_card:hover {
        box-shadow:
            -20px -20px 30px -25px var(--color1),
            20px 20px 30px -25px var(--color2),
            -7px -7px 10px -5px var(--color1),
            7px 7px 10px -5px var(--color2),
            0 0 13px 4px rgba(255, 255, 255, 0.3),
            0 55px 35px -20px rgba(0, 0, 0, 0.5);
        background-image: url("<?= base_url('assets/img/certificate/certificate_bg.png') ?>");
    }

    .certificate_card:after {
        opacity: 1;
        background-image: url("<?= base_url('assets/img/certificate/sparkles.gif') ?>"),
            url("<?= base_url('assets/img/certificate/sparkles.png') ?>"),
            linear-gradient(125deg, #ff008450 15%, #fca40040 30%, #ffff0030 40%, #00ff8a20 60%, #00cfff40 70%, #cc4cfa50 85%);
        background-position: 50% 50%;
        background-size: 160%;
        background-blend-mode: overlay;
        z-index: 2;
        filter: brightness(1) contrast(1);
        transition: all .33s ease;
        mix-blend-mode: color-dodge;
        opacity: .75;
    }
</style>
<div class="container-fluid py-4">
    <!-- Main Content Row -->
    <div class="row">
        <!-- Left Column - SAMC Information -->
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="mb-0 text-dark fw-bold">SAMC INFORMATION</h5>
                </div>
                <div class="card-body p-4">
                    <form>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="courseName" class="form-label text-muted">Course Name</label>
                                <input type="text" class="form-control bg-light" id="courseName" value="<?= $samcData->samc_course_name ?>" readonly>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="status" class="form-label text-muted">Status</label>
                                <input type="text" class="form-control bg-light <?= $samcData->samc_status === 'Active' ? 'border-success' : '' ?>" id="status" value="<?= $samcData->samc_status ?>" readonly>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="mqfLevel" class="form-label text-muted">MQF Level</label>
                                <input type="text" class="form-control bg-light" id="mqfLevel" value="<?= $samcData->samc_mqf_level ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="field" class="form-label text-muted">Field</label>
                                <input type="text" class="form-control bg-light" id="field" value="<?= $samcData->samc_ef_id ?>" readonly>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="submitDate" class="form-label text-muted">Submit Date</label>
                                <input type="text" class="form-control bg-light" id="submitDate" value="<?= $samcData->samc_submit_date ?>" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="assignedDate" class="form-label text-muted">Assigned Date</label>
                                <input type="text" class="form-control bg-light" id="assignedDate" value="<?= $samcData->samc_assigned_date ?>" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="reviewedDate" class="form-label text-muted">Reviewed Date</label>
                                <input type="text" class="form-control bg-light" id="reviewedDate" value="<?= $samcData->samc_reviewed_date ?>" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="startDate" class="form-label text-muted">Start Date</label>
                                <input type="text" class="form-control bg-light" id="startDate" value="<?= $samcData->samc_start_date ?>" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="expiredDate" class="form-label text-muted">Expired Date</label>
                                <input type="text" class="form-control bg-light" id="expiredDate" value="<?= $samcData->samc_expired_date ?>" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Column - Certificate -->
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="mb-0 text-dark fw-bold">CERTIFICATE</h5>
                </div>
                <div class="card-body p-4 pt-0 text-center">
                    <!-- Certificate display for desktop -->
                    <div class="d-none d-lg-block">
                        <div class="certificate_card charizard animated">
                        </div>
                    </div>

                    <!-- Download button for mobile -->
                    <div class="d-block d-lg-none">
                        <button type="button" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-download me-2"></i>Download Certificate
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Monitoring Section -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-dark fw-bold">Monitoring</h5>
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item mx-1">
                            <a class="nav-link active px-3 py-2" data-bs-toggle="tab" href="#cam1" role="tab">
                                Year 1
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-2" data-bs-toggle="tab" href="#cam2" role="tab">
                                Year 2
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-2" data-bs-toggle="tab" href="#cam3" role="tab">
                                Year 3
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="cam1" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col" class="text-uppercase text-xs font-weight-bolder opacity-7">Date</th>
                                            <th scope="col" class="text-uppercase text-xs font-weight-bolder opacity-7">Activity</th>
                                            <th scope="col" class="text-uppercase text-xs font-weight-bolder opacity-7">Status</th>
                                            <th scope="col" class="text-uppercase text-xs font-weight-bolder opacity-7">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="text-sm">2023-01-15</span>
                                            </td>
                                            <td>
                                                <span class="text-sm">Initial Review</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Completed</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
                                            </td>
                                        </tr>
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cam2" role="tabpanel">
                            <div class="alert alert-info">
                                Data for Year 2 will be available once the monitoring period begins.
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cam3" role="tabpanel">
                            <div class="alert alert-info">
                                Data for Year 3 will be available once the monitoring period begins.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        var x;
        var $certificate_cards = $(".certificate_card");
        var $style = $(".hover");

        $certificate_cards
            .on("mousemove touchmove", function(e) {
                // normalise touch/mouse
                var pos = [e.offsetX, e.offsetY];
                e.preventDefault();
                if (e.type === "touchmove") {
                    pos = [e.touches[0].clientX, e.touches[0].clientY];
                }
                var $certificate_card = $(this);
                // math for mouse position
                var l = pos[0];
                var t = pos[1];
                var h = $certificate_card.height();
                var w = $certificate_card.width();
                var px = Math.abs(Math.floor(100 / w * l) - 100);
                var py = Math.abs(Math.floor(100 / h * t) - 100);
                var pa = (50 - px) + (50 - py);
                // math for gradient / background positions
                var lp = (50 + (px - 50) / 1.5);
                var tp = (50 + (py - 50) / 1.5);
                var px_spark = (50 + (px - 50) / 7);
                var py_spark = (50 + (py - 50) / 7);
                var p_opc = 20 + (Math.abs(pa) * 1.5);
                var ty = ((tp - 50) / 2) * -1;
                var tx = ((lp - 50) / 1.5) * .5;
                // css to apply for active certificate_card
                var grad_pos = `background-position: ${lp}% ${tp}%;`
                var sprk_pos = `background-position: ${px_spark}% ${py_spark}%;`
                var opc = `opacity: ${p_opc/100};`
                var tf = `transform: rotateX(${ty}deg) rotateY(${tx}deg)`
                // need to use a <style> tag for psuedo elements
                var style = `
      .certificate_card:hover:before { ${grad_pos} }  /* gradient */
      .certificate_card:hover:after { ${sprk_pos} ${opc} }   /* sparkles */ 
    `
                // set / apply css class and style
                $certificate_cards.removeClass("active");
                $certificate_card.removeClass("animated");
                $certificate_card.attr("style", tf);

                $style.html(style);
                if (e.type === "touchmove") {
                    return false;
                }
                clearTimeout(x);
            }).on("mouseout touchend touchcancel", function() {
                // remove css, apply custom animation on end
                var $certificate_card = $(this);
                $style.html("");
                $certificate_card.removeAttr("style");
                x = setTimeout(function() {
                    $certificate_card.addClass("animated");
                }, 2500);
            });
    });
</script>