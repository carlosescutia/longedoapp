<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterBitacora extends Migration
{
    public function up()
    {
        $this->forge->addColumn('bitacora',[
            'id_comunidad' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('bitacora',[
            'id_comunidad',
        ]);
    }
}
