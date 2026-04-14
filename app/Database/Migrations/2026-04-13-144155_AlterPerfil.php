<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPerfil extends Migration
{
    public function up()
    {
        $this->forge->addColumn('perfil',[
            'edad' => [
                'type' => 'text',
                'null' => true,
            ],
        ]);
        // parámetros: id_usuario referencia en tabla usuario columna id_usuario, on update do nothing, on delete cascade
        $this->forge->addForeignKey('id_usuario', 'usuario', 'id_usuario', '', 'cascade');
        // agregar foreign key definida a tabla perfil
        $this->forge->processIndexes('perfil');
    }

    public function down()
    {
        $this->forge->dropColumn('perfil',[
            'edad',
        ]);
        $this->forge->dropForeignKey('perfil','id_usuario');
    }
}
