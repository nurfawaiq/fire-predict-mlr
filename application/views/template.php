<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Prediksi Kebakaran Hutan - Multiple Linear Regression</title>
    <link rel="stylesheet" href="<?=base_url()?>public/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <!-- <link rel="stylesheet" href="<?=base_url()?>public/assets/vendors/iconfonts/ionicons/css/ionicons.css"> -->
    <!-- <link rel="stylesheet" href="<?=base_url()?>public/assets/vendors/iconfonts/typicons/src/font/typicons.css"> -->
    <!-- <link rel="stylesheet" href="<?=base_url()?>public/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css"> -->
    <link rel="stylesheet" href="<?=base_url()?>public/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?=base_url()?>public/assets/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="<?=base_url()?>public/assets/vendors/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url()?>public/assets/css/shared/style.css">
    <link rel="stylesheet" href="<?=base_url()?>public/assets/css/demo_1/style.css">
    <link rel="shortcut icon" href="<?=base_url()?>public/assets/images/logo-mini.png" />
    <style>
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="">
            <img src="<?=base_url()?>public/assets/images/logo.png" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="">
            <img src="<?=base_url()?>public/assets/images/logo-mini.png" alt="logo" />
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <form class="search-form d-none d-md-block" action="">
            <div class="form-group">
              <input type="search" class="form-control" placeholder="Search Here">
            </div>
          </form>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <?php if($this->session->userdata('id_user')) : ?>
                  <img class="img-xs rounded-circle" src="<?=base_url()?>public/assets/images/faces/face2.jpg" alt="Profile image"> </a>
                <?php else : ?>
                  <img class="img-xs rounded-circle" src="<?=base_url()?>public/assets/images/faces/avatar.png" alt="Profile image"> </a>
                <?php endif; ?>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <?php if($this->session->userdata('id_user')) : ?>
                    <img class="img-md rounded-circle" src="<?=base_url()?>public/assets/images/faces/face2.jpg" alt="Profile image">
                    <p class="mb-1 mt-3 font-weight-semibold"><?=user()->nama?></p>
                    <p class="font-weight-light text-muted mb-0">Admin</p>
                  <?php else : ?>
                    <img class="img-md rounded-circle" src="<?=base_url()?>public/assets/images/faces/avatar.png" alt="Profile image">
                    <p class="mb-1 mt-3 font-weight-semibold">Visitor</p>
                  <?php endif; ?>
                </div>
                <?php if($this->session->userdata('id_user')) : ?>
                  <a class="dropdown-item" href="">My Profile</a>
                  <a class="dropdown-item" href="<?=site_url('auth/logout')?>">Logout</a>
                <?php else : ?>
                  <a class="dropdown-item" href="<?=site_url('auth/login')?>">Login</a>
                <?php endif; ?>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <?php if($this->session->userdata('id_user')) : ?>
                    <img class="img-xs rounded-circle" src="<?=base_url()?>public/assets/images/faces/face2.jpg" alt="profile image">
                  <?php else : ?>
                    <img class="img-xs rounded-circle" src="<?=base_url()?>public/assets/images/faces/avatar.png" alt="profile image">
                  <?php endif; ?>
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <?php if($this->session->userdata('id_user')) : ?>
                  <p class="profile-name"><?=user()->nama?></p>
                  <p class="designation">Admin</p>
                  <?php else : ?>
                    <p class="profile-name">Visitor</p>
                  <?php endif; ?>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <?php $url = $this->uri->segment(1); ?>
            <li class="nav-item" <?=$url == 'dashboard' || $url == '' ? 'style="background:#0f25d5;"' : ''?>>
              <a class="nav-link" href="<?=site_url('dashboard')?>">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item" <?=$url == 'dataset' ? 'style="background:#0f25d5;"' : ''?>>
              <a class="nav-link" href="<?=site_url('dataset')?>">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Dataset</span>
              </a>
            </li>
            <li class="nav-item" <?=$url == 'total' ? 'style="background:#0f25d5;"' : ''?>>
              <a class="nav-link" href="<?=site_url('total')?>">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Total</span>
              </a>
            </li>
            <li class="nav-item" <?=$url == 'calc' ? 'style="background:#0f25d5;"' : ''?>>
              <a class="nav-link" href="<?=site_url('calc')?>">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Perhitungan</span>
              </a>
            </li>
            <li class="nav-item" <?=$url == 'predict' ? 'style="background:#0f25d5;"' : ''?>>
              <a class="nav-link" href="<?=site_url('predict')?>">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">Prediksi</span>
              </a>
            </li>
            <li class="nav-item" <?=$url == 'about' ? 'style="background:#0f25d5;"' : ''?>>
              <a class="nav-link" href="<?=site_url('about')?>">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">About</span>
              </a>
            </li>
          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
            <?php echo $contents ?>
          </div>
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2022 - Kelompok 3 DS.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made with <i class="mdi mdi-heart text-danger"></i>
              </span>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script src="<?=base_url()?>public/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?=base_url()?>public/assets/vendors/js/vendor.bundle.addons.js"></script>
    <script src="<?=base_url()?>public/assets/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>public/assets/vendors/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>public/assets/js/shared/off-canvas.js"></script>
    <script>
      $(document).ready(function () {
        $('#table1').DataTable();
      });
    </script>
  </body>
</html>