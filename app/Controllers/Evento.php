<?php

namespace App\Controllers;

class Evento extends BaseController
{
    public function __construct()
    {
        $this->evento_model = model('Evento_model');
        $this->evento_usuario_model = model('Evento_usuario_model');
        $this->evaluacion_model = model('Evaluacion_model');
        $this->perfil_model = model('Perfil_model');
        $this->evaluacion_usuario_model = model('Evaluacion_usuario_model');
        $this->usuario_model = model('Usuario_model');
    }

    public function detalle($id_evento)
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();
            $data['error'] = $this->session->getFlashdata('error');

            $id_usuario = $data['userdata']['id_usuario'];
            $usuario = $this->usuario_model->get_usuario($id_usuario);
            $edad = $usuario['edad'];
            $data['evento'] = $this->evento_model->get_evento($id_evento);
            $data['usuario_asiste'] = $this->evento_usuario_model->get_usuario_asiste($id_evento, $id_usuario);
            $data['perfil_completo'] = $this->perfil_model->get_perfil_completo($id_usuario);
            $data['evaluacion_disponible'] = $this->evaluacion_model->get_evaluacion_disponible($id_evento, $edad);
            $data['evaluaciones'] = $this->evaluacion_model->get_evaluaciones($id_evento);
            $data['usuario_evalua'] = $this->evaluacion_usuario_model->get_usuario_evalua($id_evento, $id_usuario);
            $data['evaluadores_evento'] = $this->evaluacion_model->get_evaluadores_evento($id_evento);

            return view('templates/header', $data)
                .view('evento/detalle', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function editar($id_evento)
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['evento'] = $this->evento_model->get_evento($id_evento);

            return view('templates/header', $data)
                .view('evento/editar', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function nuevo()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            return view('templates/header', $data)
                .view('evento/nuevo', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function guardar()
    {
        if ($this->session->logueado) {
            $evento = $this->request->getPost();
            if ($evento) {
                $data = [];
                if (array_key_exists('id_evento', $evento)) {
                    $data += array(
                        'id_evento' => $evento['id_evento'],
                    );
                }
                $data += array(
                    'nom_evento' => $evento['nom_evento'],
                    'fech_ini' => empty($evento['fech_ini']) ? null: $evento['fech_ini'],
                    'fech_fin' => empty($evento['fech_fin']) ? null: $evento['fech_fin'],
                    'lugar' => $evento['lugar'],
                    'ubicacion' => $evento['ubicacion'],
                    'redaccion' => $evento['redaccion'],
                    'activo' => array_key_exists('activo', $evento) ? 1 : 0,
                    'id_comunidad' => $evento['id_comunidad'],
                );
                // guardar
                $this->evento_model->save($data);

                if (array_key_exists('id_evento', $evento)) {
                    $accion = 'modificó';
                    $id_evento = $evento['id_evento'];
                } else {
                    $accion = 'agregó';
                    $id_evento = $this->evento_model->getInsertID();
                }

                // registro en bitacora
                $entidad = 'evento';
                $valor = $id_evento . " " .$evento['nom_evento'];
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url('evento/detalle/' . $id_evento));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function asistir()
    {
        if ($this->session->logueado) {
            $evento = $this->request->getPost();
            if ($evento) {
                $id_evento = $evento['id_evento'];
                $id_usuario = $evento['id_usuario'];
                $data = array(
                    'id_evento' => $id_evento,
                    'id_usuario' => $id_usuario,
                    'fecha' => date("Y-m-d"),
                );
                // guardar
                $this->evento_usuario_model->save($data);

                // registro en bitacora
                $accion = 'agregó';
                $entidad = 'evento_usuario';
                $valor = 'evnt: ' . $id_evento . ' usr: ' . $id_usuario ;
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
            $evento = $this->request->getPost();
            if ($evento) {
                $id_evento = $evento['id_evento'];
                $id_usuario = $evento['id_usuario'];

                // eliminar asistencia a evaluacion
                $usuario = $this->usuario_model->get_usuario($id_usuario);
                $edad = $usuario['edad'];
                $evaluacion = $this->evaluacion_model->get_evaluacion_evento_edad($id_evento, $edad);
                $id_evaluacion = $evaluacion['id_evaluacion'];
                $this->evaluacion_usuario_model->where('id_evaluacion', $id_evaluacion)->where('id_usuario', $id_usuario)->delete();

                // eliminar asistencia a evento
                $this->evento_usuario_model->where('id_evento', $id_evento)->where('id_usuario', $id_usuario)->delete();

                // registro en bitacora
                $accion = 'agregó';
                $entidad = 'evento_usuario';
                $valor = 'evnt: ' . $id_evento . ' usr: ' . $id_usuario ;
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url('evento/detalle/' . $id_evento));
        } else {
            return redirect()->to(site_url("login"));
        }
    }


    public function eliminar($id_evento)
    {
        if ($this->session->logueado) {

            // registro en bitacora
            $evento = $this->evento_model->get_evento($id_evento);
            $accion = "eliminó";
            $entidad = 'evento';
            $valor = $evento['id_evento'] . " " . $evento['nom_evento'];
            $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

            // eliminado
            $this->evento_model->delete($id_evento);

            return redirect()->to(site_url());
        } else {
            return redirect()->to(site_url("login"));
        }
    }

}
