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
            <div><div class="login-main"> 
                <h4>Create your account</h4>
                <p>Enter your personal details to create account</p>
                <?php 
                  if(!empty(session()->getFlashdata('success'))){ ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                  <?php }else if(!empty(session()->getFlashdata('failed'))){?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('failed') ?></div>
                <?php } ?>
                <form class="theme-form" method="POST" action="javascript:void(0)" id="frmRegistration">
                  <?= csrf_field(); ?>
                  <div class="form-group">
                    <input class="form-control" type="text" required="" name="firstname" value="<?= set_value('firstname'); ?>" placeholder="First Name1">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="text" required="" name="middlename" value="<?= set_value('middlename'); ?>" placeholder="Middle Name">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="text" required="" name="lastname" value="<?= set_value('lastname'); ?>" placeholder="Last Name">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="email" required="" name="email" value="<?= set_value('email'); ?>"  placeholder="Official Email Address (@dswd.gov.ph)">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">User Account</label>
                    <input class="form-control" type="text" required="" name="username" value="<?= set_value('email'); ?>"  placeholder="Username">
                  </div>
                  <div class="form-group">
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="password" required="" value="<?= set_value('password'); ?>" placeholder="Password">
                      <div class="show-hide">
                        <span class="show" onclick="registerShowPassword();" id="registerSpanPassword"></span>
                      </div>
                      <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'password') : ''; ?>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="confirm_password" required="" value="<?= set_value('confirm_password'); ?>" placeholder="Confirm Password">
                      <div class="show-hide">
                        <span class="show" onclick="confirmShowPassword();" id="confirmSpanPassword"></span>
                      </div>
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
                    <button class="btn btn-primary btn-block w-100" type="submit">Save</button>
                    <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2" href="<?= base_url('/')?>">Sign in</a></p>
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
      <script src="<?= base_url(); ?>/js/authentication/auth.js"></script>
      <script>
        var baseUrl = '<?= base_url(); ?>';
      </script>
    </div>
  </body>
</html>