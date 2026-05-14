<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPerfil extends Migration
{
    public function up()
    {
        $this->forge->addColumn('perfil',[
            'sexo_diverso' => [
                'type' => 'text',
                'null' => true,
            ],
            'whatsapp_usuario' => [
                'type' => 'text',
                'null' => true,
            ],
            'correo_usuario' => [
                'type' => 'text',
                'null' => true,
            ],
            'contacto_emergencia' => [
                'type' => 'text',
                'null' => true,
            ],
            'whatsapp_emergencia' => [
                'type' => 'text',
                'null' => true,
            ],
            'contacto_responsable' => [
                'type' => 'text',
                'null' => true,
            ],
            'whatsapp_responsable' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('perfil',[
            'sexo_diverso',
            'whatsapp_usuario',
            'correo_usuario',
            'contacto_emergencia',
            'whatsapp_emergencia',
            'contacto_responsable',
            'whatsapp_responsable',
        ]);
    }
}
