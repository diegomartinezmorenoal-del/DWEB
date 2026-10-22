<?php
session_start();

$prod_name = $_GET['prod'] ?? '';
$catalogo = $_SESSION['catalogo'] ?? [];

if (!isset($catalogo[$prod_name])) {
    header("Location: tienda.php");
    exit();
}

$producto = $catalogo[$prod_name];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle - <?= ucfirst($prod_name) ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .card { border: 1px solid #ccc; width: 400px; padding: 20px; text-align: center; border-radius: 8px; }
        img { width: 200px; height: auto; }
        .price { font-size: 20px; color: #2e7d32; font-weight: bold; margin: 15px 0; }
        .back-btn { margin-top: 15px; display: inline-block; padding: 8px 15px; background: #2196F3; color: white; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="card">
        <h2><?= ucfirst($prod_name) ?></h2>
        <img src="img/<?= $prod_name ?>.png" alt="<?= $prod_name ?>">
        <div class="price"><?= $producto['precio'] ?> €</div>
        <p><?= htmlspecialchars($producto['detalle']) ?></p>
        <a href="tienda.php" class="back-btn">Volver a la tienda</a>
    </div>
</body>
</html>