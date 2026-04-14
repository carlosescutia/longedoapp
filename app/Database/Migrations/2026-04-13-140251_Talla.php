<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Talla extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_talla' => [
                'type' => 'int',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nom_talla' => [
                'type' => 'text',
                'null' => true,
            ],
            'orden' => [
                'type' => 'integer',
                'null' => true,
            ],
            'activo' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_talla', true);
        $this->forge->createTable('talla');
    }

    public function down()
    {
        $this->forge->dropTable('talla');
    }
}
