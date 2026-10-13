<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tiempo de llenado</title>
<link rel="stylesheet" href="../estilos.css">
</head>
<body>
<div class="tarjeta">
  <h1>Tiempo de llenado del depósito</h1>
<?php
$diametro = $_POST['diametro'] ?? '';
$altura   = $_POST['altura']   ?? '';
$caudal   = $_POST['caudal']   ?? '';

if (!is_numeric($diametro) || !is_numeric($altura) || !is_numeric($caudal)
    || $diametro <= 0 || $altura <= 0 || $caudal <= 0) {
    echo '<p class="error">Diámetro, altura y caudal deben ser números mayores que 0.</p>';
} else {
    $radio    = $diametro / 2;                          // cm
    $litros   = M_PI * $radio ** 2 * $altura / 1000;    // 1 litro = 1000 cm³
    $minTotal = (int) round($litros / $caudal);         // minutos redondeados
    $horas    = intdiv($minTotal, 60);
    $minutos  = $minTotal % 60;
?>
  <p>Capacidad del depósito: <strong><?= number_format($litros, 2, ',', '.') ?> litros</strong></p>
  <p>Caudal disponible: <?= htmlspecialchars($caudal) ?> l/min</p>
  <p class="resultado">Tiempo de llenado: <strong><?= $horas ?> h <?= $minutos ?> min</strong></p>
<?php } ?>
  <a class="boton" href="index.php">Nuevo cálculo</a>
</div>
</body>
</html>
