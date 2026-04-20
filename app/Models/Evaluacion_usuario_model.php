<?php

namespace App\Models;

use CodeIgniter\Model;

class Evaluacion_usuario_model extends Model
{
    protected $table = 'evaluacion_usuario';
    protected $primaryKey = 'id_evaluacion_usuario';
    protected $allowedFields = [
        'id_evaluacion',
        'id_usuario',
        'id_grado',
        'musica',
        'cultura',
        'jogo',
        'promovido',
        'observacion_evaluador',
        'observacion_alumno',
    ];

    public function get_evaluacion_usuario($id_evaluacion_usuario)
    {
        $sql = ""
            ."select "
            ."ea.* "
            ."from "
            ."evaluacion_usuario ea "
            ."where "
            ."ea.id_evaluacion_usuario = ? "
            ."";
        $query = $this->db->query($sql, array($id_evaluacion_usuario));
        return $query->getRowArray();
    }

    public function get_evaluaciones_usuario($id_usuario)
    {
        $sql = ""
            ."select "
            ."elu.*, el.* "
            ."from "
            ."evaluacion_usuario elu "
            ."left join evaluacion el on el.id_evaluacion = elu.id_evaluacion "
            ."where "
            ."elu.id_usuario = ? "
            ."";
        $query = $this->db->query($sql, array($id_usuario));
        return $query->getResultArray();
    }

    public function get_evaluados($id_evaluacion)
    {
        $sql = ""
            ."select "
            ."elu.*, u.nom_usuario, p.nom_capoeira "
            ."from "
            ."evaluacion_usuario elu "
            ."left join usuario u on u.id_usuario = elu.id_usuario "
            ."left join perfil p on p.id_usuario = elu.id_usuario "
            ."where "
            ."elu.id_evaluacion = ? "
            ."";
        $query = $this->db->query($sql, array($id_evaluacion));
        return $query->getResultArray();
    }

    public function get_usuario_evalua($id_evento, $id_usuario)
    {
        $sql = ""
            ."select "
            ."1 as usuario_evalua "
            ."from "
            ."evaluacion_usuario ela "
            ."left join evaluacion el on el.id_evaluacion = ela.id_evaluacion "
            ."left join evento e on e.id_evento = el.id_evento "
            ."where "
            ."e.id_evento = ? "
            ."and ela.id_usuario = ? "
            ."";
        $query = $this->db->query($sql, array($id_evento, $id_usuario));
        return $query->getRowArray()['usuario_evalua'] ?? null ;
    }

}
