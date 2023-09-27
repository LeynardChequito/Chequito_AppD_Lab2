<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/view', 'MainController::view');
$routes->post('/createPlaylist', 'MainController::createPlaylist');
$routes->post('/addsong', 'MainController::addsong');