<?php
session_start();

if (isset($_POST['add_color'])) {
    $hex = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    
    if (!isset($_SESSION['paleta'])) {
        $_SESSION['paleta'] = [];
    }
    
    $_SESSION['paleta'][] = $hex;
    $_SESSION['color_actual'] = $hex;
}

$bg_color = $_SESSION['color_actual'] ?? '#ffffff';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 - Paleta de Colores</title>
    <style>
        body { background-color: <?= htmlspecialchars($bg_color) ?>; font-family: Arial, sans-serif; text-align: center; padding-top: 50px; transition: background-color 0.3s; }
        .container { background: rgba(255, 255, 255, 0.9); display: inline-block; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.2); }
        input[type="submit"], .btn { padding: 10px 20px; margin: 10px; font-size: 16px; cursor: pointer; text-decoration: none; color: black; background: #efefef; border: 1px solid #ccc; display: inline-block; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Generador de Paleta de Colores</h2>
        <form method="post" action="ejercicio1.php">
            <input type="submit" name="add_color" value="Añadir color">
        </form>
        <br>
        <form action="paleta.php" method="get">
            <input type="submit" value="Mostrar paleta creada">
        </form>
        <br>
        <!-- Ruta de retorno corregida -->
        <a href="../index.php" class="btn">Volver al menú principal</a>
    </div>
</body>
</html>