
<?php



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
</head>
<body>
    
    <form action="/productos/guardarProducto" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" required>
        <br>
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required>
        <br>
        <label for="stock">Stock:</label>
        <input type="text" id="stock" name="stock" required>
        
        <br>
        <br>
        <button type="submit">Guardar Producto</button>
    </form>
</body>
</html>