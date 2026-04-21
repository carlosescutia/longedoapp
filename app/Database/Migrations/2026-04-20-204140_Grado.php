<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Grado extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_grado' => [
                'type' => 'int',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'cve_grado' => [
                'type' => 'text',
                'null' => true,
            ],
            'nom_grado' => [
                'type' => 'text',
                'null' => true,
            ],
            'iniciales' => [
                'type' => 'text',
                'null' => true,
            ],
            'orden' => [
                'type' => 'int',
                'null' => true,
            ],
            'activo' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_grado', true);
        $this->forge->createTable('grado');
    }

    public function down()
    {
        $this->forge->dropTable('grado');
    }
}
