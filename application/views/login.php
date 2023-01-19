<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Admin - Prediksi Kebakaran Hutan</title>
    <link rel="stylesheet" href="<?=base_url()?>public/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>public/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?=base_url()?>public/assets/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="<?=base_url()?>public/assets/css/shared/style.css">
    <link rel="shortcut icon" href="<?=base_url()?>public/assets/images/logo-mini.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <div class="auto-form-wrapper" style="padding:20px 30px;">
                    <h3 style="margin-bottom:30px; text-align:center;">Login Admin</h3>
                    <?php $this->view('messages') ?>
                    <form action="<?=site_url('auth/process')?>" method="post">
                        <div class="form-group">
                            <label class="label">Username</label>
                            <div class="input-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <!-- <i class="mdi mdi-check-circle-outline"></i> -->
                                </span>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Password</label>
                            <div class="input-group">
                            <input type="password" name="password" class="form-control" placeholder="*********" required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <!-- <i class="mdi mdi-check-circle-outline"></i> -->
                                </span>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                        </div>
                    </form>
                </div>
                <ul class="auth-footer">
                    <li>
                    <a href="#"></a>
                    </li>
                    <li>
                    <a href="#"></a>
                    </li>
                    <li>
                    <a href="#"></a>
                    </li>
                </ul>
                <p class="footer-text text-center">Copyright © 2022 - YukCoding Media. All rights reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?=base_url()?>public/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?=base_url()?>public/assets/vendors/js/vendor.bundle.addons.js"></script>
  </body>
</html>