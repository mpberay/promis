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
$routes->set404Override(function(){
    echo view('Page404');
});
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
    $routes->get('dashboard', 'dashboard\DashboardController::index');
    //$routes->get('dashboard', 'DashboardController::index');

    //for users module
    $routes->get('/users/@list', 'users\UsersController::userListPage',['as' => 'userListPage']);
    $routes->get('/users/@logs', 'users\UsersController::userLogsPage',['as' => 'userLogsPage']);
    $routes->get('/users/loadLogs', 'users\UsersController::loadLogs');
    $routes->get('/users/loadList', 'users\UsersController::loadList');


    //for libraries/offices module
    $routes->get('/libraries/@offices', 'Libraries\Office\MainController::officePage',['as' => 'officePage']);

    $routes->get('/libraries/position/load/(:any)', 'Libraries\Office\PositionController::loadPosition/$1');
    $routes->post('/libraries/position/action', 'Libraries\Office\PositionController::actionInsert');
    $routes->post('/libraries/position/status', 'Libraries\Office\PositionController::actionStatus');
});


//$routes->get('/', 'landingpage\HomeController::index');
// $routes->get('/', 'Authentication\AuthenticationController::index');

$routes->post('test/check', 'Test::check');
//$routes->post('test/check', 'Test::check');
$routes->get('/hacker', function(){
    echo "Hacker ko";
});

//Authentications homepage
$routes->get('/', 'authentications\AuthenticationController::index',['as' => 'homePage']);


$routes->post('/login', 'authentications\AuthenticationController::LoginUser',['as' => 'loginAction']);
$routes->get('/logout/(:any)', 'authentications\AuthenticationController::LogoutUser/$1');
//regstration useracount
$routes->get('/=78888]]/register', 'authentications\AuthenticationController::RegisterView');
$routes->post('/newaccount', 'authentications\AuthenticationController::RegisterUser');




 


    
    //sign in ISSSO
$routes->get('/issso', 'authentications\AuthenticationController::IsssoView');
$routes->get('issso_login', 'authentications\AuthenticationController::IsssoLogin');
$routes->get('issso_logout', 'authentications\AuthenticationController::LogoutUser');


$routes->get('/recap', 'GoogleReCaptcha::index');

//routing for grouping
$routes->group('wajamo',static function($routes){
    $routes->group('', [], static function($routes){
        $routes->get('', 'landingpage\HomeController::index');
    });
});


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
