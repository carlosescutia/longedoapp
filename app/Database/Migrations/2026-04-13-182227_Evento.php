<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Evento extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_evento' => [
                'type' => 'int',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nom_evento' => [
                'type' => 'text',
                'null' => true,
            ],
            'fech_ini' => [
                'type' => 'date',
                'null' => true,
            ],
            'fech_fin' => [
                'type' => 'date',
                'null' => true,
            ],
            'redaccion' => [
                'type' => 'text',
                'null' => true,
            ],
            'lugar' => [
                'type' => 'text',
                'null' => true,
            ],
            'ubicacion' => [
                'type' => 'text',
                'null' => true,
            ],
            'activo' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_evento', true);
        $this->forge->createTable('evento');
    }

    public function down()
    {
        $this->forge->dropTable('evento');
    }
}
