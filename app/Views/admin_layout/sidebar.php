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