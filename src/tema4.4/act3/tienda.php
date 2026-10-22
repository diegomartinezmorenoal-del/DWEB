<?php
session_start();

if (!isset($_SESSION['catalogo'])) {
    $_SESSION['catalogo'] = [
        'raton' => ['precio' => 6, 'detalle' => 'Ratón óptico ergonómico de alta precisión.'],
        'teclado' => ['precio' => 11, 'detalle' => 'Teclado mecánico USB con iluminación RGB.'],
        'monitor' => ['precio' => 80, 'detalle' => 'Monitor Full HD de 24 pulgadas LED.'],
        'joystick' => ['precio' => 33, 'detalle' => 'Mando inalámbrico compatible con PC y consola.']
    ];
}

if (!isset($_SESSION['cesta']) && isset($_COOKIE['cesta_tienda'])) {
    $_SESSION['cesta'] = json_decode($_COOKIE['cesta_tienda'], true) ?? [];
}

if (!isset($_SESSION['cesta'])) {
    $_SESSION['cesta'] = [];
}

if (isset($_POST['comprar'])) {
    $prod = $_POST['producto'];
    if (isset($_SESSION['cesta'][$prod])) {
        $_SESSION['cesta'][$prod]++;
    } else {
        $_SESSION['cesta'][$prod] = 1;
    }
    setcookie('cesta_tienda', json_encode($_SESSION['cesta']), time() + (30 * 24 * 3600));
    header("Location: tienda.php");
    exit();
}

$total_unidades = array_sum($_SESSION['cesta']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>La tiendecita</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; width: 600px; background: #6c7a89; color: white; padding: 10px 20px; }
        .header a { color: #ffeb3b; font-weight: bold; text-decoration: none; }
        table { border-collapse: collapse; width: 640px; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background: #86939e; color: white; }
        img { width: 80px; height: auto; cursor: pointer; }
        .back-btn { margin-top: 20px; display: inline-block; color: #333; }
    </style>
</head>
<body>
    <div class="header">
        <h2>La tiendecita</h2>
        <div>
            <a href="cesta.php">CESTA<br><?= $total_unidades ?> Prod</a>
        </div>
    </div>

    <table>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acción</th>
        </tr>
        <?php foreach ($_SESSION['catalogo'] as $nombre => $datos): ?>
        <tr>
            <td><?= ucfirst($nombre) ?></td>
            <td><?= $datos['precio'] ?> €</td>
            <td>
                <a href="detalle.php?prod=<?= $nombre ?>">
                    <img src="img/<?= $nombre ?>.png" alt="<?= $nombre ?>" title="Ver detalle">
                </a>
            </td>
            <td>
                <form method="post">
                    <input type="hidden" name="producto" value="<?= $nombre ?>">
                    <input type="submit" name="comprar" value="Comprar">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="../../../index.php" class="back-btn">← Volver al menú principal</a>
</body>
</html>