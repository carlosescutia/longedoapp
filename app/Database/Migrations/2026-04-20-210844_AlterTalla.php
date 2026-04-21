<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTalla extends Migration
{
    public function up()
    {
        $this->forge->addColumn('talla',[
            'edad' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('talla',[
            'edad',
        ]);
    }
}
