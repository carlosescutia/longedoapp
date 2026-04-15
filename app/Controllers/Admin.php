<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->usuario_model = model('Usuario_model');
        $this->evento_model = model('Evento_model');
    }

    public function index()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['eventos'] = $this->evento_model->get_eventos();

            return view('templates/header', $data)
                .view('admin/index', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function login()
    {
        $this->session->destroy();
        $data = [];
        $data['error'] = $this->session->getFlashdata('error');

        return view('admin/login', $data);
    }

    public function logout()
    {
        $this->session->destroy();

        // registro en bitacora
        $accion = 'logout';
        $entidad = '';
        $valor = '';
        $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

        return redirect()->to(site_url());
    }

    public function post_login()
    {
        if ($this->request->getPost()) {
            $nom_login = $this->request->getPost('nom_login');
            $password = $this->request->getPost('password');
            $usuario = $this->usuario_model->get_usuario_credenciales($nom_login, $password);
            if ($usuario) {
                $userdata = array(
                    'id_usuario' => $usuario['id_usuario'],
                    'id_rol' => $usuario['id_rol'],
                    'id_comunidad' => $usuario['id_comunidad'],
                    'nom_usuario' => $usuario['nom_usuario'],
                    'nom_login' => $usuario['nom_login'],
                    'logueado' => TRUE,
                );
                $this->session->set($userdata);

                // registro en bitacora
                $accion = 'login';
                $entidad = '';
                $valor = '';
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

                return redirect()->to(site_url());
            } else {
                $this->session->setFlashdata('error', 'Usuario o contraseña incorrectos');
                return redirect()->to(site_url("login"));
            }
        }
    }

}
