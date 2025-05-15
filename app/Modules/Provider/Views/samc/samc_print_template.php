<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
            background-color: rgb(255, 255, 255);
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-c3ow {
            border-color: black;
            color: black;
            text-align: center;
            vertical-align: top
        }

        .tg .tg-gvc8 {
            background-color: #dae8fc;
            border-color: #ffffff;
            text-align: center;
            vertical-align: top
        }

        .tg .tg-kfkg {
            background-color: #dae8fc;
            border-color: black;
            color: black;
            text-align: center;
            vertical-align: top
        }

        .tg .tg-0pky {
            border-color: black;
            color: black;
            text-align: left;
            vertical-align: top
        }

        .tg .tg-0lax {
            text-align: left;
            vertical-align: top;
            color: black;

        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .header img {
            height: 80px;
        }

        .header-text {
            text-align: center;
            flex-grow: 1;
        }

        .header-text h2,
        .header-text h3 {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <table width="100%">
        <tr style="border: none !Important;border-collapse: collapse;">
            <!-- Left Logo -->
            <td width="20%" style="text-align: left;border: none !Important;">
                <img src="<?= FCPATH . 'assets/img/logos/qvc_logo.png' ?>" style="width:100px;" alt="My Logo">
            </td>

            <!-- Center Header Text -->
            <td width="60%" style="text-align: center;border: none !Important;">
                <h3 style="margin: 0;">SAMC QUALITY VERIFICATION CENTER</h3>
                <h3 style="margin: 0;">UNIVERSITI PENDIDIKAN SULTAN IDRIS</h3>
                <br>
                <h3 style="margin: 0;">SAMC COURSE OUTLINE</h3>
            </td>

            <!-- Right Logo -->
            <td width="20%" style="text-align: right;border: none !Important;">
                <img src="<?= FCPATH . 'assets/img/logos/qvc_logo.png' ?>" style="width:100px;" alt="My Logo">
            </td>
        </tr>
    </table>
    <table class="tg" style="table-layout: fixed; width: 100%;">
        <colgroup>
            <col style="width: 162.2px">
            <col style="width: 90.2px">
            <col style="width: 73.2px">
            <col style="width: 67.2px">
            <col style="width: 57.2px">
            <col style="width: 79.2px">
            <col style="width: 93.2px">
            <col style="width: 85.2px">
        </colgroup>
        <thead>
            <tr>
                <!-- <th class="tg-gvc8" colspan="9">SAMC Course Description</th> -->
                <td class="tg-kfkg" colspan="8"><b>SAMC Course Description</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-0pky">Name of the SAMC Provider</td>
                <td class="tg-0pky" colspan="7"><?= $pvd_name ?></td>
            </tr>
            <tr>
                <td class="tg-0pky">Name of the SAMC </td>
                <td class="tg-0pky" colspan="7"><?= $samc_data->samc_course_name ?></td>
            </tr>
            <tr>
                <td class="tg-0pky">MQF Level/Levels</td>
                <td class="tg-0pky" colspan="7"><?= get_mqf_level($samc_data->samc_mqf_level) ?></td>
            </tr>
            <tr>
                <td class="tg-0pky">Duration (In Hours)</td>
                <td class="tg-0pky" colspan="7"><?= $samc_data->samc_duration_hours ?></td>
            </tr>
            <tr>
                <td class="tg-0pky">Classification of Knowledge, Skills or Attitude</td>
                <td class="tg-0pky" colspan="7"><?= $samc_field ?></td>
            </tr>
            <tr>
                <td class="tg-0pky">Language of Instruction</td>
                <td class="tg-0pky" colspan="7"><?= $samc_data->samc_language ?></td>
            </tr>
            <tr>
                <td class="tg-0pky">Method of Instruction and Learning</td>
                <td class="tg-0pky" colspan="7"><?= $samc_data->samc_teaching_methods ?></td>
            </tr>
            <tr>
                <td class="tg-0pky">Academic Credits</td>
                <td class="tg-0pky" colspan="7"><?= $samc_data->samc_academic_credits ?></td>
            </tr>
            <tr>
                <td class="tg-0pky">Prior Knowledge / Experience</td>
                <td class="tg-0pky" colspan="7"><?= $samc_data->samc_prior_knowledge ?></td>
            </tr>
            <tr>
                <td class="tg-kfkg" colspan="8"><b>SAMC Course Outline</b></td>
            </tr>
            <tr>
                <td class="tg-0pky">SAMC Synopsis</td>
                <td class="tg-0pky" colspan="7"><?= $samc_data->samc_synopsis ?></td>
            </tr>
            <tr>
                <td class="tg-0pky">SAMC Intended Learning Outcomes</td>
                <td class="tg-0pky" colspan="7"><?= $samc_data->samc_intended_learning_outcomes ?></td>
            </tr>
            <tr>
                <td class="tg-0pky">Instructor/s</td>
                <td class="tg-0pky" colspan="7"><?= $samc_data->samc_instructor ?></td>
            </tr>
            <tr>
                <td class="tg-0pky" rowspan="3">Course Content Outline</td>
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
                    <td class="tg-0lax"><?= $cco->cco_desc ?></td>
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
                <td class="tg-kfkg" colspan="8"><b>Assessment</b></td>
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
                    <td class="tg-c3ow" colspan="1"><?= $ca->sa_desc ?></td>
                    <td class="tg-c3ow" colspan="2"><?= $ca->sa_percentage ?></td>
                    <td class="tg-c3ow" colspan="2"><?= $ca->sa_instruction_learning_hour ?></td>
                    <td class="tg-c3ow" colspan="2"><?= $ca->sa_independent_learning_hour ?></td>
                    <td class="tg-c3ow" colspan="1"><?= $total_ca = $ca->sa_independent_learning_hour + $ca->sa_instruction_learning_hour ?></td>
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
                        <td class="tg-c3ow" colspan="1"><?= $fa->sa_desc ?></td>
                        <td class="tg-c3ow" colspan="2"><?= $fa->sa_percentage ?></td>
                        <td class="tg-c3ow" colspan="2"><?= $fa->sa_instruction_learning_hour ?></td>
                        <td class="tg-c3ow" colspan="2"><?= $fa->sa_independent_learning_hour ?></td>
                        <td class="tg-c3ow" colspan="1"><?= $total_fa = $fa->sa_independent_learning_hour + $fa->sa_instruction_learning_hour ?></td>
                    </tr>
                    <?php $total_fa_sum += $total_fa; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td class="tg-c3ow" colspan="1"></td>
                    <td class="tg-c3ow" colspan="2"></td>
                    <td class="tg-c3ow" colspan="2"></td>
                    <td class="tg-c3ow" colspan="2"></td>
                    <td class="tg-c3ow" colspan="1"></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td class="tg-kfkg" colspan="8"></td>
            </tr>
            <tr id="totalLearningTimeRow">
                <td class="tg-c3ow" colspan="7"><b>TOTAL LEARNING TIME (LT)</b></td>
                <td class="tg-c3ow" colspan="1"><?= $total_cco_sum + $total_ca_sum + $total_fa_sum ?></td>
            </tr>


        </tbody>
    </table>


</body>

</html>