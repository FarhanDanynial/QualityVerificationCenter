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

    <div class="row mb-3">
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
                            <button class="multisteps-form__progress-btn js-active" type="button">
                                <div class="step-icon">
                                    <i class="fas fa-list"></i>
                                </div>
                                <div class="step-text">Course Outline</div>
                            </button>
                            <button class="multisteps-form__progress-btn" type="button">
                                <div class="step-icon">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <div class="step-text">Continuous Assessment</div>
                            </button>
                            <button class="multisteps-form__progress-btn" type="button">
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
                <div class="row">
                    <div class="col-12">
                        <div class="multisteps-form__form mb-5">
                            <div class="card p-4 border-radius-xl js-active fadeIn" data-animation="FadeIn">
                                <h5 class="section-title">Course Content Outline</h5>
                                <div class="multisteps-form__content">
                                    <form id="step2_form" method="post" action="<?= base_url('provider/samc/save_form/2') ?>">
                                        <?= csrf_field() ?>

                                        <!-- CCO Table -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center" id="dynamicTable">
                                                <thead class="table-dark bg-gradient-info">
                                                    <tr>
                                                        <th style="width:350px;border-top-left-radius: 10px;" rowspan="3" class="align-middle col-content">Course Content Outline</th>
                                                        <th style="width:115px;" rowspan="3" class="align-middle col-clo">CLO</th>
                                                        <th colspan="6" class="align-middle">Instructional and Learning Activities</th>
                                                        <th style="border-top-right-radius: 10px;width:180px;" rowspan="3" class="align-middle col-number">Total LT</th>
                                                    </tr>
                                                    <tr>

                                                        <th colspan="4" class="align-middle">Guided Instruction (F2F)</th>
                                                        <th rowspan="2" class="align-middle">Guided<br>Instruction<br>(NF2F)</th>
                                                        <th rowspan="2" class="align-middle">Independent<br>Learning <br>(NF2F)</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="col-number">Presentation</th>
                                                        <th class="col-number">Tutorial</th>
                                                        <th class="col-number">Practical</th>
                                                        <th class="col-number">Others</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="dynamicTableBody">
                                                    <tr id="noticeRow">
                                                        <td colspan="9" class="text-center text-danger">
                                                            ⚠️ Please click "Add Row" to insert a course content outline.
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tableBody = document.getElementById("dynamicTableBody");
        const addRowBtn = document.getElementById("addRowBtn");

        // Retrieve existing data from the controller (Make sure this data is available in your template)
        let existingData = <?= json_encode($samc_cco_data ?? []); ?>;
        let rowCount = existingData.length; // Start row count based on previous data

        function toggleNotice() {
            const noticeRow = document.getElementById("noticeRow");
            if (noticeRow) {
                if (tableBody.querySelectorAll("tr:not(#noticeRow)").length > 0) {
                    noticeRow.style.display = "none"; // Hide if rows exist
                } else {
                    noticeRow.style.display = "table-row"; // Show if no rows exist
                }
            }
        }

        function createRow(data = {}, isNew = false) {
            let index = isNew ? rowCount++ : data.index;
            const newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td><textarea class="form-control" rows="1" name="data[${index}][cco_desc]" required>${data.cco_desc || ''}</textarea></td>
                <td><input type="text" class="form-control clo-input" maxlength="5" name="data[${index}][cco_clo]" value="${data.cco_clo || ''}"></td>
                <td><input type="number" class="form-control short-input input-number" name="data[${index}][cco_presentation]" min="0" max="99" value="${data.cco_presentation || ''}"></td>
                <td><input type="number" class="form-control short-input input-number" name="data[${index}][cco_tutorial]" min="0" max="99" value="${data.cco_tutorial || ''}"></td>
                <td><input type="number" class="form-control short-input input-number" name="data[${index}][cco_practical]" min="0" max="99" value="${data.cco_practical || ''}"></td>
                <td><input type="number" class="form-control short-input input-number" name="data[${index}][cco_others]" min="0" max="99" value="${data.cco_others || ''}"></td>
                <td><input type="number" class="form-control short-input input-number" name="data[${index}][cco_instruction_learning_hour]" min="0" max="99" value="${data.cco_instruction_learning_hour || ''}"></td>
                <td><input type="number" class="form-control short-input input-number" name="data[${index}][cco_independent_learning_hour]" min="0" max="99" value="${data.cco_independent_learning_hour || ''}"></td>
                <td>
                    <div class="d-flex align-items-center">
                        <input type="number" class="form-control short-input total-lt me-2" min="0" readonly value="${calculateTotal(data)}">
                        <button type="button" class="btn btn-danger remove-row" style="margin: 0; padding-left: 10px; padding-right: 10px;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </td>
            `;
            tableBody.appendChild(newRow);
            toggleNotice();
        }

        function calculateTotal(data) {
            return (Number(data.cco_presentation || 0) +
                Number(data.cco_tutorial || 0) +
                Number(data.cco_practical || 0) +
                Number(data.cco_others || 0) +
                Number(data.cco_instruction_learning_hour || 0) +
                Number(data.cco_independent_learning_hour || 0));
        }

        // Load previous data
        existingData.forEach((item, index) => {
            item.index = index; // Assign index to each row
            createRow(item);
        });

        // Add new row
        addRowBtn.addEventListener("click", function() {
            createRow({}, true);
        });

        // Remove row
        tableBody.addEventListener("click", function(event) {
            if (event.target.closest(".remove-row")) {
                event.target.closest("tr").remove();
                toggleNotice();
            }
        });

        // Calculate total LT on input change
        document.addEventListener("input", function(event) {
            if (event.target.classList.contains("input-number")) {
                let row = event.target.closest("tr");
                let total = 0;
                row.querySelectorAll(".input-number").forEach(input => {
                    total += Number(input.value) || 0;
                });
                row.querySelector(".total-lt").value = total;
            }
        });

        toggleNotice(); // Initial check
    });
</script>


<!-- Step 2 Form Submit -->
<script>
    $(document).ready(function() {
        $('.js-btn-next').on('click', function(event) {
            console.log("Next button clicked");
            event.preventDefault(); // Prevent form submission

            let form = $('#step2_form');
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

            let form = $('#step2_form');
            let formData = form.serialize(); // Serialize form data

            $.ajax({
                url: "<?= base_url('provider/samc/samc_prev_form/2'); ?>",
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