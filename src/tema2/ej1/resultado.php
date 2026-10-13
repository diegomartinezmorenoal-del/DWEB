<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Volumen de un cilindro</title>
<link rel="stylesheet" href="../estilos.css">
</head>
<body>
<div class="tarjeta">
  <h1>Cálculo del volúmen de un cilindro</h1>
<?php
$altura   = $_POST['altura']   ?? '';
$diametro = $_POST['diametro'] ?? '';

if (!is_numeric($altura) || !is_numeric($diametro) || $altura <= 0 || $diametro <= 0) {
    echo '<p class="error">Introduce una altura y un diámetro mayores que 0.</p>';
} else {
    $radio   = $diametro / 2;
    $volumen = M_PI * $radio ** 2 * $altura;
?>
  <!-- Imagen de un cilindro (SVG) -->
  <svg viewBox="0 0 200 180" width="200" height="180" role="img" aria-label="Cilindro" style="display:block;margin:0 auto 1rem">
    <path d="M40 40 V130 A60 20 0 0 0 160 130 V40 Z" fill="#8cc5a8" stroke="#2f6b4f" stroke-width="3"/>
    <ellipse cx="100" cy="40" rx="60" ry="20" fill="#d9ece3" stroke="#2f6b4f" stroke-width="3"/>
    <line x1="100" y1="40" x2="160" y2="40" stroke="#2f6b4f" stroke-dasharray="4"/>
    <text x="118" y="35" font-size="12" fill="#1f2d2a">r</text>
    <text x="168" y="95" font-size="12" fill="#1f2d2a">h</text>
  </svg>
  <p>Altura: <?= htmlspecialchars($altura) ?> cm &nbsp;|&nbsp; Diámetro: <?= htmlspecialchars($diametro) ?> cm</p>
  <p class="resultado">Volumen = π · r² · h = <strong><?= number_format($volumen, 2, ',', '.') ?> cm³</strong></p>
<?php } ?>
  <a class="boton" href="index.php">Nuevo cálculo</a>
</div>
</body>
</html>
