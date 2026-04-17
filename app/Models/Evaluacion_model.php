<?php

namespace App\Models;

use CodeIgniter\Model;

class Evaluacion_model extends Model
{
    protected $table = 'evaluacion';
    protected $primaryKey = 'id_evaluacion';
    protected $allowedFields = [
        'id_evaluacion',
        'id_evento',
        'id_evaluador',
        'edad',
        'fecha',
        'status',
        'activo',
    ];

    public function get_evaluaciones($id_evento)
    {
        $sql = ""
            ."select "
            ."e.*, "
            ."u.nom_usuario as nom_evaluador "
            ."from "
            ."evaluacion e "
            ."left join usuario u on u.id_usuario = e.id_evaluador "
            ."where "
            ."e.id_evento = ? "
            ."order by e.id_evaluacion "
            ."";
        $query = $this->db->query($sql, array($id_evento));
        return $query->getResultArray();
    }

    public function get_evaluacion($id_evaluacion)
    {
        $sql = ""
            ."select "
            ."e.* "
            ."from "
            ."evaluacion e "
            ."where "
            ."e.id_evaluacion = ? "
            ."";
        $query = $this->db->query($sql, array($id_evaluacion));
        return $query->getRowArray();
    }

    public function get_evaluacion_evento_edad($id_evento, $edad)
    {
        $sql = ""
            ."select "
            ."el.* "
            ."from "
            ."evaluacion el "
            ."where "
            ."el.id_evento = ? "
            ."and el.edad in ('todos', ?) "
            ."";
        $query = $this->db->query($sql, array($id_evento, $edad));
        return $query->getRowArray();
    }

    public function get_evaluacion_disponible($id_evento, $edad)
    {
        $sql = ""
            ."select "
            ."1 as evaluacion_disponible "
            ."from "
            ."evaluacion el "
            ."where "
            ."el.id_evento = ? "
            ."and el.edad in ('todos', ?) "
            ."";
        $query = $this->db->query($sql, array($id_evento, $edad));
        return $query->getRowArray()['evaluacion_disponible'] ?? null ;
    }

}

