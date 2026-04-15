<?php

namespace App\Models;

use CodeIgniter\Model;

class Comunidad_model extends Model
{
    protected $table = 'comunidad';
    protected $primaryKey = 'id_comunidad';
    protected $allowedFields = [
        'nom_comunidad',
        'ciudad',
        'activo',
    ];

    public function get_comunidades() {
        $sql = 'select * from comunidad where activo = 1 order by nom_comunidad;';
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_comunidad($id_comunidad) {
        $sql = 'select * from comunidad where id_comunidad = ?;';
        $query = $this->db->query($sql, array($id_comunidad));
        return $query->getRowArray();
    }

}
