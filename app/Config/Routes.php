<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');
$routes->group('', ['filter' => 'AuthCheck'], function($routes){ 
    $routes->get('dashboard', 'DashboardController::index');
});


//$routes->get('/', 'landingpage\HomeController::index');
// $routes->get('/', 'Authentication\AuthenticationController::index');

$routes->post('test/check', 'Test::check');
//$routes->post('test/check', 'Test::check');
$routes->get('/hacker', function(){
    echo "Hacker ko";
});
$routes->get('tablue', 'Tablue::index');

//Authentications
$routes->get('/', 'authentications\AuthenticationController::index');
$routes->post('/login', 'authentications\AuthenticationController::LoginUser');
$routes->get('/logout/(:any)', 'authentications\AuthenticationController::LogoutUser/$1');
//regstration useracount
$routes->get('/=78888]]/register', 'authentications\AuthenticationController::RegisterView');
$routes->post('/newaccount', 'authentications\AuthenticationController::RegisterUser');



    // route for internet connection module
$routes->get('internet/new', 'Internet\NewAccountController::index');



    
    //sign in ISSSO
$routes->get('/issso', 'authentications\AuthenticationController::IsssoView');
$routes->get('issso_login', 'authentications\AuthenticationController::IsssoLogin');
$routes->get('issso_logout', 'authentications\AuthenticationController::LogoutUser');


$routes->get('/recap', 'GoogleReCaptcha::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
