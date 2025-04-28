<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home/quienes', 'Home::quienes');
$routes->get('home/comercializacion', 'Home::comercializacion');
$routes->get('home/contacto', 'Home::contacto');
$routes->get('home/terminos', 'Home::terminos');
$routes->get('home/proximamente', 'Home::proximamente');
$routes->get('home/nuevos_jugadores', 'Home::nuevos_jugadores');


