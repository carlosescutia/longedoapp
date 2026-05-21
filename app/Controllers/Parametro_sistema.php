<?php

namespace App\Controllers;

class Parametro_sistema extends BaseController
{
    public function __construct()
    {
        $this->parametro_sistema_model = model('Parametro_sistema_model');
    }

    public function index()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'parametro_sistema.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $data['parametros_sistema'] = $this->parametro_sistema_model->get_parametros_sistema();

                return view('templates/header', $data)
                    .view('catalogos/parametro_sistema/lista', $data)
                    .view('templates/footer');
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function detalle($id_parametro_sistema)
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'parametro_sistema.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $data['parametro_sistema'] = $this->parametro_sistema_model->get_parametro_sistema($id_parametro_sistema);

                return view('templates/header', $data)
                    .view('catalogos/parametro_sistema/detalle', $data)
                    .view('templates/footer');
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function nuevo()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'parametro_sistema.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                return view('templates/header', $data)
                    .view('catalogos/parametro_sistema/nuevo', $data)
                    .view('templates/footer');
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function guardar()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'parametro_sistema.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $parametro_sistema = $this->request->getPost();
                if ($parametro_sistema) {
                    $data = [];
                    if (array_key_exists('id_parametro_sistema', $parametro_sistema)) {
                        $data += array(
                            'id_parametro_sistema' => $parametro_sistema['id_parametro_sistema'],
                        );
                    }
                    $data += array(
                        'nom_parametro_sistema' => $parametro_sistema['nom_parametro_sistema'],
                        'valor' => $parametro_sistema['valor'],
                    );
                    // guardar
                    $this->parametro_sistema_model->save($data);

                    if (array_key_exists('id_parametro_sistema', $parametro_sistema)) {
                        $accion = 'modificó';
                        $id_parametro_sistema = $parametro_sistema['id_parametro_sistema'];
                    } else {
                        $accion = 'agregó';
                        $id_parametro_sistema = $this->parametro_sistema_model->getInsertID();
                    }

                    // registro en bitacora
                    $entidad = 'parametro_sistema';
                    $valor = $id_parametro_sistema . " " .$parametro_sistema['nom_parametro_sistema'];
                    $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
                }
                return redirect()->to(site_url("parametro_sistema"));
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
                'parametro_sistema.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {

                $parametro_sistema = $this->request->getPost();
                if ($parametro_sistema) {
                    $id_parametro_sistema = $parametro_sistema['id_parametro_sistema'];
                    $url_actual = $parametro_sistema['url_actual'];

                    // registro en bitacora
                    $parametro_sistema = $this->parametro_sistema_model->get_parametro_sistema($id_parametro_sistema);
                    $accion = "eliminó";
                    $entidad = 'parametro_sistema';
                    $valor = $parametro_sistema['id_parametro_sistema'] . " " . $parametro_sistema['nom_parametro_sistema'];
                    $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

                    // eliminado
                    $this->parametro_sistema_model->delete($id_parametro_sistema);

                    return redirect()->to($url_actual);

                } else {
                    return redirect()->to(site_url("parametro_sistema"));
                }
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

}

