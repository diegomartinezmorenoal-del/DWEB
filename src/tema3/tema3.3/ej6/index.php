<?php
$ver = isset($_GET["ver"]) ? (int)$_GET["ver"] : 0;
if ($ver > 0) {
    // a los 2 segundos se recarga la página con todo oculto
    header("Refresh: 2; url=index.php");
}
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Adivina la imagen</title>
<link rel="stylesheet" href="../estilos.css"></head>
<body>
<h1>Adivina la imagen</h1>
<table class="mosaico">
<?php for ($f = 0; $f < 3; $f++) { ?>
  <tr>
<?php for ($c = 0; $c < 3; $c++) {
    $n = $f * 3 + $c + 1; ?>
    <td>
<?php if ($ver == $n) { ?>
      <div class="pieza" style="background-position: <?php echo -$c * 100; ?>px <?php echo -$f * 100; ?>px"></div>
<?php } else { ?>
      <a href="index.php?ver=<?php echo $n; ?>"><div class="tapada">?</div></a>
<?php } ?>
    </td>
<?php } ?>
  </tr>
<?php } ?>
</table>
<form action="comprobar.php" method="post">
  <input type="text" name="respuesta" placeholder="¿Qué es?" autofocus>
  <input type="submit" value="Comprobar">
</form>
</body></html>
