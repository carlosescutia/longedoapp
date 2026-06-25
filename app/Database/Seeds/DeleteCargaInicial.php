<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DeleteCargaInicial extends Seeder
{
    public function run()
    {
        /*
        * DeleteCargaInicial
        * Elimina registros de carga inicial
        * Ejecutar solamente después de migrar información a perfil.grado_inicial
        */

        $this->db->query("delete from evaluacion where id_evento is null ;");
    }
}
