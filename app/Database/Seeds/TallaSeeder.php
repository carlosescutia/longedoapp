<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TallaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom_talla' => 'Chica',
                'orden' => '1',
                'activo' => 1
            ],
            [
                'nom_talla' => 'Mediana',
                'orden' => '2',
                'activo' => 1
            ],
            [
                'nom_talla' => 'Grande',
                'orden' => '3',
                'activo' => 1
            ],
            [
                'nom_talla' => 'Extra Grande',
                'orden' => '4',
                'activo' => 1
            ],
        ];

        $this->db->table('talla')->insertBatch($data);
    }
}
