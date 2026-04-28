<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario_model extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        'id_usuario',
        'id_rol',
        'nom_usuario',
        'nom_login',
        'password',
        'activo',
        'evaluador',
        'id_comunidad',
    ];

    public function get_usuarios($id_rol, $id_comunidad)
    {
        $sql = ""
            ."select "
            ."u.*, c.nom_comunidad, p.id_perfil, p.fech_acept_priv "
            ."from "
            ."usuario u "
            ."left join comunidad c on c.id_comunidad = u.id_comunidad "
            ."left join perfil p on p.id_usuario = u.id_usuario "
            ."";

        $parametros = [];
        if ($id_rol !== 'admin') {
            $sql .= " where u.id_comunidad = ? ";
            array_push($parametros, "$id_comunidad");
        }

        $sql .= ' order by u.nom_usuario;';
        $query = $this->db->query($sql, $parametros);
        return $query->getResultArray();
    }

    public function get_usuario($id_usuario)
    {
        $sql = ""
            ."select "
            ."u.*, p.id_perfil, p.nom_capoeira, p.fecha_ingreso, p.sexo, p.id_talla, p.edad "
            ."from "
            ."usuario u "
            ."left join perfil p on p.id_usuario = u.id_usuario "
            ."where "
            ."u.id_usuario = ? "
            ."";
        $query = $this->db->query($sql, array($id_usuario));
        return $query->getRowArray();
    }

    public function get_usuario_credenciales($nom_login, $password)
    {
        $sql = ''
            .'select '
            .'u.*, '
            .'r.nom_rol, '
            .'p.nom_capoeira '
            .'from '
            .'usuario u '
            .'left join rol r on u.id_rol = r.id_rol '
            .'left join perfil p on p.id_usuario = u.id_usuario '
            .'where '
            .'u.nom_login = ? '
            .'and u.password = ? '
            .'and u.activo = 1 '
            .'';
        $query = $this->db->query($sql, array($nom_login, $password));
        return $query->getRowArray();
    }

    public function get_mentores()
    {
        $sql = ""
            ."select "
            ."u.* "
            ."from "
            ."usuario u "
            ."where "
            ."id_rol = 'mentor' "
            ."order by nom_usuario "
            ."";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_evaluadores()
    {
        $sql = ""
            ."select "
            ."u.*, "
            ."(case when p.nom_capoeira is not null then p.nom_capoeira else u.nom_usuario end) as nom_evaluador "
            ."from "
            ."usuario u "
            ."left join perfil p on p.id_usuario = u.id_usuario "
            ."where "
            ."id_rol = 'mentor' "
            ."and evaluador = 1 "
            ."and activo = 1 "
            ."order by nom_usuario "
            ."";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_alumnos_evaluar_carga_grado($id_comunidad, $id_evaluacion)
    {
        $sql = ""
            ."select "
            ."u.id_usuario, ? as id_evaluacion, "
            ."(select * from grado_proximo(u.id_usuario, p.edad)) as id_grado "
            ."from "
            ."usuario u "
            ."left join perfil p on p.id_usuario = u.id_usuario "
            ."where u.id_comunidad = ? "
            ."and u.activo = 1 "
            ."and u.id_rol <> 'mentor' "
            ."";

        $query = $this->db->query($sql, array($id_evaluacion, $id_comunidad));
        return $query->getResultArray();
    }

}
