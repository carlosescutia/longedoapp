<?php

namespace App\Controllers;

class Catalogos extends BaseController
{
    public function __construct()
    {
        //$this->usuario_model = model('Usuario_model');
    }

    public function index()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'catalogo.can_view',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                return view('templates/header', $data)
                    .view('catalogos/lista', $data)
                    .view('templates/footer');
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

}
