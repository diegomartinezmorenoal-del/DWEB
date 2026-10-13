<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Llenado del depósito</title>
<link rel="stylesheet" href="../estilos.css">
</head>
<body>
<div class="tarjeta">
  <h1>Tiempo de llenado del depósito</h1>
  <form action="resultado.php" method="post">
    <label for="diametro">Diámetro del cilindro (cm)</label>
    <input type="number" id="diametro" name="diametro" min="0" step="any" required>
    <label for="altura">Altura del cilindro (cm)</label>
    <input type="number" id="altura" name="altura" min="0" step="any" required>
    <label for="caudal">Caudal de aceite (litros por minuto)</label>
    <input type="number" id="caudal" name="caudal" min="0" step="any" required>
    <button type="submit">Calcular tiempo</button>
  </form>
</div>
</body>
</html>
