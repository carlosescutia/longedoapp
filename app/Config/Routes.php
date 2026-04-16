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
$routes->get('reportes/asistentes_evento/(:segment)', 'Reportes::asistentes_evento/$1');
$routes->get('reportes/asistentes_evento/(:segment)/(:segment)', 'Reportes::asistentes_evento/$1/$2');



$routes->get('perfil/', 'Perfil::detalle');
$routes->post('perfil/guardar', 'Perfil::guardar');

$routes->get('usuario/lista_evaluadores', 'Usuario::lista_evaluadores');
$routes->post('usuario/guardar_evaluador', 'Usuario::guardar_evaluador');

$routes->get('evento/detalle/(:num)', 'Evento::detalle/$1');
$routes->post('evento/nuevo', 'Evento::nuevo');
$routes->get('evento/editar/(:num)', 'Evento::editar/$1');
$routes->post('evento/guardar', 'Evento::guardar');
$routes->get('evento/eliminar/(:num)', 'Evento::eliminar/$1');
$routes->post('evento/asistir', 'Evento::asistir');
$routes->post('evento/cancelar', 'Evento::cancelar');

$routes->get('comunidad/', 'Comunidad::index');
$routes->get('comunidad/detalle/(:num)', 'Comunidad::detalle/$1');
$routes->post('comunidad/nuevo', 'Comunidad::nuevo');
$routes->post('comunidad/guardar', 'Comunidad::guardar');
$routes->get('comunidad/eliminar/(:num)', 'Comunidad::eliminar/$1');

