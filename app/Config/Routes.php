<?php

namespace Config;

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
$routes->setDefaultController('Main');
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
$routes->get ('/', 'Main::index');
$routes->get ('/add/company', 'Companies::addformcompanies');
$routes->get ('/add/game', 'Games::addformgames');
$routes->get ('/admin/panel', 'Admin::index');
$routes->get ('/company/(:segment)', 'Companies::overview/$1');
$routes->get ('/game/rumors', 'Games::rumorsall');
$routes->get ('/game/(:segment)', 'Games::overview/$1');
$routes->get ('/interviews/list', 'Interviews::list');
$routes->get ('/update/edition/(:segment)', 'Games::addformgames');
$routes->get ('/update/game/(:segment)', 'Games::addformgames');
$routes->get ('/update/company/(:segment)', 'Companies::addformcompanies/$1');
$routes->get ('/users/login', 'Users::usersloginform');
$routes->get ('/users/verify', 'Users::userslogin');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
