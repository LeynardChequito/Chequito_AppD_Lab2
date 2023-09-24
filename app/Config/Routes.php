<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MainController::index');
$routes->post('/saveMusic', 'MainController::saveMusic');
$routes->post('/savePlaylist', 'MainController::savePlaylist');
$routes->post('/addToPlaylist', 'MainController::addToPlaylist');
$routes->get('/(:any)', 'MainController::playlist/$1');