<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OpcionSistemaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'cod_opcion_sistema' => 'reporte.can_view',
                'nom_opcion_sistema' => 'Ver reportes',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'reporte_alumno.can_view',
                'nom_opcion_sistema' => 'Reportes de alumno',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'reporte_mentor.can_view',
                'nom_opcion_sistema' => 'Reportes de mentor',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'reporte_admin.can_view',
                'nom_opcion_sistema' => 'Reportes de administrador',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'catalogo.can_view',
                'nom_opcion_sistema' => 'Ver catalogos',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'parametro_sistema.can_edit',
                'nom_opcion_sistema' => 'Editar parámetros del sistema',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'opcion_sistema.can_edit',
                'nom_opcion_sistema' => 'Editar opciones del sistema',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'acceso_sistema.can_edit',
                'nom_opcion_sistema' => 'Editar accesos del sistema',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'acceso_sistema_usuario.can_edit',
                'nom_opcion_sistema' => 'Editar accesos del sistema por usuario',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'comunidad.can_edit',
                'nom_opcion_sistema' => 'Editar comunidades',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'usuario.can_edit',
                'nom_opcion_sistema' => 'Editar usuarios',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'evaluador.can_edit',
                'nom_opcion_sistema' => 'Editar evaluadores',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'rol.can_view',
                'nom_opcion_sistema' => 'Ver roles',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'evento.can_edit',
                'nom_opcion_sistema' => 'Editar eventos',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'talla.can_edit',
                'nom_opcion_sistema' => 'Editar tallas',
                'otorgable' => null
            ],
            [
                'cod_opcion_sistema' => 'grado.can_edit',
                'nom_opcion_sistema' => 'Editar grados',
                'otorgable' => null
            ],
        ];

        $this->db->table('opcion_sistema')->insertBatch($data);
    }
}
