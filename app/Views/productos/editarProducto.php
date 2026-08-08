
<?php



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Productos</title>
</head>
<body>
    
    <form action="/productos/actualizarProducto" method="POST">

        
        <input type="hidden" id="id" value="<?php  echo $producto['id']; ?>" name="id">           
         <br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" value="<?php  echo $producto['nombre']; ?>" name="nombre" required>           
         <br>
        <label for="precio">Precio:</label>
        <input type="text" id="precio" value="<?php echo $producto['precio']; ?> " name="precio" required>
        <br>
        <label for="marca">Marca:</label>
        <input type="text" id="marca" value="<?php echo $producto['marca']; ?> " name="marca" required>
        <br>
        <label for="stock">Stock:</label>
        <input type="text" id="stock" value="<?php echo $producto['stock']; ?>" name="stock" required>
        
        <br>
        <br>
        <button type="submit">Guardar Producto</button>
    </form>
</body>
</html>