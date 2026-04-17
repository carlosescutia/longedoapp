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

    public function get_evento($id_evento)
    {
        $sql = ""
            ."select "
            ."e.* "
            ."from "
            ."evento e "
            ."where "
            ."e.id_evento = ? "
            ."";
        $query = $this->db->query($sql, array($id_evento));
        return $query->getRowArray();
    }

}
