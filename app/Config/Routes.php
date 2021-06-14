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
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.



// GUEST 
// home
$routes->get('/', 'HomeController::index');

// dokumen
$routes->get('/doc/(:segment)', 'Member\DocController::detail_guest/$1');



// MEMBER 
// dokumen
$routes->get('/user/doc/(:segment)', 'Member\DocController::detail_member/$1', ['filter' => 'role:member,admin']);

// profile
$routes->get('/user/profile', 'Member\ProfileController::index', ['filter' => 'role:member']);
$routes->post('/user/profile/update', 'Member\ProfileController::update', ['filter' => 'role:member']);

// peminjaman
$routes->get('/user/peminjaman', 'Member\PeminjamanController::index', ['filter' => 'role:member']);
$routes->get('/user/peminjaman/detail/(:segment)', 'Member\PeminjamanController::detail_pinjam/$1', ['filter' => 'role:member']);




// ADMIN
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
	$routes->get('infografis', 'Admin/InfografisController::index');

	// kelola users
	$routes->get('users', 'Admin/UserController::index');


	$routes->get('dokumen', 'Admin/AdminController::dokumen');
	$routes->get('getData', 'Admin/AdminController::getSubKategori');
<<<<<<< HEAD
	$routes->get('test', 'Admin/AdminController::getSubKategori');
=======
	$routes->get('/test', 'Admin/AdminController::getSubKategori');

	//dokumen routes
	$routes->post('dokumen/insert', 'Admin/AdminController::insert');
	$routes->get('dokumen/(:segment)', 'Admin\AdminController::detail/$1');
	$routes->get('dokumen/edit/(:segment)', 'Admin\AdminController::edit/$1');
	$routes->post('dokumen/update/', 'Admin/AdminController::update');
>>>>>>> f8a720767c3b7bbc9ee39dddc68f339af5177318
});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
