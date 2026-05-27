<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Roda extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_roda' => [
                'type' => 'int',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nom_roda' => [
                'type' => 'text',
                'null' => true,
            ],
            'fecha' => [
                'type' => 'date',
                'null' => true,
            ],
            'redaccion' => [
                'type' => 'text',
                'null' => true,
            ],
            'lugar' => [
                'type' => 'text',
                'null' => true,
            ],
            'ubicacion' => [
                'type' => 'text',
                'null' => true,
            ],
            'cartel' => [
                'type' => 'text',
                'null' => true,
            ],
            'id_comunidad' => [
                'type' => 'int',
                'null' => true,
            ],
            'activo' => [
                'type' => 'int',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_roda', true);
        // parámetros: id_comunidad referencia en tabla comunidad columna id_comunidad, on update do nothing, on delete cascade
        $this->forge->addForeignKey('id_comunidad', 'comunidad', 'id_comunidad', '', 'cascade');
        $this->forge->createTable('roda');
    }

    public function down()
    {
        $this->forge->dropTable('roda');
    }
}
