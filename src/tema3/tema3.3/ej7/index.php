<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Primitiva</title>
<link rel="stylesheet" href="../estilos.css"></head>
<body>
<h1>Lotería Primitiva</h1>
<form action="jugar.php" method="post">
  <table class="boleto">
<?php for ($f = 0; $f < 7; $f++) { ?>
    <tr>
<?php for ($c = 1; $c <= 7; $c++) {
    $n = $f * 7 + $c; ?>
      <td><label><input type="checkbox" name="numeros[]" value="<?php echo $n; ?>"> <?php echo $n; ?></label></td>
<?php } ?>
    </tr>
<?php } ?>
  </table>
  <p>Número de serie (3 cifras): <input type="text" name="serie" maxlength="3" size="4"></p>
  <input type="submit" value="Jugar">
</form>
</body></html>
