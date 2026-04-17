<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterEvaluacion extends Migration
{
    public function up()
    {
        $this->forge->addColumn('evaluacion',[
            'edad' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('evaluacion',[
            'edad',
        ]);
    }
}
