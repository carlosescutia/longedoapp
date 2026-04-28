<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ParametroSistemaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom_parametro_sistema' => 'anio',
                'valor' => '2026',
            ],
            [
                'nom_parametro_sistema' => 'aviso_privacidad',
                'valor' => 'https://www.iis.unam.mx/blog/plantilla-aviso-de-privacidad-mexico-investigadores/',
            ],
        ];

        $this->db->table('parametro_sistema')->insertBatch($data);
    }
}
