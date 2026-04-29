<?php

namespace App\Controllers;

class Usuario extends BaseController
{
    public function __construct()
    {
        $this->usuario_model = model('Usuario_model');
        $this->rol_model = model('Rol_model');
        $this->comunidad_model = model('Comunidad_model');
        $this->acceso_sistema_model = model('Acceso_sistema_model');
        $this->acceso_sistema_usuario_model = model('Acceso_sistema_usuario_model');
        $this->opcion_sistema_model = model('Opcion_sistema_model');
        $this->talla_model = model('Talla_model');
        $this->parametro_sistema_model = model('Parametro_sistema_model');
        $this->perfil_model = model('Perfil_model');
    }

    public function index()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $id_rol = $data['userdata']['id_rol'];
            $id_comunidad = $data['userdata']['id_comunidad'];
            $data['usuarios'] = $this->usuario_model->get_usuarios($id_rol, $id_comunidad);

            return view('templates/header', $data)
                .view('catalogos/usuario/lista', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function detalle($id_usuario)
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['usuario'] = $this->usuario_model->get_usuario($id_usuario);
            $data['roles'] = $this->rol_model->get_roles();
            $data['comunidades'] = $this->comunidad_model->get_comunidades_activas();
            $data['accesos_sistema_rol'] = $this->acceso_sistema_model->get_accesos_sistema_rol_usuario($id_usuario);
            $data['accesos_sistema_usuario'] = $this->acceso_sistema_usuario_model->get_accesos_sistema_usuario($id_usuario);
            $data['opciones_sistema_otorgables'] = $this->opcion_sistema_model->get_opciones_sistema_otorgables();

            return view('templates/header', $data)
                .view('catalogos/usuario/detalle', $data)
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

            $data['roles'] = $this->rol_model->get_roles();
            $data['comunidades'] = $this->comunidad_model->get_comunidades_activas();

            return view('templates/header', $data)
                .view('catalogos/usuario/nuevo', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function guardar()
    {
        if ($this->session->logueado) {
            $usuario = $this->request->getPost();
            if ($usuario) {
                $data = [];
                if (array_key_exists('id_usuario', $usuario)) {
                    $data += array(
                        'id_usuario' => $usuario['id_usuario'],
                    );
                }
                $data += array(
                    'id_rol' => $usuario['id_rol'],
                    'nom_usuario' => $usuario['nom_usuario'],
                    'nom_login' => $usuario['nom_login'],
                    'password' => $usuario['password'],
                    'activo' => array_key_exists('activo', $usuario) ? 1 : 0,
                    'id_comunidad' => empty($usuario['id_comunidad']) ? null : $usuario['id_comunidad'],
                );
                // guardar
                $this->usuario_model->save($data);

                if (array_key_exists('id_usuario', $usuario)) {
                    $accion = 'modificó';
                    $id_usuario = $usuario['id_usuario'];
                } else {
                    $accion = 'agregó';
                    $id_usuario = $this->usuario_model->getInsertID();
                }

                // registro en bitacora
                $entidad = 'usuario';
                $valor = $id_usuario . " " .$usuario['nom_login'];
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url("usuario"));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function guardar_activo()
    {
        if ($this->session->logueado) {
            $usuario = $this->request->getPost();
            if ($usuario) {
                $accion = 'modificó';
                $activo = array_key_exists('activo', $usuario) ? 'activo' : 'inactivo';

                // guardado
                $data = array(
                    'id_usuario' => $usuario['id_usuario'],
                    'activo' => array_key_exists('activo', $usuario) ? 1 : 0,
                );
                $this->usuario_model->save($data);

                // registro en bitacora
                $entidad = 'usuario';
                $valor = $usuario['id_usuario'] . " " .$usuario['nom_login'] . " " . $activo;
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url("usuario"));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function eliminar($id_usuario)
    {
        if ($this->session->logueado) {

            // registro en bitacora
            $usuario = $this->usuario_model->get_usuario($id_usuario);
            $accion = "eliminó";
            $entidad = 'usuario';
            $valor = $usuario['id_usuario'] . " " . $usuario['nom_login'];
            $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

            // eliminado
            $this->usuario_model->delete($id_usuario);

            return redirect()->to(site_url("usuario"));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function lista_evaluadores()
    {
        if ($this->session->logueado) {
            $data = [];
            $data += $this->fn_sis->get_userdata();

            $data['evaluadores'] = $this->usuario_model->get_mentores();

            return view('templates/header', $data)
                .view('catalogos/usuario/lista_evaluadores', $data)
                .view('templates/footer');
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function guardar_evaluador()
    {
        if ($this->session->logueado) {
            $usuario = $this->request->getPost();
            if ($usuario) {
                $accion = 'modificó';
                $evaluador = array_key_exists('evaluador', $usuario) ? 'evaluador' : 'no_evaluador';

                // guardado
                $data = array(
                    'id_usuario' => $usuario['id_usuario'],
                    'evaluador' => array_key_exists('evaluador', $usuario) ? 1 : 0,
                );
                $this->usuario_model->save($data);

                // registro en bitacora
                $entidad = 'usuario';
                $valor = $usuario['id_usuario'] . " " .$usuario['nom_login'] . " " . $evaluador;
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);
            }
            return redirect()->to(site_url("usuario/lista_evaluadores"));
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function nuevo_por_url($token)
    {
        $comunidad = $this->comunidad_model->get_comunidad_token($token);
        if ( $comunidad ) {
            if ( $comunidad['activo'] and $comunidad['registrar_alumnos'] ) {
                $data['comunidad'] = $comunidad;
                $data['tallas_niño'] = $this->talla_model->get_tallas_edad_drop('niño');
                $data['tallas_adulto'] = $this->talla_model->get_tallas_edad_drop('adulto');
                $data['tallas_adulto_mayor'] = $this->talla_model->get_tallas_edad_drop('adulto');
                $data['aviso_privacidad'] = $this->parametro_sistema_model->get_parametro_sistema_nom('aviso_privacidad');

                return view('templates/header_pub')
                    .view('catalogos/usuario/nuevo_por_url', $data)
                    .view('templates/footer');
            } else {
                $data['error'] = 'El registro para la comunidad ha sido desactivado.';
            }
        } else {
            $data['error'] = 'El enlace proporcionado no es válido. Solicita otro e intenta de nuevo.';
        }
        return view('templates/header_pub')
            .view('catalogos/usuario/error', $data)
            .view('templates/footer');
    }

    public function guardar_por_url()
    {
        $usuario = $this->request->getPost();
        if ($usuario) {

            // comprobar que se tenga un código válido
            $id_comunidad = $usuario['id_comunidad'];
            $comunidad = $this->comunidad_model->get_comunidad($id_comunidad);
            if ($usuario['codigo'] == $comunidad['codigo']) {

                $data = array(
                    'id_rol' => 'alumno',
                    'id_comunidad' => $usuario['id_comunidad'],
                    'nom_usuario' => $usuario['nom_completo'],
                    'nom_login' => $usuario['nom_login'],
                    'password' => $usuario['password'],
                    'activo' => null,
                );
                // guardar
                $this->usuario_model->save($data);
                $id_usuario = $this->usuario_model->getInsertID();

                $data = array(
                    'id_usuario' => $id_usuario,
                    'nom_capoeira' => $usuario['nom_capoeira'],
                    'fecha_ingreso' => empty($usuario['fecha_ingreso']) ? null : $usuario['fecha_ingreso'],
                    'sexo' => $usuario['sexo'],
                    'edad' => $usuario['edad'],
                    'id_talla' => empty($usuario['id_talla']) ? null : $usuario['id_talla'],
                    'fech_acept_priv' => date("Y-m-d"),

                );
                $this->perfil_model->save($data);

                // registro en bitacora
                $accion = 'agregó';
                $entidad = 'usuario';
                $valor = $id_usuario . " " .$usuario['nom_completo'];
                $this->fn_sis->registro_bitacora($accion, $entidad, $valor);

                $data['comunidad'] = $comunidad;
                $data['nom_usuario'] = $usuario['nom_completo'];
                return view('templates/header_pub')
                    .view('catalogos/usuario/completado', $data)
                    .view('templates/footer');
            } else {
                $data['comunidad'] = $comunidad;
                $data['error'] = 'El código proporcionado no es válido. Solicita otro e intenta de nuevo.';
                return view('templates/header_pub')
                    .view('catalogos/usuario/error', $data)
                    .view('templates/footer');
            }
        }
        $data['comunidad'] = $comunidad;
        $data['error'] = 'No se pudo completar el registro. Intenta de nuevo.';
        return view('templates/header_pub')
            .view('catalogos/usuario/error', $data)
            .view('templates/footer');
    }

}

