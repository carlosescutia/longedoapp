<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterEvento extends Migration
{
    public function up()
    {
        $this->forge->addColumn('evento',[
            'cartel' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('evento',[
            'cartel',
        ]);
    }
}
