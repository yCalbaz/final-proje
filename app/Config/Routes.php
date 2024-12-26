<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('admin', 'Admin::index', ['filter' => 'auth:admin']);

$routes->match(['get','post'],'uyeol', 'Home::uyeol');

$routes->get('hakkimizda', 'Home::hakkimizda');
$routes->get('index', 'Home::index');
$routes->get('urun', 'Home::urun');
$routes->get('iletisim', 'Home::iletisim');
$routes->get('sepet','Home::sepet');

$routes->get('uyeol', 'AuthController::uyeol'); // Üye olma formu için GET rotası
$routes->post('auth/register', 'AuthController::register'); // Form gönderimi için POST rotası

$routes->get('login', 'AuthController::login'); // Login sayfası için GET rota
$routes->post('login', 'AuthController::loginUser'); // Giriş işlemi için POST rota


 