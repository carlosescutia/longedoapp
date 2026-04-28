<?php

namespace App\Controllers;

class Perfil extends BaseController
{
    public function __construct()
    {
        $this->usuario_model = model('Usuario_model');
        $this->perfil_model = model('Perfil_model');
        $this->talla_model = model('Talla_model');
        $this->evaluacion_usuario_model = model('Evaluacion_usuario_model');
        $this->parametro_sistema_model = model('Parametro_sistema_model');
    }

    public function detalle()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $id_usuario = $data['userdata']['id_usuario'];
            $perfil = $this->perfil_model->get_perfil_usuario($id_usuario);
            if (empty($perfil)) {
                $this->crear_perfil();
                $perfil = $this->perfil_model->get_perfil_usuario($id_usuario);
            }
            $data['perfil'] = $perfil;
            $data['tallas_actual'] = $this->talla_model->get_tallas_edad($data['perfil']['edad']);
            $data['tallas_niño'] = $this->talla_model->get_tallas_edad_drop('niño');
            $data['tallas_adulto'] = $this->talla_model->get_tallas_edad_drop('adulto');
            $data['tallas_adulto_mayor'] = $this->talla_model->get_tallas_edad_drop('adulto');
            $data['grados'] = $this->evaluacion_usuario_model->get_grados_usuario($id_usuario);
            $data['evaluacion_pendiente'] = $this->evaluacion_usuario_model->get_evaluacion_pendiente($id_usuario);
            $data['aviso_privacidad'] = $this->parametro_sistema_model->get_parametro_sistema_nom('aviso_privacidad');

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
                if (array_key_exists('chk_aviso_privacidad', $perfil)) {
                    $data += array(
                        'fech_acept_priv' => date("Y-m-d"),
                    );
                }
                // guardar
                $this->perfil_model->save($data);

                // actualizar contraseña
                $data = array(
                    'id_usuario' => $perfil['id_usuario'],
                    'password' => $perfil['password'],
                );
                // guardar
                $this->usuario_model->save($data);

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


