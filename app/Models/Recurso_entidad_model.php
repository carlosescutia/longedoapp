<?php

namespace App\Models;

use CodeIgniter\Model;

class Recurso_entidad_model extends Model
{
    protected $table = 'recurso_entidad';
    protected $primaryKey = 'id_recurso_entidad';
    protected $allowedFields = [
        'id_recurso',
        'id_entidad',
        'entidad',
    ];

    public function get_recursos_entidad_todos() {
        $sql = 'select '
            .'r.id_recurso, r.nom_recurso, r.url, r.archivo, r.activo, '
            .'re.id_recurso_entidad, re.id_entidad, re.entidad '
            .'from '
            .'recurso_entidad re '
            .'left join recurso r on r.id_recurso = re.id_recurso '
            .'order by '
            .'r.nom_recurso'
            .'';
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_recursos_entidad_activos() {
        $sql = 'select '
            .'r.id_recurso, r.nom_recurso, r.url, r.archivo, r.activo, '
            .'re.id_recurso_entidad, re.id_entidad, re.entidad '
            .'from '
            .'recurso_entidad re '
            .'left join recurso r on r.id_recurso = re.id_recurso '
            .'where '
            .'r.activo = 1 '
            .'order by '
            .'r.nom_recurso'
            .'';
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_recursos_entidad_entidad($id_entidad, $entidad) {
        $sql = 'select '
            .'r.id_recurso, r.nom_recurso, r.url, r.archivo, r.activo, '
            .'re.id_recurso_entidad, re.id_entidad, re.entidad '
            .'from '
            .'recurso_entidad re '
            .'left join recurso r on r.id_recurso = re.id_recurso '
            .'where '
            .'re.id_entidad = ? '
            .'and re.entidad = ? '
            .'order by '
            .'r.nom_recurso'
            .'';
        $query = $this->db->query($sql, array($id_entidad, $entidad));
        return $query->getResultArray();
    }

    public function get_recurso_entidad($id_recurso_entidad) {
        $sql = 'select * from recurso_entidad where id_recurso_entidad = ?;';
        $query = $this->db->query($sql, array($id_recurso_entidad));
        return $query->getRowArray();
    }

}

