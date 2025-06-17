<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- import form styling -->
<link rel="stylesheet" href="<?= base_url('assets/css/custom_form.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/custom_form_p2.css'); ?>">

<style>
    /* Add this to your custom_form.css or create a new CSS file */

    /* Modern Corporate Table Styles */
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        font-family: 'Roboto', sans-serif;
        border-radius: 8px;
        overflow: hidden;
    }

    .tg th,
    .tg td {
        border: 1px solid rgb(0, 0, 0);
        padding: 12px 16px;
        overflow: hidden;
        word-break: normal;
    }

    .tg .tg-kfkg {
        /* background-color: #344767; */
        color: #ffffff;
        font-weight: bold;
        text-align: left;
        padding: 16px;
        font-size: 1.1em;
    }

    .tg .tg-c3ow {
        background-color: #f8f9fa;
        color: #344767;
        font-weight: 500;
        text-align: center;
        border-bottom: 1px solidrgb(0, 0, 0);
    }

    .tg .tg-0pky,
    .tg .tg-0lax {
        padding: 12px 16px;
        text-align: left;
        color: #344767;
        transition: background-color 0.3s;
    }

    .tg tr:nth-child(even) .tg-0pky,
    .tg tr:nth-child(even) .tg-0lax {
        background-color: #f8f9fa;
    }

    .tg tr:hover .tg-0pky,
    .tg tr:hover .tg-0lax {
        background-color: #f1f1f1;
    }

    /* Header styling */
    .tg thead tr {
        border-bottom: 2px solid #344767;
    }

    .tg td:first-child,
    .tg th:first-child {
        width: 300px;
        /* Adjust the width as needed */
        white-space: nowrap;
        /* Prevent text wrapping */
    }

    /* Error row styling */
    #errorMessageRow td {
        padding: 12px;
        background-color: #fff1f1;
        border: 1px solid #ffcdd2;
    }

    /* Total row styling */
    #totalLearningTimeRow td,
    #totalLearningTimeRow td b {
        background-color: #34476700;
        color: white;
        font-weight: bold;
    }

    /* Override for error state */
    #totalLearningTimeRow.error-state td {
        background-color: #d32f2f;
        color: white;
    }

    /* button */

    .js-btn-next {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 12px 28px;
        font-weight: 500;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .js-btn-next:hover {
        background-color: #2980b9;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(29, 78, 216, 0.2);
    }

    .js-btn-draft {
        background-color: #6c757d;
        /* Corporate gray */
        color: white;
        border: none;
        padding: 12px 28px;
        font-weight: 500;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .js-btn-draft:hover {
        background-color: #5a6268;
        /* Slightly darker gray */
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .js-btn-print {
        background-color: #28a745;
        /* Corporate green */
        color: white;
        border: none;
        padding: 12px 28px;
        font-weight: 500;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .js-btn-print:hover {
        background-color: #218838;
        /* Slightly darker green */
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }
</style>
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="section-title">SAMC Registration Form</h4>
        </div>
    </div>
    <div class="row  mb-3">
        <div class="col-12">
            <div class="multisteps-form">
                <div class="row">
                    <div class="col-12">
                        <div class="multisteps-form__progress">
                            <button class="multisteps-form__progress-btn js-completed" type="button">
                                <div class="step-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="step-text">Description</div>
                            </button>
                            <button class="multisteps-form__progress-btn js-completed" type="button">
                                <div class="step-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="step-text">Course Outline</div>
                            </button>
                            <button class="multisteps-form__progress-btn js-completed" type="button">
                                <div class="step-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="step-text">Continuous Assessment</div>
                            </button>
                            <button class="multisteps-form__progress-btn js-completed" type="button">
                                <div class="step-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="step-text">Final Assessment</div>
                            </button>
                            <button class="multisteps-form__progress-btn js-active" type="button">
                                <div class="step-icon">
                                    <i class="fas fa-flag-checkered"></i>
                                </div>
                                <div class="step-text">Confirmation</div>
                            </button>
                        </div>
                    </div>
                </div>
                <!--form panels-->
                <div class="row">
                    <div class="col-12 col-lg-12 m-auto">
                        <div class="multisteps-form__form mb-8">
                            <!--single form panel-->
                            <div class="card p-3 border-radius-xl js-active" data-animation="FadeIn">
                                <h5 class="font-weight-bolder">SAMC Validation</h5>
                                <div class="multisteps-form__content">
                                    <form id="step5_form" method="post">
                                        <?= csrf_field() ?>
                                        <!-- Replace the <center>...</center> block containing your table with this -->
                                        <div class="table-responsive">
                                            <table class="tg">
                                                <thead>
                                                    <tr>
                                                        <th class="tg-kfkg bg-gradient-info" colspan="8"><i class="fas fa-file-alt me-2"></i>SAMC Course Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="tg-0pky"><b>Name of the SAMC Provider</b></td>
                                                        <td class="tg-0pky" colspan="7"><?= $pvd_name ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-0pky"><b>Name of the SAMC</b></td>
                                                        <td class="tg-0pky" colspan="7"><?= $samc_data->samc_course_name ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-0pky"><b>MQF Level/Levels</b></td>
                                                        <td class="tg-0pky" colspan="7"><?= get_mqf_level($samc_data->samc_mqf_level) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-0pky"><b>Duration (In Hours)</b></td>
                                                        <td class="tg-0pky" colspan="7"><?= $samc_data->samc_duration_hours ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-0pky"><b>Classification of Knowledge, Skills or Attitude</b></td>
                                                        <td class="tg-0pky" colspan="7"><?= $samc_field ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-0pky"><b>Language of Instruction</b></td>
                                                        <td class="tg-0pky" colspan="7"><?= $samc_data->samc_language ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-0pky"><b>Method of Instruction and Learning</b></td>
                                                        <td class="tg-0pky" colspan="7"><?= nl2br(htmlspecialchars($samc_data->samc_teaching_methods)) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-0pky"><b>Academic Credits</b></td>
                                                        <td class="tg-0pky" colspan="7"><?= $samc_data->samc_academic_credits ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-0pky"><b>Prior Knowledge / Experience</b></td>
                                                        <td class="tg-0pky" colspan="7"><?= nl2br(htmlspecialchars($samc_data->samc_prior_knowledge)) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="tg-kfkg bg-gradient-info" colspan="8"><i class="fas fa-list-ul me-2"></i>SAMC Course Outline</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-0pky"><b>SAMC Synopsis</b></td>
                                                        <td class="tg-0pky" colspan="7"><?= nl2br(htmlspecialchars($samc_data->samc_synopsis)) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-0pky"><b>SAMC Intended Learning Outcomes</b></td>
                                                        <td class="tg-0pky" colspan="7"><?= nl2br(htmlspecialchars($samc_data->samc_intended_learning_outcomes)) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-0pky"><b>Instructor/s</b></td>
                                                        <td class="tg-0pky" colspan="7"><?= nl2br(htmlspecialchars($samc_data->samc_instructor)) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-0pky" rowspan="3"><b>Course Content Outline</b></td>
                                                        <td class="tg-c3ow" colspan="7"><b>Instructional and Learning Activities</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-c3ow" colspan="4"><b>Guided Instruction (F2F)</b></td>
                                                        <td class="tg-c3ow" rowspan="2"><b>Guided Instruction (NF2F)</b></td>
                                                        <td class="tg-c3ow" rowspan="2"><b>Independent Learning</b></td>
                                                        <td class="tg-c3ow" rowspan="2"><b>Total LT</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-c3ow"><b>Presentation</b></td>
                                                        <td class="tg-c3ow"><b>Tutorial</b></td>
                                                        <td class="tg-c3ow"><b>Practical</b></td>
                                                        <td class="tg-c3ow"><b>Others</b></td>
                                                    </tr>
                                                    <?php
                                                    $total_cco_sum = 0;
                                                    $total_ca_sum = 0;
                                                    $total_fa_sum = 0;
                                                    ?>
                                                    <?php foreach ($samc_cco_data as $cco): ?>
                                                        <tr>
                                                            <td class="tg-0lax"><?= nl2br(htmlspecialchars($cco->cco_desc)) ?></td>
                                                            <td class="tg-0lax"><?= $cco->cco_presentation ?></td>
                                                            <td class="tg-0lax"><?= $cco->cco_tutorial ?></td>
                                                            <td class="tg-0lax"><?= $cco->cco_practical ?></td>
                                                            <td class="tg-0lax"><?= $cco->cco_others  ?></td>
                                                            <td class="tg-0lax"><?= $cco->cco_instruction_learning_hour ?></td>
                                                            <td class="tg-0lax"><?= $cco->cco_independent_learning_hour ?></td>
                                                            <td class="tg-0lax"><?= $total_cco = $cco->cco_independent_learning_hour + $cco->cco_instruction_learning_hour + $cco->cco_others + $cco->cco_practical + $cco->cco_presentation + $cco->cco_tutorial ?></td>
                                                        </tr>
                                                        <?php $total_cco_sum += $total_cco; ?>
                                                    <?php endforeach; ?>
                                                    <tr>
                                                        <th class="tg-kfkg bg-gradient-info" colspan="8"><i class="fas fa-clipboard-check me-2"></i>Assessment</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="tg-c3ow" colspan="1"><b>Continuous Assessment</b></td>
                                                        <td class="tg-c3ow" colspan="2"><b>Percentage</b></td>
                                                        <td class="tg-c3ow" colspan="2"><b>Guided Learning</b></td>
                                                        <td class="tg-c3ow" colspan="2"><b>Independent Learning</b></td>
                                                        <td class="tg-c3ow" colspan="1"><b>Total LT</b></td>
                                                    </tr>
                                                    <?php foreach ($samc_continuous_assessment_data as $ca): ?>
                                                        <tr>
                                                            <td class="tg-0lax" colspan="1"><?= nl2br(htmlspecialchars($ca->sa_desc)) ?></td>
                                                            <td class="tg-0lax" colspan="2"><?= $ca->sa_percentage ?></td>
                                                            <td class="tg-0lax" colspan="2"><?= $ca->sa_instruction_learning_hour ?></td>
                                                            <td class="tg-0lax" colspan="2"><?= $ca->sa_independent_learning_hour ?></td>
                                                            <td class="tg-0lax" colspan="1"><?= $total_ca = $ca->sa_independent_learning_hour + $ca->sa_instruction_learning_hour ?></td>
                                                        </tr>
                                                        <?php $total_ca_sum += $total_ca; ?>
                                                    <?php endforeach; ?>
                                                    <tr>
                                                        <td class="tg-c3ow" colspan="1"><b>Final Assessment</b></td>
                                                        <td class="tg-c3ow" colspan="2"><b>Percentage</b></td>
                                                        <td class="tg-c3ow" colspan="2"><b>Guided Learning</b></td>
                                                        <td class="tg-c3ow" colspan="2"><b>Independent Learning</b></td>
                                                        <td class="tg-c3ow" colspan="1"><b>Total LT</b></td>
                                                    </tr>
                                                    <?php if ($samc_final_assessment_data): ?>
                                                        <?php foreach ($samc_final_assessment_data as $fa): ?>
                                                            <tr>
                                                                <td class="tg-0lax" colspan="1"><?= nl2br(htmlspecialchars($fa->sa_desc)) ?></td>
                                                                <td class="tg-0lax" colspan="2"><?= $fa->sa_percentage ?></td>
                                                                <td class="tg-0lax" colspan="2"><?= $fa->sa_instruction_learning_hour ?></td>
                                                                <td class="tg-0lax" colspan="2"><?= $fa->sa_independent_learning_hour ?></td>
                                                                <td class="tg-0lax" colspan="1"><?= $total_fa = $fa->sa_independent_learning_hour + $fa->sa_instruction_learning_hour ?></td>
                                                            </tr>
                                                            <?php $total_fa_sum += $total_fa; ?>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td class="tg-0lax" colspan="1"></td>
                                                            <td class="tg-0lax" colspan="2"></td>
                                                            <td class="tg-0lax" colspan="2"></td>
                                                            <td class="tg-0lax" colspan="2"></td>
                                                            <td class="tg-0lax" colspan="1"></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <tr id="totalLearningTimeRow" class="bg-gradient-info">
                                                        <td class="tg-c3ow" colspan="7"><b>TOTAL LEARNING TIME (LT)</b></td>
                                                        <td class="tg-c3ow" colspan="1"><?= $total_cco_sum + $total_ca_sum + $total_fa_sum ?></td>
                                                    </tr>

                                                    <!-- Error message row (Initially hidden) -->
                                                    <tr id="errorMessageRow" style="display: none;">
                                                        <td colspan="8"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="button-row">
                                            <div class="d-flex mt-4 col-12 justify-content-between">
                                                <button class="btn js-btn-prev" type="button" title="Previous">
                                                    <i class="fas fa-arrow-left me-2"></i>Previous
                                                </button>
                                                <!-- Draft and Submit Buttons on the Right -->
                                                <div class="d-flex gap-2">
                                                    <a class="btn js-btn-print bg-gradient-success" href="<?= base_url('provider/samc/print_samc') ?>" target="_blank">
                                                        Print PDF
                                                    </a>

                                                    <!-- check payment status -->
                                                    <?php if ($payment_status == true): ?>
                                                        <!-- Resubmit SAMC -->
                                                        <button class="btn js-btn-resubmit bg-gradient-info" id="submitButton" type="button"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Re-submit your SAMC for review.">
                                                            <i class="fas fa-redo me-2"></i>
                                                            <span class="d-none d-sm-inline">Re-submit</span>
                                                        </button>
                                                    <?php else: ?>
                                                        <button class="btn js-btn-draft bg-gradient-secondary" id="draftButton" type="submit"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Saved as draft, edit and submit later.">
                                                            Draft
                                                        </button>
                                                        <button class="btn js-btn-next bg-gradient-info" id="submitButton" type="button"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Proceed to payment or add another samc">
                                                            Proceed
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Step 5 Form Submit -->
<script>
    $(document).ready(function() {

        // Resubmit button click event
        $('.js-btn-resubmit').on('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            let form = $('#step5_form');
            let formData = form.serialize(); // Serialize form data

            Swal.fire({
                title: "Resubmit SAMC",
                text: "No fee charge for resubmition.",
                icon: "warning",
                text: "Do you want to add another proforma or proceed to payment?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Proceed",
                cancelButtonText: "Edit",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    saveData("<?= site_url('provider/samc/resubmit_samc_form') ?>", "<?= site_url('provider/samc/my_samc') ?>");

                    function saveData(saveUrl, redirectUrl) {
                        Swal.fire({
                            title: "Saving",
                            html: "Please wait...",
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        $.ajax({
                            url: saveUrl,
                            type: "PUT",
                            contentType: "application/json",
                            headers: {
                                'X-CSRF-TOKEN': '<?= csrf_hash() ?>' // Include CSRF token
                            },
                            data: JSON.stringify({}), // Empty data since ID is in session
                            success: function(response) {
                                Swal.fire({
                                    title: "Saved!",
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    window.location.href = redirectUrl;
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    title: "Error",
                                    text: xhr.responseJSON?.message || "Something went wrong!",
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            }
                        });
                    }

                } else {
                    // Do nothing
                }



            });
        });

        $('.js-btn-next').on('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            let form = $('#step5_form');
            let formData = form.serialize(); // Serialize form data

            Swal.fire({
                title: "What would you like to do next?",
                text: "Do you want to add another proforma or proceed to payment?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Proceed to Payment",
                cancelButtonText: "Add Another Proforma",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    saveData("<?= site_url('provider/samc/submit_samc_form') ?>", "<?= site_url('provider/payment/checkout') ?>");
                } else {
                    saveData("<?= site_url('provider/samc/submit_samc_form') ?>", "<?= site_url('provider/samc/samc_form_p1') ?>");
                }

                function saveData(saveUrl, redirectUrl) {
                    Swal.fire({
                        title: "Saving",
                        html: "Please wait...",
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    $.ajax({
                        url: saveUrl,
                        type: "PUT",
                        contentType: "application/json",
                        headers: {
                            'X-CSRF-TOKEN': '<?= csrf_hash() ?>' // Include CSRF token
                        },
                        data: JSON.stringify({}), // Empty data since ID is in session
                        success: function(response) {
                            Swal.fire({
                                title: "Saved!",
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href = redirectUrl;
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error",
                                text: xhr.responseJSON?.message || "Something went wrong!",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    });
                }

            });
        });

        $('.js-btn-prev').on('click', function(event) {
            console.log("Prev button clicked");
            event.preventDefault(); // Prevent form submission

            let form = $('#step5_form');
            let formData = form.serialize(); // Serialize form data

            $.ajax({
                url: "<?= base_url('provider/samc/samc_prev_form/5'); ?>",
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            title: "Saving",
                            html: "Please Wait..",
                            timer: 1500,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                                const timer = Swal.getPopup().querySelector("b");
                                timerInterval = setInterval(() => {
                                    timer.textContent = `${Swal.getTimerLeft()}`;
                                }, 100);
                            },
                            willClose: () => {
                                clearInterval(timerInterval);
                            }
                        }).then(() => {
                            window.location.href = response.redirect_url;
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message || 'Something went wrong!',
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred. Please try again.',
                    });
                }
            });
        });

        $('.js-btn-draft').on('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            let form = $('#step5_form');
            let formData = form.serialize(); // Serialize form data

            // Swal.fire({
            //     title: 'Are you sure?',
            //     text: "Please confirm before proceeding.",
            //     icon: 'question',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Yes, continue!'
            // }).then((result) => {
            //     if (result.isConfirmed) {
            $.ajax({
                url: "<?= base_url('provider/samc/save_as_draft_form') ?>",
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = response.redirect_url;
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message || 'Something went wrong!',
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred. Please try again.',
                    });
                }
            });
            //     }
            // });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let totalSum = <?= $total_cco_sum + $total_ca_sum + $total_fa_sum ?>;
        let expectedTotal = <?= $samc_data->samc_academic_credits * 40 ?>;
        let submitButton = document.getElementById("submitButton"); // Submit button
        let totalRow = document.getElementById("totalLearningTimeRow"); // Table row
        let errorMessageRow = document.getElementById("errorMessageRow"); // Error message row

        if (totalSum !== expectedTotal) {
            // Hide submit button
            if (submitButton) {
                submitButton.style.display = "none";
            }

            // Change row background color to red
            if (totalRow) {
                totalRow.style.backgroundColor = "red";
                totalRow.style.color = "white"; // Ensure text is readable
            }

            // Show error message below the row
            if (errorMessageRow) {
                errorMessageRow.innerHTML = `<td colspan="8" style="color: red; text-align: center; font-weight: bold;">
                    Warning: The distribution may be incorrect. Please check your values.
                </td>`;
                errorMessageRow.style.display = "table-row";
            }
        }
    });
</script>