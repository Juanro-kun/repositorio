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
$routes->get('contacto/confirmacion', 'ContactoController::confirmacion');
$routes->get('/terminos', 'StaticController::terminos');
$routes->get('/proximamente', 'StaticController::proximamente');
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
$routes->post('admin/usuarios/actualizar/(:num)', 'AdminController::actualizarUsuario/$1');
$routes->get('admin/usuarios/eliminar/(:num)', 'UsuariosController::eliminarUsuario/$1');
$routes->get('admin/usuarios/eliminados', 'UsuariosController::eliminados');
$routes->get('admin/usuarios/restaurar/(:num)', 'UsuariosController::restaurar/$1');
$routes->get('admin/consultas', 'ConsultasController::index');
$routes->get('admin/consultas/eliminar/(:alpha)/(:num)', 'ConsultasController::eliminar/$1/$2');
$routes->get('admin/informes', 'InformeController::index');
$routes->get('/catalogo', 'CatalogoController::index');
$routes->get('/catalogo/(:num)', 'CatalogoController::catalogoDetalle/$1');
$routes->get('/carrito', 'CarritoController::index');
$routes->get('checkout/confirmado', 'CheckoutController::confirmado');
$routes->get('checkout/envio', 'CheckoutController::envio');
$routes->get('perfil', 'PerfilController::index');
$routes->get('perfil/pedidos', 'PerfilController::pedidos');


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
$routes->post('contacto/confirmacion', 'ContactController::confirmacion');
$routes->post('inquiry/enviar', 'ContactoController::enviarInquiry');
$routes->post('checkout/guardarContacto', 'CheckoutController::guardarContacto');
$routes->post('checkout/guardarEnvio', 'CheckoutController::guardarEnvio');
$routes->post('checkout/guardarPago', 'CheckoutController::guardarPago');
$routes->post('checkout/confirmarPedido', 'CheckoutController::confirmarPedido');