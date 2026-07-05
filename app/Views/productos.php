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

   <?php foreach ($productos as $nombre => $precio): ?>
        <p><?= $nombre ?> - <?= $precio ?></p>
   <?php endforeach; ?>
    
</body>
</html>