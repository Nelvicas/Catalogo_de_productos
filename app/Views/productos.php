<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1><?= $nombreCatalogo; ?></h1>
    <p>"Esta es mi primera vista en CodeIgniter."</p>

    <?php if($sinProductos == true):?>
        <p><h1><?= $mensaje; ?></h1></p>
     <?php else: ?>

            <p>Total Productos: <?= $estadisticas['totalProductos'] ?></p>
            <p>Productos Disponibles: <?= $estadisticas['productosDisponibles'] ?></p>
            <p>Productos Agotados: <?= $estadisticas['productosAgotados'] ?></p>

        <?php foreach ($productos as $producto): ?> <!-- traer datos de multiarreglo a la vista  -->
                <p>id: <?= $producto["id"]; ?> </p>
                <p>Nombre: <?= $producto["nombre"]; ?> </p>
                <p>Precio: <?= $producto["precioFormateado"]; ?></p>
                <p>Marca: <?= $producto["marca"]; ?> </p>
                <p>Stock: <?= $producto["stock"]; ?> </p>

                <?php if ($producto["stock"] > 0): ?>    <!-- uso de if para ver si esta disponible o agotado solo en vista -->
                    <p>Disponible</p>
                <?php else: ?>
                    <p>Agotado</p>
                <?php endif; ?>

        <?php endforeach; ?>
    

   
        <p>Valor total del inventario: <?= $estadisticas['totalInvertido'] ?></p>

        
        <p>Producto mas caro: </p> <!-- visualizar producto mas caro  -->
        <p>Nombre: <?= $estadisticas['masCaro']['nombre'] ?></p> <!--   <p>Nombre: <= $masCaro['nombre'] ?> </p> -->
        <p>Precio: <?= $estadisticas['masCaro']['precio'] ?></p>
    <?php endif; ?>
   
</body>
</html>