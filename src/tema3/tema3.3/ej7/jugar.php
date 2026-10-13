<?php
$elegidos = isset($_POST["numeros"]) ? array_map("intval", $_POST["numeros"]) : [];
$trampas = count($elegidos) > 6;

// Combinación ganadora: 6 números distintos entre 1 y 49
$todos = range(1, 49);
shuffle($todos);
$ganadora = array_slice($todos, 0, 6);
sort($ganadora);
$serie = str_pad(rand(0, 999), 3, "0", STR_PAD_LEFT);

$aciertos = count(array_intersect($elegidos, $ganadora));
$dinero = 0;
if ($aciertos == 5) {
    $dinero = 30;
} elseif ($aciertos == 6) {
    $dinero = 100;
}
$serieUsuario = isset($_POST["serie"]) ? trim($_POST["serie"]) : "";
$aciertoSerie = ($serieUsuario === $serie);
if ($aciertoSerie) {
    $dinero += 500;
}
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Resultado Primitiva</title>
<link rel="stylesheet" href="../estilos.css"></head>
<body>
<h1>Resultado</h1>
<table class="resultado">
<?php for ($f = 0; $f < 7; $f++) { ?>
  <tr>
<?php for ($c = 1; $c <= 7; $c++) {
    $n = $f * 7 + $c;
    $esElegido = in_array($n, $elegidos);
    $esGanador = in_array($n, $ganadora);
    if ($esElegido && $esGanador) {
        $clase = "verde";      // acierto
    } elseif ($esElegido) {
        $clase = "negro";      // elegido, no acertado
    } elseif ($esGanador) {
        $clase = "rojo";       // ganador no elegido
    } else {
        $clase = "gris";       // resto
    } ?>
    <td class="<?php echo $clase; ?>"><?php echo $n; ?></td>
<?php } ?>
  </tr>
<?php } ?>
</table>
<p><span class="verde">■ acierto</span> &nbsp; <span class="negro">■ elegido (fallo)</span> &nbsp;
   <span class="rojo">■ ganador no elegido</span> &nbsp; <span class="gris">■ resto</span></p>

<?php if ($trampas) { ?>
  <h2 class="ko">¡Has hecho trampas! Has marcado <?php echo count($elegidos); ?> números (máximo 6).</h2>
<?php } else { ?>
  <p>Número de serie ganador: <strong><?php echo $serie; ?></strong>
     (el tuyo: <?php echo htmlspecialchars($serieUsuario); ?>)
     <?php echo $aciertoSerie ? "→ ¡Serie acertada! +500 €" : "→ serie no acertada"; ?></p>
  <p>Aciertos: <strong><?php echo $aciertos; ?></strong>
     <?php echo ($aciertos == 4) ? "→ dinero devuelto" : ""; ?></p>
  <p>Dinero ganado: <strong><?php echo $dinero; ?> euros</strong></p>
<?php } ?>
<a class="boton" href="index.php">Jugar otra vez</a>
</body></html>
