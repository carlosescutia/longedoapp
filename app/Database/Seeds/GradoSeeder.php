<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GradoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom_grado' => 'Verde',
                'edad' => 'adulto',
                'color' => 'verde',
                'iniciales' => '',
                'orden' => 1,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Apropiación Verde amarelo',
                'edad' => 'adulto',
                'color' => '3verde_1amarillo',
                'iniciales' => '',
                'orden' => 2,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Verde amarelo',
                'edad' => 'adulto',
                'color' => 'verde_amarillo',
                'iniciales' => '',
                'orden' => 3,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Apropiación Amarelo',
                'edad' => 'adulto',
                'color' => '1verde_3amarillo',
                'iniciales' => '',
                'orden' => 4,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Amarelo',
                'edad' => 'adulto',
                'color' => 'amarillo',
                'iniciales' => '',
                'orden' => 5,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Apropiación Monitor',
                'edad' => 'adulto',
                'color' => '3amarillo_1azul',
                'iniciales' => '',
                'orden' => 6,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Monitor',
                'edad' => 'adulto',
                'color' => 'amarillo_azul',
                'iniciales' => 'Mn',
                'orden' => 7,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Instructor',
                'edad' => 'adulto',
                'color' => '',
                'iniciales' => 'In',
                'orden' => 8,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Profesor',
                'edad' => 'adulto',
                'color' => '',
                'iniciales' => 'Pf',
                'orden' => 9,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Contramestre',
                'edad' => 'adulto',
                'color' => '',
                'iniciales' => 'Cm',
                'orden' => 10,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Mestre',
                'edad' => 'adulto',
                'color' => '',
                'iniciales' => 'M',
                'orden' => 11,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Verde',
                'edad' => 'adulto_mayor',
                'color' => 'verde',
                'iniciales' => '',
                'orden' => 1,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Apropiación Verde amarelo',
                'edad' => 'adulto_mayor',
                'color' => '3verde_1amarillo',
                'iniciales' => '',
                'orden' => 2,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Verde amarelo',
                'edad' => 'adulto_mayor',
                'color' => 'verde_amarillo',
                'iniciales' => '',
                'orden' => 3,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Primer grado',
                'edad' => 'niño',
                'color' => '',
                'iniciales' => '',
                'orden' => 1,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Segundo grado',
                'edad' => 'niño',
                'color' => '',
                'iniciales' => '',
                'orden' => 2,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Tercer grado',
                'edad' => 'niño',
                'color' => '',
                'iniciales' => '',
                'orden' => 3,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Cuarto grado',
                'edad' => 'niño',
                'color' => '',
                'iniciales' => '',
                'orden' => 4,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Quinto grado',
                'edad' => 'niño',
                'color' => '',
                'iniciales' => '',
                'orden' => 5,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Sexto grado',
                'edad' => 'niño',
                'color' => '',
                'iniciales' => '',
                'orden' => 6,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Séptimo grado',
                'edad' => 'niño',
                'color' => '',
                'iniciales' => '',
                'orden' => 7,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Octavo grado',
                'edad' => 'niño',
                'color' => '',
                'iniciales' => '',
                'orden' => 8,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Noveno grado',
                'edad' => 'niño',
                'color' => '',
                'iniciales' => '',
                'orden' => 9,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Décimo grado',
                'edad' => 'niño',
                'color' => '',
                'iniciales' => '',
                'orden' => 10,
                'activo' => 1
            ],
        ];

        $this->db->table('grado')->insertBatch($data);
    }
}
