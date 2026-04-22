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
                'edad' => 'adulto',
                'orden' => '1',
                'activo' => 1
            ],
            [
                'nom_talla' => 'Mediana',
                'edad' => 'adulto',
                'orden' => '2',
                'activo' => 1
            ],
            [
                'nom_talla' => 'Grande',
                'edad' => 'adulto',
                'orden' => '3',
                'activo' => 1
            ],
            [
                'nom_talla' => 'Extra Grande',
                'edad' => 'adulto',
                'orden' => '4',
                'activo' => 1
            ],
            [
                'nom_talla' => '3',
                'edad' => 'niño',
                'orden' => '1',
                'activo' => 1
            ],
            [
                'nom_talla' => '5',
                'edad' => 'niño',
                'orden' => '2',
                'activo' => 1
            ],
            [
                'nom_talla' => '6',
                'edad' => 'niño',
                'orden' => '3',
                'activo' => 1
            ],
            [
                'nom_talla' => '8',
                'edad' => 'niño',
                'orden' => '4',
                'activo' => 1
            ],
            [
                'nom_talla' => '10',
                'edad' => 'niño',
                'orden' => '5',
                'activo' => 1
            ],
            [
                'nom_talla' => '12',
                'edad' => 'niño',
                'orden' => '6',
                'activo' => 1
            ],
            [
                'nom_talla' => '14',
                'edad' => 'niño',
                'orden' => '7',
                'activo' => 1
            ],
            [
                'nom_talla' => '16',
                'edad' => 'niño',
                'orden' => '8',
                'activo' => 1
            ],
        ];

        $this->db->table('talla')->insertBatch($data);
    }
}
