<?php
session_start();

$cesta = $_SESSION['cesta'] ?? [];
$catalogo = $_SESSION['catalogo'] ?? [];

// Eliminar 1 unidad de producto
if (isset($_POST['eliminar'])) {
    $prod = $_POST['producto'];
    if (isset($cesta[$prod])) {
        $cesta[$prod]--;
        if ($cesta[$prod] <= 0) {
            unset($cesta[$prod]);
        }
    }
    $_SESSION['cesta'] = $cesta;
    setcookie('cesta_tienda', json_encode($cesta), time() + (30 * 24 * 3600));
    header("Location: cesta.php");
    exit();
}

// Vaciar cesta completa
if (isset($_POST['vaciar'])) {
    $_SESSION['cesta'] = [];
    setcookie('cesta_tienda', '', time() - 3600);
    header("Location: cesta.php");
    exit();
}

// Calcular totales
$total_unidades = array_sum($cesta);
$total_precio = 0;
foreach ($cesta as $prod => $cantidad) {
    if (isset($catalogo[$prod])) {
        $total_precio += $catalogo[$prod]['precio'] * $cantidad;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cesta de la Compra</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .title { background: #d9534f; color: white; text-align: center; padding: 10px; width: 600px; font-weight: bold; }
        table { border-collapse: collapse; width: 620px; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        img { width: 70px; }
        .btn-back { display: inline-block; margin-top: 15px; padding: 8px 15px; background: #eee; border: 1px solid #ccc; text-decoration: none; color: black; }
    </style>
</head>
<body>
    <div class="title">PRODUCTOS EN TU CESTA</div>

    <table>
        <?php foreach ($cesta as $prod => $cantidad): ?>
        <?php if (isset($catalogo[$prod])): ?>
        <tr>
            <td><?= ucfirst($prod) ?></td>
            <td><?= $cantidad ?></td>
            <td>
                <img src="img/<?= $prod ?>.png" alt="<?= $prod ?>"><br>
                <?= $prod ?><br>
                <?= $catalogo[$prod]['precio'] ?> euros
            </td>
            <td>
                <form method="post">
                    <input type="hidden" name="producto" value="<?= $prod ?>">
                    <input type="submit" name="eliminar" value="Eliminar">
                </form>
            </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>

        <tr>
            <td><strong>Total</strong></td>
            <td><strong><?= $total_unidades ?></strong></td>
            <td><strong><?= $total_precio ?> €</strong></td>
            <td>
                <form method="post">
                    <input type="submit" name="vaciar" value="VACIAR CESTA">
                </form>
            </td>
        </tr>
    </table>

    <a href="tienda.php" class="btn-back">Volver a la tienda</a>
</body>
</html>