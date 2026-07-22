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
$routes->get('usuario/nuevo', 'Usuario::nuevo');
$routes->post('usuario/guardar', 'Usuario::guardar');
$routes->post('usuario/guardar_activo', 'Usuario::guardar_activo');
$routes->post('usuario/eliminar', 'Usuario::eliminar');
$routes->get('usuario/lista_evaluadores', 'Usuario::lista_evaluadores');
$routes->post('usuario/guardar_evaluador', 'Usuario::guardar_evaluador');
$routes->post('usuario/generar_token_cambio_pwd', 'Usuario::generar_token_cambio_pwd');
$routes->post('usuario/eliminar_token_cambio_pwd', 'Usuario::eliminar_token_cambio_pwd');
$routes->get('usuario/nuevo_pwd/(:segment)', 'Usuario::nuevo_pwd/$1');
$routes->post('usuario/actualizar_password', 'Usuario::actualizar_password');
$routes->get('usuario/existe/(:segment)', 'Usuario::existe/$1');


$routes->get('rol/', 'Rol::index');

$routes->get('opcion_sistema/', 'Opcion_sistema::index');
$routes->get('opcion_sistema/detalle/(:num)', 'Opcion_sistema::detalle/$1');
$routes->get('opcion_sistema/nuevo', 'Opcion_sistema::nuevo');
$routes->post('opcion_sistema/guardar', 'Opcion_sistema::guardar');
$routes->post('opcion_sistema/guardar_otorgable', 'Opcion_sistema::guardar_otorgable');
$routes->post('opcion_sistema/eliminar', 'Opcion_sistema::eliminar');

$routes->get('acceso_sistema/', 'Acceso_sistema::index');
$routes->get('acceso_sistema/nuevo', 'Acceso_sistema::nuevo');
$routes->post('acceso_sistema/guardar', 'Acceso_sistema::guardar');
$routes->post('acceso_sistema/eliminar', 'Acceso_sistema::eliminar');

$routes->get('parametro_sistema/', 'Parametro_sistema::index');
$routes->get('parametro_sistema/detalle/(:num)', 'Parametro_sistema::detalle/$1');
$routes->get('parametro_sistema/nuevo', 'Parametro_sistema::nuevo');
$routes->post('parametro_sistema/guardar', 'Parametro_sistema::guardar');
$routes->post('parametro_sistema/eliminar', 'Parametro_sistema::eliminar');

$routes->post('acceso_sistema_usuario/guardar', 'Acceso_sistema_usuario::guardar');
$routes->post('acceso_sistema_usuario/eliminar', 'Acceso_sistema_usuario::eliminar');

$routes->post('archivo/subir', 'Archivo::subir');
$routes->post('archivo/subir_perfil', 'Archivo::subir_perfil');
$routes->post('archivo/subir_comunidad', 'Archivo::subir_comunidad');
$routes->post('archivo/subir_evento', 'Archivo::subir_evento');
$routes->post('archivo/subir_recurso', 'Archivo::subir_recurso');
$routes->post('archivo/eliminar_recurso', 'Archivo::eliminar_recurso');
$routes->post('archivo/eliminar', 'Archivo::eliminar');
$routes->post('archivo/subir_roda', 'Archivo::subir_roda');

$routes->get('proceso/', 'Proceso::index');

$routes->get('reportes/', 'Reportes::index');
$routes->get('reportes/bitacora', 'Reportes::bitacora');
$routes->get('reportes/bitacora/(:segment)', 'Reportes::bitacora/$1');
$routes->get('reportes/asistentes_evento/(:segment)', 'Reportes::asistentes_evento/$1');
$routes->get('reportes/asistentes_evento/(:segment)/(:segment)', 'Reportes::asistentes_evento/$1/$2');
$routes->get('reportes/playeras_evento/(:segment)', 'Reportes::playeras_evento/$1');
$routes->get('reportes/playeras_evento/(:segment)/(:segment)', 'Reportes::playeras_evento/$1/$2');
$routes->get('reportes/registro_comunidad', 'Reportes::registro_comunidad');
$routes->get('reportes/directorio/', 'Reportes::directorio');
$routes->get('reportes/directorio/(:segment)', 'Reportes::directorio/$1');



$routes->get('perfil/', 'Perfil::detalle');
$routes->post('perfil/guardar', 'Perfil::guardar');

$routes->get('evento/detalle/(:num)', 'Evento::detalle/$1');
$routes->get('evento/nuevo', 'Evento::nuevo');
$routes->get('evento/editar/(:num)', 'Evento::editar/$1');
$routes->post('evento/guardar', 'Evento::guardar');
$routes->post('evento/eliminar', 'Evento::eliminar');
$routes->post('evento/asistir', 'Evento::asistir');
$routes->post('evento/cancelar', 'Evento::cancelar');
$routes->post('evento/actualizar_registrar_externos', 'Evento::actualizar_registrar_externos');
$routes->post('evento/actualizar_codigo', 'Evento::actualizar_codigo');

$routes->get('comunidad/', 'Comunidad::index');
$routes->get('comunidad/detalle/(:num)', 'Comunidad::detalle/$1');
$routes->get('comunidad/editar_comunidad_propia', 'Comunidad::editar_comunidad_propia');
$routes->get('comunidad/nuevo', 'Comunidad::nuevo');
$routes->post('comunidad/guardar', 'Comunidad::guardar');
$routes->post('comunidad/eliminar', 'Comunidad::eliminar');
$routes->post('comunidad/actualizar_registrar_alumnos', 'Comunidad::actualizar_registrar_alumnos');
$routes->post('comunidad/actualizar_codigo', 'Comunidad::actualizar_codigo');

$routes->get('evaluacion/detalle/(:num)', 'Evaluacion::detalle/$1');
$routes->get('evaluacion/nuevo/(:num)', 'Evaluacion::nuevo/$1');
$routes->post('evaluacion/guardar', 'Evaluacion::guardar');
$routes->post('evaluacion/eliminar', 'Evaluacion::eliminar');
$routes->post('evaluacion/asistir', 'Evaluacion::asistir');
$routes->post('evaluacion/cancelar', 'Evaluacion::cancelar');
$routes->get('evaluacion/aplicar/(:num)', 'Evaluacion::aplicar/$1');
$routes->post('evaluacion/actualizar_status', 'Evaluacion::actualizar_status');
$routes->post('evaluacion/actualizar_item', 'Evaluacion::actualizar_item');
$routes->post('evaluacion/actualizar_items', 'Evaluacion::actualizar_items');
$routes->get('evaluacion/delegar/(:num)', 'Evaluacion::delegar/$1');

$routes->get('talla/', 'Talla::index');
$routes->get('talla/detalle/(:num)', 'Talla::detalle/$1');
$routes->get('talla/nuevo', 'Talla::nuevo');
$routes->post('talla/guardar', 'Talla::guardar');
$routes->post('talla/eliminar', 'Talla::eliminar');

$routes->get('grado/', 'Grado::index');
$routes->get('grado/detalle/(:num)', 'Grado::detalle/$1');
$routes->get('grado/nuevo', 'Grado::nuevo');
$routes->post('grado/guardar', 'Grado::guardar');
$routes->post('grado/eliminar', 'Grado::eliminar');

$routes->get('registro/(:segment)', 'Externo::nuevo/$1');
$routes->post('registro/guardar', 'Externo::guardar');
$routes->get('externo/aprobar/(:num)', 'Externo::aprobar/$1');
$routes->post('externo/guardar_activo', 'Externo::guardar_activo');
$routes->post('externo/eliminar', 'Externo::eliminar');

$routes->get('registro_alumno/(:segment)', 'Usuario::nuevo_por_url/$1');
$routes->post('registro_alumno/guardar', 'Usuario::guardar_por_url');

$routes->get('recurso/', 'Recurso::index');
$routes->get('recurso/detalle/(:num)', 'Recurso::detalle/$1');
$routes->get('recurso/nuevo', 'Recurso::nuevo');
$routes->post('recurso/guardar', 'Recurso::guardar');
$routes->post('recurso/eliminar', 'Recurso::eliminar');

$routes->post('recurso_entidad/nuevo', 'Recurso_entidad::nuevo');
$routes->post('recurso_entidad/eliminar', 'Recurso_entidad::eliminar');

$routes->get('roda/detalle/(:num)', 'Roda::detalle/$1');
$routes->get('roda/nuevo', 'Roda::nuevo');
$routes->get('roda/editar/(:num)', 'Roda::editar/$1');
$routes->post('roda/guardar', 'Roda::guardar');
$routes->post('roda/eliminar', 'Roda::eliminar');

$routes->post('delegado/guardar', 'Delegado::guardar');
$routes->post('delegado/eliminar', 'Delegado::eliminar');
