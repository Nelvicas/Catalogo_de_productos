<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProductoModel;
use App\Services\ProductoService;


class Productos extends BaseController
{

    // propiedad model para ser accesible para cualquier metodos

    private $model;
    private $productoService;
    private $nombreCatalogo;
    private $moneda;

    // constructor

    public function __construct() {
        $this->model = new ProductoModel();
        $this->productoService = new ProductoService();
        $this->nombreCatalogo = "Catalogo de Productos";
        $this->moneda = "MXN";
    }


    public function index()
    {

        //return view('productos');
        //$productos = $this->obtenerProductos();
        $productos = $this->model->getProductos();        
        //$cantidad = count($productos);       // creando variable para almacenar la cantidad
         // si productos esta vacio
        $estadisticas = [];
        $mensaje = "";
        if(empty($productos)){
            $sinProductos = true; 
            $mensaje = "No hay productos disponibles";
        }else{
            $sinProductos = false;
            $estadisticas = $this->productoService->calcularEstadisticas($productos);
            $productos = $this->prepararProductosVista($productos);
        }


        return view('productos/index',['productos' => $productos,'estadisticas' => $estadisticas, 'sinProductos' => $sinProductos, 
        'mensaje' => $mensaje, 'nombreCatalogo' => $this->nombreCatalogo]);
        
        /*
        return view('productos', ['productos' => $productos, 'totalProductos' => $totalProductos, 
        'productosDisponibles' => $productosDisponibles, 'productosAgotados' => $productosAgotados, 
        'totalInvertido' => $totalInvertido, 'masCaro' => $masCaro]);
        */

    }

    /*
    private function obtenerProductos(){

        
        return $this ->model->getProductos();
        // $model = new ProductoModel();                      // creas tu instancia 
        //return $productos = $model->getProductos();       // pides datos con get y los almacenas en productos
    }
        */



    // formaterar modenda  (agregar MXN )
    private function formatearMoneda($precio){
        return $precio. " ".$this->moneda;
    }



    private function prepararProductosVista($productos){
        $productosPreparados = [];
        foreach ($productos as $producto){
            $copiaProducto = $producto;
            $copiaProducto['precioFormateado'] = $this->formatearMoneda($copiaProducto['precio']);
            $productosPreparados[] = $copiaProducto;
        }
        return $productosPreparados;

    }


    // detalles del producto

    public function detalleProducto($id){
        $productoEncontrado = $this->model->obtenerProductoPorId($id);
        //var_dump($productoEncontrado); prueba
        //exit;
        if($productoEncontrado != null){
            return view('productos/detalles', ['producto' => $productoEncontrado]);
        }else{
            echo "producto no encontrado";
        }
    }

    public function agregarProducto()
    {
        return view('productos/agregarProducto');
    }


    public function guardarProducto(){
       
        $nombre = $this->request->getPost('nombre');
        $precio = $this->request->getPost('precio');
        $marca = $this->request->getPost('marca');
        $stock = $this->request->getPost('stock');

        if((empty($nombre) || empty($precio) || empty($marca) || empty($stock))){
            return;
        }

        $productoCreado = [
            'nombre' => $nombre,
            'precio' => $precio,
            'marca' => $marca,
            'stock' => $stock
        ];

        $resultado = $this->model->crearProducto($productoCreado);

        if ($resultado) {

            return redirect()->to('/productos');

        } else {

            echo(" error");

        }
            }



        public function editarProducto($id){
            $productoExistente = $this -> model->obtenerProductoPorId($id);

            if($productoExistente){

            }else{

            }
        }

    /*
    public function pruebaConexion()
    {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT * FROM productos");

        $resultado = $query->getResultArray();

        echo "<pre>";
        print_r($resultado);
        echo "</pre>";
    }*/
 
}
