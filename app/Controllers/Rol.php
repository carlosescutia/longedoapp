<?php

namespace App\Controllers;

class Rol extends BaseController
{
    public function __construct()
    {
        $this->rol_model = model('Rol_model');
    }

    public function index()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'rol.can_view',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $data['roles'] = $this->rol_model->get_roles();

                return view('templates/header', $data)
                    .view('catalogos/rol/lista', $data)
                    .view('templates/footer');
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

}
