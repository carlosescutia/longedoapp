<?php

namespace App\Controllers;

class Externo extends BaseController
{
    public function __construct()
    {
        $this->externo_model = model('Externo_model');
        $this->evento_model = model('Evento_model');
        $this->talla_model = model('Talla_model');
    }

    public function nuevo($token)
    {
        $data = [];
        $data += $this->fn_sis->get_userdata();

        $evento = $this->evento_model->get_evento_token($token);

        if ( $evento ) {
            if ( $evento['activo'] and $evento['registrar_externos'] ) {
                $data['evento'] = $evento;
                $data['tallas_niño'] = $this->talla_model->get_tallas_edad_drop('niño');
                $data['tallas_adulto'] = $this->talla_model->get_tallas_edad_drop('adulto');
                $data['tallas_adulto_mayor'] = $this->talla_model->get_tallas_edad_drop('adulto');

                return view('templates/header_pub')
                    .view('externo/nuevo', $data)
                    .view('templates/footer');
            } else {
                $data['error'] = 'El registro para el evento ha sido desactivado.';
            }
        } else {
            $data['error'] = 'El enlace proporcionado no es válido. Solicita otro e intenta de nuevo.';
        }
        return view('templates/header_pub')
            .view('externo/error', $data)
            .view('templates/footer');
    }

    public function guardar()
    {
        $externo = $this->request->getPost();
        if ($externo) {

            // comprobar que se tenga un código válido
            $id_evento = $externo['id_evento'];
            $evento = $this->evento_model->get_evento($id_evento);
            if ($externo['codigo'] == $evento['codigo']) {

                $data = array(
                    'id_evento' => $externo['id_evento'],
                    'fecha_registro' => date("Y-m-d"),
                    'nom_completo' => $externo['nom_completo'],
                    'nom_capoeira' => $externo['nom_capoeira'],
                    'grupo' => $externo['grupo'],
                    'sexo' => $externo['sexo'],
                    'edad' => $externo['edad'],
                    'id_talla' => empty($externo['id_talla']) ? null : $externo['id_talla'],
                    'codigo' => $externo['codigo'],
                    'nota' => $externo['nota'],
                );
                // guardar
                $this->externo_model->save($data);

                $accion = 'agregó';
                $id_externo = $this->externo_model->getInsertID();

                // registro en bitacora
                $entidad = 'externo';
                $valor = $id_externo . " " .$externo['nom_completo'];
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

                $data['evento'] = $this->evento_model->get_evento($id_evento);
                return view('templates/header_pub')
                    .view('externo/completado', $data)
                    .view('templates/footer');
            } else {
                $data['error'] = 'El código proporcionado no es válido. Solicita otro e intenta de nuevo.';
                return view('templates/header_pub')
                    .view('externo/error', $data)
                    .view('templates/footer');
            }
        }
        $data['error'] = 'No se pudo completar el registro. Intenta de nuevo.';
        return view('templates/header_pub')
            .view('externo/error', $data)
            .view('templates/footer');
    }

    public function aprobar($id_evento)
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['id_evento'] = $id_evento;
            $data['evento'] = $this->evento_model->get_evento($id_evento);
            $data['externos'] = $this->externo_model->get_externos_evento($id_evento);

            return view('templates/header', $data)
                .view('externo/aprobar', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function guardar_activo()
    {
        if ($this->session->logueado) {
            $externo = $this->request->getPost();
            if ($externo) {

                $id_evento = $externo['id_evento'];
                $data = array(
                    'id_externo' => $externo['id_externo'],
                    'activo' => array_key_exists('activo', $externo) ? 1 : 0,
                );
                // guardar
                $this->externo_model->save($data);

                // registro en bitacora
                $registrar = array_key_exists('activo', $externo) ? 'aprobado' : 'no aprobado';
                $accion = 'modificó';
                $entidad = 'externo';
                $valor = $externo['id_externo'] . ' ' .  $registrar;
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url('externo/aprobar/' . $externo['id_evento']));
        } else {
            return redirect()->to(site_url('login'));
        }
    }

}
