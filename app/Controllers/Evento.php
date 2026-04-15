<?php

namespace App\Controllers;

class Evento extends BaseController
{
    public function __construct()
    {
        $this->evento_model = model('Evento_model');
    }

    public function detalle($id_evento)
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['evento'] = $this->evento_model->get_evento($id_evento);

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
