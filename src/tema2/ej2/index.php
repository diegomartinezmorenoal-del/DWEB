<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lotería primitiva</title>
<link rel="stylesheet" href="../estilos.css">
</head>
<body>
<div class="tarjeta">
  <h1>Lotería primitiva</h1>
  <form action="resultado.php" method="post">
    <fieldset>
      <legend>Tu combinación (6 números distintos entre 1 y 49)</legend>
      <div class="grupo">
        <?php for ($i = 1; $i <= 6; $i++): ?>
          <input type="number" name="n[]" min="1" max="49" required aria-label="Número <?= $i ?>">
        <?php endfor; ?>
      </div>
    </fieldset>
    <label for="serie">Número de serie (1 a 999)</label>
    <input type="number" id="serie" name="serie" min="1" max="999" required>
    <button type="submit">Jugar</button>
  </form>
</div>
</body>
</html>
