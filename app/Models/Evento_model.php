<?php

namespace App\Models;

use CodeIgniter\Model;

class Evento_model extends Model
{
    protected $table = 'evento';
    protected $primaryKey = 'id_evento';
    protected $allowedFields = [
        'id_evento',
        'nom_evento',
        'fech_ini',
        'fech_fin',
        'lugar',
        'ubicacion',
        'redaccion',
        'activo',
        'id_comunidad',
        'token',
        'codigo',
        'registrar_externos',
        'cartel',
    ];

    public function get_eventos()
    {
        $sql = ""
            ."select "
            ."e.*, c.nom_comunidad, "
            ."(select count(*) from evento_usuario etu where etu.id_evento = e.id_evento) as num_asistentes "
            ."from "
            ."evento e "
            ."left join comunidad c on c.id_comunidad = e.id_comunidad "
            ."order by fech_ini "
            ."";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_eventos_actuales()
    {
        $sql = ""
            ."select "
            ."e.*, c.nom_comunidad, "
            ."(select count(*) from ( select id_evento from evento_usuario union all select id_evento from externo ) as asistentes "
            ."where asistentes.id_evento = e.id_evento group by id_evento) as num_asistentes "
            ."from "
            ."evento e "
            ."left join comunidad c on c.id_comunidad = e.id_comunidad "
            ."where "
            ."e.fech_fin +1 >= now() "
            ."order by fech_ini "
            ."";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_eventos_anteriores()
    {
        $sql = ""
            ."select "
            ."e.*, c.nom_comunidad, "
            ."(select count(*) from ( select id_evento from evento_usuario union all select id_evento from externo ) as asistentes "
            ."where asistentes.id_evento = e.id_evento group by id_evento) as num_asistentes "
            ."from "
            ."evento e "
            ."left join comunidad c on c.id_comunidad = e.id_comunidad "
            ."where "
            ."e.fech_fin +1 < now() "
            ."order by fech_ini "
            ."";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_evento($id_evento)
    {
        $sql = ""
            ."select "
            ."e.*, "
            ."(case when fech_fin + 1 >= now() then 1 else null end) as actual, "
            ."(select 1 as evaluaciones_aplicadas from evaluacion evl where evl.id_evento = e.id_evento and evl.status = 'cerrado' limit 1) as evaluaciones_aplicadas "
            ."from "
            ."evento e "
            ."where "
            ."e.id_evento = ? "
            ."";
        $query = $this->db->query($sql, array($id_evento));
        return $query->getRowArray();
    }

    public function get_evento_token($token)
    {
        $sql = ""
            ."select "
            ."e.*, "
            ."(case when fech_fin + 1 >= now() then 1 else null end) as actual "
            ."from "
            ."evento e "
            ."where "
            ."e.token = ? "
            ."";
        $query = $this->db->query($sql, array($token));
        return $query->getRowArray();
    }

}
