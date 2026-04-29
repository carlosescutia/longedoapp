<?php

namespace App\Controllers;

class Comunidad extends BaseController
{
    public function __construct()
    {
        $this->comunidad_model = model('Comunidad_model');
    }

    public function index()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['comunidades'] = $this->comunidad_model->get_comunidades_todas();

            return view('templates/header', $data)
                .view('catalogos/comunidad/lista', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function detalle($id_comunidad)
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['comunidad'] = $this->comunidad_model->get_comunidad($id_comunidad);

            return view('templates/header', $data)
                .view('catalogos/comunidad/detalle', $data)
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
                .view('catalogos/comunidad/nuevo', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function guardar()
    {
        if ($this->session->logueado) {
            $comunidad = $this->request->getPost();
            if ($comunidad) {
                $data = [];
                if (array_key_exists('id_comunidad', $comunidad)) {
                    $data += array(
                        'id_comunidad' => $comunidad['id_comunidad'],
                    );
                } else {
                    // generar token y codigo solamente en nuevos eventos
                    $data += array(
                        'token' => $this->fn_sis->create_uuid(),
                        'codigo' => $this->fn_sis->create_random_string(6),
                    );
                }

                $data += array(
                    'nom_comunidad' => $comunidad['nom_comunidad'],
                    'ciudad' => $comunidad['ciudad'],
                    'activo' => array_key_exists('activo', $comunidad) ? 1 : 0,
                );
                // guardar
                $this->comunidad_model->save($data);

                if (array_key_exists('id_comunidad', $comunidad)) {
                    $accion = 'modificó';
                    $id_comunidad = $comunidad['id_comunidad'];
                } else {
                    $accion = 'agregó';
                    $id_comunidad = $this->comunidad_model->getInsertID();
                }

                // registro en bitacora
                $entidad = 'comunidad';
                $valor = $id_comunidad . " " .$comunidad['nom_comunidad'];
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url("comunidad"));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function eliminar($id_comunidad)
    {
        if ($this->session->logueado) {

            // registro en bitacora
            $comunidad = $this->comunidad_model->get_comunidad($id_comunidad);
            $accion = "eliminó";
            $entidad = 'comunidad';
            $valor = $comunidad['id_comunidad'] . " " . $comunidad['nom_comunidad'];
            $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

            // eliminado
            $this->comunidad_model->delete($id_comunidad);

            return redirect()->to(site_url("comunidad"));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function actualizar_codigo()
    {
        if ($this->session->logueado) {
            $comunidad = $this->request->getPost();
            if ($comunidad) {

                $data = array(
                    'id_comunidad' => $comunidad['id_comunidad'],
                    'codigo' => $comunidad['codigo'],
                );
                // guardar
                $this->comunidad_model->save($data);

                // registro en bitacora
                $accion = 'modificó';
                $entidad = 'comunidad';
                $valor = $comunidad['id_comunidad'] . " codigo " . $comunidad['codigo'];
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url());
        } else {
            return redirect()->to(site_url('login'));
        }
    }
    public function actualizar_registrar_alumnos()
    {
        if ($this->session->logueado) {
            $comunidad = $this->request->getPost();
            if ($comunidad) {

                $data = array(
                    'id_comunidad' => $comunidad['id_comunidad'],
                    'registrar_alumnos' => array_key_exists('registrar_alumnos', $comunidad) ? 1 : 0,
                );
                // guardar
                $this->comunidad_model->save($data);

                // registro en bitacora
                $registrar = array_key_exists('registrar_alumnos', $comunidad) ? 'registrar' : 'no registrar';
                $accion = 'modificó';
                $entidad = 'comunidad';
                $valor = $comunidad['id_comunidad'] . " registrar_alumnos " . $registrar;
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url());
        } else {
            return redirect()->to(site_url('login'));
        }
    }

}

