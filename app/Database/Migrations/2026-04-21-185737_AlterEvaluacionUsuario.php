<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterEvaluacionUsuario extends Migration
{
    public function up()
    {
        // parámetros: id_evaluacion referencia en tabla evaluacion columna id_evaluacion, on update do nothing, on delete cascade
        $this->forge->addForeignKey('id_evaluacion', 'evaluacion', 'id_evaluacion', '', 'cascade');
        // agregar foreign key definida a tabla evaluacion_usuario
        $this->forge->processIndexes('evaluacion_usuario');
    }

    public function down()
    {
        $this->forge->dropForeignKey('evaluacion_usuario','evaluacion_usuario_id_evaluacion_foreign');
    }
}
