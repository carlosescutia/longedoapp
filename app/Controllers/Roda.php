<?php

namespace App\Controllers;

use SimpleSoftwareIO\QrCode\Generator;

class Roda extends BaseController
{
    public function __construct()
    {
        $this->roda_model = model('Roda_model');
        $this->usuario_model = model('Usuario_model');
    }

    public function detalle($id_roda)
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();
            $data['error_adm'] = $this->session->getFlashdata('error_adm');
            $data['error_alumno'] = $this->session->getFlashdata('error_alumno');
            $qrcode = new Generator;

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'roda.can_view',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $id_usuario = $data['userdata']['id_usuario'];
                $usuario = $this->usuario_model->get_usuario($id_usuario);
                $edad = $usuario['edad'];
                $data['roda'] = $this->roda_model->get_roda($id_roda);

                return view('templates/header', $data)
                    .view('roda/detalle', $data)
                    .view('templates/footer');
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function editar($id_roda)
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'roda.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $data['roda'] = $this->roda_model->get_roda($id_roda);
                return view('templates/header', $data)
                    .view('roda/editar', $data)
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
                'roda.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $data = [];
                $data += $this->fn_sis->get_userdata();

                return view('templates/header', $data)
                    .view('roda/nuevo', $data)
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
                'roda.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $roda = $this->request->getPost();
                if ($roda) {
                    $data = [];
                    if (array_key_exists('id_roda', $roda)) {
                        $data += array(
                            'id_roda' => $roda['id_roda'],
                        );
                    }

                    $data += array(
                        'nom_roda' => $roda['nom_roda'],
                        'fecha' => empty($roda['fecha']) ? null: $roda['fecha'],
                        'lugar' => $roda['lugar'],
                        'ubicacion' => $roda['ubicacion'],
                        'redaccion' => $roda['redaccion'],
                        'activo' => array_key_exists('activo', $roda) ? 1 : 0,
                        'id_comunidad' => $roda['id_comunidad'],
                    );
                    // guardar
                    $this->roda_model->save($data);

                    if (array_key_exists('id_roda', $roda)) {
                        $accion = 'modificó';
                        $id_roda = $roda['id_roda'];
                    } else {
                        $accion = 'agregó';
                        $id_roda = $this->roda_model->getInsertID();
                    }

                    // registro en bitacora
                    $entidad = 'roda';
                    $valor = $id_roda . " " .$roda['nom_roda'];
                    $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
                }
                return redirect()->to(site_url('roda/detalle/' . $id_roda));
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function eliminar() {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'roda.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $roda = $this->request->getPost();
                if ($roda) {
                    $id_roda = $roda['id_roda'];
                    $url_actual = $roda['url_actual'];

                    // registro en bitacora
                    $roda = $this->roda_model->get_roda($id_roda);
                    $accion = "eliminó";
                    $entidad = 'roda';
                    $valor = $roda['id_roda'] . " " . $roda['nom_roda'];
                    $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

                    // eliminado
                    $this->roda_model->delete($id_roda);
                }
                return redirect()->to(site_url());
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

}

