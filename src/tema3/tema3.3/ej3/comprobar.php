<?php
require "../config.php";
$intentos = isset($_POST["intentos"]) ? (int)$_POST["intentos"] : 0;
$texto = isset($_POST["respuesta"]) ? $_POST["respuesta"] : "";
$acierto = normaliza($texto) == normaliza($respuesta);
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Resultado</title>
<link rel="stylesheet" href="../estilos.css"></head>
<body>
<?php if ($acierto) { ?>
  <h1 class="ok">¡Enhorabuena, has acertado!</h1>
  <img class="completa" src="../img/imagen.svg" alt="Imagen completa">
  <p>¡Lo has conseguido en <strong><?php echo $intentos; ?></strong> intentos!</p>
<?php } else { ?>
  <h1 class="ko">Has fallado</h1>
  <p>Llevas <strong><?php echo $intentos; ?></strong> intentos.</p>
  <a class="boton" href="index.php?intentos=<?php echo $intentos; ?>">Volver</a>
<?php } ?>
</body></html>
