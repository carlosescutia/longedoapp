<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RecursoEntidad extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_recurso_entidad' => [
                'type' => 'int',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_recurso' => [
                'type' => 'int',
                'null' => true,
            ],
            'id_entidad' => [
                'type' => 'int',
                'null' => true,
            ],
            'entidad' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_recurso_entidad', true);
        $this->forge->createTable('recurso_entidad');
    }

    public function down()
    {
        $this->forge->dropTable('recurso_entidad');
    }
}
