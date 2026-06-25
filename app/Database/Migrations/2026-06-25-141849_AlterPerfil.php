<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPerfil extends Migration
{
    public function up()
    {
        $this->forge->addColumn('perfil',[
            'grado_inicial' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('perfil',[
            'grado_inicial',
        ]);
    }
}
