<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //Rutas utilizadas en el crud
$routes->get('/', 'Crud::index');
$routes->get('/obtenerNombre/(:any)', 'Crud::obtenerNombre/$1');
$routes->get('/eliminar/(:any)', 'Crud::eliminar/$1');
$routes->post('/crear', 'Crud::crear');
$routes->post('/actualizar', 'Crud::actualizar');
$routes->get('buscar', 'Crud::buscar');
