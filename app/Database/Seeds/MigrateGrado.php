<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MigrateGrado extends Seeder
{
    public function run()
    {
        /*
        * MigrateGrado
        * Migra la información de grado inicial de evaluacion a perfil.grado_inicial
        */

        $this->db->query("update perfil set grado_inicial = (select grado_actual(id_usuario, edad) ) ;");
    }
}
