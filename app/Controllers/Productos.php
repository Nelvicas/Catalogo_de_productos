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


        return view('productos',['productos' => $productos,'estadisticas' => $estadisticas, 'sinProductos' => $sinProductos, 
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

 
}
