<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Precio medio</title>
<link rel="stylesheet" href="../estilos.css">
</head>
<body>
<div class="tarjeta">
<?php
$producto = trim($_POST['producto'] ?? '');
$precios  = [
    'Tienda 1' => $_POST['t1'] ?? '',
    'Tienda 2' => $_POST['t2'] ?? '',
    'Tienda 3' => $_POST['t3'] ?? '',
];

$valido = $producto !== '';
foreach ($precios as $p) {
    if (!is_numeric($p) || $p < 0) { $valido = false; }
}

if (!$valido) {
    echo '<p class="error">Indica el producto y un precio válido (0 o mayor) en las tres tiendas.</p>';
} else {
    $precios = array_map('floatval', $precios);
    $media   = array_sum($precios) / count($precios);
    $fmt     = fn($n) => number_format($n, 2, ',', '.') . ' €';
?>
  <table>
    <caption style="caption-side:top;font-size:1.3rem;font-weight:bold;color:#2f6b4f;padding-bottom:.5rem">
      Precio de «<?= htmlspecialchars($producto) ?>»
    </caption>
    <tr><th>Establecimiento</th><th>Precio</th><th>Diferencia con la media</th></tr>
    <?php foreach ($precios as $tienda => $precio):
        $dif = $precio - $media; ?>
      <tr>
        <td><?= $tienda ?></td>
        <td><?= $fmt($precio) ?></td>
        <td><?= ($dif > 0 ? '+' : '') . $fmt($dif) ?></td>
      </tr>
    <?php endforeach; ?>
    <tr>
      <th colspan="2">Precio medio de las tres tiendas</th>
      <th><?= $fmt($media) ?></th>
    </tr>
  </table>
<?php } ?>
  <a class="boton" href="index.php">Nueva consulta</a>
</div>
</body>
</html>
