<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterEventoUsuario extends Migration
{
    public function up()
    {
        $this->forge->addColumn('evento_usuario',[
            'asistencia' => [
                'type' => 'int',
                'null' => true,
            ],
            'pago' => [
                'type' => 'int',
                'null' => true,
            ],
            'kit' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('evento_usuario',[
            'asistencia',
            'pago',
            'kit',
        ]);
    }
}
