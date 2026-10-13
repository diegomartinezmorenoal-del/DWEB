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
    <tr>
      <td><?php if ($ver == 1) { ?><div class="pieza" style="background-position: 0px 0px"></div><?php } else { ?><a href="index.php?ver=1"><div class="tapada">?</div></a><?php } ?></td>
      <td><?php if ($ver == 2) { ?><div class="pieza" style="background-position: -100px 0px"></div><?php } else { ?><a href="index.php?ver=2"><div class="tapada">?</div></a><?php } ?></td>
      <td><?php if ($ver == 3) { ?><div class="pieza" style="background-position: -200px 0px"></div><?php } else { ?><a href="index.php?ver=3"><div class="tapada">?</div></a><?php } ?></td>
    </tr>
    <tr>
      <td><?php if ($ver == 4) { ?><div class="pieza" style="background-position: 0px -100px"></div><?php } else { ?><a href="index.php?ver=4"><div class="tapada">?</div></a><?php } ?></td>
      <td><?php if ($ver == 5) { ?><div class="pieza" style="background-position: -100px -100px"></div><?php } else { ?><a href="index.php?ver=5"><div class="tapada">?</div></a><?php } ?></td>
      <td><?php if ($ver == 6) { ?><div class="pieza" style="background-position: -200px -100px"></div><?php } else { ?><a href="index.php?ver=6"><div class="tapada">?</div></a><?php } ?></td>
    </tr>
    <tr>
      <td><?php if ($ver == 7) { ?><div class="pieza" style="background-position: 0px -200px"></div><?php } else { ?><a href="index.php?ver=7"><div class="tapada">?</div></a><?php } ?></td>
      <td><?php if ($ver == 8) { ?><div class="pieza" style="background-position: -100px -200px"></div><?php } else { ?><a href="index.php?ver=8"><div class="tapada">?</div></a><?php } ?></td>
      <td><?php if ($ver == 9) { ?><div class="pieza" style="background-position: -200px -200px"></div><?php } else { ?><a href="index.php?ver=9"><div class="tapada">?</div></a><?php } ?></td>
    </tr>
</table>
<form action="comprobar.php" method="post">
  <input type="text" name="respuesta" placeholder="¿Qué es?" autofocus>
  <input type="submit" value="Comprobar">
</form>
</body></html>
