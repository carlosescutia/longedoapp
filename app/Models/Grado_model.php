<?php

namespace App\Models;

use CodeIgniter\Model;

class Grado_model extends Model
{
    protected $table = 'grado';
    protected $primaryKey = 'id_grado';
    protected $allowedFields = [
        'nom_grado',
        'edad',
        'iniciales',
        'color',
        'orden',
        'activo',
    ];

    public function get_grados_todos()
    {
        $sql = ""
            ."select "
            ."g.* "
            ."from "
            ."grado g "
            ."order by edad, orden "
            ."";

        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_grados_activos()
    {
        $sql = ""
            ."select "
            ."g.* "
            ."from "
            ."grado g "
            ."where "
            ."activo = 1 "
            ."order by edad, orden "
            ."";

        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_grado($id_grado)
    {
        $sql = ""
            ."select "
            ."g.* "
            ."from "
            ."grado g "
            ."where "
            ."g.id_grado = ? "
            ."";
        $query = $this->db->query($sql, array($id_grado));
        return $query->getRowArray();
    }


}
