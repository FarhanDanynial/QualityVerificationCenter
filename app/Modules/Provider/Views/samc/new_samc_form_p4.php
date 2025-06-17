<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- import form styling -->
<link rel="stylesheet" href="<?= base_url('assets/css/custom_form.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/custom_form_p2.css'); ?>">

<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="section-title">SAMC Registration Form</h4>
        </div>
    </div>
    <?php if ($samc_data->samc_admin_remarks): ?>
        <div class="alert alert-dismissible fade show border border-danger text-danger pl-4 pr-4 pt-1 pb-1 position-relative" role="alert" style="background-color: transparent;">
            <button type="button" class="btn position-absolute top-0 end-0 m-3 p-1 text-danger" data-bs-dismiss="alert" aria-label="Close" style="font-size: 1.25rem; box-shadow:none;">
                <i class="fas fa-times"></i>
            </button>
            <div class="d-flex align-items-start">
                <div>
                    <strong>Rejection Reason!</strong><br>
                    <?= $samc_data->samc_admin_remarks ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mb-3 pt-3">
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
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <div class="step-text">Continuous Assessment</div>
                            </button>
                            <button class="multisteps-form__progress-btn js-active" type="button">
                                <div class="step-icon">
                                    <i class="fas fa-clipboard-check"></i>
                                </div>
                                <div class="step-text">Final Assessment</div>
                            </button>
                            <button class="multisteps-form__progress-btn" type="button">
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
                                <h5 class="font-weight-bolder">Final Assessment</h5>
                                <div class="multisteps-form__content">
                                    <form id="step4_form" method="post" action="<?= base_url('provider/samc/save_form/4') ?>">
                                        <?= csrf_field() ?>

                                        <!-- Continuous Assessment Table -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center" id="dynamicTable">
                                                <thead class="table-dark bg-gradient-info">
                                                    <tr>
                                                        <th style="border-top-left-radius: 10px;" class="align-middle">Final Assessment</th>
                                                        <th style="width:149px;" class="align-middle">Percentage (%)</th>
                                                        <th style="width:171;" class="align-middle">Guided Instruction</th>
                                                        <th style="width:194px;" class=" align-middle">Independent Learning</th>
                                                        <th style="width:115px; border-top-right-radius: 10px;" class="align-middle">Total LT</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="dynamicTableBody">
                                                    <tr id="noticeRow">
                                                        <td colspan="9" class="text-center text-danger">
                                                            ⚠️ Please click "Add Row" to insert a course Final Assessment.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Add Row Button -->
                                        <button type="button" class="btn bg-gradient-info mt-3" id="addRowBtn">
                                            <i class="fas fa-plus-circle me-2"></i>Add Row
                                        </button>

                                        <div class="button-row">
                                            <button class="btn js-btn-prev" type="button" title="Previous">
                                                <i class="fas fa-arrow-left me-2"></i>Previous
                                            </button>
                                            <button class="btn js-btn-next bg-gradient-info" type="submit" title="Next">
                                                Next<i class="fas fa-arrow-right ms-2"></i>
                                            </button>
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

<!-- <script src="<?= base_url() ?>/assets/js/plugins/multistep-form.js"></script> -->
<!-- Tooltips initialization -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tableBody = document.querySelector("#dynamicTable tbody");
        const addRowBtn = document.getElementById("addRowBtn");

        // Retrieve existing data from the controller (Make sure this data is available in your template)
        let existingData = <?= json_encode($samc_final_assessment_data ?? []); ?>;
        let rowCount = existingData.length; // Start row count based on previous data


        function toggleNotice() {
            const noticeRow = document.getElementById("noticeRow");

            if (noticeRow) { // Ensure the noticeRow exists
                if (tableBody.querySelectorAll("tr:not(#noticeRow)").length > 0) {
                    noticeRow.style.display = "none"; // Hide if there's at least one row
                } else {
                    noticeRow.style.display = "table-row"; // Show if no rows exist
                }
            }
        }

        function createRow(data = {}, isNew = false) {
            let index = isNew ? rowCount++ : data.index;
            const newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td><input type="text" class="form-control clo-input" name="data[${index}][sa_desc]" value="${data.sa_desc || ''}"></td>
                <td><input type="number" class="form-control short-input input-number" name="data[${index}][sa_percentage]"min="0" max="100"  value="${data.sa_percentage || ''}"></td>
                <td><input type="number" class="form-control short-input input-number" name="data[${index}][sa_instruction_learning_hour]"min="0" max="100"  value="${data.sa_instruction_learning_hour || ''}"></td>
                <td><input type="number" class="form-control short-input input-number" name="data[${index}][sa_independent_learning_hour]"min="0" max="100"  value="${data.sa_independent_learning_hour || ''}"></td>
                <td>
                <div class="d-flex align-items-center">
                    <input type="number" class="form-control short-input total-lt me-2" min="0" readonly value="${calculateTotal(data)}">
                    <button type="button" class="btn btn-danger remove-row" style="
                        margin: 0;
                        padding-left: 10px;
                        padding-right: 10px;
                    ">
                            <i class="fa-solid fa-trash remove-row"></i>
                        </button>
                    </div>
                </td>
            `;
            tableBody.appendChild(newRow);
            toggleNotice();
        }

        function calculateTotal(data) {
            return (Number(data.cco_presentation || 0) +
                Number(data.sa_instruction_learning_hour || 0) +
                Number(data.sa_independent_learning_hour || 0));
        }
        // Load previous data
        existingData.forEach((item, index) => {
            item.index = index; // Assign index to each row
            createRow(item);
        });

        // Function to add a new row
        addRowBtn.addEventListener("click", function() {
            createRow({}, true);
        });

        // Remove row and check if notice should be shown
        tableBody.addEventListener("click", function(event) {
            if (event.target.classList.contains("remove-row")) {
                event.target.closest("tr").remove();
                toggleNotice(); // Show notice if no rows are left
            }
        });

        // Function to calculate total LT dynamically
        document.addEventListener("input", function(event) {
            if (event.target.classList.contains("input-number")) {
                let row = event.target.closest("tr");
                let total = 0;

                // Select only the specific input fields to sum
                let instructionHour = row.querySelector('[name^="data"][name$="[sa_instruction_learning_hour]"]');
                let independentHour = row.querySelector('[name^="data"][name$="[sa_independent_learning_hour]"]');

                total += (Number(instructionHour?.value) || 0);
                total += (Number(independentHour?.value) || 0);

                // Update Total LT
                row.querySelector(".total-lt").value = total;
            }
        });

        toggleNotice(); // Initial check

    });
</script>

<!-- Step 4 Form Submit -->
<script>
    $(document).ready(function() {
        $('.js-btn-next').on('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            let form = $('#step4_form');
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
                url: form.attr('action'),
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
            //     }
            // });
        });

        $('.js-btn-prev').on('click', function(event) {
            console.log("Prev button clicked");
            event.preventDefault(); // Prevent form submission

            let form = $('#step4_form');
            let formData = form.serialize(); // Serialize form data

            $.ajax({
                url: "<?= base_url('provider/samc/samc_prev_form/4'); ?>",
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
    });
</script>