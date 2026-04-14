<?php

namespace App\Models;

use CodeIgniter\Model;

class Talla_model extends Model
{
    protected $table = 'talla';
    protected $primaryKey = 'id_talla';
    protected $allowedFields = [
        'id_talla',
        'nom_talla',
        'edad',
        'orden',
        'activo',
    ];

    public function get_tallas() {
        $sql = 'select * from talla where activo = 1 order by orden ;';
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_talla($id_talla) {
        $sql = 'select * from talla where id_talla = ?;';
        $query = $this->db->query($sql, array($id_talla));
        return $query->getRowArray();
    }

}
