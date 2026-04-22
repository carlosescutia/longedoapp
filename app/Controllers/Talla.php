<?php

namespace App\Controllers;

class Talla extends BaseController
{
    public function __construct()
    {
        $this->talla_model = model('Talla_model');
    }

    public function index()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['tallas'] = $this->talla_model->get_tallas_todas();

            return view('templates/header', $data)
                .view('catalogos/talla/lista', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function detalle($id_talla)
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['talla'] = $this->talla_model->get_talla($id_talla);

            return view('templates/header', $data)
                .view('catalogos/talla/detalle', $data)
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
                .view('catalogos/talla/nuevo', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function guardar()
    {
        if ($this->session->logueado) {
            $talla = $this->request->getPost();
            if ($talla) {
                $data = [];
                if (array_key_exists('id_talla', $talla)) {
                    $data += array(
                        'id_talla' => $talla['id_talla'],
                    );
                }
                $data += array(
                    'nom_talla' => $talla['nom_talla'],
                    'edad' => $talla['edad'],
                    'orden' => $talla['orden'],
                    'activo' => array_key_exists('activo', $talla) ? 1 : 0,
                );
                // guardar
                $this->talla_model->save($data);

                if (array_key_exists('id_talla', $talla)) {
                    $accion = 'modificó';
                    $id_talla = $talla['id_talla'];
                } else {
                    $accion = 'agregó';
                    $id_talla = $this->talla_model->getInsertID();
                }

                // registro en bitacora
                $entidad = 'talla';
                $valor = $id_talla . " " .$talla['nom_talla'];
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url("talla"));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function eliminar($id_talla)
    {
        if ($this->session->logueado) {

            // registro en bitacora
            $talla = $this->talla_model->get_talla($id_talla);
            $accion = "eliminó";
            $entidad = 'talla';
            $valor = $talla['id_talla'] . " " . $talla['nom_talla'];
            $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

            // eliminado
            $this->talla_model->delete($id_talla);

            return redirect()->to(site_url("talla"));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

}


