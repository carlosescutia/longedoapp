<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterUsuario extends Migration
{
    public function up()
    {
        $this->forge->addColumn('usuario',[
            'evaluador' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('usuario',[
            'evaluador',
        ]);
    }
}
