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

// -----------------------------------------------------------------------------------------


// MEMBER & ADMIN
// profile
$routes->get('/user/profile', 'Member\ProfileController::index');
$routes->post('/us7er/profile/update', 'Member\ProfileController::update');

// dokumen
$routes->get('/user/doc/(:segment)', 'Member\DocController::detail_member/$1');

// -----------------------------------------------------------------------------------------



// MEMBER 
// peminjaman
$routes->group('user', ['filter' => 'role:member'], function ($routes) {
	$routes->get('peminjaman', 'Member\PeminjamanController::index');
	$routes->get('peminjaman/detail/(:segment)', 'Member\PeminjamanController::detail_pinjam/$1');
	$routes->get('peminjaman/tiket/(:segment)', 'Member\PeminjamanController::tiket/$1');
	$routes->post('peminjaman/pinjam/(:segment)', 'Member\PeminjamanController::pinjam/$1');
});

// -----------------------------------------------------------------------------------------



// ADMIN
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
	$routes->get('infografis', 'Admin/InfografisController::index');

	// kelola peminjaman
	$routes->get('peminjaman', 'Admin\PeminjamanController::index');
	$routes->get('peminjaman/getdata', 'Admin\PeminjamanController::getData');
	$routes->post('peminjaman/konfirmasi/(:segment)', 'Admin\PeminjamanController::konfirmasi/$1');
	$routes->post('peminjaman/kembali/(:segment)', 'Admin\PeminjamanController::kembali/$1');
	$routes->get('peminjaman/detail/(:segment)', 'Admin\PeminjamanController::detail/$1');

	// history peminjaman
	$routes->get('peminjaman/history', 'Admin\PeminjamanController::history');
	$routes->get('peminjaman/history/detail/(:segment)', 'Admin\PeminjamanController::detail_history/$1');

	// kelola users
	$routes->get('users', 'Admin/UserController::index');
	$routes->get('changeStatus', 'Admin/UserController::changeStatus');


	$routes->get('dokumen', 'Admin/AdminController::dokumen');
	$routes->get('getData', 'Admin/AdminController::getSubKategori');
	$routes->get('/test', 'Admin/AdminController::getSubKategori');

	//dokumen routes
	$routes->get('dokumen/tambah', 'Admin\AdminController::tambah');
	$routes->post('dokumen/insert', 'Admin/AdminController::insert');
	$routes->get('dokumen/(:segment)', 'Admin\AdminController::detail/$1');
	$routes->get('dokumen/edit/(:segment)', 'Admin\AdminController::edit/$1');
	$routes->post('dokumen/update/(:segment)', 'Admin\AdminController::update/$1');
	$routes->delete('dokumen/delete/(:segment)', 'Admin\AdminController::delete/$1');

	//kategori routes
	$routes->get('kategori', 'Admin\KategoriController::index');
	$routes->post('kategori/insert', 'Admin\KategoriController::insert');
	$routes->get('kategori/edit/(:segment)', 'Admin\KategoriController::edit/$1');
	$routes->post('kategori/update/(:segment)', 'Admin\KategoriController::update/$1');
	$routes->delete('kategori/delete/(:segment)', 'Admin\KategoriController::delete/$1');

	//Sub kategori routes
	$routes->get('subkategori', 'Admin\SubKategoriController::index');
	$routes->post('subkategori/insert', 'Admin\SubKategoriController::insert');
	$routes->get('subkategori/edit/(:segment)', 'Admin\SubKategoriController::edit/$1');
	$routes->post('subkategori/update/(:segment)', 'Admin\SubKategoriController::update/$1');
	$routes->delete('subkategori/delete/(:segment)', 'Admin\SubKategoriController::delete/$1');

	// test upload gdrive
	$routes->get('gdrive', 'Admin\GDriveController::gdrive');
	$routes->post('gdrive/insert', 'Admin\GDriveController::upload');
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
