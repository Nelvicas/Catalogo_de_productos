<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table            = 'productos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [ 'nombre',
                                    'precio',
                                    'marca',
                                    'stock'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getProductos(){
        return $this->findAll();
    }


     // funcion para obtener id producto
    public function obtenerProductoPorId($id){
            return $this->find($id);
    }


    public function crearProducto($producto){
        return $this->insert($producto);
    }

    public function actualizarProducto($id, $productoActualizado){
        return $this->update($id, $productoActualizado);
    }

}


/*  para arreglos 
namespace App\Models;

class ProductoModel
{
    public function getProductos()
    {
       return  [ // uso de multiarreglos 
     [  
        "id" => 1,
        "nombre" => "Laptop Lenovo",
        "precio" => 5000,
        "marca"  => "Lenovo",
        "stock"  => 3,
        ],

     [
        "id" => 2,
        "nombre" => "Laptop Hp",
        "precio" => 15000,
        "marca"  => "HP",
        "stock"  => 1,
        ], 

        [
        "id" => 3,
        "nombre" => "Impresora",
        "precio" => 19000,
        "marca"  => "HP",
        "stock"  => 0,
        ], 

        [
        "id" => 4,
        "nombre" => "Teclado",
        "precio" => 300,
        "marca" => "Logitech",
        "stock" => 5
    ]


     ];
    }

     // funcion para obtener id producto
    public function obtenerProductoPorId($id){
        $productos = $this->getProductos();

        foreach ($productos as $producto){
            if($producto['id']== $id){
            return $producto;
          }
        }
     return null;
    }


    public function crearProducto(){
        
    }
}

*/