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
            ."(case when p.nom_capoeira is not null then p.nom_capoeira else u.nom_usuario end) as nom_evaluador "
            ."from "
            ."evaluacion e "
            ."left join usuario u on u.id_usuario = e.id_evaluador "
            ."left join perfil p on p.id_usuario = u.id_usuario "
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
            ."e.*, "
            ."(case when p.nom_capoeira is not null then p.nom_capoeira else u.nom_usuario end) as nom_evaluador "
            ."from "
            ."evaluacion e "
            ."left join usuario u on u.id_usuario = e.id_evaluador "
            ."left join perfil p on p.id_usuario = u.id_usuario "
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
            ."evaluacion evl "
            ."where "
            ."evl.id_evento = ? "
            ."and evl.edad in ('todos', ?) "
            ."and evl.status = 'abierto' "
            ."";
        $query = $this->db->query($sql, array($id_evento, $edad));
        return $query->getRowArray()['evaluacion_disponible'] ?? null ;
    }

    public function get_evaluacion_registrada($id_evento, $edad)
    {
        if ($edad == 'todos') {
            $sql = ""
                ."select "
                ."1 as evaluacion_registrada "
                ."from "
                ."evaluacion evl "
                ."where "
                ."evl.id_evento = ? "
                ."";
            $query = $this->db->query($sql, array($id_evento));
        } else {
            $sql = ""
                ."select "
                ."1 as evaluacion_registrada "
                ."from "
                ."evaluacion evl "
                ."where "
                ."evl.id_evento = ? "
                ."and ( evl.edad = 'todos' or evl.edad = ? ) "
                ."";
            $query = $this->db->query($sql, array($id_evento, $edad));
        }
        return $query->getRowArray()['evaluacion_registrada'] ?? null ;
    }

    public function get_evaluadores_evento($id_evento)
    {
        $sql = ""
            ."select "
            ."evl.id_evaluador "
            ."from "
            ."evaluacion evl "
            ."where "
            ."evl.id_evento = ? "
            ."";
        $query = $this->db->query($sql, array($id_evento));
        return $query->getResultArray();
    }

    public function get_cargas_grado($id_evaluador)
    {
        $sql = ""
            ."select "
            ."e.*, "
            ."(case when p.nom_capoeira is not null then p.nom_capoeira else u.nom_usuario end) as nom_evaluador "
            ."from "
            ."evaluacion e "
            ."left join usuario u on u.id_usuario = e.id_evaluador "
            ."left join perfil p on p.id_usuario = u.id_usuario "
            ."where "
            ."e.id_evaluador = ? "
            ."and e.id_evento is null "
            ."order by e.id_evaluacion "
            ."";
        $query = $this->db->query($sql, array($id_evaluador));
        return $query->getResultArray();
    }

    public function get_evaluacion_pendiente($id_usuario)
    {
        $sql = ""
            ."select "
            ."1 as evaluacion_pendiente "
            ."from "
            ."evaluacion_usuario evu "
            ."left join evaluacion evl on evl.id_evaluacion = evu.id_evaluacion "
            ."where "
            ."evl.id_evento is not null "
            ."and evl.status != 'cerrado' "
            ."and evu.id_usuario = ? "
            ."";
        $query = $this->db->query($sql, array($id_usuario));
        return $query->getRowArray()['evaluacion_pendiente'] ?? null ;
    }

}

