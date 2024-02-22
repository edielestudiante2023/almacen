<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregaPrecioProductos extends Migration
{
    public function up() // acá estamos añadiendo columnas a la tabla productos
    {
        $campos = [
            'precio' => [
                'type' => 'DECIMAL',
                'constraint' => '10.2', //2 decimales y 10 de longitud
                'after' => 'nombre',
                'null' => false // cuando edito una tabla debe llevar este campo

            ]
        ];
        $this->forge->addColumn('productos', $campos);
    }
    
    public function down()
    {
        $this->forge->dropColumn('productos', 'precio');
        // para revertir una columna
    }
}


// estos fueron comandos usados desde la consola haciendo spark 
// php spark make:migration AgregaPrecioProductos ********* agrega una nueva migración en la carpeta migrations
// php spark migrate ***** carga los datos que se prepararon en la public function up()
// php spark migrate:rollback -b 1 ***** hace la devolución de la ultima carga, si fuera -b 2 sería la penultima
// php spark migrate:rollback ***** hace la devolución de todas las migraciones