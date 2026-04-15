<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ComunidadSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom_comunidad' => 'LDM León',
                'ciudad' => 'León, Gto',
                'activo' => 1
            ],
        ];

        $this->db->table('comunidad')->insertBatch($data);
    }
}
