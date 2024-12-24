<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin', 'Admin::index');
$routes->match(['get','post'],'login', 'Home::login');
$routes->match(['get','post'],'uyeol', 'Home::uyeol');

$routes->get('hakkimizda', 'Home::hakkimizda');
$routes->get('index', 'Home::index');
$routes->get('urun', 'Home::urun');
$routes->get('iletisim', 'Home::iletisim');
$routes->get('sepet','Home::sepet');