<?php

namespace App\Models;

use CodeIgniter\Model;

class Delegado_model extends Model
{
    protected $table = 'delegado';
    protected $primaryKey = 'id_delegado';
    protected $allowedFields = [
        'id_delegado',
        'id_evaluacion',
        'id_evaluador',
        'id_grado',
    ];

    public function get_delegados_evaluacion($id_evaluacion) {
        $sql = ""
            ."select "
                ."d.*, u.nom_usuario, p.nom_capoeira, g.nom_grado "
            ."from "
                ."delegado d "
                ."left join usuario u on u.id_usuario = d.id_evaluador "
                ."left join perfil p on p.id_usuario = d.id_evaluador "
                ."left join grado g on g.id_grado = d.id_grado "
            ."where "
                ."d.id_evaluacion = ? "
            ."order by "
                ."d.id_delegado "
            ."";
        $query = $this->db->query($sql, array($id_evaluacion));
        return $query->getResultArray();
    }

    public function get_delegado($id_delegado) {
        $sql = 'select * from delegado where id_delegado = ?;';
        $query = $this->db->query($sql, array($id_delegado));
        return $query->getRowArray();
    }

}
