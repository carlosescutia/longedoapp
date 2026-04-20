<?php

namespace App\Models;

use CodeIgniter\Model;

class Evento_usuario_model extends Model
{
    protected $table = 'evento_usuario';
    protected $primaryKey = 'id_evento_usuario';
    protected $allowedFields = [
        'id_evento',
        'id_usuario',
        'fecha',
    ];

    public function get_evento_usuario($id_evento_usuario)
    {
        $sql = ""
            ."select "
            ."ea.* "
            ."from "
            ."evento_usuario ea "
            ."where "
            ."ea.id_evento_usuario = ? "
            ."";
        $query = $this->db->query($sql, array($id_evento_usuario));
        return $query->getRowArray();
    }

    public function get_usuario_asiste($id_evento, $id_usuario)
    {
        $sql = ""
            ."select "
            ."1 as usuario_asiste "
            ."from "
            ."evento_usuario ea "
            ."where "
            ."ea.id_evento = ? "
            ."and ea.id_usuario = ? "
            ."";
        $query = $this->db->query($sql, array($id_evento, $id_usuario));
        return $query->getRowArray()['usuario_asiste'] ?? null ;
    }

    public function get_asistencias_usuario($id_usuario)
    {
        $sql = ""
            ."select "
            ."ea.id_evento "
            ."from "
            ."evento_usuario ea "
            ."where "
            ."ea.id_usuario = ? "
            ."";
        $query = $this->db->query($sql, array($id_usuario));
        return $query->getResultArray() ;
    }

    public function get_asistentes_evento($id_evento, $salida)
    {
        $dbutil = \Config\Database::utils();

        $sql = ""
            ."select "
            ."ea.id_usuario, "
            ."u.nom_usuario, "
            ."p.nom_capoeira, sexo, edad, "
            ."t.nom_talla "
            ."from "
            ."evento_usuario ea "
            ."left join usuario u on u.id_usuario = ea.id_usuario "
            ."left join perfil p on p.id_usuario = ea.id_usuario "
            ."left join talla t on t.id_talla = p.id_talla "
            ."where "
            ."ea.id_evento = ? "
            ."";
        $query = $this->db->query($sql, array($id_evento));
        if ($salida == 'csv') {
            $delimiter = ",";
            $newline = "\r\n";
            $enclosure = '"';
            return $dbutil->getCSVFromResult($query, $delimiter, $newline, $enclosure);
        } else {
            return $query->getResultArray();
        }
    }

}
