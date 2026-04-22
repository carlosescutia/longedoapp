<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterGrado extends Migration
{
    public function up()
    {
        $this->forge->addColumn('grado',[
            'edad' => [
                'type' => 'text',
                'null' => true,
            ],
            'color' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
        $this->forge->dropColumn('grado',[
            'cve_grado',
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('grado',[
            'edad',
            'color',
        ]);
        $this->forge->addColumn('grado',[
            'cve_grado' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
    }
}
