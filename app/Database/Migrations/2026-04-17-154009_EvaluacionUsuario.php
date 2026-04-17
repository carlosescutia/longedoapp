<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EvaluacionUsuario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_evaluacion_usuario' => [
                'type' => 'int',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_evaluacion' => [
                'type' => 'int',
            ],
            'id_usuario' => [
                'type' => 'int',
            ],
            'musica' => [
                'type' => 'text',
                'null' => true,
            ],
            'cultura' => [
                'type' => 'text',
                'null' => true,
            ],
            'jogo' => [
                'type' => 'text',
                'null' => true,
            ],
            'observacion_evaluador' => [
                'type' => 'text',
                'null' => true,
            ],
            'observacion_alumno' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_evaluacion_usuario', true);
        $this->forge->createTable('evaluacion_usuario');
    }

    public function down()
    {
        $this->forge->dropTable('evaluacion_usuario');
    }
}
