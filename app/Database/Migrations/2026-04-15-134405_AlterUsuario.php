<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterUsuario extends Migration
{
    public function up()
    {
        $this->forge->addColumn('usuario',[
            'id_comunidad' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
        // parámetros: id_comunidad referencia en tabla comunidad columna id_comunidad, on update do nothing, on delete cascade
        $this->forge->addForeignKey('id_comunidad', 'comunidad', 'id_comunidad', '', 'cascade');
        // agregar foreign key definida a tabla usuario
        $this->forge->processIndexes('usuario');
    }

    public function down()
    {
        $this->forge->dropColumn('usuario',[
            'id_comunidad',
        ]);
        $this->forge->dropForeignKey('usuario','id_comunidad');
    }
}
