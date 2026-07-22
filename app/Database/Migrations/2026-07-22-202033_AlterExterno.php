<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterExterno extends Migration
{
    public function up()
    {
        $this->forge->addColumn('externo',[
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
        $this->forge->dropColumn('externo',[
            'asistencia',
            'pago',
            'kit',
        ]);
    }
}
