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

    public function get_tallas_edad($edad) {
        $sql = 'select * from talla where activo = 1 and edad = ? order by orden ;';
        $query = $this->db->query($sql, array($edad));
        return $query->getResultArray();
    }

    public function get_tallas_edad_drop($edad) {
        // salida formateada para uso en dropdowns
        $sql = 'select nom_talla as name, id_talla as value from talla where activo = 1 and edad = ? order by orden ;';
        $query = $this->db->query($sql, array($edad));
        return $query->getResultArray();
    }


    public function get_talla($id_talla) {
        $sql = 'select * from talla where id_talla = ?;';
        $query = $this->db->query($sql, array($id_talla));
        return $query->getRowArray();
    }

}
