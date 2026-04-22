<?php

namespace App\Controllers;

class Carga_grado extends BaseController
{
    public function __construct()
    {
        $this->evaluacion_model = model('Evaluacion_model');
        $this->evaluacion_usuario_model = model('Evaluacion_usuario_model');
        $this->usuario_model = model('Usuario_model');
        $this->grado_model = model('Grado_model');
    }

    public function index()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['cargas_grado'] = $this->evaluacion_model->get_cargas_grado($data['userdata']['id_usuario']);

            return view('templates/header', $data)
                .view('carga_grado/lista', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function nuevo()
    {
        if ($this->session->logueado) {
            $db = \Config\Database::connect();
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data += array(
                'id_evento' => null,
                'id_evaluador' => $data['userdata']['id_usuario'],
                'edad' => 'todos',
                'fecha' => date("Y-m-d"),
                'status' => 'proceso',
            );
            // guardar evaluacion
            $this->evaluacion_model->save($data);
            $id_evaluacion = $this->evaluacion_model->getInsertID();

            // guardar usuarios de la evaluacion
            $id_comunidad = $data['userdata']['id_comunidad'] ;
            $evaluados = $this->usuario_model->get_alumnos_evaluar_carga_grado($id_comunidad, $id_evaluacion);
            $db->table('evaluacion_usuario')->insertBatch($evaluados);


            // registro en bitacora
            $accion = 'agregó';
            $entidad = 'evaluacion';
            $valor = $id_evaluacion . " carga_grados";
            $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

            return redirect()->to(site_url('carga_grado/aplicar/' . $id_evaluacion));
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

            return redirect()->to(site_url('carga_grado'));
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
            $data['evaluados'] = $this->evaluacion_usuario_model->get_evaluados($id_evaluacion);
            $data['grados'] = $this->grado_model->get_grados_activos();

            return view('templates/header', $data)
                .view('carga_grado/aplicacion', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function eliminar_usuario()
    {
        if ($this->session->logueado) {
            $evaluacion = $this->request->getPost();
            if ($evaluacion) {
                $id_usuario = $evaluacion['id_usuario'];
                $id_evaluacion = $evaluacion['id_evaluacion'];

                // eliminar
                $this->evaluacion_usuario_model->where('id_evaluacion', $id_evaluacion)->where('id_usuario', $id_usuario)->delete();

                // registro en bitacora
                $accion = 'canceló';
                $entidad = 'evaluación';
                $valor = 'evnt: ' . $id_evaluacion . ' usr: ' . $id_usuario ;
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url('carga_grado/aplicar/' . $id_evaluacion));
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
            return redirect()->to(site_url('carga_grado/aplicar/' . $evaluacion_usuario['id_evaluacion']));
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
            return redirect()->to(site_url('carga_grado'));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

}
