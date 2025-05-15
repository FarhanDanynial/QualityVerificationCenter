<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- import form styling -->
<link rel="stylesheet" href="<?= base_url('assets/css/custom_form.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/custom_form_p1.css'); ?>">

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
                            <button class="multisteps-form__progress-btn js-active" type="button">
                                <div class="step-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="step-text">Description</div>
                            </button>
                            <button class="multisteps-form__progress-btn" type="button">
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
                            <div class="card p-4 border-radius-xl js-active" data-animation="FadeIn">
                                <h5 class="section-title">Product Description</h5>
                                <div class="multisteps-form__content">
                                    <form id="step1_form" method="post" action="<?= base_url('provider/samc/save_form/1') ?>">
                                        <?= csrf_field() ?>

                                        <div class="form-section">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 mb-3">
                                                    <label>
                                                        Name Of the SAMC Provider
                                                        <i class="fas fa-info-circle info-icon ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Your Company/Institution/Organization Name"></i>
                                                    </label>
                                                    <input class="form-control" type="text" value="<?= $provider_info->pvd_name; ?>" readonly />
                                                </div>
                                                <div class="col-12 col-sm-6 mb-3">
                                                    <label>
                                                        Name of the SAMC
                                                        <i class="fas fa-info-circle info-icon ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="As in the Malaysian Micro-credentials Statement to be provided - MC in Website Design"></i>
                                                    </label>
                                                    <input name="samc_course_name" class="form-control" type="text" placeholder="Enter the official name of the SAMC" value="<?= $samc_data->samc_course_name ?? ''; ?>" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-section">
                                            <div class="row">
                                                <div class="col-sm-6 mb-3">
                                                    <label>
                                                        MQF Level/Levels
                                                        <i class="fas fa-info-circle info-icon ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="The SAMC in terms of ILO has the range and complexity of learning that best fits one or more of the 8 levels in the MQF"></i>
                                                    </label>
                                                    <?php
                                                    $mqf_levels = [
                                                        1 => "Level 1 - Certification",
                                                        2 => "Level 2 - Certification",
                                                        3 => "Level 3 - Certification",
                                                        4 => "Level 4 - Diploma",
                                                        5 => "Level 5 - Advanced Diploma",
                                                        6 => "Level 6 - Degree",
                                                        7 => "Level 7 - Master",
                                                        8 => "Level 8 - Doctorate"
                                                    ];

                                                    $selected_level = $samc_data->samc_mqf_level ?? '';
                                                    ?>
                                                    <select class="form-select" id="samc_mqf_level" name="samc_mqf_level" required>
                                                        <option value="<?= $selected_level ?? ''; ?>" selected><?= get_mqf_level($selected_level) ?? 'Select the MQF level'; ?></option>

                                                        <?php foreach ($mqf_levels as $value => $label): ?>
                                                            <?php if ($value != $selected_level): ?>
                                                                <option value="<?= $value; ?>"><?= $label; ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <label>
                                                        Duration (In Hours)
                                                        <i class="fas fa-info-circle info-icon ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Total expected learning time (TL)."></i>
                                                    </label>
                                                    <input name="samc_duration_hours" class="form-control" type="number" placeholder="Total learning time" value="<?= $samc_data->samc_duration_hours ?? ''; ?>" required />
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <label>
                                                        Academic Credits
                                                        <i class="fas fa-info-circle info-icon ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="e.g., 1, 1.5 (computation to be attached)"></i>
                                                    </label>
                                                    <input name="samc_academic_credits" class="form-control" type="number" step="0.1" placeholder="Academic credits" value="<?= $samc_data->samc_academic_credits ?? ''; ?>" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-section">
                                            <div class="row">
                                                <div class="col-sm-6 mb-3">
                                                    <label>
                                                        Classification Of Knowledge, Skill Or Attitude
                                                        <i class="fas fa-info-circle info-icon ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="e.g., Management leadership, Finance, Banking, Islamic Finance, ECE."></i>
                                                    </label>
                                                    <select class="form-select" name="samc_ef_field" id="samc_ef_field" required>
                                                        <?php if (!empty($samc_data) && isset($samc_data->samc_ef_id)) : ?>
                                                            <option value="<?= $samc_data->samc_ef_id ?? ''; ?>" selected>
                                                                <?= get_samc_field($samc_data->samc_ef_id) ?? ''; ?>
                                                            </option>
                                                            <?php foreach ($samc_field as $expertise_field): ?>
                                                                <?php if ($expertise_field->aef_ef_id != $samc_data->samc_ef_id): ?>
                                                                    <option value="<?= $expertise_field->aef_ef_id ?>">
                                                                        <?= $expertise_field->ef_desc ?>
                                                                    </option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        <?php else : ?>
                                                            <option value="">
                                                                Please select classification for this samc
                                                            </option>
                                                            <?php foreach ($samc_field as $expertise_field): ?>
                                                                <option value="<?= $expertise_field->aef_ef_id ?>">
                                                                    <?= $expertise_field->ef_desc ?>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <label>
                                                        Language of Instruction
                                                        <i class="fas fa-info-circle info-icon ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Select a language or specify if not listed."></i>
                                                    </label>
                                                    <select class="form-select" name="language" id="language-select">
                                                        <option value="<?= $samc_data->samc_language ?? ''; ?>" selected><?= $samc_data->samc_language ?? 'Select Language'; ?></option>
                                                        <option value="English">English</option>
                                                        <option value="Bahasa Melayu">Bahasa Melayu</option>
                                                        <option value="English and Bahasa Melayu">English and Bahasa Melayu</option>
                                                        <option value="Other">Other</option>
                                                    </select>

                                                    <!-- Hidden input for "Other" language -->
                                                    <input class="form-control mt-2" type="text" id="other-language" name="other_language" placeholder="Specify language" style="display: none;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-section">
                                            <div class="row">
                                                <div class="col-sm-12 mb-3">
                                                    <label>
                                                        Method of Instruction and Learning
                                                        <i class="fas fa-info-circle info-icon ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="e.g., presentation / workshop / seminar / tutorial / lab / field work / studio / blended learning / online learning"></i>
                                                    </label>
                                                    <textarea name="samc_teaching_methods" class="form-control" rows="2" required><?= $samc_data->samc_teaching_methods ?? ''; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-section">
                                            <div class="row">
                                                <div class="col-sm-12 mb-3">
                                                    <label>
                                                        Prior Knowledge/ Experience
                                                        <i class="fas fa-info-circle info-icon ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Specify any prerequisite knowledge or experience expected from participants"></i>
                                                    </label>
                                                    <textarea name="samc_prior_knowledge" class="form-control" rows="2" required><?= $samc_data->samc_prior_knowledge ?? ''; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-section">
                                            <div class="row">
                                                <div class="col-sm-12 mb-3">
                                                    <label>
                                                        SAMC Synopsis
                                                        <i class="fas fa-info-circle info-icon ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide a brief description (less than 500 words) of the SAMC in terms of aims, outcomes, delivery, content and progression."></i>
                                                    </label>
                                                    <textarea name="samc_synopsis" class="form-control" id="word-limit-input" rows="4" required><?= $samc_data->samc_synopsis ?? ''; ?></textarea>
                                                    <small id="word-count" class="word-count">0/500 words</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-section">
                                            <div class="row">
                                                <div class="col-sm-12 mb-3">
                                                    <label>
                                                        SAMC Intended Learning Outcomes
                                                        <i class="fas fa-info-circle info-icon ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="State the ILOs for the SAMC – short, clear, measurable/observable statements which indicate the outcomes the learner/trainees are expected to attain at the completion of the SAMC."></i>
                                                    </label>
                                                    <textarea name="samc_intended_learning_outcomes" class="form-control" rows="4" required><?= $samc_data->samc_intended_learning_outcomes ?? ''; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-section">
                                            <div class="row">
                                                <div class="col-sm-12 mb-3">
                                                    <label>
                                                        Instructor/s
                                                        <i class="fas fa-info-circle info-icon ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide details of instructors including qualifications and experience"></i>
                                                    </label>
                                                    <textarea name="samc_instructor" class="form-control" rows="4" required><?= $samc_data->samc_instructor ?? ''; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end mt-4">
                                            <button class="btn next-btn js-btn-next bg-gradient-info" type="button" title="Next">
                                                <span>Next</span>
                                                <i class="fas fa-arrow-right ms-2"></i>
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

<!-- Tooltips initialization -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

<!-- select 2 initialize -->
<script>
    jQuery(document).ready(function($) {
        // Initialize Select2 with custom styling
        $('#samc_ef_field').select2({
            placeholder: "Select Expertise",
            dropdownCssClass: "corporate-dropdown",
            width: '100%'
        });

        $('#samc_mqf_level').select2({
            placeholder: "Select Level",
            dropdownCssClass: "corporate-dropdown",
            width: '100%'
        });

        // Add custom styling to Select2 elements
        $('.select2-container--default .select2-selection--single').css({
            'height': '45px',
            'padding': '8px 0',
            'border-color': '#dee2e6'
        });
    });
</script>

<!-- specify language script -->
<script>
    document.getElementById("language-select").addEventListener("change", function() {
        var otherInput = document.getElementById("other-language");
        if (this.value === "Other") {
            otherInput.style.display = "block";
            otherInput.setAttribute("required", "required");
        } else {
            otherInput.style.display = "none";
            otherInput.removeAttribute("required");
        }
    });
</script>

<!-- Synopsis limiter -->
<script>
    document.getElementById("word-limit-input").addEventListener("input", function() {
        var inputText = this.value;
        var words = inputText.trim().split(/\s+/).filter(Boolean); // Split by spaces & remove empty items
        var wordCount = words.length;
        var maxWords = 500;

        // Update word count display
        document.getElementById("word-count").textContent = wordCount + "/" + maxWords + " words";

        // Prevent typing beyond the word limit
        if (wordCount > maxWords) {
            this.value = words.slice(0, maxWords).join(" ");
            document.getElementById("word-count").textContent = maxWords + "/" + maxWords + " words (Limit Reached)";
        }
    });

    // Trigger word count on page load to display initial count
    window.addEventListener('load', function() {
        var synopsisField = document.getElementById("word-limit-input");
        if (synopsisField.value) {
            var event = new Event('input');
            synopsisField.dispatchEvent(event);
        }
    });
</script>

<!-- Step 1 Form Submit -->
<script>
    $(document).ready(function() {
        $('.js-btn-next').on('click', function() {
            let currentStep = $(this).closest('.multisteps-form__panel'); // Get the current step
            let isValid = true;

            // Check required fields within the current step only
            currentStep.find('input[required], select[required], textarea[required]').each(function() {
                let value = $(this).val();

                // Ensure value exists and is properly trimmed
                if (!value || (typeof value === 'string' && value.trim() === '')) {
                    isValid = false;
                    $(this).addClass('is-invalid');
                    return false; // Stop checking further if any field is empty
                } else {
                    $(this).removeClass('is-invalid');
                }
            });

            if (!isValid) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete Form',
                    text: 'Please fill in all required fields before proceeding.',
                    confirmButtonColor: '#3498db'
                });
                return; // Stop execution; the user cannot proceed
            }

            submitForm();
        });

        function submitForm() {
            let form = $('#step1_form');
            let formData = form.serialize();
            let nextButton = $('.js-btn-next');

            // Disable button and show saving message
            nextButton.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Saving...');

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
                            window.location.href = response.redirect_url; // Redirect to another page
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message || 'Something went wrong!',
                            confirmButtonColor: '#3498db'
                        });
                    }
                    nextButton.html('<span>Next</span><i class="fas fa-arrow-right ms-2"></i>').prop('disabled', false);
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred. Please try again.',
                        confirmButtonColor: '#3498db'
                    });
                    nextButton.html('<span>Next</span><i class="fas fa-arrow-right ms-2"></i>').prop('disabled', false);
                }
            });
        }
    });
</script>