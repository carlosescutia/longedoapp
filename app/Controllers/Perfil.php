<?php

namespace App\Controllers;

class Perfil extends BaseController
{
    public function __construct()
    {
        $this->usuario_model = model('Usuario_model');
        $this->perfil_model = model('Perfil_model');
        $this->talla_model = model('Talla_model');
    }

    public function detalle()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $perfil = $this->perfil_model->get_perfil_usuario($data['userdata']['id_usuario']);
            if (empty($perfil)) {
                $this->crear_perfil();
                $perfil = $this->perfil_model->get_perfil_usuario($data['userdata']['id_usuario']);
            }
            $data['perfil'] = $perfil;
            $data['tallas'] = $this->talla_model->get_tallas();

            return view('templates/header', $data)
                .view('catalogos/perfil/detalle', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function crear_perfil()
    {
        $data = [];
        $data += $this->fn_sis->get_userdata();

        $perfil = $this->perfil_model->get_perfil_usuario($data['userdata']['id_usuario']);
        if (empty($perfil)) {
            $id_usuario = $data['userdata']['id_usuario'];
            $data = array(
                'id_usuario' => $data['userdata']['id_usuario'],
            );
            // guardar
            $this->perfil_model->save($data);

            // registro en bitacora
            $accion = 'agregó';
            $entidad = 'perfil';
            $valor = $id_usuario;
            $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
        }
    }

    public function guardar()
    {
        if ($this->session->logueado) {
            $perfil = $this->request->getPost();
            if ($perfil) {
                $data = array(
                    'id_perfil' => $perfil['id_perfil'],
                    'id_usuario' => $perfil['id_usuario'],
                    'nom_capoeira' => $perfil['nom_capoeira'],
                    'fecha_ingreso' => empty($perfil['fecha_ingreso']) ? null : $perfil['fecha_ingreso'],
                    'sexo' => $perfil['sexo'],
                    'edad' => $perfil['edad'],
                    'id_talla' => empty($perfil['id_talla']) ? null : $perfil['id_talla'],
                );
                // guardar
                $this->perfil_model->save($data);

                $accion = 'modificó';
                $id_perfil = $perfil['id_perfil'];

                // registro en bitacora
                $entidad = 'perfil';
                $valor = $id_perfil . " " .$perfil['nom_capoeira'];
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url("perfil"));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

}


