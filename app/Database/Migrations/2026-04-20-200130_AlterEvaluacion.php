<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterEvaluacion extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('evaluacion',[
            'activo',
        ]);
    }

    public function down()
    {
        $this->forge->addColumn('evaluacion',[
            'activo' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
    }
}
