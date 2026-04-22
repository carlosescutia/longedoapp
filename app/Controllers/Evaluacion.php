<?php

namespace App\Controllers;

class Evaluacion extends BaseController
{
    public function __construct()
    {
        $this->evaluacion_model = model('Evaluacion_model');
        $this->evaluacion_usuario_model = model('Evaluacion_usuario_model');
        $this->usuario_model = model('Usuario_model');
        $this->evento_model = model('Evento_model');
        $this->evento_usuario_model = model('Evento_usuario_model');
        $this->perfil_model = model('Perfil_model');
    }

    public function detalle($id_evaluacion)
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $evaluacion = $this->evaluacion_model->get_evaluacion($id_evaluacion);
            $id_evento = $evaluacion['id_evento'];
            $evento = $this->evento_model->get_evento($id_evento);
            $permisos_requeridos = array(
                'evento.can_edit',
            );
            if ($data['userdata']['id_comunidad'] == $evento['id_comunidad']) {
                if (has_permission_and($permisos_requeridos, $data['permisos_usuario'])) {

                    $data['evaluadores'] = $this->usuario_model->get_evaluadores();
                    $data['evaluacion'] = $this->evaluacion_model->get_evaluacion($id_evaluacion);
                    $data['evaluados'] = $this->evaluacion_usuario_model->get_evaluados($id_evaluacion);

                    return view('templates/header', $data)
                        .view('evaluacion/detalle', $data)
                        .view('templates/footer');
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

    public function nuevo()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $evento = $this->request->getPost();
            $data['id_evento'] = $evento['id_evento'];
            $data['evaluadores'] = $this->usuario_model->get_evaluadores();

            return view('templates/header', $data)
                .view('evaluacion/nuevo', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function guardar()
    {
        if ($this->session->logueado) {
            $evaluacion = $this->request->getPost();
            if ($evaluacion) {

                $data = [];
                if (array_key_exists('id_evaluacion', $evaluacion)) {
                    // guardar evaluacion existente
                    // no comprobar restricción de edad 
                    $data += array(
                        'id_evaluacion' => $evaluacion['id_evaluacion'],
                    );
                } else {
                    // guardar evaluación nueva
                    // comprobar restricción de edad
                    $id_evento = $evaluacion['id_evento'];
                    $edad = $evaluacion['edad'];
                    $evaluacion_registrada = $this->evaluacion_model->get_evaluacion_registrada($id_evento, $edad);
                    if ( $evaluacion_registrada ) {
                        $this->session->setFlashdata('error', 'Ya existe evaluación para esta edad');
                        return redirect()->to(site_url('evento/detalle/' . $evaluacion['id_evento']));
                    }
                }

                $data += array(
                    'id_evento' => $evaluacion['id_evento'],
                    'id_evaluador' => $evaluacion['id_evaluador'],
                    'edad' => $evaluacion['edad'],
                    'fecha' => empty($evaluacion['fecha']) ? null: $evaluacion['fecha'],
                    'status' => $evaluacion['status'],
                );
                // guardar
                $this->evaluacion_model->save($data);

                if (array_key_exists('id_evaluacion', $evaluacion)) {
                    $accion = 'modificó';
                    $id_evaluacion = $evaluacion['id_evaluacion'];
                } else {
                    $accion = 'agregó';
                    $id_evaluacion = $this->evaluacion_model->getInsertID();
                }

                // registro en bitacora
                $entidad = 'evaluacion';
                $valor = $id_evaluacion . " " .$evaluacion['id_evento'] . " " . $evaluacion['id_evaluador'];
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url('evento/detalle/' . $evaluacion['id_evento']));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function asistir()
    {
        if ($this->session->logueado) {
            $evaluacion = $this->request->getPost();
            if ($evaluacion) {
                $id_evento = $evaluacion['id_evento'];
                $id_usuario = $evaluacion['id_usuario'];

                $usuario = $this->usuario_model->get_usuario($id_usuario);
                $edad = $usuario['edad'];

                $evaluacion = $this->evaluacion_model->get_evaluacion_evento_edad($id_evento, $edad);
                $id_evaluacion = $evaluacion['id_evaluacion'];

                $id_grado = $this->perfil_model->get_grado_proximo($id_usuario, $edad);

                $data = array(
                    'id_evaluacion' => $id_evaluacion,
                    'id_usuario' => $id_usuario,
                    'id_grado' => $id_grado,
                );
                // guardar
                $this->evaluacion_usuario_model->save($data);

                // registro en bitacora
                $accion = 'agregó';
                $entidad = 'evaluacion_usuario';
                $valor = 'evnt: ' . $id_evaluacion . ' usr: ' . $id_usuario ;
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url('evento/detalle/' . $id_evento));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function cancelar()
    {
        if ($this->session->logueado) {
            $evaluacion = $this->request->getPost();
            if ($evaluacion) {
                $id_evento = $evaluacion['id_evento'];
                $id_usuario = $evaluacion['id_usuario'];

                $usuario = $this->usuario_model->get_usuario($id_usuario);
                $edad = $usuario['edad'];

                $evaluacion = $this->evaluacion_model->get_evaluacion_evento_edad($id_evento, $edad);
                $id_evaluacion = $evaluacion['id_evaluacion'];

                // eliminar
                $this->evaluacion_usuario_model->where('id_evaluacion', $id_evaluacion)->where('id_usuario', $id_usuario)->delete();

                // registro en bitacora
                $accion = 'canceló';
                $entidad = 'evaluación';
                $valor = 'evnt: ' . $id_evaluacion . ' usr: ' . $id_usuario ;
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url('evento/detalle/' . $id_evento));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function eliminar($id_evaluacion)
    {
        if ($this->session->logueado) {

            // registro en bitacora
            $evaluacion = $this->evaluacion_model->get_evaluacion($id_evaluacion);
            $accion = "eliminó";
            $entidad = 'evaluacion';
            $valor = $id_evaluacion . " " . $evaluacion['id_evento'] . " " . $evaluacion['id_evaluador'];
            $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

            // eliminado
            $this->evaluacion_model->delete($id_evaluacion);

            return redirect()->to(site_url('evento/detalle/' . $evaluacion['id_evento']));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function aplicar($id_evaluacion)
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['evaluacion'] = $this->evaluacion_model->get_evaluacion($id_evaluacion);
            $evaluadores_evento = $this->evaluacion_model->get_evaluadores_evento($data['evaluacion']['id_evento']);

            if ( in_array($data['userdata']['id_usuario'], array_column($evaluadores_evento, 'id_evaluador')) ) {

                $data['evaluados'] = $this->evaluacion_usuario_model->get_evaluados($id_evaluacion);

                return view('templates/header', $data)
                    .view('evaluacion/aplicacion', $data)
                    .view('templates/footer');
            } else {
                return redirect()->to(site_url());
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function actualizar_status()
    {
        if ($this->session->logueado) {
            $evaluacion = $this->request->getPost();
            if ($evaluacion) {

                $data = array(
                    'id_evaluacion' => $evaluacion['id_evaluacion'],
                    'status' => $evaluacion['status'],
                );
                // guardar
                $this->evaluacion_model->save($data);

                // registro en bitacora
                $accion = 'modificó';
                $entidad = 'evaluacion';
                $valor = $evaluacion['id_evaluacion'] . " " . $evaluacion['status'];
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url('evaluacion/aplicar/' . $evaluacion['id_evaluacion']));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function actualizar_item()
    {
        if ($this->session->logueado) {
            $evaluacion_usuario = $this->request->getPost();
            if ($evaluacion_usuario) {

                $data = $evaluacion_usuario ;
                $this->evaluacion_usuario_model->save($data);

                // guardar
                $data = $evaluacion_usuario;

                // registro en bitacora
                $accion = 'modificó';
                $entidad = 'evaluacion_usuario';
                $valor = $data['id_evaluacion_usuario'] ;
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url('evaluacion/aplicar/' . $evaluacion_usuario['id_evaluacion']));
        } else {
            return redirect()->to(site_url("login"));
        }
    }



}

