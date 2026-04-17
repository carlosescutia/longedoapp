<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Evaluacion extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_evaluacion' => [
                'type' => 'int',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_evento' => [
                'type' => 'int',
                'null' => true,
            ],
            'id_evaluador' => [
                'type' => 'int',
                'null' => true,
            ],
            'fecha' => [
                'type' => 'date',
                'null' => true,
            ],
            'status' => [
                'type' => 'text',
                'null' => true,
            ],
            'activo' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_evaluacion', true);
        // parámetros: id_evento referencia en tabla evento columna id_evento, on update do nothing, on delete cascade
        $this->forge->addForeignKey('id_evento', 'evento', 'id_evento', '', 'cascade');
        $this->forge->createTable('evaluacion');
    }

    public function down()
    {
        $this->forge->dropTable('evaluacion');
    }
}
