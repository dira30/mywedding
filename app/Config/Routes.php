<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/auth', 'Auth::authLogin', ['filter' => 'noauth']);
$routes->match(['get', 'post'], '/penguin', 'Auth::authLoginAdmin', ['filter' => 'noauth']);
$routes->get('/register', 'Auth::register', ['filter' => 'noauth']);
// $routes->post('/auth/login', 'Auth::auth');
$routes->get('activate-account', 'Auth::activateAccount', ['filter' => 'noauth']);
$routes->get('/welcome', 'Login::welcome');
$routes->get('/detail/recordData/(:any)', 'Home::record_data');
$routes->get('/event/(:any)/merchandise', 'Home::getMerchandise/$1');
$routes->get('/event/(:any)/register', 'Home::registerEvent/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/event/(:any)', 'Home::detailEvent/$1');
$routes->get('/myActivity/(:any)/(:any)', 'User::myActivity/$1/$2', ['filter' => 'auth']);
$routes->get('/myMember/(:any)/(:any)', 'User::myMember/$1/$2', ['filter' => 'auth']);
$routes->get('/myEvent', 'User::MyEvent', ['filter' => 'auth']);
$routes->get('/myMerchandise', 'User::myMerchandise', ['filter' => 'auth']);
$routes->get('/mySertificate', 'User::sertificate', ['filter' => 'auth']);
$routes->get('/sertificate/download/(:any)', 'User::generateSertificate/$1', ['filter' => 'auth']);
$routes->get('/performance', 'User::myPerformance', ['filter' => 'auth']);
$routes->get('/myHistoryPayment', 'User::myHistoryPayment', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/profile', 'User::MyProfile', ['filter' => 'auth']);
$routes->post('/voucher/check', 'Home::checkVoucher', ['filter' => 'auth']);
$routes->post('/join', 'Home::joinEvent', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/payment/(:any)', 'Payment::savePayment/$1', ['filter' => 'auth']);
$routes->post('/pay/callback', 'Payment::callback', ['filter' => 'auth']);
$routes->get('/pay/redirect', 'Payment::redirect', ['filter' => 'auth']);
$routes->get('/expiredEvent', 'Home::expiredEvent');
$routes->match(['get', 'post'], '/contactus', 'Home::contactus');
$routes->match(['get', 'post'], '/merchandise/(:any)/buy', 'Home::buyMerchandise/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/merchandise/(:any)/buy/(:any)', 'Home::buyMerchandise/$1/$2', ['filter' => 'auth']);
$routes->post('/buyMerchant', 'Home::postDataMerchant', ['filter' => 'auth']);
$routes->post('/saveMember/(:any)', 'User::saveMember/$1', ['filter' => 'auth']);
$routes->get('/member/confirm/(:any)', 'User::activationMember/$1');

$routes->get('/logout', 'Auth::logout');
$routes->get('/logoutAdmin', 'Auth::logoutAdmin');
$routes->match(['get', 'post'], '/lupa-password', 'Auth::forgotPassword');
$routes->match(['get', 'post'], 'reset-password', 'Auth::resetPassword');
$routes->post('/kirim-pesan', 'Home::kirimPesan');

$routes->get('add_event', 'EOController::create', ['filter' => 'auth']);
$routes->get('payment', 'EOController::payment', ['filter' => 'auth']);
$routes->get('eo/merchandise', 'EOController::merchandise', ['filter' => 'auth']);
$routes->get('eo/merchandise/(:any)', 'EOController::list_merchandise/$1', ['filter' => 'auth']);
$routes->get('eo/merchandise/(:any)/(:any)', 'EOController::list_merchandise/$1/$2', ['filter' => 'auth']);
$routes->get('eo/merchandise/(:any)/(:any)/(:any)', 'EOController::list_merchandise/$1/$2/$3', ['filter' => 'auth']);
$routes->post('saveCity', 'EOController::saveCity', ['filter' => 'auth']);
$routes->post('saveCourier', 'EOController::saveCourier', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'create_event', 'EOController::create', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'create_product', 'EOController::create_product', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'edit_product', 'EOController::edit_product', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'edit_event/(:any)', 'EOController::edit/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'detail_event/(:any)', 'EOController::detail/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'peserta/(:any)/(:any)', 'EOController::peserta/$1/$2', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'leaderboard_event/(:any)', 'EOController::leaderboard_detail/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'leaderboard/(:any)/(:any)', 'EOController::leaderboard_detail_kategori/$1/$2', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'EO/sertifikat/edit/(:any)', 'EOController::editTemplateSertif/$1', ['filter' => 'auth']);
$routes->match(['get'], 'download/(:any)/(:any)/(:any)', 'EOController::download/$1/$2/$3', ['filter' => 'auth']);
$routes->get('leaderboard', 'EOController::leaderboard', ['filter' => 'auth']);
$routes->get('tracking/(:any)', 'EOController::tracking/$1', ['filter' => 'auth']);
$routes->get('eo/order', 'EOController::order', ['filter' => 'auth']);
$routes->get('eo/order/detail_order/(:any)', 'EOController::detail_order/$1', ['filter' => 'auth']);
// $routes->get('leaderboard/(:any)', 'EOController::leaderboard_detail/$1', ['filter' => 'auth']);
// $routes->get('leaderboard/(:any)/(:any)', 'EOController::leaderboard_detail_kategori/$1/$2', ['filter' => 'auth']);
$routes->get('cekAsync', 'Api\v1\AuthController::cekAsync', ['filter' => 'auth']);
$routes->post('gantiPass', 'EOController::gantiPass', ['filter' => 'auth']);


//API
$routes->group('api/v1', function ($routes) {
    $routes->get('strava/invoke', 'Api\v1\AuthController::invoke');
    $routes->get('strava/auth', 'Api\v1\AuthController::auth');
    $routes->get('strava/revoke', 'Api\v1\AuthController::revoke');
    $routes->post('strava/activities', 'Api\v1\AuthController::activities');
    $routes->match(['get', 'post'], 'strava/subs', 'Api\v1\AuthController::subscription');
    $routes->match(['get', 'post'], 'strava/webhook', 'Api\v1\AuthController::webhook');
    $routes->get('strava/cekSubs', 'Api\v1\AuthController::checkSubs');
    $routes->match(['get', 'post'], 'strava/longone', 'Api\v1\AuthController::longone');
    $routes->get('strava/processNotif', 'Api\v1\AuthController::processNotif');
    $routes->get('checkPayment', 'Api\v1\AuthController::checkPaymentTransaction');
});

$routes->group('penguin', ['filter' => 'auth-admin'], function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->match(['get', 'post'], 'faq', 'Admin\FAQ::index');
    $routes->get('contactUs', 'Admin\ContactUs::index');
    $routes->match(['get', 'post'], 'user', 'Admin\User::index');
});

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
