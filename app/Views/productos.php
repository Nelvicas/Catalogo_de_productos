<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Catálogo de Productos</h1>
    <p>"Esta es mi primera vista en CodeIgniter."</p>

    <p>Total Productos: <?= $totalProductos ?></p>

   <?php foreach ($productos as $producto): ?>
        <p>id: <?= $producto["id"]; ?> </p>
        <p>Nombre: <?= $producto["nombre"]; ?> </p>
        <p>Precio: <?= $producto["precio"]; ?></p>
        <p>Marca: <?= $producto["marca"]; ?> </p>
        <p>Stock: <?= $producto["stock"]; ?> </p>

        <?php if ($producto["stock"] > 0): ?>
            <p>Disponible</p>
        <?php else: ?>
            <p>Agotado</p>
        <?php endif; ?>
   <?php endforeach; ?>

   
</body>
</html>