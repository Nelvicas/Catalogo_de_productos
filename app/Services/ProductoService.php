<?php


namespace App\Services;

class ProductoService{


    public function calcularEstadisticas($productos){
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

?>