<?php

namespace App\Controllers;

use App\Models\ProductosModel;
class Productos extends BaseController

{   
    private $productoModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->productoModel = new ProductosModel();
    }
    public function index()

    {
        
        $db = \config\Database::connect();

        // $condicion = ['status' => 1, 'stock >' =>5];
        // $condicion = "status = 1 OR stock > 4";

        // $query = $db->query("SELECT codigo, nombre, stock FROM productos");

        // $query = $db->table('productos')
        // ->select('id, codigo, nombre, stock')
        // // ->where($condicion)
        // ->where('status',1)
        // ->where('stock >',4)
        // ->orderBy('nombre','ASC')
        // ->limit(1)
        // ->get();

        // $query = $db->table('productos');
        // $query->select('*');
        // $query->join('almacen','productos.id_almacen = almacen.id');
        // $query->get();
        // $resultado = $query->getResultArray();
        // echo $db->getLastQuery();
        
        $sql = $db->table('productos');
        $sql->select('productos.id, productos.codigo, productos.nombre, productos.stock, almacen.nombre AS almacen');
        // $sql->join('almacen','productos.id_almacen = almacen.id AS idAlmacen,');
        $sql->join('almacen','productos.id_almacen = almacen.id');
        $query = $sql->get();
        $resultado = $query->getResultArray();
        echo $db->getLastQuery();


        // $productoModel = new ProductosModel();
        // $resultado = $productoModel->where('status,1')->findAll();

        $data = ['titulo' => 'catalogo de productos', 'productos' => $resultado];  

        return view('productos/index', $data);




        // return view('plantilla/header', $data)
        //     .view('productos/index', $data)
        //     .view('plantilla/footer', ['copy' => "2023"]);
        
        // return view('productos/index', $data);
        // echo "<h1>ControllerProductos</h1>";
        // print_r($this->session);
    }

    public function nuevo(){

        // helper('form'); 
        // así se activa un helper desde el controller y solo funciona para esta función, si queremos que funcione en todo lugar se hace en el constructor
        $data = ['titulo' => 'Nuevo Producto'];
        return view('productos/nuevo', $data);
    }

    public function guarda() {
        print_r($_POST);

        $reglas = [
            'codigo' => 'required',
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ];

        if($this->validate($reglas)) {
            
            return redirect()->back()->withInput();
        
        }
    }
    

    public function show($id)
    {

        $productoModel = new ProductosModel();
        $producto = $productoModel->find($id);
        $data = [
                'titulo' => 'catalogo de productos',
                'producto' => $producto

                ];  
        
                return view('productos/show', $data);

        // return view('plantilla/header', $data)
        //     .view('productos/show', $data)
        //     .view('plantilla/footer', ['copy' => "2023"]);
    }

    public function transaccion ()

    {

        $data = [
            'codigo' => "ABC-9123",
            'nombre' => "Camara Nikon"
            // 'stock' => 7,
            // 'id_almacen' => 1,
            // 'status' => 1
            
        ];
        
        // echo $this->productoModel->insert($data,false); 
        // echo $this->productoModel->update(5, $data); 
        // echo $this->productoModel->delete(5); 
        echo $this->productoModel->purgeDeleted(5); 
        // echo $this->productoModel->getInsertID() ;
    }
 


    public function cat($categoria, $id)
    {
        return "<h2>Categoría: $categoria <br> Producto: $id</h2>";
    }
}



