<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OperacionSeeder extends Seeder
{
    public function run()
    {
        /*
        operacionSeeder
        * truncar solamente para nueva operación desde cero ** Peligroso **

        --------
        truncado
        --------
        */
        $this->db->query('truncate perfil restart identity');
        $this->db->query('truncate evento restart identity cascade');
        $this->db->query('truncate evento_usuario restart identity');
        $this->db->query('truncate evaluacion restart identity cascade');
        $this->db->query('truncate evaluacion_usuario restart identity');
        $this->db->query('truncate externo restart identity');
        $this->db->query('truncate acceso_sistema_usuario restart identity');
        $this->db->query('truncate bitacora restart identity');

        /*
        ------------------
        truncado y seeding
        ------------------
        */
        $this->db->query('truncate comunidad restart identity cascade');
        $this->call('ComunidadSeeder');
        $this->db->query('truncate usuario restart identity cascade');
        $this->call('UsuarioSeeder');
    }
}
