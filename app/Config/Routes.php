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
$routes->get('home/catalogo', 'Home::catalogo');
$routes->get('catalogo', 'Home::catalogo');
$routes->get('catalogo/(:num)', 'Home::catalogoDetalle/$1');
$routes->get('/nuevos_jugadores', 'StaticController::nuevos_jugadores');
$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/facturas', 'FacturasController::index');
$routes->get('admin/facturas/(:num)', 'FacturasController::verFactura/$1');
$routes->get('admin/inventario', 'InventarioController::index');
$routes->get('admin/inventario/nuevo', 'InventarioController::nuevoProducto');
$routes->get('admin/inventario/editar/(:num)', 'InventarioController::editarProducto/$1');
$routes->get('admin/inventario/eliminados', 'InventarioController::eliminados');
$routes->get('admin/inventario/eliminar/(:num)', 'InventarioController::eliminar/$1');
$routes->get('admin/inventario/restaurar/(:num)', 'InventarioController::restaurar/$1');
$routes->get('admin/categorias', 'CategoriaController::index');
$routes->get('admin/categorias/actualizar/(:num)', 'CategoriaController::actualizarCategoria/$1');
$routes->get('admin/usuarios', 'UsuariosController::index');
$routes->get('admin/usuarios/nuevo', 'UsuariosController::nuevoUsuario');
$routes->get('admin/usuarios/editar/(:num)', 'UsuariosController::editarUsuario/$1');
$routes->post('admin/usuarios/eliminar/(:num)', 'UsuariosController::eliminar/$1');
$routes->get('admin/usuarios/eliminados', 'UsuariosController::eliminados');
$routes->get('admin/usuarios/restaurar/(:num)', 'UsuariosController::restaurar/$1');



//post
$routes->post('/register/process', 'AuthController::process_register');


//Carrito
$routes->get('carrito', 'CarritoController::index');
$routes->post('agregar-al-carrito', 'CarritoController::agregar');
$routes->post('carrito/sumar', 'CarritoController::sumar');
$routes->post('carrito/restar', 'CarritoController::restar');
$routes->post('carrito/eliminar', 'CarritoController::eliminar');

//Pago
$routes->get('checkout', 'CheckoutController::pasoContacto');
$routes->post('checkout/contacto', 'CheckoutController::guardarContacto');
$routes->post('checkout/envio', 'CheckoutController::guardarEnvio');
$routes->post('checkout/pago', 'CheckoutController::guardarPago');
$routes->post('checkout/confirmar', 'CheckoutController::confirmarPedido');
$routes->get('checkout/confirmado', 'CheckoutController::confirmado');

//Vista De Administrador
$routes->get('admin', 'AdminController::index');

$routes->get('admin/pedidos', 'AdminController::pedidos');
$routes->get('admin/pedidos/(:num)', 'AdminController::verPedido/$1');

$routes->get('admin/inventario', 'AdminController::inventario');
$routes->get('admin/inventario/nuevo', 'AdminController::nuevoProducto');
$routes->post('admin/inventario/guardar', 'AdminController::guardarProducto');
$routes->get('admin/inventario/editar/(:num)', 'AdminController::editarProducto/$1');
$routes->post('admin/inventario/actualizar/(:num)', 'AdminController::actualizarProducto/$1');

$routes->get('admin/categorias', 'AdminController::categorias');
$routes->post('admin/categorias/editar', 'AdminController::editarCategoria');
$routes->post('admin/categorias/actualizar', 'AdminController::actualizarCategoria');
$routes->post('admin/categorias/guardar', 'AdminController::guardarCategoria');
$routes->get('admin/categorias/eliminar/(:num)', 'AdminController::eliminarCategoria/$1');

$routes->get('admin/usuarios', 'AdminController::usuarios');
$routes->get('admin/usuarios/nuevo', 'AdminController::nuevoUsuario');
$routes->post('admin/usuarios/guardar', 'AdminController::guardarUsuario');
$routes->get('admin/usuarios/editar/(:num)', 'AdminController::editarUsuario/$1');
$routes->post('admin/usuarios/actualizar/(:num)', 'AdminController::actualizarUsuario/$1');
$routes->get('admin/usuarios/eliminar/(:num)', 'AdminController::eliminarUsuario/$1');

$routes->get('admin/informes', 'AdminController::informes');

$routes->get('admin/notificaciones', 'AdminController::notificaciones');
$routes->get('admin/notificaciones', 'NotificacionesController::index');

