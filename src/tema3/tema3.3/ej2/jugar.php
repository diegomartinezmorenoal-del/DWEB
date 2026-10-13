<?php
// Combinación ganadora (6 números distintos entre 1 y 49) sin bucles ni arrays:
// si un número se repite, se desplaza +1 (tantas veces como números previos haya)
$g1 = rand(1, 49);
$g2 = rand(1, 49);
if ($g2 == $g1) $g2 = $g2 % 49 + 1;
$g3 = rand(1, 49);
if ($g3 == $g1 || $g3 == $g2) $g3 = $g3 % 49 + 1;
if ($g3 == $g1 || $g3 == $g2) $g3 = $g3 % 49 + 1;
$g4 = rand(1, 49);
if ($g4 == $g1 || $g4 == $g2 || $g4 == $g3) $g4 = $g4 % 49 + 1;
if ($g4 == $g1 || $g4 == $g2 || $g4 == $g3) $g4 = $g4 % 49 + 1;
if ($g4 == $g1 || $g4 == $g2 || $g4 == $g3) $g4 = $g4 % 49 + 1;
$g5 = rand(1, 49);
if ($g5 == $g1 || $g5 == $g2 || $g5 == $g3 || $g5 == $g4) $g5 = $g5 % 49 + 1;
if ($g5 == $g1 || $g5 == $g2 || $g5 == $g3 || $g5 == $g4) $g5 = $g5 % 49 + 1;
if ($g5 == $g1 || $g5 == $g2 || $g5 == $g3 || $g5 == $g4) $g5 = $g5 % 49 + 1;
if ($g5 == $g1 || $g5 == $g2 || $g5 == $g3 || $g5 == $g4) $g5 = $g5 % 49 + 1;
$g6 = rand(1, 49);
if ($g6 == $g1 || $g6 == $g2 || $g6 == $g3 || $g6 == $g4 || $g6 == $g5) $g6 = $g6 % 49 + 1;
if ($g6 == $g1 || $g6 == $g2 || $g6 == $g3 || $g6 == $g4 || $g6 == $g5) $g6 = $g6 % 49 + 1;
if ($g6 == $g1 || $g6 == $g2 || $g6 == $g3 || $g6 == $g4 || $g6 == $g5) $g6 = $g6 % 49 + 1;
if ($g6 == $g1 || $g6 == $g2 || $g6 == $g3 || $g6 == $g4 || $g6 == $g5) $g6 = $g6 % 49 + 1;
if ($g6 == $g1 || $g6 == $g2 || $g6 == $g3 || $g6 == $g4 || $g6 == $g5) $g6 = $g6 % 49 + 1;
$serie = str_pad(rand(0, 999), 3, "0", STR_PAD_LEFT);

// Un acierto por cada número ganador marcado en el boleto
$aciertos = (isset($_POST["n$g1"]) ? 1 : 0) +
    (isset($_POST["n$g2"]) ? 1 : 0) +
    (isset($_POST["n$g3"]) ? 1 : 0) +
    (isset($_POST["n$g4"]) ? 1 : 0) +
    (isset($_POST["n$g5"]) ? 1 : 0) +
    (isset($_POST["n$g6"]) ? 1 : 0);

$dinero = 0;
$mensaje = "Ningún premio por aciertos";
if ($aciertos == 4) {
    $mensaje = "Dinero devuelto";
} elseif ($aciertos == 5) {
    $dinero = 30;
    $mensaje = "30 euros";
} elseif ($aciertos == 6) {
    $dinero = 100;
    $mensaje = "100 euros";
}

$serieUsuario = isset($_POST["serie"]) ? trim($_POST["serie"]) : "";
$aciertoSerie = ($serieUsuario === $serie);
if ($aciertoSerie) {
    $dinero = $dinero + 500;
}
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Resultado Primitiva</title>
<link rel="stylesheet" href="../estilos.css"></head>
<body>
<h1>Resultado</h1>
<h3>Combinación ganadora</h3>
<table class="datos">
  <tr><td><?php echo $g1; ?></td><td><?php echo $g2; ?></td><td><?php echo $g3; ?></td><td><?php echo $g4; ?></td><td><?php echo $g5; ?></td><td><?php echo $g6; ?></td></tr>
</table>
<p>Número de serie ganador: <strong><?php echo $serie; ?></strong>
   (el tuyo: <?php echo htmlspecialchars($serieUsuario); ?>)
   <?php echo $aciertoSerie ? "→ ¡Serie acertada! +500 €" : "→ serie no acertada"; ?></p>
<p>Aciertos: <strong><?php echo $aciertos; ?></strong> → <?php echo $mensaje; ?></p>
<p>Dinero ganado: <strong><?php echo $dinero; ?> euros</strong></p>
<a class="boton" href="index.php">Jugar otra vez</a>
</body></html>
