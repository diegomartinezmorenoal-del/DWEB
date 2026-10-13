<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Comparador de precios</title>
<link rel="stylesheet" href="../estilos.css">
</head>
<body>
<div class="tarjeta">
  <h1>Comparador de precios</h1>
  <form action="resultado.php" method="post">
    <label for="producto">Producto</label>
    <input type="text" id="producto" name="producto" required>
    <label for="t1">Precio en Tienda 1 (€)</label>
    <input type="number" id="t1" name="t1" min="0" step="0.01" required>
    <label for="t2">Precio en Tienda 2 (€)</label>
    <input type="number" id="t2" name="t2" min="0" step="0.01" required>
    <label for="t3">Precio en Tienda 3 (€)</label>
    <input type="number" id="t3" name="t3" min="0" step="0.01" required>
    <button type="submit">Calcular media</button>
  </form>
</div>
</body>
</html>
