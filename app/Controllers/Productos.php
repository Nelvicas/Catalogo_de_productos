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
        return view('productos', ['productos' => $productos]);
    }
}
