<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="shortcut icon" href="<?= base_url();?>/vendors/landingpage/assets/images/logo/favicon.png" type="image/png">
    <link rel="icon" href="<?= base_url();?>/vendors/landingpage/assets/images/logo/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url();?>/vendors/landingpage/assets/images/logo/favicon.png" type="image/x-icon">
    <title>PROMIS - Procurement Management Information System</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendors/cuba/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendors/cuba/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendors/cuba/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendors/cuba/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendors/cuba/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendors/cuba/assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendors/cuba/assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendors/cuba/assets/css/vendors/photoswipe.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendors/cuba/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendors/cuba/assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url(); ?>/vendors/cuba/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendors/cuba/assets/css/responsive.css">
    <!-- dataTables css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendors/cuba/assets/css/vendors/datatables.css">
    <!-- sweetalert2 css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendors/cuba/libraries/sweetalert2/dist/sweetalert2.min.css">
    <style>
      .simplebar-content{
        text-align: center;
      }
      .text-ul{
        text-align: left;
      }
    </style>
     <!-- latest jquery-->
     <script src="<?= base_url(); ?>/vendors/cuba/assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="<?= base_url(); ?>/vendors/cuba/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  </head>
  <body class="dark-sidebar">
    <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
          <defs></defs>
          <filter id="goo">
            <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
            <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
          </filter>
        </svg>
      </div>
      <!-- tap on top starts-->
      <div class="tap-top"><i data-feather="chevrons-up"></i></div>
      <!-- tap on tap ends-->
      <!-- page-wrapper Start-->
      <div class="page-wrapper horizontal-wrapper enterprice-type" id="pageWrapper">
        <!-- Page Header Start-->
        <?php include('navbar.php');?>
        <!-- Page Header Ends   
                                  -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
          <!-- Page Sidebar Start-->
          <?php include('menu.php'); ?>
          <!-- Page Sidebar Ends-->
