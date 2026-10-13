<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Configura tu página</title>
<link rel="stylesheet" href="../estilos.css">
</head>
<body>
<div class="tarjeta">
  <h1>Configura el aspecto de tu página</h1>
  <form action="pagina.php" method="post">
    <label for="fondo">Color de fondo</label>
    <input type="color" id="fondo" name="fondo" value="#ffffff">

    <label for="texto">Color del texto</label>
    <input type="color" id="texto" name="texto" value="#222222">

    <label for="fuente">Tipo de letra</label>
    <select id="fuente" name="fuente">
      <option value="serif">Serif (Georgia)</option>
      <option value="sans">Sans-serif (Arial)</option>
      <option value="mono">Monoespaciada (Courier)</option>
      <option value="cursiva">Cursiva (Comic Sans)</option>
    </select>

    <label for="tam">Tamaño de letra (px)</label>
    <input type="number" id="tam" name="tam" min="12" max="32" value="18">

    <label for="alineacion">Alineación del texto</label>
    <select id="alineacion" name="alineacion">
      <option value="left">Izquierda</option>
      <option value="center">Centrado</option>
      <option value="right">Derecha</option>
      <option value="justify">Justificado</option>
    </select>

    <fieldset>
      <legend>Imagen del banner</legend>
      <label><input type="radio" name="banner" value="banner1.svg" checked> Atardecer</label>
      <label><input type="radio" name="banner" value="banner2.svg"> Bosque</label>
      <label><input type="radio" name="banner" value="banner3.svg"> Océano</label>
    </fieldset>

    <label for="borde">Ancho del borde del contenido (px)</label>
    <input type="number" id="borde" name="borde" min="0" max="10" value="2">

    <button type="submit">Ver mi página</button>
  </form>
</div>
</body>
</html>
