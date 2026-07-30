<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('/productos', 'Productos::index');
$routes->get('/productos/(:num)', 'Productos::detalleProducto/$1');
$routes->get('/productos/agregarProducto', 'Productos::agregarProducto');
$routes->post('/productos/guardarProducto', 'Productos::guardarProducto');


// prueba conexion db 

$routes->get('/prueba-conexion', 'Productos::pruebaConexion');