<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/mainview', 'MainController::mainview');
$routes->post('/saveMusic', 'MainController::saveMusic');
$routes->post('/doupload', 'MainController::doupload');
$routes->post('/create_playlist', 'MainController::create_playlist');
$routes->get('/edit_playlist/(:any)', 'MainController::edit_playlist/$1');
$routes->get('/delete_playlist/(:any)', 'MainController::delete_playlist/$1');
$routes->post('/addtoplaylist', 'MainController::addToPlaylist');
$routes->get('/playlist/(:any)', 'MainController::viewPlaylist/$1');
$routes->get('/search', 'MainController::search');
$routes->get('/removeFromPlaylist/(:segment)', 'MainController::removeFromPlaylist/$1');