<?php

namespace App\Controllers;

use SimpleSoftwareIO\QrCode\Generator;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->usuario_model = model('Usuario_model');
        $this->evento_model = model('Evento_model');
        $this->evento_usuario_model = model('Evento_usuario_model');
        $this->evaluacion_usuario_model = model('Evaluacion_usuario_model');
        $this->comunidad_model = model('Comunidad_model');
        $this->recurso_entidad_model = model('Recurso_entidad_model');
    }

    public function index()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();
            $data['error'] = $this->session->getFlashdata('error');
            $qrcode = new Generator;

            $id_usuario = $data['userdata']['id_usuario'];
            $comunidad = $this->comunidad_model->get_comunidad($data['userdata']['id_comunidad']);
            $data['comunidad'] = $comunidad;
            $data['eventos'] = $this->evento_model->get_eventos();
            $data['asistencias'] = $this->evento_usuario_model->get_asistencias_usuario($id_usuario);
            $data['evaluaciones'] = $this->evaluacion_usuario_model->get_evaluaciones_usuario($id_usuario);
            if ($comunidad) {
                $data['qr'] = $qrcode->size(450)->format('png')->generate(site_url('registro_alumno/' . $comunidad['token']));
            }
            $data['info_evaluacion'] = $this->evaluacion_usuario_model->get_info_evaluacion_usuario($id_usuario);
            if ($data['info_evaluacion']) {
                $id_entidad = $data['info_evaluacion']['id_grado'];
                $entidad = 'grado';
                $data['recursos_entidad'] = $this->recurso_entidad_model->get_recursos_entidad_entidad($id_entidad, $entidad);
            }

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
                    'nom_capoeira' => $usuario['nom_capoeira'],
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
