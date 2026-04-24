<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Externo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_externo' => [
                'type' => 'int',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_evento' => [
                'type' => 'int',
                'null' => true,
            ],
            'fecha_registro' => [
                'type' => 'date',
                'null' => true,
            ],
            'nom_completo' => [
                'type' => 'text',
                'null' => true,
            ],
            'nom_capoeira' => [
                'type' => 'text',
                'null' => true,
            ],
            'grupo' => [
                'type' => 'text',
                'null' => true,
            ],
            'sexo' => [
                'type' => 'text',
                'null' => true,
            ],
            'id_talla' => [
                'type' => 'int',
                'null' => true,
            ],
            'edad' => [
                'type' => 'text',
                'null' => true,
            ],
            'nota' => [
                'type' => 'text',
                'null' => true,
            ],
            'codigo' => [
                'type' => 'text',
                'null' => true,
            ],
            'activo' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_externo', true);
        $this->forge->createTable('externo');
        // parámetros: id_evento referencia en tabla evento columna id_evento, on update do nothing, on delete cascade
        $this->forge->addForeignKey('id_evento', 'evento', 'id_evento', '', 'cascade');
    }

    public function down()
    {
        $this->forge->dropTable('externo');
    }
}
