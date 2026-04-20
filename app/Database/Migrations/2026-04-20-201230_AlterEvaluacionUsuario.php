<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterEvaluacionUsuario extends Migration
{
    public function up()
    {
        $this->forge->addColumn('evaluacion_usuario',[
            'id_grado' => [
                'type' => 'int',
                'null' => true,
            ],
            'promovido' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('evaluacion_usuario',[
            'id_grado',
            'promovido',
        ]);
    }
}
