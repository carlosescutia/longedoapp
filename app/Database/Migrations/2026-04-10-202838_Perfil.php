<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Perfil extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_perfil' => [
                'type' => 'int',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_usuario' => [
                'type' => 'int',
            ],
            'nom_capoeira' => [
                'type' => 'text',
                'null' => true,
            ],
            'fecha_ingreso' => [
                'type' => 'date',
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
        ]);
        $this->forge->addKey('id_perfil', true);
        $this->forge->createTable('perfil');
    }

    public function down()
    {
        $this->forge->dropTable('perfil');
    }
}
