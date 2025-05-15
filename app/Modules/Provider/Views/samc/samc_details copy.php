<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/css/certificate.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .tab-pane {
        height: 600px;
    }

    .pdf-container {
        width: 100%;
        height: 100vh;
        /* Adjust based on your needs */
        overflow: hidden !important;

        position: relative !important;

    }



    /* Hide scrollbars for modern browsers */
    .pdf-bg::-webkit-scrollbar {
        display: none;
    }

    .pdf-bg {
        -ms-overflow-style: none;
        scrollbar-width: none;
        scrollbar-width: none;
        transform: scale(1.1);
        padding-top: 45px;
        /* position: fixed !important; */
    }
</style>
<div class="row">
    <div class="col-lg-8">
        <h2 class="mb-0">SAMC INFORMATION</h2>
        <br>
        <div class="card">
            <div class="card-body border-radius-lg p-3">
                <form>
                    <div class="row">
                        <div class="col-8 mb-3">
                            <label for="courseName" class="form-label"><strong>Course Name:</strong></label>
                            <input type="text" class="form-control" id="courseName" value="<?= $samcData->samc_course_name ?>" readonly>
                        </div>
                        <div class="col-2 mb-3">
                            <label for="status" class="form-label"><strong>Status:</strong></label>
                            <input type="text" class="form-control" id="status" value="<?= $samcData->samc_status ?>" readonly>
                        </div>
                        <div class="col-2 mb-3">
                            <label for="mqfLevel" class="form-label"><strong>MQF Level:</strong></label>
                            <input type="text" class="form-control" id="mqfLevel" value="<?= $samcData->samc_mqf_level ?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <label for="field" class="form-label"><strong>Field:</strong></label>
                            <input type="text" class="form-control" id="field" value="<?= $samcData->samc_ef_id ?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mb-3">
                            <label for="submitDate" class="form-label"><strong>Submit Date:</strong></label>
                            <input type="text" class="form-control" id="submitDate" value="<?= $samcData->samc_submit_date ?>" readonly>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="assignedDate" class="form-label"><strong>Assigned Date:</strong></label>
                            <input type="text" class="form-control" id="assignedDate" value="<?= $samcData->samc_assigned_date ?>" readonly>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="reviewedDate" class="form-label"><strong>Reviewed Date:</strong></label>
                            <input type="text" class="form-control" id="reviewedDate" value="<?= $samcData->samc_reviewed_date ?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mb-3">
                            <label for="startDate" class="form-label"><strong>Start Date:</strong></label>
                            <input type="text" class="form-control" id="startDate" value="<?= $samcData->samc_start_date ?>" readonly>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="expiredDate" class="form-label"><strong>Expired Date:</strong></label>
                            <input type="text" class="form-control" id="expiredDate" value="<?= $samcData->samc_expired_date ?>" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <main class="col-lg-4" id=app>
        <center>
            <section class="certificate_cards">
                <div class="certificate_card charizard animated">
                    <div class="pdf-container">
                        <iframe class="pdf-bg"
                            src="<?= base_url('assets/pdf/certificate.pdf') ?>#toolbar=0&navpanes=0&scrollbar=0&zoom=50"
                            width="100%"
                            height="100%"
                            scrolling="no">
                        </iframe>
                    </div>
                </div>
            </section>
            <style class="hover"></style>
            <button type="button" class="btn btn-primary btn-lg" style="width:420px;">Block level button</button>
        </center>
    </main>
</div>
<div class="row pt-4">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex pb-3 p-3">
                <h4 class="my-auto">Monitoring</h4>
                <div class="nav-wrapper position-relative ms-auto w-50">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">
                                Year 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab" aria-controls="cam2" aria-selected="false">
                                Year 2
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam3" role="tab" aria-controls="cam3" aria-selected="false">
                                Year 3
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body p-3 mt-2">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show position-relative active border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1">
                        <div class="position-absolute d-flex top-0 w-100">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <div class="input-group">
                                            <input id="firstName" name="firstName" class="form-control" type="text" placeholder="Alec" required="required" onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Last Name</label>
                                        <div class="input-group">
                                            <input id="lastName" name="lastName" class="form-control" type="text" placeholder="Thompson" required="required" onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-6">
                                        <label class="form-label mt-4">I'm</label>
                                        <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false">
                                            <div class="choices__inner"><select class="form-control choices__input" name="choices-gender" id="choices-gender" hidden="" tabindex="-1" data-choice="active">
                                                    <option value="Male">Male</option>
                                                </select>
                                                <div class="choices__list choices__list--single">
                                                    <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Male" data-custom-properties="null" aria-selected="true">Male</div>
                                                </div>
                                            </div>
                                            <div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" placeholder="">
                                                <div class="choices__list" role="listbox">
                                                    <div id="choices--choices-gender-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Female" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Female</div>
                                                    <div id="choices--choices-gender-item-choice-2" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Male" data-select-text="Press to select" data-choice-selectable="">Male</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-5 col-5">
                                                <label class="form-label mt-4">Birth Date</label>
                                                <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false">
                                                    <div class="choices__inner"><select class="form-control choices__input" name="choices-month" id="choices-month" hidden="" tabindex="-1" data-choice="active">
                                                            <option value="2">February</option>
                                                        </select>
                                                        <div class="choices__list choices__list--single">
                                                            <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="2" data-custom-properties="null" aria-selected="true">February</div>
                                                        </div>
                                                    </div>
                                                    <div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" placeholder="">
                                                        <div class="choices__list" role="listbox">
                                                            <div id="choices--choices-month-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="4" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">April</div>
                                                            <div id="choices--choices-month-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="8" data-select-text="Press to select" data-choice-selectable="">August</div>
                                                            <div id="choices--choices-month-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="12" data-select-text="Press to select" data-choice-selectable="">December</div>
                                                            <div id="choices--choices-month-item-choice-4" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="4" data-value="2" data-select-text="Press to select" data-choice-selectable="">February</div>
                                                            <div id="choices--choices-month-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="1" data-select-text="Press to select" data-choice-selectable="">January</div>
                                                            <div id="choices--choices-month-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="6" data-value="7" data-select-text="Press to select" data-choice-selectable="">July</div>
                                                            <div id="choices--choices-month-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="7" data-value="6" data-select-text="Press to select" data-choice-selectable="">June</div>
                                                            <div id="choices--choices-month-item-choice-8" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="8" data-value="3" data-select-text="Press to select" data-choice-selectable="">March</div>
                                                            <div id="choices--choices-month-item-choice-9" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="9" data-value="5" data-select-text="Press to select" data-choice-selectable="">May</div>
                                                            <div id="choices--choices-month-item-choice-10" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="10" data-value="11" data-select-text="Press to select" data-choice-selectable="">November</div>
                                                            <div id="choices--choices-month-item-choice-11" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="11" data-value="10" data-select-text="Press to select" data-choice-selectable="">October</div>
                                                            <div id="choices--choices-month-item-choice-12" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="12" data-value="9" data-select-text="Press to select" data-choice-selectable="">September</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-3">
                                                <label class="form-label mt-4">&nbsp;</label>
                                                <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false">
                                                    <div class="choices__inner"><select class="form-control choices__input" name="choices-day" id="choices-day" hidden="" tabindex="-1" data-choice="active">
                                                            <option value="1">1</option>
                                                        </select>
                                                        <div class="choices__list choices__list--single">
                                                            <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="1" data-custom-properties="null" aria-selected="true">1</div>
                                                        </div>
                                                    </div>
                                                    <div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" placeholder="">
                                                        <div class="choices__list" role="listbox">
                                                            <div id="choices--choices-day-item-choice-1" class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="1" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">1</div>
                                                            <div id="choices--choices-day-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="2" data-select-text="Press to select" data-choice-selectable="">2</div>
                                                            <div id="choices--choices-day-item-choice-31" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="31" data-value="31" data-select-text="Press to select" data-choice-selectable="">31</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-4">
                                                <label class="form-label mt-4">&nbsp;</label>
                                                <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false">
                                                    <div class="choices__inner"><select class="form-control choices__input" name="choices-year" id="choices-year" hidden="" tabindex="-1" data-choice="active">
                                                            <option value="2020">2020</option>
                                                        </select>
                                                        <div class="choices__list choices__list--single">
                                                            <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="2020" data-custom-properties="null" aria-selected="true">2020</div>
                                                        </div>
                                                    </div>
                                                    <div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" placeholder="">
                                                        <div class="choices__list" role="listbox">
                                                            <div id="choices--choices-year-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="1900" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">1900</div>
                                                            <div id="choices--choices-year-item-choice-61" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="61" data-value="1960" data-select-text="Press to select" data-choice-selectable="">1960</div>
                                                            <div id="choices--choices-year-item-choice-120" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="120" data-value="2019" data-select-text="Press to select" data-choice-selectable="">2019</div>
                                                            <div id="choices--choices-year-item-choice-121" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="121" data-value="2020" data-select-text="Press to select" data-choice-selectable="">2020</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label mt-4">Email</label>
                                        <div class="input-group">
                                            <input id="email" name="email" class="form-control" type="email" placeholder="example@email.com" onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mt-4">Confirmation Email</label>
                                        <div class="input-group">
                                            <input id="confirmation" name="confirmation" class="form-control" type="email" placeholder="example@email.com" onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label mt-4">Your location</label>
                                        <div class="input-group">
                                            <input id="location" name="location" class="form-control" type="text" placeholder="Sydney, A" onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mt-4">Phone Number</label>
                                        <div class="input-group">
                                            <input id="phone" name="phone" class="form-control" type="number" placeholder="+40 735 631 620" onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 align-self-center">
                                        <label class="form-label mt-4">Language</label>
                                        <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false">
                                            <div class="choices__inner"><select class="form-control choices__input" name="choices-language" id="choices-language" hidden="" tabindex="-1" data-choice="active">
                                                    <option value="English">English</option>
                                                </select>
                                                <div class="choices__list choices__list--single">
                                                    <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="English" data-custom-properties="null" aria-selected="true">English</div>
                                                </div>
                                            </div>
                                            <div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" placeholder="">
                                                <div class="choices__list" role="listbox">
                                                    <div id="choices--choices-language-item-choice-1" class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="English" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">English</div>
                                                    <div id="choices--choices-language-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="French" data-select-text="Press to select" data-choice-selectable="">French</div>
                                                    <div id="choices--choices-language-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Spanish" data-select-text="Press to select" data-choice-selectable="">Spanish</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label mt-4">Skills</label>
                                        <div class="choices" data-type="text" aria-haspopup="true" aria-expanded="false">
                                            <div class="choices__inner"><input class="form-control choices__input" id="choices-skills" type="text" value="vuejs,angular,react" placeholder="Enter something" hidden="" tabindex="-1" data-choice="active" onfocus="focused(this)" onfocusout="defocused(this)">
                                                <div class="choices__list choices__list--multiple">
                                                    <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="vuejs" data-custom-properties="null" aria-selected="true" data-deletable="">vuejs<button type="button" class="choices__button" aria-label="Remove item: 'vuejs'" data-button="">Remove item</button></div>
                                                    <div class="choices__item choices__item--selectable" data-item="" data-id="2" data-value="angular" data-custom-properties="null" aria-selected="true" data-deletable="">angular<button type="button" class="choices__button" aria-label="Remove item: 'angular'" data-button="">Remove item</button></div>
                                                    <div class="choices__item choices__item--selectable" data-item="" data-id="3" data-value="react" data-custom-properties="null" aria-selected="true" data-deletable="">react<button type="button" class="choices__button" aria-label="Remove item: 'react'" data-button="">Remove item</button></div>
                                                </div><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false">
                                            </div>
                                            <div class="choices__list choices__list--dropdown" aria-expanded="false"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade position-relative border-radius-lg" id="cam2" role="tabpanel" aria-labelledby="cam2" style="background-image: url('../../assets/img/bg-smart-home-2.jpg'); background-size:cover;">
                        <div class="position-absolute d-flex top-0 w-100">
                            <p class="text-white p-3 mb-0">17.05.2021 4:35PM</p>
                            <div class="ms-auto p-3">
                                <span class="badge badge-secondary">
                                    <i class="fas fa-dot-circle text-danger"></i>
                                    Recording</span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade position-relative border-radius-lg" id="cam3" role="tabpanel" aria-labelledby="cam3" style="background-image: url('../../assets/img/home-decor-3.jpg'); background-size:cover;">
                        <div class="position-absolute d-flex top-0 w-100">
                            <p class="text-white p-3 mb-0">17.05.2021 4:57PM</p>
                            <div class="ms-auto p-3">
                                <span class="badge badge-secondary">
                                    <i class="fas fa-dot-circle text-danger"></i>
                                    Recording</span>
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