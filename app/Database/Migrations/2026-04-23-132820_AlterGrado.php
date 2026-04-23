<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterGrado extends Migration
{
    public function up()
    {
        $this->forge->addColumn('grado',[
            'musica' => [
                'type' => 'text',
                'null' => true,
            ],
            'cultura' => [
                'type' => 'text',
                'null' => true,
            ],
            'jogo' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('grado',[
            'musica',
            'cultura',
            'jogo',
        ]);
    }
}
