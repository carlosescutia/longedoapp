<?php

namespace App\Models;

use CodeIgniter\Model;

class Roda_model extends Model
{
    protected $table = 'roda';
    protected $primaryKey = 'id_roda';
    protected $allowedFields = [
        'id_roda',
        'nom_roda',
        'fecha',
        'lugar',
        'ubicacion',
        'redaccion',
        'activo',
        'id_comunidad',
        'cartel',
    ];

    public function get_rodas()
    {
        $sql = ""
            ."select "
            ."r.*, c.nom_comunidad "
            ."from "
            ."roda r "
            ."left join comunidad c on c.id_comunidad = r.id_comunidad "
            ."order by fecha "
            ."";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_rodas_actuales()
    {
        $sql = ""
            ."select "
            ."r.*, c.nom_comunidad "
            ."from "
            ."roda r "
            ."left join comunidad c on c.id_comunidad = r.id_comunidad "
            ."where "
            ."r.fecha +1 >= now() "
            ."order by fecha "
            ."";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_rodas_anteriores()
    {
        $sql = ""
            ."select "
            ."r.*, c.nom_comunidad "
            ."from "
            ."roda r "
            ."left join comunidad c on c.id_comunidad = r.id_comunidad "
            ."where "
            ."r.fecha +1 < now() "
            ."order by r.fecha "
            ."";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_roda($id_roda)
    {
        $sql = ""
            ."select "
            ."r.*, "
            ."(case when fecha + 1 >= now() then 1 else null end) as actual "
            ."from "
            ."roda r "
            ."where "
            ."r.id_roda = ? "
            ."";
        $query = $this->db->query($sql, array($id_roda));
        return $query->getRowArray();
    }

}

