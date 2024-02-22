<?php

namespace App\Controllers;

use Throwable;

class Home extends BaseController
{
    public function index()
    {
        // echo "Hola ci_4";
        // $migrate = \config\Services :: migrations(); **** este codigo era para la migración Migrations

        // try {
        //     $migrate->latest();
        //     // $migrate->regress(-1); reversa la última base de datos, si el parametro es cero quita todo.
        // } catch(Throwable $e) {
        //     echo $e;
        // }

        $seeder = \Config\Database::seeder(); // este código ejecuta el seeder de la carpeta seeds
        $seeder->call('CategoriasSeeder');
    }
}
