<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombre' => 'Calzado'
                
            ],
            [
                'nombre' => 'Deportes'
                
            ],
            [
                'nombre' => 'Elecronica'
                
            ]


            // 'id' => 1,
            // 'descripción' => '', *** como la tabla solo pide el nombre se comentaron id y descripción
        ];

        $this->db->table ('categorias')->insertBatch($data);
    }
}


//php spark make:seeder CategoriasSeeder ********* código en la consola que crea el nuevo seeder
// php spark db:seed CategoriasSeeder **** con este código se manda el seeder a la db

