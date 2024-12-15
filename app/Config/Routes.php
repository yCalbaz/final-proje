<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Anasayfa::index');
$routes->get('/admin', 'Admin::index');
$routes->match(['get','post'],'login', 'Anasayfa::login');

