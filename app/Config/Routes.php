<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/**
 * ----------------
 * All About Auth
 * ----------------
 */
$routes->get('/login', 'Auth::login');


/**
 * ----------------
 * All About Admin
 * ----------------
 */
$routes->get('/admin', 'Admin\Dashboard::index');
$routes->get('/admin/user', 'Admin\User::index');
$routes->post('/admin/user/store', 'Admin\User::store');
$routes->get('/admin/user/edit/(:num)', 'Admin\User::edit/$1');
$routes->post('/admin/user/update', 'Admin\User::update');

$routes->get('/admin/guru', 'Admin\Guru::index');
$routes->get('/admin/guru/create', 'Admin\Guru::create');
$routes->post('/admin/guru/store', 'Admin\Guru::store');
$routes->get('/admin/guru/edit/(:any)', 'Admin\Guru::edit/$1');
$routes->post('/admin/guru/update', 'Admin\Guru::update');
$routes->get('/admin/guru/detail/(:any)', 'Admin\Guru::detail/$1');

/**
 * ----------------
 * All About Guru
 * ----------------
 */
$routes->get('/guru', 'Guru\Dashboard::index');
$routes->get('/guru/forum', 'Guru\Forum::index');
$routes->get('/guru/forum/create', 'Guru\Forum::create');
$routes->post('/guru/forum/store', 'Guru\Forum::store');
$routes->get('/guru/forum/detail/(:any)', 'Guru\Forum::detail/$1');

$routes->get('/guru/fmapel/create/(:any)', 'Guru\Fmapel::create/$1');
$routes->post('/guru/fmapel/store', 'Guru\Fmapel::store');

$routes->get('/guru/forum/diskusi/(:any)', 'Guru\Fdiskusi::diskusi/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
