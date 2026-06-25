<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterFnGradoActual extends Migration
{
    public function up()
    {
        $sql = ""
            ."/* "
            ."Función grado_actual(id_usuario, edad) "
            ."----------------------- "
            ."Devuelve id_grado del grado actual del usuario en el rango de edad "
            ."*/ "
            ."CREATE OR REPLACE FUNCTION grado_actual(param_id_usuario integer, param_edad text) "
            ."RETURNS integer AS "
            ."$$ "
            ."DECLARE "
                ."res_id_grado integer; "
            ."BEGIN "
                ."with grados_todos as ( "
                        ."select "
                            ."coalesce(p.grado_inicial,0) as id_grado, coalesce(g.orden,0) as orden, 'grado_inicial' as fuente "
                        ."from "
                            ."perfil p "
                            ."left join grado g on g.id_grado = p.grado_inicial "
                        ."where "
                            ."p.id_usuario = param_id_usuario "
                    ."union all "
                        ."select "
                            ."coalesce(eu.id_grado,0) as id_grado, coalesce(g.orden,0) as orden, 'carga' as fuente "
                        ."from "
                            ."evaluacion_usuario eu "
                            ."left join grado g on g.id_grado = eu.id_grado "
                        ."where "
                            ."eu.id_usuario = param_id_usuario "
                            ."and g.edad = param_edad "
                            ."and eu.promovido = 1 "
                    ."order by "
                        ."orden desc "
                    ."limit 1 "
                ." ) "
                ."select id_grado into res_id_grado from grados_todos; "
                ." "
                ."return res_id_grado; "
            ."END; "
            ."$$ language plpgsql immutable strict ; "
            ."";
        $query = $this->db->query($sql);
    }

    public function down()
    {
        $sql = ""
            ."/* "
            ."Función grado_actual(id_usuario, edad) "
            ."----------------------- "
            ."Devuelve id_grado del grado actual del usuario en el rango de edad "
            ."*/ "
            ."CREATE OR REPLACE FUNCTION grado_actual(param_id_usuario integer, param_edad text) "
            ."RETURNS integer AS $$ "
            ."DECLARE "
                ."res_id_grado integer; "
            ."BEGIN "
                ."select "
                    ."eu.id_grado into res_id_grado  "
                ."from  "
                    ."evaluacion_usuario eu  "
                    ."left join grado g on g.id_grado = eu.id_grado  "
                ."where  "
                    ."eu.id_usuario = param_id_usuario  "
                    ."and g.edad = param_edad  "
                    ."and eu.promovido = 1  "
                ."order by  "
                    ."g.orden desc limit 1; "
                ." "
                ."if res_id_grado is null then "
                    ."res_id_grado := 0; "
                ."end if; "
                ." "
                ."return res_id_grado; "
            ."END; "
            ."$$ language plpgsql immutable strict ; "
            ."";
        $query = $this->db->query($sql);
    }
}
