<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GradoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'cve_grado' => 'vr',
                'nom_grado' => 'Verde',
                'iniciales' => '',
                'orden' => '1',
                'activo' => 1
            ],
            [
                'cve_grado' => 'va',
                'nom_grado' => 'Verde amarela',
                'iniciales' => '',
                'orden' => '2',
                'activo' => 1
            ],
            [
                'cve_grado' => 'am',
                'nom_grado' => 'Amarela',
                'iniciales' => '',
                'orden' => '3',
                'activo' => 1
            ],
            [
                'cve_grado' => 'mn',
                'nom_grado' => 'Monitor',
                'iniciales' => 'Mn',
                'orden' => '4',
                'activo' => 1
            ],
            [
                'cve_grado' => 'in',
                'nom_grado' => 'Instructor',
                'iniciales' => 'In',
                'orden' => '5',
                'activo' => 1
            ],
            [
                'cve_grado' => 'pf',
                'nom_grado' => 'Profesor',
                'iniciales' => 'Pf',
                'orden' => '6',
                'activo' => 1
            ],
            [
                'cve_grado' => 'cm',
                'nom_grado' => 'Contramestre',
                'iniciales' => 'Cm',
                'orden' => '7',
                'activo' => 1
            ],
            [
                'cve_grado' => 'm',
                'nom_grado' => 'Mestre',
                'iniciales' => 'M',
                'orden' => '8',
                'activo' => 1
            ],
        ];

        $this->db->table('grado')->insertBatch($data);
    }
}
