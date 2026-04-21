<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FnGrado extends Migration
{
    public function up()
    {
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

    public function down()
    {
        $sql = ""
            ."drop function grado_actual "
            ."";
        $query = $this->db->query($sql);
    }
}
