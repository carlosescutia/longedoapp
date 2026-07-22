<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Delegado extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_delegado' => [
                'type' => 'int',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_evaluacion' => [
                'type' => 'int',
                'null' => true,
            ],
            'id_evaluador' => [
                'type' => 'int',
                'null' => true,
            ],
            'id_grado' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_delegado', true);
        $this->forge->createTable('delegado');
    }

    public function down()
    {
        $this->forge->dropTable('delegado');
    }
}
