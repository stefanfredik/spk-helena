<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override("App\Controllers\NotFound");
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');
$routes->get("login", "Auth::login");
$routes->get("dashboard", "Dashboard");

$routes->get("user", "User::index");

$routes->group('profile', static function ($router) {
    $router->get('/', 'Profile::index');
    $router->get('tambah', 'Profile::tambah');
    $router->get('edit/(:num)', 'Profile::edit/$1');
    $router->get('delete/(:num)', 'Profile::delete/$1');
    $router->get('password/(:num)', 'Profile::password/$1');

    $router->post("/", "Profile::add");
    $router->post("(:num)", "Profile::update/$1");
    $router->post('password/(:num)', 'Profile::gantiPassword/$1');
});


$routes->group('kriteria', static function ($router) {
    $router->get('/', 'Kriteria::index');
    $router->get('table', 'Kriteria::table');
    $router->get('tambah', 'Kriteria::tambah');
    $router->get('(:num)', 'Kriteria::edit/$1');
    $router->get('delete/(:num)', 'Kriteria::delete/$1');

    $router->post('/', 'Kriteria::store');
    $router->post("(:num)", "Kriteria::update/$1");

    $router->delete("(:num)", "Kriteria::delete/$1");
});


$routes->group('subkriteria', static function ($router) {
    $router->get('/', 'Subkriteria::index');
    $router->get('table', 'Subkriteria::table');
    $router->get('tambah', 'Subkriteria::tambah');
    $router->get('(:num)', 'Subkriteria::edit/$1');
    $router->get('delete/(:num)', 'Subkriteria::delete/$1');

    $router->post('/', 'Subkriteria::store');
    $router->post("(:num)", "Subkriteria::update/$1");

    $router->delete("(:num)", "Subkriteria::delete/$1");
});



$routes->group('datasiswa', static function ($router) {
    $router->get('/', 'Datasiswa::index');
    $router->get('table', 'Datasiswa::table');
    $router->get('tambah', 'Datasiswa::tambah');
    $router->get('upload', 'Datasiswa::upload');
    $router->get('(:num)', 'Datasiswa::edit/$1');
    $router->get('detail/(:num)', 'Datasiswa::detail/$1');
    $router->get('delete/(:num)', 'Datasiswa::delete/$1');

    $router->post('/', 'Datasiswa::store');
    $router->post('upload', 'Datasiswa::doupload');
    $router->post("(:num)", "Datasiswa::update/$1");

    $router->delete("(:num)", "Datasiswa::delete/$1");
});


$routes->group('datapeserta', static function ($router) {
    $router->get('/', 'Peserta::index');
    $router->get('table', 'Peserta::table');
    $router->get('tambah', 'Peserta::tambah');
    $router->get('(:num)', 'Peserta::edit/$1');
    $router->get('detail/(:num)', 'Peserta::detail/$1');
    $router->get('delete/(:num)', 'Peserta::delete/$1');

    $router->post('/', 'Peserta::store');
    $router->post("(:num)", "Peserta::update/$1");

    $router->delete("(:num)", "Peserta::delete/$1");
});


// $routes->group("user", ['filter' => 'role:Admin'], function ($r) {
//     $r->get("/", "User::getIndex");
//     $r->get("tambah", "User::getTambah");
//     $r->get("edit/(:num)", "User::getEdit/$1");
//     $r->get("table", "User::getTable");

//     $r->post("/", "User::postIndex");
//     $r->post("saveedit/(:num)", "User::postSaveedit/$1");

//     $r->put("edit/(:num)", "User::putEdit/$1");

//     $r->delete("delete/(:num)", "User::deleteDelete/$1");
// });


$routes->group('user', static function ($router) {
    $router->get('/', 'User::index');
    $router->get('table', 'User::table');
    $router->get('tambah', 'User::tambah');
    $router->get('(:num)', 'User::edit/$1');
    // $router->get('delete/(:num)', 'User::delete/$1');

    $router->post('/', 'User::store');
    $router->post("(:num)", "User::update/$1");

    $router->delete("(:num)", "User::delete/$1");
});


$routes->group('periode', static function ($router) {
    $router->get('/', 'Periode::index');
    $router->get('table', 'User::table');
    $router->get('tambah', 'User::tambah');
    $router->get('(:num)', 'User::edit/$1');
    // $router->get('delete/(:num)', 'User::delete/$1');

    $router->post('/', 'User::store');
    $router->post("(:num)", "User::update/$1");

    $router->delete("(:num)", "User::delete/$1");
});


$routes->group('kuota', static function ($router) {
    $router->get("/", 'Kuota::index');
    $router->get('table', 'Kuota::table');
    $router->get('tambah', 'Kuota::tambah');
    $router->get('(:num)', 'Kuota::edit/$1');

    $router->post('/', 'Kuota::store');
    $router->post("(:num)", "Kuota::update/$1");

    $router->delete("(:num)", "Kuota::delete/$1");
});



$routes->get("perhitungan", 'Perhitungan::index');
$routes->get("keputusan", 'Keputusan::index');
$routes->get("laporan", 'Laporan::index');


$routes->get("saw", 'Saw::index');
$routes->get("topsis", 'Topsis::index');


// coba



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
