<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Volumen de un cilindro</title>
<link rel="stylesheet" href="../estilos.css">
</head>
<body>
<div class="tarjeta">
  <h1>Cálculo del volúmen de un cilindro</h1>
  <form action="resultado.php" method="post">
    <label for="altura">Altura (cm)</label>
    <input type="number" id="altura" name="altura" min="0" step="any" required>
    <label for="diametro">Diámetro (cm)</label>
    <input type="number" id="diametro" name="diametro" min="0" step="any" required>
    <button type="submit">Calcular</button>
  </form>
</div>
</body>
</html>
