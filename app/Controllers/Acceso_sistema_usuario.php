<?php

namespace App\Controllers;

class Acceso_sistema_usuario extends BaseController
{
    public function __construct()
    {
        $this->acceso_sistema_usuario_model = model('Acceso_sistema_usuario_model');
    }

    public function guardar()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'acceso_sistema_usuario.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $acceso_sistema_usuario = $this->request->getPost();
                if ($acceso_sistema_usuario) {
                    $id_usuario = $acceso_sistema_usuario['id_usuario'];
                    $data = array(
                        'id_usuario' => $acceso_sistema_usuario['id_usuario'],
                        'cod_opcion_sistema' => $acceso_sistema_usuario['cod_opcion_sistema'],
                    );
                    // guardar
                    $this->acceso_sistema_usuario_model->save($data);

                    // registro en bitacora
                    $accion = 'agregó';
                    $entidad = 'acceso_sistema_usuario';
                    $valor = $acceso_sistema_usuario['id_usuario'] . " " . $acceso_sistema_usuario['cod_opcion_sistema'];
                    $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
                }
                return redirect()->to(site_url("usuario/detalle/") . $id_usuario );
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
                'acceso_sistema_usuario.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {

                $acceso_sistema_usuario = $this->request->getPost();
                if ($acceso_sistema_usuario) {
                    $id_acceso_sistema_usuario = $acceso_sistema_usuario['id_acceso_sistema_usuario'];
                    $url_actual = $acceso_sistema_usuario['url_actual'];

                    // registro en bitacora
                    $acceso_sistema_usuario = $this->acceso_sistema_usuario_model->get_acceso_sistema_usuario($id_acceso_sistema_usuario);
                    $id_usuario = $acceso_sistema_usuario['id_usuario'];
                    $accion = "eliminó";
                    $entidad = 'acceso_sistema_usuario';
                    $valor = $acceso_sistema_usuario['id_usuario'] . " " . $acceso_sistema_usuario['cod_opcion_sistema'];
                    $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

                    // eliminado
                    $this->acceso_sistema_usuario_model->delete($id_acceso_sistema_usuario);

                    return redirect()->to(site_url("usuario/detalle/") . $id_usuario );

                } else {
                    return redirect()->to(site_url("usuario/detalle/") . $id_usuario );
                }
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

}
