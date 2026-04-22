<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterFnGrado extends Migration
{
    public function up()
    {
        $sql = ""
            ."create or replace function grado_actual(param_id_usuario int, param_edad text) "
            ."returns integer as "
            ."$$ "
            ."select "
            ."coalesce(eu.id_grado, '0') as id_grado "
            ."from "
            ."evaluacion_usuario eu "
            ."left join grado g on g.id_grado = eu.id_grado "
            ."where "
            ."eu.id_usuario = param_id_usuario "
            ."and g.edad = param_edad " 
            ."and eu.promovido = 1 "
            ."order by "
            ."g.orden desc limit 1 "
            ."$$ language 'sql' immutable strict "
            ."";
        $query = $this->db->query($sql);
        $sql = ""
            ."create or replace function grado_proximo(param_edad text, param_orden int) "
            ."returns integer as "
            ."$$ "
            ."select "
            ."coalesce(g.id_grado, '0') as id_grado "
            ."from "
            ."grado g "
            ."where "
            ."g.edad = param_edad " 
            ."and g.orden = coalesce(param_orden,0) + 1 "
            ."and g.activo = 1 "
            ."$$ language 'sql' immutable strict "
            ."";
        $query = $this->db->query($sql);
    }

    public function down()
    {
        $sql = ""
            ."drop function grado_proximo "
            ."";
        $query = $this->db->query($sql);
        $sql = ""
            ."create or replace function grado_actual(param_id_usuario int) "
            ."returns integer as "
            ."$$ "
            ."select "
            ."coalesce(eu.id_grado, '0') as id_grado "
            ."from "
            ."evaluacion_usuario eu "
            ."left join grado g on g.id_grado = eu.id_grado "
            ."where "
            ."eu.id_usuario = param_id_usuario "
            ."and eu.promovido = 1 "
            ."order by "
            ."g.orden desc limit 1 "
            ."$$ language 'sql' immutable strict "
            ."";
        $query = $this->db->query($sql);
    }
}
