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
$routes->setDefaultController('Games');
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
$routes->get('/', 'Games::index');
$routes->get('/game/(:segment)', 'Games::overview/$1');
$routes->get('/game/(:segment)/(:segment)', 'Games::overview/$1/$2');
$routes->get('/games/game/(:segment)', 'Games::overview/$1');
$routes->get('/list', 'Games::list');
$routes->get('/list/(:segment)', 'Games::list/$1');
$routes->get('/create/game', 'Games::insertform');
$routes->get('/create/developer', 'Developers::insertform');
$routes->get('/create/publisher', 'Publishers::insertform');
$routes->get('/update/game/(:segment)', 'Games::updateform/$1');
$routes->get('/update/developer/(:segment)', 'Developers::updateform/$1');
$routes->get('/update/publisher/(:segment)', 'Publishers::updateform/$1');
$routes->get('developer/(:segment)', 'Developers::overview/$1');
$routes->get('publisher/(:segment)', 'Publishers::overview/$1');
$routes->get('/signup', 'Users::signupform');
$routes->get('/login', 'Users::loginform');
$routes->get('/logout', 'Users::logoutuser');
$routes->get('/user/profile/(:segment)', 'Users::profile/$1');
$routes->get('/user/edit/(:segment)', 'Users::edituser/$1');
$routes->get('/user/reset', 'Users::resetpasswordbymailform');
$routes->get('/add/tolibrary/(:segment)', 'Libraries::addtouserlibrary/$1');
$routes->get('/add/towishlist/(:segment)', 'Wishlists::addToUserWishlist/$1');
$routes->get('/about', 'Games::about');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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
