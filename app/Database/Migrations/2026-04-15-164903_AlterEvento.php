<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterEvento extends Migration
{
    public function up()
    {
        $this->forge->addColumn('evento',[
            'id_comunidad' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
        // parámetros: id_comunidad referencia en tabla comunidad columna id_comunidad, on update do nothing, on delete cascade
        $this->forge->addForeignKey('id_comunidad', 'comunidad', 'id_comunidad', '', 'cascade');
        // agregar foreign key definida a tabla evento
        $this->forge->processIndexes('evento');
    }

    public function down()
    {
        $this->forge->dropColumn('evento',[
            'id_comunidad',
        ]);
        $this->forge->dropForeignKey('evento','id_comunidad');
    }
}
