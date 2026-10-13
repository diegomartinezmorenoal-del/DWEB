<?php
// Listas blancas: solo se aceptan valores esperados
$fuentes = [
    'serif'   => 'Georgia, "Times New Roman", serif',
    'sans'    => 'Arial, Helvetica, sans-serif',
    'mono'    => '"Courier New", Courier, monospace',
    'cursiva' => '"Comic Sans MS", cursive',
];
$alineaciones = ['left', 'center', 'right', 'justify'];
$banners      = ['banner1.svg', 'banner2.svg', 'banner3.svg'];

$color = fn($v, $def) => preg_match('/^#[0-9a-fA-F]{6}$/', $v ?? '') ? $v : $def;

$fondo  = $color($_POST['fondo'] ?? null, '#ffffff');
$texto  = $color($_POST['texto'] ?? null, '#222222');
$fuente = $fuentes[$_POST['fuente'] ?? ''] ?? $fuentes['serif'];
$tam    = min(32, max(12, intval($_POST['tam'] ?? 18)));
$alin   = in_array($_POST['alineacion'] ?? '', $alineaciones) ? $_POST['alineacion'] : 'left';
$banner = in_array($_POST['banner'] ?? '', $banners) ? $_POST['banner'] : $banners[0];
$borde  = min(10, max(0, intval($_POST['borde'] ?? 2)));
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mi página personalizada</title>
<style>
  body{margin:0;padding:1.5rem;background:<?= $fondo ?>;color:<?= $texto ?>;
       font-family:<?= $fuente ?>;font-size:<?= $tam ?>px;text-align:<?= $alin ?>}
  img{max-width:100%;height:auto;display:block;margin:0 auto 1.5rem}
  .contenido{max-width:760px;margin:0 auto;padding:1rem 1.5rem;border:<?= $borde ?>px solid <?= $texto ?>}
  a{color:inherit}
</style>
</head>
<body>
<div class="contenido">
  <img src="<?= $banner ?>" alt="Banner elegido" width="720" height="160">
  <h1>Bienvenido a mi página</h1>
  <p>Este texto se muestra con los estilos que has elegido en el formulario: color de fondo
     <?= $fondo ?>, color de texto <?= $texto ?>, tamaño de letra de <?= $tam ?> píxeles y
     alineación «<?= $alin ?>».</p>
  <p>PHP ha recibido los datos del formulario mediante <code>$_POST</code> y ha generado
     las reglas CSS de esta página de forma dinámica.</p>
  <ul>
    <li>Los servidores web esperan peticiones HTTP.</li>
    <li>PHP se ejecuta en el servidor y devuelve HTML.</li>
    <li>El navegador solo recibe el resultado.</li>
  </ul>
  <p><a href="index.php">Cambiar la configuración</a></p>
</div>
</body>
</html>
