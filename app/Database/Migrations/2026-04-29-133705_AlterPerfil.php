<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPerfil extends Migration
{
    public function up()
    {
        $this->forge->addColumn('perfil',[
            'foto' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('perfil',[
            'foto',
        ]);
    }
}
