<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterComunidad extends Migration
{
    public function up()
    {
        $this->forge->addColumn('comunidad',[
            'logo' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('comunidad',[
            'logo',
        ]);
    }
}
