<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

<!-- XLSX (For Export to Excel) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Select 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/css/select2override.css" rel="stylesheet" />
<style>
    .dataTable-wrapper .dataTable-container .table tbody tr td {
        padding: 0.25rem 1rem !important;
    }

    .dataTable-wrapper .dataTable-container .table thead tr th {
        padding: 0.75rem 1rem;
        opacity: .7;
        font-weight: bolder;
        color: #000000;
        text-transform: uppercase;
        font-size: 1rem;
        background-color: #0ea5e9;
    }

    .dataTable-wrapper .dataTable-bottom {
        padding-top: 1rem !important;
    }
</style>

<div class="row">
    <!-- Provider Profile -->
    <div class="col-lg-5 col-md-12 col-sm-12 mt-lg-0 mt-md-4 mt-sm-4">
        <div class="page-header min-height-100 border-radius-xl" style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="../../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            <?= $provider_info->pvd_name ?>
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            <?= $provider_info->pvd_address ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">My Information</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="javascript:;" onclick="showEditModal()">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <hr class="horizontal gray-light my-2">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name:</strong> <br><?= $provider_info->pvd_name ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> <br><?= $provider_info->pvd_phone ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> <br><?= $provider_info->pvd_email ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> <br><?= $provider_info->pvd_address ?></li>
                        <li class="list-group-item border-0 ps-0 pb-0"><strong class="text-dark text-sm">Type:</strong> <br><?= $provider_info->pvd_type ?></li>
                        <li class="list-group-item border-0 ps-0 pb-0"><strong class="text-dark text-sm">Date of establishment:</strong> <br><?= date('d/m/Y', strtotime($provider_info->pvd_doe)) ?> </li>
                        <li class="list-group-item border-0 ps-0 pb-0"><strong class="text-dark text-sm">SSM Number:</strong> <br><?= $provider_info->pvd_ssm_number ?></li>
                        <li class="list-group-item border-0 ps-0 pb-0">
                            <strong class="text-dark text-sm">SSM Cert:</strong>
                            <br>
                            <a href="<?= base_url($provider_info->pvd_ssm_cert) ?>" class="btn btn-primary btn-sm mt-2" target="_blank">
                                <i class="fas fa-file-pdf me-2" style="font-size: 1rem;"></i> View SSM Certificate
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Simplifeid Data, Memo and Submission Button -->
    <div class="col-lg-7">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="card  mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Course Submitted</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        100
                                        <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Active Course</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        300
                                        <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 mt-sm-0 mt-4">
                <div class="card  mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Payment</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        RM50, 000
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Expired Course</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        100
                                        <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="card">
                <div class="card-header d-flex align-items-center bg-gradient-primary justify-content-between pb-0 p-3">
                    <h5 class="mb-3">Memo</h5>
                    <div class="nav-wrapper position-relative">
                        <button type="button" class="btn btn-default bg-white d-flex align-items-center mb-2">
                            <span>Unread messages</span>
                            <span class="badge bg-primary ms-2"><?= $unread_notifications ?></span>
                        </button>
                    </div>
                </div>
                <div class="card-body border-radius-lg p-3 my-2" style="height:338px; overflow:auto;">
                    <?php if ($unread_notifications == '0'): ?>
                        <div class="empty-notification p-4">
                            <center>
                                <img src="<?= base_url('assets/img/icons/thumbs_up.png') ?>" alt="No Notifications" class="mb-3" style="max-width: 230px;">
                            </center>
                            <p class="text-muted text-center">
                                You have no notifications at the moment. Check back later!
                            </p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($notifications as $notification): ?>
                            <div class="d-flex mt-3">
                                <div>
                                    <div class="icon icon-shape bg-primary-soft shadow text-center border-radius-md shadow-none">
                                        <i class="ni ni-bell-55 text-lg text-primary text-gradient opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="numbers">
                                        <h6 class="mb-1 text-dark text-sm">
                                            <a href="#"
                                                class="notification-link"
                                                data-id="<?= $notification->n_id ?>"
                                                style="text-decoration: none; color: inherit;">
                                                <?= $notification->n_message ?>
                                            </a>
                                        </h6>
                                        <span class="text-sm">
                                            <?php
                                            $date = new DateTime($notification->n_created_at);
                                            $formattedDate = $date->format('d F Y, \a\t h:i A');
                                            ?><?= $formattedDate ?>
                                        </span>

                                        <?php if ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0): ?>
                                            <span class="badge badge-primary">Unread</span>
                                        <?php else: ?>
                                            <span class="badge badge-success">Read</span>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="card mt-4 bg-primary text-white">
            <div class="p-3 d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="mb-0">Submit Proforma to QVC UPSI</h5>
                    <p class="text-sm mb-0">
                        Submit your course Proforma for verification to the Quality Verification Center (QVC).</p>
                </div>
                <!-- <div class="col-lg-3 col-sm-6 col-12">
                    <button class="btn bg-white w-100 mb-0 toast-btn text-dark" type="button" data-bs-toggle="modal" data-bs-target="#samc_modal">
                        Submit Courses
                    </button>
                </div> -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <a href="<?= base_url('provider/samc/samc_form_p1') ?>" class="btn bg-white w-100 mb-0 toast-btn text-dark" type="button">
                        New Courses
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <!-- Card header -->
            <!-- Card Header and Controls on the Same Row -->
            <div class="card-header d-flex align-items-center justify-content-between" style="padding: 10px 20px;">
                <!-- Header Content -->
                <div>
                    <h5 class="mb-0">My SAMC</h5>
                    <p class="text-sm mb-0">
                        List of Submitted SAMC
                    </p>
                </div>

                <!-- Table Controls -->
                <div class="table-controls d-flex align-items-center" style="gap: 10px;">
                    <!-- Entries per page selector -->
                    <div id="entries-per-page">
                        <!-- This is where the entries per page selector will be added by Simple DataTables -->
                    </div>

                    <!-- Filter Buttons -->
                    <div id="status-buttons" style="display: flex; gap: 5px;">
                        <button class="filter-btn btn mb-0 p-2" style="background-color: #ffc107; color: white;" data-filter="Awaiting Assignment">
                            Awaiting Assignment
                        </button>
                        <button class="filter-btn btn mb-0 p-2" style="background-color: #17a2b8; color: white;" data-filter="Review In Progress">
                            Review In Progress
                        </button>
                        <button class="filter-btn btn mb-0 p-2" style="background-color: #28a745; color: white;" data-filter="Reviewed">
                            Reviewed
                        </button>
                        <button class="filter-btn btn mb-0 p-2" style="background-color: #20c997; color: white;" data-filter="Pass">
                            Pass
                        </button>
                        <button class="filter-btn btn mb-0 p-2" style="background-color: #fd7e14; color: white;" data-filter="Conditional Pass">
                            Conditional Pass
                        </button>
                        <button class="filter-btn btn mb-0 p-2" style="background-color: #dc3545; color: white;" data-filter="Appeal">
                            Appeal
                        </button>
                        <button class="filter-btn btn mb-0 p-2" style="background-color: #343a40; color: white;" data-filter="">
                            All
                        </button>
                        <button id="export-btn" class="filter-btn btn mb-0 p-2">Export to Excel</button>
                    </div>

                    <!-- Search input -->
                    <div id="datatable-search_filter" style="margin-left: 10px;">
                        <!-- This is where the search input will be added by Simple DataTables -->
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-flush p-1" id="datatable-search">
                    <thead class="thead-light">
                        <tr>
                            <th style="width:20px;">No.</th>
                            <th>Course Name</th>
                            <th>Field</th>
                            <th style="width:20px;">MQF Level</th>
                            <!-- <th style="width:100px;">Proforma</th> -->
                            <!-- <th style="width:100px;">Payment Proof</th> -->
                            <th style="width:90px;">Status</th>
                            <th style="width:100px;">Important Date</th>
                            <th style="width:100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1;
                        foreach ($pvd_samc as $samc): ?>
                            <tr>
                                <td class="text-sm font-weight-normal"><?= $counter++; ?></td>
                                <td class="text-sm font-weight-normal"><?= $samc->samc_course_name ?></td>
                                <td class="text-sm font-weight-normal"><?= $samc->ef_desc ?></td>
                                <td class="text-sm font-weight-normal"><?= $samc->samc_mqf_level ?></td>
                                <!-- <td class="text-sm font-weight-normal">
                                    <?php if (!empty($samc->samc_proforma)): ?>
                                        <a href="<?= base_url($samc->samc_proforma) ?>" class="btn badge-info p-2 m-0" target="_blank">
                                            <i class="fas fa-file-pdf"></i> Proforma
                                        </a>
                                    <?php endif; ?>
                                </td> -->
                                <!-- <td class="text-sm font-weight-normal">
                                    <?php if (!empty($samc->samc_payment_proof)): ?>
                                        <a href="<?= base_url($samc->samc_payment_proof) ?>" class="btn badge-info p-2 m-0" target="_blank">
                                            <i class="fas fa-file-pdf"></i> Payment
                                        </a>
                                    <?php endif; ?>
                                </td> -->
                                <td class="text-sm font-weight-normal"><?= get_samc_pvd_status_badge($samc->samc_status); ?></td>
                                <td class="text-sm font-weight-normal">
                                    <?php if (!empty($samc->samc_submit_date)): ?>
                                        <span class="badge badge-primary">Submit Date: <?= date('d/m/Y', strtotime($samc->samc_submit_date)) ?></span>
                                    <?php endif; ?>

                                    <?php if (!empty($samc->samc_start_date)): ?>
                                        <span class="badge badge-secondary">Start Date: <?= $samc->samc_start_date ?></span>
                                    <?php endif; ?>

                                    <?php if (!empty($samc->samc_expired_date)): ?>
                                        <span class="badge badge-info">Expired Date: <?= $samc->samc_expired_date ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-sm font-weight-normal">
                                    <div class="btn-group">
                                        <a href="<?= base_url('provider/getSamcData/' . $samc->samc_id) ?>"
                                            class="btn btn-primary p-2 mb-0"
                                            data-bs-toggle="tooltip"
                                            title="View SAMC Details"
                                            style="width: 35px; height: 35px;">
                                            <i class="fas fa-info-circle" style="font-size: 16px;"></i>
                                        </a>
                                        <?php if ($samc->samc_status == 'Draft' || $samc->samc_status == 'Returned'): ?>
                                            <!-- <button class="btn btn-warning p-1 m-0 edit-btn"
                                                style="width: 35px; height: 35px;"
                                                data-id="<?= $samc->samc_id ?>"
                                                data-bs-toggle="modal">
                                                <i class="fas fa-edit" style="font-size: 16px;"></i>
                                            </button> -->
                                            <a href="<?= base_url('provider/samc/edit_samc_form/') . $samc->samc_id ?>" class="btn btn-warning p-2 m-0"><i class="fas fa-edit" style="font-size: 16px;"></i></a>
                                        <?php endif; ?>


                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Submit ProForma Modal -->
<div class="modal fade" id="samc_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="courseForm" enctype="multipart/form-data" method="POST">
                <?= csrf_field() ?>

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Submit Proforma to QVC</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <!-- Course Name -->
                        <div class="col-md-8">
                            <label for="courseName" class="form-label">Course Name</label>
                            <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Enter course name" required>
                        </div>
                        <!-- MQF Level -->
                        <div class="col-md-4">
                            <label for="mqfLevel" class="form-label">MQF Level</label>
                            <select class="form-select" id="mqfLevel" name="mqfLevel" required>
                                <option value="" disabled selected>Select the MQF level</option>
                                <option value="1">Level 1</option>
                                <option value="2">Level 2</option>
                                <option value="3">Level 3</option>
                                <option value="4">Level 4</option>
                                <option value="5">Level 5</option>
                                <option value="5">Level 6</option>
                                <option value="5">Level 7</option>
                                <option value="5">Level 8</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="courseField" class="form-label">Field of Study</label>
                        <select class="form-select" name="courseField" id="courseField" required>
                            <option value="" disabled selected>Select a field of study</option>
                            <!-- Dynamic expertise options should be populated here -->
                            <?php foreach ($samc_field as $expertise_field): ?>
                                <option value="<?= $expertise_field->aef_ef_id ?>"><?= $expertise_field->ef_desc ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="fileUpload" class="form-label">Upload Pro-Forma (PDF)</label>
                        <input type="file" class="form-control" name="proforma" id="proforma" accept=".pdf" required>
                        <small class="form-text text-muted">Only PDF files, max size 50MB.</small>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-dark font-weight-bold">Payment Instructions</h6>
                        <p class="text-sm mb-3">
                            Please make the payment through the link below and upload the proof of payment after completing the transaction:
                        </p>
                        <a href="https://epayment.upsi.edu.my/shop/event/MjAyNUVQNjMzNzM3"
                            class="btn btn-primary mb-0"
                            target="_blank">
                            Make Payment
                        </a>
                    </div>

                    <div class="mb-3">
                        <label for="fileUpload" class="form-label">Upload Proof of Payment</label>
                        <input type="file" class="form-control" name="proofOfPayment" id="proofOfPayment" accept=".pdf">
                        <small class="form-text text-muted">Please upload a PDF file (maximum size: 50MB).</small>
                    </div>

                    <li class="list-group-item border-0 d-flex flex-column p-4 mb-2 bg-gray-100 border-radius-lg">
                        <h6 class="text-dark font-weight-bold mb-2">Terms and Conditions for Course Submission</h6>
                        <ul class="ps-3 mb-0 text-sm text-secondary">
                            <li>Each course submitted must not be submitted at the same time to another QVC.</li>
                            <li>Approved documents will remain active for a duration of 3 years.</li>
                            <li>Users must renew the document if they wish to continue using it beyond the 3-year period.</li>
                        </ul>
                    </li>

                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-sm bg-gradient-secondary mb-0"
                        data-bs-dismiss="modal"
                        data-bs-toggle="tooltip"
                        title="Cancel">
                        <i class="fas fa-times-circle" style="font-size: 1rem !important;"></i>&nbsp; Cancel
                    </button>
                    <!-- Save Draft Button  -->
                    <button
                        type="button"
                        class="btn btn-sm bg-gradient-secondary mb-0"
                        id="saveDraftButton"
                        data-bs-toggle="tooltip"
                        title="Save SAMC as Draft and Submit later.">
                        <i class="fas fa-save" style="font-size: 1rem !important;"></i>&nbsp; Save Draft
                    </button>
                    <!-- Submit Form -->
                    <button
                        type="button"
                        class="btn btn-sm bg-gradient-primary mb-0"
                        id="submitButton"
                        data-bs-toggle="tooltip"
                        title="Submit SAMC to QVC UPSI">
                        <i class="fas fa-paper-plane" style="font-size: 1rem !important;"></i>&nbsp; Submit
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<!--SAMC Edit Modal -->
<div class="modal fade" id="samc_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="editCourseForm" enctype="multipart/form-data" method="POST">
                <?= csrf_field() ?>
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Submit Proforma to QVC</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="samcId" name="samcId" value="" hidden>

                    <div class="row mb-3">
                        <!-- Course Name -->
                        <div class="col-md-8">
                            <label for="courseName" class="form-label">Course Name</label>
                            <input type="text" class="form-control" id="courseNameEdit" name="courseNameEdit" placeholder="Enter course name" required>
                        </div>
                        <!-- MQF Level -->
                        <div class="col-md-4">
                            <label for="mqfLevel" class="form-label">MQF Level</label>
                            <select class="form-select" id="mqfLevelEdit" name="mqfLevelEdit" required>
                                <option value="" disabled selected>Select the MQF level</option>
                                <option value="1">Level 1</option>
                                <option value="2">Level 2</option>
                                <option value="3">Level 3</option>
                                <option value="4">Level 4</option>
                                <option value="5">Level 5</option>
                                <option value="5">Level 6</option>
                                <option value="5">Level 7</option>
                                <option value="5">Level 8</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="courseField" class="form-label">Field of Study</label>
                        <select class="form-select" name="courseFieldEdit" id="courseFieldEdit" required>
                            <option value="" disabled selected>Select a field of study</option>
                            <!-- Dynamic expertise options should be populated here -->
                            <?php foreach ($samc_field as $expertise_field): ?>
                                <option value="<?= $expertise_field->aef_ef_id ?>"><?= $expertise_field->ef_desc ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fileUpload" class="form-label">Upload Pro-Forma (PDF)</label>

                        <!-- File Input (Hidden if File Exists) -->
                        <input type="file" class="form-control" name="proformaEdit" id="proformaEdit" accept=".pdf" required>

                        <!-- Show Only If File Exists -->
                        <div id="fileActions" style="display: none; margin-top: 10px;">
                            <a id="viewFileBtn" href="#" target="_blank" class="btn btn-info btn-sm">
                                <i class="fas fa-file-pdf" style="font-size: 1rem !important;"></i>&nbsp; View File
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeProformaFile()">
                                <i class="fas fa-trash" style="font-size: 1rem !important;"></i>&nbsp; Remove File
                            </button>
                        </div>

                        <small class="form-text text-muted">Only PDF files, max size 50MB.</small>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-dark font-weight-bold">Payment Instructions</h6>
                        <p class="text-sm mb-3">
                            Please make the payment through the link below and upload the proof of payment after completing the transaction:
                        </p>
                        <a href="https://epayment.upsi.edu.my/shop/event/MjAyNUVQNjMzNzM3"
                            class="btn btn-primary mb-0"
                            target="_blank">
                            Make Payment
                        </a>
                    </div>

                    <div class="mb-3">
                        <label for="fileUpload" class="form-label">Upload Proof of Payment</label>
                        <!-- File Input (Hidden if File Exists) -->
                        <input type="file" class="form-control" name="proofOfPaymentEdit" id="proofOfPaymentEdit" accept=".pdf" required>

                        <!-- Show Only If File Exists -->
                        <div id="popFileActions" style="display: none; margin-top: 10px;">
                            <a id="viewPopFileBtn" href="#" target="_blank" class="btn btn-info btn-sm">
                                <i class="fas fa-file-pdf" style="font-size: 1rem !important;"></i>&nbsp; View File
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="removePopFile()">
                                <i class="fas fa-trash" style="font-size: 1rem !important;"></i>&nbsp; Remove File
                            </button>
                        </div>
                        <small class="form-text text-muted">Please upload a PDF file (maximum size: 50MB).</small>
                    </div>

                    <li class="list-group-item border-0 d-flex flex-column p-4 mb-2 bg-gray-100 border-radius-lg">
                        <h6 class="text-dark font-weight-bold mb-2">Terms and Conditions for Course Submission</h6>
                        <ul class="ps-3 mb-0 text-sm text-secondary">
                            <li>Each course submitted must not be submitted at the same time to another QVC.</li>
                            <li>Approved documents will remain active for a duration of 3 years.</li>
                            <li>Users must renew the document if they wish to continue using it beyond the 3-year period.</li>
                        </ul>
                    </li>

                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-sm bg-gradient-secondary mb-0"
                        data-bs-dismiss="modal"
                        data-bs-toggle="tooltip"
                        title="Cancel">
                        <i class="fas fa-times-circle" style="font-size: 1rem !important;"></i>&nbsp; Cancel
                    </button>

                    <!-- Save Draft Button  -->
                    <button
                        type="button"
                        class="btn btn-sm bg-gradient-secondary mb-0"
                        id="updateDraftButton"
                        data-bs-toggle="tooltip"
                        title="Save SAMC as Draft and Submit later.">
                        <i class="fas fa-save" style="font-size: 1rem !important;"></i>&nbsp; Save Draft
                    </button>

                    <!-- Test button -->
                    <!-- <button type="submit">Test</button> -->

                    <!-- Update & Submit Button -->
                    <button
                        type="button"
                        class="btn btn-sm bg-gradient-primary mb-0"
                        id="submitDraftButton"
                        data-bs-toggle="tooltip"
                        title="Submit SAMC to QVC UPSI">
                        <i class="fas fa-paper-plane" style="font-size: 1rem !important;"></i>&nbsp; Submit
                    </button>


                </div>
            </form>

        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Export table data script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
    // Export Excel
    document.getElementById('export-btn').addEventListener('click', function() {
        // Get table element
        const table = document.getElementById('datatable-search');

        // Convert HTML table to SheetJS workbook
        const workbook = XLSX.utils.table_to_book(table, {
            sheet: "Sheet 1"
        });

        // Export workbook to Excel file
        XLSX.writeFile(workbook, "table_data.xlsx");
    });
</script>

<!-- Initialize / Filter DataTable -->
<script>
    // Initialize Simple DataTable
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true,
    });

    // Move the generated search input and entries per page selector into the correct divs
    const entriesPerPage = document.querySelector('.dataTables_length');
    const searchInput = document.querySelector('.dataTables_filter');

    // Move the controls
    if (entriesPerPage) {
        document.getElementById('entries-per-page').appendChild(entriesPerPage);
    }

    if (searchInput) {
        document.getElementById('datatable-search_filter').appendChild(searchInput);
    }

    // Add click event to filter buttons
    document.querySelectorAll(".filter-btn").forEach(button => {
        button.addEventListener("click", () => {
            const filterValue = button.getAttribute("data-filter");

            // Reset all rows before applying a filter
            const rows = document.querySelectorAll("#datatable-search tbody tr");
            rows.forEach(row => {
                if (filterValue) {
                    const rowText = row.textContent || row.innerText;
                    row.style.display = rowText.includes(filterValue) ? '' : 'none';
                } else {
                    row.style.display = ''; // Show all rows when "All" is clicked
                }
            });
        });
    });
</script>

<!-- Notification Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('.notification-link');
        const unreadBadge = document.querySelector('.btn .badge.bg-primary'); // Select the unread notifications badge

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const notificationId = this.getAttribute('data-id');
                const notificationContainer = this.closest('.numbers'); // Find the parent container
                const badge = notificationContainer.querySelector('.badge'); // Find the badge inside the parent container

                // Send AJAX request to mark the notification as read
                fetch('<?= base_url("qvcAdmin/notifications/markAsRead") ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded', // Ensure proper encoding
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: new URLSearchParams({
                            id: notificationId,
                            csrf_test_name: document.querySelector("input[name='csrf_test_name']").value
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update the badge text and style to show "Read"
                            if (badge) {
                                badge.classList.remove('badge-primary'); // Remove 'Unread' class
                                badge.classList.add('badge-success'); // Add 'Read' class
                                badge.textContent = 'Read'; // Update text to "Read"
                            }

                            // Deduct one from the unread notifications count
                            if (unreadBadge) {
                                let currentCount = parseInt(unreadBadge.textContent, 10);
                                if (currentCount > 0) {
                                    unreadBadge.textContent = currentCount - 1;
                                }
                            }

                            // 🔄 **Update CSRF Token in All Forms**
                            if (data.csrf_token) {
                                document.querySelectorAll("input[name='csrf_test_name']").forEach(input => {
                                    input.value = data.csrf_token;
                                });
                            }

                            // Show SweetAlert message
                            Swal.fire({
                                title: 'Notification Read',
                                text: 'The notification has been marked as read.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: 'Failed to mark notification as read.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while marking the notification as read.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    });
            });
        });
    });
</script>

<!-- select 2 initialize -->
<script>
    jQuery(document).ready(function($) {
        // Initialize Select2 on the expertise select input inside a modal
        $('#courseField').select2({
            placeholder: "Select Expertise",
            dropdownParent: $('#samc_modal') // Append dropdown to the modal
        });
    });
</script>

<!-- New Form Modal -->
<script>
    // Submit Form
    document.getElementById('submitButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default action

        // Require proof of payment
        toggleProofOfPaymentRequirement(true);

        if (validateForm()) {
            var formData = new FormData(document.getElementById('courseForm'));
            formData.append('action', 'submit');

            // Submit data using AJAX
            submitForm(formData);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill in all required fields, including Proof of Payment!',
            });
        }
    });

    // Save Draft
    document.getElementById('saveDraftButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default action

        // Allow proof of payment to be empty
        toggleProofOfPaymentRequirement(false);

        if (validateForm()) {
            var formData = new FormData(document.getElementById('courseForm'));
            formData.append('action', 'save_draft');

            // Submit data using AJAX
            saveDraftForm(formData);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill in all required fields!',
            });
        }
    });

    // Toggle Proof of Payment Requirement
    function toggleProofOfPaymentRequirement(required) {
        var proofOfPayment = document.getElementById('proofOfPayment');
        if (required) {
            proofOfPayment.setAttribute('required', 'required');
        } else {
            proofOfPayment.removeAttribute('required');
        }
    }

    // Form Validation
    function validateForm() {
        var isValid = true;

        // Check all required fields
        document.querySelectorAll("#courseForm [required]").forEach(function(input) {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add("is-invalid"); // Highlight invalid inputs
            } else {
                input.classList.remove("is-invalid");
            }
        });

        return isValid;
    }

    // AJAX Form Submission
    function submitForm(formData) {
        // Append CSRF token to FormData
        formData.append("<?= csrf_token() ?>", "<?= csrf_hash() ?>");

        fetch('<?= site_url('provider/submitSamc') ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Parse JSON response
            .then(data => {
                if (data.status === 'success') {
                    if (data.csrf_token) {
                        // Update CSRF token in all forms
                        document.querySelectorAll(".csrf-token").forEach(input => {
                            input.value = data.csrf_token;
                        });
                    }

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message || 'Operation successful!',
                    }).then(() => {
                        // Refresh the page after the success message
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'An error occurred.',
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'An error occurred. Please try again.',
                });
            });
    }

    // AJAX Form Draft Submission
    function saveDraftForm(formData) {
        fetch('<?= site_url('provider/saveSamcDraft') ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Parse JSON response
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message || 'Operation successful!',
                    }).then(() => {
                        // Refresh the page after the success message
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'An error occurred.',
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'An error occurred. Please try again.',
                });
            });
    }
</script>

<!-- Update form modal -->
<script>
    var samcId = null;

    jQuery(document).ready(function($) {
        // When the edit button is clicked
        var baseURL = "<?= base_url(); ?>"; // Define base URL from PHP
        $(document).on('click', '.edit-btn', function() {
            samcId = $(this).data('id'); // Get the ID from the button data
            console.log('Editing SAMC with ID:', samcId); // Debugging log

            // Make AJAX request to fetch the data based on the ID
            $.ajax({
                url: 'fetch-samc-data/' + samcId, // Define this route in your controller
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log('Data received:', data); // Debugging log
                    // If the data is successfully fetched, pre-fill the modal form
                    if (data.status === 'success') {
                        $('#samcId').val(data.samc.samc_id);
                        $('#courseNameEdit').val(data.samc.samc_course_name);
                        $('#mqfLevelEdit').val(data.samc.samc_mqf_level);
                        // Set the selected value for the select field
                        $('#courseFieldEdit').val(data.samc.samc_field).trigger('change');


                        if (data.samc.samc_proforma) {
                            $('#fileActions').show();
                            $('#viewFileBtn').attr('href', baseURL + data.samc.samc_proforma);
                            $('#proformaEdit').hide().prop('required', false);
                        } else {
                            $('#fileActions').hide();
                            $('#proformaEdit').show().attr('required', 'required');
                            $('#proformaEdit').show();
                        }

                        if (data.samc.samc_payment_proof) {
                            $('#popFileActions').show();
                            $('#viewPopFileBtn').attr('href', baseURL + data.samc.samc_payment_proof);
                            $('#proofOfPaymentEdit').hide().prop('required', false);
                        } else {
                            $('#popFileActions').hide();
                            $('#proofOfPaymentEdit').attr('required', 'required');
                            $('#proofOfPaymentEdit').show();
                        }
                        // Show the modal
                        $('#samc_edit_modal').modal('show');
                    } else {
                        // Handle error case
                        Swal.fire('Error', data.message, 'error');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX error
                    console.log('AJAX error:', error); // Debugging log
                    Swal.fire('Error', 'An error occurred while fetching the data.', 'error');
                }
            });
        });
    });

    // Remove proforma attachment
    function removeProformaFile() {
        Swal.fire({
            title: "Are you sure?",
            text: "This action will permanently delete the uploaded file.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "<?= base_url('provider/delete_samc_proforma') ?>", // Update this to your actual delete route
                    type: "POST",
                    data: {
                        samcId: samcId,
                        csrf_test_name: document.querySelector("input[name='csrf_test_name']").value
                    }, // Get the SAMC ID from button
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {
                            if (response.csrf_token) {
                                // 🔄 Update all CSRF token inputs in the form
                                document.querySelectorAll("input[name='csrf_test_name']").forEach(input => {
                                    input.value = response.csrf_token;
                                });

                            }

                            Swal.fire("Deleted!", "The file has been deleted.", "success");

                            // Hide file actions and show file input
                            $("#fileActions").hide();
                            $("#proformaEdit").show().prop("required", true);
                        } else {
                            Swal.fire("Error!", response.message, "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire("Error!", "An error occurred while deleting the file.", "error");
                    }
                });
            }
        });
    }

    // Remove proforma attachment
    function removePopFile() {
        Swal.fire({
            title: "Are you sure?",
            text: "This action will permanently delete the uploaded file.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                console.log("samcId sent:", samcId);

                $.ajax({
                    url: "<?= base_url('provider/delete_samc_proofofpayment') ?>", // Update this to your actual delete route
                    type: "POST",
                    data: {
                        samcId: samcId,
                        csrf_test_name: document.querySelector("input[name='csrf_test_name']").value
                    }, // Get the SAMC ID from button
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {

                            if (response.csrf_token) {
                                // 🔄 Update all CSRF token inputs in the form
                                document.querySelectorAll("input[name='csrf_test_name']").forEach(input => {
                                    input.value = response.csrf_token;
                                });
                            }

                            Swal.fire("Deleted!", "The file has been deleted.", "success");

                            // Hide file actions and show file input
                            $("#popFileActions").hide();
                            $("#proofOfPaymentEdit").show().prop("required", true);
                        } else {
                            Swal.fire("Error!", response.message, "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire("Error!", "An error occurred while deleting the file.", "error");
                    }
                });
            }
        });
    }

    // Save Draft
    document.getElementById('updateDraftButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default action

        var formData = new FormData(document.getElementById('editCourseForm'));
        formData.append('action', 'draft');

        // Submit data using AJAX
        submitDraftUpdateForm(formData);
    });

    // Submit SAMC Draft
    document.getElementById('submitDraftButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default action

        if (validateDraftForm()) {
            var formData = new FormData(document.getElementById('editCourseForm'));
            formData.append('action', 'submit');

            // Submit data using AJAX
            submitDraftUpdateForm(formData);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill in all required fields, including Proof of Payment!',
            });
        }
    });

    // Form Validation
    function validateDraftForm() {
        var isValid = true;

        // Check all required fields
        document.querySelectorAll("#editCourseForm [required]").forEach(function(input) {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add("is-invalid"); // Highlight invalid inputs
            } else {
                input.classList.remove("is-invalid");
            }
        });

        return isValid;
    }
    // AJAX Form Draft Submission
    function submitDraftUpdateForm(formData) {
        // Send the AJAX request to update the SAMC draft
        fetch('<?= site_url('provider/updateSamcDraft') ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Parse JSON response
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message || 'Operation successful!',
                    }).then(() => {
                        // Refresh the page after the success message
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'An error occurred.',
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'An error occurred. Please try again.',
                });
            });
    }
</script>

<!-- Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog">
        <div class="modal-content">
            <form id="editProfileForm">
                <?= csrf_field() ?>
                <div class="bg-primary modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control bg-light" id="name" name="pvd_name" value="<?= $provider_info->pvd_name ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="phone" name="pvd_phone" value="<?= $provider_info->pvd_phone ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="pvd_email" value="<?= $provider_info->pvd_email ?>">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Location</label>
                        <input type="text" class="form-control" id="address" name="pvd_location" value="<?= $provider_info->pvd_address ?>">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Date of Establishment</label>
                        <input type="text" class="form-control bg-light" id="doe" name="doe" value="<?= date('d/m/Y', strtotime($provider_info->pvd_doe)) ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">SSM Number</label>
                        <input type="text" class="form-control bg-light" id="ssm_number" name="ssm_number" value="<?= $provider_info->pvd_ssm_number ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">SSM Cert</label>
                        <br>
                        <a href="<?= base_url($provider_info->pvd_ssm_cert) ?>" class="btn btn-primary btn-sm mt-2" target="_blank">
                            <i class="fas fa-file-pdf me-2" style="font-size: 1rem;"></i> View SSM Certificate
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary mb-0" data-bs-dismiss="modal"><i class="fas fa-times" style="font-size: 1rem !important;"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-sm btn-primary mb-0"><i class="fas fa-save" style="font-size: 1rem !important;"></i>&nbsp; Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Profile Script -->
<script>
    function showEditModal() {
        const editProfileModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
        editProfileModal.show();
    }

    document.getElementById('editProfileForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        formData.append("<?= csrf_token() ?>", "<?= csrf_hash() ?>");

        fetch("<?= base_url('provider/update_profile') ?>", {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Failed to update profile.',
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred.',
                });
            });
    });
</script>