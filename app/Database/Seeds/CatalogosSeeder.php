<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CatalogosSeeder extends Seeder
{
    public function run()
    {
        $this->db->query('truncate grado restart identity');
        $this->call('GradoSeeder');
        $this->db->query('truncate talla restart identity');
        $this->call('TallaSeeder');
        $this->db->query('truncate opcion_sistema restart identity');
        $this->call('OpcionSistemaSeeder');
        $this->db->query('truncate acceso_sistema restart identity');
        $this->call('AccesoSistemaSeeder');
        $this->db->query('truncate parametro_sistema restart identity');
        $this->call('ParametroSistemaSeeder');
        $this->db->query('truncate rol restart identity');
        $this->call('RolSeeder');
    }
}
