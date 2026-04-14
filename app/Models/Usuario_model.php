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
    ];

    public function get_usuarios()
    {
        $sql = ""
            ."select "
            ."u.* "
            ."from "
            ."usuario u "
            ."order by nom_usuario "
            ."";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_usuario($id_usuario)
    {
        $sql = ""
            ."select "
            ."u.* "
            ."from "
            ."usuario u "
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
            .'r.nom_rol '
            .'from '
            .'usuario u '
            .'left join rol r on u.id_rol = r.id_rol '
            .'where '
            .'u.nom_login = ? '
            .'and u.password = ? '
            .'and u.activo = 1 '
            .'';
        $query = $this->db->query($sql, array($nom_login, $password));
        return $query->getRowArray();
    }

    public function get_evaluadores()
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

}
