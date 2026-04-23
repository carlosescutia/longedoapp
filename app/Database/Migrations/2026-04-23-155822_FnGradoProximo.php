<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FnGradoProximo extends Migration
{
    public function up()
    {
        $sql = ""
            ."/* "
            ."Función grado_proximo(id_usuario, edad) "
            ."----------------------- "
            ."Devuelve id_grado del proximo grado del usuario en el rango de edad "
            ."*/ "
            ."CREATE OR REPLACE FUNCTION grado_proximo(param_id_usuario integer, param_edad text) "
            ."RETURNS integer AS $$ "
            ."DECLARE "
            ."ac_id_grado integer; "
            ."ac_orden integer; "
            ."res_id_grado integer; "
            ."BEGIN "
            ."select grado_actual from grado_actual(param_id_usuario, param_edad) into ac_id_grado; "
            ."select orden from grado where id_grado = ac_id_grado into ac_orden ; "
            ." "
            ."if ac_orden is null then "
            ."ac_orden = 0; "
            ."end if; "
            ."select id_grado from grado where edad = param_edad and orden = ac_orden + 1 into res_id_grado ; "
            ." "
            ."return res_id_grado; "
            ."END; "
            ."$$ language plpgsql immutable strict ; "
            ."";
        $query = $this->db->query($sql);
    }

    public function down()
    {
        $sql = "drop function if exists grado_proximo(int, text) ";
        $query = $this->db->query($sql);
    }
}
