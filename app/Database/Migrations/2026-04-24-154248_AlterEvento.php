<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterEvento extends Migration
{
    public function up()
    {
        $this->forge->addColumn('evento',[
            'token' => [
                'type' => 'text',
                'null' => true,
            ],
            'codigo' => [
                'type' => 'text',
                'null' => true,
            ],
            'registrar_externos' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('evento',[
            'token',
            'codigo',
            'registrar_externos',
        ]);
    }
}
