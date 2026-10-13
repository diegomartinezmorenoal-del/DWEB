<?php
// Ojo pulsado, con formato "fila-columna" (vacío en la primera carga)
$abierto = isset($_GET["ojo"]) ? $_GET["ojo"] : "";
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Ojos</title>
<link rel="stylesheet" href="../estilos.css"></head>
<body>
<h1>Ojos</h1>
<table class="ojos">
<?php for ($f = 1; $f <= 10; $f++) { ?>
  <tr>
<?php for ($c = 1; $c <= 10; $c++) {
    $id = $f . "-" . $c;
    $img = ($abierto == $id) ? "ojo_abierto.svg" : "ojo_cerrado.svg"; ?>
    <td><a href="index.php?ojo=<?php echo $id; ?>"><img src="../img/<?php echo $img; ?>" alt="ojo"></a></td>
<?php } ?>
  </tr>
<?php } ?>
</table>
</body></html>
