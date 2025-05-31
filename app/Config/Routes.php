<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//get
$routes->get('/', 'Home::index');
$routes->get('/quienes', 'StaticController::quienes');
$routes->get('/comercializacion', 'StaticController::comercializacion');
$routes->get('home/contacto', 'Home::contacto');
$routes->get('/terminos', 'StaticController::terminos');
$routes->get('/proximamente', 'StaticController::proximamente');
$routes->get('/nuevos_jugadores', 'StaticController::nuevos_jugadores');
$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/facturas', 'FacturasController::index');
$routes->get('admin/facturas/(:num)', 'FacturasController::verFactura/$1');

//post
$routes->post('/register/process', 'AuthController::process_register');
$routes->post('/login/process', 'AuthController::process_login');
$routes->post('/logout', 'AuthController::logout');
