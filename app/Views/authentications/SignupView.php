<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo base_url(); ?>/vendors/images/logo/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/vendors/images/logo/favicon.png" type="image/x-icon">
    <title>I-AIMS - Internal Audit Information Management System</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/vendors/cuba/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/vendors/cuba/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/vendors/cuba/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/vendors/cuba/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/vendors/cuba/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/vendors/cuba/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/vendors/cuba/assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo base_url(); ?>/vendors/cuba/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/vendors/cuba/assets/css/responsive.css">
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid p-0"> 
      <div class="row m-0">
        <div class="col-xl-7 p-0">
          <img class="bg-img-cover bg-center" src="<?php echo base_url(); ?>/vendors/cuba/assets/images/login/1.jpg" alt="looginpage">
        </div>
        <div class="col-xl-5 p-0"> 
          <div class="login-card">
            <div>
              <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="<?php echo base_url(); ?>/vendors/images/logo/logo-navbar.png" alt="looginpage"><img class="img-fluid for-dark" src="<?php echo base_url(); ?>/vendors/cuba/assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
              <div class="login-main"> 
                <h4>Create your account</h4>
                <p>Enter your personal details to create account</p>
                <?php 
                  if(!empty(session()->getFlashdata('success'))){ ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                  <?php }else if(!empty(session()->getFlashdata('failed'))){?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('failed') ?></div>
                <?php } ?>
                <form class="theme-form" method="POST" action="<?= base_url('/=78888]]/newaccount'); ?>">
                  <?= csrf_field(); ?>
                  <div class="form-group">
                    <label class="col-form-label pt-0">Your Name</label>
                    <div class="row g-2">
                      <div class="col-6">
                        <input class="form-control" type="text" required="" name="firstname" value="<?= set_value('firstname'); ?>" placeholder="First name">
                      </div>
                      <div class="col-6">
                        <input class="form-control" type="text" required="" name="lastname" value="<?= set_value('lastname'); ?>" placeholder="Last name">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" required="" name="email"value="<?= set_value('email'); ?>"  placeholder="Test@gmail.com">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="password" required="" value="<?= set_value('password'); ?>" placeholder="*********">
                      <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'password') : ''; ?>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Confirm Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="confirm_password" required="" value="<?= set_value('confirm_password'); ?>" placeholder="*********">
                      <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'confirm_password') : ''; ?>
                      </span>
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                      <label class="text-muted" for="checkbox1">Agree with<a class="ms-2" href="#">Privacy Policy</a></label>
                    </div>
                    <button class="btn btn-primary btn-block w-100" type="submit">Create Account</button>
                    <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2" href="<?= base_url('/=7911]]/signin')?>">Sign in</a></p>
                  </div>
                  <h6 class="text-muted mt-4 or">Back to</h6>
                  <div class="social mt-4">
                    <div class="btn-showcase">
                      <a class="btn btn-light w-100" href="<?= base_url('/')?>" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> Landing Page </a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="<?php echo base_url(); ?>/vendors/cuba/assets/js/jquery-3.5.1.min.js"></script>
      <!-- Bootstrap js-->
      <script src="<?php echo base_url(); ?>/vendors/cuba/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <!-- feather icon js-->
      <script src="<?php echo base_url(); ?>/vendors/cuba/assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="<?php echo base_url(); ?>/vendors/cuba/assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="<?php echo base_url(); ?>/vendors/cuba/assets/js/config.js"></script>
      <!-- Plugins JS start-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="<?php echo base_url(); ?>/vendors/cuba/assets/js/script.js"></script>
      <!-- login js-->
      <!-- Plugin used-->
    </div>
  </body>
</html>