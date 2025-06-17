<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//get
$routes->get('/', 'Home::index');
$routes->get('/quienes', 'StaticController::quienes');
$routes->get('/comercializacion', 'StaticController::comercializacion');
$routes->get('/contacto', 'ContactoController::index');
$routes->get('/terminos', 'StaticController::terminos');
$routes->get('/proximamente', 'StaticController::proximamente');
$routes->get('/nuevos_jugadores', 'StaticController::nuevos_jugadores');
$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->group('admin', ['filter' => 'adminFilter'], function($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('facturas', 'FacturasController::index');
    $routes->get('facturas/(:num)', 'FacturasController::verFactura/$1');
    $routes->get('inventario', 'InventarioController::index');
    $routes->get('inventario/nuevo', 'InventarioController::nuevoProducto');
    $routes->get('inventario/editar/(:num)', 'InventarioController::editarProducto/$1');
    $routes->get('inventario/eliminados', 'InventarioController::eliminados');
    $routes->get('inventario/eliminar/(:num)', 'InventarioController::eliminar/$1');
    $routes->get('inventario/restaurar/(:num)', 'InventarioController::restaurar/$1');
    $routes->get('categorias', 'CategoriaController::index');
    $routes->get('categorias/actualizar/(:num)', 'CategoriaController::actualizarCategoria/$1');
    $routes->get('usuarios', 'UsuariosController::index');
    $routes->get('usuarios/nuevo', 'UsuariosController::nuevoUsuario');
    $routes->get('usuarios/editar/(:num)', 'UsuariosController::editarUsuario/$1');
    $routes->post('usuarios/actualizar/(:num)', 'AdminController::actualizarUsuario/$1');
    $routes->get('usuarios/eliminar/(:num)', 'UsuariosController::eliminarUsuario/$1');
    $routes->get('usuarios/eliminados', 'UsuariosController::eliminados');
    $routes->get('usuarios/restaurar/(:num)', 'UsuariosController::restaurar/$1');
    $routes->get('informes', 'InformeController::index');
    $routes->get('consultas', 'ConsultasController::index');
    $routes->get('consultas/eliminar/(:alpha)/(:num)', 'ConsultasController::eliminar/$1/$2');

});

$routes->get('/catalogo', 'CatalogoController::index');
$routes->get('/catalogo/(:num)', 'CatalogoController::catalogoDetalle/$1');
$routes->get('/carrito', 'CarritoController::index');
$routes->get('/checkout', 'CheckoutController::index');

//post
$routes->post('/register/process', 'AuthController::process_register');
$routes->post('/login/process', 'AuthController::process_login');
$routes->post('/logout', 'AuthController::logout');
$routes->post('/admin/inventario/cargar', 'InventarioController::cargarProducto');
$routes->post('/admin/inventario/actualizar/(:num)', 'InventarioController::actualizarProducto/$1');
$routes->post('/admin/categorias/cargar', 'CategoriaController::cargarCategoria');
$routes->post('/admin/categorias/eliminar/(:num)', 'CategoriaController::eliminarCategoria/$1');
$routes->post('admin/categorias/actualizar', 'CategoriaController::actualizarCategoria');
$routes->post('admin/usuarios/guardar', 'UsuariosController::guardarUsuario');
$routes->post('admin/usuarios/actualizar/(:num)', 'UsuariosController::actualizarUsuario/$1');
$routes->post('admin/usuarios/eliminar/(:num)', 'UsuariosController::eliminarUsuario/$1');
$routes->post('agregar-al-carrito', 'CarritoController::agregar');
$routes->post('carrito/restar', 'CarritoController::restar');
$routes->post('carrito/sumar', 'CarritoController::sumar');
$routes->post('carrito/eliminar', 'CarritoController::eliminar');
$routes->post('contacto/enviar', 'ContactoController::enviarContacto');
$routes->post('inquiry/enviar', 'ContactoController::enviarInquiry');
