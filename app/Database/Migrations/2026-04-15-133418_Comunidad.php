<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comunidad extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_comunidad' => [
                'type' => 'int',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nom_comunidad' => [
                'type' => 'text',
                'null' => true,
            ],
            'ciudad' => [
                'type' => 'text',
                'null' => true,
            ],
            'activo' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_comunidad', true);
        $this->forge->createTable('comunidad');
    }

    public function down()
    {
        $this->forge->dropTable('comunidad');
    }
}
