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
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-7 order-1"><img class="bg-img-cover bg-center" src="<?php echo base_url(); ?>/vendors/cuba/assets/images/login/1.jpg" alt="looginpage"></div>
        <div class="col-xl-5 p-0">
          <div class="login-card">
            <div>
              <div><a class="logo text-start" href="index.html"><img class="img-fluid for-light" src="<?php echo base_url(); ?>/vendors/cuba/assets/images/logo/login.png" alt="looginpage"><img class="img-fluid for-dark" src="<?php echo base_url(); ?>/vendors/cuba/assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
              <div class="login-main"> 
                <h4>Sign in to account</h4>
                <p>Enter your email & password to login</p>
                <div class="alert alert-danger" style="display: none;" id="DivValidator">
                  <span id="SpanValidator"></span>  
                </div>
                <form class="theme-form" method="POST" action="javascript:void(0)" id="FrmLogin">
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" required="" name="email" placeholder="Test@gmail.com">
                    
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="password" required placeholder="*********">
                      <span class="text-danger text-sm" id="PasswordValidate">
                        
                      </span>
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                      <label class="text-muted" for="checkbox1">Remember password</label>
                    </div><a class="link" href="forget-password.html">Forgot password?</a>
                    <div class="g-recaptcha" data-sitekey="6Leo8AkjAAAAAOoPOKlj9QdB7-eI73zA09sk0p2O"></div>
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                    </div>
                  </div>
                  <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="<?= base_url('/=78888]]/register'); ?>">Create Account</a></p>
                  
               
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
      <!-- Theme js-->
      <script src="<?php echo base_url(); ?>/vendors/cuba/assets/js/script.js"></script>

      <!-- recap js-->
      <script src='https://www.google.com/recaptcha/api.js'></script>
      <script src="<?= base_url(); ?>/js/authentication/auth.js"></script>
      <script>
        var baseUrl = '<?= base_url(); ?>';
      </script>
    </div>
  </body>
</html>