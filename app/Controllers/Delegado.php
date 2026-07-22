<?php

namespace App\Controllers;

class Delegado extends BaseController
{
    public function __construct()
    {
        $this->delegado_model = model('Delegado_model');
    }

    public function guardar()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'delegado.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $delegado = $this->request->getPost();
                if ($delegado) {
                    $id_evaluacion = $delegado['id_evaluacion'];
                    $id_evaluador = $delegado['id_evaluador'];
                    $id_grado = $delegado['id_grado'];
                    $url_actual = $delegado['url_actual'];

                    $data = array(
                        'id_evaluacion' => $id_evaluacion,
                        'id_evaluador' => $id_evaluador,
                        'id_grado' => $id_grado,
                    );
                    // guardar
                    $this->delegado_model->save($data);

                    $accion = 'agregó';
                    $id_delegado = $this->delegado_model->getInsertID();

                    // registro en bitacora
                    $entidad = 'delegado';
                    $valor = $id_evaluacion . ' ' . $id_evaluador . ' ' . $id_grado ;
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
                'delegado.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {

                $delegado = $this->request->getPost();
                if ($delegado) {
                    $id_delegado = $delegado['id_delegado'];
                    $url_actual = $delegado['url_actual'];

                    // registro en bitacora
                    $delegado = $this->delegado_model->get_delegado($id_delegado);
                    $id_evaluacion = $delegado['id_evaluacion'];
                    $id_evaluador = $delegado['id_evaluador'];
                    $id_grado = $delegado['id_grado'];

                    $accion = "eliminó";
                    $entidad = 'delegado';
                    $valor = $id_evaluacion . ' ' . $id_evaluador . ' ' . $id_grado ;
                    $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

                    // eliminado
                    $this->delegado_model->delete($id_delegado);
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


