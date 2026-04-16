<?php

namespace App\Controllers;

class Reportes extends BaseController
{
    public function __construct()
    {
        $this->bitacora_model = model('Bitacora_model');
        $this->evento_model = model('Evento_model');
        $this->evento_usuario_model = model('Evento_usuario_model');
    }

    public function index()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();
            $data['error'] = $this->session->getFlashdata('error');

            return view('templates/header', $data)
                .view('reportes/index', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function bitacora($salida='')
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();
            $data['error'] = $this->session->getFlashdata('error');

            $nom_login = $data['userdata']['nom_login'];
            $id_comunidad = $data['userdata']['id_comunidad'];
            $id_rol = $data['userdata']['id_rol'];
            $data['bitacora'] = $this->bitacora_model->get_bitacora($nom_login, $id_comunidad, $id_rol, $salida);

            if ($salida == 'csv') {
                return $this->response->download("bitacora_" . $data['userdata']['nom_login'] . '.csv', $data['bitacora']);
            } else {
                return view('templates/header', $data)
                    .view('reportes/bitacora', $data)
                    .view('templates/footer');
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function asistentes_evento($id_evento, $salida='')
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();
            $data['error'] = $this->session->getFlashdata('error');

            $evento = $this->evento_model->get_evento($id_evento);

            $permisos_requeridos = array(
                'evento.can_edit',
            );
            if ($data['userdata']['id_comunidad'] == $evento['id_comunidad']) {
                if (has_permission_and($permisos_requeridos, $data['permisos_usuario'])) {

                    $data['evento'] = $this->evento_model->get_evento($id_evento);
                    $data['asistentes'] = $this->evento_usuario_model->get_asistentes_evento($id_evento, $salida);

                    if ($salida == 'csv') {
                        return $this->response->download("asistentes_evento" . $id_evento . '.csv', $data['asistentes']);
                    } else {
                        return view('templates/header', $data)
                            .view('reportes/asistentes_evento', $data)
                            .view('templates/footer');
                    }
                } else {
                    return redirect()->to(site_url());
                }
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }


}
