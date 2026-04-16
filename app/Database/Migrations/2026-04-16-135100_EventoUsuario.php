<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EventoUsuario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_evento_usuario' => [
                'type' => 'int',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_evento' => [
                'type' => 'int',
            ],
            'id_usuario' => [
                'type' => 'int',
            ],
            'fecha' => [
                'type' => 'date',
            ],
        ]);
        $this->forge->addKey('id_evento_usuario', true);
        $this->forge->createTable('evento_usuario');
    }

    public function down()
    {
        $this->forge->dropTable('evento_usuario');
    }
}
