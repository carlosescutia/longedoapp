<?php

namespace App\Controllers;

class Grado extends BaseController
{
    public function __construct()
    {
        $this->grado_model = model('Grado_model');
        $this->evaluacion_model = model('Evaluacion_model');
        $this->recurso_entidad_model = model('Recurso_entidad_model');
        $this->recurso_model = model('Recurso_model');
    }

    public function index()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['grados'] = $this->grado_model->get_grados_todos();

            return view('templates/header', $data)
                .view('catalogos/grado/lista', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function detalle($id_grado)
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['grado'] = $this->grado_model->get_grado($id_grado);
            $id_entidad = $id_grado;
            $entidad = 'grado';
            $data['recursos_entidad'] = $this->recurso_entidad_model->get_recursos_entidad_entidad($id_entidad, $entidad);
            $data['recursos'] = $this->recurso_model->get_recursos_activos();
            $data['entidad'] = $entidad;
            $data['id_entidad'] = $id_entidad;

            return view('templates/header', $data)
                .view('catalogos/grado/detalle', $data)
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
                .view('catalogos/grado/nuevo', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function guardar()
    {
        if ($this->session->logueado) {
            $grado = $this->request->getPost();
            if ($grado) {
                $data = [];
                if (array_key_exists('id_grado', $grado)) {
                    $data += array(
                        'id_grado' => $grado['id_grado'],
                    );
                }
                $data += array(
                    'nom_grado' => $grado['nom_grado'],
                    'edad' => $grado['edad'],
                    'iniciales' => $grado['iniciales'],
                    'musica' => $grado['musica'],
                    'cultura' => $grado['cultura'],
                    'jogo' => $grado['jogo'],
                    'color' => $grado['color'],
                    'orden' => $grado['orden'],
                    'activo' => array_key_exists('activo', $grado) ? 1 : 0,
                );
                // guardar
                $this->grado_model->save($data);

                if (array_key_exists('id_grado', $grado)) {
                    $accion = 'modificó';
                    $id_grado = $grado['id_grado'];
                } else {
                    $accion = 'agregó';
                    $id_grado = $this->grado_model->getInsertID();
                }

                // registro en bitacora
                $entidad = 'grado';
                $valor = $id_grado . " " .$grado['nom_grado'];
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url("grado"));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function eliminar($id_grado)
    {
        if ($this->session->logueado) {

            // registro en bitacora
            $grado = $this->grado_model->get_grado($id_grado);
            $accion = "eliminó";
            $entidad = 'grado';
            $valor = $grado['id_grado'] . " " . $grado['nom_grado'];
            $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

            // eliminado
            $this->grado_model->delete($id_grado);

            return redirect()->to(site_url("grado"));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

}
