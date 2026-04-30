<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolSeeder extends Seeder
{
    public function run()
    {
        $this->db->query('truncate rol restart identity');

        $data = [
            [
                'id_rol' => 'admin',
                'nom_rol' => 'Administrador',
            ],
            [
                'id_rol' => 'mentor',
                'nom_rol' => 'Mentor',
            ],
            [
                'id_rol' => 'alumno',
                'nom_rol' => 'Alumno',
            ],
        ];

        $this->db->table('rol')->insertBatch($data);
        //
    }
}
