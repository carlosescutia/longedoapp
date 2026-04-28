<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPerfil extends Migration
{
    public function up()
    {
        $this->forge->addColumn('perfil',[
            'fech_acept_priv' => [
                'type' => 'date',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('perfil',[
            'fech_acept_priv',
        ]);
    }
}
