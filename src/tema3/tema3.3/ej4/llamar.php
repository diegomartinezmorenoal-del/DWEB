<?php
$bloque = isset($_GET["bloque"]) ? (int)$_GET["bloque"] : 0;
$piso = isset($_GET["piso"]) ? (int)$_GET["piso"] : 0;
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Llamada</title>
<link rel="stylesheet" href="../estilos.css"></head>
<body>
<h1>Usted ha llamado al piso <?php echo $piso; ?> del bloque <?php echo $bloque; ?></h1>
<a class="boton" href="index.php">Volver</a>
</body></html>
