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
            $recurso_entidad = $this->request->getPost();
            if ($recurso_entidad) {

                $url_actual = $recurso_entidad['url_actual'];
                $data = array(
                    'id_entidad' => $recurso_entidad['id_entidad'],
                    'entidad' => $recurso_entidad['entidad'],
                );
                // guardar
                $this->recurso_entidad_model->save($data);

                // registro en bitacora
                $accion = 'agregó';
                $entidad = 'recurso_entidad';
                $valor = $recurso_entidad['id_entidad'] . " " .$recurso_entidad['entidad'];
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to($url_actual);
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function actualizar_recurso()
    {
        if ($this->session->logueado) {
            $recurso_entidad = $this->request->getPost();
            if ($recurso_entidad) {

                $url_actual = $recurso_entidad['url_actual'];
                $data = array(
                    'id_recurso_entidad' => $recurso_entidad['id_recurso_entidad'],
                    'id_recurso' => $recurso_entidad['id_recurso'],
                );
                // guardar
                $this->recurso_entidad_model->save($data);

                // registro en bitacora
                $accion = 'modificó';
                $entidad = 'recurso_entidad';
                $valor = $recurso_entidad['id_recurso_entidad'] . " " .$recurso_entidad['id_recurso'];
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to($url_actual);
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function eliminar()
    {
        if ($this->session->logueado) {
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
            return redirect()->to(site_url("login"));
        }
    }

}
