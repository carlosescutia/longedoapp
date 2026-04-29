<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterComunidad extends Migration
{
    public function up()
    {
        $this->forge->addColumn('comunidad',[
            'token' => [
                'type' => 'text',
                'null' => true,
            ],
            'codigo' => [
                'type' => 'text',
                'null' => true,
            ],
            'registrar_alumnos' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('comunidad',[
            'token',
            'codigo',
            'registrar_alumnos',
        ]);
    }
}
