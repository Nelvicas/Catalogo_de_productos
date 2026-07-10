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
       

        $model = new ProductoModel();          // creas tu instancia 
        $productos = $model->getProductos();  // pides datos con get y los almacenas en productos
        //$cantidad = count($productos);       // creando variable para almacenar la cantidad

        $estadisticas = $this->calcularEstadisticas($productos);


        return view('productos',['productos' => $productos,'estadisticas' => $estadisticas]);
        
        /*
        return view('productos', ['productos' => $productos, 'totalProductos' => $totalProductos, 
        'productosDisponibles' => $productosDisponibles, 'productosAgotados' => $productosAgotados, 
        'totalInvertido' => $totalInvertido, 'masCaro' => $masCaro]);
        */

    }

    public function calcularEstadisticas($productos){
        $totalProductos = 0;
        $productosDisponibles = 0;
        $productosAgotados = 0;
        $totalInvertido = 0;

        $masCaro = $productos[0];             // variable mas Caro
        foreach ($productos as $producto){
            $totalProductos++;
            $totalInvertido += ($producto['stock'] * $producto['precio']);

            if($producto['stock'] > 0){
                $productosDisponibles++;
            }elseif($producto['stock'] == 0){
                $productosAgotados++;
            }

            // mas caro 
            if($producto['precio'] > $masCaro['precio']){
                 $masCaro = $producto;
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



 
}
