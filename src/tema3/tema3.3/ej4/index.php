<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Bloques y pisos</title>
<link rel="stylesheet" href="../estilos.css"></head>
<body>
<h1>Bloques y pisos</h1>
<table class="datos">
  <tr><th>Bloque</th><th>Piso</th><th></th></tr>
<?php for ($bloque = 1; $bloque <= 10; $bloque++) {
    for ($piso = 1; $piso <= 7; $piso++) { ?>
  <tr>
    <td><?php echo $bloque; ?></td>
    <td><?php echo $piso; ?></td>
    <td>
      <form action="llamar.php" method="get">
        <input type="hidden" name="bloque" value="<?php echo $bloque; ?>">
        <input type="hidden" name="piso" value="<?php echo $piso; ?>">
        <input type="submit" value="Llamar">
      </form>
    </td>
  </tr>
<?php } } ?>
</table>
</body>
</html>
