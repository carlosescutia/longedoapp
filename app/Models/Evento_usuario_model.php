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
        'asistencia',
        'pago',
        'kit',
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
                ."eu.id_evento_usuario, "
                ."eu.id_usuario, "
                ."c.nom_comunidad, "
                ."u.nom_usuario, "
                ."p.nom_capoeira, p.sexo, p.edad, "
                ."t.nom_talla, "
                ."'' as nota, "
                ."'' as codigo, "
                ."'interno' as tipo_asistente, "
                ."eu.asistencia, eu.pago, eu.kit "
            ."from "
                ."evento_usuario eu "
                ."left join usuario u on u.id_usuario = eu.id_usuario "
                ."left join comunidad c on c.id_comunidad = u.id_comunidad "
                ."left join perfil p on p.id_usuario = eu.id_usuario "
                ."left join talla t on t.id_talla = p.id_talla "
            ."where "
                ."eu.id_evento = ? "
            ."union "
                ."select  "
                ."ex.id_externo as id_evento_usuario, "
                ."ex.id_externo, 'E: ' || ex.grupo as nom_comunidad, ex.nom_completo as nom_usuario, ex.nom_capoeira, ex.sexo, ex.edad, t.nom_talla, ex.nota, ex.codigo,  "
                ."'externo' as tipo_asistente, "
                ."ex.asistencia, ex.pago, ex.kit "
            ."from  "
                ."externo ex  "
                ."left join talla t on t.id_talla = ex.id_talla  "
            ."where  "
                ."ex.id_evento = ? "
                ."and ex.activo = 1 "
            ."order by nom_comunidad desc, nom_usuario "
            ."";
        $query = $this->db->query($sql, array($id_evento, $id_evento));
        if ($salida == 'csv') {
            $delimiter = ",";
            $newline = "\r\n";
            $enclosure = '"';
            return $dbutil->getCSVFromResult($query, $delimiter, $newline, $enclosure);
        } else {
            return $query->getResultArray();
        }
    }

    public function get_playeras_evento($id_evento, $salida)
    {
        $dbutil = \Config\Database::utils();

        $sql = ""
            ."with tallas as ( "
                    ."select "
                        ."t.nom_talla, p.sexo, t.edad, t.orden "
                    ."from "
                        ."evento_usuario evu "
                        ."left join perfil p on p.id_usuario = evu.id_usuario "
                        ."left join talla t on t.id_talla = p.id_talla "
                    ."where "
                        ."evu.id_evento = ? "
                ."union all "
                    ."select "
                        ."t.nom_talla, ex.sexo, t.edad, t.orden "
                    ."from "
                        ."externo ex "
                        ."left join talla t on t.id_talla = ex.id_talla "
                    ."where "
                        ."ex.id_evento = ? "
                        ."and ex.activo = 1 "
            .")  "
            ."select  "
                ."nom_talla, sexo, edad, count(*) as cantidad "
            ."from  "
                ."tallas "
            ."group by "
                ."nom_talla, orden, sexo, edad "
            ."order by "
                ."sexo, edad, orden, nom_talla "
            ."";
        $query = $this->db->query($sql, array($id_evento, $id_evento));
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
