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
                ."(case when p.nom_capoeira is not null then p.nom_capoeira else u.nom_usuario end) as nom_evaluador, "
                ."'encargado' as tipo_evaluador, "
                ."(select  "
                    ."string_agg(distinct nom_grado::text, ', ')  "
                ."from  "
                    ."evaluacion_usuario eu  "
                    ."left join grado g on g.id_grado = eu.id_grado  "
                ."where  "
                    ."eu.id_evaluacion = e.id_evaluacion  "
                    ."and eu.id_grado not in  "
                        ."(select id_grado from delegado where id_evaluacion = e.id_evaluacion)  "
                .") as grados "
            ."from "
                ."evaluacion e "
                ."left join usuario u on u.id_usuario = e.id_evaluador "
                ."left join perfil p on p.id_usuario = u.id_usuario "
            ."where "
                ."e.id_evento = ? "
        ."union "
            ."select "
                ."evl.id_evaluacion, evl.id_evento, d.id_evaluador, evl.fecha, evl.status, evl.edad, "
                ."(case when p.nom_capoeira is not null then p.nom_capoeira else u.nom_usuario end) as nom_evaluador, "
                ."'delegado' as tipo_evaluador, "
                ."(select "
                    ."string_agg(distinct nom_grado::text, ',') "
                ."from "
                    ."delegado d2 "
                    ."left join grado g on g.id_grado = d2.id_grado "
                ."where "
                    ."d2.id_evaluacion = evl.id_evaluacion "
                    ."and d2.id_evaluador = d.id_evaluador "
                .") as grados "
            ."from "
                ."delegado d "
                ."left join evaluacion evl on evl.id_evaluacion = d.id_evaluacion "
                ."left join usuario u on u.id_usuario = d.id_evaluador "
                ."left join perfil p on p.id_usuario = d.id_evaluador "
            ."where "
                ."evl.id_evento = ? "
            ."";

        $query = $this->db->query($sql, array($id_evento, $id_evento));
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

            ."union "

                ."select "
                    ."d.id_evaluador "
                ."from "
                    ."delegado d "
                    ."left join evaluacion evl on evl.id_evaluacion = d.id_evaluacion "
                    ."left join evento evt on evt.id_evento = evl.id_evento "
                ."where "
                    ."evt.id_evento = ? "
            ."";
        $query = $this->db->query($sql, array($id_evento, $id_evento));
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

    public function get_grados_evaluacion($id_evaluacion)
    {
        $sql = ""
            ."select "
                ."id_grado, nom_grado "
            ."from "
                ."grado "
            ."where "
                ."id_grado in "
                    ."(select distinct id_grado from evaluacion_usuario where id_evaluacion = ?) "
                ."and id_grado not in "
                    ."(select id_grado from delegado where id_evaluacion = ?) "
            ."order by "
                ."orden "
            ."";
        $query = $this->db->query($sql, array($id_evaluacion, $id_evaluacion));
        return $query->getResultArray();
    }

    public function get_evaluacion_mentor($id_evaluacion, $id_usuario)
    {
        // determinar si el mentor es el dueño de la evaluación o un delegado
        $sql = ""
            ."select "
                ."1 as dueno "
            ."from "
                ."evaluacion e "
            ."where "
                ."e.id_evaluacion = ? "
                ."and e.id_evaluador = ? "
            ."";
        $query = $this->db->query($sql, array($id_evaluacion, $id_usuario));
        $mentor_dueno = $query->getRowArray();

        if ( $mentor_dueno ) {
            // dueño de la evaluación
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
        } else {
            $sql = ""
                ."select  "
                    ."evl.id_evaluacion, evl.id_evento, d.id_evaluador, evl.fecha, evl.status, evl.edad,  "
                    ."(case when p.nom_capoeira is not null then p.nom_capoeira else u.nom_usuario end) as nom_evaluador  "
                ."from  "
                    ."delegado d  "
                    ."left join evaluacion evl on evl.id_evaluacion = d.id_evaluacion  "
                    ."left join usuario u on u.id_usuario = d.id_evaluador  "
                    ."left join perfil p on p.id_usuario = d.id_evaluador  "
                ."where "
                    ."evl.id_evaluacion = ? "
                    ."and d.id_evaluador = ? "
            ."";
            $query = $this->db->query($sql, array($id_evaluacion, $id_usuario));
        }
        return $query->getRowArray();
    }

}

