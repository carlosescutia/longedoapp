<?php

namespace App\Models;

use CodeIgniter\Model;

class Perfil_model extends Model
{
    protected $table = 'perfil';
    protected $primaryKey = 'id_perfil';
    protected $allowedFields = [
        'id_perfil',
        'id_usuario',
        'nom_capoeira',
        'fecha_ingreso',
        'sexo',
        'edad',
        'id_talla',
    ];

    public function get_perfil($id_perfil)
    {
        $sql = ""
            ."select "
            ."p.* "
            ."from "
            ."perfil p "
            ."where "
            ."p.id_perfil = ? "
            ."";
        $query = $this->db->query($sql, array($id_perfil));
        return $query->getRowArray();
    }

    public function get_perfil_usuario($id_usuario)
    {
        $sql = ""
            ."select "
            ."p.* "
            ."from "
            ."perfil p "
            ."where "
            ."p.id_usuario = ? "
            ."";
        $query = $this->db->query($sql, array($id_usuario));
        return $query->getRowArray();
    }

}

