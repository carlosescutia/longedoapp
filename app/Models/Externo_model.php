<?php

namespace App\Models;

use CodeIgniter\Model;

class Externo_model extends Model
{
    protected $table = 'externo';
    protected $primaryKey = 'id_externo';
    protected $allowedFields = [
        'id_evento',
        'fecha_registro',
        'nom_completo',
        'nom_capoeira',
        'grupo',
        'sexo',
        'edad',
        'id_talla',
        'codigo',
        'nota',
        'activo',
    ];

    public function get_externos()
    {
        $sql = ""
            ."select "
            ."e.* "
            ."from "
            ."externo e "
            ."";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_externos_evento($id_evento)
    {
        $sql = ""
            ."select "
            ."e.* "
            ."from "
            ."externo e "
            ."where "
            ."e.id_evento = ? "
            ."order by e.nom_capoeira, e.grupo "
            ."";
        $query = $this->db->query($sql, array($id_evento));
        return $query->getResultArray();
    }

    public function get_externo($id_externo)
    {
        $sql = ""
            ."select "
            ."e.* "
            ."from "
            ."externo e "
            ."where "
            ."e.id_externo = ? "
            ."";
        $query = $this->db->query($sql, array($id_externo));
        return $query->getRowArray();
    }

}
