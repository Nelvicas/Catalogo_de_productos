<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('/productos', 'Productos::index');
$routes->get('/productos/(:num)', 'Productos::detalleProducto/$1');