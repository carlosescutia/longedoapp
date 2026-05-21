<?php

namespace App\Controllers;

class Recurso_entidad extends BaseController
{
    public function __construct()
    {
        $this->recurso_entidad_model = model('Recurso_entidad_model');
    }

    public function nuevo()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'recurso_entidad.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $recurso_entidad = $this->request->getPost();
                if ($recurso_entidad) {

                    $url_actual = $recurso_entidad['url_actual'];
                    $data = array(
                        'id_recurso' => $recurso_entidad['id_recurso'],
                        'id_entidad' => $recurso_entidad['id_entidad'],
                        'entidad' => $recurso_entidad['entidad'],
                    );
                    // guardar
                    $this->recurso_entidad_model->save($data);

                    // registro en bitacora
                    $accion = 'agregó';
                    $entidad = 'recurso_entidad';
                    $valor = $recurso_entidad['id_recurso'] . " " .$recurso_entidad['id_entidad']. " " .$recurso_entidad['entidad'];
                    $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
                }
                return redirect()->to($url_actual);
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function eliminar()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'recurso_entidad.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $recurso_entidad = $this->request->getPost();
                if ($recurso_entidad) {

                    $id_recurso_entidad = $recurso_entidad['id_recurso_entidad'];
                    $url_actual = $recurso_entidad['url_actual'];

                    // registro en bitacora
                    $accion = "eliminó";
                    $entidad = 'recurso_entidad';
                    $valor = $recurso_entidad['id_recurso_entidad'];
                    $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

                    // eliminado
                    $this->recurso_entidad_model->delete($id_recurso_entidad);
                }

                return redirect()->to($url_actual);
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

}
