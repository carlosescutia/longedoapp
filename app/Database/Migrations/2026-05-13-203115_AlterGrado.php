<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterGrado extends Migration
{
    public function up()
    {
        $this->forge->addColumn('grado',[
            'requisitos' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('grado',[
            'requisitos',
        ]);
    }
}
