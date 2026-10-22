<?php
session_start();

if (isset($_POST['destroy'])) {
    session_destroy();
    header("Location: ejercicio1.php");
    exit();
}

if (isset($_GET['select_color'])) {
    $_SESSION['color_actual'] = $_GET['select_color'];
}

$paleta = $_SESSION['paleta'] ?? [];
$bg_color = $_SESSION['color_actual'] ?? '#ffffff';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Paleta Creada</title>
    <style>
        body { background-color: <?= htmlspecialchars($bg_color) ?>; font-family: Arial, sans-serif; text-align: center; padding-top: 30px; }
        .container { background: rgba(255, 255, 255, 0.95); display: inline-block; padding: 25px; border-radius: 10px; }
        table { border-collapse: collapse; margin: 20px auto; }
        td { width: 80px; height: 80px; border: 2px solid #333; cursor: pointer; }
        td a { display: block; width: 100%; height: 100%; }
        .btn { padding: 10px 15px; margin: 5px; font-size: 14px; cursor: pointer; text-decoration: none; color: black; background: #efefef; border: 1px solid #ccc; display: inline-block; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Paleta de Colores Generados</h2>
        <?php if (empty($paleta)): ?>
            <p>No se ha generado ningún color todavía.</p>
        <?php else: ?>
            <table>
                <tr>
                <?php
                foreach ($paleta as $index => $color) {
                    if ($index > 0 && $index % 5 == 0) {
                        echo "</tr><tr>";
                    }
                    echo "<td style='background-color: $color;'>";
                    echo "<a href='paleta.php?select_color=" . urlencode($color) . "' title='$color'></a>";
                    echo "</td>";
                }
                ?>
                </tr>
            </table>
        <?php endif; ?>

        <div>
            <a href="ejercicio1.php" class="btn">Volver y seguir añadiendo colores</a>
            <form method="post" action="paleta.php" style="display:inline;">
                <input type="submit" name="destroy" class="btn" value="Reiniciar (Nueva Paleta)">
            </form>
        </div>
    </div>
</body>
</html>