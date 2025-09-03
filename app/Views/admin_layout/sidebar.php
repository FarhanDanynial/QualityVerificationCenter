<?php
$current = uri_string(); // e.g., 'provider/dashboard'
?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard-pro/pages/dashboards/default.html " target="_blank">
      <img src="<?= base_url() ?>assets/img/logos/myqvc_logo.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">MyQVC @ UPSI</span>
    </a>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <!-- Home -->
      <li class="nav-item mt-1">
        <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">ACCOUNT</h6>
      </li>
      <li class="nav-item">
        <a href="<?= base_url() ?>qvcAdmin/dashboard" class="nav-link <?= $current == 'qvcAdmin/dashboard' ? 'active' : '' ?>" role="button">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fas fa-home <?= strpos($current, 'qvcAdmin/dashboard') !== false ? '' : 'text-dark' ?>" style="font-size: 12px;"></i>
          </div>
          <span class="nav-link-text ms-1">Home</span>
        </a>
      </li>
      <!-- Account -->
      <!-- <li class="nav-item">
        <a data-bs-toggle="collapse" href="#accountSB" class="nav-link  <?= strpos($current, 'qvcAdmin/profile') !== false ? 'active' : '' ?>" aria-controls="accountSB" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fas fa-user <?= strpos($current, 'qvcAdmin/profile') !== false ? '' : 'text-dark' ?>" style="font-size: 12px;"></i>
          </div>
          <span class="nav-link-text ms-1">Account</span>
        </a>
        <div class="collapse <?= strpos($current, 'qvcAdmin/profile') !== false ? 'show' : '' ?>" id="accountSB">
          <ul class="nav ms-4 ps-3"> -->
      <!-- <li class="nav-item active"> -->
      <!-- <li class="nav-item <?= strpos($current, 'qvcAdmin/profile') !== false ? 'active' : '' ?>"> -->
      <!-- <a class="nav-link active" href="<?= base_url() ?>pages/dashboards/default.html"> -->
      <!-- <a class="nav-link " href="<?= base_url() ?>qvcAdmin/profile">
                <span class="sidenav-mini-icon"> P </span>
                <span class="sidenav-normal">Profile</span>
              </a>
            </li>
          </ul>
        </div>
      </li> -->
      <hr class="horizontal dark" />
      <!-- System Admin -->
      <li class="nav-item mt-1">
        <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">ADMIN SECTION</h6>
      </li>
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#admin_SB_Section" class="nav-link  <?= strpos($current, 'qvcAdmin/samc') !== false ||  strpos($current, 'qvcAdmin/invoice') !== false ? 'active' : '' ?>" aria-controls="admin_SB_Section" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fas fa-cog <?= strpos($current, 'qvcAdmin/samc') !== false ||  strpos($current, 'qvcAdmin/invoice') !== false ? '' : 'text-dark' ?>" style=" font-size: 12px;"></i>
          </div>
          <span class="nav-link-text ms-1">Admin Section</span>
        </a>
        <div class="collapse <?= strpos($current, 'qvcAdmin/samc') !== false ||  strpos($current, 'qvcAdmin/invoice') !== false ? 'show' : '' ?>" id="admin_SB_Section">
          <ul class="nav ms-4 ps-3">
            <li class="nav-item ">
              <a class="nav-link <?= strpos($current, 'qvcAdmin/samc/samc_management') !== false ? 'active' : '' ?>" href="<?= base_url() ?>qvcAdmin/samc/samc_management">
                <span class="sidenav-mini-icon"> M </span>
                <span class="sidenav-normal"> SAMC Management <b class="caret"></b></span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link <?= strpos($current, 'qvcAdmin/invoice/invoice_management') !== false ? 'active' : '' ?>" href="<?= base_url() ?>qvcAdmin/invoice/invoice_management">
                <span class="sidenav-mini-icon"> I </span>
                <span class="sidenav-normal"> Invoice Management <b class="caret"></b></span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#mpqua_SB_Section" class="nav-link " aria-controls="mpqua_SB_Section" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>office</title>
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <g transform="translate(1716.000000, 291.000000)">
                    <g id="office" transform="translate(153.000000, 2.000000)">
                      <path class="color-background" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z" opacity="0.6"></path>
                      <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">MPQUA</span>
        </a>
        <div class="collapse " id="mpqua_SB_Section">
          <ul class="nav ms-4 ps-3">
            <li class="nav-item ">
              <a class="nav-link " href="<?= base_url() ?>qvcAdmin/mpqua/list">
                <span class="sidenav-mini-icon"> R </span>
                <span class="sidenav-normal"> Register MPQUA Member <b class="caret"></b></span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <!-- SIGNOUT -->
      <li class="nav-item">
        <a href="<?= base_url() ?>auth/" class="nav-link" role="button">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fas fa-sign-out-alt text-dark" style=" font-size: 12px;"></i>
          </div>

          <span class="nav-link-text ms-1">Sign Out</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="sidenav-footer mx-3 mt-3 pt-3">
    <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
      <div class="full-background" style="background-image: url('<?= base_url() ?>assets/img/curved-images/white-curved.jpg')"></div>
      <div class="card-body text-start p-3 w-100">
        <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
          <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
        </div>
        <div class="docs-info">
          <h6 class="text-white up mb-0">Need help?</h6>
          <p class="text-xs font-weight-bold">Please check our docs</p>
          <a href="https://www.creative-tim.com/learning-lab/bootstrap/overview/soft-ui-dashboard" target="_blank" class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
        </div>
      </div>
    </div>
  </div>
</aside>