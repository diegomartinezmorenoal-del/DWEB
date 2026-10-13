<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Resultado de la primitiva</title>
<link rel="stylesheet" href="../estilos.css">
</head>
<body>
<div class="tarjeta">
  <h1>Resultado del sorteo</h1>
<?php
$usuario = array_map('intval', $_POST['n'] ?? []);
$serie   = intval($_POST['serie'] ?? 0);

$valido = count($usuario) === 6
    && count(array_unique($usuario)) === 6
    && min($usuario) >= 1 && max($usuario) <= 49
    && $serie >= 1 && $serie <= 999;

if (!$valido) {
    echo '<p class="error">Los 6 números deben ser distintos y estar entre 1 y 49, y la serie entre 1 y 999.</p>';
} else {
    // Combinación generada: 6 números distintos entre 1 y 49 + serie
    $numeros = range(1, 49);
    shuffle($numeros);
    $generada      = array_slice($numeros, 0, 6);
    $serieGenerada = rand(1, 999);
    sort($generada);
    sort($usuario);
    $aciertos = count(array_intersect($generada, $usuario));
?>
  <table>
    <tr><th></th><th colspan="6">Números</th><th>Serie</th></tr>
    <tr>
      <th>Combinación generada</th>
      <?php foreach ($generada as $n): ?><td><?= $n ?></td><?php endforeach; ?>
      <td><?= $serieGenerada ?></td>
    </tr>
    <tr>
      <th>Tu combinación</th>
      <?php foreach ($usuario as $n): ?>
        <td class="<?= in_array($n, $generada) ? 'acierto' : '' ?>"><?= $n ?></td>
      <?php endforeach; ?>
      <td class="<?= $serie === $serieGenerada ? 'acierto' : '' ?>"><?= $serie ?></td>
    </tr>
  </table>
  <p class="resultado">Aciertos: <strong><?= $aciertos ?></strong> de 6
     <?= $serie === $serieGenerada ? ' · ¡Y la serie coincide!' : '' ?></p>
<?php } ?>
  <a class="boton" href="index.php">Jugar otra vez</a>
</div>
</body>
</html>
