<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::index');
$routes->get('login', 'Admin::login');
$routes->post('post_login', 'Admin::post_login');
$routes->get('logout', 'Admin::logout');

$routes->get('catalogos/', 'Catalogos::index');

$routes->get('usuario/', 'Usuario::index');
$routes->get('usuario/detalle/(:num)', 'Usuario::detalle/$1');
$routes->post('usuario/nuevo', 'Usuario::nuevo');
$routes->post('usuario/guardar', 'Usuario::guardar');
$routes->post('usuario/guardar_activo', 'Usuario::guardar_activo');
$routes->get('usuario/eliminar/(:num)', 'Usuario::eliminar/$1');

$routes->get('rol/', 'Rol::index');

$routes->get('opcion_sistema/', 'Opcion_sistema::index');
$routes->get('opcion_sistema/detalle/(:num)', 'Opcion_sistema::detalle/$1');
$routes->post('opcion_sistema/nuevo', 'Opcion_sistema::nuevo');
$routes->post('opcion_sistema/guardar', 'Opcion_sistema::guardar');
$routes->post('opcion_sistema/guardar_otorgable', 'Opcion_sistema::guardar_otorgable');
$routes->get('opcion_sistema/eliminar/(:num)', 'Opcion_sistema::eliminar/$1');

$routes->get('acceso_sistema/', 'Acceso_sistema::index');
$routes->post('acceso_sistema/nuevo', 'Acceso_sistema::nuevo');
$routes->post('acceso_sistema/guardar', 'Acceso_sistema::guardar');
$routes->get('acceso_sistema/eliminar/(:num)', 'Acceso_sistema::eliminar/$1');

$routes->get('parametro_sistema/', 'Parametro_sistema::index');
$routes->get('parametro_sistema/detalle/(:num)', 'Parametro_sistema::detalle/$1');
$routes->post('parametro_sistema/nuevo', 'Parametro_sistema::nuevo');
$routes->post('parametro_sistema/guardar', 'Parametro_sistema::guardar');
$routes->get('parametro_sistema/eliminar/(:num)', 'Parametro_sistema::eliminar/$1');

$routes->post('acceso_sistema_usuario/guardar', 'Acceso_sistema_usuario::guardar');
$routes->get('acceso_sistema_usuario/eliminar/(:num)', 'Acceso_sistema_usuario::eliminar/$1');

$routes->post('archivo/subir', 'Archivo::subir');
$routes->post('archivo/eliminar', 'Archivo::eliminar');

$routes->get('proceso/', 'Proceso::index');

$routes->get('reportes/', 'Reportes::index');
$routes->get('reportes/bitacora', 'Reportes::bitacora');
$routes->get('reportes/bitacora/(:segment)', 'Reportes::bitacora/$1');
