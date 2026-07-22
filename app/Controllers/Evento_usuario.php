<?php

namespace App\Controllers;

use SimpleSoftwareIO\QrCode\Generator;

class Evento_usuario extends BaseController
{
    public function __construct()
    {
        $this->evento_usuario_model = model('Evento_usuario_model');
        $this->externo_model = model('Externo_model');
        $this->evento_model = model('Evento_model');
    }

    public function actualizar_asistencia()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'evento.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $evento_usuario = $this->request->getPost();
                if ($evento_usuario) {
                    $id_evento = $evento_usuario['id_evento'];
                    $id_evento_usuario = $evento_usuario['id_evento_usuario'];
                    $asistencia = array_key_exists('asistencia', $evento_usuario) ? 1 : null;
                    $tipo_asistente = $evento_usuario['tipo_asistente'];

                    $accion = 'modificó';
                    $txt_asistencia = array_key_exists('asistencia', $evento_usuario) ? 'asistencia' : 'inasistencia';

                    if ( $tipo_asistente == 'interno' ) {
                        // guardado asistente interno
                        $data = array(
                            'id_evento_usuario' => $id_evento_usuario,
                            'asistencia' => $asistencia,
                        );
                        $this->evento_usuario_model->save($data);

                        // registro en bitacora
                        $entidad = 'evento_usuario';
                        $valor = $id_evento_usuario . " " . $txt_asistencia;
                        $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

                    } else {
                        // guardado asistente externo
                        $data = array(
                            'id_externo' => $id_evento_usuario,
                            'asistencia' => $asistencia
                        );
                        $this->externo_model->save($data);

                        // registro en bitacora
                        $entidad = 'externo';
                        $valor = $id_evento_usuario . " " . $txt_asistencia;
                        $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
                    }

                }
                return redirect()->to(site_url("evento/gestion_asistentes/" . $id_evento));
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function actualizar_pago()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'evento.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $evento_usuario = $this->request->getPost();
                if ($evento_usuario) {
                    $id_evento = $evento_usuario['id_evento'];
                    $id_evento_usuario = $evento_usuario['id_evento_usuario'];
                    $pago = array_key_exists('pago', $evento_usuario) ? 1 : null;
                    $tipo_asistente = $evento_usuario['tipo_asistente'];

                    $accion = 'modificó';
                    $txt_pago = array_key_exists('pago', $evento_usuario) ? 'pago' : 'inpago';

                    if ( $tipo_asistente == 'interno' ) {
                        // guardado asistente interno
                        $data = array(
                            'id_evento_usuario' => $id_evento_usuario,
                            'pago' => $pago,
                        );
                        $this->evento_usuario_model->save($data);

                        // registro en bitacora
                        $entidad = 'evento_usuario';
                        $valor = $id_evento_usuario . " " . $txt_pago;
                        $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

                    } else {
                        // guardado asistente externo
                        $data = array(
                            'id_externo' => $id_evento_usuario,
                            'pago' => $pago
                        );
                        $this->externo_model->save($data);

                        // registro en bitacora
                        $entidad = 'externo';
                        $valor = $id_evento_usuario . " " . $txt_pago;
                        $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
                    }

                }
                return redirect()->to(site_url("evento/gestion_asistentes/" . $id_evento));
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function actualizar_kit()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $permisos_usuario = $data['permisos_usuario'];
            $permisos_requeridos = array(
                'evento.can_edit',
            );
            if (has_permission_and($permisos_requeridos, $permisos_usuario)) {
                $evento_usuario = $this->request->getPost();
                if ($evento_usuario) {
                    $id_evento = $evento_usuario['id_evento'];
                    $id_evento_usuario = $evento_usuario['id_evento_usuario'];
                    $kit = array_key_exists('kit', $evento_usuario) ? 1 : null;
                    $tipo_asistente = $evento_usuario['tipo_asistente'];

                    $accion = 'modificó';
                    $txt_kit = array_key_exists('kit', $evento_usuario) ? 'kit' : 'inkit';

                    if ( $tipo_asistente == 'interno' ) {
                        // guardado asistente interno
                        $data = array(
                            'id_evento_usuario' => $id_evento_usuario,
                            'kit' => $kit,
                        );
                        $this->evento_usuario_model->save($data);

                        // registro en bitacora
                        $entidad = 'evento_usuario';
                        $valor = $id_evento_usuario . " " . $txt_kit;
                        $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

                    } else {
                        // guardado asistente externo
                        $data = array(
                            'id_externo' => $id_evento_usuario,
                            'kit' => $kit
                        );
                        $this->externo_model->save($data);

                        // registro en bitacora
                        $entidad = 'externo';
                        $valor = $id_evento_usuario . " " . $txt_kit;
                        $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
                    }

                }
                return redirect()->to(site_url("evento/gestion_asistentes/" . $id_evento));
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

}
