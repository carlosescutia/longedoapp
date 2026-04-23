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
$routes->get('reportes/playeras_evento/(:segment)', 'Reportes::playeras_evento/$1');
$routes->get('reportes/playeras_evento/(:segment)/(:segment)', 'Reportes::playeras_evento/$1/$2');



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

$routes->get('evaluacion/detalle/(:num)', 'Evaluacion::detalle/$1');
$routes->post('evaluacion/nuevo', 'Evaluacion::nuevo');
$routes->post('evaluacion/guardar', 'Evaluacion::guardar');
$routes->get('evaluacion/eliminar/(:num)', 'Evaluacion::eliminar/$1');
$routes->post('evaluacion/asistir', 'Evaluacion::asistir');
$routes->post('evaluacion/cancelar', 'Evaluacion::cancelar');
$routes->get('evaluacion/aplicar/(:num)', 'Evaluacion::aplicar/$1');
$routes->post('evaluacion/actualizar_status', 'Evaluacion::actualizar_status');
$routes->post('evaluacion/actualizar_item', 'Evaluacion::actualizar_item');

$routes->get('carga_grado/', 'Carga_grado::index');
$routes->post('carga_grado/nuevo', 'Carga_grado::nuevo');
$routes->get('carga_grado/aplicar/(:num)', 'Carga_grado::aplicar/$1');
$routes->get('carga_grado/eliminar/(:num)', 'Carga_grado::eliminar/$1');
$routes->post('carga_grado/eliminar_usuario', 'Carga_grado::eliminar_usuario');
$routes->post('carga_grado/actualizar_status', 'Carga_grado::actualizar_status');
$routes->post('carga_grado/actualizar_item', 'Carga_grado::actualizar_item');

$routes->get('talla/', 'Talla::index');
$routes->get('talla/detalle/(:num)', 'Talla::detalle/$1');
$routes->post('talla/nuevo', 'Talla::nuevo');
$routes->post('talla/guardar', 'Talla::guardar');
$routes->get('talla/eliminar/(:num)', 'Talla::eliminar/$1');

$routes->get('grado/', 'Grado::index');
$routes->get('grado/detalle/(:num)', 'Grado::detalle/$1');
$routes->post('grado/nuevo', 'Grado::nuevo');
$routes->post('grado/guardar', 'Grado::guardar');
$routes->get('grado/eliminar/(:num)', 'Grado::eliminar/$1');

