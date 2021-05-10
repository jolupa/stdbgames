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
$routes->get('/', 'Main::index');
$routes->get('/add/developer', 'Developers::addformdevelopers');
$routes->get('/add/game', 'Games::addformgames');
$routes->get('/add/publisher', 'Publishers::addformpublishers');
$routes->get('/developer/(:segment)', 'Developers::overview/$1');
$routes->get('/db/list', 'Games::list');
$routes->get('/prices/list', 'Prices::list');
$routes->get('/games/coming', 'Games::listcoming');
$routes->get('/games/couch', 'Games::listcouch');
$routes->get('/games/crossplay', 'Games::listcrossplay');
$routes->get('/games/crossprogression', 'Games::listcrossprogression');
$routes->get('/games/crowdchoice', 'Games::listcrowdchoice');
$routes->get('/games/crowdplay', 'Games::listcrowdplay');
$routes->get('/games/earlyaccess', 'Games::listearlyaccess');
$routes->get('/games/exclusives', 'Games::listexclusives');
$routes->get('/games/firstonstadia', 'Games::listfirstonstadia');
$routes->get('/games/freetoplay', 'Games::listfreetoplay');
$routes->get('/games/launched', 'Games::listlaunched');
$routes->get('/games/online', 'Games::listonline');
$routes->get('/games/nodate', 'Games::listnodate');
$routes->get('/games/pro', 'Games::listpro');
$routes->get('/games/rumours', 'Games::listrumours');
$routes->get('/games/stateshare', 'Games::liststateshare');
$routes->get('/games/streamconnect', 'Games::liststreamconnect');
$routes->get('/game/(:segment)', 'Games::overview/$1');
$routes->get('/interviews/list', 'Interviews::list');
$routes->get('/publisher/(:segment)', 'Publishers::overview/$1');
$routes->get('/update/game/(:segment)', 'Games::updateformgames/$1');
$routes->get('/update/developer/(:segment)', 'Developers::updateformdeveloper/$1');
$routes->get('/update/publisher/(:segment)', 'Publishers::updateformpublisher/$1');
$routes->get('/users/login', 'Users::usersloginform');
$routes->get('/users/verify', 'Users::userslogin');

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
