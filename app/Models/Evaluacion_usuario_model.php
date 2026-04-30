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
            ."elu.*, u.nom_usuario, p.id_perfil, p.nom_capoeira, g.nom_grado, g.musica as req_musica, g.cultura as req_cultura, g.jogo as req_jogo "
            ."from "
            ."evaluacion_usuario elu "
            ."left join usuario u on u.id_usuario = elu.id_usuario "
            ."left join perfil p on p.id_usuario = elu.id_usuario "
            ."left join grado g on g.id_grado = elu.id_grado "
            ."where "
            ."elu.id_evaluacion = ? "
            ."order by elu.id_usuario "
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

    public function get_grados_usuario($id_usuario)
    {
        $sql = ""
            ."select "
            ."evt.nom_evento, evl.fecha, evu.id_grado, g.nom_grado, g.edad, g.orden "
            ."from "
            ."evaluacion_usuario evu "
            ."left join evaluacion evl on evl.id_evaluacion = evu.id_evaluacion "
            ."left join evento evt on evt.id_evento = evl.id_evento "
            ."left join grado g on g.id_grado = evu.id_grado "
            ."where "
            ."evu.id_usuario = ? "
            ."and evu.promovido = 1 "
            ."order by "
            ."evl.fecha, g.edad, g.orden "
            ."";
        $query = $this->db->query($sql, array($id_usuario));
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
            ."evu.id_usuario = ? "
            ."and status <> 'cerrado' "
            ."";
        $query = $this->db->query($sql, array($id_usuario));
        return $query->getRowArray()['evaluacion_pendiente'] ?? null ;
    }

    public function get_info_evaluacion_usuario($id_usuario)
    {
        $sql = ""
            ."select "
            ."evt.nom_evento, evl.fecha, g.nom_grado, g.musica, g.cultura, g.jogo "
            ."from "
            ."evaluacion evl "
            ."left join evaluacion_usuario evu on evu.id_evaluacion = evl.id_evaluacion "
            ."left join evento evt on evt.id_evento = evl.id_evento "
            ."left join grado g on evu.id_grado = g.id_grado "
            ."where evl.id_evento is not null "
            ."and evu.id_usuario = ? "
            ."";
        $query = $this->db->query($sql, array($id_usuario));
        return $query->getRowArray() ;
    }

}
