<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index');
$routes->get('home/quienes', 'Home::quienes');
$routes->get('home/comercializacion', 'Home::comercializacion');
$routes->get('home/contacto', 'Home::contacto');
$routes->post('home/enviarConsulta', 'Home::enviarConsulta');
$routes->get('home/terminos', 'Home::terminos');
$routes->get('home/proximamente', 'Home::proximamente');
$routes->get('home/nuevos_jugadores', 'Home::nuevos_jugadores');
$routes->get('home/catalogo', 'Home::catalogo');

// Catalogo y detalles
$routes->get('catalogo', 'Home::catalogo');
$routes->get('catalogo/(:segment)', 'Home::catalogoDetalle/$1');

$routes->get('usuarios', 'Usuario_Controller::index');
$routes->get('usuarios/agregar', 'Usuario_Controller::agregar');
$routes->post('usuarios/guardar', 'Usuario_Controller::guardar');
$routes->get('usuarios/eliminar/(:num)', 'Usuario_Controller::eliminar/$1');





