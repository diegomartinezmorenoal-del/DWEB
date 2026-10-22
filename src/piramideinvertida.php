<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <pre>
<?php
    $base = 9;
    $filas = ($base + 1) / 2; // 5 filas

    for ($i = 0; $i < $filas; $i++) {
        // Imprimir espacios iniciales (aumentan en cada fila)
        for ($j = 0; $j < $i; $j++) {
            echo " ";
        }
        // Imprimir asteriscos (decrecen: 9, 7, 5, 3, 1)
        for ($k = 0; $k < (2 * ($filas - $i) - 1); $k++) {
            echo "*";
        }
        echo "\n";
    }
?>
    </pre>
</body>
</html>