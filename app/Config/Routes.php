<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/quienes', 'StaticController::quienes');
$routes->get('/comercializacion', 'StaticController::comercializacion');
$routes->get('home/contacto', 'Home::contacto');
$routes->get('/terminos', 'StaticController::terminos');
$routes->get('/proximamente', 'StaticController::proximamente');
$routes->get('/nuevos_jugadores', 'StaticController::nuevos_jugadores');
$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->post('/register/process', 'AuthController::process_register');

