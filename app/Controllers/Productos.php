<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProductoModel;

class Productos extends BaseController
{
    public function index()
    {

        //return view('productos');
        $productos = $this->obtenerProductos();
        
        //$cantidad = count($productos);       // creando variable para almacenar la cantidad
         // si productos esta vacio
        $estadisticas = [];
        $mensaje = "";
        if(empty($productos)){
            $sinProductos = true; 
            $mensaje = "No hay productos disponibles";
        }else{
            $sinProductos = false;
            $estadisticas = $this->calcularEstadisticas($productos);
    
        }

        return view('productos',['productos' => $productos,'estadisticas' => $estadisticas, 'sinProductos' => $sinProductos, 'mensaje' => $mensaje]);
        /*
        return view('productos', ['productos' => $productos, 'totalProductos' => $totalProductos, 
        'productosDisponibles' => $productosDisponibles, 'productosAgotados' => $productosAgotados, 
        'totalInvertido' => $totalInvertido, 'masCaro' => $masCaro]);
        */

    }


    private function obtenerProductos(){

        $model = new ProductoModel();                      // creas tu instancia 
        return $productos = $model->getProductos();       // pides datos con get y los almacenas en productos
    }
    

    private function calcularEstadisticas($productos){
        $totalProductos = 0;
        $productosDisponibles = 0;
        $productosAgotados = 0;
        $totalInvertido = 0;

         // mas caro 
        $masCaro = $this->obtenerProductoMasCaro($productos);
        
        foreach ($productos as $producto){
            $totalProductos++;
            $totalInvertido += ($producto['stock'] * $producto['precio']);

            if($producto['stock'] > 0){
                $productosDisponibles++;
            }elseif($producto['stock'] == 0){
                $productosAgotados++;
            }
        } 


        $estadisticas = [ 
                          "totalProductos" => $totalProductos, 
                          "productosDisponibles" => $productosDisponibles, 
                          "productosAgotados" => $productosAgotados, 
                          "totalInvertido" => $totalInvertido, 
                          "masCaro" => $masCaro 
                        ];

                return $estadisticas;
    }

    private function obtenerProductoMasCaro($productos){
        $masCaro = $productos[0];             // variable mas Caro
        foreach ($productos as $producto){
            
            if($producto['precio'] > $masCaro['precio']){
                     $masCaro = $producto;
                }
        }

        return $masCaro;
    }



 
}
