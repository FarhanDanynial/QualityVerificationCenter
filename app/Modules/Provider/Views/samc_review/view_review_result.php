<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Import table styling -->
<link rel="stylesheet" href="<?= base_url('assets/css/custom_table.css'); ?>">

<style>
    /* Modern formal styling */
    :root {
        /* --primary-color: #1e40af; */
        --secondary-color: #f8fafc;
        --accent-color: #0284c7;
        --text-color: #334155;
        --border-radius: 8px;
        --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --primary-color: #1a73e8;
        /* --secondary-color: #f8f9fa; */
        /* --accent-color: #34a853; */
        --danger-color: #ea4335;
        --text-dark: #202124;
        --text-light: rgb(0 0 0 / 0.175);
        --border-color: #dadce0;
    }

    .samc-card {
        border-radius: 8px;
        box-shadow: var(--card-shadow);
        border: none;
        background-color: white;
        transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
        margin-bottom: 24px;
    }

    .samc-card:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    }

    .samc-header {
        color: white;
        padding: 16px;
        border-radius: 8px 8px 0 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .samc-header h5 {
        margin: 0;
        font-weight: 500;
    }

    .samc-actions {
        position: sticky;
        top: 0;
        z-index: 100;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .btn-action {
        border: 1px solid;
        padding: 8px 16px;
        border-radius: 4px;
        font-weight: 500;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
    }

    .btn-assign {
        background-color: #0284c700;
        color: white;
    }

    .btn-assign:hover {
        background-color: rgb(255, 255, 255);
        color: var(--primary-color);
    }

    .btn-return {
        background-color: var(--danger-color);
        color: white;
    }

    .btn-return:hover {
        background-color: #d33426;
    }

    .btn-submit {
        background-color: var(--primary-color);
        color: white;
        padding: 10px 24px;
        border: none;
        border-radius: 4px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .btn-submit:hover {
        background-color: #0d62d1;
    }

    .btn-save-draft {
        background-color: #0284c700;
        color: white;
    }

    .btn-save-draft:hover {
        background-color: rgb(255, 255, 255);
        color: var(--primary-color);
    }


    /* Table styling */
    .samc-table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }

    .samc-table th,
    .samc-table td {
        border: 1px solid var(--border-color);
        padding: 12px;
    }

    .samc-table th {
        background-color: var(--secondary-color);
        font-weight: 500;
        text-align: left;
    }

    .section-header {
        background-color: var(--primary-color);
        color: white;
        padding: 12px;
        font-weight: 500;
    }

    .section-subheader {
        background-color: var(--secondary-color);
        color: var(--text-dark);
        text-align: center;
        font-weight: 500;
    }

    /* Tabbed navigation */
    .samc-tabs {
        display: flex;
        background-color: var(--bs-light);
        border-bottom: 1px solid var(--border-color);
        overflow-x: auto;
        margin-bottom: 20px;
    }

    .samc-tab {
        padding: 12px 24px;
        cursor: pointer;
        border-bottom: 3px solid transparent;
        white-space: nowrap;
        font-weight: 500;
        transition: all 0.2s ease;
        color: var(--dark-color);
    }

    .samc-tab:hover {
        background-color: rgba(26, 115, 232, 0.05);
    }

    .samc-tab.active {
        border-bottom: 3px solid var(--primary-color);
        color: var(--primary-color);
    }

    .tab-content {
        display: none;
        padding: 20px;
    }

    .tab-content.active {
        display: block;
    }

    /* Badge styling */
    .badge {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: normal;
    }

    .badge-success {
        background-color: #e6f4ea;
        color: #137333;
    }

    .badge-info {
        background-color: #e8f0fe;
        color: #1967d2;
    }

    .badge-warning {
        background-color: #fef7e0;
        color: #b06000;
    }

    /* Assessment form styling */
    .assessment-form {
        background-color: white;
        border: 1px solid var(--border-color) !important;
        border-radius: 8px;
        box-shadow: var(--card-shadow);
        padding: 24px;
    }

    .assessment-section {
        margin-bottom: 32px;
    }

    .assessment-section-title {
        font-size: 18px;
        font-weight: 500;
        color: var(--primary-color);
        margin-bottom: 16px;
        padding-bottom: 8px;
        border-bottom: 2px solid var(--primary-color);
    }

    .assessment-item {
        margin-bottom: 20px;
        padding: 16px;
        border-radius: 8px;
        border: 1px solid var(--border-color);
        background-color: var(--secondary-color);
        transition: all 0.2s ease;
    }

    .assessment-item:hover {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .assessment-item-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .assessment-item-title {
        font-weight: 500;
        color: var(--text-dark);
    }

    .assessment-options {
        display: flex;
        gap: 16px;
        align-items: center;
        flex-wrap: wrap;
    }

    .option-group {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .assessment-remarks {
        margin-top: 12px;
    }

    .assessment-remarks textarea {
        border: 1px solid var(--border-color);
        border-radius: 4px;
        padding: 8px 12px;
        width: 100%;
        min-height: 80px;
        font-size: 14px;
        transition: border-color 0.2s;
    }

    .assessment-remarks textarea:focus {
        border-color: var(--primary-color);
        outline: none;
        box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 32px;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
    }

    .assessment-summary {
        background-color: #ffffff;
        border: 1px solid var(--border-color) !important;
        border-radius: 8px;
        padding: 16px;
        margin-bottom: 24px;
    }

    .summary-title {
        font-weight: 500;
        margin-bottom: 12px;
        color: var(--text-dark);
    }

    /* Tooltip styling */
    .tooltip-icon {
        color: var(--text-light);
        margin-left: 8px;
        cursor: help;
    }

    /* Radio and checkbox styling */
    .custom-radio,
    .custom-checkbox {
        display: flex;
        align-items: center;
        margin-right: 16px;
        cursor: pointer;
    }

    .custom-radio input,
    .custom-checkbox input {
        margin-right: 8px;
    }

    .custom-radio label,
    .custom-checkbox label {
        color: var(--text-dark);
        cursor: pointer;
    }

    .assessment-summary {
        transition: all 0.3s ease;
    }

    .assessment-summary:hover {
        transform: translateY(-2px);
    }

    .progress-bar {
        transition: width 0.6s ease, background 0.3s ease;
    }

    .progress-stat {
        font-size: 0.9rem;
    }

    .badge {
        font-weight: 600;
    }

    .progress-bar {
        height: 18px !important;
    }

    @media (max-width: 576px) {
        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 8px;
        }
    }

    /* Responsive layout */
    @media (max-width: 768px) {
        .samc-layout {
            flex-direction: column;
        }

        .assessment-item-header {
            flex-direction: column;
        }

        .assessment-options {
            margin-top: 12px;
        }
    }
</style>

<div class="container-fluid py-4">
    <!-- Main card with SAMC details -->
    <div class="samc-card mb-4">
        <!-- Header with status badge -->
        <div class="samc-header bg-gradient-primary">
            <div>
                <h5 class="text-dark"><b><i class="fas fa-certificate me-2"></i>SAMC Review Result</b></h5>
            </div>
        </div>

        <!-- Review Tab Content -->
        <!-- SAMC COURSE FRAMEWORK ASSESSMENT FORM -->
        <div class="assessment-form" id="assessment-form">

            <form id="samcReviewForm">
                <div class="assessment-section">
                    <div class="assessment-section-title">1. Course Details Evaluation</div>

                    <div class="assessment-item-header">
                        <div class="assessment-item-title">
                            <span>Name of the SAMC</span>
                        </div>
                        <div class="assessment-options">
                            <div class="option-group">
                                <?= (isset($reviews_1->sr_samc_name_status)) ? get_samc_review_status_badge($reviews_1->sr_samc_name_status) : ''; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($reviews_1->sr_samc_name) && !empty($reviews_1->sr_samc_name)) : ?>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= nl2br(esc($reviews_1->sr_samc_name)); ?>
                        </div>
                    <?php endif; ?>
                    <hr style="border: 1px solid #ccc;">

                    <div class="assessment-item-header">
                        <div class="assessment-item-title">
                            <span>MQF level/levels</span>
                        </div>
                        <div class="assessment-options">
                            <div class="option-group">
                                <?= (isset($reviews_1->sr_mqf_level_status)) ? get_samc_review_status_badge($reviews_1->sr_mqf_level_status) : ''; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($reviews_1->sr_mqf_level) && !empty($reviews_1->sr_mqf_level)) : ?>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= nl2br(esc($reviews_1->sr_mqf_level)); ?>
                        </div>
                    <?php endif; ?>
                    <hr style="border: 1px solid #ccc;">


                    <div class="assessment-item-header">
                        <div class="assessment-item-title">
                            <span>Duration (in hours)</span>
                        </div>
                        <div class="assessment-options">
                            <div class="option-group">
                                <?= (isset($reviews_1->sr_duration_hours_status)) ? get_samc_review_status_badge($reviews_1->sr_duration_hours_status) : ''; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($reviews_1->sr_duration_hours) && !empty($reviews_1->sr_duration_hours)) : ?>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= nl2br(esc($reviews_1->sr_duration_hours)); ?>
                        </div>
                    <?php endif; ?>
                    <hr style="border: 1px solid #ccc;">

                    <div class="assessment-item-header">
                        <div class="assessment-item-title">
                            <span>Method of Instruction and Learning</span>
                        </div>
                        <div class="assessment-options">
                            <div class="option-group">
                                <?= (isset($reviews_1->sr_teaching_methods_status)) ? get_samc_review_status_badge($reviews_1->sr_teaching_methods_status) : ''; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($reviews_1->sr_teaching_methods) && !empty($reviews_1->sr_teaching_methods)) : ?>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= nl2br(esc($reviews_1->sr_teaching_methods)); ?>
                        </div>
                    <?php endif; ?>
                    <hr style="border: 1px solid #ccc;">

                    <div class="assessment-item-header">
                        <div class="assessment-item-title">
                            <span>Academic Credits</span>
                        </div>
                        <div class="assessment-options">
                            <div class="option-group">
                                <?= (isset($reviews_1->sr_academic_credits_status)) ? get_samc_review_status_badge($reviews_1->sr_academic_credits_status) : ''; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($reviews_1->sr_academic_credits) && !empty($reviews_1->sr_academic_credits)) : ?>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= nl2br(esc($reviews_1->sr_academic_credits)); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="assessment-section">
                    <div class="assessment-section-title">2. Course Content Evaluation</div>

                    <div class="assessment-item-header">
                        <div class="assessment-item-title">
                            <span>SAMC Synopsis</span>
                        </div>
                        <div class="assessment-options">
                            <div class="option-group">
                                <?= (isset($reviews_1->sr_synopsis_status)) ? get_samc_review_status_badge($reviews_1->sr_synopsis_status) : ''; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($reviews_1->sr_synopsis) && !empty($reviews_1->sr_synopsis)) : ?>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= nl2br(esc($reviews_1->sr_synopsis)); ?>
                        </div>
                    <?php endif; ?>
                    <hr style="border: 1px solid #ccc;">

                    <div class="assessment-item-header">
                        <div class="assessment-item-title">
                            <span>SAMC Intended Learning Outcomes</span>
                        </div>
                        <div class="assessment-options">
                            <div class="option-group">
                                <?= (isset($reviews_1->sr_intended_learning_outcomes_status)) ? get_samc_review_status_badge($reviews_1->sr_intended_learning_outcomes_status) : ''; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($reviews_1->sr_intended_learning_outcomes) && !empty($reviews_1->sr_intended_learning_outcomes)) : ?>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= nl2br(esc($reviews_1->sr_intended_learning_outcomes)); ?>
                        </div>
                    <?php endif; ?>
                    <hr style="border: 1px solid #ccc;">

                    <div class="assessment-item-header">
                        <div class="assessment-item-title">
                            <span>Course Content Outline</span>
                        </div>
                        <div class="assessment-options">
                            <div class="option-group">
                                <?= (isset($reviews_1->sr_content_outline_status)) ? get_samc_review_status_badge($reviews_1->sr_content_outline_status) : ''; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($reviews_1->sr_content_outline) && !empty($reviews_1->sr_content_outline)) : ?>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= nl2br(esc($reviews_1->sr_content_outline)); ?>
                        </div>
                    <?php endif; ?>
                    <hr style="border: 1px solid #ccc;">

                    <div class="assessment-item-header">
                        <div class="assessment-item-title">
                            <span>Assessment</span>
                        </div>
                        <div class="assessment-options">
                            <div class="option-group">
                                <?= (isset($reviews_1->sr_assessment_status)) ? get_samc_review_status_badge($reviews_1->sr_assessment_status) : ''; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($reviews_1->sr_assessment) && !empty($reviews_1->sr_assessment)) : ?>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= nl2br(esc($reviews_1->sr_assessment)); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="assessment-section">
                    <div class="assessment-section-title">3. Review Result</div>

                    <div class="assessment-item-header">
                        <div class="assessment-item-title">
                            <span>Overall Result</span>
                        </div>
                        <div class="assessment-options">
                            <div class="option-group">
                                <?php if ((isset($reviews_1->sr_review_status))): ?>
                                    <?php if ($reviews_1->sr_review_status == 'ACCEPT'): ?>
                                        <span class="badge bg-gradient-success" data-bs-toggle="tooltip" title="This SAMC has been Accepted, no further action needed.">Accepted</span>
                                    <?php endif; ?>
                                    <?php if ($reviews_1->sr_review_status == 'ACCEPT_WITH_AMENDMENT'): ?>
                                        <span class="badge bg-gradient-warning" data-bs-toggle="tooltip" title="This SAMC has been Accepted with amendment, please update.">Accepted With Amendment</span>
                                    <?php endif; ?>
                                    <?php if ($reviews_1->sr_review_status == 'RETURN'): ?>
                                        <span class="badge bg-gradient-danger" data-bs-toggle="tooltip" title="This SAMC has been Return, please update.">Return</span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= isset($reviews_1->sr_review) && !empty($reviews_1->sr_review) ? nl2br(esc($reviews_1->sr_review)) : '<em class="text-muted">No remarks provided</em>'; ?>
                        </div>
                    </div>
                </div>
                <div class="form-actions d-flex">
                    <a href="<?= base_url('provider/samc/edit_samc_form/') . $samc_data->samc_id ?>" class="btn bg-gradient-warning ms-auto" type="submit" title="Submit Review">
                        Edit SAMC<i class="fas fa-edit ms-2"></i>
                    </a>
                </div>


            </form>
        </div>
    </div>


</div>